
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Portofolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
<div class="card shadow-sm p-4">
    <h2 class="fw-bold mb-4">Edit Proyek</h2>

    <form action="{{ route('portofolio.update', $portofolio) }}"
          method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Judul Proyek</label>
            <input type="text" name="judul" class="form-control"
                   value="{{ old('judul', $portofolio->judul) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control"
                      rows="4" required>{{ old('deskripsi', $portofolio->deskripsi) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Teknologi</label>
            <input type="text" name="teknologi" class="form-control"
                   value="{{ old('teknologi', $portofolio->teknologi) }}"
                   required>
        </div>

        @if($portofolio->gambar)
            <div class="mb-3">
                <p class="mb-2">Gambar saat ini:</p>
                <img src="{{ asset('storage/' . $portofolio->gambar) }}"
                     alt="Gambar proyek" style="max-width:240px"
                     class="img-thumbnail d-block mb-2">

                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input"
                           name="hapus_gambar" value="1">
                    Hapus gambar tanpa menghapus proyek
                </label>
            </div>
        @endif

        <div class="mb-4">
            <label class="form-label">Ganti gambar (opsional)</label>
            <input type="file" name="gambar" class="form-control"
                   accept="image/jpeg,image/png,image/webp">
            <small class="text-secondary">
                Kosongkan untuk mempertahankan gambar lama,
                atau centang pilihan hapus gambar di atas.
            </small>
        </div>

        <button class="btn btn-primary">Perbarui</button>
        <a href="{{ route('portofolio.index') }}"
           class="btn btn-secondary">Kembali</a>
    </form>
</div>
</div>
</body>
</html>
