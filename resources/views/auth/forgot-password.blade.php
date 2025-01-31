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
                            <form method="POST" action="{{ route('password.request') }}">
                                @csrf
                                <x-form.input type="email" name="email" label="email" placeholder="test@gmail.com"
                                    value="{{ old('email') }}" />

                                <div class="form-group mb-3">
                                    <button type="submit" class="btn btn-primary w-100">submit</button>
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
