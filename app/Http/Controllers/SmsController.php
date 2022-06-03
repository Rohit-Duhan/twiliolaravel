<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Exception;

class SmsController extends Controller
{
    public function index(Request $request){
        
        try{

            $acc_sid = env('TWILIO_SID');
            $acc_token = env('TWILIO_TOKEN');
            $number = env('TWILIO_FROM');

            
            $client = new Client($acc_sid,$acc_token);
            
            $client->messages->create('+91'.$request->number,[
                'from'=>$number,
                'body'=>$request->msg,
                
            ]);

            return "Message sent.";
        }
        catch(Exception $e){
            dd("Error: ". $e->getMessage());
        }

    }

    // public function index()
    // {
    //     $receiverNumber = "RECEIVER_NUMBER";
    //     $message = "All About Laravel";
  
    //     try {
  
    //         $account_sid = getenv("TWILIO_SID");
    //         $auth_token = getenv("TWILIO_TOKEN");
    //         $twilio_number = getenv("TWILIO_FROM");
  
    //         $client = new Client($account_sid, $auth_token);
    //         $client->messages->create($receiverNumber, [
    //             'from' => $twilio_number, 
    //             'body' => $message]);
  
    //         dd('SMS Sent Successfully.');
  
    //     } catch (Exception $e) {
    //         dd("Error: ". $e->getMessage());
    //     }
    // }
}
