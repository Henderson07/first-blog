@extends('backend.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Categorias')
@section('content')



    @livewire('categories')

@endsection
@push('scripts')
    <script>
        window.addEventListener('hideCategoriesModal', function(e) {
            $('#categories_modal').modal('hide');
        });

        window.addEventListener('showcategoriesModal', function(e) {
            $('#categories_modal').modal('show');
        });

        window.addEventListener('hideSubCategoriesModal', function(e) {
            $('#subcategories_modal').modal('hide');
        });

        window.addEventListener('showSubCategoriesModal', function(e) {
            $('#subcategories_modal').modal('show');
        });

        $('#categories_modal, #subcategories_modal').on('hidden.bs.modal', function(e) {
            Livewire.emit('resetModalForm');
        });
    </script>
@endpush
