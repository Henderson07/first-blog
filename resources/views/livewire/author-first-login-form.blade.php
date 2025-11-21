<div>
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form class="card card-md" wire:submit.prevent="firstLoginHandler()">
        <div class="card-body">
            <h2 class="card-title text-center mb-4">Crie sua conta</h2>

            <div class="mb-3">
                <label class="form-label">Nome</label>
                <input type="text" class="form-control" placeholder="Seu nome" wire:model="name">
                <div class="text-danger">@error('name'){{ $message }}@enderror</div>
            </div>

            <div class="mb-3">
                <label class="form-label">E-mail</label>
                <input type="email" class="form-control" placeholder="Seu email" wire:model="email">
                <div class="text-danger">@error('email'){{ $message }}@enderror</div>
            </div>

            <div class="mb-3">
                <label class="form-label">
                    Senha
                </label>
                <div class="input-group input-group-flat">
                    <input id="password" type="password" class="form-control" placeholder="Sua senha"
                        autocomplete="off" wire:model="password">
                    <span class="input-group-text d-flex align-items-center justify-content-center"
                        style="padding: 7px;">
                        <button type="button" class="btn btn-link link-secondary border-0 p-0"
                            onclick="togglePassword()" data-bs-toggle="tooltip" aria-label="Mostrar senha"
                            data-bs-original-title="Mostrar senha">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="20" height="20"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round" style="margin: 0;">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                <path
                                    d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6">
                                </path>
                            </svg>
                        </button>
                    </span>

                </div>
                @error('password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <label class="form-check mb-3">
                <input type="checkbox" class="form-check-input" wire:model="agree">
                <span class="form-check-label">
                    Concordo com os <a href="{{ route('author.terms-of-service') }}">termos e política</a>.
                </span>
            </label>

            <div class="text-danger mt-1">
                @error('agree') {{ $message }} @enderror
            </div>

            <button class="btn btn-primary w-100" type="submit">Criar Conta</button>
        </div>
    </form>
</div>