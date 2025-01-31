<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="">Profile</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                @if(Auth::check() && Auth::user()->role === 'admin')
                <div class="mb-2">
                    <button type="button" onclick="window.location.href='{{route('admin.dashboard')}}'" class="btn btn-primary">Dashboard</button>
                </div>
                @endif
                @if(Auth::check())
                <form action="{{route('user.logout')}}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
                @else
                <div>
                    <button type="button" onclick="window.location.href='{{route('user.login')}}'" class="btn btn-success">Login</button>
                </div>
                @endif
            </div>
        </div>
    </div>
</nav>
