<x-app-layout>
    <div class="container-fluid p-4">
        <!-- Pembayaran Page -->
        <div id="pembayaranPage" class="page">
            <h1 class="h3 mb-4">Data Pembayaran</h1>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Filter Pembayaran</h6>
                </div>
                <div class="card-body">
                    <form class="row g-3">
                        <div class="col-md-3">
                            <label class="form-label">NISN</label>
                            <input type="text" class="form-control" placeholder="Masukkan NISN">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Nama Siswa</label>
                            <input type="text" class="form-control" placeholder="Masukkan nama">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Bulan</label>
                            <select class="form-select">
                                <option value="">Semua Bulan</option>
                                <option value="1">Januari</option>
                                <option value="2">Februari</option>
                                <option value="3">Maret</option>
                                <option value="4">April</option>
                                <option value="5">Mei</option>
                                <option value="6">Juni</option>
                                <option value="7">Juli</option>
                                <option value="8">Agustus</option>
                                <option value="9">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Tahun</label>
                            <select class="form-select">
                                <option value="">Semua Tahun</option>
                                <option value="2024">2024</option>
                                <option value="2023">2023</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-search me-2"></i>Cari
                            </button>
                            <a href="{{ route('pembayaran.tambah') }}" class="btn btn-success ms-2">
                                <i class="fas fa-plus me-2"></i>Tambah Pembayaran
                            </a>
                            <a href="" class="btn btn-warning ms-2" data-bs-toggle="modal" data-bs-target="#riwayatModal">
                                <i class="far fa-file-alt me-2"></i>Riwayat Pembayaran
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Modal Pembayaran -->
            <div class="modal fade" id="riwayatModal" tabindex="-1" aria-labelledby="riwayatModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title" id="riwayatModalLabel">Riwayat Pembayaran</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Isi Card Riwayat Pembayaran -->
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" width="100%" cellspacing="0" id="dataTable">
                                            <thead>
                                                <tr>
                                                    <th>ID Pembayaran</th>
                                                    <th>NIS</th>
                                                    <th>Nama Siswa</th>
                                                    <th>Tanggal Bayar</th>
                                                    <th>Bulan Dibayar</th>
                                                    <th>Tahun Dibayar</th>
                                                    <th>Jumlah</th>
                                                    <th>Keterangan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($pembayaran as $item)
                                                    <tr>
                                                        <td>{{ $item->id_pembayaran }}</td>
                                                        <td>{{ $item->siswa->nis ?? '-' }}</td>
                                                        <td>{{ $item->siswa->nama ?? '-' }}</td>
                                                        <td>{{ $item->tgl_bayar }}</td>
                                                        <td>{{ $item->bulan_dibayar }}</td>
                                                        <td>{{ $item->tahun_dibayar }}</td>
                                                        <td>Rp{{ number_format($item->jumlah_bayar, 0, ',', '.') }}</td>
                                                        <td>{{ $item->keterangan ?? '-' }}</td>
                                                        <td>
                                                            <a href="{{ route('pembayaran.edit', $item->id_pembayaran) }}"
                                                                class="btn btn-warning btn-sm">Edit</a>
                                                            <form
                                                                action="{{ route('pembayaran.delete', $item->id_pembayaran) }}"
                                                                method="POST" style="display:inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    onclick="return confirm('Yakin ingin menghapus?')"
                                                                    class="btn btn-danger btn-sm">Hapus</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- End Card -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
