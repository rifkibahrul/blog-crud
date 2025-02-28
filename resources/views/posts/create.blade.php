@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Buat Post Baru</h2>
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" class="form-control" name="title" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Isi Konten</label>
            <textarea class="form-control" name="content" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
