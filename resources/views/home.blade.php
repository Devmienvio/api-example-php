<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- So that mobile will display zoomed in -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- enable media queries for windows phone 8 -->
  <meta name="format-detection" content="telephone=no"> <!-- disable auto telephone linking in iOS -->
  <title>Ejemplo</title>

  <!-- Styles -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <style type="text/css">
      div {
        padding-top: 5px;
      }
      hr {
          -moz-border-bottom-colors: none;
          -moz-border-image: none;
          -moz-border-left-colors: none;
          -moz-border-right-colors: none;
          -moz-border-top-colors: none;
          border-color: #EEEEEE -moz-use-text-color #FFFFFF;
          border-style: solid none;
          border-width: 1px 0;
          margin: 18px 0;
        }
  </style>

</head>

<body>
    <form method="POST" action="/createShipment">
        <!-- Dirección de Origen -->
        <div class="col-md-5">
            <div class="col-md-12">
                <label for="name_from" class="col-md-4 control-label">Nombre</label>
                <div class="col-md-8">
                    <input id="name_from" type="string" class="form-control" name="name_from">
                </div>
            </div>
            <div class="col-md-12">
                <label for="street_from" class="col-md-4 control-label">Calle</label>
                <div class="col-md-8">
                    <input id="street_from" type="string" class="form-control" name="street_from">
                </div>
            </div>
            <div class="col-md-12">
                <label for="street2_from" class="col-md-4 control-label">Colonia</label>
                <div class="col-md-8">
                    <input id="street2_from" type="string" class="form-control" name="street2_from">
                </div>
            </div>
            <div class="col-md-12">
                <label for="reference_from" class="col-md-4 control-label">Referencia</label>
                <div class="col-md-8">
                    <input id="reference_from" type="string" class="form-control" name="reference_from">
                </div>
            </div>
            <div class="col-md-12">
                <label for="zipcode_from" class="col-md-4 control-label">Código Postal</label>
                <div class="col-md-8">
                    <input id="zipcode_from" type="string" class="form-control" name="zipcode_from">
                </div>
            </div>
            <div class="col-md-12">
                <label for="email_from" class="col-md-4 control-label">Correo electrónico</label>
                <div class="col-md-8">
                    <input id="email_from" type="email" class="form-control" name="email_from">
                </div>
            </div>
            <div class="col-md-12">
                <label for="phone_from" class="col-md-4 control-label">Teléfono</label>
                <div class="col-md-8">
                    <input id="phone_from" type="string" class="form-control" name="phone_from">
                </div>
            </div>

        </div>
        <!-- Dirección de Destino -->
        <div class="col-md-5">
            <div class="col-md-12">
                <label for="name_to" class="col-md-4 control-label">Nombre</label>
                <div class="col-md-8">
                    <input id="name_to" type="string" class="form-control" name="name_to">
                </div>
            </div>
            <div class="col-md-12">
                <label for="street_to" class="col-md-4 control-label">Calle</label>
                <div class="col-md-8">
                    <input id="street_to" type="string" class="form-control" name="street_to">
                </div>
            </div>
            <div class="col-md-12">
                <label for="street2_to" class="col-md-4 control-label">Colonia</label>
                <div class="col-md-8">
                    <input id="street2_to" type="string" class="form-control" name="street2_to">
                </div>
            </div>
            <div class="col-md-12">
                <label for="reference_to" class="col-md-4 control-label">Referencia</label>
                <div class="col-md-8">
                    <input id="reference_to" type="string" class="form-control" name="reference_to">
                </div>
            </div>
            <div class="col-md-12">
                <label for="zipcode_to" class="col-md-4 control-label">Código Postal</label>
                <div class="col-md-8">
                    <input id="zipcode_to" type="string" class="form-control" name="zipcode_to">
                </div>
            </div>
            <div class="col-md-12">
                <label for="email_to" class="col-md-4 control-label">Correo electrónico</label>
                <div class="col-md-8">
                    <input id="email_to" type="email" class="form-control" name="email_to">
                </div>
            </div>
            <div class="col-md-12">
                <label for="phone_to" class="col-md-4 control-label">Teléfono</label>
                <div class="col-md-8">
                    <input id="phone_to" type="string" class="form-control" name="phone_to">
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="col-md-12">
                <label for="width" class="control-label">Ancho</label>
                <input id="width" type="number" class="form-control" name="width">
            </div>
            <div class="col-md-12">
                <label for="length" class="control-label">Largo</label>
                <input id="length" type="number" class="form-control" name="length">
            </div>
            <div class="col-md-12">
                <label for="height" class="control-label">Alto</label>
                <input id="height" type="number" class="form-control" name="height">
            </div>
            <div class="col-md-12">
                <label for="weight" class="control-label">Peso</label>
                <input id="weight" type="number" class="form-control" name="weight">
            </div>
            <div class="col-md-12">
                <label for="description" class="control-label">Descripción</label>
                <input id="description" type="string" class="form-control" name="description">
            </div>
        </div>

        <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-primary">
                Continuar
            </button>
        </div>
    </form>


</body>
</html>
