<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AddschedulingesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
            return view("addschedulinges");
        } else {
            return redirect('/login');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function savePenjadwalan(Request $request)
    {

        $namaPenjadwalan = $request->input('namaPenjadwalan');
        $tanggal = $request->input('tanggal');
        $jenisPadi = $request->input('jenisPadi');
        $luasLahan = $request->input('luasLahan');
        $musim = $request->input('musim');
        $catatan = $request->input('catatan');

        // Insert operation
        $response = Http::post('https://asia-south1.gcp.data.mongodb-api.com/app/application-0-oiyyq/endpoint/insertPenjadwalan?namaPenjadwalan=' . $namaPenjadwalan . '&tanggal=' . $tanggal . '&jenisPadi=' . $jenisPadi . '&luasLahan=' . $luasLahan . '&musim=' . $musim . '&catatan=' . $catatan . '');

        if ($response->failed()) {
            // Handle error
            $errorMessage = $response->body();
            return $errorMessage; // Gantilah 'error' dengan nama view yang sesuai
        } else {
            // Redirect ke halaman login atau halaman lain yang sesuai
            return redirect('/schedules');
            // Gantilah 'login' dengan nama rute yang sesuai
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
