<?php
require('vendor/autoload.php'); // Install Razorpay PHP SDK

use Razorpay\Api\Api;

$keyId = "rzp_live_pztf6D9htppjWM";
$keySecret = "ngELlsS4M7WnpIq5J5vvusKy";

$api = new Api($keyId, $keySecret);

$paymentId = $_POST['razorpay_payment_id'];

try {
    $payment = $api->payment->fetch($paymentId);
    if ($payment->status == 'captured') {
        echo "Payment Verified! Order will be processed.";
    } else {
        echo "Payment Failed! Please try again.";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>



