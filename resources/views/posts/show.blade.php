@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $post->title }}</h2>
    <p><strong>Oleh: </strong>{{ $post->username }} | <strong>Tanggal: </strong>{{ $post->date }}</p>
    <p>{{ $post->content }}</p>
    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
