<?php

namespace App\Http\Controllers;

use App\Models\FasilitasKamar;
use Illuminate\Http\Request;

class FasilitasKamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $data = FasilitasKamar::select('id','nama_fasilitas')
                ->when($search, function($query, $search){
                    return $query->where('nama_fasilitas','like',"%" . $search ."%");
                })
                ->paginate(50);

        return view('fasilitaskamar.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fasilitaskamar.create');
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
            'nama_fasilitas'=>'required|min:2'
        ]);

        FasilitasKamar::create([
            'nama_fasilitas'=>$request->nama_fasilitas,
        ]);

        return redirect()->route('fasilitaskamar.index')->with('status','store');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(FasilitasKamar $fasilitaskamar)
    {
        return view('fasilitaskamar.edit',['row'=>$fasilitaskamar]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fasilitaskamar $fasilitaskamar)
    {
        $request->validate([
            'nama_fasilitas'=>'required|min:3'
        ]);

        if ($request->nama_fasilitas){
            $arr = [
                'nama_fasilitas'=>$request->nama_fasilitas,
            ];
        }

        $fasilitaskamar->update($arr);

        return redirect()->route('fasilitaskamar.index')->with('status','update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fasilitaskamar $fasilitaskamar)
    {
        $fasilitaskamar->delete();

        return back()->with('status','destroy');
    }
}
