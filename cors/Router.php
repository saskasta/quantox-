<?php


class Router {
     public function __construct(){
         $url = $this->processURL($_GET);
         $this->callController($url);
     }
     
     protected function processURL($params){
         $url = [];
         $url['controller'] = !empty($params['c']) ? $params['c'] : "Home";
         $url['method'] = !empty($params['m']) ? $params['m'] : "index";
         $url['params'][0] = !empty($params['arg1']) ? $params['arg1'] : "";
         $url['params'][1] = !empty($params['arg2']) ? $params['arg2'] : "";
         return $url;
     }
     
     protected function callController($url){
         $file = BASE_PATH . 'controllers/' . $url['controller']. '.php';
          if (file_exists($file)) {
            require $file;
             $controller = new $url['controller']($url['controller']);
             if (!empty($url['method'])) {
                     if (method_exists($url['controller'], $url['method'])) {
                         $this->callMethod($controller,$url['method'],$url['params']);
                     }
                     else{
                         $this->error404("No method");
                   }
             }
          }
          else{
              $this->error404("No contorller");
          }
         
     }
     protected function callMethod($controller,$method, $params){
          if(empty($params[0]) && empty($params[1])){
               $controller->{$method}();
          }else if(!empty($params[0])){
              if(!empty($params[1])){
                  $controller->{$method}($params[0],$params[1]);
              }else{ 
                  $controller->{$method}($params[0]);
              }
          }
     }
     
      protected function error404($msg) {
        require BASE_PATH . 'controllers/ErrorHandler.php';
        $controller = new ErrorHandler($msg);
        $controller->index();
        die();
      }
}



