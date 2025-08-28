<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservations;
use App\Models\User;
use App\Models\Categories;
use App\Models\Rooms;
use Carbon\Carbon;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function createReservationNumber()
    {
        $code_format = 'RSV';
        $today = Carbon::now()->format('Ymd'); // akan menghasilkan format YYYMMDD
        $prefix = $code_format . "-" . $today . "-";
        $lastReservation = Reservations::whereDate('created_at', Carbon::today())->orderBy('id', 'desc')->first(); //first akan mengambil data langung berbentuk {data}, sedangkat get akan mengambil semua data dan berbentuk array [{data}]

        if ($lastReservation) {
            // $lastNumber = substr($lastReservation->reservation_number, -3); // akan mengambil 3 data/kata dari belakang dari $lastReservation (untuk mengambil id)
            $lastNumber = $lastReservation->id; // atau gunakan line ini (untuk mengambil id)
            $newNumber = str_pad($lastNumber, 3, "0", STR_PAD_LEFT); // akan
        } else {
            $newNumber = "001";
        }

        $reservation_number = $prefix . $newNumber;

        return $reservation_number;
    }


    public function index()
    {
        $datas = Reservations::with('rooms')->orderBy('id', 'desc')->get();
        // return $datas;
        $title = "Data Reservasi";

        return view('reservation.index', compact('title', 'datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tambah Reservasi";
        $categories = Categories::get();
        $reservation_number = $this->createReservationNumber();
        return view('reservation.create', compact('title', 'categories', 'reservation_number'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try {
            $data = $request->validate([
                'reservation_number' => 'required',
                'guest_name'         => 'required',
                'guest_email'        => 'required|email',
                'guest_phone'        => 'required',
                'guest_note'         => 'nullable|string',
                'guest_room_number'  => 'nullable|string',
                'guest_checkin'      => 'required|date',
                'guest_checkout'     => 'required|date|after:checkin',
                'payment_method'     => 'required',
                'guest_quantity'     => 'required',
                'room_id'            => 'required',
                'roomrate'           => 'required',
                'night'              => 'required',
                'subtotal'           => 'required',
                'tax'                => 'required',
                'totalamount'        => 'required',
                'isReserve'          => 1
            ]);

            $create = Reservations::create($data);
            return response()->json(
                [
                    'status' => 'success',
                    'message' => 'reservasi create success',
                    'data' => $create
                ],
                201
            );
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation Error',
                'error' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getRoomByCategory($id_category)
    {
        try {
            $rooms = Rooms::where('category_id', $id_category)->get();
            return response()->json(['data' => $rooms, 'message' => 'Fetch Success']);
            //code...
        } catch (\Throwable $th) {
            return response()->json(['message' => "error", 'error' => $th->getMessage()]);
            //throw $th;
        }
    }
}
