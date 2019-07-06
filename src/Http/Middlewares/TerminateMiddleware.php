<?php

namespace ishelperlog\is_log\Http\Middlewares;

use Closure;
use Illuminate\Support\Facades\Log;

class TerminateMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
    public function terminate($request, $response) {
        $currentAction = \Route::currentRouteAction();
        list($controller, $method) = explode('@', $currentAction);
        //$controller = preg_replace('/.*\\\/', '', $controller);
        $requestInfo=array("urlRequest"=>$request->fullUrl(),"methodRequest"=>$request->getMethod(),"IP"=>$request->getClientIp());
        $responeInfo=array("body"=>$response->getContent());
        $requestInfo=json_encode($requestInfo);
        $responeInfo=json_encode($responeInfo);
        $ContentLength=$response->headers->get('Content-Length');
        $ContentType= $response->headers->get('Content-Type');
        $Connection= $response->headers->get('Connection');
        $Server= $response->headers->get('Server');
        $headers=array("ContentLength"=>$ContentLength,"ContentType"=>$ContentType,"Connection"=>$Connection,"Server"=>$Server);
        $headers=json_encode($headers);
        addLog(null,null,null,null,$method,$requestInfo,$responeInfo,$response->getStatusCode(),$controller,null,null,$headers,'roue');


    }

}
