$(function() {
    showOrderQueueList();
})

function showOrderQueueList() {
    formdata = new FormData();
    $.ajax({
        processData:false,
        contentType:false,
        data:formdata,
        url:admin+"/order/queue/list",
        type:"get",
        success:function(data) {
            $("#order-table").html(data);

        }
    })
}

function productList(id) {
    pros(id);
    $("#ProductListModal").modal('show');
}

function pros(params) {
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

function acceptOrder(id) {
    formdata = new FormData();
    $.ajax({
        processData:false,
        contentType:false,
        data:formdata,
        url:admin+"/order/queue/accept/"+id,
        type:"get",
        success:function(data) {
            showOrderQueueList();
        }
    })
}

function rejectOrder(id) {
    formdata = new FormData();
    $.ajax({
        processData:false,
        contentType:false,
        data:formdata,
        url:admin+"/order/queue/reject/"+id,
        type:"get",
        success:function(data) {
            showOrderQueueList();
        }
    })
}
