<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CV & Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="/portofolio">CV & Portfolio</a>
            <a href="/portofolio/create" class="btn btn-primary">Tambah Proyek</a>
        </div>
    </nav>

    <main class="container">
        <div class="p-5 mb-4 text-white rounded-4" style="background:linear-gradient(135deg,#172554,#2563eb)">
            <h1>Halo, Saya Web Developer!</h1>
            <p>Selamat datang di CV dan portofolio saya.</p>
        </div>

        <h2>Daftar Portofolio</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row g-3">
            @forelse($portofolios as $item)
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        @if($item->gambar)
                            <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top" style="height:200px;object-fit:cover" alt="{{ $item->judul }}">
                        @else
                            <div class="p-5 bg-secondary-subtle text-center">Tanpa gambar</div>
                        @endif
                        <div class="card-body">
                            <h5>{{ $item->judul }}</h5>
                            <p>{{ $item->deskripsi }}</p>
                            <span class="badge bg-primary">{{ $item->teknologi }}</span>
                        </div>
                        <div class="card-footer bg-white">
                            <a href="{{ route('portofolio.show', $item) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('portofolio.edit', $item) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('portofolio.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus proyek ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info">Belum ada proyek portofolio. Silakan tambah proyek.</div>
                </div>
            @endforelse
        </div>
    </main>
</body>
</html>
