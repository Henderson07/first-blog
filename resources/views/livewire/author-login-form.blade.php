<div>
    @if (Session::get('fail'))
    <div class="alert alert-danger">
        {{ Session::get('fail') }}
    </div>
    @endif
    @if (Session::get('success'))
    <div class="alert alert-success">
        {!! Session::get('success') !!}
    </div>
    @endif
    <form class="card card-md" wire:submit.prevent="LoginHandler()" method="post" autocomplete="off" novalidate="">
        <div class="card-body">
            <h2 class="h2 text-center mb-4">Faça login na sua conta</h2>
            <div class="mb-3">
                <label class="form-label">Endereço de e-mail ou nome de usuário</label>
                <input type="text" class="form-control" placeholder="Insira o e-mail ou nome de usuário"
                    autocomplete="off" wire:model="login_id">
                @error('login_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-2">
                <label class="form-label">
                    Insira sua senha
                    <span class="form-label-description">
                        <a href="{{ route('author.forgot-password') }}">Esqueci a senha</a>
                    </span>
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
            <div class="mb-2">
                <label class="form-check">
                    <input type="checkbox" class="form-check-input">
                    <span class="form-check-label">Lembre-se de mim neste dispositivo</span>
                </label>
            </div>
            <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">Entrar</button>
            </div>
        </div>
    </form>
</div>
<div class="text-center text-secondary mt-3">
    <font dir="auto" style="vertical-align: inherit;">
        <font dir="auto" style="vertical-align: inherit;">Ainda não tem uma conta? </font>
    </font><a href="{{ route('author.first-login') }}" tabindex="-1">
        <font dir="auto" style="vertical-align: inherit;">
            <font dir="auto" style="vertical-align: inherit;">Cadastre-se</font>
        </font>
    </a>
</div>