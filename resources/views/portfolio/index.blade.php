<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#080d1c">
    <title>{{ $profile?->name ?: 'Portofolio' }} — Portofolio Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
    <style>
        :root { color-scheme: dark; --page:#080d1c; --panel:#10182a; --panel-soft:#141f35; --line:rgba(167,190,255,.13); --text:#edf3ff; --muted:#9aa9c4; --accent:#80aaff; --mint:#85f2d1; }
        * { box-sizing:border-box; }
        html { scroll-behavior:smooth; scroll-padding-top:90px; }
        body { margin:0; background:var(--page); color:var(--text); font-family:'DM Sans',sans-serif; transition:background .25s,color .25s; }
        body.light-theme { color-scheme:light; --page:#f4f7ff; --panel:#fff; --panel-soft:#edf2ff; --line:rgba(31,57,108,.12); --text:#111a2e; --muted:#68748c; --accent:#315fd2; --mint:#008e77; }
        a { color:inherit; }
        .site-nav { position:sticky; top:0; z-index:20; border-bottom:1px solid var(--line); background:color-mix(in srgb,var(--page) 82%,transparent); backdrop-filter:blur(18px); }
        .nav-inner { min-height:74px; }
        .brand-mark { display:inline-grid; width:38px; height:38px; place-items:center; border:1px solid rgba(128,170,255,.3); border-radius:13px; background:linear-gradient(145deg,rgba(95,133,255,.28),rgba(103,239,211,.12)); color:var(--mint); font-family:'Space Grotesk',sans-serif; font-weight:700; }
        .brand-name { font-family:'Space Grotesk',sans-serif; font-size:1.06rem; font-weight:700; letter-spacing:-.04em; }
        .nav-link-custom { color:var(--muted); text-decoration:none; font-size:.92rem; transition:color .2s; }
        .nav-link-custom:hover { color:var(--text); }
        .icon-button { width:42px; height:42px; display:inline-grid; place-items:center; border:1px solid var(--line); border-radius:14px; background:var(--panel); color:var(--text); }
        .btn-glow { border:0; border-radius:13px; background:linear-gradient(115deg,#5e7df4,#8d70ef); color:#fff; box-shadow:0 8px 26px rgba(94,125,244,.22); font-weight:700; }
        .btn-glow:hover { color:#fff; filter:brightness(1.08); transform:translateY(-1px); }
        .page-wrap { width:min(1180px,calc(100% - 36px)); margin:auto; }
        .hero { position:relative; isolation:isolate; overflow:hidden; margin-top:34px; padding:clamp(28px,6vw,68px); border:1px solid var(--line); border-radius:32px; background:radial-gradient(ellipse at 84% 8%,rgba(79,107,255,.25),transparent 33%),radial-gradient(ellipse at 5% 95%,rgba(80,224,197,.12),transparent 37%),linear-gradient(145deg,var(--panel),color-mix(in srgb,var(--panel-soft) 73%,var(--panel))); box-shadow:0 26px 90px rgba(0,0,0,.18); }
        .hero:after { content:''; position:absolute; z-index:-1; width:340px; height:340px; right:-120px; bottom:-180px; border:1px solid rgba(133,242,209,.17); border-radius:50%; box-shadow:0 0 0 28px rgba(133,242,209,.025),0 0 0 58px rgba(133,242,209,.02); }
        .eyebrow { display:inline-flex; align-items:center; gap:9px; padding:8px 12px; border:1px solid var(--line); border-radius:99px; background:rgba(128,170,255,.08); color:var(--mint); font-size:.75rem; font-weight:700; letter-spacing:.11em; text-transform:uppercase; }
        .pulse { width:7px; height:7px; border-radius:50%; background:var(--mint); box-shadow:0 0 14px var(--mint); }
        .hero-title { max-width:800px; margin:22px 0 12px; font-family:'Space Grotesk',sans-serif; font-size:clamp(2.5rem,7vw,5rem); font-weight:700; letter-spacing:-.075em; line-height:.98; }
        .gradient-text { background:linear-gradient(95deg,#9dbbff,#9b8bff 55%,#8ff1d0); background-clip:text; color:transparent; }
        .hero-copy { max-width:620px; color:var(--muted); font-size:1.08rem; line-height:1.8; }
        .profile-row { display:flex; align-items:center; gap:22px; }
        .avatar-wrap { position:relative; flex:0 0 auto; width:116px; height:116px; padding:4px; border:1px solid rgba(133,242,209,.42); border-radius:50%; background:linear-gradient(145deg,#718eff,#5ce1c1); box-shadow:0 0 36px rgba(112,146,255,.2); }
        .avatar { width:100%; height:100%; border-radius:50%; object-fit:cover; background:var(--panel-soft); }
        .avatar-placeholder { display:grid; place-items:center; color:var(--mint); font-family:'Space Grotesk',sans-serif; font-size:2rem; font-weight:700; }
        .avatar-status { position:absolute; right:4px; bottom:5px; width:17px; height:17px; border:3px solid var(--panel); border-radius:50%; background:#55e5b4; }
        .profile-name { margin:0 0 4px; font-family:'Space Grotesk',sans-serif; font-size:clamp(1.55rem,3vw,2.3rem); letter-spacing:-.05em; }
        .profile-headline { margin:0; color:var(--muted); }
        .profile-actions { display:flex; flex-wrap:wrap; gap:10px; margin-top:20px; }
        .btn-soft { border:1px solid var(--line); border-radius:12px; background:var(--panel-soft); color:var(--text); font-weight:600; }
        .btn-soft:hover { border-color:rgba(128,170,255,.45); color:var(--text); }
        .stats-row { display:grid; grid-template-columns:repeat(3,minmax(0,1fr)); gap:12px; margin-top:38px; }
        .stat { padding:17px 19px; border:1px solid var(--line); border-radius:17px; background:rgba(8,13,28,.15); }
        .stat-value { display:block; font-family:'Space Grotesk',sans-serif; font-size:1.5rem; font-weight:700; }
        .stat-label { color:var(--muted); font-size:.82rem; }
        .section-heading { display:flex; align-items:end; justify-content:space-between; gap:18px; margin:64px 0 22px; }
        .section-kicker { color:var(--mint); font-size:.75rem; font-weight:700; letter-spacing:.13em; text-transform:uppercase; }
        .section-title { margin:6px 0 0; font-family:'Space Grotesk',sans-serif; font-size:clamp(1.8rem,4vw,2.6rem); font-weight:700; letter-spacing:-.06em; }
        .section-copy { margin:5px 0 0; color:var(--muted); }
        .tools-bar { display:flex; flex-wrap:wrap; gap:12px; margin-bottom:22px; }
        .search-wrap { position:relative; flex:1 1 300px; }
        .search-wrap span { position:absolute; top:50%; left:15px; transform:translateY(-50%); color:var(--muted); }
        .control { min-height:48px; border:1px solid var(--line); border-radius:14px; background:var(--panel); color:var(--text); }
        .control:focus { border-color:rgba(128,170,255,.65); background:var(--panel); color:var(--text); box-shadow:0 0 0 3px rgba(128,170,255,.1); }
        .search-input { padding-left:43px; }
        #technologyFilter { border-color:rgba(57,255,136,.35); color:#39ff88; }
        #technologyFilter:focus { border-color:#39ff88; color:#39ff88; box-shadow:0 0 0 3px rgba(57,255,136,.12); }
        #technologyFilter option { background:#10182a; color:#39ff88; }
        #technologyFilter option:checked { background:#1d2a40; color:#39ff88; }
        #projectSort { border-color:rgba(57,255,136,.35); color:#39ff88; }
        #projectSort:focus { border-color:#39ff88; color:#39ff88; box-shadow:0 0 0 3px rgba(57,255,136,.12); }
        #projectSort option { background:#10182a; color:#39ff88; }
        #projectSort option:checked { background:#1d2a40; color:#39ff88; }
        .project-grid { display:grid; grid-template-columns:repeat(3,minmax(0,1fr)); gap:19px; }
        .project-card { overflow:hidden; border:1px solid var(--line); border-radius:21px; background:var(--panel); transition:transform .22s,border-color .22s,box-shadow .22s; }
        .project-card:hover { transform:translateY(-5px); border-color:rgba(128,170,255,.35); box-shadow:0 20px 42px rgba(0,0,0,.16); }
        .project-visual { position:relative; display:grid; height:205px; place-items:center; overflow:hidden; background:radial-gradient(circle at 70% 30%,rgba(105,134,255,.3),transparent 32%),linear-gradient(145deg,#17233d,#0d1426); }
        .project-visual img { width:100%; height:100%; object-fit:cover; transition:transform .4s; }
        .project-card:hover .project-visual img { transform:scale(1.04); }
        .project-fallback { color:#91aaff; font-size:2.4rem; }
        .project-body { padding:20px; }
        .project-title { font-family:'Space Grotesk',sans-serif; font-size:1.2rem; font-weight:700; letter-spacing:-.03em; }
        .project-description { min-height:52px; margin:9px 0 15px; color:var(--muted); font-size:.92rem; line-height:1.65; }
        .tech-tags { display:flex; flex-wrap:wrap; gap:7px; }
        .tech-tag { padding:6px 10px; border:1px solid var(--line); border-radius:99px; background:var(--panel-soft); color:var(--accent); font-size:.75rem; font-weight:600; }
        .project-footer { display:flex; justify-content:space-between; align-items:center; gap:8px; padding:14px 20px; border-top:1px solid var(--line); }
        .project-link { color:var(--text); font-size:.88rem; font-weight:700; text-decoration:none; }
        .project-link:hover { color:var(--accent); }
        .project-actions { display:flex; gap:6px; }
        .action-link { padding:6px 9px; border:1px solid var(--line); border-radius:9px; color:var(--muted); font-size:.77rem; text-decoration:none; }
        .action-link:hover { border-color:var(--accent); color:var(--accent); }
        .empty-state { grid-column:1/-1; padding:52px 24px; border:1px dashed var(--line); border-radius:22px; background:var(--panel); text-align:center; }
        .empty-icon { font-size:2.3rem; }
        .skill-section { display:grid; grid-template-columns:1.1fr .9fr; gap:18px; margin:64px 0; }
        .info-card { padding:25px; border:1px solid var(--line); border-radius:22px; background:var(--panel); }
        .info-title { margin:0 0 17px; font-family:'Space Grotesk',sans-serif; font-size:1.2rem; font-weight:700; }
        .skill-list { display:flex; flex-wrap:wrap; gap:9px; }
        .skill-pill { padding:8px 12px; border:1px solid var(--line); border-radius:99px; background:var(--panel-soft); font-size:.85rem; }
        .education-list { margin:0; padding-left:20px; color:var(--muted); }
        .education-list li { padding:0 0 10px 5px; }
        .contact-banner { display:flex; align-items:center; justify-content:space-between; gap:20px; margin-bottom:62px; padding:26px 30px; border:1px solid rgba(133,242,209,.18); border-radius:23px; background:linear-gradient(110deg,rgba(82,116,239,.13),rgba(83,231,197,.08)); }
        .contact-banner h2 { margin:0 0 5px; font-family:'Space Grotesk',sans-serif; font-size:1.35rem; font-weight:700; }
        .contact-banner p { margin:0; color:var(--muted); }
        .site-footer { padding:20px 0 32px; border-top:1px solid var(--line); color:var(--muted); font-size:.85rem; }
        .toast-note { position:fixed; right:20px; bottom:20px; z-index:30; padding:12px 17px; border:1px solid var(--line); border-radius:13px; background:var(--panel); box-shadow:0 10px 30px rgba(0,0,0,.2); opacity:0; pointer-events:none; transform:translateY(12px); transition:.2s; }
        .toast-note.show { opacity:1; transform:translateY(0); }
        .no-results { display:none; }
        @media(max-width:900px) { .project-grid { grid-template-columns:repeat(2,minmax(0,1fr)); } }
        @media(max-width:640px) { .page-wrap { width:min(100% - 24px,1180px); } .hero { margin-top:18px; border-radius:24px; } .profile-row { align-items:flex-start; } .avatar-wrap { width:84px; height:84px; } .stats-row { gap:8px; } .stat { padding:12px; } .stat-value { font-size:1.2rem; } .stat-label { font-size:.7rem; } .section-heading { align-items:flex-start; flex-direction:column; margin-top:48px; } .project-grid,.skill-section { grid-template-columns:1fr; } .contact-banner { align-items:flex-start; flex-direction:column; } .nav-link-custom { display:none; } }
        @media print { .site-nav,.profile-actions,.tools-bar,.project-actions,.contact-banner,.site-footer { display:none!important; } body { background:#fff; color:#111; } .hero,.project-card,.info-card { break-inside:avoid; box-shadow:none; } }
    </style>
</head>
<body>
<nav class="site-nav">
    <div class="page-wrap nav-inner d-flex align-items-center justify-content-between">
        <a href="{{ route('portofolio.index') }}" class="d-flex align-items-center gap-2 text-decoration-none">
            <span class="brand-mark">ON</span><span class="brand-name">omar<span class="gradient-text">.portfolio</span></span>
        </a>
        <div class="d-flex align-items-center gap-4">
            <a class="nav-link-custom" href="#profil">Profil</a>
            <a class="nav-link-custom" href="#karya">Karya</a>
            <a class="nav-link-custom" href="#keahlian">Keahlian</a>
            <button class="icon-button" id="themeToggle" type="button" aria-label="Ganti tema" title="Ganti tema">☼</button>
            <a href="{{ route('portofolio.create') }}" class="btn btn-glow px-3 py-2">＋ <span class="d-none d-sm-inline">Tambah proyek</span></a>
        </div>
    </div>
</nav>

<main class="page-wrap">
    @if(session('success'))
        <div class="alert alert-success mt-3 mb-0">{{ session('success') }}</div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger mt-3 mb-0">Ada data yang perlu diperiksa. Silakan coba lagi.</div>
    @endif

    <section class="hero" id="profil">
        <div class="row align-items-center g-4">
            <div class="col-lg-8">
                <span class="eyebrow"><span class="pulse"></span> Portfolio digital </span>
                <h1 class="hero-title">Membangun ide<br><span class="gradient-text">menjadi nyata.</span></h1>
                <p class="hero-copy">Ruang digital untuk cerita, eksperimen, dan karya yang saya bangun dengan rasa ingin tahu dan teknologi.</p>
                <div class="profile-actions">
                    <a href="#karya" class="btn btn-glow px-4 py-2">Jelajahi karya <span aria-hidden="true">↘</span></a>
                    @if($profile?->email)
                        <button type="button" class="btn btn-soft px-4 py-2" id="copyEmail" data-email="{{ $profile->email }}">Salin email</button>
                    @endif
                    <button type="button" class="btn btn-soft px-4 py-2" onclick="window.print()">Simpan CV / PDF</button>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="profile-row">
                    <div class="avatar-wrap">
                        @if($profile?->photo_path)
                            <img class="avatar" src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($profile->photo_path) }}" alt="Foto profil {{ $profile->name }}">
                        @else
                            <div class="avatar avatar-placeholder" aria-label="Foto profil belum ditambahkan">ON</div>
                        @endif
                        <span class="avatar-status" title="Profil aktif"></span>
                    </div>
                    <div>
                        <h2 class="profile-name">{{ $profile?->name ?: 'Omar Ridhwan Navid' }}</h2>
                        <p class="profile-headline">{{ $profile?->headline ?: 'Mahasiswa · Web enthusiast' }}</p>
                        <div class="mt-2 small text-secondary">{{ $profile?->address ?: 'Indonesia' }}</div>
                    </div>
                </div>
                <div class="profile-actions">
                    <a href="{{ route('profile.edit') }}" class="btn btn-soft btn-sm px-3">{{ $profile ? 'Kelola profil & foto' : 'Lengkapi profil' }}</a>
                </div>
            </div>
        </div>
        <div class="stats-row">
            <div class="stat"><span class="stat-value">{{ $portofolios->count() }}<span class="gradient-text">+</span></span><span class="stat-label">Proyek dipublikasikan</span></div>
            <div class="stat"><span class="stat-value">{{ $technologies->count() }}<span class="gradient-text">+</span></span><span class="stat-label">Teknologi digunakan</span></div>
            <div class="stat"><span class="stat-value">{{ $profile?->skills ? collect(preg_split('/\r\n|\r|\n/', $profile->skills))->filter(fn ($skill) => trim($skill) !== '')->count() : 0 }}<span class="gradient-text">+</span></span><span class="stat-label">Keahlian yang terus diasah</span></div>
        </div>
    </section>

    <section id="karya">
        <div class="section-heading">
            <div><span class="section-kicker">Pilihan terbaru</span><h2 class="section-title">Karya & eksperimen</h2><p class="section-copy">Proyek pilihan yang lahir dari ide dan proses belajar.</p></div>
            <span class="text-secondary small"><span id="visibleCount">{{ $portofolios->count() }}</span> dari {{ $portofolios->count() }} proyek</span>
        </div>

        <div class="tools-bar">
            <div class="search-wrap"><span aria-hidden="true">⌕</span><input id="projectSearch" class="form-control control search-input" type="search" placeholder="Cari proyek, deskripsi, atau teknologi…" aria-label="Cari proyek"></div>
            <select id="technologyFilter" class="form-select control" aria-label="Filter teknologi" style="max-width:220px"><option value="">Semua teknologi</option>@foreach($technologies as $technology)<option value="{{ mb_strtolower($technology) }}">{{ $technology }}</option>@endforeach</select>
            <select id="projectSort" class="form-select control" aria-label="Urutkan proyek" style="max-width:190px"><option value="default">Urutan awal</option><option value="title">Nama A–Z</option><option value="title-desc">Nama Z–A</option></select>
        </div>

        <div class="project-grid" id="projectGrid">
            @forelse($portofolios as $item)
                @php($itemTechnologies = collect(explode(',', $item->teknologi))->map(fn ($technology) => trim($technology))->filter())
                <article class="project-card" data-title="{{ mb_strtolower($item->judul) }}" data-description="{{ mb_strtolower($item->deskripsi) }}" data-technologies="{{ mb_strtolower($itemTechnologies->implode('|')) }}" data-created="{{ $item->created_at?->timestamp ?? 0 }}">
                    <a class="project-visual text-decoration-none" href="{{ route('portofolio.show', $item) }}" aria-label="Lihat {{ $item->judul }}">
                        @if($item->gambar)
                            <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($item->gambar) }}" alt="Pratinjau {{ $item->judul }}" loading="lazy">
                        @else
                            <span class="project-fallback" aria-hidden="true">✳</span>
                        @endif
                    </a>
                    <div class="project-body">
                        <h3 class="project-title mb-0">{{ $item->judul }}</h3>
                        <p class="project-description">{{ \Illuminate\Support\Str::limit($item->deskripsi, 115) }}</p>
                        <div class="tech-tags">@foreach($itemTechnologies as $technology)<span class="tech-tag">{{ $technology }}</span>@endforeach</div>
                    </div>
                    <div class="project-footer">
                        <a href="{{ route('portofolio.show', $item) }}" class="project-link">Lihat detail <span aria-hidden="true">↗</span></a>
                        <div class="project-actions">@if($item->link)<a class="action-link" href="{{ $item->link }}" target="_blank" rel="noopener noreferrer">Demo &#8599;</a>@endif<a class="action-link" href="{{ route('portofolio.edit', $item) }}">Edit</a><form action="{{ route('portofolio.destroy', $item) }}" method="POST" onsubmit="return confirm('Hapus proyek ini?')">@csrf @method('DELETE')<button class="action-link bg-transparent" type="submit">Hapus</button></form></div>
                    </div>
                </article>
            @empty
                <div class="empty-state"><div class="empty-icon">✧</div><h3 class="h5 mt-3">Ruang untuk karya pertama</h3><p class="text-secondary">Tambahkan proyek pertamamu dan mulai bangun cerita portofolio.</p><a class="btn btn-glow px-4" href="{{ route('portofolio.create') }}">Tambah proyek pertama</a></div>
            @endforelse
            <div class="empty-state no-results" id="noResults"><div class="empty-icon">⌕</div><h3 class="h5 mt-3">Belum ada yang cocok</h3><p class="text-secondary">Coba kata kunci atau teknologi yang berbeda.</p><button type="button" class="btn btn-soft" id="clearFilters">Hapus filter</button></div>
        </div>
    </section>

    <section class="skill-section" id="keahlian">
        <div class="info-card"><span class="section-kicker">Toolkit</span><h2 class="info-title mt-2">Keahlian yang saya kembangkan</h2>
            @if($profile?->skills)
                <div class="skill-list">@foreach(preg_split('/\r\n|\r|\n/', $profile->skills) as $skill) @if(trim($skill) !== '')<span class="skill-pill">{{ trim($skill) }}</span>@endif @endforeach</div>
            @else
                <p class="text-secondary mb-0">Keahlian akan muncul di sini setelah profil dilengkapi.</p>
            @endif
        </div>
        <div class="info-card"><span class="section-kicker">Perjalanan belajar</span><h2 class="info-title mt-2">Pendidikan</h2>
            @if($profile?->education)
                <ul class="education-list">@foreach(preg_split('/\r\n|\r|\n/', $profile->education) as $education) @if(trim($education) !== '')<li>{{ trim($education) }}</li>@endif @endforeach</ul>
            @else
                <p class="text-secondary mb-0">Informasi pendidikan akan tampil di sini.</p>
            @endif
        </div>
    </section>

    <section class="contact-banner" id="kontak">
        <div><h2>Ada ide menarik? Mari terhubung.</h2><p>Selalu terbuka untuk belajar, berkolaborasi, dan mencoba hal baru.</p></div>
        @if($profile?->github)<a href="{{ $profile->github }}" class="btn btn-glow px-4 py-2" target="_blank" rel="noopener noreferrer">Hubungi saya &#8599;</a>@else<a href="{{ route('profile.edit') }}" class="btn btn-glow px-4 py-2">Atur link GitHub</a>@endif
    </section>
</main>
<footer class="site-footer"><div class="page-wrap d-flex justify-content-between flex-wrap gap-2"><span>© {{ now()->year }} {{ $profile?->name ?: 'Portofolio' }}</span><span>Dibuat dengan rasa ingin tahu dan sedikit ✨</span></div></footer>
<div class="toast-note" id="toastNote" role="status" aria-live="polite"></div>

<script>
    const body = document.body;
    const themeToggle = document.getElementById('themeToggle');
    const savedTheme = localStorage.getItem('portfolio-theme');

    if (savedTheme === 'light') {
        body.classList.add('light-theme');
    }

    themeToggle.textContent = body.classList.contains('light-theme') ? '☾' : '☼';
    themeToggle.addEventListener('click', () => {
        body.classList.toggle('light-theme');
        const isLight = body.classList.contains('light-theme');
        localStorage.setItem('portfolio-theme', isLight ? 'light' : 'dark');
        themeToggle.textContent = isLight ? '☾' : '☼';
    });

    const searchInput = document.getElementById('projectSearch');
    const technologyFilter = document.getElementById('technologyFilter');
    const projectSort = document.getElementById('projectSort');
    const projectGrid = document.getElementById('projectGrid');
    const noResults = document.getElementById('noResults');
    const cards = [...projectGrid.querySelectorAll('.project-card')];
    const visibleCount = document.getElementById('visibleCount');

    function updateProjects() {
        const query = searchInput.value.trim().toLocaleLowerCase('id');
        const selectedTechnology = technologyFilter.value;
        let visibleCards = 0;

        cards.forEach((card) => {
            const matchesQuery = `${card.dataset.title} ${card.dataset.description} ${card.dataset.technologies}`.includes(query);
            const matchesTechnology = !selectedTechnology || card.dataset.technologies.split('|').includes(selectedTechnology);
            const isVisible = matchesQuery && matchesTechnology;
            card.hidden = !isVisible;
            visibleCards += isVisible ? 1 : 0;
        });

        const sortMode = projectSort.value;
        const sortedCards = [...cards].sort((first, second) => {
            if (sortMode === 'title') return first.dataset.title.localeCompare(second.dataset.title, 'id');
            if (sortMode === 'title-desc') return second.dataset.title.localeCompare(first.dataset.title, 'id');
            return Number(second.dataset.created) - Number(first.dataset.created);
        });
        sortedCards.forEach((card) => projectGrid.insertBefore(card, noResults));
        noResults.style.display = visibleCards === 0 && cards.length > 0 ? 'block' : 'none';
        visibleCount.textContent = visibleCards;
    }

    searchInput.addEventListener('input', updateProjects);
    technologyFilter.addEventListener('change', updateProjects);
    projectSort.addEventListener('change', updateProjects);
    document.getElementById('clearFilters').addEventListener('click', () => {
        searchInput.value = '';
        technologyFilter.value = '';
        projectSort.value = 'default';
        updateProjects();
    });

    const copyEmail = document.getElementById('copyEmail');
    const toastNote = document.getElementById('toastNote');
    let toastTimer;

    function showToast(message) {
        toastNote.textContent = message;
        toastNote.classList.add('show');
        window.clearTimeout(toastTimer);
        toastTimer = window.setTimeout(() => toastNote.classList.remove('show'), 2400);
    }

    copyEmail?.addEventListener('click', async () => {
        try {
            await navigator.clipboard.writeText(copyEmail.dataset.email);
            showToast('Email berhasil disalin.');
        } catch {
            window.location.href = `mailto:${copyEmail.dataset.email}`;
        }
    });
</script>
</body>
</html>
