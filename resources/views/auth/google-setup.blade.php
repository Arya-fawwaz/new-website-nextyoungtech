<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penataan Google API - Next Young Tech</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Outfit:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary: #00f2fe;
            --secondary: #38bdf8;
            --accent: #06d6a0;
            --bg-dark: #0a0f1d;
            --text-main: #ffffff;
            --text-muted: #94a3b8;
            --border-color: rgba(255, 255, 255, 0.08);
            --card-bg: rgba(15, 23, 42, 0.45);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background-color: var(--bg-dark);
            color: var(--text-main);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 20px;
            overflow-x: hidden;
            position: relative;
        }

        /* Glowing background circles */
        .glowing-bg {
            position: absolute;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            filter: blur(140px);
            opacity: 0.15;
            z-index: 1;
            pointer-events: none;
        }

        .glowing-bg.primary {
            top: 15%;
            left: 20%;
            background: var(--primary);
        }

        .glowing-bg.secondary {
            bottom: 15%;
            right: 20%;
            background: var(--secondary);
        }

        /* Card styles */
        .glass-card {
            background: var(--card-bg);
            backdrop-filter: blur(25px);
            -webkit-backdrop-filter: blur(25px);
            border: 1px solid var(--border-color);
            border-radius: 24px;
            width: 100%;
            max-width: 580px;
            padding: 40px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.4), 0 0 40px rgba(56, 189, 248, 0.1);
            position: relative;
            z-index: 5;
            text-align: center;
            animation: fadeIn 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .icon-header {
            width: 70px;
            height: 70px;
            background: rgba(56, 189, 248, 0.15);
            border: 1px solid rgba(56, 189, 248, 0.3);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px auto;
            color: var(--primary);
            font-size: 28px;
            box-shadow: 0 0 20px rgba(0, 242, 254, 0.2);
        }

        .title {
            font-size: 26px;
            font-weight: 800;
            letter-spacing: -0.5px;
            margin-bottom: 8px;
            background: var(--primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .subtitle {
            font-size: 14px;
            color: var(--text-muted);
            line-height: 1.6;
            margin-bottom: 30px;
        }

        /* Step instructions */
        .instruction-box {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 16px;
            padding: 20px;
            margin-bottom: 25px;
            text-align: left;
        }

        .instruction-title {
            font-size: 13px;
            font-weight: 700;
            color: var(--primary);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .instruction-list {
            list-style: none;
            font-size: 13px;
            color: var(--text-muted);
        }

        .instruction-list li {
            margin-bottom: 10px;
            position: relative;
            padding-left: 20px;
            line-height: 1.5;
        }

        .instruction-list li::before {
            content: "\f00c";
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            position: absolute;
            left: 0;
            top: 2px;
            color: var(--accent);
            font-size: 11px;
        }

        .code-snippet {
            background: rgba(0, 0, 0, 0.25);
            border: 1px solid rgba(255, 255, 255, 0.05);
            padding: 8px 12px;
            border-radius: 8px;
            font-family: monospace;
            color: #f43f5e;
            font-size: 12px;
            display: inline-block;
            margin-top: 5px;
            user-select: all;
        }

        /* Form elements */
        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            color: var(--text-muted);
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .input-glass {
            width: 100%;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 10px;
            padding: 14px 16px;
            font-family: inherit;
            color: var(--text-main);
            font-size: 14px;
            outline: none;
            transition: all 0.3s ease;
        }

        .input-glass:focus {
            border-color: var(--primary);
            box-shadow: 0 0 15px rgba(0, 242, 254, 0.15);
            background: rgba(255, 255, 255, 0.06);
        }

        /* Buttons */
        .btn-submit {
            width: 100%;
            background: var(--primary);
            color: #ffffff;
            border: none;
            padding: 14px;
            border-radius: 10px;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 0 25px rgba(56, 189, 248, 0.25);
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-bottom: 18px;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 0 35px rgba(56, 189, 248, 0.35);
        }

        .btn-demo {
            width: 100%;
            background: transparent;
            color: var(--text-main);
            border: 1px solid rgba(255, 255, 255, 0.15);
            padding: 12px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-demo:hover {
            background: rgba(255, 255, 255, 0.05);
            border-color: rgba(255, 255, 255, 0.3);
        }

        /* Alert styling */
        .alert-error {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.2);
            color: #ef4444;
            padding: 12px 16px;
            border-radius: 10px;
            font-size: 13px;
            margin-bottom: 20px;
            text-align: left;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

    <div class="glowing-bg primary"></div>
    <div class="glowing-bg secondary"></div>

    <div class="glass-card">
        <div class="icon-header">
            <i class="fa-brands fa-google"></i>
        </div>

        <h1 class="title">Penataan Kredensial Google</h1>
        <p class="subtitle">Google Cloud Console Client ID & Secret diperlukan untuk mengaktifkan alur autentikasi Google asli (*real Google login*).</p>

        @if($errors->has('setup_error'))
            <div class="alert-error">
                <i class="fa-solid fa-triangle-exclamation"></i>
                <span>{{ $errors->first('setup_error') }}</span>
            </div>
        @endif

        @if(isset($error))
            <div class="alert-error">
                <i class="fa-solid fa-triangle-exclamation"></i>
                <span>{{ $error }}</span>
            </div>
        @endif

        <div class="instruction-box">
            <div class="instruction-title">
                <i class="fa-solid fa-circle-info"></i> Panduan Singkat API Google
            </div>
            <ul class="instruction-list">
                <li>Buka <b>Google Cloud Console</b> dan buat proyek OAuth.</li>
                <li>Setel jenis aplikasi ke <b>Web Application</b>.</li>
                <li>Tambahkan rute URI pengalihan terotorisasi berikut:
                    <br>
                    <span class="code-snippet">{{ route('auth.google.callback') }}</span>
                </li>
                <li>Salin dan masukkan Client ID & Client Secret Anda di bawah ini:</li>
            </ul>
        </div>

        <form action="{{ route('auth.google.save-credentials') }}" method="POST">
            @csrf
            <div class="form-group">
                <label class="form-label" for="client_id">Google Client ID</label>
                <input type="text" id="client_id" name="client_id" class="input-glass" placeholder="Masukkan Google Client ID Anda" required autocomplete="off">
            </div>

            <div class="form-group">
                <label class="form-label" for="client_secret">Google Client Secret</label>
                <input type="password" id="client_secret" name="client_secret" class="input-glass" placeholder="Masukkan Google Client Secret Anda" required autocomplete="off">
            </div>

            <button type="submit" class="btn-submit">
                <i class="fa-solid fa-circle-check"></i> Simpan & Hubungkan Ke Google Riil
            </button>
        </form>

        <div style="display: flex; align-items: center; justify-content: center; gap: 15px; margin: 15px 0;">
            <div style="flex: 1; height: 1px; background: rgba(255,255,255,0.08);"></div>
            <span style="font-size: 11px; text-transform: uppercase; color: var(--text-muted); font-weight: 600; letter-spacing: 1px;">Atau</span>
            <div style="flex: 1; height: 1px; background: rgba(255,255,255,0.08);"></div>
        </div>

        <a href="{{ route('auth.google.simulate') }}" style="text-decoration: none;">
            <button class="btn-demo">
                <i class="fa-solid fa-play"></i> Coba Dengan Mode Demonstrasi (Bypass)
            </button>
        </a>
    </div>

</body>
</html>
