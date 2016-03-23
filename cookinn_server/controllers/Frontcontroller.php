<?php

/**
 * Front controller used for the routing to the other controllers with action and parameters
 * URI must be base/server_base/index.php/controllerName/action/param()1.../param(n)
 */
class FrontController implements FrontControllerInterface
{
    const DEFAULT_CONTROLLER = "HomepageController";
    const DEFAULT_ACTION     = "index";
    
    protected $controller    = self::DEFAULT_CONTROLLER;
    protected $action        = self::DEFAULT_ACTION;
    protected $params        = array();
    protected $basePath      = "cookinn_server/";
    
    /**
     * Build the front controller with or without options
     * @param array|array $options 
     */
    public function __construct(array $options = array()) {
        if (empty($options)) {
           $this->parseUri();
        }
        else {
            if (isset($options["controller"])) {
                $this->setController($options["controller"]);
            }
            if (isset($options["action"])) {
                $this->setAction($options["action"]);     
            }
            if (isset($options["params"])) {
                $this->setParams($options["params"]);
            }
        }
    }
    
    /**
     * Parse the URI to determine which controller it should be redirected to and with which action/params
     */
    protected function parseUri() {
        $path = trim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), "/");
        $path = preg_replace('/[^a-zA-Z0-9]\//', '', $path);
        if (strpos($path, $this->basePath) === 0) {
            $path = substr($path, strlen($this->basePath));
        }
        @list($base, $server_base, $index, $controller, $action, $params) = explode("/", $path, 8);
        if (isset($controller)) {
            $this->setController($controller);
        }
        if (isset($action)) {
            $this->setAction($action);
        }
        if (isset($params)) {
            $this->setParams(explode("/", $params));
        }
    }
    
    /**
     * Return the formatted name of the controller
     * @param string $controller 
     * @return string controller name
     */
    public function setController($controller) {
        $controller = ucfirst(strtolower($controller)) . "Controller";
        if (!class_exists($controller)) {
            throw new InvalidArgumentException(
                "The action controller '$controller' has not been defined.");
        }
        $this->controller = $controller;
        return $this;
    }
    
    /**
     * Return the action name
     * @param string $action 
     * @return string action name
     */
    public function setAction($action) {
        $reflector = new ReflectionClass($this->controller);
        if (!$reflector->hasMethod($action)) {
            throw new InvalidArgumentException(
                "The controller action '$action' has been not defined.");
        }
        $this->action = $action;
        return $this;
    }
    
    /**
     * Return the array of params
     * @param array $params 
     * @return type
     */
    public function setParams(array $params) {
        $this->params = $params;
        return $this;
    }

    /**
     * Call to the controller and the action method with array of params as arguments
     */    
    public function run() {
        call_user_func_array(array(new $this->controller, $this->action), $this->params);
    }
}