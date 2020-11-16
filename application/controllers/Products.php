<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Products extends CI_Controller
{
    function  __construct() {
        parent::__construct();
        //$this->load->library('paypal_lib');
        $this->load->model('product');
        $this->load->database();
    }
     
    function index(){
        $data = array();
        //get products inforamtion from database table
       // $data['products'] = $this->product->getRows();
        //loav view and pass the products information to view
        $this->load->view('products/index', $data);
    }
    
    function success(){
        $data=array();
      $data['result']= $this->verifyWithPayPal($_REQUEST ['tx']);
      $this->load->view('paypal/success', $data);
     }
     
 function getListProducts($result) {
	$i = 1;
	$data = array ();
	foreach ( $result as $key => $value ) {
		if (0 === strpos ( $key, 'item_number' )) {
			$product = array (
					'item_number' => $result ['item_number' . $i],
					'item_name' => $result ['item_name' . $i],
					'quantity' => $result ['quantity' . $i],
					'mc_gross' => $result ['mc_gross_' . $i]
			);
			array_push ( $data, $product );
			$i ++;
		}
	}
	return $data;
}

function verifyWithPayPal($tx) {
	//require_once 'config.php';
    $tx= $_REQUEST['tx'];
	$token = $this->config->item( 'authtoken' );
	$paypal_url = $this->config->item( 'posturl' ) . '?cmd=_notify-synch&tx=' . $tx . '&at=' . $token;
	$curl = curl_init ( $paypal_url );
	$data = array (
			"cmd" => "_notify-synch",
			"tx" => $tx,
			"at" => $token
	);
	$data_string = json_encode ( $data );
	curl_setopt ( $curl, CURLOPT_HEADER, 0 );
	curl_setopt ( $curl, CURLOPT_POST, 1 );
	curl_setopt ( $curl, CURLOPT_POSTFIELDS, $data_string );
	curl_setopt ( $curl, CURLOPT_SSL_VERIFYPEER, 0 );
	curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, 1 );
	$headers = array (
			'Content-Type: application/x-www-form-urlencoded',
			'Host: www.sandbox.paypal.com',
			'Connection: close'
	);
	curl_setopt ( $curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1 );
	curl_setopt ( $curl, CURLOPT_HTTPHEADER, $headers );
	$response = curl_exec ( $curl );
	$lines = explode ( "\n", $response );
	$keyarray = array ();
	if (strcmp ( $lines [0], "SUCCESS" ) == 0) {
		for($i = 1; $i < count ( $lines ); $i ++) {
			list ( $key, $val ) = explode ( "=", $lines [$i] );
			$keyarray [urldecode ( $key )] = urldecode ( $val );
		}
		$keyarray ['listProducts'] = getListProducts ( $keyarray );
	}
	return $keyarray;
}
    
    
    
   
}