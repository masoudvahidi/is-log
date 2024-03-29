<?php
namespace ishelperlog\is_log;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
class is_logServiceProvider extends ServiceProvider{
    protected $middleware = [
        'middlewareName' => 'ishelperlog\is_log\Http\Middlewares\TerminateMiddleware'
    ];
    public function boot(Router $router){
        parent::boot($router);
        foreach($this->middleware as $name => $class) {
            $this->middleware($name, $class);
        }

    }
    public function register(){
        $file = app_path('helper.php');
        if (file_exists($file)) {
            require_once($file);
        }
    }
}
