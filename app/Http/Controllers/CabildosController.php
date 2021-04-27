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
            'theme.required'=>'El tema es requerido',
            'description.required' => 'La descripción es requerida',
            'department.required' => 'El departamento es requerido',
            'municipality.required' => 'El municipio es requerido',
            'date.required' => 'La fecha es requerida',
            'cne.required' => 'El radicado CNE es requerido',
            'type_file.required' => 'El tipo de archivo es requerido',
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

        foreach ($r->file as $i) {
            $path =  $i->store('uploads', 'public');
            $r = new Documento();
            $r->nombre = $path;
            $r->id_tipo_documento = $r->type_file;
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
}
