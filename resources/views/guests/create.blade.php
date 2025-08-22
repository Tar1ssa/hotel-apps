@extends('app')
@section('pagetitle', "Tambah Pengguna")
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div>
                    @foreach ($errors->all() as $item)
                        <ul>
                            <li>{{ $item }}</li>
                        </ul>
                    @endforeach
                </div>
                <h3 class="card-title">{{ $title }}</h3>
                <form action="{{ route('guests.store') }}" method="post">
                    @csrf
    <div class="mb-3">
    <label for="" class="form-label">Nama Tamu</label>
    <input type="text" class="form-control" value="{{ old('nama_tamu') }}" placeholder="Input nama tamu" required name="nama_tamu">
    </div>
    <div class="mb-3">
    <label for="" class="form-label">Check-in</label>
    <input type="date" class="form-control" value="{{ old('checkin') }}" placeholder="Input tanggal check-in tamu" required name="checkin">
    </div>
    <div class="mb-3">
    <label for="" class="form-label">Check-out</label>
    <input type="date" class="form-control" {{ old('checkout') }} placeholder="Input tanggal check-out tamu" required name="checkout">
    </div>
    <div class="mb-3">
    <label for="" class="form-label">No Kamar</label>
    <select class="form-select" name="nokamar" id="">
        <option value="">Pilih Kamar</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
    </select>
    </div>
    <div class="mb-3">
    <label for="" class="form-label">Email Tamu</label>
    <input type="email" {{ old('email') }} class="form-control" placeholder="Input email tamu" required name="email">
    </div>
    <div class="mb-3">
    <label for="" class="form-label">Telp Tamu</label>
    <input type="number" {{ old('telp') }} class="form-control" placeholder="Input telp tamu" required name="telp">
    </div>
    <div class="mb-3">
    <label for="" class="form-label">Status Tamu</label>
    <select name="status" id="">
        @foreach ($categories as $keycategories)

        <option value="{{ $keycategories->name }}">{{ $keycategories->name }}</option>
        @endforeach
    </select>
    </div>
        <div class="mb-3">
    <label for="" class="form-label">Alamat Tamu</label>
    <textarea class="form-control" name="alamat" id="">{{ old('alamat') }}</textarea>
    </div>
        <div class="mb-3">
    <label for="" class="form-label">Kebutuhan Khusus</label>
    <input  type="radio" name="status_k" id="ada" onclick="toggleinput(true)">Ada
    <input  type="radio" name="status_k" id="tidak" onclick="toggleinput(false)">Tidak Ada
    <input type="text" class="form-control" placeholder="Input kebutuhan khusus" name="kebutuhan" id="kebutuhan_k" style="display: none" >
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ url()->previous() }}">Kembali</a>
    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<script>
    function toggleinput(show) {
        const kebutuhan = document.querySelector("kebutuhan_k");

        kebutuhan_k.style.display = show ? 'block' : 'none';
    }
</script>
@endsection
