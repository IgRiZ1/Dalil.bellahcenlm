@extends('layouts.admin')

@section('title', 'Contact Bericht')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3">Contact Bericht #{{ $contact->id }}</h1>
                <a href="{{ route('admin.contact.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Terug naar Berichten
                </a>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">{{ $contact->subject }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-4">
                                <div class="row mb-3">
                                    <div class="col-sm-3"><strong>Van:</strong></div>
                                    <div class="col-sm-9">
                                        {{ $contact->name }} 
                                        <a href="mailto:{{ $contact->email }}" class="text-decoration-none ms-2">
                                            ({{ $contact->email }})
                                        </a>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3"><strong>Onderwerp:</strong></div>
                                    <div class="col-sm-9">{{ $contact->subject }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"><strong>Datum:</strong></div>
                                    <div class="col-sm-9">{{ $contact->created_at->format('d F Y, H:i') }}</div>
                                </div>
                            </div>
                            
                            <hr>
                            
                            <div class="message-content">
                                <h6>Bericht:</h6>
                                <div class="bg-light p-3 rounded">
                                    {!! nl2br(e($contact->message)) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Acties</h5>
                        </div>
                        <div class="card-body">
                            <div class="d-grid gap-2">
                                <a href="mailto:{{ $contact->email }}?subject=Re: {{ $contact->subject }}&body=%0A%0A----%0AOrigineel bericht:%0AVan: {{ $contact->name }} ({{ $contact->email }})%0AOnderwerp: {{ $contact->subject }}%0ADatum: {{ $contact->created_at->format('d-m-Y H:i') }}%0A%0A{{ $contact->message }}" 
                                   class="btn btn-primary">
                                    <i class="fas fa-reply"></i> Beantwoorden
                                </a>
                                
                                <a href="mailto:{{ $contact->email }}" 
                                   class="btn btn-outline-primary">
                                    <i class="fas fa-envelope"></i> Nieuwe E-mail
                                </a>
                                
                                <hr>
                                
                                <form action="{{ route('admin.contact.destroy', $contact) }}" 
                                      method="POST"
                                      onsubmit="return confirm('Weet je zeker dat je dit bericht permanent wilt verwijderen?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger w-100">
                                        <i class="fas fa-trash"></i> Bericht Verwijderen
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-header">
                            <h5 class="mb-0">Contactgegevens</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-sm table-borderless">
                                <tr>
                                    <td><strong>Naam:</strong></td>
                                    <td>{{ $contact->name }}</td>
                                </tr>
                                <tr>
                                    <td><strong>E-mail:</strong></td>
                                    <td>
                                        <a href="mailto:{{ $contact->email }}" class="text-decoration-none">
                                            {{ $contact->email }}
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Ontvangen:</strong></td>
                                    <td>{{ $contact->created_at->format('d-m-Y H:i') }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Bericht ID:</strong></td>
                                    <td>#{{ $contact->id }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection