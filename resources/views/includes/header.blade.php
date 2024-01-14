<nav class="navbar navbar-expand-md navbar-light bg-light">
    <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand">
            {{ config('app.name') }}
        </a>

        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar-collapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link " aria-current="page">
                        {{ __('Главная') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('leads') }}" class="nav-link " aria-current="page">
                        {{ __('Все лиды') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('histories') }}" class="nav-link " aria-current="page">
                        {{ __('История лидов') }}
                    </a>
                </li>


            </ul>

        </div>
    </div>
</nav>
