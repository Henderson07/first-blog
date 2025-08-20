@extends('backend.layouts.auth-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Redefinir senha')
@section('content')
    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="text-center">
                <a href="." class="navbar-brand navbar-brand-autodark"><img src="./backend/static/logo.svg" height="75"
                        alt=""></a>
            </div>
            @livewire('author-reset-form')
        </div>
    </div>

@endsection
