<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Panel - Sistem Pembayaran SPP</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">

    <style>
        body {
            background-color: #f8f9fc;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .navbar {
            background-color: #4e73df !important;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        }

        .search-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
            padding: 30px;
            margin: 30px 0;
        }

        .student-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
            padding: 20px;
            margin-bottom: 30px;
            display: none;
        }

        .student-photo {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #e3e6f0;
        }

        .payment-history {
            background: white;
            border-radius: 10px;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
            padding: 20px;
            display: none;
        }

        .status-lunas {
            color: #1cc88a;
            font-weight: bold;
        }

        .status-belum-lunas {
            color: #e74a3b;
            font-weight: bold;
        }

        .status-pending {
            color: #f6c23e;
            font-weight: bold;
        }

        .btn-search {
            background-color: #4e73df;
            border-color: #4e73df;
        }

        .btn-search:hover {
            background-color: #2e59d9;
            border-color: #2653d4;
        }

        .not-found {
            display: none;
            text-align: center;
            padding: 40px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
            margin: 30px 0;
        }

        .print-btn {
            background-color: #36b9cc;
            border-color: #36b9cc;
        }

        .print-btn:hover {
            background-color: #2c9faf;
            border-color: #2a96a5;
        }

        @media (max-width: 768px) {
            .student-photo {
                margin: 0 auto 20px;
                display: block;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="fas fa-graduation-cap me-2"></i>
                SPP User Panel
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.login') }}">
                            <i class="fas fa-sign-out-alt me-2"></i>
                            Login
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container-fluid p-4">
        <h1 class="h3 mb-4 text-gray-800">Cari Data Siswa & Pembayaran</h1>

        <!-- Search Container -->
        <div class="search-container">
            <h5 class="mb-3">Pencarian Data Siswa</h5>
            <form id="searchForm" onsubmit="searchStudent(event)">
                <div class="row g-3">
                    <div class="col-md-5">
                        <label class="form-label">NIS</label>
                        <input type="text" class="form-control" id="nis" placeholder="Masukkan NIS">
                    </div>
                    <div class="col-md-5">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" placeholder="Masukkan nama lengkap">
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary btn-search w-100">
                            <i class="fas fa-search me-2"></i>Cari
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Not Found Message -->
        <div class="not-found" id="notFound">
            <i class="fas fa-exclamation-triangle fa-3x text-warning mb-3"></i>
            <h4>Data Siswa Tidak Ditemukan</h4>
            <p class="text-muted">Pastikan NIS atau Nama Lengkap yang Anda masukkan sudah benar</p>
        </div>

        <!-- Student Card -->
        <div class="student-card" id="studentCard">
            <div class="d-flex flex-column flex-md-row">
                <div class="text-center mb-3 mb-md-0">
                    <img src="https://picsum.photos/seed/student/200/200" alt="Foto Siswa" class="student-photo">
                </div>
                <div class="ms-md-4 flex-grow-1">
                    <h4 id="studentName" class="mb-3">Ahmad Rizki Pratama</h4>
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <strong>NISN:</strong> <span id="studentNisn">0034567890</span>
                        </div>
                        <div class="col-md-6 mb-2">
                            <strong>NIS:</strong> <span id="studentNis">2021001</span>
                        </div>
                        <div class="col-md-6 mb-2">
                            <strong>Kelas:</strong> <span id="studentClass">XII IPA 1</span>
                        </div>
                        <div class="col-md-6 mb-2">
                            <strong>Alamat:</strong> <span id="studentAddress">Jl. Merdeka No. 123</span>
                        </div>
                        <div class="col-md-6 mb-2">
                            <strong>No. Telepon:</strong> <span id="studentPhone">081234567890</span>
                        </div>
                        <div class="col-md-6 mb-2">
                            <strong>Status:</strong> <span id="studentStatus" class="status-lunas">Lunas</span>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-primary print-btn" onclick="printData()">
                            <i class="fas fa-print me-2"></i>Cetak Data
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Payment History -->
        <div class="payment-history" id="paymentHistory">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="mb-0">Riwayat Pembayaran</h5>
                <button class="btn btn-success btn-sm" onclick="printPaymentHistory()">
                    <i class="fas fa-print me-2"></i>Cetak Riwayat
                </button>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Pembayaran</th>
                            <th>Tanggal Bayar</th>
                            <th>Bulan Dibayar</th>
                            <th>Tahun Dibayar</th>
                            <th>Jumlah</th>
                            <th>Petugas</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="paymentTableBody">
                        <tr>
                            <td>001</td>
                            <td>01/11/2024</td>
                            <td>November</td>
                            <td>2024</td>
                            <td>Rp 150.000</td>
                            <td>Administrator</td>
                            <td><span class="status-lunas">Lunas</span></td>
                            <td>
                                <button class="btn btn-info btn-sm" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>002</td>
                            <td>01/10/2024</td>
                            <td>Oktober</td>
                            <td>2024</td>
                            <td>Rp 150.000</td>
                            <td>Siti Aminah</td>
                            <td><span class="status-lunas">Lunas</span></td>
                            <td>
                                <button class="btn btn-info btn-sm" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>003</td>
                            <td>01/09/2024</td>
                            <td>September</td>
                            <td>2024</td>
                            <td>Rp 150.000</td>
                            <td>Administrator</td>
                            <td><span class="status-lunas">Lunas</span></td>
                            <td>
                                <button class="btn btn-info btn-sm" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>-</td>
                            <td>-</td>
                            <td>Agustus</td>
                            <td>2024</td>
                            <td>Rp 150.000</td>
                            <td>-</td>
                            <td><span class="status-belum-lunas">Belum Lunas</span></td>
                            <td>
                                <button class="btn btn-warning btn-sm" title="Bayar Sekarang">
                                    <i class="fas fa-money-bill-wave"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Payment Detail Modal -->
    <div class="modal fade" id="paymentDetailModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Pembayaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <strong>ID Pembayaran:</strong> <span id="modalPaymentId">001</span>
                    </div>
                    <div class="mb-3">
                        <strong>Tanggal Bayar:</strong> <span id="modalPaymentDate">01/11/2024</span>
                    </div>
                    <div class="mb-3">
                        <strong>Bulan Dibayar:</strong> <span id="modalPaymentMonth">November</span>
                    </div>
                    <div class="mb-3">
                        <strong>Tahun Dibayar:</strong> <span id="modalPaymentYear">2024</span>
                    </div>
                    <div class="mb-3">
                        <strong>Jumlah:</strong> <span id="modalPaymentAmount">Rp 150.000</span>
                    </div>
                    <div class="mb-3">
                        <strong>Metode Pembayaran:</strong> <span id="modalPaymentMethod">Cash</span>
                    </div>
                    <div class="mb-3">
                        <strong>Petugas:</strong> <span id="modalPaymentOfficer">Administrator</span>
                    </div>
                    <div class="mb-3">
                        <strong>Keterangan:</strong> <span id="modalPaymentNote">Pembayaran SPP bulan November</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary">Cetak Bukti</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('fontawesome/js/all.min.js') }}"></script>

    <script>
        // Sample student data
        const students = [
            {
                nisn: "0034567890",
                nis: "2021001",
                name: "Ahmad Rizki Pratama",
                class: "XII IPA 1",
                address: "Jl. Merdeka No. 123",
                phone: "081234567890",
                status: "Lunas",
                payments: [
                    { id: "001", date: "01/11/2024", month: "November", year: "2024", amount: "Rp 150.000", officer: "Administrator", status: "Lunas" },
                    { id: "002", date: "01/10/2024", month: "Oktober", year: "2024", amount: "Rp 150.000", officer: "Siti Aminah", status: "Lunas" },
                    { id: "003", date: "01/09/2024", month: "September", year: "2024", amount: "Rp 150.000", officer: "Administrator", status: "Lunas" },
                    { id: null, date: null, month: "Agustus", year: "2024", amount: "Rp 150.000", officer: null, status: "Belum Lunas" }
                ]
            },
            {
                nisn: "0034567891",
                nis: "2021002",
                name: "Siti Nurhaliza Putri",
                class: "XI IPS 2",
                address: "Jl. Sudirman No. 456",
                phone: "082345678901",
                status: "Belum Lunas",
                payments: [
                    { id: "004", date: "01/11/2024", month: "November", year: "2024", amount: "Rp 150.000", officer: "Siti Aminah", status: "Lunas" },
                    { id: "005", date: "01/10/2024", month: "Oktober", year: "2024", amount: "Rp 150.000", officer: "Administrator", status: "Lunas" },
                    { id: null, date: null, month: "September", year: "2024", amount: "Rp 150.000", officer: null, status: "Belum Lunas" },
                    { id: null, date: null, month: "Agustus", year: "2024", amount: "Rp 150.000", officer: null, status: "Belum Lunas" }
                ]
            },
            {
                nisn: "0034567892",
                nis: "2021003",
                name: "Budi Santoso",
                class: "X TKJ 1",
                address: "Jl. Gatot Subroto No. 789",
                phone: "083456789012",
                status: "Pending",
                payments: [
                    { id: "006", date: "31/10/2024", month: "Oktober", year: "2024", amount: "Rp 150.000", officer: "Administrator", status: "Pending" },
                    { id: null, date: null, month: "September", year: "2024", amount: "Rp 150.000", officer: null, status: "Belum Lunas" },
                    { id: null, date: null, month: "Agustus", year: "2024", amount: "Rp 150.000", officer: null, status: "Belum Lunas" },
                    { id: null, date: null, month: "Juli", year: "2024", amount: "Rp 150.000", officer: null, status: "Belum Lunas" }
                ]
            }
        ];

        // Search student function
        function searchStudent(event) {
            event.preventDefault();

            const nis = document.getElementById('nis').value.trim();
            const nama = document.getElementById('nama').value.trim().toLowerCase();

            let foundStudent = null;

            // Search by NIS
            if (nis) {
                foundStudent = students.find(student => student.nis === nis || student.nisn === nis);
            }

            // If not found by NIS, search by name
            if (!foundStudent && nama) {
                foundStudent = students.find(student => student.name.toLowerCase().includes(nama));
            }

            // Hide all results first
            document.getElementById('notFound').style.display = 'none';
            document.getElementById('studentCard').style.display = 'none';
            document.getElementById('paymentHistory').style.display = 'none';

            if (foundStudent) {
                // Display student data
                document.getElementById('studentName').textContent = foundStudent.name;
                document.getElementById('studentNisn').textContent = foundStudent.nisn;
                document.getElementById('studentNis').textContent = foundStudent.nis;
                document.getElementById('studentClass').textContent = foundStudent.class;
                document.getElementById('studentAddress').textContent = foundStudent.address;
                document.getElementById('studentPhone').textContent = foundStudent.phone;

                // Set status with appropriate class
                const statusElement = document.getElementById('studentStatus');
                statusElement.textContent = foundStudent.status;
                statusElement.className = '';

                if (foundStudent.status === 'Lunas') {
                    statusElement.className = 'status-lunas';
                } else if (foundStudent.status === 'Belum Lunas') {
                    statusElement.className = 'status-belum-lunas';
                } else {
                    statusElement.className = 'status-pending';
                }

                // Display payment history
                displayPaymentHistory(foundStudent.payments);

                // Show student card and payment history
                document.getElementById('studentCard').style.display = 'block';
                document.getElementById('paymentHistory').style.display = 'block';
            } else {
                // Show not found message
                document.getElementById('notFound').style.display = 'block';
            }
        }

        // Display payment history
        function displayPaymentHistory(payments) {
            const tableBody = document.getElementById('paymentTableBody');
            tableBody.innerHTML = '';

            payments.forEach(payment => {
                const row = document.createElement('tr');

                // Create cells
                const idCell = document.createElement('td');
                idCell.textContent = payment.id || '-';

                const dateCell = document.createElement('td');
                dateCell.textContent = payment.date || '-';

                const monthCell = document.createElement('td');
                monthCell.textContent = payment.month;

                const yearCell = document.createElement('td');
                yearCell.textContent = payment.year;

                const amountCell = document.createElement('td');
                amountCell.textContent = payment.amount;

                const officerCell = document.createElement('td');
                officerCell.textContent = payment.officer || '-';

                const statusCell = document.createElement('td');
                const statusSpan = document.createElement('span');
                statusSpan.textContent = payment.status;

                if (payment.status === 'Lunas') {
                    statusSpan.className = 'status-lunas';
                } else if (payment.status === 'Belum Lunas') {
                    statusSpan.className = 'status-belum-lunas';
                } else {
                    statusSpan.className = 'status-pending';
                }

                statusCell.appendChild(statusSpan);

                const actionCell = document.createElement('td');

                if (payment.status === 'Lunas' || payment.status === 'Pending') {
                    const detailButton = document.createElement('button');
                    detailButton.className = 'btn btn-info btn-sm';
                    detailButton.title = 'Detail';
                    detailButton.innerHTML = '<i class="fas fa-eye"></i>';
                    detailButton.onclick = function() {
                        showPaymentDetail(payment);
                    };
                    actionCell.appendChild(detailButton);
                } else {
                    const payButton = document.createElement('button');
                    payButton.className = 'btn btn-warning btn-sm';
                    payButton.title = 'Bayar Sekarang';
                    payButton.innerHTML = '<i class="fas fa-money-bill-wave"></i>';
                    payButton.onclick = function() {
                        alert('Fitur pembayaran akan segera hadir!');
                    };
                    actionCell.appendChild(payButton);
                }

                // Append all cells to row
                row.appendChild(idCell);
                row.appendChild(dateCell);
                row.appendChild(monthCell);
                row.appendChild(yearCell);
                row.appendChild(amountCell);
                row.appendChild(officerCell);
                row.appendChild(statusCell);
                row.appendChild(actionCell);

                // Append row to table body
                tableBody.appendChild(row);
            });
        }

        // Show payment detail modal
        function showPaymentDetail(payment) {
            document.getElementById('modalPaymentId').textContent = payment.id || '-';
            document.getElementById('modalPaymentDate').textContent = payment.date || '-';
            document.getElementById('modalPaymentMonth').textContent = payment.month;
            document.getElementById('modalPaymentYear').textContent = payment.year;
            document.getElementById('modalPaymentAmount').textContent = payment.amount;
            document.getElementById('modalPaymentMethod').textContent = 'Cash'; // Sample data
            document.getElementById('modalPaymentOfficer').textContent = payment.officer || '-';
            document.getElementById('modalPaymentNote').textContent = 'Pembayaran SPP bulan ' + payment.month;

            const modal = new bootstrap.Modal(document.getElementById('paymentDetailModal'));
            modal.show();
        }

        // Print student data
        function printData() {
            const studentName = document.getElementById('studentName').textContent;
            const printContent = `
                <html>
                <head>
                    <title>Data Siswa - ${studentName}</title>
                    <style>
                        body { font-family: Arial, sans-serif; margin: 20px; }
                        .header { text-align: center; margin-bottom: 30px; }
                        .student-info { margin-bottom: 20px; }
                        .student-info div { margin-bottom: 10px; }
                        .photo { float: right; width: 150px; height: 150px; border-radius: 50%; object-fit: cover; border: 4px solid #e3e6f0; }
                        @media print { .no-print { display: none; } }
                    </style>
                </head>
                <body>
                    <div class="header">
                        <h2>Data Siswa</h2>
                        <p>Sistem Pembayaran SPP</p>
                    </div>
                    <div>
                        <img src="https://picsum.photos/seed/student/200/200" alt="Foto Siswa" class="photo">
                        <div class="student-info">
                            <div><strong>Nama:</strong> ${document.getElementById('studentName').textContent}</div>
                            <div><strong>NISN:</strong> ${document.getElementById('studentNisn').textContent}</div>
                            <div><strong>NIS:</strong> ${document.getElementById('studentNis').textContent}</div>
                            <div><strong>Kelas:</strong> ${document.getElementById('studentClass').textContent}</div>
                            <div><strong>Alamat:</strong> ${document.getElementById('studentAddress').textContent}</div>
                            <div><strong>No. Telepon:</strong> ${document.getElementById('studentPhone').textContent}</div>
                            <div><strong>Status:</strong> ${document.getElementById('studentStatus').textContent}</div>
                        </div>
                    </div>
                    <div class="no-print">
                        <button onclick="window.print()">Cetak</button>
                        <button onclick="window.close()">Tutup</button>
                    </div>
                </body>
                </html>
            `;

            const printWindow = window.open('', '_blank');
            printWindow.document.write(printContent);
            printWindow.document.close();
        }

        // Print payment history
        function printPaymentHistory() {
            const studentName = document.getElementById('studentName').textContent;
            const table = document.getElementById('paymentTableBody').innerHTML;

            const printContent = `
                <html>
                <head>
                    <title>Riwayat Pembayaran - ${studentName}</title>
                    <style>
                        body { font-family: Arial, sans-serif; margin: 20px; }
                        .header { text-align: center; margin-bottom: 30px; }
                        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
                        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
                        th { background-color: #f2f2f2; }
                        .status-lunas { color: #1cc88a; font-weight: bold; }
                        .status-belum-lunas { color: #e74a3b; font-weight: bold; }
                        .status-pending { color: #f6c23e; font-weight: bold; }
                        @media print { .no-print { display: none; } }
                    </style>
                </head>
                <body>
                    <div class="header">
                        <h2>Riwayat Pembayaran SPP</h2>
                        <p>Nama: ${studentName}</p>
                        <p>NIS: ${document.getElementById('studentNis').textContent}</p>
                        <p>Kelas: ${document.getElementById('studentClass').textContent}</p>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>ID Pembayaran</th>
                                <th>Tanggal Bayar</th>
                                <th>Bulan Dibayar</th>
                                <th>Tahun Dibayar</th>
                                <th>Jumlah</th>
                                <th>Petugas</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            ${table.replace(/<button[^>]*>.*?<\/button>/g, '')}
                        </tbody>
                    </table>
                    <div class="no-print">
                        <button onclick="window.print()">Cetak</button>
                        <button onclick="window.close()">Tutup</button>
                    </div>
                </body>
                </html>
            `;

            const printWindow = window.open('', '_blank');
            printWindow.document.write(printContent);
            printWindow.document.close();
        }

    </script>
</body>
</html>
