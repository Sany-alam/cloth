$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $("#AddSubcategory").click(function() {
        if ($("#subcategory-name").val().length > 0 && $("#subcategory-category").val().length > 0) {
            formdata = new FormData();
            formdata.append('subcategory_name',$("#subcategory-name").val());
            formdata.append('subcategory_category',$("#subcategory-category").val());
            $.ajax({
                processData:false,
                contentType:false,
                data:formdata,
                url:"subcategory/add",
                type:"post",
                success:function(data) {
                    if (data.length !== 0) {
                        alert(data);
                    }
                    $("#subcategory-name").val("");
                    $("#subcategory-category").val("");
                    showSubcategoryAdmin();
                }
            })
        }
        else{
            alert("Fill input");
        }
    })

    showSubcategoryAdmin();
    showSubcategoryList();

    $("#UpdateSubcategory").click(function() {
        if ($("#update-subcategory-name").val().length > 0) {
            formdata = new FormData();
            formdata.append('subcategory_id',$("#update-subcategory-id").val());
            formdata.append('subcategory_name',$("#update-subcategory-name").val());
            formdata.append('subcategory_category',$("#update-subcategory-category").val());
            $.ajax({
                processData:false,
                contentType:false,
                data:formdata,
                url:"subcategory/update",
                type:"post",
                success:function(data) {
                    if (data.length !== 0) {
                        alert(data);
                    }
                    showSubcategoryAdmin();
                }
            })
        }
        else{
            alert("Fill Subcategory name");
        }
    });

});

function edit_subcategory(id) {
    formdata = new FormData();
    formdata.append('subcategory_id',id);
    $.ajax({
        processData:false,
        contentType:false,
        data:formdata,
        url:"subcategory/edit",
        type:"post",
        success:function(data) {
            all = JSON.parse(data)
            $("#update-subcategory-id").val(all.id);
            $("#update-subcategory-name").val(all.name);
            $("#update-subcategory-category option[value="+all.category_id+"]").prop('selected',true);
            $("#UpdateSubcategoryModal").modal("show");
        }
    })
}

function showSubcategoryAdmin(){
    formdata = new FormData();
    $.ajax({
        processData:false,
        contentType:false,
        data:formdata,
        url:"subcategory/show",
        type:"get",
        success:function(data) {
            $("#subcategory-table").html(data);
        }
    })
}

function showSubcategoryList(){
    formdata = new FormData();
    $.ajax({
        processData:false,
        contentType:false,
        data:formdata,
        url:"category/list",
        type:"get",
        success:function(data) {
            $("#subcategory-category").html(data);
            $("#update-subcategory-category").html(data);
        }
    })
}

function delete_subcategory(id) {
    var answer = window.confirm("All about this Subcategory will be deleted?")
    if (answer) {
        formdata = new FormData();
        formdata.append('subcategory_id',id);
        $.ajax({
            processData:false,
            contentType:false,
            data:formdata,
            url:"subcategory/delete",
            type:"post",
            success:function(data) {
                showSubcategoryAdmin();
            }
        })
    }
}