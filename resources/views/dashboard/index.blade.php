<x-layout>

    <x-slot:main>
        <div class="container mt-5" style="max-width: 900px">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <a href="{{route('dashboard.create')}}" class="btn btn-success my-2">Add user+</a>
                    <div class="text-center">
                        <h3>User List</h3>
                    </div>
                    <!-- Search Form -->
                    <div class="mb-3">
                        <form action="{{ route('dashboard.index') }}" method="GET">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" value="{{ request('search') }}"
                                    placeholder="Search by name or email">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-left">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th>#</th>
                                    <th>User</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $index => $user)
                                    <tr>
                                        <td class="text-center">{{ $index + 1 }}</td>
                                        <td class="text-left">
                                            <img src="{{ $user->image ? asset('storage/' . $user->image) : asset('Default_pfp.jpg') }}"
                                                class="rounded-circle me-2" width="50" height="50"
                                                alt="Profile Image">
                                            <span>{{ $user->name }}</span>
                                        </td>
                                        <td class="text-center">
                                            <!-- Flex container with wrap for responsive buttons -->
                                            <div class="d-flex flex-wrap justify-content-center gap-2">
                                                <a href="{{ route('user.show', $user->id) }}"
                                                    class="btn btn-primary">View</a>
                                                <a href="{{ route('user.profile.edit', $user->id) }}"
                                                    class="btn btn-warning">Edit</a>
                                                <form action="{{ route('dashboard.delete.user', $user->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center text-muted">No users available <a
                                                style="text-decoration:none;"
                                                href="{{ route('user.register') }}">Register</a></td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <div class="d-flex justify-content-center mt-3">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-layout>
