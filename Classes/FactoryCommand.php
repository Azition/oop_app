<?php

namespace app;

use app\Commands\InterfaceCommand;

class FactoryCommand extends Factory
{
    private $_commands = [];
    private $_actions = [];

    function __construct(array $configure = [])
    {
        if (isset($configure['commands'])){
            foreach ($configure['commands'] as $command){
                if (is_array($command)){
                    $name = $command['class'];
                } elseif (is_string($command)) {
                    $name = $command;
                } else {
                    continue;
                }
                if (new $name instanceof InterfaceCommand){
                    $this->_commands[] = $name;
                    if (is_array($command) && isset($command['actions'])){
                        $this->_actions[$name] = $command['actions'];
                    }
                }
            }
        }
        parent::__construct($configure);
    }

    public function getCommandNameList()
    {
        return $this->_commands;
    }

    public function getCommand($name)
    {
        /** @var InterfaceCommand $commandClass */
        foreach ($this->_commands as $commandClass) {
            if ($name === $commandClass::commandName()){
                return new $commandClass([
                    'actions' => isset($this->_actions[$commandClass]) ? $this->_actions[$commandClass] : []
                ]);
            }
        }
    }

    public function getCommandActions($command)
    {
        return (isset($this->_actions[$command])) ? $this->_actions[$command] : [];
    }
}