@extends('layouts.app')

@section('title', 'Nieuws')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <h1 style="color: var(--primary-color); font-weight: 700;">
                <i class="fas fa-newspaper me-3"></i>
                Nieuws
            </h1>
            @auth
                @if(Auth::user()->isAdmin())
                    <a href="{{ route('admin.news.create') }}" class="btn-modern-primary">
                        <i class="fas fa-plus"></i>
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
                <article class="news-card h-100">
                    @if($newsItem->image)
                        <div class="position-relative" style="height: 220px; overflow: hidden;">
                            <img src="{{ asset('storage/' . $newsItem->image) }}" 
                                 class="w-100 h-100" alt="{{ $newsItem->title }}" 
                                 style="object-fit: cover;">
                            <div class="position-absolute top-0 end-0 m-3">
                                <span class="badge" style="background: var(--primary-color);">
                                    <i class="fas fa-calendar me-1"></i>
                                    {{ $newsItem->published_at->format('M d') }}
                                </span>
                            </div>
                        </div>
                    @endif
                    <div class="news-card-body d-flex flex-column">
                        <h5 class="mb-3" style="color: var(--text-primary); font-weight: 600; line-height: 1.4;">
                            {{ $newsItem->title }}
                        </h5>
                        <p class="text-muted mb-4" style="line-height: 1.6;">
                            {{ Str::limit($newsItem->content, 140) }}
                        </p>
                        <div class="news-meta mt-auto mb-4">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary bg-opacity-10 rounded-circle p-2 me-3">
                                    <i class="fas fa-user" style="color: var(--primary-color);"></i>
                                </div>
                                <div>
                                    <small class="fw-medium" style="color: var(--text-primary);">{{ $newsItem->user->name }}</small><br>
                                    <small style="color: var(--text-secondary);">{{ $newsItem->published_at->format('d M Y') }}</small>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('news.show', $newsItem) }}" class="btn-modern-primary">
                                <i class="fas fa-arrow-right"></i>
                                Lees Meer
                            </a>
                            @auth
                                @if(Auth::user()->isAdmin())
                                    <div>
                                        <a href="{{ route('admin.news.edit', $newsItem) }}" 
                                           class="btn btn-sm btn-outline-secondary me-2" style="border-radius: var(--radius);">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form method="POST" action="{{ route('admin.news.destroy', $newsItem) }}" 
                                              class="d-inline" 
                                              onsubmit="return confirm('Weet u zeker dat u dit nieuwsitem wilt verwijderen?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" style="border-radius: var(--radius);">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            @endauth
                        </div>
                    </div>
                </article>
            </div>
        @endforeach
    @else
        <div class="col-md-12">
            <div class="modern-card text-center py-5">
                <div class="d-inline-flex align-items-center justify-content-center bg-light rounded-circle p-4 mb-4">
                    <i class="fas fa-newspaper fa-3x" style="color: var(--text-secondary);"></i>
                </div>
                <h4 class="mb-3" style="color: var(--text-primary); font-weight: 600;">Nog geen nieuws beschikbaar</h4>
                <p class="text-muted mb-4">Er zijn nog geen nieuwsartikelen gepubliceerd. Kom binnenkort terug voor updates!</p>
                @auth
                    @if(Auth::user()->isAdmin())
                        <a href="{{ route('admin.news.create') }}" class="btn-modern-primary">
                            <i class="fas fa-plus"></i>
                            Eerste Artikel Schrijven
                        </a>
                    @endif
                @endauth
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