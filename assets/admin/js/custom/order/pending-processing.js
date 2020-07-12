$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    selected_status='';
    $("#show-status option[value='pending']").prop('selected',true);
    selected_status = $("#show-status option:selected").val();
    $("#show-status").change(function() {
        selected_status = $("#show-status option:selected").val();
        showOrders()
    });

    showOrders()
})

function showOrders() {
    formdata = new FormData();
    $.ajax({
        processData:false,
        contentType:false,
        data:formdata,
        url:admin+"/order/pending-processing/"+selected_status,
        type:"get",
        success:function(data) {
            $("#order-table").html(data);
        }
    })
}

function productList(id) {
    productss(id);
    $("#ProductListModal").modal('show');
}

function productss(params) {
    formdata = new FormData();
    $.ajax({
        processData:false,
        contentType:false,
        data:formdata,
        url:admin+"/order/queue/product/list/"+params,
        type:"get",
        success:function(data) {
            $("#product-list").html(data);
        }
    })
}

function assign_courier(order_id) {
    formdata = new FormData();
    $.ajax({
        processData:false,
        contentType:false,
        data:formdata,
        url:admin+"/courier/list",
        type:"get",
        success:function(data) {
            $("#courier-list").html(data)
            $("#order-id").val(order_id)
            $("#AssignCourierModal").modal('show')
        }
    })
}

$("#AssignCourier").click(function () {
    if ($("#courier-list").val().length != 0 && $("#order-id").val().length != 0) {

        courier = $("#courier-list").val();
        order = $("#order-id").val();
        formdata = new FormData();
        formdata.append('courier',courier);
        formdata.append('order',order);
        $.ajax({
            processData:false,
            contentType:false,
            data:formdata,
            url:admin+"/order/pending-processing/assign-courier",
            type:"post",
            success:function(data) {
                showOrders()
                alert(data)
                console.log(data);

            }
        })
    }
})

function complete_order(order_id) {
    confirmation = confirm("Are you sure?");
    if (confirmation) {
        formdata = new FormData();
        $.ajax({
            processData:false,
            contentType:false,
            data:formdata,
            url:admin+"/order/pending-processing/completed/"+order_id,
            type:"get",
            success:function(data) {
                showOrders()
            }
        })
    }
}

