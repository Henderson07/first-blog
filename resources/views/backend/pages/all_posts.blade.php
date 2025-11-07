@extends('backend.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Todos os Posts')
@section('content')


    <div class="page-header d-print-none mb-2">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Todos os Posts
                </h2>
            </div>
        </div>
    </div>

    @livewire('all-posts')
@endsection

@push('scripts')
    <script>
        window.addEventListener('deletePost', function(event) {
            Swal.fire({
                title: event.detail.title,
                imageWidth: 48,
                imageHeight: 48,
                html: event.detail.html,
                showCloseButton: true,
                showCancelButton: true,
                cancelButtonText: 'Cancelar',
                confifrmButtonText: 'Confirmar',
                cancelButtonColor: '#d33',
                confirmButtonColor: '#3085e6',
                width: 400,
                allowOutsideClick: false
            }).then(function(result) {
                if (result.value) {
                    livewire.emit('deletePostAction', event.detail.id);
                }
            });
        });

        window.addEventListener('showToast', function(event) {
            if (typeof toastr !== 'undefined') {
                toastr[event.detail.type](event.detail.message);
            } else {
                alert(event.detail.message); // fallback se toastr não estiver carregado
            }
        });
    </script>
@endpush
