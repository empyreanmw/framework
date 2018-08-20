<?php


namespace App;

class AutoDependencyInjection
{
    public function create($className)
    {
        $class = new \ReflectionClass($className);
        $constructor = $class->getConstructor();

        if(!empty($constructor))
        {
            $constructor = $constructor->getParameters();
            $objects = new $className(...$this->makeParameters($constructor));
        }

        else
        {
            $objects = new $className;
        }

        return $objects;
    }

    public function makeParameters($parameters)
    {
        $objects = [];

        foreach ($parameters as $parameter) {
            $objects[] = $this->create($parameter->getClass()->name);
        }

        return $objects;
    }
}