<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoDocumento;
use App\Models\Departamento;
use App\Models\Municipio;
use App\Models\Documento;
use App\Models\CabildoAbierto;
use App\Models\CabildoSoporte;
use Illuminate\Support\Facades\Validator;

class CabildosController extends Controller
{
    public function getIndex()
    {
        return view('sessions.new-sesion')
            ->with('type_file', TipoDocumento::all())
            ->with('municipios', Municipio::all())
            ->with('departament', Departamento::all());
    }

    public function save(Request $r)
    {
        $rules = [
            'theme' => 'required',
            'description' => 'required',
            'department' => 'required|numeric',
            'municipality' => 'required|numeric',
            'date' => 'required',
            'cne' => 'required',
            'type_file' => 'required|numeric',
        ];
        $messages = [
            'theme.required' => 'El tema es requerido',
            'description.required' => 'La descripción es requerida',
            'department.required' => 'El departamento es requerido',
            'municipality.required' => 'El municipio es requerido',
            'date.required' => 'La fecha es requerida',
            'cne.required' => 'El radicado CNE es requerido',
            'type_file.required' => 'El tipo de documento es requerido',
        ];
        if (!isset($r->file)) {
            return response()->json([
                'msg' => 'Debe ingresar al menos un documento'
            ]);
        }
        $validator = Validator::make($r->all(), $rules, $messages);
        $e = new CabildoAbierto();
        $e->dep_id = $r->department;
        $e->mun_id = $r->municipality;
        $e->radicado_CNE = $r->cne;
        $e->nombre_tema = $r->theme;
        $e->description = $r->description;
        $e->fecha_realizacion = $r->date;
        $e->save();


        $type =  $r->type_file;
        foreach ($r->file as $i) {
            $path =  $i->store('uploads', 'public');
            $r = new Documento();
            $r->nombre = $path;
            $r->id_tipo_documento = $type;
            $r->save();

            $x = new CabildoSoporte();
            $x->id_cabildo = $e->id;
            $x->id_documento = $r->id;
            $x->save();
        }

        if ($validator->fails()) {
            return response()->json(['status' => 406, 'msg' => $validator->errors()->first()]);
        } else {
            return response()->json([
                'msg' => 'Datos guardados correctamente',
                'code' => 200,
            ]);
        }
    }

    public function list()
    {

        return view('sessions.list')
            ->with('cabildos', CabildoAbierto::all());
    }

    public function edit($id)
    {
        $documents = Documento::select('documento.*')
        ->leftjoin("cabildo_soporte", "cabildo_soporte.id_documento", "documento.id")
        ->where('cabildo_soporte.id_cabildo',$id)
        ->where('documento.estado',1)
        ->get();

        $type_document = Documento::select('documento.id_tipo_documento','tipo_documento.nombre')
        ->leftjoin("cabildo_soporte", "cabildo_soporte.id_documento", "documento.id")
        ->leftjoin("tipo_documento", "tipo_documento.id", "documento.id_tipo_documento")
        ->where('cabildo_soporte.id_cabildo',$id)
        ->where('documento.estado',1)
        ->first();

        return view('sessions.edit-sesion')
            ->with('type_file', TipoDocumento::all())
            ->with('municipios', Municipio::all())
            ->with('documents', $documents)
            ->with('type_document', $type_document)
            ->with('departament', Departamento::all())
            ->with('data', CabildoAbierto::find($id));
    }

	public function editDocument(Request $r)
	{
        $e = Documento::find($r->id);
        $e->estado = 3;
        $e->save();

	}
}
