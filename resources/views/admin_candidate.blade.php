@extends('layouts.main_admin')
@section('content')
    <div class="row p-4">
        <h3>Pilih Kandidat</h3>
        <div class="mt-1 mb-3">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCandidate">Tambah Kandidat</button>
        </div>

        <div class="modal fade" id="addCandidate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        Tambah Kandidat
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/admin/candidate/add" method="POST">
                        @csrf
                        <div class="modal-body">
                            <input type="text" class="form-control mb-2" name="name" placeholder="Nama kandidat"
                                required>
                            <input type="color" class="w-100" name="color">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if ($candidates->count())
        @foreach ($candidates as $candidate)
            <div class="col-md-3 mb-3">
                <div class="card shadow h-100" style="border-left:5px solid {{ $candidate->color }}">
                    <div class="card-body text-center">
                        <img src="/img/male.svg" class="rounded-circle h-50 mb-5">
                        <h5 style="color: {{ $candidate->color }}">{{ $candidate->name }}</h5>
                    </div>
                    <div class="text-center">
                        <button type="button" class="btn btn-warning text-white w-50 mt-0 mb-3" data-bs-toggle="modal"
                            data-bs-target="#myModal{{ $candidate->id }}">Edit</button>
                        <button type="button" class="btn btn-danger w-50 mt-0 mb-3" data-bs-toggle="modal"
                            data-bs-target="#delModal{{ $candidate->id }}">Hapus</button>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="myModal{{ $candidate->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            Edit Kandidat
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="/admin/candidate/edit" method="POST">
                                <input type="hidden" name="id" value="{{ $candidate->id }}">
                                <input type="text" class="form-control mb-2" name="name" placeholder="Nama kandidat"
                                    value="{{ $candidate->name }}" required>
                                <input type="color" class="w-100" name="color" value="{{ $candidate->color }}">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>

                            @csrf
                            <button type="submit" class="btn btn-primary">Ubah</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="delModal{{ $candidate->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            Hapus Kandidat
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="/admin/candidate/delete" method="POST">
                                Anda Yakin akan menghapus {{ $candidate->name }} ?
                                <input type="hidden" name="id" value="{{ $candidate->id }}">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Batal</button>

                            @csrf
                            <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="row p-4">
            Kandidat Belum ada
        </div>
    @endif

    </div>
@endsection
