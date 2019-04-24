$(document).ready(function() {
// ************************************************
// Shopping Cart API
// ************************************************
var shoppingCart = (function() {
    // =============================
    // Private methods and propeties
    // =============================
    cart = [];
    
    // Save cart
    function saveCart(action, product_id, size, count) {
      var qty = count;
      var product_size = size;
      var user_id = 1;
      $.ajax({ url: 'cart.php',
        data: {
          action: action,
          product_id: product_id,
          product_size: product_size,
          qty: qty,
          user_id: user_id
        },
        type: 'post',
        success: function(output) {
          console.log('output: ' + output);
          displayCart();
        }
      });
    }
  
    // =============================
    // Public methods and propeties
    // =============================
    var obj = {};
    
    // Add to cart
    obj.addItemToCart = function(product_id, size, count) {
      saveCart('add', product_id, size, count);
    }
    // Set count from item
    // TODO:
    obj.setCountForItem = function(product_id, count) {
      saveCart('setcount', product_id, '', size, count);
    };
  
    // Remove all items from cart
    obj.removeItemFromCartAll = function(product_id, size) {
      saveCart('remove', product_id, '', size, '');
    }
  
    // Clear cart
    // TODO:
    obj.clearCart = function() {
      saveCart('clear');
    }
  
    // cart : Array
    // Item : Object/Class
    // addItemToCart : Function
    // removeItemFromCartAll : Function
    // clearCart : Function
    // saveCart : Function
    return obj;
  })();
  
  function displayCart() {
    
    var user_id = 1;
    console.log('get_cart_data');
    $.ajax({ url: 'cart.php',
      data: {
        action: 'get_cart_data',
        user_id: user_id
      },
      type: 'post',
      success: function(res) {
        var output = "";
        if(res == 'empty') {
            output ="<div class='row'>\
                        <div class='col-12'><h2>No products in cart.</h2></div>\
                    </div>";
        } else {
            data = JSON.parse(res);
            $.each( data, function( i, val ) {
                output +=
                    "<div class='row'>\
                        <div class='col-1'><img class='img-fluid' src='image/" + val.picture1 + "' ></div>\
                        <div class='col-4'><p>" + val.product_name + " (" + val.product_size + ")</p></div>\
                        <div class='col-2'><p>" + val.total + " THB</p></div>\
                        <div class='col-1'><input type='number' class='item-count form-control' data-id='" + val.product_id + "'  data-size='" + val.product_size + "' value='" + val.qty + "'></div>\
                        <div class='col-3'><p>Total = " + val.total + " THB</p></div>\
                        <div class='col-1 ml-auto'><button class='delete-item btn' data-id='" + val.product_id + "' data-size='" + val.product_size + "' ><i class='fas fa-trash-alt'></i></button></div>\
                    </div>";
            });
        }
        $('.show-cart').html(output);
        $('.total-cart').html(1);
        $('.product_count').html(1);
      }
    });
  }
  
  // *****************************************
  // Triggers / Events
  // ***************************************** 
  // Add item
  $('#add_cart').click(function(event) {
    var product_id = $('#product_id').val();
    var size = $('#size').val();
    shoppingCart.addItemToCart(product_id, size, 1);
  });
  
  // Clear items
  $('.clear-cart').click(function() {
    shoppingCart.clearCart();
  });
  
  // Delete item button
  $('.show-cart').on("click", ".delete-item", function(event) {
    var id = $(this).data('id');
    var size = $(this).data('size');
    shoppingCart.removeItemFromCartAll(id, size);
  })
  
  // Item count input
  $('.show-cart').on("change", ".item-count", function(event) {
    var id = $(this).data('id');
    var count = Number($(this).val());
    shoppingCart.setCountForItem(id, count);
  });
  
  displayCart();
  
  $('#add_cart').click(function() {
    var picture1 = $('#picture1').val();
    $("#pimg").attr("src","image/" + picture1);
    $('#pname').text($('#product_name').val());
    $('#psize').text($('#size').val());
    $('#cart_alert').modal('show');
    setTimeout(function(){ $('#cart_alert').modal('hide'); }, 2000);
  })
});