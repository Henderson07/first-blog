<header class="navigation">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light px-0">

            {{-- LOGO --}}
            <a class="navbar-brand py-0" href="/">
                <img class="img-fluid" src="{{ blogInfo()->blog_logo }}" style="max-width: 100px"
                    alt="{{ blogInfo()->blog_name }}">
            </a>

            {{-- MOBILE TOGGLER --}}
            <button class="navbar-toggler border-0 ml-auto" type="button"
                data-toggle="collapse" data-target="#navbarMain">
                <span class="navbar-toggler-icon"></span>
            </button>

            {{-- NAVIGATION + SEARCH + LOGIN (COLLAPSE) --}}
            <div class="collapse navbar-collapse" id="navbarMain">

                {{-- NAV MENU (CENTER) --}}
                <ul class="navbar-nav mx-auto mt-3 mt-lg-0">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">Sobre mim</a>
                    </li>

                    {{-- Categorias nível 1 --}}
                    @foreach (\App\Models\Category::whereHas('subcategories', fn($q) => $q->whereHas('posts'))
                    ->orderBy('ordering')->get() as $category)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                            {{ $category->category_name }}
                        </a>
                        <div class="dropdown-menu">
                            @foreach (\App\Models\SubCategory::where('parent_category', $category->id)
                            ->whereHas('posts')->orderBy('ordering')->get() as $subcategory)
                            <a class="dropdown-item"
                                href="{{ route('category_posts', $subcategory->slug) }}">
                                {{ $subcategory->subcategory_name }}
                            </a>
                            @endforeach
                        </div>
                    </li>
                    @endforeach

                    {{-- Categorias nível 0 --}}
                    @foreach (\App\Models\SubCategory::where('parent_category', 0)
                    ->whereHas('posts')->orderBy('ordering')->get() as $subcategory)
                    <li class="nav-item">
                        <a class="nav-link"
                            href="{{ route('category_posts', $subcategory->slug) }}">
                            {{ $subcategory->subcategory_name }}
                        </a>
                    </li>
                    @endforeach

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">Contato</a>
                    </li>

                </ul>

                {{-- SEARCH BAR (RIGHT) --}}
                <form action="{{ route('search_posts') }}"
                    class="search d-none d-lg-block mr-3"
                    style="border-radius: 5px;">
                    <input id="search-query" name="query" type="search"
                        value="{{ Request('query') }}"
                        placeholder="Search..." autocomplete="off">
                </form>

                {{-- LOGIN BUTTON (FAR RIGHT) --}}
                <a href="{{ route('author.login') }}"
                    class="btn btn-outline-primary d-none d-lg-block">
                    Login
                </a>

                {{-- MOBILE SEARCH + LOGIN --}}
                <div class="d-lg-none mt-3">
                    <form action="{{ route('search_posts') }}" class="mb-3">
                        <input class="form-control" type="search"
                            name="query" value="{{ Request('query') }}"
                            placeholder="Search..." autocomplete="off">
                    </form>

                    <a href="{{ route('author.login') }}"
                        class="btn btn-primary btn-block">
                        Login
                    </a>
                </div>

            </div>

        </nav>
    </div>
</header>