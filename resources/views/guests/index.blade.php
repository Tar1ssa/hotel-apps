@extends('app')
@section('pagetitle', 'Data guests')
@section('content')
<div class="row mt-3">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{ $title }}</h3>
                <div align="right" class="mb-3">
                    <a href="{{ route('guests.create') }}" class="btn btn-primary">Tambah</a>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Tamu</th>
                            <th>Tanggal Check-in & Check-out</th>
                            <th>Nomor Kamar</th>
                            <th>Kontak Tamu</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $keydatas => $valuedatas)
                            <tr>
                            <td>{{ $keydatas += 1 }}</td>
                            <td>{{ $valuedatas->nama_tamu }}</td>
                            <td>{{ $valuedatas->checkin }} - {{ $valuedatas->checkout }}</td>
                            <td>{{ $valuedatas->nokamar }}</td>
                            <td>Email: {{ $valuedatas->email }} Telp: {{ $valuedatas->telp }}</td>
                            <td>
                                <a href="{{ route('guests.edit', $valuedatas->id) }}" class="btn btn-success">Edit</a>
                                <form action="{{ route('guests.destroy', $valuedatas->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
<button class="btn btn-danger">Delete</button>

                                </form>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
