@extends('layouts.admin')

@section('title', 'Contact Berichten')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3">Contact Berichten</h1>
                <div class="text-muted">
                    <i class="fas fa-envelope me-1"></i>
                    {{ $contacts->total() }} berichten
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    @if($contacts->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Naam</th>
                                        <th>E-mail</th>
                                        <th>Onderwerp</th>
                                        <th>Datum</th>
                                        <th>Acties</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($contacts as $contact)
                                        <tr>
                                            <td>{{ $contact->id }}</td>
                                            <td>
                                                <strong>{{ $contact->name }}</strong>
                                            </td>
                                            <td>
                                                <a href="mailto:{{ $contact->email }}" class="text-decoration-none">
                                                    {{ $contact->email }}
                                                </a>
                                            </td>
                                            <td>
                                                <span title="{{ $contact->subject }}">
                                                    {{ Str::limit($contact->subject, 50) }}
                                                </span>
                                            </td>
                                            <td>
                                                <span title="{{ $contact->created_at->format('d-m-Y H:i:s') }}">
                                                    {{ $contact->created_at->format('d-m-Y') }}
                                                </span>
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('admin.contact.show-message', $contact) }}" 
                                                       class="btn btn-sm btn-outline-primary" title="Bekijken">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="mailto:{{ $contact->email }}?subject=Re: {{ $contact->subject }}" 
                                                       class="btn btn-sm btn-outline-success" title="Beantwoorden">
                                                        <i class="fas fa-reply"></i>
                                                    </a>
                                                    <form action="{{ route('admin.contact.destroy', $contact) }}" 
                                                          method="POST" class="d-inline"
                                                          onsubmit="return confirm('Weet je zeker dat je dit bericht wilt verwijderen?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" 
                                                                class="btn btn-sm btn-outline-danger" title="Verwijderen">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Paginatie -->
                        <div class="d-flex justify-content-center mt-4">
                            {{ $contacts->links() }}
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-envelope fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">Geen berichten gevonden</h5>
                            <p class="text-muted">Er zijn nog geen contactberichten ontvangen.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection