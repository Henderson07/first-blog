@extends('frontend.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Bem vindo ao Blog')
@section('content')

<div class="row">
    <div class="col-12">
        <h1 class="mb-4 border-bottom border-primary d-inline-block">{{ $category->subcategory_name }}</h1>
    </div>
    <div class="col-lg-8 mb-5 mb-lg-0">
        <div class="row">
            @forelse ($posts as $item)
            <div class="col-md-6 mb-4">
                <article class="card article-card article-card-sm h-100">
                    <a href="{{ route('read_post', $item->post_slug) }}">
                        <div class="card-image">
                            <div class="post-info"> <span
                                    class="text-uppercase">{{ date_formatter($item->created_at) }}</span>
                                <span
                                    class="text-uppercase">{{ readDuration($item->post_title, $item->post_content) }}
                                    @choice('min|mins', readDuration($item->post_title, $item->post_content))</span>
                            </div>
                            <img loading="lazy" decoding="async"
                                src="/storage/images/post_images/thumbnails/resized_{{ $item->featured_image }}"
                                alt="Post Thumbnail" class="w-100" width="420" height="280">
                        </div>
                    </a>
                    <div class="card-body px-0 pb-0">
                        <h2><a class="post-title"
                                href="{{ route('read_post', $item->post_slug) }}">{{ $item->post_title }}</a></h2>
                        <p class="card-text">{!! Str::ucfirst(words($item->post_content, 12)) !!}</p>
                        <div class="content"> <a class="read-more-btn"
                                href="{{ route('read_post', $item->post_slug) }}">Artigo completo</a>
                        </div>
                    </div>
                </article>
            </div>
            @empty
            <span class="text-danger">Nenhum post encontrado nessa categoria</span>
            @endforelse
        </div>
        <div class="col-12">
            <div class="row">
                <div class="col-12">
                    {{ $posts->appends(request()->input())->links('custom_pagination') }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="widget-blocks">
            <div class="row">
                <div class="col-lg-12">
                    <div class="widget">
                        <div class="widget-body">
                            <img loading="lazy" decoding="async" src="/frontend/images/author.png" alt="About Me"
                                class="w-100 author-thumb-sm d-block">
                            <h2 class="widget-title my-3">Henderson Camilo</h2>
                            <p class="mb-3 pb-2">Sou desenvolvedor Full Stack com foco no desenvolvimento de sistemas
                                ERP web, atuando tanto no backend quanto no frontend. Tenho experiência consolidada em
                                PHP (Laravel), C# (.NET), JavaScript, MySQL e Docker, aplicando práticas de Clean Code,
                                princípios SOLID e versionamento com Git.</p> <a href="{{ route('about') }}"
                                class="btn btn-sm btn-outline-primary">Saber mais</a>
                        </div>
                    </div>
                </div>
                @if (recommended_posts())
                <div class="col-lg-12 col-md-6">
                    <div class="widget">
                        <h2 class="section-title mb-3">Recomendados</h2>
                        <div class="widget-body">
                            <div class="widget-list">
                                @foreach (latest_sidebar_posts() as $item)
                                <a class="media align-items-center"
                                    href="{{ route('read_post', $item->post_slug) }}">
                                    <img loading="lazy" decoding="async"
                                        src="/storage/images/post_images/thumbnails/thumb_{{ $item->featured_image }}"
                                        alt="Post Thumbnail" class="w-100">
                                    <div class="media-body ml-3">
                                        <h3 style="margin-top:-5px">{{ $item->post_title }}</h3>
                                        <p class="mb-0 small">{!! Str::ucfirst(words($item->post_content, 7)) !!}</p>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <x-categories-list />
                <x-tags-list />
            </div>
        </div>
    </div>
</div>

@endsection