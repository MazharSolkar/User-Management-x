<nav class="navbar navbar-expand-lg bg-body-tertiary" style="max-width: 992px; display: block; margin: auto;">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('user.index') }}">Home</a>

        <div class="d-flex align-items-center">
            @if (Auth::check() && Auth::user()->role === 'admin')
                <button type="button" onclick="window.location.href='{{ route('dashboard.index') }}'"
                    class="btn btn-primary me-3 btn-sm btn-md-lg">Dashboard</button>
            @endif


            @if (Auth::check())
                <form action="{{ route('user.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger me-3 btn-sm btn-md-lg">Logout</button>
                </form>
            @else
                <button type="button" onclick="window.location.href='{{ route('user.login') }}'"
                    class="btn btn-success me-3 btn-sm btn-md-lg">Login</button>
            @endif
        </div>
    </div>
</nav>
