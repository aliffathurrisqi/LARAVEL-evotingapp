@extends('layouts.main')
@section('content')
    <div class="container-fluid p-4">
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card shadow mb-2">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Perolehan Suara</h6>
                    </div>
                    <div class="card-body">
                        @foreach ($candidates as $candidate)
                            <h4 class="small" style="color: {{ $candidate->color }}">
                                {{ $candidate->name }}
                                <span class="float-end">
                                    @if ($candidate->votes->count() != 0)
                                        {{ $percent = number_format(($candidate->votes->count() / $votes->count()) * 100, 2) }}
                                    @else
                                        {{ $percent = 0 }}
                                    @endif
                                    %
                                </span>
                            </h4>
                            <div class="progress mb-4">
                                <div class="progress-bar" role="progressbar"
                                    style="width: {{ $percent }}%; background-color:{{ $candidate->color }};"
                                    aria-valuenow="{{ $percent }}" aria-valuemin="0" aria-valuemax="100">
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

                        <h4 class="small font-weight-bold">Suara Masuk
                            <span class="float-end">{{ number_format(($votes->count() / $users->count()) * 100, 2) }}
                                %</span>
                        </h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-danger" role="progressbar"
                                style="width: {{ number_format(($votes->count() / $users->count()) * 100, 2) }}%;"
                                aria-valuenow="{{ number_format(($votes->count() / $users->count()) * 100, 2) }}"
                                aria-valuemin="0" aria-valuemax="100">
                                @if ($votes->count() > 0)
                                    {{ $votes->count() }}
                                @endif
                            </div>
                        </div>

                        <h4 class="small font-weight-bold">Suara Kosong<span
                                class="float-end">{{ number_format(100 - ($votes->count() / $users->count()) * 100, 2) }}
                                %</span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-dark" role="progressbar"
                                style="width: {{ number_format(100 - ($votes->count() / $users->count()) * 100, 2) }}%"
                                aria-valuenow="{{ number_format(100 - ($votes->count() / $users->count()) * 100, 2) }}"
                                aria-valuemin="0" aria-valuemax="100">
                                @if ($users->count() - $votes->count() > 0)
                                    {{ $users->count() - $votes->count() }}
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
