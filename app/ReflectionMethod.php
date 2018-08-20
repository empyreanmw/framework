<?php


namespace App;


class ReflectionMethod
{
    protected $method;
    protected $reflector;
    protected $class;
    protected $parameters;
    /**
     * ReflectionMethod constructor.
     * @param $class
     */
    public function __construct($class, $method)
    {
        $this->reflector = new \ReflectionClass(get_class($class));
        $this->class = $class;
        $this->method = $method;
        $this->parameters = $this->setParameters();
    }

    public function callMethod()
    {
        $method = $this->method;

        if($this->parametersExist()){
                return $this->class->$method(...$this->buildClassObjects($this->getParameters()));
            }

        return $this->class->$method();
    }

    protected function setParameters()
    {
        $parameters = $this->reflector->getMethod($this->method)->getParameters();

        return $this->parameters = $parameters;
    }


    protected function buildClassObjects($classNames)
    {
        foreach ($classNames as $className) {
            $objects[]= app()->make($className);
        }

        return $objects;
    }

    protected function getParameters()
    {
        foreach ($this->parameters as $parameter) {
                $classNames[] = $parameter->getClass()->name;
            }

            return $classNames;
    }

    protected function parametersExist()
    {
        return empty($this->parameters) ? false : true;
    }



}