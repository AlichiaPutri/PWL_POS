<!DOCTYPE html>

<head>
    <title>Data User</title>
</head>

<body>
    <h1>Data User</h1>
    {{-- <table border="1" cellpadding="2" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Nama</th>
            <th>ID Level Pengguna</th>
        </tr>
        @foreach ($data as $d)
            <tr>
                <td>{{ $d->user_id }}</td>
                <td>{{ $d->username }}</td>
                <td>{{ $d->nama }}</td>
                <td>{{ $d->level_id }}</td>
            </tr>
        @endforeach
    </table> --}}

    {{-- pengerjaan jobsheet 4 praktikum 2.1 bagian 2 --}}
    <a href="{{ route('user.tambah') }}">Tambah User</a>
    <table border="1" cellpadding="2" cellspacing="0">
        <tr>
            <td>ID</td>
            <td>Username</td>
            <td>Nama</td>
            <td>ID Level Pengguna</td>
            {{-- pengerjaan jobsheet 4 praktikum 2.7 bagian 5 --}}
            <td>Kode level</td>
            <td>Nama Level</td>
            {{-- ----------------------------------- --}}
            <td>Aksi</td>
        </tr>
        @foreach ($data as $d)
            <tr>
                <td>{{ $d->user_id }}</td>
                <td>{{ $d->username }}</td>
                <td>{{ $d->nama }}</td>
                <td>{{ $d->level_id }}</td>
                {{-- pengerjaan jobsheet 4 praktikum 2.7 bagian 5 --}}
                <td>{{ $d->level->level_kode }}</td>
                <td>{{ $d->level->level_nama }}</td>
                {{-- ----------------------------------- --}}
                {{-- Jobsheet 4 praktikum 2.6 bagian 2 --}}
                <td><a href="{{ route('user.ubah', $d->user_id) }}">Ubah</a>|<a href="{{ route('user.hapus', $d->user_id) }}">Hapus</a></td>
            </tr>
        @endforeach
    </table>

</body>

</html>