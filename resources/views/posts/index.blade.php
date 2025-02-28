@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Post</h2>
    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Buat Post</a>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->username }}</td>
                    <td>{{ $post->date }}</td>
                    <td>
                        <a href="{{ route('posts.show', $post->idpost) }}" class="btn btn-info btn-sm">Lihat</a>
                        @if(Auth::user()->username == $post->username || Auth::user()->role == 'admin')
                            <a href="{{ route('posts.edit', $post->idpost) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('posts.destroy', $post->idpost) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
