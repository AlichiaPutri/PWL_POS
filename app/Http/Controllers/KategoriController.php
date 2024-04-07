<?php

namespace App\Http\Controllers;

use App\Models\KategoriModel;
use Illuminate\Http\Request;
use App\DataTables\KategoriDataTable;
use App\Http\Requests\StorePostRequest;
use Illuminate\Http\RedirectResponse;

class KategoriController extends Controller
// {
//     // public function index()
//     // {
//     // pengerjaan Jobsheet 3 Praktikum 5 bagian 3
//     // $data = [
//     //     'kategori_kode' => 'SNK',
//     //     'kategori_nama' => 'Snack/Makanan Ringan',
//     //     'created_at' => now(),
//     // ];
//     // DB::table('m_kategori')->insert($data);
//     // return 'Insert Data Baru Berhasil';

//     // pengerjaan Jobsheet 3 Praktikum 5 bagian 5
//     // $row=DB::table('m_kategori')->where('kategori_kode','SNK')->update(['kategori_nama'=>'Camilan']);
//     // return 'Update Data Berhasil. Jumlah data yang diupdate: ' . $row. ' baris';

//     // pengerjaan Jobsheet 3 Praktikum 5 bagian 7
//     // $row = DB::table('m_kategori')->where('kategori_kode','SNK')->delete();
//     // return 'Delete Data Berhasil. Jumlah data yang dihapus: ' . $row. ' baris';

//     // pengerjaan Jobsheet 3 Praktikum 5 bagian 8
//     // $data = DB::table('m_kategori')->get();
//     // return view('kategori.kategori', compact('data'));
//     // }

//     public function index(KategoriDataTable $dataTable)
//     {
//         return $dataTable->render('kategori.index');
//     }

//     public function create()
//     {
//         return view('kategori.create');
//     }

//     // public function store(Request $request)
//     // {
//     //     KategoriModel::create([
//     //         'kategori_kode' => $request->kategori_kode,
//     //         'kategori_nama' => $request->kategori_nama,
//     //     ]);
//     //     return redirect('/kategori');
//     // }

//     // JS 6 B bagian 3
//     // public function store(Request $request):RedirectResponse
//     // {
//     //     $validation = $request->validate([
//     //         'kategori_kode' => 'bail|required|unique:m_kategori|max:255',
//     //         'kategori_nama' => 'required',
//     //     ]);

//     //     return redirect('/kategori');
//     // }

//     public function store(StorePostRequest $request): RedirectResponse{
//         $validated = $request->validated();

//         $validated = $request->safe()->only('kategori_kode', 'kategori_nama');
//         $validated = $request->safe()->except('kategori_kode', 'kategori_nama');

//         return redirect('/kategori');
//     }

//     public function edit($id)
//     {
//         $data = KategoriModel::find($id);
//         return view('kategori.edit', ['data' => $data]);
//     }

//     public function update($id, Request $request)
//     {
//         $kategori= KategoriModel::find($id);

//         $kategori->kategori_kode = $request->kategori_kode;
//         $kategori->kategori_nama = $request->kategori_nama;

//         $kategori->save();
//         return redirect('/kategori');
//     }

//     public function delete($id)
//     {
//         $data = KategoriModel::find($id);
//         $data->delete();
//         return redirect('/kategori');
//     }


// }
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Kategori',
            'list' => ['Home', 'Kategori']
        ];

        $page = (object) [
            'title' => 'Daftar Kategori',
        ];

        $activeMenu = 'kategori';

        return view('kategori.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);
    }

    public function list(Request $request)
    {
        $kategoris = KategoriModel::select('kategori_id', 'kategori_kode', 'kategori_nama');
        return datatables()->of($kategoris)
            ->addIndexColumn() // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addColumn('aksi', function ($kategori) { // menambahkan kolom aksi
                $btn = '<a href="' . url('/kategori/' . $kategori->kategori_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/kategori/' . $kategori->kategori_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/kategori/' . $kategori->kategori_id) . '">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object)[
            'title' => 'Tambah Kategori',
            'list' => ['Home', 'Kategori', 'Tambah']
        ];

        $page = (object)[
            'title' => 'Tambah Kategori Baru',
        ];

        $activeMenu = 'kategori';

        return view('kategori.create', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_kode' => 'required|string|unique:m_kategori|min:3',
            'kategori_nama' => 'required|string',
        ]);

        KategoriModel::create([
            'kategori_kode' => $request->kategori_kode,
            'kategori_nama' => $request->kategori_nama
        ]);

        return redirect('/kategori')->with('success', 'Data Kategori baru telah ditambahkan');
    }

    public function show(string $id)
    {
        $kategori = KategoriModel::find($id);

        $breadcrumb = (object)[
            'title' => 'Detail Kategori',
            'list'  => ['Home', 'Kategori', 'Detail']
        ];

        $page = (object)[
            'title' => 'Detail Kategori'
        ];

        $activeMenu = 'kategori';

        return view('kategori.show', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'kategori' => $kategori,
            'activeMenu' => $activeMenu
        ]);
    }

    public function edit(string $id)
    {
        $kategori = KategoriModel::find($id);

        $breadcrumb = (object)[
            'title' => 'Edit Kategori',
            'list'  => ['Home', 'Kategori', 'Edit']
        ];

        $page = (object)[
            'title' => 'Edit Kategori'
        ];
        $activeMenu = 'kategori';

        return view('kategori.edit', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'kategori' => $kategori,
            'activeMenu' => $activeMenu
        ]);
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'kategori_kode' => 'required|min:3|unique:m_kategori,kategori_kode,'.$id.',kategori_id',
            'kategori_nama' => 'required',
        ]);

        KategoriModel::find($id)->update([
            'kategori_kode' => $request->kategori_kode,
            'kategori_nama' => $request->kategori_nama
        ]);

        return redirect('/kategori')->with('success', 'Data Kategori berhasil diubah');
    }

    public function destroy(string $id)
    {
        $check = KategoriModel::find($id);
        if (!$check) {
            return redirect('/kategori')->with('error', 'Data Kategori tidak ditemukan');
        }
        try {
            KategoriModel::destroy($id);
            return redirect('/kategori')->with('success', 'Data Kategori berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/kategori')->with('error', 'Data Kategori gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}