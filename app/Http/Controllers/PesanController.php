<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesan;
use App\Models\Fasilitas;
use App\Models\Kamar;

class PesanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $data = Kamar::all();
        return view('pesan', compact('data'));
    }

    public function reservasi(Request $request)
    {

        $data = Pesan::where('confirm',false)->get();
        if(isset($request['check_in_filter'])){

            $data = Pesan::where('confirm',false)->whereDate('chek_in',$request['check_in_filter'])->get();
        }

        return view('reservasi', ['data' => $data]);
    }

    public function reservasi_confirm(Request $request)
    {
        $data = Pesan::where('confirm',true)->get();
        if(isset($request['check_in_filter'])){

            $data = Pesan::where('confirm',true)->whereDate('chek_in',$request['check_in_filter'])->get();
        }
        return view('reservasi', ['data' => $data]);
    }
    
    public function reservasi_reject(Request $request)
    {
        $data = Pesan::where('confirm',2)->get();
        if(isset($request['check_in_filter'])){

            $data = Pesan::where('confirm',2)->whereDate('chek_in',$request['check_in_filter'])->get();
        }
        return view('reservasi', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $search = $request->search;
        $data = Pesan::select('id','nama_pengguna','email','no_hp','nama_tamu','tipe_kamar','tipe_kamar','chek_in','chek_out','jumlah')
                ->when($search, function($query, $search){
                    return $query->where('nama_pengguna','like',"%{$search}%")
                                ->orWhere('nama_pengguna','like',"%{$search}%");
                })
                ->paginate(50);

        return view('reservasi',['data'=>$data]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pengguna'=>'required',
            'email'=>'required',
            'no_hp'=>'required',
            'kamar_id'=>'required',
            'nama_tamu'=>'required',
            'chek_in'=>'required',
            'chek_out'=>'required',
            'jumlah'=>'required'
        ]);

        $data = Pesan::create([
            'nama_pengguna'=>$request->nama_pengguna,
            'email'=>$request->email,
            'no_hp'=>$request->no_hp,
            'kamar_id'=>$request->kamar_id,
            'nama_tamu'=>$request->nama_tamu,
            'chek_in'=>$request->chek_in,
            'chek_out'=>$request->chek_out,
            'jumlah'=>$request->jumlah
        ]);


        // return redirect()->route('cetak',$data->id);
        return back()->with('data',$data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function confirm(Pesan $id)
    {
        $id->update([
            'confirm'=>1,
        ]);
        return redirect()->back();
    }

    public function reject(Pesan $id)
    {
        $id->update([
            'confirm'=>2,
        ]);
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pesan $pesan)
    {
        $destroy = $pesan->destroy($pesan->id);
        if($destroy){
            return redirect()->back()->with(['success'=>'delete data berhasil']);
        }
    }
}