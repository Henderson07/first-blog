@extends('backend.layouts.auth-layout')

@section('pageTitle', 'Termos do Blog – Versão Zoera')

@section('content')
<div class="page page-center">
    <div class="container py-4" style="max-width: 900px;"> {{-- MAIS LARGO --}}

        <div class="text-center mb-4">
            <img src="/backend/static/logo.svg" height="75" alt="">
        </div>

        <div class="card shadow-lg">
            <div class="card-body px-4 px-md-5 py-4">

                <h2 class="card-title mb-3 text-center">
                    Termos de Uso & Política do Blog
                    <br>
                    <span class="text-muted">Versão Zoera Corporativa®</span>
                </h2>

                <p class="text-muted text-center mb-4">
                    Ao continuar, você concorda com tudo abaixo — mesmo aquelas partes que
                    você sabe que não leu, porque ninguém lê termos mesmo.
                </p>

                <hr>

                <h3 class="mb-2">1. Entro porque quis. Tem *galantia*?</h3>
                <p>
                    Você está aqui por livre e espontânea pressão da vida.
                    Prometemos 100% de <b>entretenimento duvidoso</b>,
                    <b>conteúdo aleatório</b> e <b>zero garantias</b> de que algo fará sentido.
                </p>

                <h3 class="mt-4 mb-2">2. Não nos responsabilizamos pela zoeira</h3>
                <p>
                    O blog é feito para resenha, piada interna, externa, periférica
                    e quaisquer outros tipos de riso suspeito.
                    Se você se ofender por alguma coisa, favor clicar no botão:
                    <b>"fechar aba"</b>.
                </p>

                <h3 class="mt-4 mb-2">3. Pode enviar conteúdo? Pode.</h3>
                <p>
                    Se você mandar texto, foto, meme ou qualquer coisa:
                </p>
                <ul>
                    <li>Você garante que é seu (ou “roubou com carinho”).</li>
                    <li>Você autoriza o blog a usar, postar, repostar e rir muito disso.</li>
                    <li>Você entende que pode virar piada interna para sempre.</li>
                </ul>

                <h3 class="mt-4 mb-2">4. Seu cadastro não será vendido</h3>
                <p>
                    Prometemos nunca vender seus dados para empresas duvidosas.
                    <b>Talvez</b> para o RH (brincadeira… ou não).
                </p>

                <h3 class="mt-4 mb-2">5. Cookies</h3>
                <p>
                    Usamos cookies sim. Não os de comer (infelizmente).
                    São só aqueles de navegador mesmo — padrão, seguro e bem menos gostoso.
                </p>

                <h3 class="mt-4 mb-2">6. Atualizações do contrato</h3>
                <p>
                    Este contrato pode mudar a qualquer momento.
                    Geralmente quando alguém vacila ou faz besteira.
                    Fique tranquilo: continuaremos sendo engraçados.
                </p>

                <hr>

                <p class="text-center mt-4">
                    Se você chegou até aqui lendo tudo…
                    <br><b>aceite nossos parabéns — você é diferenciado.</b>
                </p>

                <div class="text-center mt-4">
                    <a href="{{ route('author.first-login') }}" class="btn btn-primary w-100">
                        Voltar e Criar Minha Conta
                    </a>
                </div>

            </div>
        </div>

        <div class="text-center text-muted mt-3">
            © {{ date('Y') }} Blog Hensso — Setor Oficial da Zoera Corporativa.
        </div>

    </div>
</div>
@endsection