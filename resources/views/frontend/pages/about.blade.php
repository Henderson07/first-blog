@extends('frontend.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Sobre mim')
@section('content')

<main>
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 ">
                    <div class="breadcrumbs mb-4">
                        <a href="{{ route('home') }}">Home</a>
                        <span class="mx-1">/</span>
                        <span>Sobre mim</span>
                    </div>
                </div>

                <div class="col-lg-8 mx-auto mb-5 mb-lg-0">
                    <!-- Foto -->
                    <img loading="lazy" decoding="async" src="/frontend/images/author.png"
                        class="img-fluid w-100 mb-4 rounded shadow-sm" alt="Foto de Henderson Camilo">

                    <!-- Nome -->
                    <h1 class="mb-3 fw-bold text-center text-lg-start">Henderson Camilo</h1>

                    <!-- Descrição principal -->
                    <div class="content">
                        <p class="lead">
                            Sou desenvolvedor <strong>Full Stack</strong> com foco no desenvolvimento de sistemas
                            <strong>ERP Web</strong>, atuando em todas as camadas — do backend à experiência do usuário.
                            Tenho experiência consolidada com <strong>Laravel (PHP)</strong>, <strong>C# (.NET)</strong>,
                            <strong>JavaScript</strong>, <strong>MySQL</strong> e <strong>Docker</strong>.
                        </p>

                        <p>
                            No backend, aplico princípios de <strong>Clean Code</strong> e <strong>SOLID</strong>,
                            estruturando aplicações em camadas (Controllers, Services, Models, e FormRequests).
                            No frontend, priorizo interfaces dinâmicas e responsivas utilizando
                            <strong>Blade Templates</strong>, <strong>jQuery</strong>, e integração com componentes
                            modernos.
                        </p>

                        <p>
                            Tenho um forte compromisso com qualidade e organização de código, aplicando testes unitários,
                            versionamento com <strong>Git</strong> e práticas contínuas de refatoração.
                            Também atuo com containers <strong>Docker</strong> para padronizar ambientes de desenvolvimento
                            e deploy, incluindo bancos como <strong>MySQL</strong>, <strong>PostgreSQL</strong> e
                            <strong>Firebird</strong>.
                        </p>

                        <blockquote class="border-start ps-3 my-4">
                            “Código limpo é aquele que você pode ler e entender facilmente, mesmo meses depois de tê-lo escrito.”
                        </blockquote>

                        <!-- Seção de competências -->
                        <h3 class="mt-5 mb-3 fw-semibold">Minhas principais competências</h3>
                        <ul class="list-unstyled">
                            <li> Desenvolvimento de aplicações <strong>Laravel</strong> modernas com arquitetura limpa</li>
                            <li> Domínio de <strong>PHP</strong>, <strong>C# (.NET)</strong> e integração com APIs RESTful</li>
                            <li> Experiência em <strong>bancos de dados relacionais</strong> (MySQL, PostgreSQL, Firebird)</li>
                            <li> Criação e manutenção de sistemas <strong>ERP</strong> e módulos financeiros complexos</li>
                            <li> Uso avançado de <strong>Docker</strong> e <strong>Docker Compose</strong> para ambientes de dev</li>
                            <li> Aplicação de princípios <strong>SOLID</strong> e testes unitários com <strong>PHPUnit</strong></li>
                            <li> Desenvolvimento de interfaces <strong>responsivas</strong> e <strong>UX intuitivas</strong></li>
                            <li> Integração com <strong>GitHub</strong>, <strong>Hostinger</strong> e deploy em VPS Linux</li>
                        </ul>

                        <p class="mt-4">
                            Atualmente estou me aprofundando em boas práticas de arquitetura, testes automatizados,
                            e escalabilidade de aplicações web.
                        </p>
                        <div class="mt-5 text-center text-lg-start">
                            <a href="{{ route('home') }}">Voltar para o Blog</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection