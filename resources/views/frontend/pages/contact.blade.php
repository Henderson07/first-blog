@extends('frontend.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Contato')
@section('content')

<main>
    <section class="section">
        <div class="container">
            <div class="row">
                <!-- Breadcrumb -->
                <div class="col-12">
                    <div class="breadcrumbs mb-4">
                        <a href="{{ route('home') }}">Home</a>
                        <span class="mx-1">/</span>
                        <span>Contato</span>
                    </div>
                </div>

                <!-- Informações de contato -->
                <div class="col-lg-4">
                    <div class="pr-0 pr-lg-4">
                        <div class="content">
                            <p>Entre em contato comigo preenchendo o formulário ou usando um dos meios abaixo.
                                Responderei o mais rápido possível.</p>
                            <div class="mt-5">
                                <p class="h3 mb-3 font-weight-normal">
                                    <a class="text-dark" href="mailto:henderson.larablog@gmail.com">
                                        henderson.larablog@gmail.com
                                    </a>
                                </p>
                                <p class="mb-3">
                                    <a class="text-dark" href="tel:+55449998324805">
                                        +55 (44) 9 99832-4805
                                    </a>
                                </p>
                                <p class="mb-2">
                                    R. Castro Alves, 1390 — Brasil
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Formulário de contato -->
                <div class="col-lg-6 mt-4 mt-lg-0">
                    <form method="POST" action="{{ route('contact.send') }}" id="contactForm" class="row">
                        @csrf
                        <div class="col-md-6">
                            <input type="text" class="form-control mb-4" placeholder="Seu nome" name="name" id="name" required>
                        </div>
                        <div class="col-md-6">
                            <input type="email" class="form-control mb-4" placeholder="Seu e-mail" name="email" id="email" required>
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control mb-4" placeholder="Assunto" name="subject" id="subject" required>
                        </div>
                        <div class="col-12">
                            <textarea name="message" id="message" class="form-control mb-4" placeholder="Digite sua mensagem..." rows="5" required></textarea>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-outline-primary" type="submit">Enviar mensagem</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('contactForm');

        if (!form) return; // segurança extra

        form.addEventListener('submit', async function(e) {
            e.preventDefault();
            const formData = new FormData(form);

            try {
                const response = await fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value
                    },
                    body: formData
                });

                const result = await response.json();

                if (result.success) {
                    toastr.success(result.message || 'Mensagem enviada com sucesso!');
                    form.reset();
                } else {
                    toastr.warning(result.message || 'Falha ao enviar mensagem.');
                }
            } catch (error) {
                console.error(error);
                toastr.error('Erro ao enviar. Tente novamente.');
            }
        });
    });
</script>
@endpush


@endsection