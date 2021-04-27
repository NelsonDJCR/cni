<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoArchivo;
use App\Models\Departamento;
use App\Models\Municipio;
use App\Models\Documento;
use Illuminate\Support\Facades\Validator;

class CabildosController extends Controller
{
    public function getIndex()
    {
        return view('sessions.new-sesion')
            ->with('type_file', TipoArchivo::all())
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
            'type_file' => 'required|numeric',
        ];

        $messages = [
            'theme.required'=>'El tema es requerido',
            'description.required' => 'La descripción es requerida',
            'department.required' => 'El departamento es requerido',
            'municipality.required' => 'El municipio es requerido',
            'date.required' => 'La fecha es requerida',
            'type_file.required' => 'El tipo de archivo es requerido',
        ];
        if (!isset($r->file)) {
            return response()->json([
                'msg' => 'Debe ingresar al menos un documento'
            ]);
        }
        $validator = Validator::make($r->all(), $rules, $messages);


        





        foreach ($r->file as $i) {
            $path =  $i->store('uploads', 'public');
            $city = new Documento();
            $city->nombre = $path;
            $city->save();
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
