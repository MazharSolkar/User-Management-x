<x-layout>
    <x-slot:main>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header text-center">
                            <h3>Edit Profile</h3>
                        </div>
                        <div class="card-body">
                            <!-- Profile Image -->
                            <div class="d-flex justify-content-center mb-3">
                                <img src="{{ $user->image ? asset('storage/' . $user->image) : asset('Default_pfp.jpg')}}"
                                    class="rounded-circle" width="150" height="150" alt="Profile Image">
                            </div>
                            <form method="POST" action="{{ route('user.profile.update',$user->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                <x-form.input type="text" name="name" label="name" placeholder="John Doe"
                                    value="{{ $user->name }}" />
                                <x-form.input type="email" name="email" label="email" value="{{ $user->email }}"
                                    placeholder="test@gmail.com" />
                                <x-form.input type="file" name="image" label="profile picture" />

                                <div class="form-group mb-3">
                                    <button type="submit" class="btn btn-primary w-100">Update</button>
                                </div>
                            </form>

                            <div class="text-center">
                                <p>go back to profile <a href="{{ route('user.show', $user->id) }}">Profile</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-layout>
