<x-layout>

    <x-slot:main>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header text-center">
                            <h3>Login</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route('user.login.process')}}">
                                @csrf
                                <x-form.input type="email" name="email" label="email" placeholder="test@gmail.com" value="{{old('email')}}" />
                                <x-form.input type="password" name="password" label="password" placeholder="********" />

                                <div class="form-group mb-3">
                                    <button type="submit" class="btn btn-primary w-100">Login</button>
                                </div>
                            </form>

                            <div class="text-center">
                                <p>Don't have an account? <a href="{{ route('user.register') }}">Register</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-layout>
