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
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $siswa }}</div>
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
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $kelas }}</div>
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
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp {{ $spp }}</div>
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
                                            <h6 class="mb-1">Nama Siswa</h6>
                                            <small class="text-muted">Date Time</small>
                                        </div>
                                        <p class="mb-1">Kelas - Nominal</p>
                                        <small class="text-success"><i class="fas fa-check-circle"></i> Status</small>
                                    </a>
                                </div>
                            </div>
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

</x-app-layout>
