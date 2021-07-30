<?php
namespace App\Controllers;

use App\Libraries\SmartQrcode;
use App\Models\Users_walletModel;
class Payment extends BaseController
{
	//AZgXuZZ0zqKppoB1GgPNQ4ymTqssQMCKvgEjT1dJTeDaNtGr-qSdPiCajuS_Hu8w4TKT94LorYmrEYMG
	//EJBAS33Vv62aeQUx7Nvl6uzjHzxqUh5N8UkR1wax8odJc4FiPFaudy4kCX9LkQDs7Co0jtrOhhbUVtZw
	public $paypal_client = "AZgXuZZ0zqKppoB1GgPNQ4ymTqssQMCKvgEjT1dJTeDaNtGr-qSdPiCajuS_Hu8w4TKT94LorYmrEYMG";
	public $paypal_secret = "EJBAS33Vv62aeQUx7Nvl6uzjHzxqUh5N8UkR1wax8odJc4FiPFaudy4kCX9LkQDs7Co0jtrOhhbUVtZw";

	public function index()
	{
		
	}

	public function genservice($service, $total){
		if($service == "paypal"){
			$wallet = new Users_walletModel;
			$sum = $wallet->converTokenToUSD($total);
			session()->set(["payment_amount" => $sum,"payment_name" => "BUY ".$wallet->getTokenName()]);
			echo "paypal";
			exit();
		}
		$qrcode = new SmartQrcode;
		$hex_data   = bin2hex($data);
        $save_name  = $hex_data . '.png';
        if($service == "btc"){
			$params['data']     = getenv("btc_wallet") ? getenv("btc_wallet") : "0x3aebc70aa356187b2f7391f842bc72da67e46b04";
			$this->data["service"] = getenv("btc_wallet_name") ? getenv("btc_wallet_name") : "BTC BEP20 (BSC)";
		}
		if($service == "eth"){
			$params['data']     = getenv("eth_wallet") ? getenv("eth_wallet") :"0xd2D1e9a0E2Ba929c5114e5aF4e2B0F45586422C0?amount=0.01";
			$this->data["service"] = "Ethereum";
		}
        $params['level']    = 'R';
        $params['size']     = 10;

        //$params['savename'] = FCPATH . "/uploads/qrcode/" . $save_name;

		$this->data["qrcode"] = $qrcode->getQrcode64($params);
		$this->data["wallet"] = $params['data'];
		
		$this->layout = "layout/empty";
	}



	public function paypal(){
		
		$paypal_client = $this->settings->paypal_client;
		$paypal_secret = $this->settings->paypal_secret;
		$paypal_mode = "live";
		if($paypal_client == "" || $paypal_secret == ""){
			$paypal_client = $this->paypal_client;
			$paypal_secret = $this->paypal_secret;
			$paypal_mode = "live";
		}
		$total = session()->get("payment_amount");
		$nameinvoice = session()->get("payment_name");
		require APPPATH.'ThirdParty/paypal/vendor/autoload.php';
		$apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                $paypal_client,     // ClientID
                $paypal_secret     // ClientSecret
            )
        );
        $apiContext->setConfig(
            array(
                'mode' => $paypal_mode,
                'log.LogEnabled' => false,
                'log.FileName' => 'PayPal.log',
                'log.LogLevel' => 'FINE'
            )
        );
        $payer = new \PayPal\Api\Payer();
        $payer->setPaymentMethod('paypal');

        $item1 = new \PayPal\Api\Item();
        $item1->setName($nameinvoice);
        $item1->setCurrency('USD');
        $item1->setQuantity(1);
        $item1->setPrice((float)$total);

        $itemList = new \PayPal\Api\ItemList();
        $itemList->setItems(array($item1));

        $amount = new \PayPal\Api\Amount();
        $amount->setCurrency("USD");
        $amount->setTotal((float)$total);


        $transaction = new \PayPal\Api\Transaction();
        $transaction->setAmount($amount);
        $transaction->setItemList($itemList);
        $transaction->setDescription('Description');

        $redirectUrls = new \PayPal\Api\RedirectUrls();
        $redirectUrls->setReturnUrl(base_url('payment/confirm/paypal'))->setCancelUrl(base_url('payment/cancel/paypal'));

        $payment = new \PayPal\Api\Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);
        // After Step 3
        try {
            $payment->create($apiContext);                

            $data['payment']     =  $payment;
            $data['approval_url'] =  $payment->getApprovalLink();
            //Write Invoice Start Payment
            return redirect()->to($data['approval_url']);

        }
        catch (\PayPal\Exception\PayPalConnectionException $ex) {
            // This will print the detailed information on the exception.
            //REALLY HELPFUL FOR DEBUGGING
            echo $ex->getData();
            echo $ex->getData();
        }

        print_r($data);

        exit();
	}


	private function paypal_confirm(){
		$paypal_client = $this->settings->paypal_client;
		$paypal_secret = $this->settings->paypal_secret;
		$paypal_mode = "live";
		if($paypal_client == "" || $paypal_secret == ""){
			$paypal_client = $this->paypal_client;
			$paypal_secret = $this->paypal_secret;
			$paypal_mode = "live";
		}
		$total = session()->get("payment_amount");

		require APPPATH.'ThirdParty/paypal/vendor/autoload.php';
		$apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                $paypal_client,     // ClientID
                $paypal_secret     // ClientSecret
            )
        );
        $apiContext->setConfig(
            array(
                'mode' => $paypal_mode,
                'log.LogEnabled' => false,
                'log.FileName' => 'PayPal.log',
                'log.LogLevel' => 'FINE'
            )
        );


        // Get payment object by passing paymentId
		$paymentId = $_GET['paymentId'];

		$payment = \PayPal\Api\Payment::get($paymentId, $apiContext);
		$payerId = $_GET['PayerID'];

        // Execute payment with payer id
		$execution = new \PayPal\Api\PaymentExecution();
		$execution->setPayerId($payerId);
		try {
          	// Execute payment
			$result = $payment->execute($execution, $apiContext);

			$subtotal = $payment->transactions[0]->related_resources[0]->sale->amount->details->subtotal;
			//Set Balance Money Token
			if ($result) {
				return ["total" => $subtotal,"paymentid" => $paymentId, "payerid" => $payerId, $info => $payment];
			}
		} catch (PayPal\Exception\PayPalConnectionException $ex) {
			echo $ex->getCode();
			echo $ex->getData();
			die($ex);

		} catch (Exception $ex) {
			die($ex);

		}

	}



	public function confirm($service){
		$serviceInfo = "";
		if($service == "paypal"){
			$info = $this->paypal_confirm();
			$serviceInfo = "paypal";
		}
		if(is_array($info)){
			$wallet = new Users_walletModel();
			$wallet->setBalanceToken($info["total"],"USD",$info["paymentid"],$info["payerid"],$serviceInfo);
		}
	}

	public function cancel($service){
		if($service == "paypal"){
			$token = "";
			session()->setFlashdata("confirm",lang("globals.payment_cancel"));
		}
		return redirect()->to("/cpanel");
	}
}