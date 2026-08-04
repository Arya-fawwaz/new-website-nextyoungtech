<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;
use App\Models\QuotationRequest;
use App\Models\Layanan;
use App\Models\User;
use App\Models\Ulasan;
use App\Models\Portofolio;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function showLogin()
    {
        if (session('admin_logged_in')) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('is_admin', true)
            ->where(function ($query) use ($credentials) {
                $query->where('email', $credentials['username'])
                      ->orWhere('nama', $credentials['username']);
            })
            ->first();

        if ($user && Hash::check($credentials['password'], $user->kata_sandi)) {
            session(['admin_logged_in' => true]);
            // Authenticate user to Laravel's Auth guard as well so auth()->user() is populated
            auth()->login($user);
            return redirect()->route('admin.dashboard')->with('success', 'Selamat datang kembali, Admin!');
        }

        return redirect()->back()->withErrors(['login_error' => 'Username atau Password salah!']);
    }

    public function logout()
    {
        session()->forget('admin_logged_in');
        auth()->logout();
        return redirect()->route('admin.login')->with('success', 'Anda telah keluar dari sistem.');
    }

    public function dashboard()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $inquiries = Inquiry::latest()->get();
        $quotations = QuotationRequest::latest()->get();
        $layanan = Layanan::orderBy('urutan')->get();
        $users = User::latest()->get();
        $reviews = Ulasan::latest()->get();
        $portofolios = Portofolio::latest()->get();

        $totalEstimatedValue = QuotationRequest::sum('estimasi_harga');
        $totalInquiries = Inquiry::where('status', '!=', 'completed')->count();
        $totalQuotations = QuotationRequest::where('status', '!=', 'approved')->count();
        $newInquiries = Inquiry::where('status', 'new')->count();

        return view('admin.dashboard', compact(
            'inquiries',
            'quotations',
            'layanan',
            'users',
            'reviews',
            'portofolios',
            'totalEstimatedValue',
            'totalInquiries',
            'totalQuotations',
            'newInquiries'
        ));
    }

    public function getInquiriesHtml()
    {
        if (!session('admin_logged_in')) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $inquiries = Inquiry::latest()->get();
        // Count only active/non-completed inquiries
        $totalInquiries = Inquiry::where('status', '!=', 'completed')->count();
        $newInquiriesCount = Inquiry::where('status', 'new')->count();

        // Generate WA notification URL of the latest inquiry
        $latestInquiry = Inquiry::where('status', 'new')->latest()->first() ?: Inquiry::latest()->first();
        $waUrl = null;
        if ($latestInquiry) {
            $whatsappMessage = "📩 *PESAN KLIEN MASUK*\n\n" .
                               "👤 Nama: " . $latestInquiry->nama . "\n" .
                               "📧 Email: " . $latestInquiry->email . "\n" .
                               "📱 Telp: " . ($latestInquiry->telepon ?? '-') . "\n" .
                               "📋 Subjek: " . $latestInquiry->subjek . "\n" .
                               "💬 Pesan: " . $latestInquiry->pesan . "\n\n" .
                               "---" . "\n" .
                               "Notifikasi otomatis dari Panel Admin Next Young Tech";
            $waUrl = 'https://wa.me/628881023038?text=' . urlencode($whatsappMessage);
        }

        $html = view('admin.partials.inquiries_list', compact('inquiries'))->render();

        return response()->json([
            'html' => $html,
            'total' => $totalInquiries,
            'new_count' => $newInquiriesCount,
            'wa_url' => $waUrl
        ]);
    }

    public function updateInquiryStatus($id, Request $request)
    {
        if (!session('admin_logged_in')) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $request->validate([
            'status' => 'required|in:new,contacted,completed'
        ]);

        $inquiry = Inquiry::findOrFail($id);
        $inquiry->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status inquiry berhasil diperbarui.');
    }

    public function updateQuotationStatus($id, Request $request)
    {
        if (!session('admin_logged_in')) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $request->validate([
            'status' => 'required|in:pending,reviewed,approved'
        ]);

        $quotation = QuotationRequest::findOrFail($id);
        $quotation->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status penawaran berhasil diperbarui.');
    }

    public function downloadPrd($id)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $quote = QuotationRequest::findOrFail($id);

        $projectLayanan = is_numeric($quote->tipe_proyek) ? Layanan::find($quote->tipe_proyek) : null;
        $projectType = $projectLayanan ? $projectLayanan->nama_paket : strtoupper(str_replace('_', ' ', $quote->tipe_proyek));

        $featureLabels = [
            'multilingual' => 'Multi-Bahasa (+ Rp 100rb)',
            'seo_opt' => 'Super SEO (+ Rp 150rb)',
            'high_anim' => 'GSAP Animasi (+ Rp 200rb)',
            'secure_core' => 'Secure Shield (+ Rp 150rb)',
            'payment_gateway' => 'Payment Gateway (+ Rp 300rb)',
            'cms_integrated' => 'CMS Terintegrasi (+ Rp 250rb)',
        ];

        $selectedFeatures = [];
        if (is_array($quote->fitur)) {
            foreach ($quote->fitur as $feat) {
                $selectedFeatures[] = $featureLabels[$feat] ?? $feat;
            }
        }
        $featuresStr = count($selectedFeatures) > 0 ? implode(', ', $selectedFeatures) : 'Tidak ada';

        $filename = "PRD_" . str_replace(' ', '_', $quote->nama_proyek ?? 'Project') . "_" . date('Ymd') . ".doc";

        $headers = [
            "Content-type"        => "application/vnd.ms-word; charset=utf-8",
            "Content-Disposition" => "attachment; filename=" . $filename,
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $callback = function() use ($quote, $projectType, $featuresStr) {
            $file = fopen('php://output', 'w');
            fwrite($file, "\xEF\xBB\xBF");

            $html = '
            <html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:w="urn:schemas-microsoft-com:office:word" xmlns="http://www.w3.org/TR/REC-html40">
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                <title>Product Requirements Document (PRD)</title>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        line-height: 1.6;
                        color: #333333;
                    }
                    .header-table {
                        width: 100%;
                        border-bottom: 3px double #0284c7;
                        margin-bottom: 30px;
                        padding-bottom: 10px;
                    }
                    .title {
                        font-size: 26px;
                        font-weight: bold;
                        color: #1e1b4b;
                        margin: 0;
                    }
                    .subtitle {
                        font-size: 14px;
                        color: #0ea5e9;
                        font-weight: bold;
                        margin: 5px 0 0 0;
                    }
                    h2 {
                        color: #0ea5e9;
                        border-bottom: 1px solid #cbd5e1;
                        padding-bottom: 5px;
                        margin-top: 30px;
                        font-size: 18px;
                    }
                    table.info-table {
                        width: 100%;
                        border-collapse: collapse;
                        margin-bottom: 20px;
                    }
                    table.info-table td {
                        padding: 8px 10px;
                        border: 1px solid #cbd5e1;
                        font-size: 13px;
                    }
                    table.info-table td.label {
                        font-weight: bold;
                        background-color: #f8fafc;
                        width: 200px;
                    }
                    .content-box {
                        background-color: #f8fafc;
                        border-left: 4px solid #0ea5e9;
                        padding: 15px;
                        margin-bottom: 20px;
                        font-size: 13px;
                    }
                    .footer {
                        margin-top: 50px;
                        font-size: 11px;
                        color: #64748b;
                        border-top: 1px solid #e2e8f0;
                        padding-top: 10px;
                        text-align: center;
                    }
                </style>
            </head>
            <body>
                <table class="header-table">
                    <tr>
                        <td>
                            <div class="title">PRODUCT REQUIREMENTS DOCUMENT (PRD)</div>
                            <div class="subtitle">Next Young Tech - Dokumen Spesifikasi Proyek</div>
                        </td>
                        <td align="right" style="font-size: 12px; color: #64748b;">
                            Tanggal Dibuat: ' . $quote->created_at->format('d F Y') . '
                        </td>
                    </tr>
                </table>

                <h2>1. Informasi Klien & Proyek</h2>
                <table class="info-table">
                    <tr>
                        <td class="label">Nama Lengkap Klien</td>
                        <td>' . htmlspecialchars($quote->nama_klien) . '</td>
                    </tr>
                    <tr>
                        <td class="label">Alamat Email</td>
                        <td>' . htmlspecialchars($quote->email_klien) . '</td>
                    </tr>
                    <tr>
                        <td class="label">Nomor Telepon / WA</td>
                        <td>' . htmlspecialchars($quote->telepon_klien) . '</td>
                    </tr>
                    <tr>
                        <td class="label">Nama Proyek / Brand</td>
                        <td><strong>' . htmlspecialchars($quote->nama_proyek ?? 'Belum Ditentukan') . '</strong></td>
                    </tr>
                    <tr>
                        <td class="label">Status Progress</td>
                        <td>' . strtoupper($quote->status) . '</td>
                    </tr>
                </table>

                <h2>2. Spesifikasi Teknis & Desain Website</h2>
                <table class="info-table">
                    <tr>
                        <td class="label">Tipe / Jenis Website</td>
                        <td>' . htmlspecialchars($projectType) . '</td>
                    </tr>
                    <tr>
                        <td class="label">Tema Warna Utama</td>
                        <td>' . htmlspecialchars($quote->warna_utama ?? 'Belum Ditentukan') . '</td>
                    </tr>
                    <tr>
                        <td class="label">Target Pengguna (Audience)</td>
                        <td>' . htmlspecialchars($quote->target_pengguna ?? 'Belum Ditentukan') . '</td>
                    </tr>
                    <tr>
                        <td class="label">Fitur-fitur Premium</td>
                        <td>' . htmlspecialchars($featuresStr) . '</td>
                    </tr>
                    <tr>
                        <td class="label">Estimasi Nilai Proyek</td>
                        <td style="font-weight: bold; color: #0ea5e9;">Rp ' . number_format($quote->estimasi_harga, 0, ',', '.') . '</td>
                    </tr>
                </table>

                <h2>3. Deskripsi Kebutuhan & Alur Utama (PRD)</h2>
                <div class="content-box">
                    ' . nl2br(htmlspecialchars($quote->deskripsi_proyek ?? 'Tidak ada deskripsi PRD khusus yang disediakan.')) . '
                </div>

                <h2>4. Catatan Khusus Tambahan</h2>
                <div class="content-box" style="border-left-color: #64748b;">
                    ' . nl2br(htmlspecialchars($quote->catatan ?? 'Tidak ada catatan tambahan.')) . '
                </div>

                <div class="footer">
                    Dokumen ini dibuat secara otomatis oleh sistem administrasi Next Young Tech. Seluruh isi dokumen bersifat rahasia dan merupakan hak cipta Next Young Tech & Klien.
                </div>
            </body>
            </html>
            ';

            fwrite($file, $html);
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    // ==========================================
    // CRUD LAYANAN DENGAN METODE DINAMIS
    // ==========================================
    public function storeService(Request $request)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $validated = $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'nama_paket' => 'required|string|max:255',
            'badge' => 'nullable|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'fitur_list' => 'required|string', // Comma separated features
            'ikon' => 'required|string|max:255',
            'warna_aksen' => 'required|string|max:50',
            'urutan' => 'required|integer',
        ]);

        // Convert features list from comma separated string to array
        $fiturArray = array_filter(array_map('trim', explode(',', $validated['fitur_list'])));

        Layanan::create([
            'nama_layanan' => $validated['nama_layanan'],
            'nama_paket' => $validated['nama_paket'],
            'badge' => $validated['badge'] ?: null,
            'deskripsi' => $validated['deskripsi'],
            'harga' => $validated['harga'],
            'fitur_list' => $fiturArray,
            'ikon' => $validated['ikon'],
            'warna_aksen' => $validated['warna_aksen'],
            'urutan' => $validated['urutan'],
            'is_active' => true
        ]);

        return redirect()->back()->with('success', 'Layanan baru berhasil ditambahkan.');
    }

    public function updateService(Request $request, $id)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $lay = Layanan::findOrFail($id);

        $validated = $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'nama_paket' => 'required|string|max:255',
            'badge' => 'nullable|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'fitur_list' => 'required|string', // Comma separated
            'ikon' => 'required|string|max:255',
            'warna_aksen' => 'required|string|max:50',
            'urutan' => 'required|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $fiturArray = array_filter(array_map('trim', explode(',', $validated['fitur_list'])));

        $lay->update([
            'nama_layanan' => $validated['nama_layanan'],
            'nama_paket' => $validated['nama_paket'],
            'badge' => $validated['badge'] ?: null,
            'deskripsi' => $validated['deskripsi'],
            'harga' => $validated['harga'],
            'fitur_list' => $fiturArray,
            'ikon' => $validated['ikon'],
            'warna_aksen' => $validated['warna_aksen'],
            'urutan' => $validated['urutan'],
            'is_active' => $request->has('is_active') ? (bool)$request->is_active : $lay->is_active
        ]);

        return redirect()->back()->with('success', 'Data layanan berhasil diperbarui.');
    }

    public function deleteService($id)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $lay = Layanan::findOrFail($id);
        $lay->delete();

        return redirect()->back()->with('success', 'Layanan berhasil dihapus dari sistem.');
    }

    // ==========================================
    // CRUD PENGGUNA ADMIN
    // ==========================================
    public function storeUser(Request $request)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:pengguna,email',
            'kata_sandi' => 'required|string|min:6',
            'is_admin' => 'required|boolean',
        ]);

        User::create([
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'kata_sandi' => Hash::make($validated['kata_sandi']),
            'is_admin' => $validated['is_admin'],
        ]);

        return redirect()->back()->with('success', 'Akun admin baru berhasil ditambahkan.');
    }

    public function updateUser(Request $request, $id)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $user = User::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:pengguna,email,' . $id,
            'kata_sandi' => 'nullable|string|min:6',
            'is_admin' => 'required|boolean',
        ]);

        $updateData = [
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'is_admin' => $validated['is_admin'],
        ];

        if (!empty($validated['kata_sandi'])) {
            $updateData['kata_sandi'] = Hash::make($validated['kata_sandi']);
        }

        $user->update($updateData);

        return redirect()->back()->with('success', 'Akun pengguna berhasil diperbarui.');
    }

    public function deleteUser($id)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        // Prevent admin from deleting themselves
        if (auth()->check() && auth()->user()->id == $id) {
            return redirect()->back()->withErrors(['user_error' => 'Anda tidak dapat menghapus akun Anda sendiri!']);
        }

        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'Akun pengguna berhasil dihapus.');
    }

    // ==========================================
    // EKSPOR LAPORAN KE EXCEL (CSV) NATIVE STREAM
    // ==========================================
    // ==========================================================
    // EKSPOR LAPORAN KE EXCEL (XLS) DENGAN TATA LETAK PROFESIONAL
    // ==========================================================
    public function exportCsv($type)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $filename = "ekspor_" . $type . "_" . date('Ymd_His') . ".xls";
        $headers = [
            "Content-type"        => "application/vnd.ms-excel; charset=utf-8",
            "Content-Disposition" => "attachment; filename=" . $filename,
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        switch ($type) {
            case 'quotes':
                $data = QuotationRequest::latest()->get();
                $totalVal = QuotationRequest::sum('estimasi_harga');
                $count = QuotationRequest::count();
                $pendingCount = QuotationRequest::where('status', 'pending')->count();
                $reviewedCount = QuotationRequest::where('status', 'reviewed')->count();
                $approvedCount = QuotationRequest::where('status', 'approved')->count();
                
                $callback = function() use($data, $totalVal, $count, $pendingCount, $reviewedCount, $approvedCount) {
                    $file = fopen('php://output', 'w');
                    fwrite($file, "\xEF\xBB\xBF");
                    
                    $html = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">';
                    $html .= '<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
                    $html .= '<style>';
                    $html .= 'body { font-family: "Segoe UI", Arial, sans-serif; background-color: #ffffff; }';
                    $html .= 'table.main-table { border-collapse: collapse; width: 100%; margin-top: 10px; }';
                    $html .= 'table.main-table th { background-color: #0ea5e9; color: #ffffff; font-weight: bold; text-align: left; padding: 12px 10px; font-size: 13px; border: 1px solid #cbd5e1; text-transform: uppercase; }';
                    $html .= 'table.main-table td { padding: 10px; border: 1px solid #cbd5e1; font-size: 12px; color: #334155; vertical-align: middle; }';
                    $html .= 'table.main-table tr.even-row { background-color: #f8fafc; }';
                    $html .= '.report-title { font-size: 20px; font-weight: 800; color: #1e1b4b; margin: 0; }';
                    $html .= '.report-subtitle { font-size: 12px; color: #64748b; margin-top: 5px; }';
                    $html .= '.badge { font-weight: bold; font-size: 11px; padding: 3px 6px; border-radius: 4px; text-align: center; }';
                    $html .= '.badge-pending { background-color: #fee2e2; color: #b91c1c; }';
                    $html .= '.badge-reviewed { background-color: #e0e7ff; color: #4338ca; }';
                    $html .= '.badge-approved { background-color: #d1fae5; color: #065f46; }';
                    $html .= '.summary-table { width: 350px; margin-bottom: 20px; border-collapse: collapse; }';
                    $html .= '.summary-table td { padding: 6px 8px; border: none; font-size: 12px; }';
                    $html .= '.summary-label { font-weight: bold; color: #475569; width: 150px; }';
                    $html .= '.summary-value { font-weight: 800; color: #0f172a; }';
                    $html .= '</style>';
                    $html .= '</head><body>';
                    
                    $html .= '<div class="report-title">LAPORAN ESTIMASI PROYEK (PESANAN KLIEN)</div>';
                    $html .= '<div class="report-subtitle">Next Young Tech - Laporan otomatis dibentuk pada: ' . date('d M Y H:i:s') . '</div>';
                    $html .= '<br>';
                    
                    $html .= '<table class="summary-table">';
                    $html .= '<tr><td class="summary-label">Total Potensi Omset:</td><td class="summary-value" style="color: #0ea5e9;">Rp ' . number_format($totalVal, 0, ',', '.') . '</td></tr>';
                    $html .= '<tr><td class="summary-label">Total Proyek:</td><td class="summary-value">' . $count . ' Proyek</td></tr>';
                    $html .= '<tr><td class="summary-label">Status Tertunda:</td><td class="summary-value" style="color: #b91c1c;">' . $pendingCount . ' Proyek</td></tr>';
                    $html .= '<tr><td class="summary-label">Status Diulas:</td><td class="summary-value" style="color: #4338ca;">' . $reviewedCount . ' Proyek</td></tr>';
                    $html .= '<tr><td class="summary-label">Status Disetujui:</td><td class="summary-value" style="color: #065f46;">' . $approvedCount . ' Proyek</td></tr>';
                    $html .= '<tr><td class="summary-label">Status Pembukuan:</td><td class="summary-value" style="color: #065f46;">Aktif (Berjalan)</td></tr>';
                    $html .= '</table>';
                    
                    $html .= '<table class="main-table">';
                    $html .= '<thead><tr>';
                    $html .= '<th>Nama Klien</th><th>Email Klien</th><th>Telepon</th><th>Tipe Proyek</th><th>Estimasi Harga</th><th>Status</th><th>Catatan</th><th>Tanggal</th>';
                    $html .= '</tr></thead><tbody>';
                    
                    $isEven = false;
                    foreach ($data as $row) {
                        $projectLayanan = is_numeric($row->tipe_proyek) ? Layanan::find($row->tipe_proyek) : null;
                        $tipeProyekText = $projectLayanan ? $projectLayanan->nama_paket : strtoupper(str_replace('_', ' ', $row->tipe_proyek));
                        
                        $statusClass = 'badge-pending';
                        $statusText = 'Tertunda';
                        if ($row->status === 'reviewed') {
                            $statusClass = 'badge-reviewed';
                            $statusText = 'Diulas';
                        } elseif ($row->status === 'approved') {
                            $statusClass = 'badge-approved';
                            $statusText = 'Disetujui';
                        }
                        
                        $trClass = $isEven ? 'class="even-row"' : '';
                        $isEven = !$isEven;
                        
                        $html .= '<tr ' . $trClass . '>';
                        $html .= '<td>' . htmlspecialchars($row->nama_klien) . '</td>';
                        $html .= '<td>' . htmlspecialchars($row->email_klien) . '</td>';
                        $html .= '<td>' . htmlspecialchars($row->telepon_klien) . '</td>';
                        $html .= '<td>' . htmlspecialchars($tipeProyekText) . '</td>';
                        $html .= '<td style="font-weight: bold; text-align: right;">Rp ' . number_format($row->estimasi_harga, 0, ',', '.') . '</td>';
                        $html .= '<td style="text-align: center;"><span class="badge ' . $statusClass . '">' . $statusText . '</span></td>';
                        $html .= '<td>' . htmlspecialchars($row->catatan ?: '-') . '</td>';
                        $html .= '<td>' . $row->created_at->format('d-m-Y H:i') . '</td>';
                        $html .= '</tr>';
                    }
                    
                    $html .= '</tbody>';
                    
                    // Added total foot row for professional display
                    $html .= '<tfoot>';
                    $html .= '<tr style="background-color: #f1f5f9; font-weight: bold;">';
                    $html .= '<td colspan="4" style="text-align: right; font-weight: bold; border: 1px solid #cbd5e1; padding: 10px;">TOTAL KESELURUHAN</td>';
                    $html .= '<td style="text-align: right; font-weight: bold; color: #0ea5e9; border: 1px solid #cbd5e1; padding: 10px;">Rp ' . number_format($totalVal, 0, ',', '.') . '</td>';
                    $html .= '<td style="text-align: center; font-weight: bold; color: #0f172a; border: 1px solid #cbd5e1; padding: 10px;">' . $count . ' Proyek</td>';
                    $html .= '<td colspan="2" style="border: 1px solid #cbd5e1; padding: 10px;"></td>';
                    $html .= '</tr>';
                    $html .= '</tfoot>';
                    
                    $html .= '</table>';
                    $html .= '</body></html>';
                    
                    fwrite($file, $html);
                    fclose($file);
                };
                break;

            case 'inquiries':
                $data = Inquiry::latest()->get();
                $count = Inquiry::count();
                $newCount = Inquiry::where('status', 'new')->count();
                $contactedCount = Inquiry::where('status', 'contacted')->count();
                $completedCount = Inquiry::where('status', 'completed')->count();
                
                $callback = function() use($data, $count, $newCount, $contactedCount, $completedCount) {
                    $file = fopen('php://output', 'w');
                    fwrite($file, "\xEF\xBB\xBF");
                    
                    $html = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">';
                    $html .= '<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
                    $html .= '<style>';
                    $html .= 'body { font-family: "Segoe UI", Arial, sans-serif; background-color: #ffffff; }';
                    $html .= 'table.main-table { border-collapse: collapse; width: 100%; margin-top: 10px; }';
                    $html .= 'table.main-table th { background-color: #0ea5e9; color: #ffffff; font-weight: bold; text-align: left; padding: 12px 10px; font-size: 13px; border: 1px solid #cbd5e1; text-transform: uppercase; }';
                    $html .= 'table.main-table td { padding: 10px; border: 1px solid #cbd5e1; font-size: 12px; color: #334155; vertical-align: middle; }';
                    $html .= 'table.main-table tr.even-row { background-color: #f8fafc; }';
                    $html .= '.report-title { font-size: 20px; font-weight: 800; color: #0c4a6e; margin: 0; }';
                    $html .= '.report-subtitle { font-size: 12px; color: #64748b; margin-top: 5px; }';
                    $html .= '.badge { font-weight: bold; font-size: 11px; padding: 3px 6px; border-radius: 4px; text-align: center; }';
                    $html .= '.badge-new { background-color: #e0f2fe; color: #0369a1; }';
                    $html .= '.badge-contacted { background-color: #fef3c7; color: #b45309; }';
                    $html .= '.badge-completed { background-color: #d1fae5; color: #047857; }';
                    $html .= '.summary-table { width: 350px; margin-bottom: 20px; border-collapse: collapse; }';
                    $html .= '.summary-table td { padding: 6px 8px; border: none; font-size: 12px; }';
                    $html .= '.summary-label { font-weight: bold; color: #475569; width: 150px; }';
                    $html .= '.summary-value { font-weight: 800; color: #0f172a; }';
                    $html .= '</style>';
                    $html .= '</head><body>';
                    
                    $html .= '<div class="report-title">LAPORAN KOTAK PESAN KLIEN (INQUIRIES)</div>';
                    $html .= '<div class="report-subtitle">Next Young Tech - Laporan otomatis dibentuk pada: ' . date('d M Y H:i:s') . '</div>';
                    $html .= '<br>';
                    
                    $html .= '<table class="summary-table">';
                    $html .= '<tr><td class="summary-label">Total Pesan:</td><td class="summary-value">' . $count . ' Pesan</td></tr>';
                    $html .= '<tr><td class="summary-label">Baru (Belum Dibaca):</td><td class="summary-value" style="color: #0369a1;">' . $newCount . ' Pesan</td></tr>';
                    $html .= '<tr><td class="summary-label">Sudah Dihubungi:</td><td class="summary-value" style="color: #b45309;">' . $contactedCount . ' Pesan</td></tr>';
                    $html .= '<tr><td class="summary-label">Status Selesai:</td><td class="summary-value" style="color: #047857;">' . $completedCount . ' Pesan</td></tr>';
                    $html .= '<tr><td class="summary-label">Status Pembukuan:</td><td class="summary-value" style="color: #065f46;">Aktif (Berjalan)</td></tr>';
                    $html .= '</table>';
                    
                    $html .= '<table class="main-table">';
                    $html .= '<thead><tr>';
                    $html .= '<th>Nama Pengirim</th><th>Email</th><th>Telepon</th><th>Subjek</th><th>Pesan</th><th>Status</th><th>Tanggal</th>';
                    $html .= '</tr></thead><tbody>';
                    
                    $isEven = false;
                    foreach ($data as $row) {
                        $statusClass = 'badge-new';
                        $statusText = 'Baru';
                        if ($row->status === 'contacted') {
                            $statusClass = 'badge-contacted';
                            $statusText = 'Dihubungi';
                        } elseif ($row->status === 'completed') {
                            $statusClass = 'badge-completed';
                            $statusText = 'Selesai';
                        }
                        
                        $trClass = $isEven ? 'class="even-row"' : '';
                        $isEven = !$isEven;
                        
                        $html .= '<tr ' . $trClass . '>';
                        $html .= '<td>' . htmlspecialchars($row->nama) . '</td>';
                        $html .= '<td>' . htmlspecialchars($row->email) . '</td>';
                        $html .= '<td>' . htmlspecialchars($row->telepon ?: '-') . '</td>';
                        $html .= '<td style="font-weight: bold;">' . htmlspecialchars($row->subjek) . '</td>';
                        $html .= '<td>' . htmlspecialchars($row->pesan) . '</td>';
                        $html .= '<td style="text-align: center;"><span class="badge ' . $statusClass . '">' . $statusText . '</span></td>';
                        $html .= '<td>' . $row->created_at->format('d-m-Y H:i') . '</td>';
                        $html .= '</tr>';
                    }
                    
                    $html .= '</tbody>';
                    
                    // Added total foot row for professional display
                    $html .= '<tfoot>';
                    $html .= '<tr style="background-color: #f1f5f9; font-weight: bold;">';
                    $html .= '<td colspan="5" style="text-align: right; font-weight: bold; border: 1px solid #cbd5e1; padding: 10px;">TOTAL KESELURUHAN PESAN</td>';
                    $html .= '<td style="text-align: center; font-weight: bold; color: #0f172a; border: 1px solid #cbd5e1; padding: 10px;">' . $count . ' Pesan</td>';
                    $html .= '<td style="border: 1px solid #cbd5e1; padding: 10px;"></td>';
                    $html .= '</tr>';
                    $html .= '</tfoot>';
                    
                    $html .= '</table>';
                    $html .= '</body></html>';
                    
                    fwrite($file, $html);
                    fclose($file);
                };
                break;

            case 'users':
                $data = User::latest()->get();
                $count = User::count();
                $adminCount = User::where('is_admin', true)->count();
                
                $callback = function() use($data, $count, $adminCount) {
                    $file = fopen('php://output', 'w');
                    fwrite($file, "\xEF\xBB\xBF");
                    
                    $html = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">';
                    $html .= '<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
                    $html .= '<style>';
                    $html .= 'body { font-family: "Segoe UI", Arial, sans-serif; background-color: #ffffff; }';
                    $html .= 'table.main-table { border-collapse: collapse; width: 100%; margin-top: 10px; }';
                    $html .= 'table.main-table th { background-color: #10b981; color: #ffffff; font-weight: bold; text-align: left; padding: 12px 10px; font-size: 13px; border: 1px solid #cbd5e1; text-transform: uppercase; }';
                    $html .= 'table.main-table td { padding: 10px; border: 1px solid #cbd5e1; font-size: 12px; color: #334155; vertical-align: middle; }';
                    $html .= 'table.main-table tr.even-row { background-color: #f8fafc; }';
                    $html .= '.report-title { font-size: 20px; font-weight: 800; color: #064e3b; margin: 0; }';
                    $html .= '.report-subtitle { font-size: 12px; color: #64748b; margin-top: 5px; }';
                    $html .= '.badge { font-weight: bold; font-size: 11px; padding: 3px 6px; border-radius: 4px; text-align: center; }';
                    $html .= '.badge-admin { background-color: #d1fae5; color: #065f46; }';
                    $html .= '.badge-staff { background-color: #f3f4f6; color: #4b5563; }';
                    $html .= '.summary-table { width: 350px; margin-bottom: 20px; border-collapse: collapse; }';
                    $html .= '.summary-table td { padding: 6px 8px; border: none; font-size: 12px; }';
                    $html .= '.summary-label { font-weight: bold; color: #475569; width: 150px; }';
                    $html .= '.summary-value { font-weight: 800; color: #0f172a; }';
                    $html .= '</style>';
                    $html .= '</head><body>';
                    
                    $html .= '<div class="report-title">LAPORAN DAFTAR PENGGUNA DAN TIM</div>';
                    $html .= '<div class="report-subtitle">Next Young Tech - Laporan otomatis dibentuk pada: ' . date('d M Y H:i:s') . '</div>';
                    $html .= '<br>';
                    
                    $html .= '<table class="summary-table">';
                    $html .= '<tr><td class="summary-label">Total Pengguna:</td><td class="summary-value">' . $count . ' Akun</td></tr>';
                    $html .= '<tr><td class="summary-label">Total Admin:</td><td class="summary-value" style="color: #065f46;">' . $adminCount . ' Admin</td></tr>';
                    $html .= '</table>';
                    
                    $html .= '<table class="main-table">';
                    $html .= '<thead><tr>';
                    $html .= '<th>Nama</th><th>Email</th><th>Status Otoritas</th><th>Tanggal Terdaftar</th>';
                    $html .= '</tr></thead><tbody>';
                    
                    $isEven = false;
                    foreach ($data as $row) {
                        $statusClass = $row->is_admin ? 'badge-admin' : 'badge-staff';
                        $statusText = $row->is_admin ? 'Super Admin' : 'Staff Operasional';
                        
                        $trClass = $isEven ? 'class="even-row"' : '';
                        $isEven = !$isEven;
                        
                        $html .= '<tr ' . $trClass . '>';
                        $html .= '<td>' . htmlspecialchars($row->nama) . '</td>';
                        $html .= '<td>' . htmlspecialchars($row->email) . '</td>';
                        $html .= '<td style="text-align: center;"><span class="badge ' . $statusClass . '">' . $statusText . '</span></td>';
                        $html .= '<td>' . $row->created_at->format('d-m-Y H:i') . '</td>';
                        $html .= '</tr>';
                    }
                    
                    $html .= '</tbody></table>';
                    $html .= '</body></html>';
                    
                    fwrite($file, $html);
                    fclose($file);
                };
                break;

            default:
                return redirect()->back()->withErrors(['export_error' => 'Tipe ekspor tidak didukung.']);
        }

        return response()->stream($callback, 200, $headers);
    }

    // ==========================================
    // AKSI TUTUP PEMBUKUAN & RESET SELURUH DATA AKTIF
    // ==========================================
    public function tutupPembukuan(Request $request)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $request->validate([
            'konfirmasi' => 'required|string'
        ]);

        if (strtoupper(trim($request->konfirmasi)) !== 'TUTUP PEMBUKUAN') {
            return redirect()->back()->withErrors(['tutup_error' => 'Frasa konfirmasi salah! Silakan ketik "TUTUP PEMBUKUAN" dengan benar untuk melakukan reset.']);
        }

        // Wipe active inquiry and quotation data
        Inquiry::truncate();
        QuotationRequest::truncate();

        return redirect()->route('admin.dashboard')->with('success', 'Pembukuan periode berjalan berhasil ditutup! Semua data inquiry dan penawaran aktif telah di-reset kembali ke nol.');
    }

    // ==========================================
    // CRUD PORTOFOLIO ADMIN
    // ==========================================
    public function storePortofolio(Request $request)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'link' => 'nullable|string|max:255',
            'caption' => 'nullable|string|max:255',
            'informasi' => 'nullable|string',
            'framework' => 'nullable|string|max:255',
        ]);

        Portofolio::create($validated);

        return redirect()->back()->with('success', 'Portofolio baru berhasil ditambahkan.');
    }

    public function updatePortofolio(Request $request, $id)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $portofolio = Portofolio::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'link' => 'nullable|string|max:255',
            'caption' => 'nullable|string|max:255',
            'informasi' => 'nullable|string',
            'framework' => 'nullable|string|max:255',
        ]);

        $portofolio->update($validated);

        return redirect()->back()->with('success', 'Data portofolio berhasil diperbarui.');
    }

    public function deletePortofolio($id)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $portofolio = Portofolio::findOrFail($id);
        $portofolio->delete();

        return redirect()->back()->with('success', 'Portofolio berhasil dihapus dari sistem.');
    }
}

