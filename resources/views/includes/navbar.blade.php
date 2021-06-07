<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand h3" href="{{ url('/') }}">Tenisové kurty Křelov</a>
        <button class="navbar-toggler" type="button" 
            data-bs-toggle="collapse" 
            data-bs-target="#navbarScroll" 
            aria-controls="navbarScroll" 
            aria-expanded="false" 
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse"></div>

        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Úvod</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('reservations.create') }}">Vytvořit rezervaci</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('reservations.index') }}">Seznam rezervací</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Kontakt</a>
            </li>
            </ul>
        </div>
    </div>
</nav>