<?php

namespace App\Http\Controllers;

use App\Http\Requests\OutletRequest;
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
        return view('outlet.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Outlet $outlet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Outlet $outlet)
    {
        //
    }
}
