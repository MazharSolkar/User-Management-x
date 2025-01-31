<x-layout>

    <x-slot:main>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header text-center">
                            <h3>Add new user</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route('dashboard.store')}}" enctype="multipart/form-data">
                                @csrf
                                <x-form.input type="text" name="name" label="name" placeholder="Jhon Doe" value="{{old('name')}}" />
                                <x-form.input type="email" name="email" label="email" placeholder="test@gmail.com" value="{{old('email')}}" />
                                <x-form.input type="password" name="password" label="password" placeholder="********" />
                                <x-form.input type="password" name="password_confirmation" label="confirm password" placeholder="********" value="{{old('password_confirmation')}}" />
                                <x-form.input type="file" name="image" label="profile pic" value="{{old('image')}}" />

                                <div class="form-group mb-3">
                                    <button type="submit" class="btn btn-primary w-100">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-layout>
