@extends('layouts.app')

@section('title', $user->name . ' - Profiel')

@section('content')
<div class="row">
    <div class="col-lg-4">
        <div class="modern-card mb-4">
            <div class="modern-card-body text-center">
                @if($user->profile_photo)
                    <img src="{{ asset('storage/' . $user->profile_photo) }}" 
                         alt="{{ $user->name }}" 
                         class="rounded-circle mb-3" 
                         style="width: 150px; height: 150px; object-fit: cover;">
                @else
                    <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                         style="width: 150px; height: 150px;">
                        <i class="fas fa-user fa-4x text-muted"></i>
                    </div>
                @endif
                
                <h3 class="mb-1">{{ $user->name }}</h3>
                <p class="text-muted mb-3">{{ '@' . $user->username }}</p>
                
                @if($user->is_admin)
                    <span class="badge bg-primary mb-3">
                        <i class="fas fa-crown me-1"></i> Beheerder
                    </span>
                @endif

                @if(Auth::check() && Auth::id() === $user->id)
                    <div class="d-grid">
                        <a href="{{ route('profile.edit') }}" class="btn btn-modern-primary">
                            <i class="fas fa-edit"></i> Profiel Bewerken
                        </a>
                    </div>
                @endif
            </div>
        </div>

        <div class="modern-card">
            <div class="modern-card-header">
                <h5 class="mb-0">
                    <i class="fas fa-info-circle me-2"></i>
                    Informatie
                </h5>
            </div>
            <div class="modern-card-body">
                <table class="table table-borderless table-sm">
                    @if($user->birthday)
                        <tr>
                            <td><i class="fas fa-birthday-cake me-2 text-muted"></i> Verjaardag:</td>
                            <td>{{ $user->birthday->format('d F Y') }}</td>
                        </tr>
                    @endif
                    <tr>
                        <td><i class="fas fa-calendar-alt me-2 text-muted"></i> Lid sinds:</td>
                        <td>{{ $user->created_at->format('F Y') }}</td>
                    </tr>
                    <tr>
                        <td><i class="fas fa-newspaper me-2 text-muted"></i> Artikelen:</td>
                        <td>{{ $user->newsItems()->count() }}</td>
                    </tr>
                </table>

                @if($user->about_me)
                    <hr>
                    <h6>Over mij</h6>
                    <p class="text-muted mb-0">{{ $user->about_me }}</p>
                @endif
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="modern-card">
            <div class="modern-card-header">
                <h5 class="mb-0">
                    <i class="fas fa-newspaper me-2"></i>
                    Recente Artikelen
                </h5>
            </div>
            <div class="modern-card-body">
                @if($newsItems->count() > 0)
                    <div class="row">
                        @foreach($newsItems as $newsItem)
                            <div class="col-md-6 mb-3">
                                <div class="news-card h-100">
                                    @if($newsItem->image)
                                        <img src="{{ asset('storage/' . $newsItem->image) }}" 
                                             alt="{{ $newsItem->title }}" 
                                             class="card-img-top"
                                             style="height: 150px; object-fit: cover;">
                                    @endif
                                    <div class="news-card-body">
                                        <h6 class="card-title">
                                            <a href="{{ route('news.show', $newsItem) }}" 
                                               class="text-decoration-none">
                                                {{ $newsItem->title }}
                                            </a>
                                        </h6>
                                        <p class="text-muted small mb-2">
                                            {{ Str::limit(strip_tags($newsItem->content), 100) }}
                                        </p>
                                        <div class="news-meta">
                                            <i class="fas fa-calendar me-1"></i>
                                            {{ $newsItem->published_at->format('d-m-Y') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                    @if($user->newsItems()->count() > 5)
                        <div class="text-center mt-3">
                            <a href="{{ route('news.index') }}?author={{ $user->username }}" 
                               class="btn btn-modern-secondary">
                                <i class="fas fa-newspaper"></i> Alle Artikelen Bekijken
                            </a>
                        </div>
                    @endif
                @else
                    <div class="text-center py-4">
                        <i class="fas fa-newspaper fa-3x text-muted mb-3"></i>
                        <h6 class="text-muted">Nog geen artikelen</h6>
                        <p class="text-muted mb-0">
                            {{ $user->name }} heeft nog geen artikelen gepubliceerd.
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection