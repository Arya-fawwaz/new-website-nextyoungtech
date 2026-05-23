<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ChatbotController extends Controller
{
    public function handleMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $userMessage = trim($request->input('message'));
        $lowerMessage = Str::lower($userMessage);

        $reply = '';
        $options = [];

        // Simple Natural Language Processing heuristics (tidak kaku!)
        if ($this->hasKeywords($lowerMessage, ['halo', 'hai', 'hello', 'siapa', 'nova', 'p ', 'phello', 'assalamualaikum', 'sore', 'pagi', 'siang', 'malam'])) {
            $reply = "Halo! 🚀 Saya **Nova**, asisten virtual astronot Anda di **Next Young Tech**! Senang sekali bisa menyapa Anda. Saya di sini untuk membantu mendiskusikan ide proyek website luar biasa Anda secara santai tapi profesional. Ada proyek seru apa nih yang ingin kita luncurkan bersama hari ini? 😊";
            $options = [
                "Tanya Layanan Web",
                "Estimasi Biaya Proyek",
                "Teknologi yang Dipakai",
                "Hubungi Sales WA"
            ];
        } elseif ($this->hasKeywords($lowerMessage, ['layanan', 'paket', 'fitur', 'bikin web', 'jasa', 'jual', 'buat web', 'services', 'produk'])) {
            $reply = "Di **Next Young Tech**, kami menghadirkan 3 pilar layanan pengembangan digital premium kelas dunia:\n\n" .
                     "1. 🌌 **Interactive 3D Web Development**: Integrasi visual imersif Three.js WebGL untuk wujudkan web masa depan yang memikat audiens seketika.\n" .
                     "2. ⚡ **Enterprise Laravel Web App**: Sistem aplikasi berbasis Laravel 11 yang super cepat, aman, kokoh, dan siap menampung ribuan transaksi.\n" .
                     "3. 🎨 **Premium Landing Page & Branding**: Desain UI/UX custom kelas atas yang berciri khas modern (bukan template biasa) lengkap dengan visualisasi mewah.\n\n" .
                     "Semua layanan kami sudah dioptimalkan agar berjalan super mulus di 60 FPS pada HP Android Anda! Mau coba hitung estimasi biayanya?";
            $options = [
                "Estimasi Biaya Proyek",
                "Teknologi yang Dipakai",
                "Bagaimana Cara Order?"
            ];
        } elseif ($this->hasKeywords($lowerMessage, ['harga', 'biaya', 'tarif', 'berapa', 'quotation', 'price', 'mahal', 'budget', 'dana'])) {
            $reply = "Mengenai investasi proyek, kami sangat mengedepankan **transparansi**. Harga layanan kami berkisar dari Rp 1.500.000 untuk Landing Page elegan, hingga sistem web aplikasi kustom skala besar yang disesuaikan kebutuhan.\n\n" .
                     "Kabar baiknya! Anda bisa menghitung estimasi biaya secara instan & real-time menggunakan **Kalkulator Estimasi Biaya Interaktif** kami! Mau saya bantu arahkan ke halamannya?";
            $options = [
                "Buka Kalkulator Biaya",
                "Tanya Layanan Web",
                "Hubungi Tim Sales WA"
            ];
        } elseif ($this->hasKeywords($lowerMessage, ['teknologi', 'tech', 'stack', 'bahasa', 'laravel', 'three', 'three.js', 'css', 'database', 'mysql', 'sqlite'])) {
            $reply = "Kami menggunakan tumpukan teknologi modern berkinerja ultra-tinggi untuk memastikan performa website Anda berada di level tertinggi:\n\n" .
                     "🚀 **Laravel 11 & PHP 8.2+**: Mesin backend super aman, tangguh, dan sangat andal.\n" .
                     "🌐 **Three.js & WebGL**: Menghadirkan visualisasi grafis 3D interaktif langsung di browser tanpa plugin tambahan.\n" .
                     "⚡ **Tailwind CSS v4 & Vite**: Memastikan rendering gaya secepat kilat dengan efek kaca (*glassmorphism*) yang modern.\n" .
                     "📱 **Mobile Fluid Layout**: Dioptimalkan khusus agar ramah jaringan lambat dan sangat rapi di HP Android Anda.";
            $options = [
                "Kelebihan Next Young Tech",
                "Tanya Layanan Web",
                "Hubungi Sales WA"
            ];
        } elseif ($this->hasKeywords($lowerMessage, ['kelebihan', 'kenapa', 'unggul', 'bagus', 'hebat', 'keunggulan', 'keuntungan'])) {
            $reply = "Kenapa harus mempercayakan proyek Anda kepada **Next Young Tech**? 🤔\n\n" .
                     "✨ **Desain Kustom Mewah**: Kami anti-template! Setiap baris kode dan piksel desain dirancang khusus mencerminkan kemewahan bisnis Anda.\n" .
                     "✨ **Visual Interaktif 3D**: Kami adalah pelopor integrasi Three.js WebGL yang memikat hati pengunjung secara instan.\n" .
                     "✨ **Keamanan & Skalabilitas Kokoh**: Dengan Laravel core, database Anda aman terlindungi dari SQL Injection dan serangan cyber.\n" .
                     "✨ **Mobile Android Fluidity**: Web kami tetap enteng, cepat terbuka, dan rapi diakses dari jaringan mana pun di HP Android Anda.";
            $options = [
                "Tanya Layanan Web",
                "Estimasi Biaya Proyek",
                "Hubungi Sales WA"
            ];
        } elseif ($this->hasKeywords($lowerMessage, ['cara pesan', 'pesan', 'order', 'beli', 'kontak', 'hubungi', 'whatsapp', 'wa', 'sales', 'telepon', 'alamat', 'alamat ip', 'jaringan'])) {
            if (!auth()->check()) {
                $reply = "Waduh! Untuk melakukan pemesanan proyek digital di **Next Young Tech**, **Anda harus masuk (login) atau mendaftar akun terlebih dahulu** ya! 😊\n\nSilakan klik tautan di bawah ini untuk masuk ke portal akun Anda. Setelah masuk, Anda bisa bebas menggunakan fitur estimasi biaya dan berkonsultasi langsung secara resmi.\n\n👉 **[Masuk ke Portal / Daftar Akun](/login)**";
                $options = [
                    "Masuk / Daftar Akun",
                    "Tanya Layanan Web",
                    "Teknologi yang Dipakai"
                ];
            } else {
                $reply = "Caranya sangat mudah dan praktis! Anda bisa langsung berkonsultasi secara personal dengan tim ahli kami via **WhatsApp** di nomor **+62 888-1023-038**.\n\nKami akan membantu membedah ide Anda, memberikan masukan arsitektur sistem, hingga merumuskan penawaran harga terbaik. Mau saya hubungkan sekarang juga?";
                $options = [
                    "Hubungkan ke WA Sekarang",
                    "Estimasi Biaya Proyek",
                    "Tanya Layanan Web"
                ];
            }
        } else {
            // Friendly default fallback
            $reply = "Aduh, maaf ya... Kursor kosmik saya agak meleset memahami itu 🚀. Tapi tenang! Nova bisa bantu jelaskan tentang:\n\n" .
                     "💡 **Layanan Pembuatan Web** premium kami.\n" .
                     "💰 **Estimasi Biaya Proyek** secara instan.\n" .
                     "🛠️ **Teknologi Canggih** yang kami gunakan.\n" .
                     "📞 **Cara Hubungi WhatsApp** tim ahli kami.\n\n" .
                     "Coba tanyakan sesuatu tentang poin di atas atau pilih salah satu menu instan di bawah ini ya! 😊";
            $options = [
                "Tanya Layanan Web",
                "Estimasi Biaya Proyek",
                "Teknologi yang Dipakai",
                "Hubungi Sales WA"
            ];
        }

        return response()->json([
            'reply' => $reply,
            'options' => $options
        ]);
    }

    private function hasKeywords($message, array $keywords)
    {
        foreach ($keywords as $keyword) {
            if (Str::contains($message, $keyword)) {
                return true;
            }
        }
        return false;
    }
}
