<x-app-layout>
    <!-- Page Content -->
        <div class="container-fluid p-4" id="pageContent">
            <!-- Dashboard Page -->
            <div id="dashboardPage" class="page">
                <h1 class="h3 mb-4">Selamat Datang {{ Auth::user()->name }}</h1>

                <!-- Stat Cards -->
                <div class="row mb-4">
                    <div class="col-xl-3 col-md-6 mb-3">
                        <div class="card border-left-primary shadow h-100">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Total Siswa
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">1,234</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-3">
                        <div class="card border-left-success shadow h-100">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Total Kelas
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">36</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-users fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-3">
                        <div class="card border-left-info shadow h-100">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                            Pembayaran Bulan Ini
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp 45.6M</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-money-bill-wave fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-3">
                        <div class="card border-left-warning shadow h-100">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            Menunggak
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">234</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-exclamation-triangle fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts Row -->
                <div class="row">
                    <div class="col-xl-8 col-lg-7 mb-4">
                        <div class="card shadow">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Grafik Pembayaran SPP</h6>
                            </div>
                            <div class="card-body">
                                <canvas id="paymentChart" height="100"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-5 mb-4">
                        <div class="card shadow">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Pembayaran Terbaru</h6>
                            </div>
                            <div class="card-body">
                                <div class="list-group">
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1">Ahmad Rizki</h6>
                                            <small class="text-muted">2 jam lalu</small>
                                        </div>
                                        <p class="mb-1">XII IPA 1 - Rp 150.000</p>
                                        <small class="text-success"><i class="fas fa-check-circle"></i> Berhasil</small>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1">Siti Nurhaliza</h6>
                                            <small class="text-muted">5 jam lalu</small>
                                        </div>
                                        <p class="mb-1">XI IPS 2 - Rp 150.000</p>
                                        <small class="text-success"><i class="fas fa-check-circle"></i> Berhasil</small>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1">Budi Santoso</h6>
                                            <small class="text-muted">1 hari lalu</small>
                                        </div>
                                        <p class="mb-1">X TKJ 1 - Rp 150.000</p>
                                        <small class="text-warning"><i class="fas fa-clock"></i> Pending</small>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Siswa Page -->
            <div id="siswaPage" class="page" style="display: none;">
                <h1 class="h3 mb-4">Data Siswa</h1>

                <div class="card shadow">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-primary">Daftar Siswa</h6>
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addSiswaModal">
                            <i class="fas fa-plus me-2"></i>Tambah Siswa
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>NISN</th>
                                        <th>NIS</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>Alamat</th>
                                        <th>No. Telepon</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>0034567890</td>
                                        <td>2021001</td>
                                        <td>Ahmad Rizki Pratama</td>
                                        <td>XII IPA 1</td>
                                        <td>Jl. Merdeka No. 123</td>
                                        <td>081234567890</td>
                                        <td>
                                            <button class="btn btn-info btn-sm me-1" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>0034567891</td>
                                        <td>2021002</td>
                                        <td>Siti Nurhaliza Putri</td>
                                        <td>XI IPS 2</td>
                                        <td>Jl. Sudirman No. 456</td>
                                        <td>082345678901</td>
                                        <td>
                                            <button class="btn btn-info btn-sm me-1" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>0034567892</td>
                                        <td>2021003</td>
                                        <td>Budi Santoso</td>
                                        <td>X TKJ 1</td>
                                        <td>Jl. Gatot Subroto No. 789</td>
                                        <td>083456789012</td>
                                        <td>
                                            <button class="btn btn-info btn-sm me-1" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Petugas Page -->
            <div id="petugasPage" class="page" style="display: none;">
                <h1 class="h3 mb-4">Data Petugas</h1>

                <div class="card shadow">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-primary">Daftar Petugas</h6>
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addPetugasModal">
                            <i class="fas fa-plus me-2"></i>Tambah Petugas
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID Petugas</th>
                                        <th>Username</th>
                                        <th>Nama Petugas</th>
                                        <th>Level</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>admin</td>
                                        <td>Administrator</td>
                                        <td><span class="badge bg-danger">Admin</span></td>
                                        <td><span class="badge bg-success">Aktif</span></td>
                                        <td>
                                            <button class="btn btn-info btn-sm me-1" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>bendahara1</td>
                                        <td>Siti Aminah</td>
                                        <td><span class="badge bg-primary">Petugas</span></td>
                                        <td><span class="badge bg-success">Aktif</span></td>
                                        <td>
                                            <button class="btn btn-info btn-sm me-1" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>operator1</td>
                                        <td>Budi Hartono</td>
                                        <td><span class="badge bg-primary">Petugas</span></td>
                                        <td><span class="badge bg-warning">Non Aktif</span></td>
                                        <td>
                                            <button class="btn btn-info btn-sm me-1" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SPP Page -->
            <div id="sppPage" class="page" style="display: none;">
                <h1 class="h3 mb-4">Data SPP</h1>

                <div class="card shadow">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-primary">Daftar SPP</h6>
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addSppModal">
                            <i class="fas fa-plus me-2"></i>Tambah SPP
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID SPP</th>
                                        <th>Tahun</th>
                                        <th>Nominal</th>
                                        <th>Keterangan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>2023/2024</td>
                                        <td>Rp 150.000</td>
                                        <td>SPP Regular</td>
                                        <td><span class="badge bg-success">Aktif</span></td>
                                        <td>
                                            <button class="btn btn-info btn-sm me-1" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>2022/2023</td>
                                        <td>Rp 140.000</td>
                                        <td>SPP Regular</td>
                                        <td><span class="badge bg-secondary">Non Aktif</span></td>
                                        <td>
                                            <button class="btn btn-info btn-sm me-1" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>2024/2025</td>
                                        <td>Rp 160.000</td>
                                        <td>SPP Regular</td>
                                        <td><span class="badge bg-warning">Draft</span></td>
                                        <td>
                                            <button class="btn btn-info btn-sm me-1" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pembayaran Page -->
            <div id="pembayaranPage" class="page" style="display: none;">
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
                                <button type="button" class="btn btn-success ms-2" data-bs-toggle="modal" data-bs-target="#addPembayaranModal">
                                    <i class="fas fa-plus me-2"></i>Tambah Pembayaran
                                </button>
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
    </div>
