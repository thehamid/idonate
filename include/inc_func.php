<?php
function idonate_register_assets() {
	wp_register_style( 'idonate_style', PLUGIN_CSSPATH.'idonate_form.css');
	wp_enqueue_style( 'idonate_style' );

}
// Register style sheet.
add_action( 'wp_enqueue_scripts', 'idonate_register_assets' );


function status_change($status){
	switch($status){
		case 0:
			echo 'Not Success';
			break;
		case 1:
			echo 'Success';
			break;
		default:
			echo "undefined";
			break;
	}
}


function gatewayRequest($data){

// اطلاعات مربوط به پرداخت
	$api_key      = 'YOUR_API_KEY';
	$amount       = 100; // مبلغ پرداخت (به واحد مشخص شده در مستندات شپا)
	$callback_url = 'https://yourwebsite.com/payment_callback'; // آدرس بازگشتی پرداخت
// اطلاعات کاربر یا سفارش
	$customer_name  = $_POST['customer_name']; // نام مشتری
	$customer_email = $_POST['customer_email']; // ایمیل مشتری
// ... سایر اطلاعات مربوط به سفارش و مشتری

// ارسال درخواست به API شپا برای گرفتن توکن پرداخت
	$data = array(
		'api'      => $api_key,
		'amount'   => $amount,
		'callback' => $callback_url,
		'mobile'   => $customer_mobile,
		'email'    => $customer_email,
		// ... سایر اطلاعات مربوط به سفارش و مشتری
	);

	$ch = curl_init( 'https://merchant.shepa.com/api/v1/token' );
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
	curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $data ) );
	$response = curl_exec( $ch );
	curl_close( $ch );

	$response_data = json_decode( $response, true );

// بررسی وضعیت درخواست
	if ( $response_data['success'] === 'true' ) {
		$payment_token = $response_data['result']['token'];
		$payment_url   = $response_data['result']['url'];

		// انتقال کاربر به صفحه پرداخت
		header( "Location: $payment_url?token=$payment_token" );
	} else {
		// پرداخت ناموفق بود، نمایش پیام خطا به کاربر
		echo 'متاسفانه پرداخت موفقیت‌آمیز نبود. خطا: ' . $response_data['errors'];
	}

}

function verify(){

// اطلاعات مربوط به تایید نهایی
	$payment_token = $_POST['payment_token']; // توکن پرداخت
	$paid_amount   = $_POST['paid_amount']; // مبلغ پرداخت شده
	$api_key       = 'YOUR_API_KEY'; // کلید API شما

// ارسال درخواست به API شپا برای تایید نهایی
	$data = array(
		'token'  => $payment_token,
		'amount' => $paid_amount,
		'api'    => $api_key
	);

	$ch = curl_init( 'https://merchant.shepa.com/api/v1/verify' );
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
	curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $data ) );
	$response = curl_exec( $ch );
	curl_close( $ch );

	$response_data = json_decode( $response, true );

// بررسی وضعیت تایید نهایی
	if ( $response_data['success'] === 'true' ) {
		// تراکنش با موفقیت تأیید شده است
		$refid            = $response_data['result']['refid']; // شماره پیگیری تراکنش
		$transaction_id   = $response_data['result']['transaction_id']; // شماره تراکنش
		$final_amount     = $response_data['result']['amount']; // مبلغ نهایی تراکنش
		$card_pan         = $response_data['result']['card_pan']; // شماره کارت پرداخت کننده
		$transaction_date = $response_data['result']['date']; // تاریخ تراکنش

		// ثبت موارد مربوط به تراکنش و ادامه فرآیند
	} else {
		// تایید نهایی تراکنش با مشکل روبرو شده است
		$error_message = $response_data['errors'];
		// نمایش پیام خطا به کاربر یا انجام عملیات مناسب برای مدیریت خطا
	}

}