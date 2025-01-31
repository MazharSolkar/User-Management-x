{{-- <x-layout>
    <x-slot:main>
        <div>
            <h1>Reset yours password</h1>
            <div>
                <form action="{{ route('password.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <input type="email" name="email" placeholder="example@rest.com">
                    @error('name')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                    <br><br>
                    <input type="password" name="password" placeholder="********">
                    @error('password')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                    <br><br>
                    <input type="password" name="password_confirmation" placeholder="********">
                    @error('password_confirmation')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                    <br><br>
                    <button>Reset password</button>
                    <p>alread have an account?<a href="{{ route('user.login') }}">Login</a></p>
                </form>
            </div>
        </div>
    </x-slot:main>
</x-layout> --}}

<x-layout>
    <x-slot:main>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <p>{{ session('status') }}</p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header text-center">
                            <h3>Request a password reset email</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">

                                <x-form.input type="email" name="email" label="email" placeholder="test@gmail.com"
                                    value="{{ old('email') }}" />
                                    <x-form.input type="password" name="password" label="password" placeholder="********" />
                                    <x-form.input type="password" name="password_confirmation" label="confirm password" placeholder="********" value="{{old('password_confirmation')}}" />

                                <div class="form-group mb-3">
                                    <button type="submit" class="btn btn-primary w-100">Reset password</button>
                                </div>
                            </form>

                            <div class="text-center">
                                <p>Already have an account? <a href="{{ route('user.login') }}">Login</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-layout>

