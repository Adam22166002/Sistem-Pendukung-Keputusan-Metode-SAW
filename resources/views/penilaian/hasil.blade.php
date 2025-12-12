@extends('layouts.admin')
@section('title','Hasil Penilaian')

@section('content')

<div class="card">

    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="fw-bold mb-0">Hasil Penilaian — <span class="text-primary">{{ $periodeData->nama }} </span></h4>

        <select class="form-select w-auto" onchange="window.location.href=this.value">
            @foreach($semuaPeriode as $p)
            <option value="{{ route('penilaian.hasil', $p->id) }}"
                {{ $periodeData->id == $p->id ? 'selected' : '' }}>
                {{ $p->nama }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table id="example3" class="table">
                <thead>
                    <tr>
                        <th>Peringkat</th>
                        <th>Karyawan</th>
                        <th>Nilai Akhir</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($ranking as $row)
                    <tr>
                        <td>{{ $row->peringkat }}</td>
                        <td>{{ $row->karyawan->nama }}</td>
                        <td>{{ rtrim(rtrim(number_format($row->nilai_akhir,4), '0'), '.') }}</td>
                        <td>
                            <button class="btn btn-xs btn-primary shadow btn-xs sharp me-1" data-bs-toggle="modal"
                                data-bs-target="#detail{{ $row->id }}">
                                <i class="fa fa-eye"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>

@foreach($ranking as $row)
<div class="modal fade" id="detail{{ $row->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Detail Penilaian - <span class="text-primary">{{ $row->karyawan->nama }}</span></h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div class="mb-3">
                    <strong>Peringkat:</strong> {{ $row->peringkat }} &nbsp;&nbsp;
                    <strong>Nilai Akhir:</strong> {{ rtrim(rtrim(number_format($row->nilai_akhir,4), '0'), '.') }}
                </div>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Kriteria</th>
                            <th class="text-center">Rating</th>
                            <th class="text-center">Normalisasi</th>
                            <th class="text-center">Terbobot</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($row->detail as $d)
                        <tr>
                            <td>{{ $d->kriteria->nama }}</td>
                            <td class="text-center">{{ (int) $d->skor_asli }}</td>
                            <td class="text-center">
                                {{ rtrim(rtrim(number_format($d->skor_normalisasi,4), '0'), '.') }}
                            </td>
                            <td class="text-center">
                                {{ rtrim(rtrim(number_format($d->skor_terbobot,4), '0'), '.') }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>
    </div>
</div>
@endforeach

@endsection