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
            // // all = $.trim(data);
            if (data == "success") {
                $("#LoginModal").modal('hide');
            }
            else{
                alert("Credentiols not matched!");
            }
        }
    })
});