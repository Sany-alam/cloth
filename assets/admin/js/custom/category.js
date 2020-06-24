$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $("#AddCategory").click(function() {
        if ($("#category-name").val().length > 0 && $("#category-domain").val().length > 0) {
            formdata = new FormData();
            formdata.append('category_name',$("#category-name").val());
            formdata.append('category_domain',$("#category-domain").val());
            $.ajax({
                processData:false,
                contentType:false,
                data:formdata,
                url:"category/add",
                type:"post",
                success:function(data) {
                    showCategoryAdmin();
                    $("#category-name").val("");
                    $("#category-domain").val("");
                    $("#category-domain[option='']").prop('selected',true);
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

    showCategoryAdmin();
    showDomainList()

    $("#UpdateCategory").click(function() {
        if ($("#update-category-name").val().length > 0) {
            formdata = new FormData();
            formdata.append('category_id',$("#update-category-id").val());
            formdata.append('category_name',$("#update-category-name").val());
            formdata.append('category_domain',$("#update-category-domain").val());
            $.ajax({
                processData:false,
                contentType:false,
                data:formdata,
                url:"category/update",
                type:"post",
                success:function(data) {
                    if (data.length !== 0) {
                        alert(data);
                    }
                    showCategoryAdmin();
                }
            })
        }
        else{
            alert("Fill category name");
        }
    });

});

function edit_category(id) {
    formdata = new FormData();
    formdata.append('category_id',id);
    $.ajax({
        processData:false,
        contentType:false,
        data:formdata,
        url:"category/edit",
        type:"post",
        success:function(data) {
            all = JSON.parse(data)
            $("#update-category-id").val(all.id);
            $("#update-category-name").val(all.name);
            $("#update-category-domain option[value='"+all.domain_id+"']").prop('selected', true)
            $("#UpdateCategoryModal").modal("show");
        }
    })
}

function showCategoryAdmin(){
    formdata = new FormData();
    $.ajax({
        processData:false,
        contentType:false,
        data:formdata,
        url:"category/show",
        type:"get",
        success:function(data) {
            $("#category-table").html(data);
        }
    })
}

function showDomainList(){
    formdata = new FormData();
    $.ajax({
        processData:false,
        contentType:false,
        data:formdata,
        url:"domain/list",
        type:"get",
        success:function(data) {
            $("#category-domain").html(data);
            $("#update-category-domain").html(data);
        }
    })
}

function delete_category(id) {
    var answer = window.confirm("All about this category will be deleted?")
    if (answer) {
        formdata = new FormData();
        formdata.append('category_id',id);
        $.ajax({
            processData:false,
            contentType:false,
            data:formdata,
            url:"category/delete",
            type:"post",
            success:function(data) {
                showCategoryAdmin();
            }
        })
    }
}