<?php
/**
 * class Router
 */

// class Router
// {
//     protected $routes = [];
   
//     public static function init($file)
//     {
//         $router = new static;
//         require $file;
//         return $router;
//     }

//     public static function initTest($param)
//     {
//         $foo = new static();
//         $foo->name = $param;
//         return $foo;
//     }

//     public static function load()
//     {
//         $router = new static();
//         return $router;
//     }

//     public function define($routes)
//     {
//         $this->routes = $routes;
//     }

//     public function direct($uri)
//     {
//         if(array_key_exists($uri, $this->routes)) {
//             return $this->routes[$uri];
//         }

//         throw new Exception("No Route defined");
//     }
// }

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
//             return $this->callAction(
//                 ...$this->getAction($this->routes['404'])
//             ); 
//         }
//     }

//     private function getAction($route)
//     {
//         list($segments, $action) = explode('@', $route);
//         $segments = explode('\\', $segments);
//         $controller = array_pop($segments);
//         $getControllerPatg = '/';
//         do {
//             if (count($segments)==0) {
//                 return array ($controller, $action, $getControllerPatg);
//             } else {
//                 $segment = array_shift($segments);
//                 $getControllerPatg = $getControllerPatg.$segment.'/';
//             }
//         } while ( count($segments) >= 0);

//     }

//     protected function callAction($controller, $action, $getControllerPath)
//     {
//         include CONTROLLERS.$getControllerPath.'/'.$controller.EXT;
        
//         $controller = new $controller;
        
//         if (! method_exists($controller, $action)) {
//             throw new Exception(
//                 "{$controller} does not respond to the {$action} action."
//             );
//         }
//         return $controller->$action();
//     }
// }

class Router
{
    protected $routes = [];
   
    public static function init($file)
    {
        $router = new static;
        require $file;
        return $router;
    }

    public function define($routes)
    {
        $this->routes = $routes;
    }

    public function direct($uri)
    {
        if (array_key_exists($uri, $this->routes)) {
            return $this->callAction(
                ...$this->getAction($this->routes[$uri])
            );
        } else {
            foreach ($this->routes as $key => $val) {
                
                $pattern = "@^" .preg_replace('/{([a-zA-Z0-9]+)}/', '(?<$1>[0-9]+)', $key). "$@";
                preg_match($pattern, $uri, $matches);
                array_shift($matches);
                if ($matches) {
                    $getAction = $this->getAction($val);
                    return $this->callAction($getAction[0], $getAction[1], $getAction[2], $matches);
                }
            }
            return $this->callAction(
                ...$this->getPathAction($this->routes['404'])
            ); 
        }
    }

    private function getAction($route)
    {
        list($segments, $action) = explode('@', $route);
        $segments = explode('\\', $segments);
        $controller = array_pop($segments);
        $getControllerPath = '/';
        do {
            if (count($segments)==0) {
                return array ($controller, $action, $getControllerPath);
            } else {
                $segment = array_shift($segments);
                $getControllerPath = $getControllerPath.$segment.'/';
            }
        } while ( count($segments) >= 0);

    }

    protected function callAction($controller, $action, $getControllerPath, $vars = [])
    {
        include CONTROLLERS.$getControllerPath.'/'.$controller.EXT;
        
        $controller = new $controller;
        
        if (! method_exists($controller, $action)) {
            throw new Exception(
                "{$controller} does not respond to the {$action} action."
            );
        }
        return $controller->$action($vars);
    }
}
