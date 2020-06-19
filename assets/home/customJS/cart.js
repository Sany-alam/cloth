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
            CountCart();
            if (data.length != 0 && typeof(data) !== Object) {
                alert(data);
            }
        }
    })
}


$("#add_to_cart").click(function() {
    if ($("#quantity").val().length > 0 && $("#id").val().length > 0 && $("#size").val().length > 0) {
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
                if (data.length !== 0) {
                    alert(data);
                }
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
            $(".cart-count").html(data);
            CartList();
        }
    })
}

function CartList() {
    $.ajax({
        processData:false,
        contentType:false,
        url:""+cartUrl+"/list",
        type:"get",
        success:function(data) {
            $("#cart-list").html(data);
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

function clearSingleProduct(id,index) {
    $.ajax({
        processData:false,
        contentType:false,
        url:""+cartUrl+"/clear/single/"+id+"/"+index,
        type:"get",
        success:function(data) {
            CountCart();
        }
    })
}


$("#checkout").click(function(){
    qty = [];
    $("[name='quantity[]']").each(function(){
        qty.push($(this).val());
    })
    if (qty.length > 0) {
        data = new FormData();
        data.append('qty',qty);
        $.ajax({
            processData:false,
            contentType:false,
            url:""+cartUrl+"/checkout",
            type:"post",
            data:data,
            success:function(data) {
                CountCart();
                if (data === "done") {
                    location.href='checkout';
                }
                else if(data === "login-failed"){
                    $("#status").val("GoToCheckout");
                    $("#LoginModal").modal('show');
                }
            }
        })
    }
    else{
        alert("Shopping something");
    }

});


$("#placeOrder").click(function () {
    if ($("#address").val().length !== 0) {
        a = confirm("Are you sure to payment method?");
        if ($("#note").val().length == 0) {
            alert("Note field is empty");
        }
        if (a) {
            data = new FormData();
            data.append('address',$("#address").val());
            data.append('note',$("#note").val());
            data.append('payment',$("[name='payment_method']:checked").val());
            $.ajax({
                processData:false,
                contentType:false,
                url:""+cartUrl+"/order",
                type:"post",
                data:data,
                success:function(data) {
                    alert(data);
                    location.href=homeRoute;
                }
            })
        }
    }
    else{
        alert("Fillup address");
    }
});
