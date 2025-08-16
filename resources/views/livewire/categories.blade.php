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

    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Categorias
                </h2>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6 mb-2">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <h4>
                            Categorias
                        </h4>
                        <li class="nav-items ms-auto">
                            <a href="" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                data-bs-target="#categories_modal">
                                Adicionar categoria
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table table-striped">
                            <thead>
                                <tr>
                                    <th>Descrição</th>
                                    <th>N° Subcategoria</th>
                                    <th class="w-1"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $category)
                                    <tr>
                                        <td>{{ $category->category_name }}</td>
                                        <td class="text-muted">
                                            {{ $category->subcategories->count() }}
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="" class="btn btn-sm btn-primary"
                                                    wire:click.prevent='editCategory({{ $category->id }})'>Editar</a>
                                                <a href="" class="btn btn-sm btn-danger">Excluir</a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3"><span class="text-danger">Nenhuma categoria
                                                encontrada.</span>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-6 mb-2">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <h4>
                            Categorias
                        </h4>
                        <li class="nav-items ms-auto">
                            <a href="" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                data-bs-target="#subcategories_modal">
                                Adicionar Subcategoria
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table table-striped">
                            <thead>
                                <tr>
                                    <th>Descrição Subcategoria</th>
                                    <th>Categoria Principal</th>
                                    <th>N° Publicações</th>
                                    <th class="w-1"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($subcategories as $subcategory)
                                    <tr>
                                        <td>{{ $subcategory->subcategory_name }}</td>
                                        <td class="text-muted">
                                            {{ $subcategory->parentcategory->category_name }}
                                        </td>
                                        <td>
                                            {{ $subcategory->posts->count() }}
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="" class="btn btn-sm btn-primary"
                                                    wire:click.prevent='editSubCategory({{ $subcategory->id }})'>Editar</a>
                                                &nbsp;
                                                <a href="" class="btn btn-sm btn-danger">Excluir</a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">
                                            <span class="text-danger">Nenhuma subcategoria encontrada</span>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal modal-blur fade" id="categories_modal" tabindex="-1" role="dialog"
        aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form class="modal-content" method="POST"
                @if ($updateCategoryMode) wire:submit.prevent='updateCategory()'
                @else
                    wire:submit.prevent='addCategory()' @endif>
                <div class="modal-header">
                    <h5 class="modal-title">{{ $updateCategoryMode ? 'Alterar Categoria' : 'Adicionar Categoria' }}</h5>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>
                <div class="modal-body">
                    @if ($updateCategoryMode)
                        <input type="hidden" wire:model='selected_category_id'>
                    @endif
                    <div class="mb-3">
                        <label class="form-label">Nome da categoria</label>
                        <input type="text" class="form-control" placeholder="Insira o nome da categoria"
                            wire:model='category_name'>
                        <span class="text-danger">
                            @error('category_name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn me-auto" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit"
                        class="btn btn-primary">{{ $updateCategoryMode ? 'Alterar' : 'Salvar' }}</button>
                </div>
            </form>
        </div>
    </div>

    <div wire:ignore.self class="modal modal-blur fade" id="subcategories_modal" tabindex="-1" role="dialog"
        aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form class="modal-content" method="POST"
                @if ($updateSubCategoryMode) wire:submit.prevent='updateSubCategory()'
                @else
                wire:submit.prevent='addSubCategory' @endif>
                <div class="modal-header">
                    <h5 class="modal-title">
                        {{ $updateSubCategoryMode ? 'Alterar SubCategoria' : 'Adicionar SubCategoria' }}</h5>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>
                <div class="modal-body">
                    @if ($updateSubCategoryMode)
                        <input type="hidden" wire:model='selected_category_id'>
                    @endif
                    <div class="mb-3">
                        <div class="form-label">Categoria principal</div>
                        <select class="form-select" wire:model='parent_category'>
                            @if (!$updateSubCategoryMode)
                                <option value="">Nenhum selecionado</option>
                            @endif
                            @foreach (\App\Models\Category::all() as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">
                            @error('parent_category')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nome da Subcategoria</label>
                        <input type="text" class="form-control" placeholder="Insira o nome da subcategoria"
                            wire:model='subcategory_name'>
                        <span class="text-danger">
                            @error('subcategory_name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn me-auto" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit"
                        class="btn btn-primary">{{ $updateSubCategoryMode ? 'Alterar' : 'Salvar' }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
