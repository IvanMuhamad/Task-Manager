<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 20px;
        }
        .task-card {
            margin-bottom: 20px;
        }
        .task-card img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Task Management</h1>
            <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
        </div>

        <div class="card task-card">
            <div class="card-body">
                <h2 class="card-title">Buat Tugas Baru</h2>
                <form action="{{ route('tasks.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama Tugas</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi Tugas</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" class="form-control" id="status" name="status">
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Buat Tugas</button>
                </form>
            </div>
        </div>

        <div class="card task-card">
            <div class="card-body">
                <h2 class="card-title">Daftar Tugas</h2>
                @if ($tasks->isEmpty())
                    <p>Belum ada tugas.</p>
                @else
                    <ul class="list-group">
                        @foreach ($tasks as $task)
                            <li class="list-group-item">
                                <h3>{{ $task->nama }}</h3>
                                <p>{{ $task->deskripsi }}</p>
                                <p>{{ $task->status }}</p>
                                @if ($task->image)
                                    <img src="{{ asset('storage/' . $task->image) }}" alt="Gambar Tugas">
                                @endif
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>