<?php

namespace app;

abstract class Application
{
    /** @var $factory FactoryCommand */
    protected $factory;

    function __construct($configure = [])
    {
        if (is_array($configure)){
            if (isset($configure['factory'])){
                $this->initFactory($configure['factory']);
            }
        }

        $this->init();
    }

    protected function init()
    {
        if ($this->factory === null){
            $this->initFactory();
        }
    }

    abstract public function run ();

    protected function initFactory($factoryConfiguration = [])
    {
        if (is_array($factoryConfiguration)){
            if (isset($factoryConfiguration['class'])){
                $className = $factoryConfiguration['class'];
                $this->factory = new $className;
            } else {
                $this->factory = new FactoryCommand($factoryConfiguration);
            }
        }
    }
}