<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Laravel</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            height: 100vh;
            overflow: hidden;
        }
        
        .login-container {
            display: flex;
            height: 100vh;
        }
        
        /* Left Panel - Branding */
        .left-panel {
            flex: 1;
            background: linear-gradient(135deg, #1a237e 0%, #283593 50%, #3949ab 100%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 60px;
            position: relative;
            overflow: hidden;
        }
        
        .left-panel::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background-image: 
                repeating-linear-gradient(45deg, transparent, transparent 10px, rgba(255,255,255,0.05) 10px, rgba(255,255,255,0.05) 20px),
                repeating-linear-gradient(-45deg, transparent, transparent 10px, rgba(255,255,255,0.03) 10px, rgba(255,255,255,0.03) 20px);
            opacity: 0.3;
        }
        
        .brand-icon {
            font-size: 120px;
            color: white;
            margin-bottom: 40px;
            position: relative;
            z-index: 1;
            animation: pulse 2s ease-in-out infinite;
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
        
        .brand-greeting {
            font-size: 48px;
            font-weight: 700;
            color: white;
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
        }
        
        .brand-tagline {
            font-size: 18px;
            color: rgba(255, 255, 255, 0.9);
            line-height: 1.6;
            text-align: center;
            max-width: 500px;
            position: relative;
            z-index: 1;
        }
        
        .brand-copyright {
            position: absolute;
            bottom: 30px;
            left: 60px;
            color: rgba(255, 255, 255, 0.7);
            font-size: 14px;
            z-index: 1;
        }
        
        /* Right Panel - Login Form */
        .right-panel {
            flex: 1;
            background: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 60px;
            overflow-y: auto;
        }
        
        .login-header {
            margin-bottom: 40px;
        }
        
        .login-header .brand-name {
            font-size: 32px;
            font-weight: 700;
            color: #1a237e;
            margin-bottom: 10px;
        }
        
        .login-header h1 {
            font-size: 36px;
            font-weight: 700;
            color: #212121;
            margin-bottom: 15px;
        }
        
        .login-header .register-message {
            font-size: 14px;
            color: #757575;
            line-height: 1.6;
        }
        
        .login-header .register-message a {
            color: #1a237e;
            text-decoration: underline;
            font-weight: 600;
        }
        
        .login-form {
            max-width: 450px;
        }
        
        .form-group {
            margin-bottom: 25px;
        }
        
        .form-label {
            font-size: 14px;
            font-weight: 600;
            color: #424242;
            margin-bottom: 8px;
            display: block;
        }
        
        .form-control {
            border: none;
            border-bottom: 2px solid #212121;
            border-radius: 0;
            padding: 12px 0;
            font-size: 16px;
            background: transparent;
            transition: border-color 0.3s;
        }
        
        .form-control:focus {
            outline: none;
            border-bottom-color: #1a237e;
            box-shadow: none;
        }
        
        .form-control::placeholder {
            color: #9e9e9e;
        }
        
        .btn-login {
            background: #212121;
            color: white;
            border: none;
            padding: 14px 30px;
            font-size: 16px;
            font-weight: 600;
            width: 100%;
            border-radius: 4px;
            transition: all 0.3s;
            margin-top: 30px;
        }
        
        .btn-login:hover {
            background: #424242;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }
        
        .btn-google {
            background: white;
            color: #424242;
            border: 1px solid #e0e0e0;
            padding: 14px 30px;
            font-size: 16px;
            font-weight: 600;
            width: 100%;
            border-radius: 4px;
            transition: all 0.3s;
            margin-top: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        
        .btn-google:hover {
            border-color: #bdbdbd;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        
        .google-icon {
            width: 20px;
            height: 20px;
        }
        
        .forgot-password {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #757575;
        }
        
        .forgot-password a {
            color: #1a237e;
            text-decoration: underline;
        }
        
        .alert {
            border-radius: 4px;
            border: none;
            margin-bottom: 20px;
        }
        
        .invalid-feedback {
            display: block;
            color: #d32f2f;
            font-size: 14px;
            margin-top: 5px;
        }
        
        .form-control.is-invalid {
            border-bottom-color: #d32f2f;
        }
        
        .form-check {
            margin-top: 15px;
        }
        
        .form-check-label {
            font-size: 14px;
            color: #757575;
            font-weight: normal;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
            }
            
            .left-panel {
                display: none;
            }
            
            .right-panel {
                padding: 30px;
            }
        }
    </style>
</head>
<body>

    <div class="login-container">
        <!-- Left Panel - Branding -->
        <div class="left-panel">
            <div class="brand-icon">
                <i class="fas fa-wallet" style="display: inline-block;"></i>
            </div>
            <h1 class="brand-greeting">
                Hello! 👋
            </h1>
            <p class="brand-tagline">
                Kelola keuangan Anda dengan mudah. Catat pemasukan dan pengeluaran secara efisien untuk mengontrol keuangan Anda dengan lebih baik!
            </p>
            <div class="brand-copyright">
                © {{ date('Y') }} Pencatatan Keuangan. All rights reserved.
            </div>
        </div>

        <!-- Right Panel - Login Form -->
        <div class="right-panel">
            <div class="login-header">
                <div class="brand-name">Pencatatan Keuangan</div>
                <h1>Selamat Datang Kembali!</h1>
                <p class="register-message">
                    Belum punya akun? <a href="{{ route('register') }}">Buat akun baru sekarang</a>, GRATIS! Hanya butuh kurang dari satu menit.
                </p>
            </div>

            <!-- Session Status -->
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    {{ session('status') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    {{ session('error') }}
                </div>
            @endif

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>Terjadi kesalahan!</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="login-form">
                @csrf

                <!-- Email -->
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" 
                           name="email" 
                           id="email"
                           class="form-control @error('email') is-invalid @enderror" 
                           placeholder="Masukkan email Anda"
                           value="{{ old('email') }}"
                           required 
                           autofocus>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" 
                           name="password" 
                           id="password"
                           class="form-control @error('password') is-invalid @enderror" 
                           placeholder="Masukkan password Anda"
                           required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="form-check">
                    <input type="checkbox" name="remember" class="form-check-input" id="remember">
                    <label for="remember" class="form-check-label">Ingat saya</label>
                </div>

                <!-- Login Button -->
                <button type="submit" class="btn btn-login">
                    Masuk Sekarang
                </button>

                <!-- Google Login Button -->
                <button type="button" class="btn btn-google">
                    <svg class="google-icon" viewBox="0 0 24 24">
                        <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                        <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                        <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                        <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                    </svg>
                    Masuk dengan Google
                </button>

                <!-- Forgot Password -->
                <div class="forgot-password">
                    Lupa password? <a href="{{ route('password.request') }}">Klik di sini</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
