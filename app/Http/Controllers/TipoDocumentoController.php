<?php

namespace App\Http\Controllers;

use App\Models\Tipo_documento;
use App\Models\TipoDocumento;
use Illuminate\Http\Request;

class TipoDocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoDocumento = TipoDocumento::where('estado', 1)->get();
        return view('tipoDocumento_J.index')
            ->with('tipoDocumento', $tipoDocumento);
    }

    public function buscar_tipoDocumento(Request $request)
    {
        // return response()->json(['status' => 200, 'msg' => $request->all()]);
        $post = $request;
        $tipoDocumento = TipoDocumento::where('estado', 1)
        ->where(function ($query) use ($post) {
            if (isset($post['nombre_buscar'])) {
                if (!empty($post['nombre_buscar']))
                    $query->orwhere('tipo_documento.nombre', 'like', "%" . $post['nombre_buscar'] . "%");
            }
        })->get();
        return response()->json(['status' => 200, 'tipoDocumento' => $tipoDocumento]);
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
        $tipoDocumento = new TipoDocumento();
        $tipoDocumento->nombre = $request->nombre;
        $tipoDocumento->usuario_creador = 1;
        if ($tipoDocumento->save()) :
            return response()->json(['status' => 200, 'msg' => 'Documento creado con éxito', 'tipo_documento' => $tipoDocumento]);
        else :
            return response()->json(['status' => 500, 'msg' => 'Algo salió mal']);
        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoDocumento  $tipoDocumento
     * @return \Illuminate\Http\Response
     */
    public function show(TipoDocumento $tipoDocumento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoDocumento  $tipoDocumento
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $tipoDocumento = TipoDocumento::find($request->id);
        return response()->json(['status' => 200, 'tipoDocumento' => $tipoDocumento]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipoDocumento  $tipoDocumento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // return response()->json(['msg' => $request->all()]);
        $tipoDocumento = TipoDocumento::find($request->tipoDocumento_id);
        $tipoDocumento->nombre = $request->nombre_edit;
        if($tipoDocumento->save()):
            return response()->json(['status' => 200, 'msg' => 'editado correctamente', 'tipo_documento' => $tipoDocumento]);
        else:
            return response()->json(['status' => 500, 'msg' => 'Algo salió mal']);
        endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoDocumento  $tipoDocumento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // return response()->json(['status' => 200, 'msg' => $request->all()]);
        $id = $request->tipoDocumento_id;
        $tipoDocumento = TipoDocumento::find($id);
        $tipoDocumento->estado = 3;
        if($tipoDocumento->save()):
            $tipoDocumento = TipoDocumento::where('estado',1)->get();
            return response()->json([
            'status' => 200,
            'msg' => 'Documento eliminado con éxito',
            'tipoDocumento' => $tipoDocumento
            ]);
        else:
            return response()->json(['status' => 500, 'msg' => 'Algo salió mal']);
        endif;
    }

    public function modal_eliminar_tipoDocumento(Request $request){
        return response()->json(['id' => $request->id]);
    }
}
