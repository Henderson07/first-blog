<div>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status')['msg'] }}
        </div>
    @endif
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-auto">
                <span class="avatar avatar-md rounded-circle"
                    style="background-image: url('{{ asset($author->picture) }}')">
                </span>
            </div>
            <div class="col-md-6">
                <h2 class="page-title">{{ $author->name }}</h2>
                <div class="page-subtitle">
                    <div class="row">
                        <div class="col-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="3" y1="21" x2="21" y2="21" />
                                <path d="M5 21v-14l8 -4v18" />
                                <path d="M19 21v-10l-6 -4" />
                                <line x1="9" y1="9" x2="9" y2="9.01" />
                                <line x1="9" y1="12" x2="9" y2="12.01" />
                                <line x1="9" y1="15" x2="9" y2="15.01" />
                                <line x1="9" y1="18" x2="9" y2="18.01" />
                            </svg>
                            <a href="#" class="text-reset">@ {{ $author->username }} |
                                {{ $author->authorType->name }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-auto d-md-flex ms-auto">
                <form id="profileForm" action="{{ route('author.change-profile-picture') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <input type="file" name="business_logo" id="business_logo" accept="image/jpeg"
                        style="display: none;" />

                    <button type="button" class="btn btn-primary"
                        onclick="document.getElementById('business_logo').click();">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4" />
                            <line x1="8" y1="9" x2="16" y2="9" />
                            <line x1="8" y1="13" x2="14" y2="13" />
                        </svg>
                        Alterar foto
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>
<script>
    document.getElementById('business_logo').addEventListener('change', function() {
        if (this.files.length > 0) {
            document.getElementById('profileForm').submit();
        }
    });
</script>
