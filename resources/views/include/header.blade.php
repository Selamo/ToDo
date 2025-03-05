<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route("home") }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("logout") }}">Logout</a>
                    </li>
                </ul>

                <!-- Clickable Profile Picture Display -->
                @auth
                    <div class="d-flex align-items-center">
                        <a href="{{ route('profile.picture.edit') }}">
                            @if(Auth::user()->profile_picture)
                                <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}"
                                     alt="Profile Picture" class="rounded-circle me-2" width="40" height="40" style="cursor: pointer;">
                            @else
                                <img src="https://via.placeholder.com/40" alt="Default Icon"
                                     class="rounded-circle me-2" width="40" height="40" style="cursor: pointer;">
                            @endif
                        </a>
                        <span class="text-white me-2">{{ Auth::user()->name }}</span> <!-- Display Name -->
                    </div>
                @endauth

                <a class="btn btn-outline-success me-2" href="{{route("tasks.add")}}">Add Task</a>
            </div>
        </div>
    </nav>
</header>  
