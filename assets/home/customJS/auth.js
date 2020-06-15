$("#register").click(function() {
    formdata = new FormData();
    formdata.append('email',$("#remail").val());
    formdata.append('password',$("#rpassword").val());
    $.ajax({
        processData:false,
        contentType:false,
        data:formdata,
        url:userUrl+"/create",
        type:"post",
        success:function(data) {
            // alert(data);
            // // all = $.trim(data);
            if (data == "success") {
                $("#SignupModal").modal('hide');
                alert("Successfully Registered!")
                $("#LoginModal").modal('show');
            }
            else{
                $("#SignupModal").modal('hide');
                alert("Already have an account! Login")
                $("#LoginModal").modal('show');
            }
        }
    })
});

$("#login").click(function() {
    formdata = new FormData();
    formdata.append('email',$("#lemail").val());
    formdata.append('password',$("#lpassword").val());
    $.ajax({
        processData:false,
        contentType:false,
        data:formdata,
        url:userUrl+"/login",
        type:"post",
        success:function(data) {
            // alert(data);
            // all = $.trim(data);
            if (data == "success") {
                $("#LoginModal").modal('hide');
                alert("successfully loggedin");
            }
            else{
                alert(data);
                log(data);
            }
        }
    })
});


function placeOrder() {
    $.ajax({
        processData:false,
        contentType:false,
        url:cartUrl+"/order",
        type:"get",
        success:function(data) {
            alert(data);
            all = $.trim(data);
            if (all == "login-failed") {
                $("#LoginModal").modal('show');
            }
            else{
                // alert("Credentiols not matched!");
            }
        }
    })
}