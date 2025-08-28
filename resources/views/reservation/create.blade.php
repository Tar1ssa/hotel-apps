@extends('app')
@section('pagetitle', "Tambah Resefvasi")
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{ $title }}</h3>
                <form action="{{ route('reservation.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                            <label for="" class="form-label">Reservation Number</label>
                            <input type="text" class="form-control" placeholder="Nomor Reservasi" readonly value="{{ $reservation_number }}" name="reservation_number">
                            </div>
                        </div>

                        {{-- kiri --}}
                        <div class="col-lg-6">


                            <div class="mb-3">
                            <label for="" class="form-label">Nama Tamu *</label>
                            <input type="text" class="form-control" placeholder="Input nama tamu" required name="guest_name">
                            </div>

                            <div class="mb-3">
                            <label for="" class="form-label">Telp/Hp</label>
                            <input type="number" class="form-control" placeholder="Input nomor telepon tamu"  name="guest_phone">
                            </div>

                            <div class="mb-3">
                            <label for="" class="form-label">Kategori Kamar</label>
                            <select id="category_id" class="form-select" name="category_id" id="" class="form-control">
                                <option value="">Pilih kategori kamar</option>
                                @foreach ($categories as $keycategories)
                                    <option value="{{ $keycategories->id }}">{{ $keycategories->name }}</option>
                                @endforeach
                            </select>
                            </div>

                            <div class="mb-3">
                            <label for="" class="form-label">Nomor Kamar</label>
                            <select class="form-select" name="guest_room_number" id="" class="form-control">
                                <option value="">Pilih nomor kamar</option>
                                @foreach ($categories as $keycategories)
                                    <option value="{{ $keycategories->id }}">{{ $keycategories->name }}</option>
                                @endforeach
                            </select>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                    <label for="" class="form-label">Check-in</label>
                                    <input type="date" name="guest_checkin" class="form-control" id="checkin">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                    <label for="" class="form-label">Check-out</label>
                                    <input type="date" name="guest_checkout" class="form-control" id="checkout">
                                    </div>
                                </div>
                            </div>




                            <div class="mb-3">
                            <label for="" class="form-label">Metode Bayar</label>
                            <select class="form-select" name="payment" id="" class="form-control">
                                <option value="">Pilih nomor kamar</option>
                                    <option value="cc">Credit Card</option>
                                    <option value="cash">Cash</option>
                                    <option value="bank">Bank Transfer</option>
                            </select>
                            </div>
                        </div>

                        {{-- kanan --}}
                        <div class="col-lg-6">
                            <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="email" class="form-control" placeholder="Input email tamu" name="guest_email">
                            </div>



                            <div class="mb-3">
                            <label for="" class="form-label">Jumlah Tamu</label>
                            <select class="form-select" name="guest_quantity" id="">
                                <option value="1">1 Tamu</option>
                                <option value="2">2 Tamu</option>
                                <option value="3">3 Tamu</option>
                                <option value="4">4 Tamu</option>
                                <option value="5">5 Tamu</option>
                            </select>
                            </div>

                            <div class="mb-3">
                            <label for="" class="form-label">Nama Kamar *</label>
                            <select class="form-select" name="room_id" id="room_id" class="form-control">
                                <option value="">Pilih kamar</option>
                            </select>
                            </div>

                            <div class="mb-3">
                            <label for="" class="form-label">Guest Note</label>
                            <textarea type="text" class="form-control" placeholder="Input note" name="guest_note"></textarea>
                            </div>

                            <div class="card card-bg-light">
                                <div class="card-body">
                                    <h6 class="card-title">Rangkuman Pembayaran</h6>
                                    <div class="d-flex justify-content-between">
                                        <span>Harga kamar (per malam)</span>
                                        <span id="roomrate">Rp.0</span>
                                        <input type="hidden" name="" id="roomrateVal">
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span>Berapa malam</span>
                                        <span id="totalnight">0</span>
                                        <input type="hidden" name="" id="totalnightVal">
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span>subtotal</span>
                                        <span id="subtotal">Rp.0</span>
                                        <input type="hidden" name="" id="subtotalVal">
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span>Tax (10%)</span>
                                        <span id="tax">Rp.0</span>
                                        <input type="hidden" name="" id="taxVal">
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-between">
                                        <span>Grand Total </span>
                                        <span id="totalAmount">Rp.0</span>
                                        <input type="hidden" name="" id="totalAmountVal">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


    {{-- <div class="mb-3">
    <label for="" class="form-label">Foto Kamar</label>
    <input type="file" class="form-control" placeholder="Input cover kamar" required name="image_cover">
    </div> --}}

    <div class="mb-3">
        <button type="button" name="" class="btn btn-primary" id="save">Simpan</button>
        <a href="{{ url()->previous() }}">Kembali</a>
    </div>
                </form>

            </div>
        </div>
    </div>


</div>


<!-- Modal -->
<div class="modal fade" id="successModal" tabindex="-1">
  <div class="modal-dialog-centered">
    <div class="modal-content text-center">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h4 class="mb-3">Reservasi Berhasil</h4>
        <p class="text-muted mb-4">Nomor Reservasi <strong id="reservation_number">#</strong></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary"><i class="bi bi-print"></i>Print Confirmation</button>
      </div>
    </div>
  </div>
</div>

@endsection
