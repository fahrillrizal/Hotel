<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $data = Fasilitas::select('id', 'fasilitas','foto_fasilitas')
            ->when($search, function ($query, $search) {
                return $query->where('fasilitas', 'like', "%" . $search . "%");
            })
            ->orderBy('fasilitas') 
            ->paginate(50);

        return view('fasilitas.index', ['data' => $data]);
    }
    
    public function fasilitas()
    {
        $data = Fasilitas::all();
        return view('fasilitas', compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fasilitas.create');
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
            'fasilitas' => 'required|min:3',
            'foto_fasilitas' => 'required|image|mimes:png,jpg,jpeg',
            'deskripsi_fasilitas' => 'required|min:10'
        ]);

        $ext = $request->foto_fasilitas->getClientOriginalExtension();
        $filename = rand(9, 999) . ' ' . time() . '.' . $ext;
        $request->foto_fasilitas->move('images/fasilitas/', $filename);

        Fasilitas::create([
            'fasilitas' => $request->fasilitas,
            'foto_fasilitas' => $filename,
            'deskripsi_fasilitas' => $request->deskripsi_fasilitas
        ]);

        return redirect()->route('fasilitas.index')->with('status', 'store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Fasilitas $fasilita)
    {
        return view('fasilitas.edit', ['row' => $fasilita]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fasilitas $fasilita)
    {
        $fasilitas = $fasilita;
        $request->validate([
            'fasilitas' => 'required|min:3',
            'foto_fasilitas' => 'nullable|image|mimes:png,jpg,jpeg',
            'deskripsi_fasilitas' => 'required|min:10'
        ]);

        if ($fasilitas->foto_fasilitas && $request->foto_fasilitas) {
            $file = 'images/fasilitas/'.$fasilitas->foto_fasilitas;
            if(file_exists($file)){
            unlink($file);
            }
        }

        if ($request->foto_fasilitas) {
            $ext = $request->foto_fasilitas->getClientOriginalExtension();
            $filename = rand(9, 999) . ' ' . time() . '.' . $ext;
            $request->foto_fasilitas->move('images/fasilitas/', $filename);
            $arr = [
                'fasilitas' => $request->fasilitas,
                'foto_fasilitas' => $filename,
                'deskripsi_fasilitas' => $request->deskripsi_fasilitas
            ];
        } else {
            $arr = [
                'fasilitas' => $request->fasilitas,
                'deskripsi_fasilitas' => $request->deskripsi_fasilitas
            ];
        }

        $fasilitas->update($arr);

        return redirect()->route('fasilitas.index')->with('status', 'update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fasilitas $fasilitas)
    {
        if ($fasilitas->foto_fasilitas) {
            $file = 'images/fasilitas/'.$fasilitas->foto_fasilitas;
            if(file_exists($file)){
            unlink($file);
            }
        }
        
        $fasilitas->delete();

        return back()->with('status','destroy');
    }
}
