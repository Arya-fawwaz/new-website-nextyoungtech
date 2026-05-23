<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Inquiry;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telepon' => 'required|string|max:25',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'name.string' => 'Format nama tidak valid.',
            'name.max' => 'Nama lengkap terlalu panjang (maksimal 255 karakter).',
            'email.required' => 'Alamat email wajib diisi.',
            'email.email' => 'Format alamat email tidak valid.',
            'email.max' => 'Alamat email terlalu panjang.',
            'telepon.required' => 'Nomor telepon wajib diisi.',
            'telepon.max' => 'Nomor telepon terlalu panjang.',
            'subject.required' => 'Subjek atau topik wajib diisi.',
            'subject.max' => 'Subjek terlalu panjang.',
            'message.required' => 'Isi pesan wajib diisi.',
        ]);

        Inquiry::create([
            'nama' => $validated['name'],
            'email' => $validated['email'],
            'telepon' => $validated['telepon'],
            'subjek' => $validated['subject'],
            'pesan' => $validated['message'],
        ]);

        // Format a professional WhatsApp message URL
        $whatsappMessage = "Halo Next Young Tech,\n\nSaya ingin berkonsultasi mengenai layanan teknologi:\n\n" .
                           "- Nama Klien: " . $request->name . "\n" .
                           "- Email Klien: " . $request->email . "\n" .
                           "- No. Telepon: " . $request->telepon . "\n" .
                           "- Topik Subjek: " . $request->subject . "\n" .
                           "- Detail Pesan: " . $request->message . "\n\n" .
                           "Mohon tanggapannya. Terima kasih.";

        $whatsappUrl = 'https://wa.me/628881023038?text=' . urlencode($whatsappMessage);

        return redirect()->back()
            ->with('success', 'Pesan Anda telah berhasil dikirim & disimpan! Silakan lanjutkan konsultasi via WhatsApp.')
            ->with('whatsapp_redirect', $whatsappUrl);
    }
}
