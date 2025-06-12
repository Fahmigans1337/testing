<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analisis Sentimen: Oknum Polisi - News Crawler Dashboard</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <!-- Google Fonts: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Chart.js for Graphs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        /* CSS Kustom yang sama dengan Dashboard */
        :root {
            --bs-body-bg: #f4f7fa;
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

        .sidebar .nav-link { color: #bdc3c7; font-weight: 500; padding: 0.75rem 1rem; display: flex; align-items: center; }
        .sidebar .nav-link i { width: 20px; margin-right: 1rem; text-align: center; }
        .sidebar .nav-link:hover { color: #ffffff; background-color: #34495e; }
        .sidebar .nav-link.active { color: #ffffff; background-color: #3498db; }

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
    </style>
</head>
<body>

    <!-- SIDEBAR (tetap sama untuk konsistensi) -->
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
                <a href="#" class="nav-link"><i class="fas fa-cogs"></i>Pengaturan</a>
            </li>
             <li>
                <a href="#" class="nav-link"><i class="fas fa-globe"></i>Pencarian Dan Monitoring</a>
            </li>
            <li>
                <a href="#" class="nav-link active" aria-current="page"><i class="fas fa-chart-line"></i>Analisis Sentiment</a>
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
    </nav>

    <!-- MAIN CONTENT -->
    <main class="main-content">
        <div class="container-fluid">
            <!-- HEADER -->
            <header class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0 text-gray-800">Analisis Sentimen Berita: Oknum Polisi</h1>
            </header>

            <!-- FILTER ROW -->
            <div class="card mb-4">
                <div class="card-body">
                    <form class="row g-3 align-items-end">
                        <div class="col-md-4">
                            <label for="keyword" class="form-label fw-bold">Kata Kunci Utama</label>
                            <input type="text" class="form-control" id="keyword" value="Oknum Polisi" placeholder='"pungli", "kekerasan aparat"...'>
                        </div>
                        <div class="col-md-3">
                            <label for="dateRange" class="form-label">Rentang Tanggal</label>
                            <input type="date" class="form-control" id="dateRange">
                        </div>
                        <div class="col-md-3">
                            <label for="source" class="form-label">Sumber</label>
                            <select id="source" class="form-select">
                                <option selected>Semua Sumber</option>
                                <option>Kompas</option>
                                <option>Detik</option>
                                <option>CNN</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary w-100">Terapkan Filter</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- SENTIMENT SUMMARY ROW -->
            <div class="row g-4 mb-4">
                <div class="col-lg-4 col-md-6">
                    <div class="card stat-card h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="icon-circle bg-danger-subtle text-danger me-3"><i class="fas fa-frown"></i></div>
                            <div>
                                <h5 class="card-title text-secondary fs-6">Sentimen Negatif</h5>
                                <h3 class="fw-bold">6,840</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card stat-card h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="icon-circle bg-secondary-subtle text-secondary me-3"><i class="fas fa-meh"></i></div>
                            <div>
                                <h5 class="card-title text-secondary fs-6">Sentimen Netral</h5>
                                <h3 class="fw-bold">3,500</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="card stat-card h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="icon-circle bg-success-subtle text-success me-3"><i class="fas fa-smile"></i></div>
                            <div>
                                <h5 class="card-title text-secondary fs-6">Sentimen Positif</h5>
                                <h3 class="fw-bold">1,210</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CHARTS ROW -->
            <div class="row g-4 mb-4">
                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-header bg-white">Tren Sentimen (7 Hari Terakhir)</div>
                        <div class="card-body">
                            <canvas id="sentimentTrendChart" style="height: 300px;"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-header bg-white">Sentimen per Sumber</div>
                        <div class="card-body">
                            <canvas id="sentimentBySourceChart" style="height: 300px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- RECENT ARTICLES TABLE -->
            <div class="card">
                <div class="card-header bg-white fw-bold">Contoh Artikel Terkait "Oknum Polisi"</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>Judul Artikel</th>
                                    <th>Sumber</th>
                                    <th>Tanggal</th>
                                    <th>Sentimen</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Oknum Polisi Terlibat Pungli di Jalan Raya, Videonya Viral di Medsos</td>
                                    <td>Detik</td>
                                    <td>2023-10-27</td>
                                    <td><span class="badge text-bg-danger">Negatif</span></td>
                                </tr>
                                <tr>
                                    <td>Polri Tegaskan Akan Tindak Tegas Setiap Oknum yang Merusak Citra Institusi</td>
                                    <td>Kompas</td>
                                    <td>2023-10-27</td>
                                    <td><span class="badge text-bg-secondary">Netral</span></td>
                                </tr>
                                <tr>
                                    <td>Kasus Kekerasan oleh Oknum Polisi, Korban Minta Keadilan dan Perlindungan</td>
                                    <td>CNN</td>
                                    <td>2023-10-26</td>
                                    <td><span class="badge text-bg-danger">Negatif</span></td>
                                </tr>
                                <tr>
                                    <td>Propam Periksa Sejumlah Oknum Terkait Laporan Warga soal Pelayanan Buruk</td>
                                    <td>Tempo</td>
                                    <td>2023-10-26</td>
                                    <td><span class="badge text-bg-secondary">Netral</span></td>
                                </tr>
                                 <tr>
                                    <td>Kapolres Beri Penghargaan pada Polisi yang Gagalkan Aksi Begal Oknum Aparat</td>
                                    <td>Republika</td>
                                    <td>2023-10-25</td>
                                    <td><span class="badge text-bg-success">Positif</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </main>
    
    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    <script>
        // Data dan Konfigurasi untuk Chart.js yang disesuaikan dengan topik

        // 1. Grafik Tren Sentimen (Line Chart)
        const ctxTrend = document.getElementById('sentimentTrendChart').getContext('2d');
        const sentimentTrendChart = new Chart(ctxTrend, {
            type: 'line',
            data: {
                labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
                datasets: [
                    {
                        label: 'Negatif',
                        data: [65, 80, 250, 220, 180, 190, 150], // Lonjakan di hari Rabu (kasus viral)
                        borderColor: '#e74c3c',
                        backgroundColor: 'rgba(231, 76, 60, 0.1)',
                        tension: 0.3, fill: true,
                    },
                    {
                        label: 'Netral',
                        data: [80, 90, 150, 160, 140, 120, 110], // Ikut naik saat kasus dibahas
                        borderColor: '#95a5a6',
                        backgroundColor: 'rgba(149, 165, 166, 0.1)',
                        tension: 0.3, fill: true,
                    },
                    {
                        label: 'Positif',
                        data: [15, 10, 20, 35, 40, 30, 25], // Cenderung rendah
                        borderColor: '#2ecc71',
                        backgroundColor: 'rgba(46, 204, 113, 0.1)',
                        tension: 0.3, fill: true,
                    }
                ]
            },
            options: { responsive: true, maintainAspectRatio: false, scales: { y: { beginAtZero: true } }, plugins: { legend: { position: 'top' } } }
        });

        // 2. Grafik Sentimen per Sumber (Stacked Bar Chart)
        const ctxSource = document.getElementById('sentimentBySourceChart').getContext('2d');
        const sentimentBySourceChart = new Chart(ctxSource, {
            type: 'bar',
            data: {
                labels: ['Detik', 'Kompas', 'CNN', 'Tempo', 'Republika'],
                datasets: [
                    { label: 'Negatif', data: [450, 280, 320, 380, 150], backgroundColor: '#e74c3c' },
                    { label: 'Netral', data: [200, 310, 250, 220, 280], backgroundColor: '#95a5a6' },
                    { label: 'Positif', data: [50, 90, 60, 40, 120], backgroundColor: '#2ecc71' }
                ]
            },
            options: { responsive: true, maintainAspectRatio: false, scales: { x: { stacked: true }, y: { stacked: true, beginAtZero: true } }, plugins: { legend: { position: 'top' } } }
        });
    </script>
</body>
</html>
