  //LOGIN SCRIPT
  $("#login_reg").on('submit', function(e){
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "includes/login.php",
        processData: false,
        cache: false,
        contentType: false,
        data: new FormData(this),
        success: function(response){
            $("#responseText").html(response);
        }
    });
});

  //Product Registration
  $("#product_reg").on('submit', function(e){
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "includes/add_product.php",
        processData: false,
        cache: false,
        contentType: false,
        data: new FormData(this),
        success: function(response){
            $("#responseText").html(response);
        }
    });
});

 //Add Stock
 $("#stock_reg").on('submit', function(e){
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "includes/add_stocks.php",
        processData: false,
        cache: false,
        contentType: false,
        data: new FormData(this),
        success: function(response){
            $("#responseText").html(response);
        }
    });
});

 //Add Sales
 $("#sales_reg").on('submit', function(e){
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "includes/add_sales.php",
        processData: false,
        cache: false,
        contentType: false,
        data: new FormData(this),
        success: function(response){
            $("#responseText").html(response);
        }
    });
});

  //ID FORM
  /*
  $("#id_form").on('submit', function(e){
    e.preventDefault();
    var this_id = $("#id_hidden").attr('name');
    alert(this_id);
    //ajaxCall(this_id);
});


function ajaxCall(this_id) {
    var data = 'id=' + this_id;
    alert(data);
    /*
    $.ajax({
        url: 'includes/remove_product.php',  
        type: "GET",    
        data: data,
        cache: false,
        success: function (response) {
            $('#responseText').html(response);
        }         
    });
}*/
