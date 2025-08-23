@extends('layouts.app')

@section('title', 'Nieuws')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>
                <i class="fas fa-newspaper me-2"></i>
                Nieuws
            </h1>
            @auth
                @if(Auth::user()->isAdmin())
                    <a href="{{ route('admin.news.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-1"></i>
                        Nieuw Artikel
                    </a>
                @endif
            @endauth
        </div>
    </div>
</div>

<div class="row">
    @if($newsItems->count() > 0)
        @foreach($newsItems as $newsItem)
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    @if($newsItem->image)
                        <img src="{{ asset('storage/' . $newsItem->image) }}" 
                             class="card-img-top" alt="{{ $newsItem->title }}" 
                             style="height: 200px; object-fit: cover;">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $newsItem->title }}</h5>
                        <p class="card-text">{{ Str::limit($newsItem->content, 150) }}</p>
                        <div class="mt-auto">
                            <small class="text-muted">
                                <i class="fas fa-user me-1"></i>
                                Door {{ $newsItem->user->name }}
                                <i class="fas fa-calendar ms-3 me-1"></i>
                                {{ $newsItem->published_at->format('d/m/Y') }}
                            </small>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('news.show', $newsItem) }}" class="btn btn-primary">
                                <i class="fas fa-eye me-1"></i>
                                Lees Meer
                            </a>
                            @auth
                                @if(Auth::user()->isAdmin())
                                    <div>
                                        <a href="{{ route('admin.news.edit', $newsItem) }}" 
                                           class="btn btn-sm btn-outline-warning me-1">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form method="POST" action="{{ route('admin.news.destroy', $newsItem) }}" 
                                              class="d-inline" 
                                              onsubmit="return confirm('Weet u zeker dat u dit nieuwsitem wilt verwijderen?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="col-md-12">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fas fa-newspaper fa-3x text-muted mb-3"></i>
                    <h4>Nog geen nieuws beschikbaar</h4>
                    <p class="text-muted">Er zijn nog geen nieuwsartikelen gepubliceerd.</p>
                    @auth
                        @if(Auth::user()->isAdmin())
                            <a href="{{ route('admin.news.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus me-1"></i>
                                Eerste Artikel Schrijven
                            </a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    @endif
</div>

<!-- Paginatie -->
@if($newsItems->hasPages())
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-center">
                {{ $newsItems->links() }}
            </div>
        </div>
    </div>
@endif
@endsection