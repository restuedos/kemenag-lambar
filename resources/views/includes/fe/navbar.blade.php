<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
    <div class="container">
        @foreach ($configs as $config)
            <a class="navbar-brand" href="/">
                <img src="{{ asset('storage/' . $config->logo) }}" alt="" width="50" height="50"
                    class="d-inline-block align-text-top">
            </a>
        @endforeach
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @foreach ($categories as $k => $category)
                    @if (count($category->categories))
                        @include('includes.fe.submenu')
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ $category->url }}">{{ $category->name }}</a>
                    @endif
                    </li>
                @endforeach
            </ul>
            <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"
                class="btn btn-brand ms-lg-3">Contact</a>
        </div>
    </div>
</nav>
