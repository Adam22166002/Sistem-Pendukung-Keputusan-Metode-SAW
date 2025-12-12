@extends('layouts.admin')
@section('title', 'Input Nilai Penilaian Karyawan')

@section('content')
<div class="container">
    <div class="card p-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="fw-bold">Input Nilai Penilaian Karyawan</h3>

            <form method="GET" action="{{ route('penilaian.form', $periode->id) }}">
                <select class="form-select" onchange="window.location.href=this.value">
                    @foreach($semuaPeriode as $p)
                    <option value="{{ route('penilaian.form', $p->id) }}"
                        {{ $periode->id == $p->id ? 'selected' : '' }}>
                        {{ $p->nama }}
                    </option>
                    @endforeach
                </select>
            </form>
        </div>

        <p class="text-muted">
            Periode: <strong class="text-primary">{{ $periode->nama }}</strong> <br>
            Tanggal: <span class="text-primary">{{ $periode->tanggal_mulai }} s/d {{ $periode->tanggal_selesai }}</span>
        </p>

        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif
    </div>

    <form action="{{ route('penilaian.proses', $periode->id) }}" method="POST">
        @csrf

        <div class="card shadow-sm">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="table-primary text-center">
                            <tr>
                                <th style="width: 200px;">Nama Karyawan</th>
                                @foreach ($kriteria as $kr)
                                <th>{{ $kr->nama }} <br> <small>({{ $kr->kode }})</small></th>
                                @endforeach
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($karyawan as $ky)
                            <tr>
                                <td>
                                    <strong>{{ $ky->nama }}</strong> <br>
                                </td>

                                @foreach ($kriteria as $kr)
                                <td class="text-center">
                                    <input
                                        type="number"
                                        name="nilai_{{ $ky->id }}_{{ $kr->id }}"
                                        class="form-control text-center"
                                        min="10"
                                        max="100"
                                        step="1"
                                        placeholder="0 - 100"
                                        required>
                                </td>
                                @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-4 text-end">
                    <button type="submit" class="btn btn-primary px-4">
                        Proses Penilaian
                    </button>
                </div>

            </div>
        </div>
    </form>
</div>
@endsection