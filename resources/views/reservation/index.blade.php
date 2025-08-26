@extends('app')
@section('pagetitle', 'Data Reservasi')
@section('content')
<div class="row mt-3">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{ $title }}</h3>
                <div align="right" class="mb-3">
                    <a href="{{ route('reservation.create') }}" class="btn btn-primary">Tambah</a>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>kamar</th>
                            <th>No. Reservasi</th>
                            <th>Tamu</th>
                            <th>Check-in</th>
                            <th>Check-out</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $keydatas => $valuedatas)
                            <tr>
                            <td>{{ $keydatas += 1 }}</td>
                            <td>{{ $valuedatas->guest_name }}</td>
                            <td>{{ $valuedatas->reservation_number }}</td>
                            <td>
                                <small>
                                    Nama : {{ $valuedatas->guest_name }}
                                    <br>
                                    Email : {{ $valuedatas->guest_email }}
                                    <br>
                                    Telp : {{ $valuedatas->guest_phone }}
                                </small>
                            </td>
                            <td>{{ $valuedatas->guest_checkin }}</td>
                            <td>{{ $valuedatas->guest_checkout }}</td>
                            <td>{{ $valuedatas->isReserve }}</td>
                            <td>
                                <a href="{{ route('reservation.edit', $valuedatas->id) }}" class="btn btn-success">Edit</a>
                                <form action="{{ route('reservation.destroy', $valuedatas->id) }}" method="post" class="d-inline">
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
