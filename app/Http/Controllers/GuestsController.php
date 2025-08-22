<?php

namespace App\Http\Controllers;

use in;
use App\Models\Guest;
use Illuminate\Support\Facades\Validator;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class GuestsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Guest::orderBy('id', 'desc')->get();
        $title = "Data Tamu";
        return view('guests.index', compact('title', 'datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::orderBy('id', 'desc')->get();
        $title = 'Tambah Tamu';
        return view('guests.create', compact('title', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'nama_tamu' => ['required'],
            'checkin' => ['required'],
            'checkout' => ['required'],
            'nokamar' => ['required', Rule::in(['1', '2', '3', '4'])],
            'email' => ['required', 'email', 'unique:guests'],
            'telp' => ['required', 'string', 'unique:guests'],
            'status' => ['required'],
            'alamat' => ['required'],
            'kebutuhan' => ['nullable']

        ];
        $validator = Validator::make($request->all(), $data);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        Guest::create($request->all());
        return redirect()->to('guests');
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
        $categories = Categories::orderBy('id', 'desc')->get();
        $edit = Guest::find($id);
        $title = 'Edit Tamu';
        return view('guests.edit', compact('title', 'edit', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categories = Categories::get();
        $edit = Guest::find($id);
        $title = "Ubah data tamu";
        return view('guests.edit', compact('edit', 'categories', 'title'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
