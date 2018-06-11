@extends('layouts.mainApp')

@section('content')
    <form class="form-horizontal " role="form">
        <div class="form-group">
            {{ Form::open(array( 'role' => 'form', 'class' => 'ch_form')) }}

            <div class="row ">
                {{ Form::label('startDate', 'От:', ['class' => 'col-sm-2'] ) }}
                {{ Form::label('endDate', 'До:', ['class' => 'col-sm-2']) }}
                {{ Form::label('state_id', 'Статус', ['class' => 'col-sm-2']) }}
            </div>
            <div class="row">
                {{ Form::text('startDate', null, array(
                    'name' => 'startDate',
                    'class' => 'form-control col-sm-1 ajaxRequest'
                )) }}
                <div class="col-sm-1">&nbsp;</div>

                {{ Form::text('endDate', null, array(
                    'name' => 'endDate',
                    'class' => 'form-control col-sm-1 col-sm-offset-2 ajaxRequest'
                )) }}
                <div class="col-sm-1">&nbsp;</div>
                {{ Form::select('state_id', $order_state)}}
            </div>

            <div class="row">
                {{ Form::label('state_id', 'Телефон', ['class' => 'col-sm-3']) }}
                {{ Form::label('good_id', 'Товар', ['class' => 'col-sm-2']) }}
                {{ Form::label('id', 'ID заказа', ['class' => 'col-sm-2']) }}
            </div>

            <div class="row">
                {{ Form::text('client_phone', null, array(
                'name' => 'client_phone',
                'class' => 'form-control col-sm-2 ajaxRequest'
                )) }}
                <div class="col-sm-1">&nbsp;</div>

                {{ Form::text('good_id', null, array(
                'name' => 'good_id',
                'class' => 'form-control col-sm-1 ajaxRequest'
                )) }}
                <div class="col-sm-1">&nbsp;</div>

                {{ Form::text('id', null, array(
                    'name' => 'id',
                    'class' => 'form-control col-sm-2 ajaxRequest'
                )) }}

                <div class="input-group col-sm-1">
                    <button id="send"  type="button" class="btn btn-primary">Показать</button>
                </div>
            </div>
            {{Form::close()}}
        </div>
    </form>
    <div class="row">
        <div class="col-md-11">
            <table id="ordersTable" class="display" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Дата</th>
                        <th>Клиент</th>
                        <th>Телефон</th>
                        <th>Товар</th>
                        <th>Статус</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    <!--Body for datatable-->
                </tbody>
            </table>
        </div>
    </div>
@endsection












