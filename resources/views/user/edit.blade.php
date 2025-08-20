@extends('app')
@section('pagetitle', "Edit Pengguna")
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{ $title }}</h3>
                <form action="{{ route('user.update', $edit->id) }}" method="post">
                    @csrf
                    @method('PUT')
    <div class="mb-3">
    <label for="" class="form-label">Name</label>
    <input type="text" class="form-control" placeholder="Input nama anda" required name="name" value="{{ $edit->name ?? '' }}">
    </div>
    <div class="mb-3">
    <label for="" class="form-label">Email</label>
    <input type="email" class="form-control" placeholder="Input email anda" required name="email" value="{{ $edit->email ?? '' }}">
    </div>
    <div class="mb-3">
    <label for="" class="form-label">Password</label>
    <input type="password" class="form-control" placeholder="Input password anda"  name="password">
    <small class="text-muted">jika ingin mengubah password, silahkan isi password</small>
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
