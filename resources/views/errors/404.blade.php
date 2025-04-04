@section('extra_css')

<style>

body {
            background-color: #f8f9fa;
        }
        .error-page {
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: #343a40;
        }
        .error-page h1 {
            font-size: 6rem;
            font-weight: bold;
            color: #dc3545; /* Bootstrap danger color */
        }
        .error-page p {
            font-size: 1.5rem;
            margin-bottom: 2rem;
        }
        .btn-custom {
            background-color: #007bff; /* Bootstrap primary color */
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .btn-custom:hover {
            background-color: #0056b3; /* Darker shade on hover */
        }
</style>

@endsection
@extends('layouts.app')

@section('content')

<div class="container error-page">
    <h1>404</h1>
    <p>Oups ! La page que vous recherchez n'existe pas.</p>
    <a href="/" class="btn btn-custom">Retour à l'accueil</a>
</div>

@endsection