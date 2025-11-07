<div>
    @if (Session::get('success'))
    <div class="alert alert-success">
        {!! Session::get('success') !!}
    </div>
    @endif
    @if (Session::get('error'))
    <div class="alert alert-danger">
        {!! Session::get('error') !!}
    </div>
    @endif
    <div class="page-header d-print-none mb-2">
        <div class="container-xl">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Autores
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="d-flex">
                        <input type="search" class="form-control d-inline-block w-9 me-3"
                            placeholder="Procurar pessoas…" wire:model="search">
                        <a href="#" class="btn btn-primary" data-bs-target="#add_author_modal"
                            data-bs-toggle="modal">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 5l0 14"></path>
                                <path d="M5 12l14 0"></path>
                            </svg>
                            Novo autor
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row row-cards">
        @forelse ($authors as $author)
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body p-4 text-center">
                    <span class="avatar avatar-xl mb-3 rounded-circle"
                        style="background-image: url('{{ asset($author->picture) }}')"></span>
                    <h3 class="m-0 mb-1"><a href="#">{{ $author->name }}</a></h3>
                    <div class="text-muted">{{ $author->email }}</div>
                    <div class="mt-3">
                        <span class="badge bg-purple-lt">{{ $author->authorType->name }}</span>
                    </div>
                </div>
                <div class="d-flex">
                    <a href="#" wire:click.prevent='editAuthor({{ $author }})'
                        class="card-btn">Editar</a>
                    <a href="#" wire:click.prevent='deleteAuthor({{ $author }})'
                        class="card-btn">Excluir autor</a>
                </div>
            </div>
        </div>
        @empty
        <span class="text-danger">Nenhum autor encontrado!</span>
        @endforelse
    </div>

    <div class="row mt-4">
        {{ $authors->links('livewire::bootstrap') }}
    </div>

    {{-- Modal Add author --}}
    <div wire:ignore.self class="modal modal-blur fade" id="add_author_modal" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Adicionar autor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="addAuthor()" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Nome</label>
                            <input type="text" class="form-control" name="name" placeholder="Insira um nome"
                                wire:model="name">
                            <span class="text-danger">
                                @error('name')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">E-mail</label>
                            <input type="email" class="form-control" name="email" placeholder="Insira um e-mail"
                                wire:model="email">
                            <span class="text-danger">
                                @error('email')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Usuário</label>
                            <input type="text" class="form-control" name="username" placeholder="Insira um usuário"
                                wire:model="username">
                            <span class="text-danger">
                                @error('username')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Tipo do autor</label>
                            <div class="">
                                <select name="" id="" class="form-select" wire:model="author_type">
                                    <option value="">-- Nenhum item selecionado --</option>
                                    @foreach (\App\Models\Type::all() as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">
                                    @error('author_type')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-label">É editor direto?</div>
                            <div>
                                <label for="" class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="direct_publisher"
                                        value="0" wire:model="direct_publisher">
                                    <span class="form-check-label">Não</span>
                                </label>
                                <label for="" class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="direct_publisher"
                                        value="1" wire:model="direct_publisher">
                                    <span class="form-check-label">Sim</span>
                                </label>
                                <span class="text-danger">
                                    @error('direct_publisher')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn me-auto" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Adicionar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- /Modal Add Author --}}

    {{-- Modal Edit Author --}}
    <div wire:ignore.self class="modal modal-blur fade" id="edit_author_modal" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar autor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="updateAuthor()" method="POST">
                        <input type="hidden" wire:model="selected_author_id">
                        <div class="mb-3">
                            <label class="form-label">Nome</label>
                            <input type="text" class="form-control" name="name" placeholder="Insira um nome"
                                wire:model="name">
                            <span class="text-danger">
                                @error('name')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">E-mail</label>
                            <input type="email" class="form-control" name="email" placeholder="Insira um e-mail"
                                wire:model="email">
                            <span class="text-danger">
                                @error('email')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Usuário</label>
                            <input type="text" class="form-control" name="username"
                                placeholder="Insira um usuário" wire:model="username">
                            <span class="text-danger">
                                @error('username')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Tipo do autor</label>
                            <div class="">
                                <select name="" id="" class="form-select" wire:model="author_type">
                                    <option value="">-- Nenhum item selecionado --</option>
                                    @foreach (\App\Models\Type::all() as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">
                                    @error('author_type')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-label">É editor direto?</div>
                            <div>
                                <label for="" class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="direct_publisher"
                                        value="0" wire:model="direct_publisher">
                                    <span class="form-check-label">Não</span>
                                </label>
                                <label for="" class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="direct_publisher"
                                        value="1" wire:model="direct_publisher">
                                    <span class="form-check-label">Sim</span>
                                </label>
                                <span class="text-danger">
                                    @error('direct_publisher')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-label">
                                Bloqueado
                            </div>
                            <label for="" class="form-check form-switch">
                                <input type="checkbox" checked="" class="form-check-input" wire:model="blocked">
                                <span class="form-check-label"></span>
                            </label>
                        </div>
                        <div class="modal-footer">
                            <button class="btn me-auto" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- /Modal Edit Author --}}
</div>