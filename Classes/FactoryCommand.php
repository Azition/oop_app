<?php
/**
 * Created by PhpStorm.
 * User: azat
 * Date: 08.04.18
 * Time: 14:23
 */

namespace app;

use app\Commands\InterfaceCommand;

class FactoryCommand extends Factory
{
    private $_commands = [];

    function __construct(array $configure = [])
    {
        if (isset($configure['commands'])){
            foreach ($configure['commands'] as $name){
                if (new $name instanceof InterfaceCommand){
                    $this->_commands[] = $name;
                }
            }
        }
        parent::__construct($configure);
    }

    public function getCommandNameList() {
        return $this->_commands;
    }
}