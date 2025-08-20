@extends('backend.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Adicionar novo post')
@section('content')

    <style>
        /* Esconde os avisos vermelhos do CKEditor */
        .cke_notifications_area,
        .cke_notification_warning,
        .cke_notification_important {
            display: none !important;
        }
    </style>

    <div class="page-header d-print-none mb-2">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Editar Post
                </h2>
            </div>
        </div>
    </div>

    <form action="{{ route('author.posts.update-post', ['post_id' => Request('post_id')]) }}" method="post" id="editPostForm"
        enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-9">
                        <div class="mb-3">
                            <label class="form-label">Titulo</label>
                            <input type="text" class="form-control" name="post_title" placeholder="Titulo do Post"
                                value="{{ $post->post_title }}">
                            <span class="text-danger error-text post_title_error"></span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">
                                Postar conteúdo</label>
                            <textarea class="ckeditor form-control" name="post_content" rows="6" placeholder="Content.." id="post_content">
                                {!! $post->post_content !!}
                            </textarea>
                            <span class="text-danger error-text post_content_error"></span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <div class="form-label">Categoria do Post</div>
                            <select class="form-select" name="post_category">
                                <option value="">Nenhum selecionado</option>
                                @foreach (\App\Models\SubCategory::all() as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $post->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->subcategory_name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger error-text post_category_error"></span>
                        </div>
                        <div class="mb-3">
                            <div class="form-label">Imagem em Destaque</div>
                            <input type="file" class="form-control" name="featured_image" id="featured_image">
                            <span class="text-danger error-text featured_image_error"></span>
                        </div>
                        <div class="image_holder mb-2" style="width: 100%;">
                            <img src="/storage/images/post_images/thumbnails/resized_{{ $post->featured_image }}"
                                alt="Imagem em destaque" class="img-thumbnail w-100" id="image-previewer"
                                style="height: auto;">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Post tags</label>
                            <input type="text" class="form-control" name="post_tags" value="{{ $post->post_tags }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Editar Post</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
    <!-- Configurações globais do CKEditor ANTES de carregar o script -->
    <script>
        window.CKEDITOR_BASEPATH = '/ckeditor/';
    </script>

    <script src="/ckeditor/ckeditor.js"></script>

    <script>
        // Desabilita os avisos internos do CKEditor
        CKEDITOR.error = function() {};
        CKEDITOR.warn = function() {};

        // Inicializa o editor normalmente
        CKEDITOR.replace('conteudo');
    </script>

    <script>
        CKEDITOR.disableAutoInline = true;

        $(document).ready(function() {
            // Configuração do preview da imagem
            const fileInput = $('input[name="featured_image"]');
            const imagePreview = $('#image-previewer');

            // Verifica se já há uma imagem definida (do banco de dados)
            const defaultImage = imagePreview.attr('src');

            // Evento de mudança no input file
            fileInput.on('change', function(e) {
                if (this.files && this.files[0]) {
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        imagePreview.attr('src', e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                } else {
                    // Se não selecionou arquivo, volta para a imagem padrão
                    imagePreview.attr('src', defaultImage);
                }
            });

            $('form#editPostForm').on('submit', function(e) {
                e.preventDefault();
                toastr.remove();
                var post_content = CKEDITOR.instances.post_content.getData();
                var form = this;
                var formdata = new FormData(form);
                formdata.append('post_content', post_content);

                $.ajax({
                    url: $(form).attr('action'),
                    method: $(form).attr('method'),
                    data: formdata,
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function() {
                        $(form).find('span.error-text').text('');
                    },
                    success: function(response) {
                        toastr.remove();
                        if (response.code == 1) {
                            // REMOVA ESTA LINHA: $(form)[0].reset();

                            toastr.success(response.msg);

                            // Atualiza apenas os campos necessários (opcional)
                            if (response.post) {
                                // Se o backend retornar os dados atualizados
                                $('input[name="post_title"]').val(response.post.post_title);
                                $('select[name="post_category"]').val(response.post
                                    .category_id);
                                CKEDITOR.instances.post_content.setData(response.post
                                    .post_content);
                            }

                            // Atualize outros elementos da página conforme necessário
                            // Exemplo: atualizar o título exibido na página
                            // $('#post-title-display').text(response.post.post_title);

                        } else {
                            toastr.error(response.msg);
                        }
                    },
                    error: function(xhr, status, error) {
                        toastr.remove();
                        if (xhr.status === 422) {
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(prefix, val) {
                                $('form').find('span.' + prefix + '_error').text(val[
                                    0]);
                            });
                        } else {
                            toastr.error('Ocorreu um erro: ' + (xhr.responseJSON?.message ||
                                error));
                        }
                    }
                });
            });
        });
    </script>
@endpush
