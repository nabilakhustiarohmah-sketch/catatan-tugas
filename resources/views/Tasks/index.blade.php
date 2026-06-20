<!DOCTYPE html>
<html>
<head>
    <title>Catatan Tugas</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            background:#f5f5f5;
            margin:0;
            padding:20px;
        }

        .container{
            max-width:900px;
            margin:auto;
            background:white;
            padding:20px;
            border-radius:10px;
            box-shadow:0 0 10px rgba(0,0,0,0.1);
        }

        h1{
            text-align:center;
            color:#333;
        }

        input, textarea{
            width:100%;
            padding:10px;
            margin-top:5px;
            margin-bottom:10px;
            border:1px solid #ccc;
            border-radius:5px;
            box-sizing:border-box;
        }

        button{
            background:#007bff;
            color:white;
            border:none;
            padding:8px 12px;
            border-radius:5px;
            cursor:pointer;
        }

        button:hover{
            background:#0056b3;
        }

        table{
            width:100%;
            border-collapse:collapse;
            margin-top:20px;
        }

        th, td{
            border:1px solid #ddd;
            padding:10px;
            text-align:left;
        }

        th{
            background:#007bff;
            color:white;
        }

        .selesai{
            color:green;
            font-weight:bold;
        }

        .belum{
            color:red;
            font-weight:bold;
        }

        .hapus{
            background:red;
        }

        .hapus:hover{
            background:darkred;
        }

        .edit{
            background:orange;
        }

        .edit:hover{
            background:darkorange;
        }

        .success{
            background:#d4edda;
            color:#155724;
            padding:10px;
            margin-bottom:15px;
            border-radius:5px;
        }
    </style>
</head>
<body>

<div class="container">

    <h1>📋 Catatan Tugas</h1>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <h3>Tambah Tugas</h3>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        <label>Judul Tugas</label>
        <input type="text" name="title" required>

        <label>Deskripsi</label>
        <textarea name="description" rows="3"></textarea>

        <button type="submit">Tambah Tugas</button>
    </form>

    <h3>Daftar Tugas</h3>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

        @forelse($tasks as $task)

            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $task->title }}</td>
                <td>{{ $task->description }}</td>

                <td>
                    @if($task->status)
                        <span class="selesai">Selesai</span>
                    @else
                        <span class="belum">Belum Selesai</span>
                    @endif
                </td>

                <td>

                    <a href="{{ route('tasks.edit', $task->id) }}">
                        <button type="button" class="edit">
                            Edit
                        </button>
                    </a>

                    <form action="{{ route('tasks.update', $task->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="title" value="{{ $task->title }}">
                        <input type="hidden" name="description" value="{{ $task->description }}">
                        <input type="hidden" name="status" value="{{ !$task->status }}">

                        <button type="submit">
                            {{ $task->status ? 'Batalkan' : 'Selesai' }}
                        </button>
                    </form>

                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')

                        <button class="hapus" onclick="return confirm('Yakin ingin menghapus tugas ini?')">
                            Hapus
                        </button>
                    </form>

                </td>
            </tr>

        @empty

            <tr>
                <td colspan="5" style="text-align:center;">
                    Belum ada tugas.
                </td>
            </tr>

        @endforelse

        </tbody>
    </table>

</div>

</body>
</html>