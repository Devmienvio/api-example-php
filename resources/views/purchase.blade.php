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
    <div class="col-md-6">
        <h2>Purchase # {{$purchase['object_id']}}</h2>
        <!-- Purchase info -->
        <div class="col-md-12">
            @foreach($purchase as $key => $value)
                @if(!is_array($value))
                    <div class="col-md-12">
                        <label for="{{$key}}" class="col-md-4 control-label">{{$key}}</label>
                        <div class="col-md-8">
                            @if(is_null($value))
                            <input id="{{$key}}" type="string" class="form-control" name="name_from" value='null' disabled>
                            @elseif(is_bool($value))
                                <input id="{{$key}}" type="string" class="form-control" name="name_from" value="{{($value) ? 'true' : 'false'}}" disabled>
                            @else
                            <input id="{{$key}}" type="string" class="form-control" name="name_from" value="{{$value}}" disabled>
                            @endif
                        </div>
                    </div>
                @endif
            @endforeach

        </div>
        <!-- Shipment info (measures and description) -->
        <div class="col-md-12">
            <h2>Shipment # {{$shipment['object_id']}}</h2>
            @foreach($shipment as $key => $value)
                @if(!is_array($value))
                    <div class="col-md-12">
                        <label for="{{$key}}" class="col-md-4 control-label">{{$key}}</label>
                        <div class="col-md-8">
                            @if(is_null($value))
                            <input id="{{$key}}" type="string" class="form-control" name="name_from" value='null' disabled>
                            @elseif(is_bool($value))
                                <input id="{{$key}}" type="string" class="form-control" name="name_from" value="{{($value) ? 'true' : 'false'}}" disabled>
                            @else
                            <input id="{{$key}}" type="string" class="form-control" name="name_from" value="{{$value}}" disabled>
                            @endif
                        </div>
                    </div>
                @endif
            @endforeach

        </div>
    </div>
    <div class="col-md-6">
        <!-- Shipment relations info-->
        <div class="col-md-12">
            @foreach($shipment as $key => $value)
                @if(is_array($value))
                    <h2> {{$key}} </h2>
                    @foreach($value as $key => $value)

                        <div class="col-md-12">
                            <label for="{{$key}}" class="col-md-4 control-label">{{$key}}</label>
                            <div class="col-md-8">
                                @if(is_null($value))
                                <input id="{{$key}}" type="string" class="form-control" name="name_from" value='null' disabled>
                                @elseif(is_bool($value))
                                    <input id="{{$key}}" type="string" class="form-control" name="name_from" value="{{($value) ? 'true' : 'false'}}" disabled>
                                @else
                                <input id="{{$key}}" type="string" class="form-control" name="name_from" value="{{$value}}" disabled>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @endif

            @endforeach

        </div>
    </div>


</body>
</html>
