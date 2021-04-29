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
            ->with('type_file', TipoDocumento::where('estado',1)->get())
            ->with('municipios', Municipio::where('estado',1)->get())
            ->with('departament', Departamento::where('estado',1)->get());
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
            $doc = new Documento();
            $doc->nombre = $i->getClientOriginalName();
            $doc->ruta = $path;
            $doc->id_tipo_documento = $type;
            $doc->save();

            $x = new CabildoSoporte();
            $x->id_cabildo = $e->id;
            $x->id_documento = $doc->id;
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

    public function list(Request $r)
    {
        $post = $r;
        $cabildo = CabildoAbierto::where('estado', 1)
            ->where(function ($query) use ($post) {
                if (isset($post['nombre_tema'])) {
                    if (!empty($post['nombre_tema']))
                        $query->orwhere('cabildo_abierto.nombre_tema', 'like', "%" . $post['nombre_tema'] . "%");
                }
            })
            ->where(function ($query) use ($post) {
                if (isset($post['dep_id'])) {
                    if (!empty($post['dep_id']))
                        $query->orwhere('cabildo_abierto.dep_id', 'like', "%" . $post['dep_id'] . "%");
                }
            })
            // ->where(function ($query) use ($post) {
            //     if (isset($post['fecha_realizacion'])) {
            //         if (!empty($post['fecha_realizacion']))
            //             $query->orwhere('cabildo_abierto.fecha_realizacion', 'like', "%" . $post['fecha_realizacion'] . "%");
            //     }
            // })
            ->get();
        return view('sessions.list')
            ->with('municipios', Municipio::all())
            ->with('departments', Departamento::all())
            ->with('cabildos', $cabildo);
    }

    public function edit($id)
    {
        $documents = Documento::select('documento.*')
            ->leftjoin("cabildo_soporte", "cabildo_soporte.id_documento", "documento.id")
            ->where('cabildo_soporte.id_cabildo', $id)
            ->where('documento.estado', 1)
            ->get();

        $type_document = Documento::select('documento.id_tipo_documento', 'tipo_documento.nombre')
            ->leftjoin("cabildo_soporte", "cabildo_soporte.id_documento", "documento.id")
            ->leftjoin("tipo_documento", "tipo_documento.id", "documento.id_tipo_documento")
            ->where('cabildo_soporte.id_cabildo', $id)
            ->where('documento.estado', 1)
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

    public function editSesion(Request $r)
    {
        $rules = [
            'nombre_tema' => 'required',
            'description' => 'required',
            'dep_id' => 'required|numeric',
            'mun_id' => 'required|numeric',
            'fecha_realizacion' => 'required',
            'radicado_CNE' => 'required',
        ];
        $messages = [
            'nombre_tema.required' => 'El tema es requerido',
            'description.required' => 'La descripción es requerida',
            'dep_id.required' => 'El departamento es requerido',
            'mun_id.required' => 'El municipio es requerido',
            'fecha_realizacion.required' => 'La fecha es requerida',
            'radicado_CNE.required' => 'El radicado CNE es requerido',
        ];
        $validator = Validator::make($r->all(), $rules, $messages);
        $e = CabildoAbierto::find($r->id_record);
        $e->dep_id = $r->dep_id;
        $e->mun_id = $r->mun_id;
        $e->radicado_CNE = $r->radicado_CNE;
        $e->nombre_tema = $r->nombre_tema;
        $e->description = $r->description;
        $e->fecha_realizacion = $r->fecha_realizacion;
        $e->save();
        $type =  $r->type_file;
        $record = $r->id_record;

        if (isset($r->file)) {
            foreach ($r->file as $i) {
                $path =  $i->store('uploads', 'public');
                $doc = new Documento();
                $doc->nombre = $i->getClientOriginalName();
                $doc->ruta = $path;
                $doc->id_tipo_documento = $type;
                $doc->save();

                $x = new CabildoSoporte();
                $x->id_cabildo = $e->id;
                $x->id_documento = $doc->id;
                $x->save();
            }
        }
        if ($validator->fails()) {
            return response()->json(['status' => 406, 'msg' => $validator->errors()->first()]);
        } else {
            return response()->json([
                'msg' => 'Datos actualizados correctamente',
                'code' => 200,
            ]);
        }
    }

    public function deleteSesion(Request $r)
    {
        $e = CabildoAbierto::find($r->id);
        $e->estado = 0;
        $e->save();
    }

    public function viewDocuments(Request $r)
    {
        $documents = Documento::select('documento.*')
            ->leftjoin("cabildo_soporte", "cabildo_soporte.id_documento", "documento.id")
            ->where('cabildo_soporte.id_cabildo', $r->id)
            ->where('documento.estado', 1)
            ->get();

        return response()->json([
            'data' => $documents
        ]);
    }

    public function downloadFile($file)
    {
        return response()->download(storage_path("app/public/uploads/$file"));
    }

    public function reportSessions(Request $r)
    {

        $post = $r;
        $cabildo = CabildoAbierto::where('estado', 1)
            ->where(function ($query) use ($post) {
                if (isset($post['nombre_tema'])) {
                    if (!empty($post['nombre_tema']))
                        $query->orwhere('cabildo_abierto.nombre_tema', 'like', "%" . $post['nombre_tema'] . "%");
                }
            })
            ->where(function ($query) use ($post) {
                if (isset($post['dep_id'])) {
                    if (!empty($post['dep_id']))
                        $query->orwhere('cabildo_abierto.dep_id', 'like', "%" . $post['dep_id'] . "%");
                }
            })
            ->where(function ($query) use ($post) {
                if (isset($post['mun_id'])) {
                    if (!empty($post['mun_id']))
                        $query->orwhere('cabildo_abierto.mun_id', 'like', "%" . $post['mun_id'] . "%");
                }
            })
            ->where(function ($query) use ($post) {
                if (isset($post['fecha_realizacion'])) {
                    if (!empty($post['fecha_realizacion']))
                        $query->orwhere('cabildo_abierto.fecha_realizacion', 'like', "%" . $post['fecha_realizacion'] . "%");
                }
            })
            ->get();
        return view('sessions.report')
            ->with('departments', Departamento::where('estado',1)->get())
            ->with('municipios', Municipio::where('estado',1))
            ->with('cabildos', $cabildo)
            ->with('post', $r);
    }

    public function reportSessions_filtrado(Request $request)
    {
        // return response()->json(['msg' => $request->all()]);
        $post = $request;
        $cabildo = CabildoAbierto::where('estado', 1)
            ->where(function ($query) use ($post) {
                if (isset($post['nombre_tema'])) {
                    if (!empty($post['nombre_tema']))
                        $query->orwhere('cabildo_abierto.nombre_tema', 'like', "%" . $post['nombre_tema'] . "%");
                }
            })
            ->where(function ($query) use ($post) {
                if (isset($post['dep_id'])) {
                    if (!empty($post['dep_id']))
                        $query->orwhere('cabildo_abierto.dep_id', 'like', "%" . $post['dep_id'] . "%");
                }
            })
            ->where(function ($query) use ($post) {
                if (isset($post['mun_id'])) {
                    if (!empty($post['mun_id']))
                        $query->orwhere('cabildo_abierto.mun_id', 'like', "%" . $post['mun_id'] . "%");
                }
            })
            // ->where(function ($query) use ($post) {
            //     if (isset($post['fecha_realizacion'])) {
            //         if (!empty($post['fecha_realizacion']))
            //             $query->orwhere('cabildo_abierto.fecha_realizacion', 'like', "%" . $post['fecha_realizacion'] . "%");
            //     }
            // })
            ->get();
            $array = [];
            $x = 0;
            if(is_null($request->fecha_desde) && is_null($request->fecha_hasta)){

            }
            if(is_null($request->fecha_desde) && !is_null($request->fecha_hasta)){
                foreach ($cabildo as $row) {
                    if($request->fecha_hasta >= $row->fecha_realizacion){
                        $array[$x] = $row;
                        $x++;
                    }
                }
                $cabildo = $array;
            }
            if(!is_null($request->fecha_desde) && is_null($request->fecha_hasta)){
                foreach ($cabildo as $row) {
                    if($request->fecha_desde <= $row->fecha_realizacion){
                        $array[$x] = $row;
                        $x++;
                    }
                }
                $cabildo = $array;
            }
            if(!is_null($request->fecha_desde) && !is_null($request->fecha_hasta)){
                foreach ($cabildo as $row) {
                    if($request->fecha_desde <= $row->fecha_realizacion && $request->fecha_hasta >= $row->fecha_realizacion){
                        $array[$x] = $row;
                        $x++;
                    }
                }
                $cabildo = $array;
            }
            return response()->json([
                'cabildos' => $cabildo,
                ]);
        // return view('sessions.report')
        //     ->with('departments', Departamento::all())
        //     ->with('municipios', Municipio::all())
        //     ->with('cabildos', $cabildo)
        //     ->with('post', $r);
    }
}
