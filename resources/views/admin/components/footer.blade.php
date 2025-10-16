<!-- jQuery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <!-- Font Awesome -->
    <script src="{{ asset('fontawesome/js/all.min.js') }}"></script>
    <!-- DataTables JS -->
    <script src="{{ asset('datatables/datatables.min.js') }}"></script>
    <!-- Chart.js -->
    <script src="{{ asset('js/chart.js') }}"></script>

    <script>
        
        // login error
        document.addEventListener('DOMContentLoaded', function () {
            @error('email')
                var toastEl = document.getElementById('loginAlert');
                var toast = new bootstrap.Toast(toastEl);
                toast.show();
            @enderror
        });

        // data table
        $(document).ready(function() {
            $('#dataTable').DataTable({
                autoWidth: false,
                paging: true,
                lengthChange: true,
                language: {
                    "decimal":        "",
                    "emptyTable":     "Tidak ada data yang tersedia di tabel",
                    "info":           "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    "infoEmpty":      "Menampilkan 0 sampai 0 dari 0 data",
                    "infoFiltered":   "(difilter dari _MAX_ total data)",
                    "infoPostFix":    "",
                    "thousands":      ",",
                    "lengthMenu":     "Tampilkan _MENU_ data",
                    "loadingRecords": "Memuat...",
                    "processing":     "Memproses...",
                    "search":         "Cari:",
                    "zeroRecords":    "Tidak ditemukan data yang cocok",
                    "paginate": {
                        "first":      "<<",
                        "last":       ">>",
                        "next":       ">",
                        "previous":   "<"
                    },
                    "aria": {
                        "sortAscending":  ": aktifkan untuk mengurutkan kolom secara menaik",
                        "sortDescending": ": aktifkan untuk mengurutkan kolom secara menurun"
                    }
                },
            });
        });

        // // Sidebar Toggle
        // document.getElementById('sidebarToggle').addEventListener('click', function() {
        //     document.getElementById('sidebar').classList.toggle('show');
        // });

        document.addEventListener('DOMContentLoaded', function() {
            const toggleBtn = document.getElementById('sidebarToggle');
            const sidebar = document.getElementById('sidebar');

            toggleBtn.addEventListener('click', function() {
                sidebar.classList.toggle('show');
            });
        });

        // Update current time
        function updateTime() {
            const now = new Date();
            const options = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            };
            document.getElementById('currentTime').textContent = now.toLocaleDateString('id-ID', options);
        }

        updateTime();
        setInterval(updateTime, 60000);

        // Logout function
        function logout() {
            if (confirm('Apakah Anda yakin ingin logout?')) {
                // Simulate logout
                alert('Anda telah berhasil logout!');
                // In real application, redirect to login page
                // window.location.href = 'login.html';
            }
        }

        // Initialize Chart
        const ctx = document.getElementById('paymentChart');
        if (ctx) {
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                    datasets: [{
                        label: 'Pembayaran SPP (Juta)',
                        data: [45, 52, 48, 55, 58, 62, 65, 68, 70, 72, 75, 78],
                        borderColor: '#4e73df',
                        backgroundColor: 'rgba(78, 115, 223, 0.05)',
                        tension: 0.3,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return 'Rp ' + value + 'M';
                                }
                            }
                        }
                    }
                }
            });
        }

        // menutup alert otomatis
        setTimeout(function () {
        let alert = document.querySelector('.alert');
            if (alert) {
                let bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            }
        }, 3000); // 1 detik

        // Delete confirmation
        document.querySelectorAll('.btn-danger').forEach(btn => {
            if (btn.querySelector('.fa-trash')) {
                btn.addEventListener('click', function() {
                    if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                        alert('Data berhasil dihapus!');
                        // In real application, send delete request to server
                    }
                });
            }
        });

        document.addEventListener('DOMContentLoaded', function () {
            const detailButtons = document.querySelectorAll('.btn-detail');

            detailButtons.forEach(button => {
                button.addEventListener('click', function () {
                    // Ambil data dari atribut data-*
                    const nisn = this.dataset.nisn;
                    const nis = this.dataset.nis;
                    const nama = this.dataset.nama;
                    const kelas = this.dataset.kelas;
                    const alamat = this.dataset.alamat;
                    const noTelp = this.dataset.no_telp;
                    const spp = this.dataset.spp;

                    // Masukkan data ke dalam modal
                    document.getElementById('nisn').textContent = nisn;
                    document.getElementById('nis').textContent = nis;
                    document.getElementById('nama').textContent = nama;
                    document.getElementById('kelas').textContent = kelas;
                    document.getElementById('alamat').textContent = alamat;
                    document.getElementById('no_telp').textContent = noTelp;
                    document.getElementById('spp').textContent = spp;
                });
            });
        });

        // // Fungsi untuk menghasilkan ID otomatis
        // function generateUserId() {
        //     const now = new Date();
        //     const timestamp = now.getTime();
        //     const uniqueId = 'USR' + timestamp.toString().slice(-5); // ambil 5 digit terakhir
        //     // Set value input
        //     document.getElementById('id_petugas').value = uniqueId;
        // }

        // // Panggil fungsi saat halaman dimuat
        // window.onload = generateUserId;

        // fungsi mencari data siswa
        document.getElementById('searchInput').addEventListener('keyup', function() {
        const query = this.value;

        fetch(`/siswa/search?q=${query}`)
            .then(response => response.json())
            .then(data => {
                const tableBody = document.getElementById('siswaTableBody');
                tableBody.innerHTML = '';

                data.forEach(siswa => {
                    const jumlahBayar = siswa.spp?.nominal || 0;
                    const row = `
                        <tr>
                            <td>${siswa.nis}</td>
                            <td>${siswa.nama}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary" onclick="pilihSiswa('${siswa.nis}', '${siswa.nama}', '${jumlahBayar}')">
                                    Pilih
                                </button>
                            </td>
                        </tr>
                    `;
                    tableBody.insertAdjacentHTML('beforeend', row);
                });
            });
    });

    function pilihSiswa(nis, nama, jumlahBayar) {
        document.getElementById('nis').value = nis;
        document.getElementById('nama_siswa').value = nama;
        document.getElementById('jumlah_bayar').value = jumlahBayar;

        // Tutup modal
        const modal = bootstrap.Modal.getInstance(document.getElementById('modalCariSiswa'));
        modal.hide();
    }

    </script>
