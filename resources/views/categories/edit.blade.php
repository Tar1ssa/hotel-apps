@extends('app')
@section('pagetitle', "Edit Kategori")
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{ $title }}</h3>
                <form action="{{ route('categories.update', $edit->id) }}" method="post">
                    @csrf
                    @method('PUT')
    <div class="mb-3">
    <label for="" class="form-label">Name</label>
    <input type="text" class="form-control" placeholder="Input nama anda" required name="name" value="{{ $edit->name ?? '' }}">
    </div>
    <div class="mb-3">
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
