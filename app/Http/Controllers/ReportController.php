<?php

namespace App\Http\Controllers;

use App\Models\CabildoAbierto;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function excelCabildos(Request $r)
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
        return view('report.cabildos')
            ->with('cabildos', $cabildo);
    }
}
