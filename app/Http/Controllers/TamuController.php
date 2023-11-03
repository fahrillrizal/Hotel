<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Transaction;
use App\Models\Kamar;
use App\Models\Fasilitas;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;

class TamuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function room()
    {
        $room = Kamar::all();
        $fs = Fasilitas::all();

        return view ('home', compact('room','fs'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTransactionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'namaPemesan' =>'required|max:50',
            'email' =>'required|email',
            'telp' =>'required|max:15',
            'namaTamu' =>'required|max:50',
            'room_id' =>'required|integer',
            'cekIn' =>'required|date',
            'cekOut' =>'required|date',
            'jumlah' =>'required|integer',
        ]);

        $transaction = new Transaction;
        $transaction->namaPemesan = $request->namaPemesan;
        $transaction->email = $request->email;
        $transaction->telp = $request->telp;
        $transaction->namaTamu = $request->namaTamu;
        $transaction->room_id = $request->room_id;
        $transaction->cekIn = $request->cekIn;
        $transaction->cekOut = $request->cekOut;
        $transaction->jumlah = $request->jumlah;
        $transaction->save();

        return redirect()->route('asu')->with('success','store');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransactionRequest  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}