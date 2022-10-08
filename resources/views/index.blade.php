@extends('layouts.main')
@section('content')
    @include('partials.navbar')
    <div class="container-fluid p-4">
        <div class="row">
            <h3>Pilih Kandidat</h3>
            @foreach ($candidates as $candidate)
                <div class="col-md-3 mb-3">
                    <div class="card shadow h-100" style="border-left:5px solid {{ $candidate->color }}">
                        <div class="card-body text-center">
                            <img src="/img/male.svg" class="rounded-circle h-50 mb-5">
                            <h5 style="color: {{ $candidate->color }}">{{ $candidate->name }}</h5>
                        </div>
                        <div class="text-center">
                            <button type="button" class="btn btn-outline-dark w-50 mt-0 mb-3" data-bs-toggle="modal"
                                data-bs-target="#myModal{{ $candidate->id }}">Pilih</button>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="myModal{{ $candidate->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Anda yakin memilih {{ $candidate->name }} ?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                <form action="/vote/make" method="POST">
                                    <input type="text" name="candidate_id" value="{{ $candidate->id }}">
                                    <input type="text" name="user_id" value="{{ $candidate->id }}">
                                    <button type="submit" class="btn btn-primary">Yakin</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


    </div>
@endsection
