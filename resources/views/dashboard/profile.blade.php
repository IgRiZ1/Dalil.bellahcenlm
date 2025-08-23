@extends('layouts.app')

@section('title', 'Mijn Profiel - Dashboard')

@section('content')
<div class="row">
    <div class="col-lg-4">
        <div class="modern-card">
            <div class="modern-card-header">
                <h5 class="mb-0">
                    <i class="fas fa-user me-2"></i>
                    Profiel Overzicht
                </h5>
            </div>
            <div class="modern-card-body text-center">
                @if($user->profile_photo)
                    <img src="{{ asset('storage/' . $user->profile_photo) }}" 
                         alt="{{ $user->name }}" 
                         class="rounded-circle mb-3" 
                         style="width: 120px; height: 120px; object-fit: cover;">
                @else
                    <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                         style="width: 120px; height: 120px;">
                        <i class="fas fa-user fa-3x text-muted"></i>
                    </div>
                @endif
                
                <h4 class="mb-1">{{ $user->name }}</h4>
                <p class="text-muted mb-3">{{ '@' . $user->username }}</p>
                
                @if($user->is_admin)
                    <span class="badge bg-primary mb-3">
                        <i class="fas fa-crown me-1"></i> Beheerder
                    </span>
                @endif

                <div class="d-grid gap-2">
                    <a href="{{ route('profile.edit') }}" class="btn btn-modern-primary">
                        <i class="fas fa-edit"></i> Profiel Bewerken
                    </a>
                    <a href="{{ route('profile.show', $user->username) }}" class="btn btn-modern-secondary">
                        <i class="fas fa-eye"></i> Publiek Profiel
                    </a>
                </div>
            </div>
        </div>

        <div class="modern-card mt-4">
            <div class="modern-card-header">
                <h5 class="mb-0">
                    <i class="fas fa-chart-bar me-2"></i>
                    Statistieken
                </h5>
            </div>
            <div class="modern-card-body">
                <div class="row text-center">
                    <div class="col-6">
                        <div class="stat-card mb-3">
                            <div class="stat-number">{{ $newsItems->count() }}</div>
                            <div class="stat-label">Artikelen</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="stat-card mb-3">
                            <div class="stat-number">{{ $user->created_at->diffInDays(now()) }}</div>
                            <div class="stat-label">Dagen Lid</div>
                        </div>
                    </div>
                </div>

                <hr>

                <table class="table table-borderless table-sm">
                    <tr>
                        <td><i class="fas fa-envelope me-2 text-muted"></i> E-mail:</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                    @if($user->birthday)
                        <tr>
                            <td><i class="fas fa-birthday-cake me-2 text-muted"></i> Verjaardag:</td>
                            <td>{{ $user->birthday->format('d F Y') }}</td>
                        </tr>
                    @endif
                    <tr>
                        <td><i class="fas fa-calendar-alt me-2 text-muted"></i> Lid sinds:</td>
                        <td>{{ $user->created_at->format('d F Y') }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="modern-card">
            <div class="modern-card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <i class="fas fa-newspaper me-2"></i>
                    Mijn Artikelen
                </h5>
                @if($user->is_admin)
                    <a href="{{ route('admin.news.create') }}" class="btn btn-modern-primary btn-sm">
                        <i class="fas fa-plus"></i> Nieuw Artikel
                    </a>
                @endif
            </div>
            <div class="modern-card-body">
                @if($newsItems->count() > 0)
                    <div class="list-group list-group-flush">
                        @foreach($newsItems as $newsItem)
                            <div class="list-group-item border-0 px-0">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <h6 class="mb-1">
                                            <a href="{{ route('news.show', $newsItem) }}" 
                                               class="text-decoration-none">
                                                {{ $newsItem->title }}
                                            </a>
                                        </h6>
                                        <p class="text-muted small mb-1">
                                            {{ Str::limit(strip_tags($newsItem->content), 120) }}
                                        </p>
                                        <div class="news-meta">
                                            <i class="fas fa-calendar me-1"></i>
                                            {{ $newsItem->published_at ? $newsItem->published_at->format('d-m-Y') : 'Concept' }}
                                            @if($newsItem->published_at && $newsItem->published_at->isPast())
                                                <span class="badge bg-success ms-2">Gepubliceerd</span>
                                            @else
                                                <span class="badge bg-warning ms-2">Concept</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4 text-md-end">
                                        @if($newsItem->image)
                                            <img src="{{ asset('storage/' . $newsItem->image) }}" 
                                                 alt="{{ $newsItem->title }}" 
                                                 class="img-thumbnail"
                                                 style="width: 80px; height: 60px; object-fit: cover;">
                                        @endif
                                        
                                        @if($user->is_admin)
                                            <div class="btn-group mt-2" role="group">
                                                <a href="{{ route('admin.news.edit', $newsItem) }}" 
                                                   class="btn btn-sm btn-outline-warning" title="Bewerken">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="{{ route('news.show', $newsItem) }}" 
                                                   class="btn btn-sm btn-outline-primary" title="Bekijken">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                    <div class="text-center mt-3">
                        <a href="{{ route('news.index') }}" class="btn btn-modern-secondary">
                            <i class="fas fa-newspaper"></i> Alle Artikelen Bekijken
                        </a>
                    </div>
                @else
                    <div class="text-center py-4">
                        <i class="fas fa-newspaper fa-3x text-muted mb-3"></i>
                        <h6 class="text-muted">Nog geen artikelen</h6>
                        <p class="text-muted mb-3">
                            Je hebt nog geen artikelen geschreven.
                        </p>
                        @if($user->is_admin)
                            <a href="{{ route('admin.news.create') }}" class="btn btn-modern-primary">
                                <i class="fas fa-plus"></i> Eerste Artikel Schrijven
                            </a>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection