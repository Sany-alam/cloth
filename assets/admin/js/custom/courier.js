$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    showCouriar();

    $("#AddCourier").click(function () {
        name = $("#courier-name").val()
        email = $("#courier-email").val()
        phone = $("#courier-phone").val()
        formdata = new FormData();
        formdata.append('name',name);
        formdata.append('email',email);
        formdata.append('phone',phone);
        $.ajax({
            processData:false,
            contentType:false,
            data:formdata,
            url:"courier/add",
            type:"post",
            success:function(data) {
                $("#courier-name").val("")
                $("#courier-email").val("")
                $("#courier-phone").val("")
                showCouriar();
            }
        })
    })

    $("#UpdateCourier").click(function () {
        id = $("#hidden-courier-id").val()
        name = $("#update-courier-name").val()
        email = $("#update-courier-email").val()
        phone = $("#update-courier-phone").val()
        formdata = new FormData();
        formdata.append('id',id);
        formdata.append('name',name);
        formdata.append('email',email);
        formdata.append('phone',phone);
        $.ajax({
            processData:false,
            contentType:false,
            data:formdata,
            url:"courier/update",
            type:"post",
            success:function(data) {
                showCouriar();
                $("#UpdateCourierModal").modal('hide')
            }
        })
    })
})

function showCouriar() {
    formdata = new FormData();
    $.ajax({
        processData:false,
        contentType:false,
        data:formdata,
        url:"courier/show",
        type:"get",
        success:function(data) {
            $("#courier-table").html(data);
        }
    })
}

function delete_courier(id) {
    formdata = new FormData();
    $.ajax({
        processData:false,
        contentType:false,
        data:formdata,
        url:"courier/delete/"+id,
        type:"get",
        success:function(data) {
            showCouriar();
        }
    })
}


function edit_courier(id) {
    formdata = new FormData();
    $.ajax({
        processData:false,
        contentType:false,
        data:formdata,
        url:"courier/edit/"+id,
        type:"get",
        success:function(data) {
            a = JSON.parse(data);
            $("#hidden-courier-id").val(a.id)
            $("#update-courier-name").val(a.name)
            $("#update-courier-email").val(a.email)
            $("#update-courier-phone").val(a.phone)
            $("#UpdateCourierModal").modal('show')
        }
    })
}

