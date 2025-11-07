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
    <form method="post" wire:submit.prevent="ChangePassword()">
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="password" class="form-label">Senha atual:</label>
                    <input type="password" class="form-control" placeholder="Senha atual" wire:model="current_password">
                    <span class="text-danger">
                        @error('current_password')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="new_password" class="form-label">Nova senha:</label>
                    <input type="password" class="form-control" placeholder="Nova senha" wire:model="new_password">
                    <span class="text-danger">
                        @error('new_password')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="confirm_new_password" class="form-label">Confirmar nova senha:</label>
                    <input type="password" class="form-control" placeholder="Confirmar nova senha"
                        wire:model="confirm_new_password">
                    <span class="text-danger">
                        @error('confirm_new_password')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Alterar senha</button>
    </form>
</div>
