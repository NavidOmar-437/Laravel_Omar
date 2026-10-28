
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Proyek</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="card shadow-sm p-4 mx-auto" style="max-width:700px">
            <h2 class="mb-4">Tambah Proyek Portofolio</h2>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('portofolio.store') }}"
                  method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Judul Proyek</label>
                    <input type="text" name="judul" class="form-control"
                           value="{{ old('judul') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control"
                              rows="4" required>{{ old('deskripsi') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Teknologi</label>
                    <input type="text" name="teknologi" class="form-control"
                           placeholder="Laravel, MySQL, Bootstrap"
                           value="{{ old('teknologi') }}" required>
                </div>

                <div class="mb-4">
                    <label class="form-label">Gambar Proyek (opsional)</label>
                    <input type="file" name="gambar" class="form-control"
                           accept=".jpg,.jpeg,.png,.webp">
                    <small class="text-muted">
                        JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                        Boleh dikosongkan.
                    </small>
                </div>

                <button type="submit" class="btn btn-primary">
                    Simpan Proyek
                </button>
                <a href="{{ route('portofolio.index') }}"
                   class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</body>
</html>
