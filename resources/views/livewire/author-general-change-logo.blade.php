<div>
    <form action="{{ route('author.change-blog-logo') }}" method="post" id="changeBlogLogoForm"
        enctype="multipart/form-data">
        @csrf
        <div class="mb-2">
            <input type="file" name="blog_logo" id="blog_logo" accept=".svg, image/*" class="form-control">
        </div>
        <button class="btn btn-primary" type="submit">Alterar logo</button>
    </form>
</div>
