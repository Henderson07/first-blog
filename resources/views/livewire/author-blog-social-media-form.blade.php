<div>
    @if (Session::get('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    @if (Session::get('error'))
        <div class="alert alert-error">
            {{ Session::get('error') }}
        </div>
    @endif
    <form method="post" wire:submit.prevent="updateBlogSocialMedia()">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="" class="form-label">Facebook</label>
                    <input type="text" class="form-control" placeholder="Insira a url do facebook"
                        wire:model="facebook_url">
                    <span class="text-danger">
                        @error('facebook_url')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="" class="form-label">Instagram</label>
                    <input type="text" class="form-control" placeholder="Insira a url do instagram"
                        wire:model="instagram_url">
                    <span class="text-danger">
                        @error('instagram_url')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="" class="form-label">youtube</label>
                    <input type="text" class="form-control" placeholder="Insira a url do youtube"
                        wire:model="youtube_url">
                    <span class="text-danger">
                        @error('youtube_url')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="" class="form-label">linkeIn</label>
                    <input type="text" class="form-control" placeholder="Insira a url do linkeIn"
                        wire:model="linkedin_url">
                    <span class="text-danger">
                        @error('linkedin_url')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>
        </div>
        <button class="btn btn-primary">Salvar alterações</button>
    </form>
</div>
