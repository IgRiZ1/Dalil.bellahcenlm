@extends('layouts.app')

@section('title', 'FAQ - Veelgestelde Vragen')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <h1 class="mb-4">Veelgestelde Vragen</h1>
            <p class="lead mb-5">Hier vindt u antwoorden op de meest gestelde vragen, georganiseerd per categorie.</p>
        </div>
    </div>

    @if($faqCategories->count() > 0)
        @foreach($faqCategories as $category)
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="h5 mb-0">{{ $category->name }}</h3>
                    @if($category->description)
                        <small class="text-muted">{{ $category->description }}</small>
                    @endif
                </div>
                <div class="card-body">
                    @if($category->questions->count() > 0)
                        <div class="accordion" id="faq-{{ $category->id }}">
                            @foreach($category->questions as $index => $question)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading-{{ $category->id }}-{{ $index }}">
                                        <button class="accordion-button {{ $index === 0 ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $category->id }}-{{ $index }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="collapse-{{ $category->id }}-{{ $index }}">
                                            {{ $question->question }}
                                        </button>
                                    </h2>
                                    <div id="collapse-{{ $category->id }}-{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" aria-labelledby="heading-{{ $category->id }}-{{ $index }}" data-bs-parent="#faq-{{ $category->id }}">
                                        <div class="accordion-body">
                                            {!! nl2br(e($question->answer)) !!}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted mb-0">Er zijn nog geen vragen in deze categorie.</p>
                    @endif
                </div>
            </div>
        @endforeach
    @else
        <div class="alert alert-info">
            <h4 class="alert-heading">Geen FAQ categorieën gevonden</h4>
            <p class="mb-0">Er zijn nog geen veelgestelde vragen beschikbaar. Kom later terug!</p>
        </div>
    @endif

    @auth
        @if(Auth::user()->isAdmin())
            <div class="mt-5">
                <div class="d-flex justify-content-between align-items-center">
                    <h3>FAQ Beheer</h3>
                    <div>
                        <a href="{{ route('admin.faq.categories.create') }}" class="btn btn-primary me-2">
                            <i class="fas fa-plus"></i> Nieuwe Categorie
                        </a>
                        <a href="{{ route('admin.faq.questions.create') }}" class="btn btn-success">
                            <i class="fas fa-plus"></i> Nieuwe Vraag
                        </a>
                    </div>
                </div>
            </div>
        @endif
    @endauth
</div>
@endsection
