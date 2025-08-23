@extends('layouts.admin')

@section('title', 'Artikel Bewerken')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3">Artikel Bewerken: {{ $newsItem->title }}</h1>
                <div>
                    <a href="{{ route('news.show', $newsItem) }}" class="btn btn-outline-primary me-2">
                        <i class="fas fa-eye"></i> Bekijken
                    </a>
                    <a href="{{ route('news.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Terug naar Nieuws
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.news.update', $newsItem) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                
                                <div class="mb-3">
                                    <label for="title" class="form-label">Titel *</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                           id="title" name="title" value="{{ old('title', $newsItem->title) }}" required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="content" class="form-label">Inhoud *</label>
                                    <textarea class="form-control @error('content') is-invalid @enderror" 
                                              id="content" name="content" rows="12" required>{{ old('content', $newsItem->content) }}</textarea>
                                    @error('content')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="image" class="form-label">Afbeelding</label>
                                    @if($newsItem->image)
                                        <div class="mb-2">
                                            <img src="{{ asset('storage/' . $newsItem->image) }}" 
                                                 alt="Huidige afbeelding" class="img-thumbnail" style="max-height: 200px;">
                                            <div class="form-text">Huidige afbeelding</div>
                                        </div>
                                    @endif
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" 
                                           id="image" name="image" accept="image/*">
                                    <div class="form-text">
                                        Toegestane formaten: JPEG, PNG, JPG, GIF. Maximale grootte: 2MB
                                        @if($newsItem->image)
                                            <br>Upload een nieuwe afbeelding om de huidige te vervangen
                                        @endif
                                    </div>
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="published_at" class="form-label">Publicatiedatum</label>
                                    <input type="datetime-local" class="form-control @error('published_at') is-invalid @enderror" 
                                           id="published_at" name="published_at" 
                                           value="{{ old('published_at', $newsItem->published_at ? $newsItem->published_at->format('Y-m-d\TH:i') : '') }}">
                                    @error('published_at')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <a href="{{ route('news.show', $newsItem) }}" class="btn btn-outline-secondary me-md-2">
                                        <i class="fas fa-times"></i> Annuleren
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Wijzigingen Opslaan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Artikel Informatie</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-sm table-borderless">
                                <tr>
                                    <td><strong>ID:</strong></td>
                                    <td>{{ $newsItem->id }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Auteur:</strong></td>
                                    <td>{{ $newsItem->user->name ?? 'Onbekend' }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Status:</strong></td>
                                    <td>
                                        @if($newsItem->published_at && $newsItem->published_at->isPast())
                                            <span class="badge bg-success">Gepubliceerd</span>
                                        @else
                                            <span class="badge bg-warning">Concept</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Aangemaakt:</strong></td>
                                    <td>{{ $newsItem->created_at->format('d-m-Y H:i') }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Laatste update:</strong></td>
                                    <td>{{ $newsItem->updated_at->format('d-m-Y H:i') }}</td>
                                </tr>
                            </table>

                            <div class="d-grid gap-2 mt-3">
                                <a href="{{ route('news.show', $newsItem) }}" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-eye"></i> Artikel Bekijken
                                </a>

                                <form action="{{ route('admin.news.destroy', $newsItem) }}" method="POST"
                                      onsubmit="return confirm('Weet je zeker dat je dit artikel permanent wilt verwijderen?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm">
                                        <i class="fas fa-trash"></i> Artikel Verwijderen
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection