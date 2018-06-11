@extends('layouts.mainApp')

@section('content')
    {{ Form::open(array('url' => action('ProductsController@postEditProduct'), 'method' => 'post', 'role' => 'form', 'class' => 'form-horizontal ch_form')) }}

    {{ Form::label('id', 'ID:') }}
    {{ Form::text('id', $product->id, array(
        'class' => 'form-control  col-sm-4',
        'readonly'=>'readonly'
    )) }}

    {{ Form::label('advert_id', 'Рекламодатель:') }}
    <br>
    {{ Form::select('advert_id', $adverts, array('class' => 'form-control col-sm-4')) }}
    <br>
    {{ Form::label('name', 'Название:') }}
    {{ Form::text('name', $product->name, array('class' => 'form-control col-sm-4')) }}


    {{ Form::label('price', 'Цена:') }}
    {{ Form::text('price', $product->price, array('class' => 'form-control col-sm-4')) }}


    {{Form::submit('Save')}}

    {{Form::close()}}

    <script type="text/javascript">
        //$('#id').attr('readonly', 'readonly');
    </script>
@endsection