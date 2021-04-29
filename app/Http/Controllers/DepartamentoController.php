<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Municipio;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departamentos = Departamento::where('estado', 1)->get();
        return view('departamentos_J.index')
            ->with('departamentos', $departamentos);
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
        $departamento = new Departamento();
        $departamento->nombre = $request->nombre;
        $departamento->usuario_creador = 1;
        if ($departamento->save()) :
            return response()->json(['status' => 200, 'msg' => 'Departamento creado con éxito', 'departamento' => $departamento]);
        else :
            return response()->json(['status' => 500, 'msg' => 'Algo salió mal']);
        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function show(Departamento $departamento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $departamento = Departamento::find($request->id);
        return response()->json(['status' => 200, 'departamento' => $departamento]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // return response()->json(['msg' => $request->all()]);
        $departamento = Departamento::find($request->departamento_id);
        $departamento->nombre = $request->nombre_edit;
        if($departamento->save()):
            $departamento = Departamento::where('estado',1)->get();
            return response()->json(['status' => 200, 'msg' => 'editado correctamente', 'departamento' => $departamento]);
        else:
            return response()->json(['status' => 500, 'msg' => 'Algo salió mal']);
        endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // return response()->json(['status' => 200, 'msg' => $request->all()]);
        $id = $request->departamento_id;
        $departamento = Departamento::find($id);
        $departamento->estado = 3;
        if($departamento->save()):
            $municipios = Municipio::where('dep_id',$departamento->id)->get();
            foreach ($municipios as $row ) {
                    $row->estado = 3;
                    $row->save();
            }
            $departamentos = Departamento::where('estado',1)->get();
            return response()->json([
            'status' => 200,
            'msg' => 'departamento eliminado con éxito',
            'departamento' => $departamentos
            ]);
        else:
            return response()->json(['status' => 500, 'msg' => 'Algo salió mal']);
        endif;
    }

    public function modal_eliminar_departamento(Request $request){
        return response()->json(['id' => $request->id]);
    }

    public function buscar_departamento(Request $request)
    {
        // return response()->json(['status' => 200, 'msg' => $request->all()]);
        $post = $request;
        $departamento = Departamento::where('estado', 1)
        ->where(function ($query) use ($post) {
            if (isset($post['nombre_buscar'])) {
                if (!empty($post['nombre_buscar']))
                    $query->orwhere('departamento.nombre', 'like', "%" . $post['nombre_buscar'] . "%");
            }
        })->get();
        return response()->json(['status' => 200, 'departamento' => $departamento]);
    }

}
