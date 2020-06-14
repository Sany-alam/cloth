$(function() {
    CountCart();

    $('#quantity-add').click(function () {
        if ($("#quantity").val() < 3) {
        $("#quantity").val(+$("#quantity").val() + 1);
        }
    });
    $('#quantity-sub').click(function () {
        if ($("#quantity").val() > 1) {
        if ($("#quantity").val() > 1) $("#quantity").val(+$("#quantity").val() - 1);
        }
    });
})

function add_to_cart(id) {
    formdata = new FormData();
    formdata.append('id',id)
    $.ajax({
        processData:false,
        contentType:false,
        data:formdata,
        url:""+cartUrl+"/add",
        type:"post",
        success:function(data) {
            console.log(data);
            CountCart();
        }
    })
}


$("#add_to_cart").click(function() {
    if ($("#quantity").val().length > 0 && $("#id").val().length > 0 && $("#size").val().length > 0 && $("#color").val().length > 0) {
        formdata = new FormData();
        formdata.append('id',$("#id").val()),
        formdata.append('quantity',$("#quantity").val()),
        formdata.append('size',$("#size").val()),
        formdata.append('color',$("#color").val())
        $.ajax({
            processData:false,
            contentType:false,
            data:formdata,
            url:""+cartUrl+"/add",
            type:"post",
            success:function(data) {
                CountCart();
            }
        })
    }
    else{
        alert("Fill the input");
    }
});


function CountCart() {
    $.ajax({
        processData:false,
        contentType:false,
        url:""+cartUrl+"/count",
        type:"get",
        success:function(data) {
            if (data.length > 0) {
                $("#cart-count").html(data)
            }
            else{
                $("#cart-count").html("0")
            }
        }
    })
}


function AllClearCart() {
    $.ajax({
        processData:false,
        contentType:false,
        url:""+cartUrl+"/clear",
        type:"get",
        success:function(data) {
            if (data == "success") {
                CountCart();
            }
        }
    })
}