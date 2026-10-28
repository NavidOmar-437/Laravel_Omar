<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Portofolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="card shadow-sm p-4">
        <h2>{{ $portofolio->judul }}</h2>

        @if($portofolio->gambar)
            <img src="{{ asset('storage/' . $portofolio->gambar) }}"
                 alt="{{ $portofolio->judul }}"
                 class="img-fluid rounded my-3"
                 style="max-height:350px; width:auto; object-fit:contain">
        @else
            <div class="alert alert-secondary mt-3">Tidak ada gambar.</div>
        @endif

        <h5>Deskripsi</h5>
        <p>{{ $portofolio->deskripsi }}</p>

        <h5>Teknologi</h5>
        <p><span class="badge bg-primary">{{ $portofolio->teknologi }}</span></p>

        <div class="mt-3">
            <a href="{{ route('portofolio.edit', $portofolio) }}"
               class="btn btn-warning">Edit</a>
            <a href="{{ route('portofolio.index') }}"
               class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
</body>
</html>
