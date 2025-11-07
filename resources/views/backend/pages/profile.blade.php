@extends('backend.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Perfil')
@section('content')
    <style>
        /* Estilos para o modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
        }

        .modal-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border-radius: 5px;
        }

        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 24px;
            cursor: pointer;
        }

        /* Estilos para o botão de recorte */
        #cropButton {
            display: block;
            margin-top: 10px;
        }
    </style>
    @livewire('author-profile-header')
    <hr>
    <div class="row">
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
                    <li class="nav-item">
                        <a href="#tabs-details" class="nav-link active" data-bs-toggle="tab">Detalhes pessoais</a>
                    </li>
                    <li class="nav-item">
                        <a href="#tabs-password" class="nav-link" data-bs-toggle="tab">Alterar senha</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active show" id="tabs-details">
                        @livewire('author-personal-details')
                    </div>
                    <div class="tab-pane" id="tabs-password">
                        <h4>Alterar senha</h4>
                        <div>
                            @livewire('author-change-password-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        // $(document).on('change', 'input#changeAuthorPictureFile', function() {
        //     console.log('change');
        //     var fileInput = this;
        //     var teste = document.getElementById('changeAuthorPictureFile');


        //     // Verifique se um arquivo foi selecionado
        //     if (teste.files.length > 0) {
        //         var formData = new FormData();
        //         formData.append('file', teste.files[0]);
        //         console.log('this', this, 'tesste', teste, 'form', formData, 'file', teste.files[0])

        //         const url = '/author/change-profile-picture';

        //         $.ajax({
        //             url: url,
        //             type: 'POST',
        //             dataType: 'json',
        //             contentType: 'application/json', // Define o tipo de conteúdo para JSON
        //             data: JSON.stringify({
        //                 file: teste.files[0],
        //             }),
        //             headers:{
        //                 'X-CSRF-TOKEN': '{{ csrf_token() }}'
        //             },
        //             success: function(data) {
        //                 console.log('entrei success');
        //             },
        //             error: function(error) {
        //                 console.log('entrei erro', error)
        //             }
        //         })
        //     }
        // })
        // $('#changeAuthorPictureFile').ijaboCropTool({
        //     preview: '',
        //     setRatio: 1,
        //     allowedExtensions: ['jpg', 'jpeg', 'png'],
        //     buttonsText: ['CROP', 'QUIT'],
        //     buttonsColor: ['#30bf7d', '#ee5155', -15],
        //     processUrl: '/author/change-profile-picture',
        //     withCSRF: ['_token', '{{ csrf_token() }}'],
        //     onSuccess: function(message, element, status) {
        //         alert(message);

        //     },
        //     onError: function(message, element, status) {
        //         alert(message);
        //         console.log(message,element, status)
        //     }
        // });
    </script>
@endpush
