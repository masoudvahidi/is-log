<?php
namespace ishelperlog\is_log;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
class is_logServiceProvider extends ServiceProvider{
    protected $middleware = [
        'middlewareName' => 'Vendor\mypackage\Http\Middlewares\TerminateMiddleware'
    ];
    public function boot(Router $router){
        parent::boot($router);
        foreach($this->middleware as $name => $class) {
            $this->middleware($name, $class);
        }

    }
    public function register(){
        $file = app_path('helperfun.php');
        if (file_exists($file)) {
            require_once($file);
        }
    }
}
