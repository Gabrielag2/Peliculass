<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['peliculas']=Pelicula::paginate(6);
        return view('pelicula.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pelicula.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
     $campos=[
         'Codigo'=>'required|string|max:100',
         'Imagen'=>'required|max:10000mimes:jpeg.png,jpg',
         'Nombre'=>'required |string|max:100',
         'Categoria'=>'required |string|max:100',
         'Cantidad'=>'required |string|max:100',
         'Precio'=>'required |string|max:100',

     ];

     $mensaje=[
          'requered'=>'eL :attribute es requerido',
          'Imagen.requered'=>'Imagen requerida'

       ];
       $this->validate($request, $campos, $mensaje);


       $datosPelicula = request()->exept(['_token']);

       if($request->hasFile('Imagen')){
           $datosPelicula['Imagen']=$request->file('Imagen')->store('uploads','public');
        }

     Pelicula::insert($datosPelicula);

       // return response()->json($datosPelicula);
       return redirect('pelicula')->with('mensaje','pelicula agregada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function show(Pelicula $pelicula)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       //
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        $campos=[
            'Codigo'=>'required|string|max:100',
            'Nombre'=>'required |string|max:100',
            'Categoria'=>'required |string|max:100',
            'Cantidad'=>'required |string|max:100',
            'Precio'=>'required |string|max:100',
   
        ];
   
        $mensaje=[ 
            
            'required'=>'eL :attribute es requerido',
        ];

        if($request->hasFile('Imagen')){
            $campos=['Imagen'=>'required|max:10000mimes:jpeg.png,jpg'];
            $mensaje=['Imagen.requered'=>'Imagen requerida'];

        }

           $this->validate($request, $campos, $mensaje);


        $datosPelicula = request()->exept(['_token','_method']);

        if($request->hasFile('Imagen')){

            Storage::delete('public/'.$pelicula->Imagen);

            $datosPelicula['Imagen']=$request->file('Imagen')->store('uploads','public');
           }


        Pelicula::where('id','=',$id)->update($datosPelicula);
        $pelicula=Pelicula::findOrFail($id);
      //  return view('pelicula.edit', compact('pelicula'));
        
        return direct('pelicula')->with('mensaje','pelicula modificada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
  
    {
        //

        $pelicula=Pelicula::findOrFail($id);

        if(Storage::delete('public/'.$pelicula->Imagen)){

            Pelicula::destroy($id);

        }
    

        return direct('pelicula')->with('mensaje','pelicula borrada');
    }
}
