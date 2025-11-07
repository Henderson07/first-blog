<div>
    @if (Session::get('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif

    @if (Session::get('error'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    <form method="post" wire:submit.prevent="updateGeneralSettings()">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="" class="form-label">Nome do blog</label>
                    <input type="text" class="form-control" placeholder="Insira um nome" wire:model="blog_name">
                    <span class="text-danger">
                        @error('blog_name')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Endereço de e-mail</label>
                    <input type="text" class="form-control" placeholder="Insira um e-mail" wire:model="blog_email">
                    <span class="text-danger">
                        @error('blog_email')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Descrição do blog</label>
                    <textarea class="form-control" id="" cols="3" rows="3" wire:model="blog_description"></textarea>
                    <span class="text-danger">
                        @error('blog_description')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <button class="btn btn-primary">Salvar alterações</button>
            </div>
        </div>
    </form>
</div>
