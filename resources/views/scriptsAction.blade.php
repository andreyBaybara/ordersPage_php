<script>
    $(document).ready(function () {
        $("#productsTable").dataTable({
                "paging": true
            }
        );
    });
</script>

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
<script>
    $('.nav-link').on('click', function () {
        // alert();
        for(var i = 0; i<1000; i++)
            console.log("asd");
    });
</script>

