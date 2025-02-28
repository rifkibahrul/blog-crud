@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Beranda</h1>
    <a href="{{ route('posts.index') }}" class="btn btn-success">Kelola Post</a>
    @if(Auth::user() && Auth::user()->role == 'admin')
        <a href="{{ route('accounts.index') }}" class="btn btn-warning">Kelola Akun</a>
    @endif
    <form action="{{ route('logout') }}" method="POST" class="d-inline">
        @csrf
        <button class="btn btn-danger">Logout</button>
    </form>
</div>
@endsection
