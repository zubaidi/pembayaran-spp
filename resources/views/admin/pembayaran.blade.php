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
                        </div>
                    </form>
                </div>
            </div>

            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Riwayat Pembayaran</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID Pembayaran</th>
                                    <th>NISN</th>
                                    <th>Nama Siswa</th>
                                    <th>Tanggal Bayar</th>
                                    <th>Bulan Dibayar</th>
                                    <th>Tahun Dibayar</th>
                                    <th>Jumlah</th>
                                    <th>Petugas</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>001</td>
                                    <td>0034567890</td>
                                    <td>Ahmad Rizki Pratama</td>
                                    <td>01/11/2024</td>
                                    <td>November</td>
                                    <td>2024</td>
                                    <td>Rp 150.000</td>
                                    <td>Administrator</td>
                                    <td><span class="badge bg-success">Lunas</span></td>
                                    <td>
                                        <button class="btn btn-info btn-sm me-1" title="Detail">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-warning btn-sm" title="Cetak">
                                            <i class="fas fa-print"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>002</td>
                                    <td>0034567891</td>
                                    <td>Siti Nurhaliza Putri</td>
                                    <td>01/11/2024</td>
                                    <td>November</td>
                                    <td>2024</td>
                                    <td>Rp 150.000</td>
                                    <td>Siti Aminah</td>
                                    <td><span class="badge bg-success">Lunas</span></td>
                                    <td>
                                        <button class="btn btn-info btn-sm me-1" title="Detail">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-warning btn-sm" title="Cetak">
                                            <i class="fas fa-print"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>003</td>
                                    <td>0034567892</td>
                                    <td>Budi Santoso</td>
                                    <td>31/10/2024</td>
                                    <td>Oktober</td>
                                    <td>2024</td>
                                    <td>Rp 150.000</td>
                                    <td>Administrator</td>
                                    <td><span class="badge bg-warning">Pending</span></td>
                                    <td>
                                        <button class="btn btn-info btn-sm me-1" title="Detail">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-warning btn-sm" title="Cetak">
                                            <i class="fas fa-print"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
