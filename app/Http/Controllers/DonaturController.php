<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donatur;

class DonaturController extends Controller
{
    // Donatur membuka form tambah data
    public function create()
    {
        return view('donatur.create', [
            'formAction' => route('donatur.store'),
            'backRoute' => url('/')
        ]);
    }

    // Donatur menyimpan data melalui form publik
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'kontak' => 'required',
            'email' => 'required|email',
            'tampilkan' => 'required|in:Ya,Tidak',
        ]);

        Donatur::create($data);

        return redirect()->route('donatur.create')
            ->with('success', 'Data donatur berhasil disimpan.');
    }

    // Admin melihat seluruh data donatur
    public function index()
    {
        $donatur = Donatur::all();

        return view('donatur.index', compact('donatur'));
    }

    // Admin membuka form tambah data
    public function createAdmin()
    {
        return view('donatur.create', [
            'formAction' => route('admin.donatur.store'),
            'backRoute' => route('donatur.index')
        ]);
    }

    // Admin menyimpan data donatur
    public function storeAdmin(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'kontak' => 'required',
            'email' => 'required|email',
            'tampilkan' => 'required|in:Ya,Tidak',
        ]);

        Donatur::create($data);

        return redirect()->route('donatur.index')
            ->with('success', 'Data donatur berhasil ditambahkan.');
    }

    // Admin membuka form edit
    public function edit(Donatur $donatur)
    {
        return view('donatur.edit', [
            'donatur' => $donatur,
            'formAction' => route('donatur.update', $donatur->id),
            'backRoute' => route('donatur.index')
        ]);
    }

    // Admin memperbarui data donatur
    public function update(Request $request, Donatur $donatur)
    {
        $data = $request->validate([
            'nama' => 'required',
            'kontak' => 'required',
            'email' => 'required|email',
            'tampilkan' => 'required|in:Ya,Tidak',
        ]);

        $donatur->update($data);

        return redirect()->route('donatur.index')
            ->with('success', 'Data donatur berhasil diperbarui.');
    }

    // Admin menghapus data donatur
    public function destroy(Donatur $donatur)
    {
        $donatur->delete();

        return redirect()->route('donatur.index')
            ->with('success', 'Data donatur berhasil dihapus.');
    }
}