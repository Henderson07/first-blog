@extends('backend.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Autores')
@section('content')
    @livewire('authors')
@endsection
@push('scripts')
    <script>
        $(window).on('hidden.bs.modal', function() {
            livewire.emit('resetForms');
        });

        window.addEventListener('hide_add_author_modal', function(event) {
            $('#add_author_modal').modal('hide');
        });

        window.addEventListener('showEditAuthorModal', function(event) {
            $('#edit_author_modal').modal('show');
        });

        window.addEventListener('closeUpdateAuthorModal', function(event) {
            $('#edit_author_modal').modal('hide');
        });

        window.addEventListener('deleteAuthor', function(event) {
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
                    livewire.emit('deleteAuthorAction', event.detail.id);
                }
            });
        })
    </script>
@endpush
