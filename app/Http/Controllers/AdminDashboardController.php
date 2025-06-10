<?php

namespace App\Http\Controllers;

use App\Models\UjianModel;
use Laravolt\Avatar\Avatar;
use Illuminate\Http\Request;
use App\Models\MahasiswaModel;
use App\Models\PendaftaranModel;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    protected $avatar;
    public function __construct()
    {
        $this->avatar = new Avatar;
    }
    public function index()
    {
        $page = (object) [
            'title' => __('admin_dashboard.title'),
        ];
        $headerProfile = Auth::user()->admin->admin_nama;
        $avatar = $this->avatar->create($headerProfile)->setBackground('#4B5563')->setBorder(4, '#1C64F2')->toBase64();

        // Total Mahasiswa
        $mahasiswaCount = MahasiswaModel::count();

        // Total Ujian
        $ujianCount = UjianModel::count();

        // Peserta Ujian Approved
        $approveCount = PendaftaranModel::where('status', 'Verified')->count();

        // Peserta Ujian Pending
        $pendingCount = PendaftaranModel::where('status', 'Non Verified')->count();

        // Peserta Terbaru
        $pendaftaranLatest = PendaftaranModel::with(['mahasiswa.prodi', 'ujian'])
            ->latest()
            ->take(5)
            ->get();

        // Ujian Tersedia
        $ujianOpen = UjianModel::withCount('pendaftar')
            ->where('ujian_status', 'Open')
            ->orderBy('jadwal_ujian', 'asc')
            ->take(3)
            ->get();

        // Data untuk chart
        $chartData = $this->getRegistrationStats();

        return view('admin.index', compact('page', 'avatar', 'mahasiswaCount', 'ujianCount', 'approveCount', 'pendingCount', 'pendaftaranLatest', 'ujianOpen', 'chartData'));
    }

    private function getRegistrationStats()
    {
        // Data bulanan (12 bulan terakhir)
        $monthlyData = PendaftaranModel::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as count')
            ->where('created_at', '>=', now()->subMonths(11)->startOfMonth())
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();

        $monthlyLabels = [];
        $monthlyCounts = [];

        // Generate labels dan data untuk 12 bulan terakhir
        for ($i = 11; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $monthlyLabels[] = $date->translatedFormat('M Y');

            $found = $monthlyData->first(function ($item) use ($date) {
                return $item->year == $date->year && $item->month == $date->month;
            });

            $monthlyCounts[] = $found ? $found->count : 0;
        }

        // Data mingguan (6 minggu terakhir)
        $weeklyData = PendaftaranModel::selectRaw('YEAR(created_at) as year, WEEK(created_at) as week, COUNT(*) as count')
            ->where('created_at', '>=', now()->subWeeks(5)->startOfWeek())
            ->groupBy('year', 'week')
            ->orderBy('year', 'asc')
            ->orderBy('week', 'asc')
            ->get();

        $weeklyLabels = [];
        $weeklyCounts = [];

        // Generate labels dan data untuk 6 minggu terakhir
        for ($i = 5; $i >= 0; $i--) {
            $date = now()->subWeeks($i);
            $weeklyLabels[] = 'Minggu ' . $date->weekOfYear . ' (' . $date->shortDayName . ')';

            $found = $weeklyData->first(function ($item) use ($date) {
                return $item->year == $date->year && $item->week == $date->week;
            });

            $weeklyCounts[] = $found ? $found->count : 0;
        }

        return [
            'monthly' => [
                'labels' => $monthlyLabels,
                'data' => $monthlyCounts
            ],
            'weekly' => [
                'labels' => $weeklyLabels,
                'data' => $weeklyCounts
            ]
        ];
    }
}
