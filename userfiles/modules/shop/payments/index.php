<? $payment_options =  payment_options();  ?>
<? if(isarr($payment_options)) :?>
<script  type="text/javascript">
$(document).ready(function(){

    mw.$('.mw-payment-gateway-<? print $params['id']; ?> input').commuter(function() {

        mw.$('.mw-payment-gateway-selected-<? print $params['id']; ?> .module:first').attr('data-selected-gw',this.value);
        mw.load_module(''+this.value,'#mw-payment-gateway-selected-<? print $params['id']; ?>');
    });

});
</script>

<div class="well">
  <? if(count($payment_options) > 1): ?>
  <h2 style="margin-top: 0">Payment method</h2>
  <ul name="payment_gw" class="gateway-selector field-full mw-payment-gateway mw-payment-gateway-<? print $params['id']; ?>">
    <? foreach ($payment_options as $item) : ?>
        <? $mod_info = $item['module']; ?>
     <li>
        <label>
          <img src="<? print  $item['icon']; ?>" alt="" />
          <input type="radio" value="<? print  $item['gw_file']; ?>" name="p" />
          <? print  $item['name']; ?>
        </label>
     </li>
    <? endforeach; ?>
  </ul>




  <? endif; ?>
  <div id="mw-payment-gateway-selected-<? print $params['id']; ?>">


     <module type="<? print $payment_options[0]['gw_file'] ?>"  />
  </div>
  <? endif;?>
</div>
