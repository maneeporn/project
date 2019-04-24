$(document).ready(function() {
    // ************************************************
    // Shopping Cart API
    // ************************************************
    var shoppingCart = (function() {
        // =============================
        // Private methods and propeties
        // =============================
        cart = [];
        // Constructor
        function Item(product_id, product_name, picture1, product_price, size, count) {
            this.product_id = product_id;
            this.product_name = product_name;
            this.picture1 = picture1;
            this.product_price = product_price;
            this.size = size;
            this.count = count;
        }
        
        // Save cart
        function saveCart(action) {
          console.log('action: ' + action);
          $.ajax({ url: 'cart.php',
            data: {action: action},
            type: 'post',
            success: function(output) {
              console.log('output: ' + output);
            }
          });
          sessionStorage.setItem('shoppingCart', JSON.stringify(cart));
        }
        
          // Load cart
        function loadCart() {
          cart = JSON.parse(sessionStorage.getItem('shoppingCart'));
        }
    
        if (sessionStorage.getItem("shoppingCart") != null) {
          loadCart();
        }
        
      
        // =============================
        // Public methods and propeties
        // =============================
        var obj = {};
        
        // Add to cart
        obj.addItemToCart = function(product_id, product_name, picture1, product_price, size, count) {
          for(var item in cart) {
            if(cart[item].product_name === product_name && cart[item].size === size ) {
              cart[item].count ++;
              saveCart('add');
              return;
            }
          }
          var item = new Item(product_id, product_name, picture1, product_price, size, count);
          cart.push(item);
          saveCart('add');
        }
        // Set count from item
        obj.setCountForItem = function(product_name, size, count) {
          for(var i in cart) {
            if (cart[i].product_name === product_name && cart[i].size === size ) {
              cart[i].count = count;
              break;
            }
          }
          saveCart('setcount');
        };
      
        // Remove all items from cart
        obj.removeItemFromCartAll = function(product_name, size) {
          for(var item in cart) {
            if(cart[item].product_name === product_name && cart[item].size === size ) {
              cart.splice(item, 1);
              break;
            }
          }
          saveCart('remove');
        }
      
        // Clear cart
        obj.clearCart = function() {
          cart = [];
          saveCart('clear');
        }
      
        // Count cart 
        obj.totalCount = function() {
          var totalCount = 0;
          for(var item in cart) {
            totalCount += cart[item].count;
          }
          return totalCount;
        }
      
        // Total cart
        obj.totalCart = function() {
          var totalCart = 0;
          for(var item in cart) {
            totalCart += cart[item].product_price * cart[item].count;
          }
          return Number(totalCart.toFixed(2));
        }
      
        // List cart
        obj.listCart = function() {
          var cartCopy = [];
          for(i in cart) {
            item = cart[i];
            itemCopy = {};
            for(p in item) {
              itemCopy[p] = item[p];
      
            }
            itemCopy.total = Number(item.product_price * item.count).toFixed(2);
            cartCopy.push(itemCopy)
          }
          return cartCopy;
        }
      
        // cart : Array
        // Item : Object/Class
        // addItemToCart : Function
        // removeItemFromCartAll : Function
        // clearCart : Function
        // countCart : Function
        // totalCart : Function
        // listCart : Function
        // saveCart : Function
        // loadCart : Function
        return obj;
      })();
      
      
      // *****************************************
      // Triggers / Events
      // ***************************************** 
      // Add item
      $('#add_cart').click(function(event) {
        var product_id = $('#product_id').val();
        var product_name = $('#product_name').val();
        var product_price = $('#product_price').val();
        var picture1 = $('#picture1').val();
        var size = $('#size').val();
        shoppingCart.addItemToCart(product_id, product_name, picture1, product_price, size, 1);
        displayCart();
      });
      
      // Clear items
      $('.clear-cart').click(function() {
        shoppingCart.clearCart();
        displayCart();
      });
      
      
      function displayCart() {
        var cartArray = shoppingCart.listCart();
        var output = "";
        if(cartArray == '') {
            output ="<div class='row'>\
                        <div class='col-12'><h2>No products in cart.</h2></div>\
                    </div>";
        } else {
            $.each( cartArray, function( i, val ) {
                output +=
                    "<div class='row'>\
                        <div class='col-1'><img class='img-fluid' src='image/" + val.picture1 + "' ></div>\
                        <div class='col-4'><p>" + val.product_name + " (" + val.size + ")</p></div>\
                        <div class='col-2'><p>" + val.product_price + " THB</p></div>\
                        <div class='col-1'><input type='number' class='item-count form-control' data-name='" + val.product_name + "' data-size='" + val.size + "' value='" + val.count + "'></div>\
                        <div class='col-3'><p>Total = " + val.total + " THB</p></div>\
                        <div class='col-1 ml-auto'><button class='delete-item btn' data-name='" + val.product_name + "' data-size='" + val.size + "' ><i class='fas fa-trash-alt'></i></button></div>\
                    </div>";
            });
        }
        $('.show-cart').html(output);
        $('.total-cart').html(shoppingCart.totalCart());
        $('.product_count').html(shoppingCart.totalCount());
      }
      
      // Delete item button
      
      $('.show-cart').on("click", ".delete-item", function(event) {
        var name = $(this).data('name');
        var size = $(this).data('size');
        shoppingCart.removeItemFromCartAll(name, size);
        displayCart();
      })
      
      // Item count input
      $('.show-cart').on("change", ".item-count", function(event) {
        var name = $(this).data('name');
        var size = $(this).data('size');
        var count = Number($(this).val());
        shoppingCart.setCountForItem(name, size, count);
        displayCart();
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