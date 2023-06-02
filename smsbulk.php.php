<?php

//use Twilio\Rest\Client;
require_once('vendor/autoload.php');

$client = new \GuzzleHttp\Client();

$response = $client->request('POST', 'https://example.com/sms/1/text/single', [
  'headers' => [
    'accept' => 'application/json',
    'content-type' => 'application/json',
  ],
]);
?>

<?php
//echo $response->getBody();
/*class TwilioSmsNotifier{
   private const TWILIO_ID = "ACf96e12cb8b8e713323c57c4dddff9f33";  //'<your-twilio-account-id>';
   private const TWILIO_TOKEN ="1220222d93353eeef73436a805e0a410";                    //'<your-twilio-token>';
   private const TWILIO_PHONE_NUMBER ="+1 434 686 6396"    //'<your-twilio-number>';
 }*/
 /*class TwilioSmsNotifier{
      private const TWILIO_ID = "ACf96e12cb8b8e713323c57c4dddff9f33";    //'<your-twilio-account-id>';
      private const TWILIO_TOKEN ="1220222d93353eeef73436a805e0a410"; // '<your-twilio-token>';
      private const TWILIO_PHONE_NUMBER = "+1 434 686 6396" ;    //'<your-twilio-number>';

   private Client $twilioClient;

   public function __construct()
      {
        $this->twilioClient = new Client(
            self::TWILIO_ID,
            self::TWILIO_TOKEN
         );
      }

      public function sendOrderConfirmationSms(
         string $phoneNumber,
         string $messageBody
     ): string
     {
         $message = $this->twilioClient->messages->create($phoneNumber,
             [
                 "body" => $messageBody,
                 "from" => self::TWILIO_PHONE_NUMBER
             ]);
         return $message->sid;
         $twilioService = new TwilioSmsNotifier();
         $twilioService->sendOrderConfirmationSms('+49123456789'); /*, “Your order has been confirmed”);*/
         // $TWILIO_ORDER_MESSAGING_SERVICE_ID = 'IS85f6586a5f24477a96ad9f891a502322';
 /*    }

   }

  

    function sendBulkSms(
      array $phoneNumbers,
      string $messageBody
   ): string
   {
      foreach ($phoneNumbers as $phoneNumber) {
        try {
           $message = $this->twilioClient->messages
               ->create($phoneNumber,
                    [
                     "body" => $messageBody,
                     "from" =>/*self::*/TWILIO_ORDER_MESSAGING_SERVICE_ID
    /*               ]);
               echo $message->sid . PHP_EOL;
           } catch (\Throwable $throwable) {
               echo $throwable->getMessage();
           }
       }
       return "Message delivery in progress";
   }
     function SendSms(){
   $twilioService = new TwilioSmsNotifier();
$twilioService->sendBulkSms(
    [
        '+263779595946',
        '+263778959268',
        '+263772466169',
    ],
    'Your order has been dispatched');

   }
   
//$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
//$dotenv->load();

// Your Account SID and Auth Token from https://www.twilio.com/console
/*$account_sid = "ACf96e12cb8b8e713323c57c4dddff9f33";//$_ENV['TWILIO_ACCOUNT_SID'];
$auth_token = "1220222d93353eeef73436a805e0a410" ;    //$_ENV['TWILIO_AUTH_TOKEN'];
$notify_sid = "IS85f6586a5f24477a96ad9f891a502322";   //$_ENV['TWILIO_NOTIFY_SID'];*/

// Initialize the client
/*$Client = new Client($account_sid, $auth_token);

$start_time = microtime(true);

$subscribers = [
    json_encode(['binding_type' => "sms", 'address' => "+263779595946"]),
    json_encode(['binding_type' => "sms", 'address' => "+263779595946"])
 ];
 
 $request_data = [
    "toBinding" => $subscribers,
    'body' => "Knok-Knok! This is your first Notify SMS"
 ];

 // Create a notification
$notification = $Client->notify->services($notify_sid)->
notifications->create($request_data);
//nok-Knok! This is your first Notify SMS;

$end_time = microtime(true);
$execution_time = ($end_time - $start_time);
echo " Execution time: " . $execution_time . " seconds";*/

?>
