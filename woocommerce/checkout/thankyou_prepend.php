<?php
/** @var OvistoWoo $ovistoWoo */
$ovistoWoo = $GLOBALS['ovisto_woo'];

/** @var OvistoSettings $ovistoSettings */
$ovistoSettings = $ovistoWoo->get_settings();

$orderId = get_query_var('order-received');
$order = wc_get_order( $orderId );


//OVISTO BANNER CODE BEGIN
if ($ovistoSettings->getIsActive()) :

    $user_id = get_current_user_id();

    $your_country = $ovistoSettings->getCountry(); ?>
    <h3 style='<?php echo $ovistoSettings->getBannerHeadingCSS();?>'><?php echo $ovistoSettings->getBannerHeading();?></h3>
    <div id="ovistoBanner" style='<?php echo $ovistoSettings->getBannerCSS();?>'>
        <script type="text/javascript">
            var _ovtp = _ovtp || [];
            _ovtp.push(['ovt_partner_id', '<?php echo $ovistoSettings->getPartnerID(); ?>']);
            _ovtp.push(['cust_salutation', '']);
            _ovtp.push(['cust_firstname', '<?php echo $order->billing_first_name; ?>']);
            _ovtp.push(['cust_lastname', '<?php echo $order->billing_last_name; ?>']);
            _ovtp.push(['cust_email', '<?php echo $order->billing_email; ?>']);
            _ovtp.push(['order_datetime', '<?php echo $order->order_date; ?>']);
            _ovtp.push(['order_id', '<?php echo $order->id; ?>']);
            _ovtp.push(['order_amount', '<?php echo $order->get_total(); ?>']);
            _ovtp.push(['order_curr', '<?php echo $order->order_currency; ?>']);
            _ovtp.push(['order_coupon', '<?php echo implode(',', $order->get_used_coupons()); ?>']);
            _ovtp.push(['payment_method', '<?php echo $order->payment_method; ?>']);
            _ovtp.push(['birthday', '']);
            _ovtp.push(['birthday_year', '']);
            _ovtp.push(['phone_number', '<?php echo $order->billing_phone; ?>']);
            _ovtp.push(['fax_number', '']);
            _ovtp.push(['mobile_number', '']);
            _ovtp.push(['street', '<?php echo $order->billing_address_1; ?>']);
            _ovtp.push(['cust_city', '<?php echo $order->billing_city; ?>']);
            _ovtp.push(['cust_zip', '<?php echo $order->billing_postcode; ?>']);
            _ovtp.push(['house_no', '']);
            _ovtp.push(['county', '<?php echo $order->billing_city; ?>']);
            _ovtp.push(['country', '<?php echo $order->billing_country; ?>']);
            _ovtp.push(['customer_status', '<?php echo $ovistoSettings->getUserData($user_id); ?>']);
            _ovtp.push(['banner_element', '<?php echo $ovistoSettings->getTargetDiv(); ?>']);
            _ovtp.push(['banner_hide', '<?php echo $ovistoSettings->isBannerHidden(); ?>']);

            (function() {
                var ovt = document.createElement('script'); ovt.type = 'text/javascript'; ovt.async = true;
                <?php if($your_country == 'de') :?>
                ovt.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'partner.ovisto.com.au/js/client.js';
                <?php elseif($your_country == 'au'):?>
                ovt.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'partner.ovisto.com.au/js/client.js';
                <?php endif;?>
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ovt, s);
            })();
        </script>
    </div>
    <br>
    <hr>
<?php endif;
//OVISTO BANNER CODE END ?>