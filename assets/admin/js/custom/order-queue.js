

$(function() {
    formdata = new FormData();
    $.ajax({
        processData:false,
        contentType:false,
        data:formdata,
        url:admin+"/order/queue/list",
        type:"get",
        success:function(data) {
            console.log(data);
            $("#order-table").html(data);

        }
    })
})


function orderList(id) {
    // alert(id);
    // $("#order-list").html('show');
    $("#ProductListModal").modal('show');
}
