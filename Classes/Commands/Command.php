<?php

namespace app\Commands;


use app\Actions\Action;

class Command
{
    private $_actionMap = [];

    function __construct($config = [])
    {
        if (isset($config['actions'])){
            foreach ($config['actions'] as $actionClass){
                /** @var Action $action */
                $action = new $actionClass();
                $this->_actionMap[$action->name()] = $action;
            }
        }
    }

    protected function getActions()
    {
        return $this->_actionMap;
    }

    protected function getActionByName($name)
    {
        return isset($this->_actionMap[$name]) ? $this->_actionMap[$name] : false;
    }

    public function commandDetails($commandName)
    {

        if (count($this->getActions()) > 0){
            printf("%s [OPTIONS]\n", $commandName);
            printf("Options:\n");
            /**
             * @var string $name
             * @var Action $action
             */
            foreach ($this->getActions() as $name => $action) {
                printf("\t%s - %s\n",$name, $action->description());
            }
        }
    }

    public function beforeAction($params = []) { return true; }

    public function afterAction() {}

    public function runAction($params = [])
    {
        if ($this->beforeAction($params)){
            if ($this instanceof InterfaceCommand){
                $this->handleCommand($this->getActionByName($params[0]));
            }
            $this->afterAction();
        }
    }
}