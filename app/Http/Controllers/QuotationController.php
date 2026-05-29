<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\QuotationRequest;

class QuotationController extends Controller
{
    public function index()
    {
        if (!auth()->check()) {
            return redirect()->route('login')->withErrors(['auth_error' => 'Silakan masuk (login) atau daftar akun terlebih dahulu untuk melakukan pemesanan dan estimasi biaya proyek.']);
        }
        $layananList = \App\Models\Layanan::where('is_active', true)->orderBy('urutan')->get();
        return view('quotation', compact('layananList'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'client_email' => 'required|email|max:255',
            'client_phone' => 'required|string|max:50',
            'project_type' => 'required|string',
            'features' => 'required|array',
            'estimated_price' => 'required|numeric|min:0',
            'notes' => 'nullable|string',
            'project_name' => 'required|string|max:255',
            'color_theme' => 'required|string|max:255',
            'target_audience' => 'required|string|max:255',
            'project_description' => 'required|string',
        ], [
            'client_name.required' => 'Nama lengkap klien wajib diisi.',
            'client_email.required' => 'Alamat email klien wajib diisi.',
            'client_email.email' => 'Format alamat email tidak valid.',
            'client_phone.required' => 'Nomor telepon / WhatsApp wajib diisi.',
            'project_type.required' => 'Tipe proyek wajib dipilih.',
            'features.required' => 'Fitur wajib dipilih.',
            'estimated_price.required' => 'Estimasi harga wajib ditentukan.',
            'project_name.required' => 'Nama Proyek / Brand website wajib diisi.',
            'color_theme.required' => 'Pilihan warna utama wajib diisi.',
            'target_audience.required' => 'Target pengguna website wajib diisi.',
            'project_description.required' => 'Deskripsi kebutuhan PRD wajib diisi.',
        ]);

        QuotationRequest::create([
            'nama_klien' => $validated['client_name'],
            'email_klien' => $validated['client_email'],
            'telepon_klien' => $validated['client_phone'],
            'tipe_proyek' => $validated['project_type'],
            'fitur' => $validated['features'],
            'estimasi_harga' => $validated['estimated_price'],
            'catatan' => $validated['notes'] ?? null,
            'nama_proyek' => $validated['project_name'],
            'warna_utama' => $validated['color_theme'],
            'target_pengguna' => $validated['target_audience'],
            'deskripsi_proyek' => $validated['project_description'],
        ]);

        // Map internal values to readable Indonesian labels dynamically from DB
        $lay = is_numeric($request->project_type) ? \App\Models\Layanan::find($request->project_type) : null;
        if ($lay) {
            $projectType = $lay->nama_paket . ' (Mulai Rp ' . number_format($lay->harga, 0, ',', '.') . ')';
        } else {
            $legacyMap = [
                'web_design_standard' => 'Standar (Mulai Rp 500rb)',
                'web_design_interactive' => 'Full Interaktif (Mulai Rp 700rb)',
                'web_design_hosting' => 'Lengkap + Hosting (Mulai Rp 1.5jt)',
            ];
            $projectType = $legacyMap[$request->project_type] ?? $request->project_type;
        }

        $featureLabels = [
            'multilingual' => 'Multi-Bahasa (+ Rp 100rb)',
            'seo_opt' => 'Super SEO (+ Rp 150rb)',
            'high_anim' => 'GSAP Animasi (+ Rp 200rb)',
            'secure_core' => 'Secure Shield (+ Rp 150rb)',
            'payment_gateway' => 'Payment Gateway (+ Rp 300rb)',
            'cms_integrated' => 'CMS Terintegrasi (+ Rp 250rb)',
        ];
        $pages = $request->pages ?? 1;

        $selectedFeatures = [];
        if (is_array($request->features)) {
            foreach ($request->features as $feat) {
                $selectedFeatures[] = $featureLabels[$feat] ?? $feat;
            }
        }
        $featuresStr = count($selectedFeatures) > 0 ? implode(', ', $selectedFeatures) : 'Tidak ada';

        $formattedPrice = 'Rp ' . number_format($request->estimated_price, 0, ',', '.');

        // Format a professional WhatsApp message URL including complete PRD details
        $whatsappMessage = "Halo Next Young Tech,\n\nSaya ingin berkonsultasi mengenai estimasi biaya & PRD Website:\n\n" .
                           "- Nama Klien: " . $request->client_name . "\n" .
                           "- Nama Proyek/Brand: " . $request->project_name . "\n" .
                           "- Tipe Website: " . $projectType . "\n" .
                           "- Warna Utama: " . $request->color_theme . "\n" .
                           "- Target Pengguna: " . $request->target_audience . "\n" .
                           "- Fitur Tambahan: " . $featuresStr . "\n" .
                           "- Estimasi Jumlah Halaman: " . $pages . " Halaman\n" .
                           "- Estimasi Total Biaya: " . $formattedPrice . "\n" .
                           "- Deskripsi Singkat PRD: " . $request->project_description . "\n\n" .
                           "Mohon diproses untuk konsultasi PRD lebih lanjut. Terima kasih.";

        $whatsappUrl = 'https://wa.me/628881023038?text=' . urlencode($whatsappMessage);

        return redirect()->back()
            ->with('success', 'Formulir PRD & permintaan penawaran proyek Anda telah diterima! Tim Next Young Tech akan menganalisis kebutuhan Anda dan mengirimkan proposal resmi dalam 24 jam. Silakan lanjutkan konsultasi via WhatsApp.')
            ->with('whatsapp_redirect', $whatsappUrl);
    }
}
