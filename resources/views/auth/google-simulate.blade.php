<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk dengan Google - Akun Google</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Outfit:wght@400;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --google-blue: #1a73e8;
            --google-blue-hover: #1557b0;
            --google-gray: #dadce0;
            --google-text: #3c4043;
            --google-text-dark: #202124;
            --google-bg: #f0f4f9;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: var(--google-bg);
            color: var(--google-text);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 20px;
        }

        /* Material Card Design */
        .google-card {
            background: #ffffff;
            border-radius: 28px;
            width: 100%;
            max-width: 450px;
            padding: 40px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05), 0 1px 2px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(0,0,0,0.03);
        }

        /* Brand logos container */
        .brands-container {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 16px;
            margin-bottom: 24px;
        }

        .google-logo {
            width: 32px;
            height: 32px;
        }

        .agency-logo-divider {
            height: 24px;
            width: 1px;
            background-color: var(--google-gray);
        }

        .agency-name {
            font-family: 'Outfit', sans-serif;
            font-weight: 800;
            font-size: 18px;
            background: var(--primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: -0.5px;
        }

        .header-section {
            text-align: center;
            margin-bottom: 30px;
        }

        .title {
            font-size: 24px;
            font-weight: 400;
            color: var(--google-text-dark);
            margin-bottom: 8px;
        }

        .subtitle {
            font-size: 16px;
            color: var(--google-text);
            line-height: 1.4;
        }

        .app-link {
            color: var(--google-blue);
            text-decoration: none;
            font-weight: 500;
        }

        .app-link:hover {
            text-decoration: underline;
        }

        /* Accounts list */
        .account-list {
            margin-bottom: 24px;
            border: 1px solid var(--google-gray);
            border-radius: 12px;
            overflow: hidden;
        }

        .account-item {
            display: flex;
            align-items: center;
            padding: 16px 20px;
            border-bottom: 1px solid var(--google-gray);
            cursor: pointer;
            transition: background-color 0.2s ease;
        }

        .account-item:last-child {
            border-bottom: none;
        }

        .account-item:hover {
            background-color: rgba(60, 64, 67, 0.04);
        }

        .avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 500;
            color: #ffffff;
            font-size: 15px;
            margin-right: 16px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        .avatar.budi { background-color: #e65100; }
        .avatar.jane { background-color: #0d47a1; }
        .avatar.guest { background-color: #5f6368; }

        .account-details {
            flex-grow: 1;
            text-align: left;
        }

        .account-name {
            font-size: 14px;
            font-weight: 500;
            color: var(--google-text-dark);
            margin-bottom: 2px;
        }

        .account-email {
            font-size: 12px;
            color: #5f6368;
        }

        /* Custom account form */
        .custom-form {
            display: none;
            margin-top: 15px;
            animation: fadeIn 0.4s ease;
        }

        .input-group {
            margin-bottom: 20px;
            position: relative;
            text-align: left;
        }

        .input-google {
            width: 100%;
            padding: 16px 14px;
            border: 1px solid var(--google-gray);
            border-radius: 8px;
            font-size: 15px;
            font-family: inherit;
            color: var(--google-text-dark);
            outline: none;
            transition: all 0.2s ease;
        }

        .input-google:focus {
            border-color: var(--google-blue);
            box-shadow: 0 0 0 1px var(--google-blue);
        }

        .input-label {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            background: #ffffff;
            padding: 0 4px;
            color: #5f6368;
            transition: all 0.2s ease;
            pointer-events: none;
            font-size: 15px;
        }

        .input-google:focus + .input-label,
        .input-google:not(:placeholder-shown) + .input-label {
            top: 0;
            font-size: 12px;
            color: var(--google-blue);
            font-weight: 500;
        }

        .btn-google-next {
            background-color: var(--google-blue);
            color: #ffffff;
            border: none;
            padding: 12px 24px;
            border-radius: 100px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s ease, box-shadow 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-google-next:hover {
            background-color: var(--google-blue-hover);
            box-shadow: 0 1px 3px rgba(0,0,0,0.1), 0 1px 2px rgba(0,0,0,0.06);
        }

        .action-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 24px;
        }

        .btn-back-link {
            background: none;
            border: none;
            color: var(--google-blue);
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            font-family: inherit;
        }

        .btn-back-link:hover {
            color: var(--google-blue-hover);
            text-decoration: underline;
        }

        /* Footer */
        .footer-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 30px;
            font-size: 12px;
            color: #5f6368;
        }

        .footer-links {
            display: flex;
            gap: 16px;
        }

        .footer-link {
            color: #5f6368;
            text-decoration: none;
        }

        .footer-link:hover {
            color: var(--google-text-dark);
        }

        /* Authentic Google Loading Spinner */
        .loader-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #ffffff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            z-index: 100;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
        }

        .loader-overlay.active {
            opacity: 1;
            pointer-events: auto;
        }

        .spinner {
            width: 48px;
            height: 48px;
            animation: rotate 2s linear infinite;
        }

        .spinner circle {
            fill: none;
            stroke-width: 4;
            stroke-linecap: round;
            animation: dash 1.5s ease-in-out infinite;
        }

        @keyframes rotate {
            100% { transform: rotate(360deg); }
        }

        @keyframes dash {
            0% {
                stroke-dasharray: 1, 150;
                stroke-dashoffset: 0;
                stroke: #4285F4;
            }
            25% {
                stroke: #DE3E35;
            }
            50% {
                stroke-dasharray: 90, 150;
                stroke-dashoffset: -35;
                stroke: #F7C223;
            }
            75% {
                stroke: #1B9A59;
            }
            100% {
                stroke-dasharray: 90, 150;
                stroke-dashoffset: -124;
                stroke: #4285F4;
            }
        }

        .loading-text {
            margin-top: 24px;
            font-size: 15px;
            font-weight: 500;
            color: var(--google-text-dark);
            font-family: 'Roboto', sans-serif;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

    <div class="google-card">
        <!-- Google Loading Overlay -->
        <div class="loader-overlay" id="loading-overlay">
            <svg class="spinner" viewBox="0 0 50 50">
                <circle cx="25" cy="25" r="20"></circle>
            </svg>
            <div class="loading-text" id="loading-text">Menghubungkan ke Next Young Tech...</div>
        </div>

        <!-- Brands Header -->
        <div class="brands-container">
            <svg class="google-logo" viewBox="0 0 24 24" width="24" height="24">
                <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z"/>
                <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
            </svg>
            <div class="agency-logo-divider"></div>
            <div class="agency-name">Next Young Tech</div>
        </div>

        <div class="header-section">
            <h1 class="title">Pilih akun</h1>
            <p class="subtitle">untuk melanjutkan ke <span class="app-link">Next Young Tech (Mode Demo)</span></p>
        </div>

        <!-- Account Chooser List Container -->
        <div id="chooser-section">
            <div class="account-list">
                <!-- Account 1: Budi -->
                <div class="account-item" onclick="selectAccount('Budi Santoso', 'budi.santoso@gmail.com', 'google_budi_123')">
                    <div class="avatar budi">B</div>
                    <div class="account-details">
                        <div class="account-name">Budi Santoso</div>
                        <div class="account-email">budi.santoso@gmail.com</div>
                    </div>
                </div>
                <!-- Account 2: Jane -->
                <div class="account-item" onclick="selectAccount('Jane Smith', 'janesmith@gmail.com', 'google_jane_456')">
                    <div class="avatar jane">J</div>
                    <div class="account-details">
                        <div class="account-name">Jane Smith</div>
                        <div class="account-email">janesmith@gmail.com</div>
                    </div>
                </div>
                <!-- Option: Use another account -->
                <div class="account-item" onclick="showCustomForm()">
                    <div class="avatar guest" style="background-color: transparent; border: 1px solid var(--google-gray);"><i class="fa-regular fa-circle-user" style="color: var(--google-text); font-size: 18px;"></i></div>
                    <div class="account-details">
                        <div class="account-name" style="font-weight: 400; color: var(--google-blue);">Gunakan akun lain</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Custom Account Sign In Form Section -->
        <div class="custom-form" id="custom-section">
            <form id="google-manual-form" onsubmit="submitCustomForm(event)">
                <div class="input-group">
                    <input type="text" id="custom-name" class="input-google" placeholder=" " required>
                    <label class="input-label" for="custom-name">Nama Lengkap</label>
                </div>
                <div class="input-group">
                    <input type="email" id="custom-email" class="input-google" placeholder=" " required>
                    <label class="input-label" for="custom-email">Email atau Ponsel</label>
                </div>

                <div class="action-bar">
                    <button type="button" class="btn-back-link" onclick="hideCustomForm()"><i class="fa-solid fa-angle-left"></i> Kembali</button>
                    <button type="submit" class="btn-google-next">Berikutnya</button>
                </div>
            </form>
        </div>

        <!-- Hidden submit form to hit backend callback POST route -->
        <form id="google-callback-form" action="{{ route('auth.google.callback-demo') }}" method="POST" style="display: none;">
            @csrf
            <input type="hidden" name="name" id="post-name">
            <input type="hidden" name="email" id="post-email">
            <input type="hidden" name="google_id" id="post-google-id">
        </form>

        <!-- Google Footer -->
        <div class="footer-section">
            <div>Bahasa Indonesia</div>
            <div class="footer-links">
                <a href="{{ route('auth.google') }}" class="footer-link"><i class="fa-solid fa-gear"></i> Konfigurasi API</a>
                <a href="#" class="footer-link">Bantuan</a>
                <a href="#" class="footer-link">Privasi</a>
            </div>
        </div>
    </div>

    <script>
        function selectAccount(name, email, googleId) {
            const overlay = document.getElementById('loading-overlay');
            const loadingText = document.getElementById('loading-text');
            const callbackForm = document.getElementById('google-callback-form');
            
            document.getElementById('post-name').value = name;
            document.getElementById('post-email').value = email;
            document.getElementById('post-google-id').value = googleId;

            // Activate Google Loader overlay
            loadingText.innerText = "Menghubungkan sebagai " + name + "...";
            overlay.classList.add('active');

            // Simulate callback redirect delay for premium realistic feel
            setTimeout(() => {
                callbackForm.submit();
            }, 1200);
        }

        function showCustomForm() {
            document.getElementById('chooser-section').style.display = 'none';
            document.getElementById('custom-section').style.display = 'block';
            document.querySelector('.title').innerText = 'Login Google';
            document.querySelector('.subtitle').innerText = 'Gunakan Akun Google Kustom Anda';
            document.getElementById('custom-name').focus();
        }

        function hideCustomForm() {
            document.getElementById('chooser-section').style.display = 'block';
            document.getElementById('custom-section').style.display = 'none';
            document.querySelector('.title').innerText = 'Pilih akun';
            document.querySelector('.subtitle').innerHTML = 'untuk melanjutkan ke <span class="app-link">Next Young Tech (Mode Demo)</span>';
        }

        function submitCustomForm(event) {
            event.preventDefault();
            const name = document.getElementById('custom-name').value;
            const email = document.getElementById('custom-email').value;
            const mockGoogleId = 'google_custom_' + btoa(email).replace(/[^a-zA-Z0-9]/g, '').toLowerCase().substring(0, 15);

            selectAccount(name, email, mockGoogleId);
        }
    </script>
</body>
</html>
