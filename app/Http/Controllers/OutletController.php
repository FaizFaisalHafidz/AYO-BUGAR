<?php

namespace App\Http\Controllers;

use App\Http\Requests\OutletRequest;
use App\Models\CardMember;
use App\Models\Outlet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $outlets = Outlet::get();
        return view('outlet.index', compact('outlets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('outlet.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OutletRequest $req)
    {
        $validated = $req->validated();
        try {
            $code = "OTL-" . date('Ymdhi') . rand(100, 200);
            $validated['code'] = $code;
            $validated['meta_card_design'] = $code;
            Outlet::create($validated);
            return redirect()->route('outlet.index')->with('success', 'Outlet baru berhasil dibuat');
        } catch (\Throwable $th) {
            Log::error('Failed store outlet', [$th]);
            return redirect()->back()->withInput()->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Outlet $outlet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Outlet $outlet)
    {
        return view('outlet.edit', compact('outlet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OutletRequest $req, Outlet $outlet)
    {
        $validated = $req->validated();
        try {
            $outlet->update($validated);
            return redirect()->route('outlet.index')->with('success', 'Outlet baru berhasil diubah');
        } catch (\Throwable $th) {
            Log::error('Failed update outlet', [$th]);
            return redirect()->back()->withInput()->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Outlet $outlet)
    {
        try {
            $outlet->delete();
            return redirect()->route('outlet.index')->with('success', 'Data outlet telah terhapus');
        } catch (\Throwable $th) {
            Log::error('Failed delete outlet', [$th]);
            return redirect()->back()->withInput()->with('error', $th->getMessage());
        }
    }
    public function generate($outlet_id)
    {
        return view('outlet.generate.index', compact('outlet_id'));
    }
    public function generateStore(Request $req)
    {
        $cards = [];
        for ($i = 1; $i <= $req->count ?? 5; $i++) {
            array_push($cards, [
                'outlet_id' => $req->outlet_id,
                'card_code' => str_pad($i, 3, '0', STR_PAD_LEFT),
                'created_by' => 1,
            ]);
        }
        try {
            CardMember::upsert($cards, [
                'outlet_id',
                'card_code'
            ], [
                'outlet_id',
                'card_code'
            ]);
            return redirect()->back()->withInput()->with('success', 'Data kartu berhasil dibuat')->with('isGenerated', true);
        } catch (\Throwable $th) {
            Log::error('Failed generate sotre card', [$th]);
            return redirect()->back()->withInput()->with('error', $th->getMessage());
        }
    }
}
