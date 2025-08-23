@extends('layouts.app')

@section('title', $newsItem->title)

@section('content')
<div class="row">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Startpagina</a></li>
                <li class="breadcrumb-item"><a href="{{ route('news.index') }}">Nieuws</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($newsItem->title, 50) }}</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <article class="card">
            @if($newsItem->image)
                <img src="{{ asset('storage/' . $newsItem->image) }}" 
                     class="card-img-top" alt="{{ $newsItem->title }}" 
                     style="height: 300px; object-fit: cover;">
            @endif
            
            <div class="card-body">
                <header class="mb-4">
                    <h1 class="card-title">{{ $newsItem->title }}</h1>
                    <div class="text-muted mb-3">
                        <small>
                            <i class="fas fa-user me-1"></i>
                            Door {{ $newsItem->user->name }}
                            <i class="fas fa-calendar ms-3 me-1"></i>
                            {{ $newsItem->published_at->format('d F Y \o\m H:i') }}
                        </small>
                    </div>
                </header>

                <div class="content">
                    {!! nl2br(e($newsItem->content)) !!}
                </div>
            </div>

            @auth
                @if(Auth::user()->isAdmin())
                    <div class="card-footer">
                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.news.edit', $newsItem) }}" 
                               class="btn btn-warning">
                                <i class="fas fa-edit me-1"></i>
                                Bewerken
                            </a>
                            <form method="POST" action="{{ route('admin.news.destroy', $newsItem) }}" 
                                  class="d-inline" 
                                  onsubmit="return confirm('Weet u zeker dat u dit nieuwsitem wilt verwijderen?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash me-1"></i>
                                    Verwijderen
                                </button>
                            </form>
                        </div>
                    </div>
                @endif
            @endauth
        </article>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-12">
        <a href="{{ route('news.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-1"></i>
            Terug naar Nieuws
        </a>
    </div>
</div>
@endsection