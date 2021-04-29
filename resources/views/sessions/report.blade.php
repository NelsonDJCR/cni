@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <label for="" class="p-2">Cabildos/Informes de cabildos</label>
        <div class="row p-2 text-center border shadow">
            <div class="row">
                {{-- <div class="col-10"> --}}
                <h1 class="text-blue "> <b>INFORME DE CABILDOS</b> </h1>
                {{-- </div> --}}
                {{-- <div class="col-2">
                <button class="btn btn-warning text-white">Nueva sesión</button>
            </div> --}}
            </div>


        </div>

        <form id="filter_cabildos_report" method="post" action="">
            @csrf
            <div class="row mt-5">
                <div class="mb-3 col-3">
                    <label for="" class="form-label"><b>Tema</b></label>
                    <input type="text" class="form-control" id="" value="{{(isset($post['nombre_tema'])?$post['nombre_tema']:'')}}" name="nombre_tema">
                </div>
                <div class="mb-3 col-3">
                    <label for="" class="form-label"><b>Departamento</b></label>
                    <select class="form-control " name="dep_id">
                        <option selected disabled></option>
                        @foreach ($departments as $i)
                            <option value="{{ $i->id }}" {{(isset($post['dep_id'])?($post['dep_id']==$i->id?'selected':''):'')}}>{{ $i->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 col-3">
                    <label for="" class="form-label"><b>Municipio</b></label>
                    <select class="form-control " name="mun_id">
                        <option selected disabled></option>

                        @foreach ($municipios as $i)
                            <option value="{{ $i->id }}"  {{(isset($post['mun_id'])?($post['mun_id']==$i->id?'selected':''):'')}} >{{ $i->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 col-3">
                    <label for="" class="form-label"><b>Fecha</b></label>
                    <input type="date" class="form-control" id="" value="{{(isset($post['fecha_realizacion'])?$post['fecha_realizacion']:'')}}" name="fecha_realizacion">
                </div>
                <div class="mb-3 col-3">
                    <button class="btn-general btn">Buscar</button>
                </div>
            </div>
        </form>
    </div>

    <div class="container mb-4">
        <div class="row justify-content-end">
            {{-- {{ url('/excel-cabildos') }} --}}
            <a href="javascript:" class="btn btn-success w-100px btn_excel"> <i class="fas fa-file-excel"></i></a>
            {{-- <a href="javascript:" class="btn btn-danger w-100px"><i class="fas fa-file-pdf"></i></a> --}}
        </div>
    </div>

    <div class="container table-responsive mt-5">
        <table class="table table-bordered table_es">
            <thead>
                <th>Tema</th>
                <th>Descripción</th>
                <th>Departamento</th>
                <th>Municipio</th>
                <th>Fecha</th>
            </thead>
            <tbody>
                @foreach ($cabildos as $i)
                    <tr>
                        <td>{{ $i->nombre_tema }}</td>
                        <td>{{ $i->description }}</td>
                        <td>{{ $i->departamento->nombre }}</td>
                        <td>{{ $i->municipio->nombre }}</td>
                        <td>{{ $i->fecha_realizacion }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <style>
        .w-100px {
            width: 70px;
            margin: 5px;
        }

    </style>
    <script>
        $(".btn_excel").click(function() {
            $('#filter_cabildos_report').attr('action', '/excel-cabildos')
            $('#filter_cabildos_report').submit();
        });
        $(".btn-general").click(function() {
            $('#filter_cabildos_report').attr('action', '/report-cabildos')
            $('#filter_cabildos_report').submit();
        });

    </script>
@endsection
