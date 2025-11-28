<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Pastikan user sudah login, jika tidak redirect ke login
        if (!Auth::check() || !$request->user()) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu untuk mengakses halaman ini.');
        }
        
        $pemasukan = Transaksi::where('jenis_transaksi','pemasukan')->sum('nominal');
        $pengeluaran = Transaksi::where('jenis_transaksi','pengeluaran')->sum('nominal');
        $saldo = $pemasukan - $pengeluaran;
        
        // Statistik tambahan
        $totalKategori = \App\Models\Kategori::count();
        $totalTransaksi = Transaksi::count();

        // Chart Pie - Pengeluaran per Kategori
        $chart = Transaksi::selectRaw('nama_kategori, SUM(nominal) as total')
            ->join('kategori','kategori.id_kategori','=','transaksi.id_kategori')
            ->where('jenis_transaksi','pengeluaran')
            ->groupBy('kategori.id_kategori','nama_kategori')
            ->get();

        // Chart Bar - Pemasukan vs Pengeluaran per Bulan (6 bulan terakhir)
        $months = [];
        $incomeData = [];
        $expenseData = [];
        
        for ($i = 5; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $monthYear = $date->format('Y-m');
            $monthName = $date->format('M Y');
            
            $months[] = $monthName;
            
            $income = Transaksi::where('jenis_transaksi', 'pemasukan')
                ->whereYear('tgl_transaksi', $date->year)
                ->whereMonth('tgl_transaksi', $date->month)
                ->sum('nominal');
            $incomeData[] = (float) ($income ?? 0);
            
            $expense = Transaksi::where('jenis_transaksi', 'pengeluaran')
                ->whereYear('tgl_transaksi', $date->year)
                ->whereMonth('tgl_transaksi', $date->month)
                ->sum('nominal');
            $expenseData[] = (float) ($expense ?? 0);
        }

        // Transaksi terbaru (5 terakhir)
        $transaksiTerbaru = Transaksi::with('kategori')
            ->orderBy('tgl_transaksi', 'desc')
            ->orderBy('id_transaksi', 'desc')
            ->limit(5)
            ->get();

        // Kategori dengan jumlah transaksi
        $kategoriPopuler = \App\Models\Kategori::withCount('transaksi')
            ->orderBy('transaksi_count', 'desc')
            ->limit(5)
            ->get();

        // Detail Pemasukan per Kategori
        $detailPemasukan = Transaksi::selectRaw('nama_kategori, SUM(nominal) as total')
            ->join('kategori','kategori.id_kategori','=','transaksi.id_kategori')
            ->where('jenis_transaksi','pemasukan')
            ->groupBy('kategori.id_kategori','nama_kategori')
            ->orderBy('total', 'desc')
            ->get();

        // Detail Pengeluaran per Kategori
        $detailPengeluaran = Transaksi::selectRaw('nama_kategori, SUM(nominal) as total')
            ->join('kategori','kategori.id_kategori','=','transaksi.id_kategori')
            ->where('jenis_transaksi','pengeluaran')
            ->groupBy('kategori.id_kategori','nama_kategori')
            ->orderBy('total', 'desc')
            ->get();

        return view('dashboard', compact(
            'pemasukan','pengeluaran','saldo','totalKategori','totalTransaksi',
            'chart','months','incomeData','expenseData','transaksiTerbaru','kategoriPopuler',
            'detailPemasukan','detailPengeluaran'
        ));
    }
}
