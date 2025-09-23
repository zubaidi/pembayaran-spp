<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Pembayaran</title>
    {{-- Bootstrap CSS --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    {{-- DataTables CSS --}}
    <link rel="stylesheet" href="{{ asset('datatables/datatables.min.css') }}">
    <style>
        /* Minimal CSS untuk layout sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 250px;
            background-color: #4e73df;
            z-index: 1000;
            overflow-y: auto;
        }

        .sidebar.show {
            left: 0;
        }

        #sidebarToggle {
            display: inline-block; /* pastikan tidak disembunyikan */
            font-size: 1.25rem;
            cursor: pointer;
            border: none;
            background: none;
            padding: 5px 10px;
            margin-right: 15px;
            color: #333;
        }

        .main-content {
            margin-left: 250px;
            min-height: 100vh;
        }

        @media (max-width: 768px) {
            .sidebar {
                margin-left: -250px;
            }
            .sidebar.show {
                margin-left: 0;
            }
            .main-content {
                margin-left: 0;
            }
        }

        .sidebar-link {
            color: rgba(255,255,255,0.8) !important;
            text-decoration: none;
            padding: 12px 20px;
            display: block;
        }

        .sidebar-link:hover {
            background-color: rgba(255,255,255,0.1);
            color: white !important;
        }

        .sidebar-link.active {
            background-color: rgba(255,255,255,0.2);
            color: white !important;
        }

        .sidebar-brand {
            color: white;
            text-decoration: none;
            padding: 20px;
            display: block;
            text-align: center;
            font-weight: bold;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .topbar {
            background-color: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</head>
<body>
    <x-navbar />

    <!-- Main Content -->
    <div class="main-content">
        <!-- Topbar -->
        <div class="topbar">
            <button class="btn btn-light" id="sidebarToggle">
                <i class="fas fa-bars"></i>
            </button>

            <div class="d-flex align-items-center">
                <span class="text-muted me-3">
                    <i class="fas fa-user-circle me-2"></i>
                    Administrator
                </span>
                <span class="text-muted small" id="currentTime"></span>
            </div>
        </div>

        {{ $slot }}

        <footer class="main-footer mt-4">
            <div class="container text-center py-3">
                <span class="text-muted">&copy; {{ date('Y') }} My Dashboard. All rights reserved.</span>
            </div>
        </footer>

    </div>

    <x-footer />

</body>
</html>
