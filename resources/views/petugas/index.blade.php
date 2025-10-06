<x-app-layout>
    <div class="container-fluid p-4">
        <div class="page">
            <div class="card shadow">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Petugas</h6>
                    <a href="{{ route('petugas.tambah') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus me-2"></i>Tambah Petugas
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">#</th>
                                    <th style="text-align: center;">Username</th>
                                    <th style="text-align: center;">Nama Petugas</th>
                                    <th style="text-align: center;">Level</th>
                                    <th style="text-align: center;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($petugas as $p)
                                    <tr>
                                        <td style="text-align: center; width: 80px;">{{ $loop->iteration }}</td>
                                        <td>{{ $p->username }}</td>
                                        <td>{{ $p->nama_petugas }}</td>
                                        <td style="text-align: center;">{{ $p->level }}</td>
                                        <td style="text-align: center; width: 120px;">
                                            <a href="{{ route('petugas.edit', $p->id) }}" class="btn btn-info btn-sm me-1" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('petugas.destroy', $p->id) }}" method="post" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>