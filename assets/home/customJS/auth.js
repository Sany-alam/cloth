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
