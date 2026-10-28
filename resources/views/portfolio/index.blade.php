
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CV & Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
    <style>
        body { background: #f4f7fb; }
        .hero {
            background: linear-gradient(135deg, #172554, #2563eb);
            color: white;
            padding: 40px;
            border-radius: 18px;
            display: none;
        }
        .cv-hero {
            background: linear-gradient(135deg, #172554, #2563eb);
            color: white;
            border: 0;
            border-radius: 18px;
            box-shadow: 0 .75rem 2rem rgba(23, 37, 84, .2);
            overflow: hidden;
        }
        .cv-hero a:not(.btn) { color: white; }
        .cv-hero .card-body { padding: clamp(1.5rem, 4vw, 3rem); }
        .cv-kicker {
            color: #bfdbfe;
            font-size: .75rem;
            font-weight: 700;
            letter-spacing: .16em;
            text-transform: uppercase;
        }
        .cv-name { font-size: clamp(2rem, 5vw, 3.25rem); letter-spacing: -.04em; }
        .cv-headline { color: #dbeafe; font-size: 1.15rem; }
        .cv-summary { max-width: 60rem; color: #eff6ff; }
        .cv-details { border-top: 1px solid rgba(255,255,255,.25); margin-top: 1.5rem; padding-top: 1.5rem; }
        .cv-details > div { padding: 1rem 1.25rem; border-radius: 12px; background: rgba(255,255,255,.09); }
        .cv-details h3 { color: #bfdbfe; font-size: .8rem; font-weight: 700; letter-spacing: .12em; text-transform: uppercase; }
        .cv-contact li { margin-bottom: .4rem; }
        .cv-skills { display: flex; flex-wrap: wrap; gap: .5rem; margin: 0; padding: 0; list-style: none; }
        .cv-skills li { padding: .35rem .7rem; border: 1px solid rgba(255,255,255,.3); border-radius: 999px; background: rgba(255,255,255,.12); }
        .cv-education { margin-bottom: 0; padding-left: 1.1rem; }
        .cv-education li { padding: 0 0 .5rem .25rem; }
        .project-image {
            height: 200px;
            width: 100%;
            object-fit: cover;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('portofolio.index') }}">
            My Portfolio
        </a>
        <a href="{{ route('portofolio.create') }}"
           class="btn btn-primary">+ Tambah Proyek</a>
    </div>
</nav>

<div class="container pb-5">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <section class="card cv-hero mb-4">
        <div class="card-body">
            <div class="cv-kicker mb-2">Curriculum Vitae · Portofolio</div>
            <div class="d-flex justify-content-between align-items-start gap-3">
                <div>
                    <h1 class="cv-name fw-bold mb-1">{{ $profile?->name ?: 'Profil Saya' }}</h1>
                    <p class="cv-headline mb-2">{{ $profile?->headline ?: 'Tambahkan profil CV Anda' }}</p>
                </div>
                <a href="{{ route('profile.edit') }}" class="btn btn-light btn-sm">{{ $profile ? 'Edit Profil' : 'Lengkapi Profil' }}</a>
            </div>
            @if($profile)
                @if($profile->summary)<p class="cv-summary mb-3">{{ $profile->summary }}</p>@endif
                <div class="row g-3 cv-details">
                    <div class="col-md-5">
                        <h3>Kontak</h3>
                        <ul class="list-unstyled mb-0 cv-contact">
                            @if($profile->email)<li>Email: <a href="mailto:{{ $profile->email }}">{{ $profile->email }}</a></li>@endif
                            @if($profile->phone)<li>Telepon: <a href="tel:{{ $profile->phone }}">{{ $profile->phone }}</a></li>@endif
                            @if($profile->address)<li>Alamat: {{ $profile->address }}</li>@endif
                            @if($profile->linkedin)<li><a href="{{ $profile->linkedin }}" target="_blank" rel="noopener noreferrer">LinkedIn</a></li>@endif
                            @if($profile->github)<li><a href="{{ $profile->github }}" target="_blank" rel="noopener noreferrer">GitHub / Portofolio</a></li>@endif
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h3>Keahlian</h3>
                        @if($profile->skills)
                            <ul class="cv-skills">@foreach(preg_split('/\r\n|\r|\n/', $profile->skills) as $skill) @if(trim($skill))<li>{{ trim($skill) }}</li>@endif @endforeach</ul>
                        @else<p class="text-secondary mb-0">Belum diisi</p>@endif
                    </div>
                    <div class="col-md-4">
                        <h3>Pendidikan</h3>
                        @if($profile->education)
                            <ul class="cv-education">@foreach(preg_split('/\r\n|\r|\n/', $profile->education) as $education) @if(trim($education))<li>{{ trim($education) }}</li>@endif @endforeach</ul>
                        @else<p class="text-secondary mb-0">Belum diisi</p>@endif
                    </div>
                </div>
            @endif
        </div>
    </section>

    <div class="hero mb-4">
        <h1>Omar Ridhwan Navid</h1>
        <p class="mb-0">
            Selamat datang di CV dan portofolio saya.
            Berikut proyek dan karya yang telah saya buat.
        </p>
    </div>

    <h2 class="mb-3">Portofolio Saya</h2>

    <div class="row g-4">
        @forelse($portofolios as $item)
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm h-100">
                    @if($item->gambar)
                        <img
                            src="{{ asset('storage/' . $item->gambar) }}"
                            class="project-image"
                            alt="{{ $item->judul }}">
                    @else
                        <div class="p-5 bg-light text-center">
                            Tidak ada gambar
                        </div>
                    @endif

                    <div class="card-body">
                        <h5>{{ $item->judul }}</h5>
                        <p>{{ $item->deskripsi }}</p>
                        <span class="badge bg-primary">
                            {{ $item->teknologi }}
                        </span>
                    </div>

                    <div class="card-footer bg-white">
                        <a href="{{ route('portofolio.show', $item) }}"
                           class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('portofolio.edit', $item) }}"
                           class="btn btn-warning btn-sm">Edit</a>

                        <form
                            action="{{ route('portofolio.destroy', $item) }}"
                            method="POST" class="d-inline"
                            onsubmit="return confirm('Hapus proyek ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">
                    Belum ada proyek. Klik Tambah Proyek untuk memulai.
                </div>
            </div>
        @endforelse
    </div>
</div>
</body>
</html>
