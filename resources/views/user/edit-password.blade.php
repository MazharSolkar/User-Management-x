<x-layout>

    <x-slot:main>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header text-center">
                            <h3>Update Password</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route('user.update.password',$user->id)}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <x-form.input type="password" name="password" label="Password" placeholder="********" />
                                <x-form.input type="password" name="new_password" label="New password" placeholder="********" />
                                <x-form.input type="password" name="new_password_confirmation" label="Confirm new password" placeholder="********" />

                                <div class="form-group mb-3">
                                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                                </div>
                            </form>

                            <div class="text-center">
                                <p><a href="{{ route('user.show',$user->id) }}">Go back to profile </a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-layout>
