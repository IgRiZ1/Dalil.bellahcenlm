@extends('layouts.app')

@section('title', 'Welkom')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h1 class="text-center mb-0">
                    <i class="fas fa-globe me-3"></i>
                    Welkom op Mijn Website
                </h1>
            </div>
            <div class="card-body">
                <div class="text-center mb-4">
                    <p class="lead">
                        Een dynamische website gebouwd met Laravel 12, vol met functionaliteiten voor gebruikers en beheerders.
                    </p>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="card h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-newspaper fa-3x text-primary mb-3"></i>
                                <h5 class="card-title">Nieuws</h5>
                                <p class="card-text">Bekijk de laatste nieuwsberichten en updates.</p>
                                <a href="{{ route('news.index') }}" class="btn btn-primary">
                                    Bekijk Nieuws
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <div class="card h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-question-circle fa-3x text-success mb-3"></i>
                                <h5 class="card-title">FAQ</h5>
                                <p class="card-text">Vind antwoorden op veelgestelde vragen.</p>
                                <a href="{{ route('faq.index') }}" class="btn btn-success">
                                    Bekijk FAQ
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="card h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-envelope fa-3x text-info mb-3"></i>
                                <h5 class="card-title">Contact</h5>
                                <p class="card-text">Neem contact met ons op voor vragen of opmerkingen.</p>
                                <a href="{{ route('contact.show') }}" class="btn btn-info">
                                    Contact
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <div class="card h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-user fa-3x text-warning mb-3"></i>
                                <h5 class="card-title">Account</h5>
                                <p class="card-text">Maak een account aan of log in om toegang te krijgen tot extra functionaliteiten.</p>
                                @guest
                                    <a href="{{ route('register') }}" class="btn btn-warning me-2">
                                        Registreren
                                    </a>
                                    <a href="{{ route('login') }}" class="btn btn-outline-warning">
                                        Inloggen
                                    </a>
                                @else
                                    <a href="{{ route('dashboard') }}" class="btn btn-warning">
                                        Dashboard
                                    </a>
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="text-center mt-4">
                    <h4>Functionaliteiten</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <ul class="list-unstyled">
                                <li><i class="fas fa-check text-success me-2"></i>Gebruikersregistratie</li>
                                <li><i class="fas fa-check text-success me-2"></i>Profielbeheer</li>
                                <li><i class="fas fa-check text-success me-2"></i>Nieuwsbeheer</li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <ul class="list-unstyled">
                                <li><i class="fas fa-check text-success me-2"></i>FAQ systeem</li>
                                <li><i class="fas fa-check text-success me-2"></i>Contactformulier</li>
                                <li><i class="fas fa-check text-success me-2"></i>Admin dashboard</li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <ul class="list-unstyled">
                                <li><i class="fas fa-check text-success me-2"></i>Beveiligde routes</li>
                                <li><i class="fas fa-check text-success me-2"></i>Responsive design</li>
                                <li><i class="fas fa-check text-success me-2"></i>Laravel 12</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
