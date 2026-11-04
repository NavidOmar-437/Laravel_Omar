@forelse ($users as $user)
    <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
            <a href="{{ route('admin.user.edit', $user->id) }}">Edit</a>

            <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="3">Belum ada data User.</td>
    </tr>
@endforelse
