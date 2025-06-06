<?php

namespace App\Http\Controllers;

use App\Models\UjianModel;
use Laravolt\Avatar\Avatar;
use Illuminate\Http\Request;
use App\Models\PendaftaranModel;
use Illuminate\Support\Facades\Auth;

class UjianController extends Controller
{
    protected $avatar;
    public function __construct()
    {
        $this->avatar = new Avatar;
    }
    public function index()
    {
        $page = (object) [
            'title' => __('pendaftaran.title'),
        ];
        $pendaftaran = UjianModel::with('admin')->get();
        $adminNama = $pendaftaran->isNotEmpty() ? $pendaftaran->first()->admin->admin_nama : 'Admin';
        $avatar = $this->avatar->create($adminNama)->setBackground('#4B5563')->setBorder(4, '#1C64F2')->toBase64();
        return view('admin.pendaftaran.index', compact('page', 'pendaftaran', 'avatar'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_ujian' => 'required|string|max:255',
            'jadwal_ujian' => 'required|date',
            'waktu_ujian' => 'required|date_format:H:i',
            'ujian_status' => 'required|in:Open,Close', // Validate time format (HH:MM)
            'kuota' => 'required|integer|min:1',
        ]);

        try {
            UjianModel::create([
                'nama_ujian' => $validated['nama_ujian'],
                'jadwal_ujian' => $validated['jadwal_ujian'],
                'waktu_ujian' => $validated['waktu_ujian'],
                'kuota' => $validated['kuota'],
                'admin_id' => auth()->user()->id,
                'ujian_status' => $validated['ujian_status'],
            ]);
            return redirect()->route('ujian.index')->with('toast_success', __('pendaftaran.createSuccess'));
        } catch (\Exception $e) {
            return redirect()->route('ujian.index')->with('toast_error', __('pendaftaran.createError'));
        }
    }

    public function edit($id)
    {
        $pendaftaran = UjianModel::findOrFail($id);
        $page = (object) [
            'title' => __('pendaftaran.title'),
        ];
        return view('admin.pendaftaran.edit', compact('page', 'pendaftaran'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_ujian' => 'required|string|max:255',
            'jadwal_ujian' => 'required|date',
            'waktu_ujian' => 'required|date_format:H:i',
            'kuota' => 'required|integer|min:1',
            'ujian_status' => 'required|in:Open,Close'
        ]);

        $pendaftaran = UjianModel::findOrFail($id);

        try {
            $pendaftaran->update([
                'nama_ujian' => $validated['nama_ujian'],
                'jadwal_ujian' => $validated['jadwal_ujian'],
                'waktu_ujian' => $validated['waktu_ujian'],
                'kuota' => $validated['kuota'],
                'admin_id' => auth()->user()->id,
                'ujian_status' => $validated['ujian_status'],
            ]);
            return redirect()->route('ujian.index')->with('toast_success', __('pendaftaran.updateSuccess'));
        } catch (\Exception $e) {
            return redirect()->route('ujian.index')->with('toast_error', __('pendaftaran.updateError'));
        }
    }

    public function destroy($id)
    {
        $pendaftaran = UjianModel::findOrFail($id);
        try {
            $pendaftaran->delete();
            return redirect()->route('ujian.index')->with('toast_success', __('pendaftaran.deleteSuccess'));
        } catch (\Exception $e) {
            return redirect()->route('ujian.index')->with('toast_error', __('pendaftaran.deleteError'));
        }
    }

    public function show($id)
    {
        $ujian = UjianModel::with(['admin', 'pendaftar.user'])->findOrFail($id);
        $page = (object) [
            'title' => __('Detail Ujian'),
        ];

        $headerProfile = Auth::user()->admin->admin_nama;
        $avatar = $this->avatar->create($headerProfile)->setBackground('#4B5563')->setBorder(4, '#1C64F2')->toBase64();
        return view('admin.pendaftaran.show', compact('page', 'ujian', 'avatar'));
    }

