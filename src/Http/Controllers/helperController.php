<?php

namespace ishelperlog\is_log\Http\Controllers;

use App\Http\Controllers\Controller;

class helperController extends Controller
{
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
