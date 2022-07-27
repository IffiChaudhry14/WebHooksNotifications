<?php
define('DOMAIN_URL_PROJECT-PATH','https://58cd-182-189-26-200.ngrok.io/PaySaw/WebHooksNotifications/');
$array=array(
    'webhook'=>array(
        'topic'=>'products/create',
        'address'=> DOMAIN_URL_PROJECT-PATH . 'webhooks/products/create.php',
        'format'=>'json'
    )
    );
    
$webhooks=shopify_call($access_token,shop_url,"/admin/api/2021-01/webhooks.json",$array,'POST');
$webhooks = json_decode( $webhooks['response'], true);

echo print_r($webhooks)
?>
