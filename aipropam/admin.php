<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - News Crawler</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <!-- Google Fonts: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        /* Custom CSS */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f7fa; /* Warna background sama dengan dashboard */
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .login-card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .login-card .card-body {
            padding: 2.5rem;
        }

        .login-card .card-title {
            font-weight: 700;
        }

        .form-control-lg {
            font-size: 1rem;
            padding: 0.75rem 1rem;
        }

        .btn-login {
            font-weight: 600;
            padding: 0.75rem;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-11 col-sm-10 col-md-8 col-lg-6 col-xl-5">
                <div class="card login-card">
                    <div class="card-body">
                        <!-- Judul Form -->
                        <div class="text-center mb-4">
                            <img src="https://c.top4top.io/p_345064a3j1.jpg" class="logo"/>
                            <h2 class="card-title mt-3">Divpropam Polri</h2>
                            <p class="text-muted">Selamat datang kembali!</p>
                        </div>

                        <!-- Form -->
                        <form>
                            <!-- Input Email -->
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                <input type="email" class="form-control form-control-lg" id="email" placeholder="Alamat Email" required>
                            </div>

                            <!-- Input Password -->
                            <div class="input-group mb-4">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" class="form-control form-control-lg" id="password" placeholder="Kata Sandi" required>
                            </div>

                            <!-- Checkbox "Ingat Saya" dan "Lupa Kata Sandi" -->
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="rememberMe">
                                    <label class="form-check-label" for="rememberMe">
                                        Ingat saya
                                    </label>
                                </div>
                                <a href="#" class="text-decoration-none">Lupa kata sandi?</a>
                            </div>

                            <!-- Tombol Login -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg btn-login">Masuk</button>
                            </div>
                        </form>
                        
                        <!-- Footer kecil (opsional) -->
                        <div class="text-center mt-4">
                            <small class="text-muted">©2025 B4CKSTAGE</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle (tidak wajib untuk form ini, tapi baik untuk disertakan) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
