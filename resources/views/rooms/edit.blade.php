@extends('app')
@section('pagetitle', "Edit Kamar")
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{ $title }}</h3>
                <form action="{{ route('rooms.update', $edit->id) }}" method="post">
                    @csrf
                    @method('PUT')
    <div class="mb-3">
<div class="mb-3">
    <label for="" class="form-label">Kategori Kamar</label>
    <select name="category_id" id="" class="form-control">
        <option value="">Pilih Kategori Kamar</option>
        @foreach ($categories as $keycategories)
            <option {{ $keycategories->id == $edit->category_id ? 'selected' : '' }} value="{{ $keycategories->id }}">{{ $keycategories->name }}</option>
        @endforeach
    </select>
    </div>
    <div class="mb-3">
    <label for="" class="form-label">Nama Kamar *</label>
    <input type="text" class="form-control" placeholder="Input nama kamar" required name="name" value="{{ $edit->name ?? '' }}">
    </div>
    <div class="mb-3">
    <label for="" class="form-label">Harga Kamar *</label>
    <input type="number" class="form-control" placeholder="Input harga kamar" max="999999999999999" required name="price" value="{{ $edit->price ?? '' }}">
    </div>
    <div class="mb-3">
    <label for="" class="form-label">Fasilitas</label>
    <textarea type="text" class="form-control" cols="30" rows="10" placeholder="Input fasilitas kamar" required name="facility">{{ $edit->facility ?? '' }}</textarea>
    </div>
    <div class="mb-3">
    <label for="" class="form-label">Deskripsi</label>
    <textarea type="text" class="form-control" cols="30" rows="10" placeholder="Input deskripsi kamar" required name="description">{{ $edit->description ?? '' }}</textarea>
    </div>
    <div class="mb-3">
    <label for="" class="form-label">Foto Kamar</label>
    <input type="file" class="form-control" placeholder="Input cover kamar"  name="image_cover">
    <img src="{{ asset('storage/' . $edit->image_cover) }}" alt="" width="100">
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
