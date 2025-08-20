@extends('app')
@section('pagetitle', "Tambah Pengguna")
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{ $title }}</h3>
                <form action="{{ route('user.store') }}" method="post">
                    @csrf
    <div class="mb-3">
    <label for="" class="form-label">Name</label>
    <input type="text" class="form-control" placeholder="Input nama anda" required name="name">
    </div>
    <div class="mb-3">
    <label for="" class="form-label">Email</label>
    <input type="email" class="form-control" placeholder="Input email anda" required name="email">
    </div>
    <div class="mb-3">
    <label for="" class="form-label">Password</label>
    <input type="password" class="form-control" placeholder="Input password anda" required name="password">
    </div>
    <div class="mb-3">
        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
        <a href="{{ url()->previous() }}">Kembali</a>
    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection
