<?php
 namespace App\Helpers;

 use Symfony\Component\HttpFoundation\Response;
 use Illuminate\Support\Facades\Config;
 use Illuminate\Support\Facades\Validator;
 use Illuminate\Support\Facades\Mail;
 
 class Helper
 {

    public function __construct()
    {

    }


    /*
    *responseJson for send respone with response code
    * 
    * */
      public static function responseJson($additionalData, $response_code)
        {
            $responseData =  ['code' => $response_code];
            return response()->json(array_merge($responseData, $additionalData),$response_code);
        }

   
    /*
    *Common function for cahch block handling internal Server Errors
    * */
    public static function internalServerError($ex)
    {
        return response()->json([
            'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
            'message' => 'something went wrong server side!',
            'error' => $ex->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        //@file_put_contents($file_name,PHP_EOL .date("Y-m-d H:i:s", strtotime("now"))."==== Mobile Number ===". $mobile. " === Error message ===".print_r($ex,true).PHP_EOL,FILE_APPEND);
    }

    /*
    *Common function for Send Email
    *@param 
    * */
    public static function sendEmail($to, $subject, $data, $view)
    {
      try{        
        Mail::send('emails.'.$view,  $data , function($message) use ($to,$subject)
        {    
            $message->to($to)->subject($subject);    
        });
        return true;

      }catch( Exception $ex){
        return Self::internalServerError($ex);
      }

    }

    /**
     * get User Id form JWT token
     */
    public static function getUserId()
    {
        $user_data = JWTAuth::parseToken()->authenticate();
        return $user_data->id;
    }

    /**
     * get User form JWT token
     */

    public static function getUser()
    {
        $user_data = JWTAuth::parseToken()->authenticate();
        return $user_data;
    }

}
