<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#080d1c">
    <title>@yield('title', 'Portofolio') — {{ $profile?->name ?: 'Omar Ridhwan Navid' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
    <style>
        :root { --page:#080d1c; --panel:#10182a; --panel-soft:#141f35; --line:rgba(167,190,255,.13); --text:#edf3ff; --muted:#9aa9c4; --accent:#80aaff; --mint:#85f2d1; }
        * { box-sizing:border-box; }
        body { min-height:100vh; margin:0; background:radial-gradient(ellipse at 88% 0,rgba(83,111,238,.16),transparent 34%),var(--page); color:var(--text); font-family:'DM Sans',sans-serif; }
        a { color:inherit; }
        .flow-nav { position:sticky; top:0; z-index:20; border-bottom:1px solid var(--line); background:rgba(8,13,28,.84); backdrop-filter:blur(18px); }
        .flow-wrap { width:min(960px,calc(100% - 28px)); margin:auto; }
        .flow-nav-inner { min-height:72px; }
        .flow-brand { display:flex; align-items:center; gap:10px; color:var(--text); font-family:'Space Grotesk',sans-serif; font-weight:700; text-decoration:none; }
        .flow-mark { display:grid; width:38px; height:38px; place-items:center; border:1px solid rgba(128,170,255,.3); border-radius:13px; background:linear-gradient(145deg,rgba(95,133,255,.28),rgba(103,239,211,.12)); color:var(--mint); }
        .flow-brand-text span { color:#9dbbff; }
        .flow-nav-links { display:flex; align-items:center; gap:10px; }
        .flow-nav-link { padding:9px 13px; border:1px solid var(--line); border-radius:11px; color:var(--muted); font-size:.88rem; text-decoration:none; }
        .flow-nav-link:hover { border-color:rgba(128,170,255,.4); color:var(--text); }
        .flow-main { padding:44px 0 64px; }
        .flow-heading { margin-bottom:23px; }
        .flow-eyebrow { color:var(--mint); font-size:.75rem; font-weight:700; letter-spacing:.13em; text-transform:uppercase; }
        .flow-title { margin:8px 0; font-family:'Space Grotesk',sans-serif; font-size:clamp(2rem,5vw,3rem); font-weight:700; letter-spacing:-.065em; }
        .flow-copy { color:var(--muted); }
        .flow-card { padding:clamp(20px,5vw,38px); border:1px solid var(--line); border-radius:23px; background:var(--panel); box-shadow:0 24px 70px rgba(0,0,0,.2); }
        .flow-label { margin-bottom:8px; color:#dce6fa; font-size:.9rem; font-weight:600; }
        .flow-control { min-height:48px; border:1px solid var(--line); border-radius:12px; background:#0b1222; color:var(--text); }
        textarea.flow-control { min-height:125px; }
        .flow-control:focus { border-color:rgba(128,170,255,.65); background:#0b1222; color:var(--text); box-shadow:0 0 0 3px rgba(128,170,255,.1); }
        .flow-control::placeholder { color:#75829c; }
        .flow-control[type=file] { padding:11px; }
        .flow-control[type=file]::file-selector-button { margin:-5px 12px -5px -5px; padding:7px 11px; border:0; border-radius:8px; background:#1b2943; color:var(--text); }
        .flow-hint { margin-top:6px; color:var(--muted); font-size:.82rem; }
        .flow-divider { margin:25px 0 20px; padding-bottom:11px; border-bottom:1px solid var(--line); color:var(--mint); font-family:'Space Grotesk',sans-serif; font-size:1rem; font-weight:700; }
        .flow-button { border:0; border-radius:12px; background:linear-gradient(115deg,#5e7df4,#8d70ef); color:#fff; font-weight:700; }
        .flow-button:hover { color:#fff; filter:brightness(1.08); }
        .flow-secondary { border:1px solid var(--line); border-radius:12px; background:var(--panel-soft); color:var(--text); }
        .flow-secondary:hover { border-color:var(--accent); color:var(--text); }
        .flow-danger { border:1px solid rgba(255,133,153,.3); border-radius:10px; background:rgba(255,89,122,.08); color:#ff9bac; }
        .flow-danger:hover { border-color:#ff718b; color:#ff718b; }
        .flow-preview { width:min(100%,520px); max-height:280px; border:1px solid var(--line); border-radius:16px; background:#0b1222; object-fit:cover; }
        .flow-footer { padding:18px 0 30px; border-top:1px solid var(--line); color:var(--muted); font-size:.83rem; }
        .flow-link { color:#a7c2ff; overflow-wrap:anywhere; }
        .form-check-input { border-color:var(--line); background-color:#0b1222; }
        .form-check-input:checked { border-color:#7189ff; background-color:#7189ff; }
        .alert { border-radius:12px; }
        @media(max-width:575px) { .flow-main { padding-top:30px; } .flow-nav-link.optional-nav { display:none; } }
    </style>
    @stack('styles')
</head>
<body>
<nav class="flow-nav">
    <div class="flow-wrap flow-nav-inner d-flex align-items-center justify-content-between">
        <a class="flow-brand" href="{{ route('portofolio.index') }}"><span class="flow-mark">ON</span><span class="flow-brand-text">omar<span>.portfolio</span></span></a>
        <div class="flow-nav-links">
            <a class="flow-nav-link optional-nav" href="{{ route('profile.edit') }}">Profil</a>
            <a class="flow-nav-link" href="{{ route('portofolio.index') }}">← Kembali ke karya</a>
        </div>
    </div>
</nav>
<main class="flow-wrap flow-main">
    @yield('content')
</main>
<footer class="flow-footer"><div class="flow-wrap d-flex justify-content-between flex-wrap gap-2"><span>© {{ now()->year }} {{ $profile?->name ?: 'Portofolio' }}</span><span>Dibuat dengan rasa ingin tahu dan sedikit ✨</span></div></footer>
@stack('scripts')
</body>
</html>
