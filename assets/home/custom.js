





function add_to_cart(id) {
    formdata = new FormData();
    $.ajax({
        processData:false,
        contentType:false,
        data:formdata,
        url:"card/add/product/"+id,
        type:"get",
        success:function(data) {
            alert(data);
        }
    })
}