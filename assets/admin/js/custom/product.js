$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".tagify").tagify({
          // [regex] split tags by any of these delimiters ("null" to cancel)
          delimiters:',',
          // regex pattern to vali<a href="https://www.jqueryscript.net/time-clock/">date</a> input by.
          pattern:null,
          // maximum number of tags
          maxTags: Infinity,
          // exposed callbacks object to be triggered on certain events
          callbacks: {},
          // automatically adds the text which was inputed as a tag when blur event happens
          addTagOnBlur:true,
          // allow tuplicate tags
          duplicates:false,
          // is this list has any items, then only allow tags from this list
          whitelist: [],
          // a list of non-allowed tags
          blacklist: [],
          // should ONLY use tags allowed in whitelist
          enforceWhitelist:false,
          // tries to autocomplete the input's value while typing
          autoComplete:true,
          // String - when tags have multiple properties, and for each tag another property should be used besides the "value"

          ValueToProp:"",
          dropdown: {
            classname: '',
            enabled: 2,// minimum input characters needs to be typed for the dropdown to show
            maxItems: 10
          }
        });
        $(".select2").select2();

    $("#AddProduct").click(function() {
        if ($("#product-name").val().length > 0 && $("#product-price").val().length > 0 && $("#product-images").val().length > 0 && $("#product-subcategory").val().length > 0 && $("#product-size").val().length > 0 && $("#product-color").val().length > 0) {

        var product_fina_color = '';
        if ($("#product-color").val().length !== 0) {
            var product_color = $("#product-color").val();
            product_color = JSON.parse(product_color);
            var loop_count = Object.keys(product_color).length;
            for (var i=0 ; i<loop_count; i++)
            {
                product_fina_color +=product_color[i].value+",";
            }
            product_fina_color = product_fina_color.replace(/,\s*$/, ""); //remove last commma;
        }

        var product_fina_size = '';
        if ($("#product-size").val().length !== 0) {
            var product_size = $("#product-size").val();
            product_size = JSON.parse(product_size);
            var loop_count = Object.keys(product_size).length;
            for (var i=0 ; i<loop_count; i++)
            {
                product_fina_size +=product_size[i].value+",";
            }
            product_fina_size = product_fina_size.replace(/,\s*$/, ""); //remove last commma;
        }

            formdata = new FormData();
            formdata.append('product_name',$("#product-name").val());
            formdata.append('product_price',$("#product-price").val());
            formdata.append('product_subcategory',$("#product-subcategory").val());
            formdata.append('product_brand',$("#product-brand").val());
            formdata.append('product_size',product_fina_size);
            formdata.append('product_weight',$("#product-weight").val());
            formdata.append('product_fabric',$("#product-fabric").val());
            formdata.append('product_color',product_fina_color);
            formdata.append('product_description',$("#product-description").val());
            for (var i = 0; i < $("#product-images").get(0).files.length; ++i) {
                formdata.append('product_images[]', $("#product-images").get(0).files[i]);
            }
            $.ajax({
                processData:false,
                contentType:false,
                data:formdata,
                url:"product/add",
                type:"post",
                cache: false,
                success:function(data) {
                    $("#product-name").val('');

                    $("#product-size").val('');
                    y = $("#product-size").data('tagify');
                    y.removeAllTags();

                    $("#product-color").val('');
                    z = $("#product-color").data('tagify');
                    z.removeAllTags();
                    
                    $("#product-price").val('');

                    $("#product-subcategory").val(null).trigger('change');

                    $("#product-brand").val('');
                    $("#product-weight").val('');
                    $("#product-fabric").val('');
                    $("#product-description").val('');
                    $("#product-images").val('');
                    showProductAdmin();
                }
            })
        }
        else{
            alert("Name, Size, Image, Category And Color are Required field.");
        }
    })

    showProductAdmin();
    SubcategoryList();


    $("#UpdateProduct").click(function(){
        if ($("#update-product-name").val().length > 0 && $("#update-product-price").val().length > 0) {
            formdata = new FormData();
            formdata.append('product_id',$("#update-product-id").val());
            formdata.append('product_name',$("#update-product-name").val());
            formdata.append('product_category',$("#update-product-category").val());
            formdata.append('product_price',$("#update-product-price").val());
            formdata.append('product_brand',$("#update-product-brand").val());
            formdata.append('product_size',$("#update-product-size").val());
            formdata.append('product_weight',$("#update-product-weight").val());
            formdata.append('product_fabric',$("#update-product-fabric").val());
            formdata.append('product_color',$("#update-product-color").val());
            formdata.append('product_description',$("#update-product-description").val());
            $.ajax({
                processData:false,
                contentType:false,
                data:formdata,
                url:"product/update",
                type:"post",
                cache: false,
                success:function(data) {
                    showProductAdmin();
                    alert(data);
                }
            })
        }
        else{
            alert("Fill none default inputs");
        }
    });

    $("#UpdateProductImage").click(function() {
        formdata = new FormData();
        formdata.append('product_id',$("#update-product-image-id").val());
        // formdata.append('product_new_image',$("#")[0].files[0]);
        for (var i = 0; i < $("#new-product-image").get(0).files.length; ++i) {
            formdata.append('product_new_image[]', $("#new-product-image").get(0).files[i]);
        }
        $.ajax({
            processData:false,
            contentType:false,
            data:formdata,
            url:"product/img/new/upload",
            type:"post",
            success:function(data) {
                $("#new-product-image").val("");
                images_modal();
                showProductAdmin();
            }
        })
    });

});  // JQuery function ends here


