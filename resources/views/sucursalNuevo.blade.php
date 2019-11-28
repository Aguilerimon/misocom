@extends('layout_principal')
@section('content')  
    <h1>{{$title}}</h1>
    <form id="SucursalForm" method="POST">
  <div class="row">
    <div class="col">
      <label for="inputNombre">Nombre</label>
      <input type="text" 
      class="form-control" 
      placeholder="Nombre sucursal" 
      id="forNombre"  
      name="nombre" 
      value="{{isset($sucursal) ? $sucursal->nombre : ''}}">
    </div>

    <div class="col">
      <label for="inputDireccion">Direccion</label>
    <input type="text" 
    class="form-control" 
    id="forDireccion" 
    placeholder="Direccion" 
    name="direccion"
    value="{{isset($sucursal) ? $sucursal->direccion : ''}}">
    </div>

    <div class="col">
      <label for="inputTelefono">Telefono</label>
      <input type="text" 
      class="form-control" 
      placeholder="Telefono" 
      id="forTelefono" 
      name="telefono"
      value="{{isset($sucursal) ? $sucursal->telefono : ''}}">
    </div>
    <div class="form-group">
        <label class="col-md-4 control-label">Imagen</label>
          <div class="col-md-6">
              @if(isset($sucursal) && file_exists(public_path('img/sucursales/'.$sucursal->id.'.jpg')))
                  <img src="{{url('img/sucursales/'.$sucursal->id)}}.jpg" width="200px">
              @endif
              <input type="file" id="imagen" name="imagen" accept="image/x-png,image/gif,image/jpeg">
          </div>
    </div>
  </div>

  <button type="submit" class="btn btn-primary">{{$accion == 'nuevo' ? 'Alta de sucursal' : 'Guardar cambios' }}</button>
</form>


    <script>
  $(document).ready(function () {
        $("#SucursalForm").validate({
            rules: {
                nombre: {
                    required: true
                },
                direccion: {
                    required: true
                },
                telefono: {
                    required: true
                },
               },
            messages: {
                nombre: {
                    required: "Ingresar Nombre de la sucursal"
                },
                direccion: {
                    required: "Ingresar Direccion de la sucursal"
                },
                telefono: {
                    required: "Ingresar Telefono de la sucursal"
                },
                
            },
        

        });

        $("#SucursalForm").submit(function (event ) {
           event.preventDefault();

            var form_data = new FormData();
            form_data.append('imagen', $('#imagen')[0].files[0]);
            //form_data.append('imagen', $('#imagen')[0]);
            form_data.append('_token', '{{csrf_token()}}');
            form_data.append('accion', '{{$accion}}');
            form_data.append('id', '{{isset($sucursal) ? $sucursal->id : ''}}');
            form_data.append('nombre',  $("#forNombre").val());
            form_data.append('direccion',  $("#forDireccion").val());
            form_data.append('telefono',  $("#forTelefono").val());

            var form = $('#SucursalForm');

            console.log(form_data);
            console.log(form);

            if(! form.valid()) return false;

            $.ajax({
                url: "{{ asset('sucursalGuardar')}}",
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
                            $("#SucursalForm").trigger("reset");
                        }else{
                            window.setTimeout("location.href = \"{{asset('/sucursal/')}}\"", 3000)
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
    });
    </script>
@endsection