@extends('layouts.admin')

@section('title', 'Nieuwe FAQ Vraag')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3">Nieuwe FAQ Vraag</h1>
                <a href="{{ route('faq.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Terug naar FAQ
                </a>
            </div>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.faq.questions.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="faq_category_id" class="form-label">Categorie *</label>
                            <select class="form-select @error('faq_category_id') is-invalid @enderror" 
                                    id="faq_category_id" name="faq_category_id" required>
                                <option value="">Selecteer een categorie</option>
                                @foreach($faqCategories as $category)
                                    <option value="{{ $category->id }}" {{ old('faq_category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('faq_category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="question" class="form-label">Vraag *</label>
                            <input type="text" class="form-control @error('question') is-invalid @enderror" 
                                   id="question" name="question" value="{{ old('question') }}" required>
                            @error('question')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="answer" class="form-label">Antwoord *</label>
                            <textarea class="form-control @error('answer') is-invalid @enderror" 
                                      id="answer" name="answer" rows="5" required>{{ old('answer') }}</textarea>
                            @error('answer')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Vraag Opslaan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
