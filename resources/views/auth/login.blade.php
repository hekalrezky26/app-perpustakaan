<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Perpustakaan Digital Kampus</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }
        body { 
            font-family: 'Inter', sans-serif; 
            margin: 0; 
            background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 100%);
            display: flex; 
            align-items: center; 
            justify-content: center; 
            min-height: 100vh; 
            padding: 20px;
        }
        .login-box { 
            background: #ffffff; 
            padding: 40px 36px; 
            border-radius: 16px; 
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.25), 0 8px 10px -6px rgba(0, 0, 0, 0.1); 
            width: 100%; 
            max-width: 400px; 
        }
        .login-header {
            text-align: center;
            margin-bottom: 28px;
        }
        .login-header .icon {
            font-size: 36px;
            margin-bottom: 8px;
        }
        .login-header h1 { 
            font-size: 22px; 
            margin: 0 0 6px 0; 
            color: #0f172a;
            font-weight: 700;
        }
        .login-header p {
            margin: 0;
            font-size: 14px;
            color: #64748b;
        }
        label { 
            display: block; 
            margin-top: 16px; 
            font-size: 13px;
            font-weight: 600; 
            color: #334155;
        }
        input[type="email"], input[type="password"] { 
            width: 100%; 
            padding: 10px 14px; 
            margin-top: 6px; 
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 14px;
            font-family: inherit;
            transition: all 0.2s;
        }
        input:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
        }
        .error { 
            color: #dc2626; 
            font-size: 13px; 
            margin-top: 5px; 
            font-weight: 500;
        }
        .alert-success { 
            background: #ecfdf5; 
            color: #065f46; 
            border: 1px solid #a7f3d0;
            padding: 10px 14px; 
            border-radius: 8px; 
            margin-bottom: 18px; 
            font-size: 14px;
            text-align: center;
        }
        .checkbox-row { 
            display: flex; 
            align-items: center; 
            gap: 8px; 
            margin-top: 16px; 
        }
        .checkbox-row input {
            width: 16px;
            height: 16px;
            accent-color: #2563eb;
            cursor: pointer;
        }
        .checkbox-row label { 
            display: inline; 
            margin-top: 0; 
            font-weight: 400; 
            font-size: 14px;
            color: #475569;
            cursor: pointer;
        }
        .btn { 
            margin-top: 24px; 
            width: 100%; 
            padding: 12px; 
            background: #2563eb; 
            color: #fff; 
            border: none; 
            border-radius: 8px; 
            cursor: pointer; 
            font-size: 15px; 
            font-weight: 600;
            font-family: inherit;
            transition: background 0.2s, transform 0.1s;
        }
        .btn:hover {
            background: #1d4ed8;
        }
        .btn:active {
            transform: scale(0.99);
        }
    </style>
</head>
<body>
    <div class="login-box">
        <div class="login-header">
            <div class="icon">📚</div>
            <h1>Perpustakaan Digital</h1>
            <p>Silakan masuk menggunakan akun petugas atau admin</p>
        </div>

        @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <label for="email">Alamat Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="contoh: admin@pens.ac.id" autofocus>
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="••••••••">
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror

            <div class="checkbox-row">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Ingat saya di perangkat ini</label>
            </div>

            <button type="submit" class="btn">Masuk ke Sistem</button>
        </form>
    </div>
</body>
</html>