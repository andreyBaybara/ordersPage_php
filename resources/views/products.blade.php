@extends('layouts.mainApp')

@section('content')
    <div class="col-md-11">
        <table id="productsTable" class="display" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th></th>
                <th>#</th>
                <th>Название</th>
                <th>Цена</th>
                <th>Рекламодатель</th>
                <th>Операции</th>
            </tr>
            </thead>
            <tbody id="tbodyProducts">
                @foreach($products as $product)
                    <tr>
                        <td><input type="checkbox"></td>
                        <td>{{$product->id}}</td>
                        <td>{{$product->good_name}}.<br> Внешний ID .{{$product->id}}</td>
                        <td>{{$product->good_price}}</td>
                        <td>{!!$product->adverts->user_first_name.' '.$product->adverts->user_last_name.'<br>'
                        .$product->adverts->user_login !!}</td>
                        <td><a href="{{"edit/".$product->id}}">Редактировать</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $("#productsTable").dataTable({
                    "paging": true
                }
            );
        });
    </script>
@endsection