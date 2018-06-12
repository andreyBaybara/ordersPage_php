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
        var data = $('.ajaxRequest, #state_id').serialize();
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
                                value.add_time ,
                                value.client_name,
                                value.client_phone,
                                value.goods.name+ "<br>("+value.goods.adverts.first_name +" "
                                +value.goods.adverts.last_name+")"+"<br>"+value.goods.adverts.login
                                ,
                                value.states.name
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
    // Shorthand for
    $('#{{$navigation_id}}').addClass('active');
</script>