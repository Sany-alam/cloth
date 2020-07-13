$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $("#AddDomain").click(function() {
        if ($("#domain-name").val().length > 0) {
            formdata = new FormData();
            formdata.append('domain_name',$("#domain-name").val());
            $.ajax({
                processData:false,
                contentType:false,
                data:formdata,
                url:"domain/add",
                type:"post",
                success:function(data) {
                    showDomainAdmin();
                    $("#domain-name").val("");
                    if (data.length !== 0) {
                        alert(data);
                    }
                }
            })
        }
        else{
            alert("Fill input");
        }
    })

    showDomainAdmin();

    $("#UpdateDomain").click(function() {
        if ($("#update-domain-name").val().length > 0) {
            formdata = new FormData();
            formdata.append('domain_id',$("#update-domain-id").val());
            formdata.append('domain_name',$("#update-domain-name").val());
            $.ajax({
                processData:false,
                contentType:false,
                data:formdata,
                url:"domain/update",
                type:"post",
                success:function(data) {
                    showDomainAdmin();
                    if (data.length !== 0) {
                        alert(data);
                    }
                }
            })
        }
        else{
            alert("Fill domain name");
        }
    });

});

function edit_domain(id) {
    formdata = new FormData();
    formdata.append('domain_id',id);
    $.ajax({
        processData:false,
        contentType:false,
        data:formdata,
        url:"domain/edit",
        type:"post",
        success:function(data) {
            all = JSON.parse(data)
            $("#update-domain-id").val(all.id);
            $("#update-domain-name").val(all.name);
            $("#UpdateDomainModal").modal("show");
        }
    })
}

function showDomainAdmin(){
    formdata = new FormData();
    $.ajax({
        processData:false,
        contentType:false,
        data:formdata,
        url:"domain/show",
        type:"get",
        success:function(data) {
            $("#domain-table").html(data);
        }
    })
}

function delete_domain(id) {
    answer = confirm("All products and categories will be deleted!");
    if (answer) {
        formdata = new FormData();
        formdata.append('domain_id',id);
        $.ajax({
            processData:false,
            contentType:false,
            data:formdata,
            url:"domain/delete",
            type:"post",
            success:function(data) {
                showDomainAdmin();
            }
        })
    }
}