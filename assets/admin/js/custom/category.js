$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $("#AddCategory").click(function() {
        if ($("#category-name").val().length > 0 && $("#category-image").val().length > 0) {
            formdata = new FormData();
            formdata.append('category_name',$("#category-name").val());
            formdata.append('category_image',$("#category-image")[0].files[0]);
            $.ajax({
                processData:false,
                contentType:false,
                data:formdata,
                url:"category/add",
                type:"post",
                success:function(data) {
                    showCategoryAdmin();
                    $("#category-name").val("");
                    $("#category-image").val("");
                }
            })
        }
        else{
            alert("Fill input");
        }
    })

    showCategoryAdmin();

    $("#UpdateCategory").click(function() {
        if ($("#update-category-name").val().length > 0) {
            formdata = new FormData();
            formdata.append('category_id',$("#update-category-id").val());
            formdata.append('category_name',$("#update-category-name").val());
            formdata.append('category_image',$("#update-category-image")[0].files[0]);
            $.ajax({
                processData:false,
                contentType:false,
                data:formdata,
                url:"category/update",
                type:"post",
                success:function(data) {
                    showCategoryAdmin();
                    alert(data);
                }
            })
        }
        else{
            alert("Fill category name");
        }
    });

    $("#update-category-image").change(function(e) {
        img = URL.createObjectURL(e.target.files[0]);
        $("#edit-category-image").fadeIn("slow").attr("src",img);
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
            $("#edit-category-image").attr("src","../storage/app/public/category/"+all.image);
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

function delete_category(id) {
    var answer = window.confirm("All post and images about this category will be deleted?")
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
                alert(data);
            }
        })
    }
}