<?php
/**
 * class Router
 */

class Router
{

    public $routes = [
        'GET' => [],
        'POST' => []
    ];

    public static function load($file)
    {
        $router = new static;
        include $file;
        return $router;
    }


    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }


    public function directPath($uri, $requestType)
    {   
        if (array_key_exists($uri, $this->routes[$requestType])) {
            return $this->callAction(
                ...$this->getPathAction($this->routes[$requestType][$uri])
            );
        } else {
            foreach ($this->routes[$requestType] as $key => $val) {
                // $pattern = preg_replace('#\(/\)#', '/?', $key);
                $pattern = "@^" .preg_replace('/{([a-zA-Z0-9\_\-]+)}/', '(?<$1>[a-zA-Z0-9\_\-]+)', $key). "$@";
                preg_match($pattern, $uri, $matches);
                array_shift($matches);
                if ($matches) {
                    $getAction = $this->getPathAction($val);
                    return $this->callAction($getAction[0], $getAction[1], $getAction[2], $matches);
                }

            }
            return $this->callAction(
                ...$this->getPathAction($this->routes[$requestType]['404'])
            ); 
        }
    }


    private function getPathAction($route)
    {
        list($segments, $action) = explode('@', $route);
        $segments = explode('\\', $segments);
        $controller = array_pop($segments);
        $controllerFile = '/';
        do {
            if (count($segments)==0) {
                return array ($controller, $action, $controllerFile);
            } else {
                $segment = array_shift($segments);
                $controllerFile = $controllerFile.$segment.'/';
            }
        } while ( count($segments) >= 0);

    }

    protected function callAction($controller, $action, $controllerFile, $vars = [])
    {
      
        include CONTROLLERS.$controllerFile.'/'.$controller.EXT;
        
        $controller = new $controller;
        
        if (! method_exists($controller, $action)) {
            throw new Exception(
                "{$controller} does not respond to the {$action} action."
            );
        }
        return $controller->$action($vars);
    }

}


// class Router
// {
//     protected $routes = [];
   
//     public static function init($file)
//     {
//         $router = new static;
//         require $file;
//         return $router;
//     }

//     public function define($routes)
//     {
//         $this->routes = $routes;
//     }

//     public function direct($uri)
//     {
//         if (array_key_exists($uri, $this->routes)) {
//             return $this->callAction(
//                 ...$this->getAction($this->routes[$uri])
//             );
//         } else {
//             foreach ($this->routes as $key => $val) {
                
//                 $pattern = "@^" .preg_replace('/{([a-zA-Z0-9]+)}/', '(?<$1>[0-9]+)', $key). "$@";
//                 preg_match($pattern, $uri, $matches);
//                 array_shift($matches);
//                 if ($matches) {
//                     $getAction = $this->getAction($val);
//                     return $this->callAction($getAction[0], $getAction[1], $getAction[2], $matches);
//                 }
//             }
//             return $this->callAction(
//                 ...$this->getPathAction($this->routes['404'])
//             ); 
//         }
//     }

//     private function getAction($route)
//     {
//         list($segments, $action) = explode('@', $route);
//         $segments = explode('\\', $segments);
//         $controller = array_pop($segments);
//         $getControllerPath = '/';
//         do {
//             if (count($segments)==0) {
//                 return array ($controller, $action, $getControllerPath);
//             } else {
//                 $segment = array_shift($segments);
//                 $getControllerPath = $getControllerPath.$segment.'/';
//             }
//         } while ( count($segments) >= 0);

//     }

//     protected function callAction($controller, $action, $getControllerPath, $vars = [])
//     {
//         include CONTROLLERS.$getControllerPath.'/'.$controller.EXT;
        
//         $controller = new $controller;
        
//         if (! method_exists($controller, $action)) {
//             throw new Exception(
//                 "{$controller} does not respond to the {$action} action."
//             );
//         }
//         return $controller->$action($vars);
//     }
// }
