@extends('layout_principal')
@section('content')
    <h1>{{$title}}</h1>
    <form id="clientesForm" method="POST">
  <div class="row">
    <div class="col">
      <label for="inputNombre(s)">Nombre</label>
      <input type="text" class="form-control" placeholder="Nombre(s)" id="inputNombre" name="inputNombre"
      value="{{isset($cliente) ? $cliente->nombres : ''}}">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputDireccion">Direccion</label>
      <input type="text" class="form-control" id="inputDireccion" placeholder="Direccion" name="inputDireccion" value="{{isset($cliente) ? $cliente->direccion : ''}}">
    </div>
    <div class="form-group col-md-4">
      <label for="inputCorreo">Correo Electronico</label>
      <input type="email" class="form-control" placeholder="Correo" id="inputCorreo" name="inputCorreo" value="{{isset($cliente) ? $cliente->correo : ''}}">
    </div>
    <div class="form-group col-md-4">
      <label for="inputContrasena">Contraseña</label>
      <input type="password" class="form-control" placeholder="Contrasena" id="inputContrasena" name="inputContrasena" value="{{isset($cliente) ? $cliente->contrasena : ''}}">
    </div>
    <div class="form-group">
            <label class="col-md-4 control-label">Imagen</label>
            <div class="col-md-6">
                @if(isset($cliente) && file_exists(public_path('img/clientes/'.$cliente->id.'.jpg')))
                    <img src="{{url('img/clientes/'.$cliente->id)}}.jpg" width="200px">
                @endif
                <input type="file" id="imagen" name="imagen" accept="image/x-png,image/gif,image/jpeg">
            </div>
    </div>
  </div>

  <button type="submit" class="btn btn-primary">{{$accion == 'nuevo' ? 'Guardar Cliente' : 'Guardar Cambios'}}</button>
</form>

<script>
        $(document).ready(function () {
            $("#clientesForm").validate({
                rules: {
                    inputNombre:{
                        required: true
                    },
                    inputDireccion:{
                        required: true
                    },
                    inputCorreo:{
                        required: true,
                    },
                    inputContrasena:{
                        required: true,
                    },
                },
                messages: {
                    inputNombre: {
                        required: "Ingresar Nombre del Cliente"
                    },
                    inputDireccion: {
                        required: "Ingresar Direccion del Cliente"
                    },
                    inputCorreo: {
                        required: "Ingresar Correo del Cliente"
                    },
                    inputContrasena: {
                        required: "Ingresar Contrasena del Cliente"
                    },
                },
            });
        });

        $("#clientesForm").submit(function (event ) {
           event.preventDefault();

            var form_data = new FormData();
            form_data.append('imagen', $('#imagen')[0].files[0]);
            //form_data.append('imagen', $('#imagen')[0]);
            form_data.append('_token', '{{csrf_token()}}');
            form_data.append('accion', '{{$accion}}');
            form_data.append('id', '{{isset($cliente) ? $cliente->id : ''}}');
            form_data.append('nombres',  $("#inputNombre").val());
            form_data.append('direccion',  $("#inputDireccion").val());
            form_data.append('correo',  $("#inputCorreo").val());
            form_data.append('contrasena',  $("#inputContrasena").val());
            var form = $('#clientesForm');

            console.log(form_data);
            console.log(form);

            if(! form.valid()) return false;

            $.ajax({
                url: "{{ asset('clientesGuardar')}}",
                method: 'POST',
                cache: false,// no almacenar nada en memoria cache
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
                            $("#clientesForm").trigger("reset");
                        }else{
                            window.setTimeout("location.href = \"{{asset('/clientes/')}}\"", 3000)
                        }
                    } else {
                        toastr["error"](response.mensaje);
                    }
                },
                error: function () {
                    toastr["error"]("Error al realizar el registro");
                },
                complete: function () {

                }

            })

        });










        /*$("#clientesForm").submit(function (event ) {
            console.log('submit');
            console.log('validate', $("#clientesForm").validate());
            event.preventDefault();

            var form_data = new FormData();
            form_data.append('imagen', $('#imagen')[0].files[0]);
            
            var $form = $('#clientesForm');

            console.log(form_data);
            console.log($form);

            if(! $form.valid()) return false;
                $.ajax({
                    url: "{{asset('clientesGuardar')}}",
                    method: 'POST',
                    data: {
                        nombres: $("#inputNombre").val(),
                        apaterno: $("#inputApaterno").val(),
                        amaterno: $("#inputAmaterno").val(),
                        direccion: $("#inputDireccion").val(),
                        telefono: $("#inputTelefono").val(),
                        correo: $("#inputCorreo").val(),
                        _token: "{{ csrf_token() }}",
                        id:"{{isset($cliente) ? $cliente->id : ''}}",
                        accion: "{{$accion}}"
                    },
                    dataType: 'json',
                    beforeSend: function () {

                    },
                    success: function (response) {
                        console.log("response", response);
                        if (response.status == 'ok') {
                            toastr["success"](response.mensaje);
                            $("#clientesForm").trigger("reset");
                        } else {
                            toastr["error"](response.mensaje);
                        }
                    },
                    error: function () {
                        toastr["error"]("Error al realizar el registro");
                    },
                    complete: function () {

                    }

                })
        });*/
</script>
@endsection