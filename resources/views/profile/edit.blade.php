<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Profil CV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<main class="container py-5" style="max-width: 850px">
    <div class="card shadow-sm p-4">
        <h1 class="h3 mb-4">Edit Profil CV</h1>
        @if ($errors->any())
            <div class="alert alert-danger">Periksa kembali data yang dimasukkan.</div>
        @endif
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input id="name" name="name" class="form-control" value="{{ old('name', $profile->name) }}" required>
                @error('name')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label for="headline" class="form-label">Profesi / Jabatan</label>
                <input id="headline" name="headline" class="form-control" value="{{ old('headline', $profile->headline) }}" placeholder="Contoh: Web Developer">
            </div>
            <div class="mb-3">
                <label for="summary" class="form-label">Ringkasan Profil</label>
                <textarea id="summary" name="summary" class="form-control" rows="4">{{ old('summary', $profile->summary) }}</textarea>
            </div>
            <h2 class="h5 mt-4">Kontak</h2>
            <div class="row">
                <div class="col-md-6 mb-3"><label for="email" class="form-label">Email</label><input id="email" type="email" name="email" class="form-control" value="{{ old('email', $profile->email) }}">@error('email')<div class="text-danger small">{{ $message }}</div>@enderror</div>
                <div class="col-md-6 mb-3"><label for="phone" class="form-label">Telepon</label><input id="phone" name="phone" class="form-control" value="{{ old('phone', $profile->phone) }}"></div>
                <div class="col-12 mb-3"><label for="address" class="form-label">Alamat</label><input id="address" name="address" class="form-control" value="{{ old('address', $profile->address) }}"></div>
                <div class="col-md-6 mb-3"><label for="linkedin" class="form-label">LinkedIn</label><input id="linkedin" type="url" name="linkedin" class="form-control" value="{{ old('linkedin', $profile->linkedin) }}" placeholder="https://..."></div>
                <div class="col-md-6 mb-3"><label for="github" class="form-label">GitHub / Portofolio</label><input id="github" type="url" name="github" class="form-control" value="{{ old('github', $profile->github) }}" placeholder="https://..."></div>
            </div>
            <div class="mb-3">
                <label for="skills" class="form-label">Keahlian</label>
                <textarea id="skills" name="skills" class="form-control" rows="5" placeholder="Satu keahlian per baris">{{ old('skills', $profile->skills) }}</textarea>
            </div>
            <div class="mb-4">
                <label for="education" class="form-label">Pendidikan</label>
                <textarea id="education" name="education" class="form-control" rows="5" placeholder="Satu pendidikan per baris, contoh: 2022–2025 | SMK ... | Rekayasa Perangkat Lunak">{{ old('education', $profile->education) }}</textarea>
            </div>
            <button class="btn btn-primary">Simpan Profil</button>
            <a href="{{ route('portofolio.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</main>
</body>
</html>
