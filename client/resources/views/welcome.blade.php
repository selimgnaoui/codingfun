<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>


        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">



            @if (Route::has('login'))
                <div class="top-right links">
                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/register') }}">Register</a>
                </div>
            @endif

            <div class="content">
                {{ Form::open(['action' => 'HomeController@submitform'])  }}

                <div class="form-group">
                    {!! Form::label('stadt', 'city') !!}
                    {!! Form::text('city', '', ['class' => 'form-control','required'=>'required']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('24 Stunden offen', '24 Stunden offen') !!}
                    {!! Form::select('openedalways', array('true' => '24 stunden', 'false' => 'nicht 24 stunden')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('price', 'price') !!}
                    von  {!! Form::number('minprice', '', ['class' => 'form-control']) !!} bis {!! Form::number('maxprice', '', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('trainer', 'trainer') !!}
{!! Form::select('trainer', array('yes' => 'Ja', 'no' => 'Nein', 'onlynormaldays' => 'nur an Werktagen','onlyweekend' => 'nur an Wochenenden')) !!}
</div>


<button class="btn btn-success" type="submit">Lunch the Search ! </button>
                OR <a href="{{ url('/displayall') }}">Show All Studios</a>
                OR <a href="{{ url('/radiussearch') }}">Radius Search</a>


                {{ Form::close() }}
</div>
</body>
</html>
