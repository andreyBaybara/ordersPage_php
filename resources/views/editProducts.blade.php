@extends('layouts.mainApp')

@section('content')
    {{ Form::open(array('url' => action('EditProductController@postEditProduct'), 'method' => 'post', 'role' => 'form', 'class' => 'form-horizontal ch_form')) }}

    {{ Form::label('id', 'ID:') }}
    {{ Form::text('id', $product->id, array(
        'class' => 'form-control  col-sm-4',
        'readonly'=>'readonly'
    )) }}

    {{ Form::label('good_advert', 'Рекламодатель:') }}
    <br>
    {{ Form::select('good_advert', $adverts, array('class' => 'form-control col-sm-4')) }}
    <br>
    {{ Form::label('good_name', 'Название:') }}
    {{ Form::text('good_name', $product->good_name, array('class' => 'form-control col-sm-4')) }}


    {{ Form::label('good_price', 'Цена:') }}
    {{ Form::text('good_price', $product->good_price, array('class' => 'form-control col-sm-4')) }}


    {{Form::submit('Save')}}

    {{Form::close()}}

    <script type="text/javascript">
        //$('#id').attr('readonly', 'readonly');
    </script>
@endsection