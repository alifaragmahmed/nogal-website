<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cart;
use Illuminate\Support\Facades\Auth;

use App\Order; 
use App\User; 
use App\helper\Helper;

class PaymentController extends Controller
{
    
    
    /**
     * api key of payment [accept payment]
     * payment url => https://accept.paymobsolutions.com/
     * 
     * @var String apikey
     */
    private $apiKey = "ZXlKMGVYQWlPaUpLVjFRaUxDSmhiR2NpT2lKSVV6VXhNaUo5LmV5SmpiR0Z6Y3lJNklrMWxjbU5vWVc1MElpd2ljSEp2Wm1sc1pWOXdheUk2T0RFNE5Dd2libUZ0WlNJNkltbHVhWFJwWVd3aWZRLlVERmt4bE02R1dfME5EZzAyT2hEOFU1VjNQNld3VVBlTy1BVGJLUE1WMXVrUVlCbjZXUWFBWWZpV1NzTGp5SktJaTNocEhxX24yQ19DWHdqSV9iMW9n";
    
    /**
     * integration id of card
     * provided in dashboard
     * 
     * @var String
     */
    private $cardIntegrationId = "17699";
    
    
    /**
     * url of iframe 
     * provided in dashboard
     * 
     * @var String
     */
    private $iframeUrl = "https://accept.paymobsolutions.com/api/acceptance/iframes/23064?payment_token={payment_token}";
    
    
    /**
     * return view
     */
    public function index() {
        return view("checkout");
    }
    
    /**
     * pay order
     * 
     * 
     */
    public function pay() {
       // return dump($this->createPaymentOrder());
        return $this->createPaymentKeyRequest();
    }
    
    
    
    /**
     * STEP 1
     * ==================================
     * 
     * auth the payment get payment token
     * with api key
     * 
     * @return String payment token
     */
    public function authPayment() 
    {
        //Authentication snippet
        $url = "https://accept.paymobsolutions.com/api/auth/tokens";        
        $data_string = '{
            "api_key": "' . $this->apiKey . '"
        }';
        
        $ch=curl_init($url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
            array(
                'Content-Type:application/json',
                'Content-Length: ' . strlen($data_string)
            )
        );

       //curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        //curl_setopt($ch, CURLOPT_HEADER, true);
        
