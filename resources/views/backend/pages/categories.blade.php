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

        window.addEventListener('deleteCategory', function(event) {
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
                    livewire.emit('deleteCategorytAction', event.detail.id);
                }
            });
        });

        window.addEventListener('deleteSubCategory', function(event) {
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
                    livewire.emit('deleteSubCategorytAction', event.detail.id);
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

        $('table tbody#sortable_category').sortable({
            update: function(event, ui) {
                $(this).children().each(function(index) {
                    if ($(this).attr("data-ordering") != (index + 1)) {
                        $(this).attr("data-ordering", (index + 1)).addClass("updated");
                    }
                });
                var positions = [];
                $(".updated").each(function() {
                    positions.push([$(this).attr("data-index"), $(this).attr("data-ordering")]);
                    $(this).removeClass("updated");
                });
                // alert(positions);
                window.livewire.emit("updateCategoryOrdering", positions);
            }
        })
        $('table tbody#sortable_subcategory').sortable({
            update: function(event, ui) {
                $(this).children().each(function(index) {
                    if ($(this).attr("data-ordering") != (index + 1)) {
                        $(this).attr("data-ordering", (index + 1)).addClass("updated");
                    }
                });
                var positions = [];
                $(".updated").each(function() {
                    positions.push([$(this).attr("data-index"), $(this).attr("data-ordering")]);
                    $(this).removeClass("updated");
                });
                // alert(positions);
                window.livewire.emit("updateSubCategoryOrdering", positions);
            }
        })
    </script>
@endpush
