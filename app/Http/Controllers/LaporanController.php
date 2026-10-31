<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function create()
    {
        return view('laporan.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_pelapor' => ['required', 'string', 'max:100'],
            'no_hp'        => ['required', 'string', 'max:20'],
            'lokasi'       => ['required', 'string', 'max:255'],
            'tinggi_air'   => ['required', 'integer', 'min:1', 'max:500'],
            'deskripsi'    => ['required', 'string'],
        ]);

        Laporan::create($data);

        return redirect()->route('laporan.create')
            ->with('success', 'Laporan berhasil dikirim. Terima kasih, petugas BPBD akan segera menindaklanjuti.');
    }

    public function index()
    {
        $laporans = Laporan::latest()->paginate(10);
        return view('laporan.index', compact('laporans'));
    }

    public function updateStatus(Request $request, Laporan $laporan)
    {
        $request->validate([
            'status' => ['required', 'in:baru,diproses,selesai'],
        ]);

        $laporan->update(['status' => $request->status]);

        return back()->with('success', 'Status laporan diperbarui.');
    }

    public function destroy(Laporan $laporan)
    {
        $laporan->delete();
        return back()->with('success', 'Laporan dihapus.');
    }
}