<?php

namespace App\Http\Controllers;

// use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use App\Models\LevelModel;
use Yajra\DataTables\Facades\DataTables;

class LevelController extends Controller
// {
//     public function index()
//     {
//         // pengerjaan Jobsheet 3 Praktikum 4 bagian 3
//         // DB::insert("INSERT INTO m_level(level_kode,level_nama,created_at) VALUES(?,?,?)", ['CUS', 'Pelanggan', now()]);
//         // return 'Insert Data Berhasil';

//         // pengerjaan Jobsheet 3 Praktikum 4 bagian 5
//         // $row = DB::update('update m_level set level_nama = ? where level_kode = ?', ['Customer', 'CUS']);
//         // return 'Update Data Berhasil. Jumlah data yang diupdate: ' . $row. ' baris';

//         // pengerjaan Jobsheet 3 Praktikum 4 bagian 7
//         // $row = DB::delete('delete from m_level where level_kode = ?', ['CUS']);
//         // return 'Delete Data Berhasil. Jumlah data yang dihapus: ' . $row. ' baris';

//         // pengerjaan Jobsheet 3 Praktikum 4 bagian 8
//         $data = DB::select('select * from m_level');
//         return view('level.level', ['data' => $data]);
//     }

//     public function create()
//     {
//         return view('level.level_tambah');
//     }

//     public function store(StorePostRequest $request):RedirectResponse
//     {
//         $validated = $request->validated();
//         $validated = $request->safe()->only('level_kode', 'level_nama');
//         $validated = $request->safe()->except('level_kode', 'level_nama');

//         return redirect('/level');
//     }

//     public function edit($id)
//     {
//         return 0;
//     }

//     public function update(Request $request, $id)
//     {
//         return 0;
//     }

//     public function delete($id)
//     {
//         return 0;
//     }
// }
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Level',
            'list' => ['Home', 'Level']
        ];

        $page = (object) [
            'title' => 'Daftar Level',
        ];

        $activeMenu = 'level';

        return view('level.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);
    }

    public function list(Request $request)
    {
        $levels = LevelModel::select('level_id', 'level_kode', 'level_nama');

        return DataTables::of($levels)
            ->addIndexColumn() // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addColumn('aksi', function ($level) { // menambahkan kolom aksi
                $btn = '<a href="' . url('/level/' . $level->level_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/level/' . $level->level_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/level/' . $level->level_id) . '">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Level',
            'list' => ['Home', 'Level', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah Level Baru',
        ];

        $activeMenu = 'level';

        return view('level.create', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'level_kode' => 'required|unique:m_level',
            'level_nama' => 'required'
        ]);

        LevelModel::create([
            'level_kode' => $request->level_kode,
            'level_nama' => $request->level_nama
        ]);

        return redirect('/level')->with('success', 'Data Level baru berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $breadcrumb = (object) [
            'title' => 'Level',
            'list' => ['Home', 'Level', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Level',
        ];

        $activeMenu = 'level';

        $level = LevelModel::find($id);

        return view('level.show', [
            'level' => $level,
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);
    }

    public function edit(string $id)
    {
        $breadcrumb = (object) [
            'title' => 'Level',
            'list' => ['Home', 'Level', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit Level',
        ];

        $activeMenu = 'level';

        $level = LevelModel::find($id);
        return view('level.edit', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'level' => $level
        ]);
    }

    public function update(Request $request,string $id)
    {
        $validated = $request->validate([
            'level_kode' => 'required|string|min:3|unique:m_level,level_kode,'.$id.',level_id',
            'level_nama' => 'required|string|min:3'
        ]);

        LevelModel::find($id)->update([
            'level_kode' => $request->level_kode,
            'level_nama' => $request->level_nama
        ]);
        return redirect('/level')->with('success', 'Data Level berhasil diubah');
    }

    public function destroy(string $id)
    {
        $check = LevelModel::find($id);
        if (!$check) {
            return redirect('/level')->with('error', 'Data Level tidak ditemukan');
        }
        try {
            LevelModel::destroy($id);
            return redirect('/level')->with('success', 'Data Level berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/level')->with('error', 'Data Level gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}