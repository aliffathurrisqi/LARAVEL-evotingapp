@extends('layouts.main_login')
@section('content')
    <div class="container">
        @if (Session::has('error'))
            <script>
                alert('Login Gagal!!!')
            </script>
        @endif
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Silakan Login</h1>
                                    </div>
                                    <form action="/login/auth" method="POST">
                                        @csrf
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control rounded-4" name="username"
                                                placeholder="Masukkan username" required>
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="password" name="password" class="form-control rounded-4"
                                                placeholder="Password" required>
                                        </div>
                                        <div class="input-group mb-3">
                                            <button type="submit" class="btn btn-primary w-100 rounded-4">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