function stock(id,status) {
    formdata = new FormData();
    formdata.append('product_id',id);
    formdata.append('product_stock',status);
    $.ajax({
        processData:false,
        contentType:false,
        data:formdata,
        url:"product/stock",
        type:"post",
        success:function(data) {
            showProductAdmin();
            if (data == 0) {
                alert("In Stock assigned")
            }
            else{
                alert("Out of Stock assigned")
            }
        }
    })
}

function SubcategoryList() {
    formdata = new FormData();
    $.ajax({
        processData:false,
        contentType:false,
        data:formdata,
        url:"subcategory/list",
        type:"get",
        success:function(data) {
            
            $("#product-subcategory").html(data);
            $("#update-product-subcategory").html(data);
        }
    })
}

function showProductAdmin(){
    formdata = new FormData();
    $.ajax({
        processData:false,
        contentType:false,
        data:formdata,
        url:"product/show",
        type:"get",
        success:function(data) {
            $("#product-table").html(data);
        }
    })
}

function delete_product(id) {
    con = confirm("Are you sure to delete this product?");
    if (con) {
        formdata = new FormData();
        formdata.append('product_id',id);
        $.ajax({
            processData:false,
            contentType:false,
            data:formdata,
            url:"product/delete",
            type:"post",
            success:function(data) {
                showProductAdmin();
                alert(data);
            }
        })
    }
}


function edit_product(id) {
    formdata = new FormData();
    formdata.append('product_id',id);
    $.ajax({
        processData:false,
        contentType:false,
        data:formdata,
        url:"product/edit",
        type:"post",
        success:function(data) {
            all = JSON.parse(data);
            $("#update-product-id").val(all.id);
            $("#update-product-name").val(all.name);
            $("#update-product-category option[value="+all.category_id+"]").prop('selected', true);
            $("#update-product-price").val(all.price);
            $("#update-product-color").val(all.color);
            $("#update-product-brand").val(all.brand);
            $("#update-product-size").val(all.size);
            $("#update-product-weight").val(all.weight);
            $("#update-product-fabric").val(all.fabric);
            $("#update-product-description").val(all.description);
            $("#updateProductModal").modal('show');
        }
    })
}

function edit_product_image(id) {
    $("#update-product-image-id").val(id);
    $("#updateProductImageModal").modal('show');
    images_modal()
}

function images_modal() {
    formdata = new FormData();
    formdata.append('product_id',$("#update-product-image-id").val());
    $.ajax({
        processData:false,
        contentType:false,
        data:formdata,
        url:"product/img",
        type:"post",
        success:function(data) {
            $("#old-product-images").html(data);
        }
    })
}

function delete_single_image(id) {
    formdata = new FormData();
    formdata.append('image_id',id);
    formdata.append('product_id',$("#update-product-image-id").val());
    $.ajax({
        processData:false,
        contentType:false,
        data:formdata,
        url:"product/single/img",
        type:"post",
        success:function(data) {
            images_modal();
            showProductAdmin();
        }
    })
}