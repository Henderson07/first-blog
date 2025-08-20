@extends('backend.layouts.auth-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Esqueci a senha')
@section('content')

    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="text-center">
                <a href="." class="navbar-brand navbar-brand-autodark"><img src="./backend/static/logo.svg" height="75"
                        alt=""></a>
            </div>
            @livewire('author-forgot-form')
            <div class="text-center text-muted mt-3">
                Esqueça, <a href="{{ route('author.login') }}">Me envie de volta</a> para a tela de login
            </div>
        </div>
    </div>

@endsection
