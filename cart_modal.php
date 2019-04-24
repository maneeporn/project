<div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="cart_title" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cart_title">Cart</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form> 
        <div class="modal-body">
            <div class="container-fluid">
                <div class="show-cart"></div>
                <div class="float-right" style="margin-top: 2%;">
                    <input type="hidden" id="sum">
                    <p>Total price: <span class="total-cart"></span> THB</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="order"></a><button type="button" class="btn btn-light">Check out</button>
            <button type="button" class="clear-cart btn btn-light">Clear Cart</button>
            <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div> 

<div class="modal fade" id="cart_alert" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-body">
            <div class="container-fluid">
                <img id="pimg" class='img-fluid'>
                <p><i class="fas fa-plus-circle"></i> เพิ่ม <span id="pname"></span> (<span id="psize"></span>) ในรถเข็น<i class="fas fa-shopping-cart"></i></p>
            </div>
        </div>
    </div>
  </div>
</div> 
