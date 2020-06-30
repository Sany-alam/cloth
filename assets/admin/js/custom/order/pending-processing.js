$(function() {
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
        url:"pending-processing/"+selected_status,
        type:"get",
        success:function(data) {
            $("#order-table").html(data);
        }
    })
}

// function productList(id) {
//     productss(id);
//     $("#ProductListModal").modal('show');
// }

// function productss(params) {
//     formdata = new FormData();
//     $.ajax({
//         processData:false,
//         contentType:false,
//         data:formdata,
//         url:admin+"/order/queue/product/list/"+params,
//         type:"get",
//         success:function(data) {
//             $("#product-list").html(data);
//         }
//     })
// }

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
