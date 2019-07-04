<?php
if (!function_exists('addLog')) {
/*
 * It is a kind of Helper Function for calling API Log
 * $codeerror = return from Error Handling Exception
 * $message = return from Error Handling Exception
 * $line=return from Error Handling Exception
 * $urlAction= return from Error Handling Exception
 * $nameOfFunc= the name of function that you should pass to method
 * $requestInfo=API Address
 * $response= respone from api
 * $module= the name of class that you should pass to method
 * $traceID=
 * $nameMicro=
 * $heasers= return heards api for insert to database
 */
    function addLog($codeerror=null,$message=null,$line=null,$urlAction=null,$nameOfFunc=null,$requestInfo=null,$response=null,$status=null,$module=null,$traceID=null,$nameMicrosystem=null,$heasers=null,$type=null)
    {
        $client = new \GuzzleHttp\Client();
        $host=Config::get('logConfig.host');
        $port=Config::get('logConfig.port');
        $urlApi='http://'.$host.':'.$port.'/writelog';
        $response=$client->request('POST',$urlApi,[
            'form_params'=>[
                'codeerror'=>$codeerror,
                'status'=>$status,
                'message'=>$message,
                'module'=>$module,
                'traceID'=>$traceID,
                'line'=>$line,
                'nameOfFunc'=>$nameOfFunc,
                'requestInfo'=>$requestInfo,
                'urlAction'=>$urlAction,
                'response'=>$response,
                'heasers'=>$heasers,
                'type'=>$type
            ]
        ]);
    }
}
