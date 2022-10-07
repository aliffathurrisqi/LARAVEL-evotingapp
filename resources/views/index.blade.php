@extends('layouts.main')
@section('content')

            <div id="content">

@include('partials.navbar')

                <div class="container-fluid">

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
                                    <button type="button" class="btn btn-outline-dark w-50 mt-0 mb-3">Pilih</button>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="modal fade" id="Modal{{ $candidate->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                ...
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                            </div>
                        </div> --}}


                        @endforeach

                    </div>

                    <div class="row">

                        <div class="col-lg-6 mb-4">
                            <div class="card shadow mb-2">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-dark">Perolehan Suara</h6>
                                </div>
                                <div class="card-body">

                                    @foreach ($candidates as $candidate)
                                    <h4 class="small font-weight-bold" style="color: {{ $candidate->color }}">{{ $candidate->name }}<span
                                            class="float-right">{{ number_format(($candidate->votes->count()/$votes->count()) * 100, 2) }} %</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar" role="progressbar" style="width: {{ number_format(($candidate->votes->count()/$votes->count()) * 100, 2) }}%; background-color:{{ $candidate->color }};"
                                            aria-valuenow="{{ number_format(($candidate->votes->count()/$votes->count()) * 100, 2) }}" aria-valuemin="0" aria-valuemax="100">
                                        @if ($candidate->votes->count() > 0)
                                        {{ $candidate->votes->count() }}
                                        @endif
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-dark">Suara Total</h6>
                                </div>
                                <div class="card-body">

                                    <h4 class="small font-weight-bold">Suara Masuk <span
                                            class="float-right">{{ number_format(($votes->count()/($users->count()-1)) * 100, 2) }} %</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: {{ number_format(($votes->count()/($users->count()-1)) * 100, 2) }}%;"
                                            aria-valuenow="{{ number_format(($votes->count()/($users->count()-1)) * 100, 2) }}" aria-valuemin="0" aria-valuemax="100">
                                        @if ($votes->count() > 0)
                                        {{$votes->count()}}
                                        @endif
                                        </div>
                                    </div>

                                    <h4 class="small font-weight-bold">Suara Kosong<span
                                            class="float-right">{{ number_format(100 - ($votes->count()/($users->count()-1)) * 100, 2) }} %</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-dark" role="progressbar" style="width: {{ number_format(100 - ($votes->count()/($users->count()-1)) * 100, 2) }}%"
                                            aria-valuenow="{{ number_format(100 - ($votes->count()/($users->count()-1)) * 100, 2) }}" aria-valuemin="0" aria-valuemax="100">
                                            @if (($users->count()-$votes->count()) > 0)
                                            {{$users->count()-$votes->count()-1}}
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

            @endsection