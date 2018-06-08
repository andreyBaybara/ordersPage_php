@extends('layouts.mainApp')

@section('content')
    <form class="form-horizontal " role="form">
        <div class="form-group">
            {{ Form::open(array( 'role' => 'form', 'class' => 'ch_form')) }}

            <div class="row ">
                {{ Form::label('startDate', 'От:', ['class' => 'col-sm-2'] ) }}
                {{ Form::label('endtDate', 'До:', ['class' => 'col-sm-2']) }}
                {{ Form::label('order_state', 'Статус', ['class' => 'col-sm-2']) }}
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
                {{ Form::select('order_state', $order_state)}}
            </div>

            <div class="row">
                {{ Form::label('order_state', 'Телефон', ['class' => 'col-sm-3']) }}
                {{ Form::label('order_good', 'Товар', ['class' => 'col-sm-2']) }}
                {{ Form::label('id', 'ID заказа', ['class' => 'col-sm-2']) }}
            </div>

            <div class="row">
                {{ Form::text('order_client_phone', null, array(
                'name' => 'order_client_phone',
                'class' => 'form-control col-sm-2 ajaxRequest'
                )) }}
                <div class="col-sm-1">&nbsp;</div>

                {{ Form::text('order_good', null, array(
                'name' => 'order_good',
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


@section('scripts')
    <script>

        var table =  $("#ordersTable").DataTable();

        $.ajaxSetup(
            {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }
        );

        $(document).ready(function (e) {
            getOrders();
        });

        function getOrders() {
            var data = $('.ajaxRequest, #order_state').serialize();
            $.ajax(
                {
                    type: 'GET',
                    url: '/ajaxGetOrders',
                    dataType: 'json',
                    data: data,
                    success: function (data) {
                        console.log(data);
                        table.clear().draw();

                        $.each(data, function (index, value) {
                            table.row.add(
                                [
                                    value.id,
                                    value.order_add_time ,
                                    value.order_client_name,
                                    value.order_client_phone,
                                    value.goods.good_name+ "<br>("+value.goods.adverts.user_first_name +" "
                                    +value.goods.adverts.user_last_name+")"+"<br>"+value.goods.adverts.user_login
                                    ,
                                    value.states.state_name
                                ]
                            ).draw();
                        });
                    },
                    error: function (data) {
                        console.log(data);
                    }
                }
            );

        }

        $('#send').on('click', function () {
            getOrders();
        });
    </script>
@endsection









