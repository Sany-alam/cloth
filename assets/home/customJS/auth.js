$("#register").click(function() {
    if ($("#remail").val().length != 0 && $("#rname").val().length != 0 && $("#rphone").val().length != 0 && $("#rpassword").val().length != 0) {
        formdata = new FormData();
        formdata.append('email',$("#remail").val());
        formdata.append('name',$("#rname").val());
        formdata.append('phone',$("#rphone").val());
        formdata.append('password',$("#rpassword").val());
        $.ajax({
            processData:false,
            contentType:false,
            data:formdata,
            url:userUrl+"/create",
            type:"post",
            success:function(data) {
                if (data == "success") {
                    $("#SignupModal").modal('hide');
                    alert("Successfully Registered! Login to start session")
                }
                else if(data == "login-first"){
                    $("#SignupModal").modal('hide');
                    $("#LoginModal").modal('show');
                }
                else{
                    $("#SignupModal").modal('hide');
                    alert("Already have an account! Login")
                }
            }
        })
    }
    else{
        alert("Fill up with your information");
    }
});

$("#login").click(function() {
    formdata = new FormData();
    remember = false;
    if ($("#lrememberme").prop('checked')) {
        remember = true;
    }
    formdata.append('remember',remember);
    formdata.append('email',$("#lemail").val());
    formdata.append('password',$("#lpassword").val());
    formdata.append('status',$("#status").val());
    $.ajax({
        processData:false,
        contentType:false,
        data:formdata,
        url:userUrl+"/login",
        type:"post",
        success:function(data) {
            if (data == "success") {
                $("#LoginModal").modal('hide');
                location.reload();
                alert("successfully loggedin");
            }
            else if(data == "go to checkout"){
                $("#status").val('');
                $("#LoginModal").modal('hide');
                location.href="checkout";
            }
            else if(data == "CredentialsProblem"){
                alert("Credentials Not valid");
            }
        }
    })
});
