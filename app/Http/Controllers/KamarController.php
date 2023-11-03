<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\FasilitasKamar;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $search = $request->search;

        $data = Kamar::select('id', 'type_kamar', 'foto_kamar','jumlah_kamar', 'harga')
            ->when($search, function ($query, $search) {
                return $query->where('type_kamar', 'like', "%" . $search . "%")
                    ->orWhere('harga', 'like', "%.$search.%");
            })
            ->paginate(50);

        return view('kamar.index', ['data' => $data]);
    }

        public function kamar()
    {
        $data = Kamar::all();
        return view('kamar', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('kamar.create',["fasilitas"=>FasilitasKamar::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // return dd(join('|',$request->fasilitas));
        $request->validate([
            'type_kamar' => 'required|min:3',
            'foto_kamar' => 'required|image|mimes:png,jpg,jpeg',
            'jumlah_kamar' => 'required',
            'harga' => 'required|max:8',
            'fasilitas'=>'required',
            'deskripsi_kamar' => 'required|min:10'
        ]);

        $ext = $request->foto_kamar->getClientOriginalExtension();
        $filename = rand(9, 999) . ' ' . time() . '.' . $ext;
        $request->foto_kamar->move('images/kamar/', $filename);

        Kamar::create([
            'fasilitas' => join(' , ',$request->fasilitas),
            'type_kamar' => $request->type_kamar,
            'foto_kamar' => $filename,
            'jumlah_kamar' => $request->jumlah_kamar,
            'harga' => $request->harga,
            'deskripsi_kamar' => $request->deskripsi_kamar
        ]);

        return redirect()->route('kamar.index')->with('status', 'store');
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
    public function edit(Kamar $kamar)
    {
        $fasilitas_check = explode(' , ',$kamar->fasilitas); 
       return view ('kamar.edit',['row'=>$kamar,"fasilitas"=>FasilitasKamar::all(),"f_check"=>$fasilitas_check]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Kamar $kamar)
    {
        $request['fasilitas'] = join(", ",$request->fasilitas);

        $request->validate([
            'type_kamar' => 'required|min:3',
            'foto_kamar' => 'nullable|image|mimes:png,jpg,jpegS',
            'jumlah_kamar' => 'required',
            'harga' => 'required',
            'fasilitas'=>'required',
            'deskripsi_kamar' => 'required|min:10'
        ]);

        if ($kamar->foto_kamar && $request->foto_kamar) {
            $file = 'images/kamar/'.$kamar->foto_kamar;
            if(file_exists($file)){
            unlink($file);
            }
        }

        if ($request->foto_kamar) {
            $ext = $request->foto_kamar->getClientOriginalExtension();
            $filename = rand(9, 999) . ' ' . time() . '.' . $ext;
            $request->foto_kamar->move('images/kamar/', $filename);
            $arr = [
                'type_kamar' => $request->type_kamar,
                'foto_kamar' => $filename,
                'jumlah_kamar' => $request->jumlah_kamar,
                'harga' => $request->harga,
                'fasilitas'=>$request->fasilitas,
                'deskripsi_kamar' => $request->deskripsi_kamar
            ];
        } else {
            $arr = [
                'type_kamar' => $request->type_kamar,
                'jumlah_kamar' => $request->jumlah_kamar,
                'harga' => $request->harga,
                'fasilitas'=>$request->fasilitas,
                'deskripsi_kamar' => $request->deskripsi_kamar
            ];
        }

        $kamar->update($arr);

        return redirect()->route('kamar.index')->with('status', 'update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kamar $kamar)
    {
        if ($kamar->foto_kamar) {
            $file = 'images/kamar/'.$kamar->foto_kamar;
            if(file_exists($file)){
            unlink($file);
            }
        }
        
        $kamar->delete();

        return back()->with('status','destroy');
    }
}