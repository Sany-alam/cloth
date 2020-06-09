$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // && $("#banner-title").val().length > 0
    $("#AddBanner").click(function() {
        if ($("#banner-image").val().length > 0) {
            formdata = new FormData();
            formdata.append('banner_title',$("#banner-title").val());
            formdata.append('banner_description',$("#banner-description").val());
            formdata.append('banner_image',$("#banner-image")[0].files[0]);
            $.ajax({
                processData:false,
                contentType:false,
                data:formdata,
                url:"banner/add",
                type:"post",
                success:function(data) {
                    showbannerAdmin();
                    $("#banner-title").val("");
                    $("#banner-image").val("");
                    $("#banner-description").val("")
                    $("#show-banner-image").fadeIn("slow").attr("src","");
                }
            })
        }
        else{
            alert("image neccessery");
        }
    })

    showbannerAdmin();

    $("#UpdateBanner").click(function() {
        formdata = new FormData();
        formdata.append('banner_id',$("#update-banner-id").val());
        formdata.append('banner_title',$("#update-banner-title").val());
        formdata.append('banner_description',$("#update-banner-description").val());
        formdata.append('banner_image',$("#update-banner-image")[0].files[0]);
        $.ajax({
            processData:false,
            contentType:false,
            data:formdata,
            url:"banner/update",
            type:"post",
            success:function(data) {
                showbannerAdmin();
                alert(data);
            }
        })
    });

    $("#banner-image").change(function(e) {
        img = URL.createObjectURL(e.target.files[0]);
        $("#show-banner-image").fadeIn("slow").attr("src",img);
    });

    $("#update-banner-image").change(function(e) {
        img = URL.createObjectURL(e.target.files[0]);
        $("#edit-banner-image").fadeIn("slow").attr("src",img);
    });

});

function edit_banner(id) {
    formdata = new FormData();
    formdata.append('banner_id',id);
    $.ajax({
        processData:false,
        contentType:false,
        data:formdata,
        url:"banner/edit",
        type:"post",
        success:function(data) {
            all = JSON.parse(data)
            $("#update-banner-id").val(all.id);
            $("#update-banner-title").val(all.title);
            $("#update-banner-description").val(all.description);
            $("#edit-banner-image").attr("src","../storage/app/public/banner/"+all.image);
            $("#UpdateBannerModal").modal("show");
        }
    })
}

function showbannerAdmin(){
    formdata = new FormData();
    $.ajax({
        processData:false,
        contentType:false,
        data:formdata,
        url:"banner/show",
        type:"get",
        success:function(data) {
            console.log(data);
            all = JSON.parse(data);
            if (all.indicator.length > 0) {
                $("#banner-indicator").html(all.indicator);
                $("#banner-items").html(all.banner);
                $("#carouselExampleCaptions").show();
            }
            else{
                $("#carouselExampleCaptions").hide();
            }
        }
    })
}

function delete_banner(id) {
    var answer = window.confirm("Are you sure to delete this banner?")
    if (answer) {
        formdata = new FormData();
        formdata.append('banner_id',id);
        $.ajax({
            processData:false,
            contentType:false,
            data:formdata,
            url:"banner/delete",
            type:"post",
            success:function(data) {
                showbannerAdmin();
                alert(data);
            }
        })
    }
}