<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <?php $sub=Cart::subtotal()+Cart::tax();?>
        <?php 
        if($sub !=0 )
        {
            $excludeTaxAmount=Cart::subtotal()*(Cart::subtotal()/$sub);
        ?>
    <div class="container">
         <div class="row">
            <div class="col-md-12 mt-2 mb-2">
               <h3 class="text-center">Checkout</h3><hr>
            </div>            
            <div class="col-md-12 mt-2 mb-2">
               <pre id="res_token"></pre>
            </div>
         </div>
         <div class="row">
            <div class="col-md-4 offset-md-4">

                <div class="form-group">
                  <label class="label">Pay Amount</label>
                  <input type="text" name="amount" disabled class="form-control amount" value="{{round($excludeTaxAmount,2)+round($excludeTaxAmount*.2,2)}}">
                </div>
                <button type="button" class="btn btn-primary btn-block">Pay <i class="fas fa-pound-sign"></i> ({{round($excludeTaxAmount,2)+round($excludeTaxAmount*.2,2)}})</button>
            </div>
         </div>
      </div>
      <?php }?>
</div>
