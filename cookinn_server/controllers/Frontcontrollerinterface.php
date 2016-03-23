<?php

/**
 * Interface that defines the methods of the front controller
 */
interface FrontControllerInterface
{
    public function setController($controller);
    public function setAction($action);
    public function setParams(array $params);
    public function run();
}