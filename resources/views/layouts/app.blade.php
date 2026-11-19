<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Digital Kampus</title>
    <!-- Menggunakan Google Fonts (Inter) agar tipografi lebih modern -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --nav-bg: #0f172a;
            --bg-body: #f1f5f9;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
        }

        * { box-sizing: border-box; }
        body { 
            font-family: 'Inter', sans-serif; 
            margin: 0; 
            background-color: var(--bg-body); 
            color: var(--text-main); 
            line-height: 1.5;
        }

        /* Navbar Modern */
        nav { 
            background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 100%);
            color: #fff; 
            padding: 0 32px; 
            height: 64px;
            display: flex; 
            align-items: center; 
            justify-content: space-between; 
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 50;
        }
        nav .brand { 
            font-weight: 700; 
            font-size: 18px; 
            letter-spacing: -0.025em;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        nav ul { 
            list-style: none; 
            margin: 0; 
            padding: 0; 
            display: flex; 
            gap: 6px; 
        }
        nav ul li a { 
            color: #cbd5e1; 
            text-decoration: none; 
            padding: 8px 14px; 
            border-radius: 6px; 
            font-size: 14px; 
            font-weight: 500;
            transition: all 0.2s ease;
        }
        nav ul li a:hover { 
            background: rgba(255, 255, 255, 0.1); 
            color: #fff; 
        }
        nav ul li a.active { 
            background: var(--primary); 
            color: #fff; 
            box-shadow: 0 1px 3px rgba(0,0,0,0.2);
        }

        /* User Info & Logout */
        nav .navbar-user { 
            display: flex; 
            align-items: center; 
            gap: 14px; 
            color: #e2e8f0; 
            font-size: 13px; 
            font-weight: 500;
        }
        nav .user-badge {
            background: rgba(255, 255, 255, 0.12);
            padding: 5px 12px;
            border-radius: 9999px;
            border: 1px solid rgba(255, 255, 255, 0.15);
        }
        nav .btn-logout { 
            background: rgba(239, 68, 68, 0.15); 
            border: 1px solid rgba(239, 68, 68, 0.4); 
            color: #fca5a5; 
            padding: 6px 12px; 
            border-radius: 6px; 
            cursor: pointer; 
            font-size: 13px; 
            font-weight: 500;
            transition: all 0.2s ease;
        }
        nav .btn-logout:hover { 
            background: #ef4444; 
            color: #fff; 
            border-color: #ef4444;
        }

        /* Container Utama */
        main { 
            max-width: 1050px; 
            margin: 32px auto; 
            padding: 28px; 
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.08), 0 1px 2px -1px rgba(0, 0, 0, 0.04);
            border: 1px solid var(--border-color);
        }

        h1, h2, h3 {
            color: #0f172a;
            margin-top: 0;
            font-weight: 700;
            letter-spacing: -0.025em;
        }

        /* Link & Tombol Umum */
        main a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
        }
        main a:hover {
            text-decoration: underline;
        }
        /* Membuat link "+ Tambah ..." terlihat seperti tombol */
        main > a:first-of-type {
            display: inline-block;
            background: var(--primary);
            color: #fff;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 14px;
            margin-bottom: 12px;
            transition: background 0.2s;
        }
        main > a:first-of-type:hover {
            background: var(--primary-dark);
            text-decoration: none;
        }

        /* Tabel Modern */
        table { 
            width: 100%; 
            border-collapse: separate; 
            border-spacing: 0;
            background: #fff; 
            margin-top: 12px; 
            border: 1px solid var(--border-color);
            border-radius: 8px;
            overflow: hidden;
        }
        th, td { 
            padding: 12px 16px; 
            text-align: left; 
            font-size: 14px;
            border-bottom: 1px solid var(--border-color);
        }
        th { 
            background: #f8fafc; 
            color: #475569;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 0.05em;
        }
        tr:last-child td {
            border-bottom: none;
        }
        tbody tr:hover {
            background-color: #f8fafc;
        }

        /* Form Inputs & Buttons */
        input[type="text"], input[type="email"], input[type="password"], input[type="number"], input[type="date"], select, textarea {
            width: 100%;
            max-width: 450px;
            padding: 9px 12px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font-size: 14px;
            font-family: inherit;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
        }
        button[type="submit"] {
            background: var(--primary);
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.2s;
        }
        button[type="submit"]:hover {
            background: var(--primary-dark);
        }
        /* Khusus tombol hapus di dalam tabel */
        td form button[type="submit"] {
            background: #fee2e2;
            color: #b91c1c;
            padding: 4px 10px;
            font-size: 13px;
        }
        td form button[type="submit"]:hover {
            background: #ef4444;
            color: #fff;
        }

        /* Alert Sukses */
        .alert-success { 
            background: #ecfdf5; 
            color: #065f46; 
            border: 1px solid #a7f3d0;
            padding: 12px 16px; 
            border-radius: 8px; 
            margin-bottom: 20px; 
            font-size: 14px;
            font-weight: 500;
        }
    </style>
</head>
<body>
    @include('partials.navbar')

    <main>
        @if (session('success'))
            <div class="alert-success">✅ {{ session('success') }}</div>
        @endif

        @yield('content')
    </main>
</body>
</html>