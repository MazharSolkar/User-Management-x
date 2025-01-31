<x-layout>

    <x-slot:main>
        <div class="container mt-5" style="max-width: 800px">
            <div class="row justify-content-center">
                <div class="col-md-8">
                        <div class="text-center">
                            <h3>User List</h3>
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
                                    @foreach ($users as $index => $user)
                                        <tr>
                                            <td class="text-center">{{ $index + 1 }}</td>
                                            <td class="">
                                                <img src="{{ $user->image ? asset('storage/' . $user->image) : asset('Default_pfp.jpg') }}"
                                                    class="rounded-circle me-2" width="50" height="50" alt="Profile Image">
                                                <span>{{ $user->name }}</span>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('user.show', $user->id) }}" class="btn btn-primary">View</a>
                                                <a href="{{ route('user.profile.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                                                <a href="{{ route('user.show', $user->id) }}" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-layout>