<!-- Add Siswa Modal -->
    <div class="modal fade" id="addSiswaModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Siswa Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">NISN</label>
                            <input type="text" class="form-control" placeholder="Masukkan NISN">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">NIS</label>
                            <input type="text" class="form-control" placeholder="Masukkan NIS">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" placeholder="Masukkan nama lengkap">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kelas</label>
                            <select class="form-select">
                                <option value="">Pilih Kelas</option>
                                <option value="1">XII IPA 1</option>
                                <option value="2">XI IPS 2</option>
                                <option value="3">X TKJ 1</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea class="form-control" rows="3" placeholder="Masukkan alamat"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">No. Telepon</label>
                            <input type="tel" class="form-control" placeholder="Masukkan no. telepon">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Kelas Modal -->
    <div class="modal fade" id="addKelasModal" tabindex="-1" aria-labelledby="kelasModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="kelasModalLabel">Title Modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('kelas.store') }}">
                        <div class="mb-3">
                            <label class="form-label">ID Kelas</label>
                            <input type="text" class="form-control" placeholder="Contoh: KLS001" name="id_kelas">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Kelas</label>
                            <input type="text" class="form-control" placeholder="Contoh: X PPLG 1" name="nama_kelas">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kompetensi Keahlian</label>
                            <select class="form-control" name="kompetensi_keahlian" required>
                                <option value="">-- Pilih Jurusan --</option>
                                <option value="RPL">RPL</option>
                                <option value="TKJ">TKJ</option>
                                <option value="TKR">TKR</option>
                                <option value="TSM">TSM</option>
                                <option value="DPB">DPB</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Petugas Modal -->
    <div class="modal fade" id="addPetugasModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Petugas Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" placeholder="Masukkan username">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" placeholder="Masukkan password">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Petugas</label>
                            <input type="text" class="form-control" placeholder="Masukkan nama lengkap">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Level</label>
                            <select class="form-select">
                                <option value="admin">Admin</option>
                                <option value="petugas">Petugas</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add SPP Modal -->
    <div class="modal fade" id="addSppModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah SPP Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Tahun Ajaran</label>
                            <input type="text" class="form-control" placeholder="Contoh: 2024/2025">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nominal</label>
                            <input type="number" class="form-control" placeholder="Masukkan nominal">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Keterangan</label>
                            <textarea class="form-control" rows="3" placeholder="Masukkan keterangan"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Pembayaran Modal -->
    <div class="modal fade" id="addPembayaranModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Pembayaran SPP</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">NISN</label>
                                <input type="text" class="form-control" placeholder="Masukkan NISN">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nama Siswa</label>
                                <input type="text" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Bulan Dibayar</label>
                                <select class="form-select">
                                    <option value="">Pilih Bulan</option>
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
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tahun Dibayar</label>
                                <select class="form-select">
                                    <option value="">Pilih Tahun</option>
                                    <option value="2024">2024</option>
                                    <option value="2023">2023</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Jumlah Bayar</label>
                                <input type="number" class="form-control" placeholder="Masukkan jumlah">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Metode Pembayaran</label>
                                <select class="form-select">
                                    <option value="cash">Cash</option>
                                    <option value="transfer">Transfer</option>
                                    <option value="qris">QRIS</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Keterangan</label>
                            <textarea class="form-control" rows="3" placeholder="Masukkan keterangan (opsional)"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary">Proses Pembayaran</button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