        $response = curl_exec($ch);

         
        curl_close($ch);
        try { 
            
            return [
                "status" => 1,
                "data" => json_decode($response, true)
            ]; 
        } catch (\Exception $ex) {
            return [
                "status" => 0,
                "message" => $ex->getMessage(),
                "data" => null
            ]; 
        }
    }
    
    
    /**
     * STEP 2
     * ==================================
     * 
     * create payment order with money
     * this step is required to make payment token request
     * 
     * @return String json
     */
    public function createPaymentOrder() {
        // save the order to database
        $orderResponse = $this->saveOrder();
        
        // get auth token
        $authResponse = $this->authPayment();
        
        // check if the order save or not
        if ($orderResponse["status"] == 0) {
            // remove order
            $order = $orderResponse["order"];
            if ($order)
                $order->delete();
            
            return [
                "status" => 0,
                "message" => $orderResponse["message"] 
            ];
        }
        
        // check if the authentication payment success or not
        if ($authResponse["status"] == 0) { 
            return [
                "status" => 0,
                "message" => $authResponse["message"] 
            ];
        }
        
        // get registed user
        $user = Auth::user();
        
        // get order
        $order = $orderResponse["order"];
         
        // get auth token
        $authToken = $authResponse["data"]["token"];
        
        // get merchant id
        $merchantId = $authResponse["data"]["profile"]["id"];
        
        // get order total
        $amount = $orderResponse["amount"] * 10;
        
        
        $url = "https://accept.paymobsolutions.com/api/ecommerce/orders";        
        $data_string = '{
            "api_key": "' . $this->apiKey . '",
            "auth_token": "' . $authToken . '",  
            "delivery_needed": "false",
            "merchant_id": "'. $merchantId .'",      
            "amount_cents": "' . $amount . '",
            "currency": "EGP",
            "merchant_order_id": ' . time() . ',  
            "items": [],
            "shipping_data": {     
                "email": "' . $order->email . '", 
                "first_name": "' . $order->first_name . '", 
                "last_name": "' . $order->last_name . '", 
                "street": "' . $order->address . '", 
                "phone_number": "' . $order->phone . '"
              }
        }';
        
        $ch=curl_init($url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
            array(
                'Content-Type:application/json',
                'Content-Length: ' . strlen($data_string)
            )
        );

       //curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        //curl_setopt($ch, CURLOPT_HEADER, true);
        
        $response = curl_exec($ch); 
        curl_close($ch);
        try { 
             
            return [
                "status" => 1,
                "order" => $order,
                "amount" => $amount,
                "authResponse" => $authResponse,
                "data" => json_decode($response, true)
            ]; 
        } catch (\Exception $ex) {
            return [
                "status" => 0,
                "message" => $ex->getMessage()
            ]; 
        }
    }
    
    
    /**
     * STEP 3
     * ==================================
     * 
     * create payment key request to user it in transication
     * 
     * @return String payment key
     */
    public function createPaymentKeyRequest() 
    {
        $paymentOrderResponse = $this->createPaymentOrder();
         
        //return dump($paymentOrderResponse);
        
        // check on payment order response status
        if ($paymentOrderResponse["status"] == 0 && !isset($paymentOrderResponse['data']['id'])) {
            return redirect("home?msg=" . $paymentOrderResponse['message'] . "&status=" . 0); 
        }
        
        // get registed user
        $user = Auth::user();
        
        // get auth response
        $authResponse = $paymentOrderResponse["authResponse"];
        
        // get auth token
        $authToken = $authResponse["data"]["token"];
         
        // get order order
        $order = $paymentOrderResponse["order"];
        
        // store order id in session
        session(["order_id" => $order->id]);
          
        // payment key 
        $url = "https://accept.paymobsolutions.com/api/acceptance/payment_keys";        
        $data_string = '{
              "auth_token": "' . $authToken . '",  
              "amount_cents": "' . $paymentOrderResponse["amount"] . '", 
              "expiration": 3600, 
              "order_id": "' . $paymentOrderResponse['data']['id']  . '",   
              "billing_data": { 
                "apartment": "' . $order->address . '", 
                "email": "' . $order->email . '", 
                "floor": "' . $order->address . '", 
                "first_name": "' . $order->first_name . '", 
                "street": "' . $order->address . '", 
                "building": "' . $order->address . '", 
                "phone_number": "' . $order->phone . '", 
                "shipping_method": "PKG", 
                "postal_code": "' . $order->zipcode . '", 
                "city": "' . $order->city . '", 
                "country": "EGYPT", 
                "last_name": "' . $order->last_name . '", 
                "state": "EGYPT"
              }, 
              "currency": "EGP", 
              "integration_id": '. $this->cardIntegrationId .',
              "lock_order_when_paid": "false"  
        }';
        
        $ch=curl_init($url);
        
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
            array(
                'Content-Type:application/json',
                'Content-Length: ' . strlen($data_string)
            )
        );

       //curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    //curl_setopt($ch, CURLOPT_HEADER, true);
        
        $response = curl_exec($ch); 
          
        curl_close($ch);
        try { 
            
            // get payment response
            $paymentKeyResponse = json_decode($response, true);
             
            //return dump($paymentKeyResponse);
            // get payment token
            $paymentToken = $paymentKeyResponse['token'];
            
            // preparse iframe url
            $iframeUrl = str_replace("{payment_token}", $paymentToken, $this->iframeUrl);
            
            // redirect to iframe url
            return redirect($iframeUrl);
            
            //return redirect("checkout?payment_key=" . $paymentKeyResponse); 
        } catch (\Exception $ex) { 
            return redirect("home?msg=" . $ex->getMessage() . "&status=0");
        }
    }
    
    /**
     * save order in db
     * 
     */
     
    public function saveOrder() {
        $order = Order::find(request()->order_id);
        
        if ($order) {
            // send email to admin with new order
            $this->sendEmail($order);
            
            return [
                "order" => $order,
                "status" => 1,
                "message" => "payment success",
                "amount" => $order->total,
            ];
        }
        
        return [
            "order" => null,
            "status" => 0,
            "message" => "payment failed",
            "amount" => 0,
        ];
    }
    
    /**
     * send email to admin if there is a new order
     * 
     */
    public function sendEmail($order) {
        try {
            $html = view('dashboard.new_order', compact("order"));
            $email = "Info@nogal-furniture.com";
            Helper::sendMail($email, __('new order from ') . optional($order->user)->name, $html);
        }catch(\Exception $ex){
            //
        }
    }
}
