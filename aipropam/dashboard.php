<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard B4ckstage</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <!-- Google Fonts: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Chart.js for Graphs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <style>
        /* Custom CSS untuk melengkapi Bootstrap */
        :root {
            --bs-body-bg: #f4f7fa; /* Mengubah background default Bootstrap */
            --bs-body-font-family: 'Poppins', sans-serif;
            --sidebar-width: 260px;
            --sidebar-bg: #2c3e50;
        }

        body {
            font-family: var(--bs-body-font-family);
        }

        .sidebar {
            width: var(--sidebar-width);
            background-color: var(--sidebar-bg);
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            padding: 1.5rem 1rem;
        }

        .sidebar .nav-link {
            color: #bdc3c7;
            font-weight: 500;
            padding: 0.75rem 1rem;
            display: flex;
            align-items: center;
        }

        .sidebar .nav-link i {
            width: 20px;
            margin-right: 1rem;
            text-align: center;
        }

        .sidebar .nav-link:hover {
            color: #ffffff;
            background-color: #34495e;
        }

        .sidebar .nav-link.active {
            color: #ffffff;
            background-color: #3498db;
        }

        .main-content {
            margin-left: var(--sidebar-width);
            padding: 2rem;
        }

        .card {
            border: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            border-radius: 12px;
        }
        
        .stat-card .icon-circle {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .status-badge {
            white-space: nowrap;
        }
    </style>
</head>
<body>

    <!-- SIDEBAR -->
    <nav class="sidebar d-flex flex-column">
        <h2 class="text-white text-center fs-4 mb-4">News Crawler Divpropam Polri</h2>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="#" class="nav-link active" aria-current="page"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
            </li>
            <li>
                <a href="#" class="nav-link"><i class="fas fa-globe"></i>Sumber Berita</a>
            </li>
            <li>
                <a href="#" class="nav-link"><i class="fas fa-newspaper"></i>Hasil Crawl</a>
            </li>
            <li>
                <a href="#" class="nav-link"><i class="fas fa-chart-line"></i>Analitik</a>
            </li>
            <li>
                <a href="#" class="nav-link"><i class="fas fa-cogs"></i>Pengaturan</a>
            </li>
             <li>
                <a href="#" class="nav-link"><i class="fas fa-globe"></i>Pencarian Dan Monitoring</a>
            </li>
            <li>
                <a href="#" class="nav-link"><i class="fas fa-newspaper"></i>Analisis Sentiment</a>
            </li>
            <li>
                <a href="#" class="nav-link"><i class="fas fa-chart-line"></i>Trend Dan Topik</a>
            </li>
            <li>
                <a href="#" class="nav-link"><i class="fas fa-cogs"></i>Analisis Media</a>
            </li>
            <li>
                <a href="#" class="nav-link"><i class="fas fa-newspaper"></i>Visualisasi Jaringan SNA</a>
            </li>
            <li>
                <a href="#" class="nav-link"><i class="fas fa-chart-line"></i>Export Laporan</a>
            </li>
            <li>
                <a href="#" class="nav-link"><i class="fas fa-cogs"></i>FEED RSS</a>
            </li>
        </ul>
        <div class="dropdown mt-3 border-top pt-3 border-secondary">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user-circle fs-4 me-2"></i>
                <strong>Admin</strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                <li><a class="dropdown-item" href="#">Profil</a></li>
                <li><a class="dropdown-item" href="#">Pengaturan</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Keluar</a></li>
            </ul>
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <main class="main-content">
        <div class="container-fluid">
            <!-- HEADER -->
            <header class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard Monitoring Oknum Polisi</h1>
            </header>

            <!-- STATS CARDS ROW -->
            <div class="row g-4 mb-4">
                <div class="col-xl-3 col-md-6">
                    <div class="card stat-card h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="icon-circle bg-primary-subtle text-primary me-3">
                                <i class="fas fa-newspaper"></i>
                            </div>
                            <div>
                                <h5 class="card-title text-secondary fs-6">Artikel Hari Ini</h5>
                                <h3 class="fw-bold">1,250</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card stat-card h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="icon-circle bg-success-subtle text-success me-3">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div>
                                <h5 class="card-title text-secondary fs-6">Crawl Sukses (24jam)</h5>
                                <h3 class="fw-bold">3,420</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card stat-card h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="icon-circle bg-danger-subtle text-danger me-3">
                                <i class="fas fa-times-circle"></i>
                            </div>
                            <div>
                                <h5 class="card-title text-secondary fs-6">Crawl Gagal (24jam)</h5>
                                <h3 class="fw-bold">15</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card stat-card h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="icon-circle bg-warning-subtle text-warning me-3">
                                <i class="fas fa-sitemap"></i>
                            </div>
                            <div>
                                <h5 class="card-title text-secondary fs-6">Sumber Aktif</h5>
                                <h3 class="fw-bold">25 / 30</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CHARTS ROW -->
            <div class="row g-4 mb-4">
                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-header bg-white">Artikel per Jam (Hari Ini)</div>
                        <div class="card-body">
                            <canvas id="articlesChart" style="height: 300px;"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-header bg-white">Distribusi Artikel per Sumber</div>
                        <div class="card-body">
                            <canvas id="sourceDistributionChart" style="height: 300px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TABLES ROW -->
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-white">Status Crawl Terkini</div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle">
                                    <thead>
                                        <tr>
                                            <th>Sumber</th>
                                            <th>Status</th>
                                            <th>Waktu</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>kompas.com</td>
                                            <td><span class="badge text-bg-success status-badge">Selesai</span></td>
                                            <td>10:05 AM</td>
                                        </tr>
                                        <tr>
                                            <td>detik.com</td>
                                            <td><span class="badge text-bg-warning status-badge">Berjalan</span></td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>cnn.com</td>
                                            <td><span class="badge text-bg-danger status-badge">Gagal</span></td>
                                            <td>10:01 AM</td>
                                        </tr>
                                         <tr>
                                            <td>republika.co.id</td>
                                            <td><span class="badge text-bg-success status-badge">Selesai</span></td>
                                            <td>09:58 AM</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-white">Log Error Terbaru</div>
                        <div class="card-body">
                             <div class="table-responsive">
                                <table class="table table-hover align-middle">
                                    <thead>
                                        <tr>
                                            <th>Waktu</th>
                                            <th>Sumber</th>
                                            <th>Pesan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>10:02 AM</td>
                                            <td>bbc.com</td>
                                            <td>IP diblokir</td>
                                        </tr>
                                        <tr>
                                            <td>09:45 AM</td>
                                            <td>cnbc.com</td>
                                            <td>Selector judul tidak ditemukan</td>
                                        </tr>
                                        <tr>
                                            <td>09:12 AM</td>
                                            <td>bbc.com</td>
                                            <td>Timeout koneksi</td>
                                        </tr>
                                        <tr>
                                            <td>08:55 AM</td>
                                            <td>antaranews.com</td>
                                            <td>Struktur halaman berubah</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
    
    <!-- Bootstrap 5 JS Bundle (Popper.js included) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    <script>
        // JavaScript untuk Chart.js (tidak ada perubahan dari versi sebelumnya)

        // 1. Grafik Garis (Line Chart) untuk Artikel per Jam
        const ctxLine = document.getElementById('articlesChart').getContext('2d');
        const articlesChart = new Chart(ctxLine, {
            type: 'line',
            data: {
                labels: ['00:00', '03:00', '06:00', '09:00', '12:00', '15:00', '18:00', '21:00'],
                datasets: [{
                    label: 'Jumlah Artikel',
                    data: [20, 45, 150, 210, 180, 250, 200, 110],
                    backgroundColor: 'rgba(52, 152, 219, 0.2)',
                    borderColor: 'rgba(52, 152, 219, 1)',
                    borderWidth: 2,
                    tension: 0.4,
                    fill: true,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: { y: { beginAtZero: true } },
                plugins: { legend: { display: false } }
            }
        });

        // 2. Grafik Donat (Doughnut Chart) untuk Distribusi Sumber
        const ctxDoughnut = document.getElementById('sourceDistributionChart').getContext('2d');
        const sourceDistributionChart = new Chart(ctxDoughnut, {
            type: 'doughnut',
            data: {
                labels: ['Kompas', 'Detik', 'CNN', 'Republika', 'Lainnya'],
                datasets: [{
                    label: 'Distribusi Sumber',
                    data: [350, 410, 220, 150, 120],
                    backgroundColor: ['#3498db', '#e74c3c', '#2ecc71', '#f1c40f', '#9b59b6'],
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { position: 'bottom' } }
            }
        });
    </script>
</body>
</html>
