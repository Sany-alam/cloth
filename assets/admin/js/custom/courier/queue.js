$(function() {
    showCouriarQueueList();
})

function showCouriarQueueList() {
    formdata = new FormData();
    $.ajax({
        processData:false,
        contentType:false,
        data:formdata,
        url:admin+"/courier/queue/list",
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

function assign_couriar(id) {
    $("#order-id").val(id);
    $("#CourierAssignModal").modal('show');
}

$("#save-courier").click(function () {
    id = $("#order-id").val();
    name = $("#name").val();
    email = $("#email").val();
    phone = $("#phone").val();
    formdata = new FormData();
    formdata.append('id',id);
    formdata.append('name',name);
    formdata.append('email',email);
    formdata.append('phone',phone);
    $.ajax({
        processData:false,
        contentType:false,
        data:formdata,
        url:admin+"/courier/queue/assign/",
        type:"post",
        success:function(data) {
            showCouriarQueueList();
        }
    })
});

// function acceptOrder(id) {
//     formdata = new FormData();
//     $.ajax({
//         processData:false,
//         contentType:false,
//         data:formdata,
//         url:admin+"/order/queue/accept/"+id,
//         type:"get",
//         success:function(data) {
//             showOrderQueueList();
//         }
//     })
// }

// function rejectOrder(id) {
//     formdata = new FormData();
//     $.ajax({
//         processData:false,
//         contentType:false,
//         data:formdata,
//         url:admin+"/order/queue/reject/"+id,
//         type:"get",
//         success:function(data) {
//             showOrderQueueList();
//         }
//     })
// }
