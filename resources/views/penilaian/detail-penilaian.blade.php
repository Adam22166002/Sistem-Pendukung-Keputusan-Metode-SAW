<div class="modal fade" id="detail{{ $penilaian->id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5>Detail Penilaian - {{ $penilaian->karyawan->nama }}</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Kriteria</th>
                            <th>Rating</th>
                            <th>Normalisasi</th>
                            <th>Terbobot</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($penilaian->detail as $d)
                        <tr>
                            <td>{{ $d->kriteria->nama }}</td>
                            <td>{{ $d->skor_asli }}</td>
                            <td>{{ $d->skor_normalisasi }}</td>
                            <td>{{ $d->skor_terbobot }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>
    </div>
</div>
