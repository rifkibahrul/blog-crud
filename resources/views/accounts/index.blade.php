@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Akun</h1>
    <a href="{{ route('accounts.create') }}" class="btn btn-primary">Tambah Akun</a>
    <table class="table mt-3">
        <tr>
            <th>Username</th>
            <th>Nama</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>
        @foreach($accounts as $account)
        <tr>
            <td>{{ $account->username }}</td>
            <td>{{ $account->name }}</td>
            <td>{{ $account->role }}</td>
            <td>
                <a href="{{ route('accounts.edit', $account->username) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('accounts.destroy', $account->username) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
