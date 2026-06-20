<!DOCTYPE html>
<html>
<head>
    <title>Edit Tugas</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            background:#f5f5f5;
            margin:0;
            padding:20px;
        }

        .container{
            max-width:600px;
            margin:40px auto;
            background:white;
            padding:30px;
            border-radius:12px;
            box-shadow:0 0 15px rgba(0,0,0,0.1);
        }

        h1{
            text-align:center;
            color:#333;
            margin-bottom:25px;
        }

        label{
            font-weight:bold;
            display:block;
            margin-bottom:5px;
        }

        input,
        textarea,
        select{
            width:100%;
            padding:10px;
            border:1px solid #ccc;
            border-radius:6px;
            margin-bottom:15px;
            box-sizing:border-box;
        }

        textarea{
            resize:vertical;
        }

        .btn{
            border:none;
            padding:10px 18px;
            border-radius:6px;
            cursor:pointer;
            font-size:14px;
            text-decoration:none;
        }

        .btn-simpan{
            background:#007bff;
            color:white;
        }

        .btn-simpan:hover{
            background:#0056b3;
        }

        .btn-kembali{
            background:#6c757d;
            color:white;
            display:inline-block;
            margin-top:10px;
        }

        .btn-kembali:hover{
            background:#545b62;
        }

        .error{
            background:#f8d7da;
            color:#721c24;
            padding:10px;
            border-radius:5px;
            margin-bottom:15px;
        }
    </style>
</head>
<body>

<div class="container">

    <h1>✏️ Edit Tugas</h1>

    @if($errors->any())
        <div class="error">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Judul Tugas</label>
        <input
            type="text"
            name="title"
            value="{{ old('title', $task->title) }}"
            required
        >

        <label>Deskripsi</label>
        <textarea
            name="description"
            rows="4"
        >{{ old('description', $task->description) }}</textarea>

        <label>Status</label>
        <select name="status">
            <option value="0" {{ $task->status == 0 ? 'selected' : '' }}>
                Belum Selesai
            </option>

            <option value="1" {{ $task->status == 1 ? 'selected' : '' }}>
                Selesai
            </option>
        </select>

        <button type="submit" class="btn btn-simpan">
            💾 Simpan Perubahan
        </button>
    </form>

    <br>

    <a href="{{ route('tasks.index') }}" class="btn btn-kembali">
        ← Kembali ke Daftar Tugas
    </a>

</div>

</body>
</html>