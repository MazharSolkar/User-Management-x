<x-layout>
    <x-slot:main>

        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header text-center">
                            <h3>Profile</h3>
                        </div>
                        <div class="card-body">
                            <!-- Profile Image -->
                            <div class="d-flex justify-content-center mb-3">
                                <img src="{{ $user->image ? asset('storage/' . $user->image) : asset('Default_pfp.jpg') }}"
                                    class="rounded-circle" width="150" height="150" alt="Profile Image">
                            </div>

                            <!-- User Details -->
                            <div class="text-center">
                                <p><strong>Name: </strong>{{ $user->name }}</p>
                                <p><strong>Email: </strong>{{ $user->email }}</p>
                            </div>

                            <!-- Edit, Logout & Update Buttons -->
                            @if (Auth::check() && Auth::user()->id === $user->id)
                                <div class="mt-3 d-flex justify-content-center gap-2">
                                    <a href="{{ route('user.profile.edit', $user->id) }}" class="btn btn-primary">Edit
                                        Profile</a>
                                    <form action="{{ route('user.logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Logout</button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-layout>
