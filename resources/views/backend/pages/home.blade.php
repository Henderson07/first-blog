@extends('backend.layouts.pages-layout')
@section('pageTitle', 'Dashboard')
@section('content')

<div class="page-header mb-4">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">Painel de Controle</h2>
                <p class="text-muted mb-0">Resumo geral do blog</p>
            </div>
        </div>
    </div>
</div>

<div class="container-xl">
    <!-- Cards de estatísticas -->
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h3>{{ $totalPosts ?? 0 }}</h3>
                    <p class="text-muted">Posts</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h3>{{ $totalCategorias ?? 0 }}</h3>
                    <p class="text-muted">Categorias</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h3>{{ $totalSubCategorias ?? 0 }}</h3>
                    <p class="text-muted">Subcategorias</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h3>{{ $totalAutores ?? 0 }}</h3>
                    <p class="text-muted">Autores</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Gráfico de posts por categoria -->
    <div class="card mb-4 shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">Posts por Categoria</h3>
            <small class="text-muted">Top 6 categorias mais usadas</small>
        </div>
        <div class="card-body d-flex justify-content-center">
            <div style="max-width: 320px; max-height: 320px;">
                <canvas id="categoryChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Últimos posts -->
    <div class="card mb-4 shadow-sm">
        <div class="card-header">
            <h3 class="card-title">Últimos Posts</h3>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Categoria</th>
                        <th>Data</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($latestPosts as $post)
                    <tr>
                        <td>{{ $post->post_title }}</td>
                        <td>{{ $post->author->name ?? '-' }}</td>
                        <td>{{ $post->subcategory->subcategory_name ?? '-' }}</td>
                        <td>{{ $post->created_at->format('d/m/Y') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted p-3">Nenhum post encontrado</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Gráfico (Chart.js) -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('categoryChart').getContext('2d');
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: @json($chartLabels),
                datasets: [{
                    label: 'Posts por Categoria',
                    data: @json($chartData),
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    });
</script>

@endsection