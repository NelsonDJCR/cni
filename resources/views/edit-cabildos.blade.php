<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css"
        integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>

    <div class="container mt-5">
        <label for="" class="p-2">Cabildos/Listado de cabildos/Editar sesión</label>
        <div class="row p-2 text-center border shadow">
            <h1 class="text-blue"> <b>EDITAR SESIÓN</b> </h1>
        </div>
        <div class="row">


            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-5">

                <div class="row ">
                    <div class="mb-3 ">
                        <label for="" class="form-label">Tema</label>
                        <input type="email" class="form-control" id="" aria-describedby="emailHelp">
                    </div>

                </div>
                <div class="row">
                    <div class="mb-3 ">
                        <label for="" class="form-label">Descripción</label>
                        <textarea class="form-control" placeholder="" id="" style="height: 150px"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 ">
                        <label for="" class="form-label">Departamento</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected></option>
                            <option value="1">One</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 ">
                        <label for="" class="form-label">Municipio</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected></option>
                            <option value="1">One</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 ">
                      
                        <div class="input-group">
                            <span class="span">
                              <i class="fas fa-calendar-alt" aria-hidden="true"></i>
                            </span>
                            <input type="date" class="form-control" placeholder="Username" />
                          </div>
                    </div>
                </div>
            </div>


            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-5">
                <div class="row ">
                    <label for="" class="form-label">Tipo de archivo</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected></option>
                        <option value="1">One</option>
                    </select>
                </div>


                <div class="row mt-5">
                    <div class="form-group files border" id="box_file">
                        <div class="row mt-5">
                            <img class="img_file mx-auto d-block" src="{{ asset('img/icons/file.svg') }}" alt="">
                        </div>
                        <div class="row mt-1 mb-5">
                            <p class="text_file text-center">Arrastra tus archivos .pdf .png .jpg</p>
                        </div>
                    </div>
                    <input id="file" type="file" class="form-control d-none">
                </div>
                <div class="row mt-5 ">
                    <button class="btn-general btn mx-auto">Guardar sesión</button>
                </div>
            </div>
        </div>
    </div>
















    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
        integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
        integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous">
    </script>

    <script>
        $("#box_file").click(function() {

            $("#file").trigger('click');
        });

    </script>

</body>

</html>
<style>
    .span{
        float: right;
        position: absolute;
        text-align: left;
        margin-left: 95%;
        height: 25px;
        display: flex;
        align-items: center;
        z-index: 50;
        top: 5px;
        color: #003972;
    }
    .text-blue {
        color: #003972;
    }

    .btn-general {
        background: #003972;
        color: white;
        width: 250px;
    }

    .img_file {
        width: 100px;
    }

    .files input {
        /* outline: 2px dashed #92b0b3; */
        outline-offset: -10px;
        -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
        transition: outline-offset .15s ease-in-out, background-color .15s linear;
        padding: 120px 0px 85px 35%;
        text-align: center !important;
        margin: 0;
        width: 100% !important;
    }

    .files input:focus {
        outline: 2px dashed #92b0b3;
        outline-offset: -10px;
        -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
        transition: outline-offset .15s ease-in-out, background-color .15s linear;
        border: 1px solid #92b0b3;
    }

    .files {
        position: relative
    }

    .files:after {
        pointer-events: none;
        position: absolute;
        top: 60px;
        left: 0;
        width: 50px;
        right: 0;
        height: 56px;
        content: "";
        display: block;
        margin: 0 auto;
        background-size: 100%;
        background-repeat: no-repeat;
    }

    .color input {
        background-color: #f1f1f1;
    }

    .files:before {
        position: absolute;
        bottom: 10px;
        left: 0;
        pointer-events: none;
        width: 100%;
        right: 0;
        height: 57px;
        content: " ";
        display: block;
        margin: 0 auto;

        font-weight: 600;
        text-transform: capitalize;
        text-align: center;
    }

    .text_file {
        color: #91a09dec;
    }

</style>
