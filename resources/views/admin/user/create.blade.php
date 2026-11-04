<form action="{{ route('admin.user.store') }}" method="POST">
    @csrf

    <input type="text" name="name" value="{{ old('name') }}">
    @error('name') <div>{{ $message }}</div> @enderror

    <input type="email" name="email" value="{{ old('email') }}">
    @error('email') <div>{{ $message }}</div> @enderror

    <input type="password" name="password">
    @error('password') <div>{{ $message }}</div> @enderror

    <input type="password" name="password_confirmation">

    <button type="submit">Simpan</button>
</form>
