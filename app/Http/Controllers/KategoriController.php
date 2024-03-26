<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DataTables\KategoriDataTable;
use App\Models\KategoriModel;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
class KategoriController extends Controller
{
    public function create(): View
    {
        return view('kategori.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'bail|required|unique:posts|max:255',
            'body' => 'required',
        ]);
        return redirect('/kategori');
    }}