    public function detailPendaftar($id)
    {
        $page = (object) [
            'title' => __('Detail Ujian'),
        ];
        $pendaftaran = PendaftaranModel::with(['ujian', 'mahasiswa', 'hasilUjian'])
            ->findOrFail($id);
        $headerProfile = Auth::user()->admin->admin_nama;
        $avatar = $this->avatar->create($headerProfile)->setBackground('#4B5563')->setBorder(4, '#1C64F2')->toBase64();
        return view('admin.pendaftaran.detail', compact('pendaftaran', 'avatar', 'page'));
    }

    public function approve($id)
    {
        $pendaftaran = PendaftaranModel::with(['user', 'ujian'])->findOrFail($id);

        try {
            $pendaftaran->update(['status' => 'Verified']);

            $this->sendWhatsAppNotification($pendaftaran);

            return redirect()->back()->with('toast_success', 'Pendaftaran berhasil disetujui dan notifikasi WhatsApp telah dikirim');
        } catch (\Exception $e) {
            return redirect()->back()->with('toast_error', 'Pendaftaran disetujui tetapi gagal mengirim notifikasi WhatsApp: ' . $e->getMessage());
        }
    }

    private function sendWhatsAppNotification($pendaftaran)
    {
        $token = env('WHATSAPP_API_KEY'); // Ganti dengan token Fontee Anda
        $url = 'https://api.fonnte.com/send';

        // Format nomor WhatsApp (pastikan tanpa + dan spasi)
        $phone = $this->formatPhoneNumber($pendaftaran->user->mahasiswa->no_telp); // Asumsi nomor ada di relasi user

        // Siapkan pesan
        $message = $this->buildApprovalMessage($pendaftaran);

        // Siapkan data payload sesuai format Fontee
        $payload = [
            [
                'target' => $phone,
                'message' => $message,
                'delay' => '1' // Delay pengiriman dalam detik
            ]
        ];

        // Konversi ke format JSON string untuk CURLOPT_POSTFIELDS
        $postData = http_build_query([
            'data' => json_encode($payload)
        ]);

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $postData,
            CURLOPT_HTTPHEADER => [
                'Authorization: ' . $token
            ],
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        curl_close($curl);

        if ($error) {
            throw new \Exception('cURL Error: ' . $error);
        }

        $responseData = json_decode($response, true);

        if ($httpCode != 200 || !isset($responseData['status']) || $responseData['status'] != 'success') {
            throw new \Exception($responseData['message'] ?? 'Gagal mengirim notifikasi WhatsApp');
        }

        return $responseData;
    }

    private function formatPhoneNumber($phone)
    {
        // Bersihkan nomor dari karakter non-digit
        $phone = preg_replace('/[^0-9]/', '', $phone);

        // Jika diawali 0, ganti dengan 62
        if (str_starts_with($phone, '0')) {
            return '62' . substr($phone, 1);
        }

        // Jika diawali +62, hilangkan +
        if (str_starts_with($phone, '+62')) {
            return substr($phone, 1);
        }

        // Jika diawali 62, langsung return
        if (str_starts_with($phone, '62')) {
            return $phone;
        }

        // Default: tambahkan 62
        return '62' . $phone;
    }

    private function buildApprovalMessage($pendaftaran)
    {
        return "🎉 *PENDAFTARAN UJIAN DISETUJUI* 🎉\n\n" .
            "Halo *{$pendaftaran->user->mahasiswa->mahasiswa_nama}*,\n\n" .
            "Selamat! Pendaftaran ujian Anda telah *DISETUJUI*.\n\n" .
            "📋 *Detail Ujian:*\n" .
            "• Nama Ujian: {$pendaftaran->ujian->nama_ujian}\n" .
            "• Tanggal: " . $pendaftaran->ujian->jadwal_ujian->format('d-m-Y') . "\n" .
            "• Waktu: {$pendaftaran->ujian->waktu_ujian_display}\n\n" .
            "📌 *Langkah Selanjutnya:*\n" .
            "1. Siapkan dokumen yang diperlukan\n" .
            "2. Hadir sesuai jadwal di lokasi ujian\n" .
            "3. Bawa kartu identitas mahasiswa\n\n" .
            "Terima kasih! 🙏";
    }

    public function close(UjianModel $ujian)
    {
        $ujian->update(['ujian_status' => 'Close']);
        return redirect()->back()->with('toast_success', 'Registration closed successfully');
    }
}
