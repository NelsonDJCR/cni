<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Municipio;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departamentos = Departamento::where('estado',1)->get();
        // return $departamentos;
        $municipios = Municipio::where('estado',1)->get();
        $municipios = DB::table('municipio')
        ->join('departamento','departamento.id','=','municipio.dep_id')
        ->select(
            'municipio.id',
            'municipio.nombre',
            'municipio.estado',
            'municipio.usuario_creador',
            'municipio.created_at',
            'municipio.dep_id',
            DB::raw('departamento.nombre as dep_nombre'),
            DB::raw('departamento.estado as dep_estado'),
    )->where('municipio.estado',1)
    ->where('departamento.estado',1)->get();
        return view("municipios_J.index")
        ->with('municipios',$municipios)
        ->with('departamentos',$departamentos);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $municipio  = new Municipio();
        $municipio->nombre = $request->nombre;
        $municipio->usuario_creador = 1;
        $municipio->dep_id = $request->dep_id;
        if($municipio->save()):
        $departamento = Departamento::find($municipio->dep_id);
        return response()->json(['status' => 200, 'msg' => 'municipio creado con éxito', 'tabla' => $municipio, 'departamento' => $departamento]);
        else:
            return response()->json(['status' => 500, 'msg' => 'Algo salió mal']);
        endif;
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
    public function edit(Request $request)
    {
        $municipio = Municipio::find($request->id);
        return response()->json(['status' => 200, 'municipio' => $municipio]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // return response()->json(['msg' => $request->all()]);
        $municipio = Municipio::find($request->municipio_id);
        $municipio->nombre = $request->nombre_edit;
        $municipio->dep_id = $request->dep_id_edit;
        if($municipio->save()):
            $departamento = Departamento::find($municipio->dep_id);
            return response()->json(['status' => 200, 'msg' => 'editado correctamente', 'municipio' => $municipio, 'departamento' => $departamento]);
        else:
            return response()->json(['status' => 500, 'msg' => 'Algo salió mal']);
        endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->municipio_id;
        $municipio = Municipio::find($id);
        $municipio->estado = 3;
        if($municipio->save()):
            $municipios = Municipio::where('estado',1)->get();
            return response()->json([
            'status' => 200,
            'msg' => 'Municipio eliminado con éxito',
            'tabla' => $municipios
            ]);
        else:
            return response()->json(['status' => 500, 'msg' => 'Algo salió mal']);
        endif;
    }

    public function modal_eliminar_municipio(Request $request){
        return response()->json(['id' => $request->id]);
    }
}
