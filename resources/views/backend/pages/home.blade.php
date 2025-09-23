@extends('backend.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Home')
@section('content')


    <div class="d-print-none" aria-label="Page header">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">Descrição</h2>
                </div>
            </div>
        </div>
    </div>


    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-9">
            <div class="card card-lg">
                <div class="card-body markdown">
                    <h1>💼 Sobre mim</h1>
                    <p>
                        Sou desenvolvedor Full Stack com foco no desenvolvimento de sistemas ERP web, atuando tanto no
                        backend quanto no frontend. Tenho experiência consolidada em PHP (Laravel), C# (.NET), JavaScript,
                        MySQL e Docker, aplicando práticas de Clean Code, princípios SOLID e versionamento com Git.

                        No ambiente corporativo, contribuo para a implementação de funcionalidades, manutenção de código
                        legado, análise de falhas e melhorias contínuas nos processos. Tenho familiaridade com estrutura MVC
                        e testes automatizados.

                        Busco constantemente aprimorar minhas habilidades técnicas e oferecer soluções robustas, seguras e
                        escaláveis da forma mais abstrata possível para os sistemas que desenvolvo.
                    </p>
                    <p>
                        Atuo no desenvolvimento e manutenção de sistemas ERP, com foco em estabilidade, performance e
                        escalabilidade. Trabalho no backend (APIs e lógica de negócio) e frontend (interfaces dinâmicas),
                        garantindo uma experiência robusta para o usuário.
                    </p>
                    <h2>🛠️ Tecnologias & Ferramentas</h2>

                    <ol>
                        <li>
                            - 💻 PHP (Laravel), C#, .NET, JavaScript (jQuery, Blade)
                        </li>
                        <li>
                            - 🛢️ MySQL
                        </li>
                        <li>- 🐳 Docker</li>
                        <li>- 🧪 PHPUnit, Testes Unitários</li>
                        <li>- 🔄 Git, GitHub</li>
                        <li>- 🎯 SOLID, Clean Code</li>
                    </ol>
                    <h3>🎓 Formação Acadêmica</h3>
                    <p>
                        Formações realizadas nas faculdades Unopar e Unicv
                    </p>
                    <ul>
                        <li>👨‍🎓 Análise e Desenvolvimento de Sistemas</li>
                        <li>🎓 Pós-graduação em Banco de Dados</li>
                    </ul>

                    <h3>🏢 Experiência Atual</h3>
                    <p>
                        Infinit Soluções** – Full Stack Developer
                    </p>
                    <ul>
                        <li>📍 Maringá - PR · Híbrido </li>
                        <li>🕒 Jan/2025 – Atualmente</li>
                    </ul>
                    <p>
                        Atuo no desenvolvimento e manutenção de sistemas ERP, com foco em estabilidade, performance e
                        escalabilidade. Trabalho no backend (APIs e lógica de negócio) e frontend (interfaces dinâmicas),
                        garantindo uma experiência robusta para o usuário.
                    </p>

                </div>
            </div>
        </div>
    </div>

@endsection
