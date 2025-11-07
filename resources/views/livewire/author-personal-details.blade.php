<div>
    @if (session('success'))
        <div class="alert alert-success" id="success-alert">
            {{ session('success') }}
        </div>
    @endif
    <form method="post" wire:submit.prevent="UpdateDetails()">
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input name="" placeholder="Nome" type="text" class="form-control" wire:model="name">
                    <span class="text-danger">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="username" class="form-label">Usuário</label>
                    <input name="username" placeholder="Usuário" type="text" class="form-control"
                        wire:model="username">
                    <span class="text-danger">
                        @error('username')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input name="" placeholder="Email" type="email" class="form-control" disabled
                        wire:model="email">
                    <span class="text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>
            <div class="mb-3">
                <label for="biography" class="form-label">Biografia</label>
                <textarea name="" cols="30" rows="10" class="form-control" placeholder="Biografia..."
                    wire:model='biography'></textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
