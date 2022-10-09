@extends('layouts.main_admin')
@section('content')
    <div class="row p-4">
        <div class="col">
            <h3>Data User</h3>
            <div class="mt-1 mb-3">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUser">Tambah User</button>
            </div>

            <div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            Tambah User
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="/admin/user/add" method="POST">
                            @csrf
                            <div class="modal-body">
                                <input type="text" class="form-control mb-2" name="username" placeholder="Username"
                                    required>
                                <input type="text" class="form-control mb-2" name="name" placeholder="Nama" required>
                                <input type="password" class="form-control mb-2" name="password" placeholder="Password"
                                    required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Tambahkan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="mb-5">
                        <div class="float-start">
                            <h4 class="small font-weight-bold">Pengguna Terdaftar :
                                @if ($usertotal->count())
                                    {{ $usertotal->count() }}
                                @else
                                    0
                                @endif
                            </h4>
                        </div>
                        <div class="float-end">
                            <form class="d-flex" role="search">
                                <input class="form-control me-2" type="text" name="search"
                                    placeholder="tuliskan username atau nama">
                                <button class="btn btn-outline-primary" type="submit">Cari</button>
                            </form>
                        </div>
                    </div>

                    <table class="table border mt-3">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Username</th>
                                <th scope="col">Nama</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $user)
                                <tr>
                                    <th>{{ $users->firstItem() + $key }}</th>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="float-start">
                        Menampilkan {{ $users->firstItem() }} ke {{ $users->lastItem() }} dari {{ $users->total() }}
                    </div>
                    <div class="float-end"> {{ $users->links() }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
