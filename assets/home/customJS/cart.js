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
                $("#LoginModal").modal('show');
            }
        }
    })

});


function placeOrder() {
    data = new FormData();
    data.append('name',$("#name").val());
    data.append('address',$("#address").val());
    data.append('city',$("#city").val());
    data.append('state',$("#state").val());
    data.append('postcode',$("#postcode").val());
    data.append('email',$("#email").val());
    data.append('phone',$("#phone").val());
    data.append('note',$("#note").val());
    account = false;
    if ($("#account").is(":checked")) {
        account = true;
    }
    data.append('account',account);
    data.append('payment',$("[name='payment_method']:checked").val());
    $.ajax({
        processData:false,
        contentType:false,
        url:""+cartUrl+"/order",
        type:"post",
        data:data,
        success:function(data) {
            console.log(data);

        }
    })
}
