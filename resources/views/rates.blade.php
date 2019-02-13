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
    <form method="POST" action="/purchaseShipment">
        <!-- Dirección de Origen -->
        <div class="col-md-6">
            <div class="col-md-12">
                <label for="name_from" class="col-md-4 control-label">Nombre</label>
                <div class="col-md-8">
                    <input id="name_from" type="string" class="form-control" name="name_from" value={{$from['name']}} disabled>
                </div>
            </div>
            <div class="col-md-12">
                <label for="street_from" class="col-md-4 control-label">Calle</label>
                <div class="col-md-8">
                    <input id="street_from" type="string" class="form-control" name="street_from" value={{$from['street']}} disabled>
                </div>
            </div>
            <div class="col-md-12">
                <label for="street2_from" class="col-md-4 control-label">Colonia</label>
                <div class="col-md-8">
                    <input id="street2_from" type="string" class="form-control" name="street2_from" value={{$from['street2']}} disabled>
                </div>
            </div>
            <div class="col-md-12">
                <label for="reference_from" class="col-md-4 control-label">Referencia</label>
                <div class="col-md-8">
                    <input id="reference_from" type="string" class="form-control" name="reference_from" value={{$from['reference']}} disabled>
                </div>
            </div>
            <div class="col-md-12">
                <label for="zipcode_from" class="col-md-4 control-label">Código Postal</label>
                <div class="col-md-8">
                    <input id="zipcode_from" type="string" class="form-control" name="zipcode_from" value={{$from['zipcode']}} disabled>
                </div>
            </div>
            <div class="col-md-12">
                <label for="email_from" class="col-md-4 control-label">Correo electrónico</label>
                <div class="col-md-8">
                    <input id="email_from" type="email" class="form-control" name="email_from" value={{$from['email']}} disabled>
                </div>
            </div>
            <div class="col-md-12">
                <label for="phone_from" class="col-md-4 control-label">Teléfono</label>
                <div class="col-md-8">
                    <input id="phone_from" type="string" class="form-control" name="phone_from" value={{$from['phone']}} disabled>
                </div>
            </div>

        </div>
        <!-- Dirección de Destino -->
        <div class="col-md-6">
            <div class="col-md-12">
                <label for="name_to" class="col-md-4 control-label">Nombre</label>
                <div class="col-md-8">
                    <input id="name_to" type="string" class="form-control" name="name_to" value={{$to['name']}} disabled>
                </div>
            </div>
            <div class="col-md-12">
                <label for="street_to" class="col-md-4 control-label">Calle</label>
                <div class="col-md-8">
                    <input id="street_to" type="string" class="form-control" name="street_to" value={{$to['street']}} disabled>
                </div>
            </div>
            <div class="col-md-12">
                <label for="street2_to" class="col-md-4 control-label">Colonia</label>
                <div class="col-md-8">
                    <input id="street2_to" type="string" class="form-control" name="street2_to" value={{$to['street2']}} disabled>
                </div>
            </div>
            <div class="col-md-12">
                <label for="reference_to" class="col-md-4 control-label">Referencia</label>
                <div class="col-md-8">
                    <input id="reference_to" type="string" class="form-control" name="reference_to" value={{$to['reference']}} disabled>
                </div>
            </div>
            <div class="col-md-12">
                <label for="zipcode_to" class="col-md-4 control-label">Código Postal</label>
                <div class="col-md-8">
                    <input id="zipcode_to" type="string" class="form-control" name="zipcode_to" value={{$to['zipcode']}} disabled>
                </div>
            </div>
            <div class="col-md-12">
                <label for="email_to" class="col-md-4 control-label">Correo electrónico</label>
                <div class="col-md-8">
                    <input id="email_to" type="email" class="form-control" name="email_to" value={{$to['email']}} disabled>
                </div>
            </div>
            <div class="col-md-12">
                <label for="phone_to" class="col-md-4 control-label">Teléfono</label>
                <div class="col-md-8">
                    <input id="phone_to" type="string" class="form-control" name="phone_to" value={{$to['phone']}} disabled>
                </div>
            </div>
        </div>

        <div class="col-md-12 text-center">
            <label for="rate_id" class="col-md-12 control-label">Selecciona una tarifa</label>
            <select id="rate_id" name="rate_id">
            @foreach($rates as $rate)
              <option  value="{{$rate['object_id']}}">${{$rate['amount']}} - {{$rate['servicelevel']}} - {{$rate['provider']}} </option>
            @endforeach
            </select>
            <input id="shipment_id" type="hidden" class="form-control" name="shipment_id" value={{$shipment_id}}>
        </div>

        <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-primary">
                Comprar envío
            </button>
        </div>
    </form>

</body>
</html>
