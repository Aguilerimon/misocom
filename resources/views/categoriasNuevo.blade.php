@extends('layout_principal')
@section('content')
    <h1>{{$title}}</h1>
       <form id="CategoriaForm"  enctype="multipart/form-data">
  <div class="row">
    <div class="col">
      <label for="inputNombre">Nombre</label>
    <input type="text" class="form-control" id="nombre" placeholder="Nombre de categoria" name="nombre" value="{{isset($categoria) ? $categoria->nombre: '' }}">
    </div>
  </div>
    <br>
     <button type="submit" class="btn btn-primary">{{$accion =='nuevo' ? 'Alta de Categoria' : 'Guardar Cambios'}}</button> 
</form>

<script>
    $(document).ready(function (){
        $('#CategoriaForm').validate({
            rules: {
                nombre:{
                    required: true
                },
            },
            messages: {
                nombre: {
                    required: "Ingresar Nombre de la categoria"
                },
            },    
        });
    });
        
        $("#CategoriaForm").submit(function (event ) {
            event.preventDefault();

            var form_data = new FormData();
            //form_data.append('imagen', $('#imagen')[0]);
            form_data.append('_token', '{{csrf_token()}}');
            form_data.append('accion', '{{$accion}}');
            form_data.append('id', '{{isset($categoria) ? $categoria->id : ''}}');
            form_data.append('nombre',  $("#nombre").val());

            var form = $('#CategoriaForm');

            console.log(form_data);
            console.log(form);


            if(! form.valid()) return false ;
            
                $.ajax({
                    url: "{{asset('categoriasGuardar')}}",
                    method: 'POST',
                    cache: false,//no almacena nada en memoria cache
                    contentType: false,
                    processData: false,
                    data: form_data,
                    dataType: 'json',
                    beforeSend: function () {

                    },
                    success: function (response) {
                        if (response.status == 'ok') {
                            toastr["success"](response.mensaje);
                            if("{{$accion}}" == "nuevo"){
                                $("#CategoriaForm").trigger("reset");
                            }
                            else{
                                window.setTimeout("location.href = \"{{asset('/categorias/')}}\"", 3000)
                            }
                        } else {
                            toastr["error"](response.mensaje);
                        }
                    },
                    error: function () {
                        toastr["error"]("Error al guardar categoria");
                    },
                    complete: function () {

                    }

                })
            
        });
</script>
@endsection
