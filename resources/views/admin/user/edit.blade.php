<form action="{{ route('admin.user.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="name" value="{{ old('name', $user->name) }}">
    @error('name') <div>{{ $message }}</div> @enderror

    <input type="email" name="email" value="{{ old('email', $user->email) }}">
    @error('email') <div>{{ $message }}</div> @enderror

    <input type="password" name="password" placeholder="Kosongkan jika tidak ingin mengganti">
    <input type="password" name="password_confirmation">

    <button type="submit">Perbarui</button>
</form>
