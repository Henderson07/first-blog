@extends('backend.layouts.auth-layout')
@section('pageTitle', 'Primeiro Login')
@section('content')

<div class="page page-center">
    <div class="container container-tight py-4">

        <div class="text-center mb-4">
            <a href="/" class="navbar-brand navbar-brand-autodark">
                <img src="/backend/static/logo.svg" height="75" alt="">
            </a>
        </div>

        @livewire('author-first-login-form')

        <div class="text-center text-muted mt-3">
            Já tem uma conta? <a href="{{ route('author.login') }}">Entrar</a>
        </div>

    </div>
</div>

@endsection

@push('scripts')
<script>
    function togglePassword() {
        const input = document.getElementById('password');
        input.type = (input.type === "password") ? "text" : "password";
    }
</script>
@endpush