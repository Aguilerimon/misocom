@extends('layout_principal')
@section('content')
 
<div class="row mt-5">
            <div class="col-8">
                <h1>{{$title}}</h1>
            </div>
            <div class="col-4">
                <div class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" id="buscar" type="text" placeholder="Ingresar búsqueda">
                <span>
                <button class="btn btn-outline-success my-2 my-sm-0" onclick="buscar()">Buscar</button>
                <button class="btn btn-outline-primary my-2 my-sm-0" onclick="imprimir('{{isset($buscar) ? $buscar : null }}')" type="button"><i class="fas fa-file-pdf"></i></button></span> 
                </div>
            </div>
</div>

<script type="text/javascript">
    function buscar(){
        location.href = "{{asset('/sucursal/')}}/"+ $('#buscar').val();
    }
    function imprimir(buscar) {
            location.href = "{{asset('/sucursalPDF/')}}/" + buscar;
        }
</script> 


<table class="table"> 
        <thead class="thead-dark">
        <tr>  
            <th scope="col">#ID</th>
            <th scope="col">Imagen</th>
            <th scope="col">Nombre(s)</th>
            <th scope="col">Direccion</th> 
            <th scope="col">Telefono</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
        </tr> 
        </thead>
        <tbody>
        @foreach($sucursal as $sucursal)
            <tr id="renglon_{{$sucursal->id}}">
                <th scope="row">{{$sucursal->id}}</th>
                <td>
                    @if(file_exists(public_path('img/sucursales/'.$sucursal->id.'.jpg')))
                        <img src="{{url('img/sucursales/'.$sucursal->id)}}.jpg" width="50px">
                    @endif
                </td>
                <td>{{$sucursal->nombre}}</td>
                <td>{{$sucursal->direccion}}</td>
                <td>{{$sucursal->telefono}}</td>
                <td>
                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Editar">
                        <a href="sucursalEditar/{{$sucursal->id}}">
                        <button type="button" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                    </span>
                </td>
                <td>
                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Eliminar">
                        <button onclick="eliminarSucursal({{$sucursal->id}})" type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                    </span>
                </td> 
            </tr>
        @endforeach
        </tbody>
    </table>
    <h6>Numero de sucursales: {{$numRegistros}}</h6>

<script type="text/javascript">
        function eliminarSucursal(sucursal_id){
            $.ajax({
                url: 'sucursalEliminar/'+sucursal_id,
                method: 'GET',
                data:{
                },
                dataType: 'json',
                beforeSend: function () {
                    //$("#form04_submit").removeClass("d-none");

                },
                success: function (response) {
                    if(response.status == 'ok'){
                        toastr["success"](response.mensaje);
                        $("#renglon_"+sucursal_id).remove();
                    }else{
                        toastr["error"](response.mensaje);
                    }
                },
                error: function() {
                    toastr["error"]("Error, no se pudo completar la operación");
                },
                complete: function () {

                }

            })

        }
        $(document).ready(function() {

        });
    </script>
@endsection