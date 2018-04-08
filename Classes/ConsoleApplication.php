<?php

namespace app;
use app\Commands\InterfaceCommand;

/**
 * Created by PhpStorm.
 * User: azat
 * Date: 08.04.18
 * Time: 13:47
 */
class ConsoleApplication extends Application
{
    protected function showCommandList (){
        printf("%s COMMAND [OPTIONS]\n",$_SERVER['SCRIPT_NAME']);
        printf("Commands:\n");
        /** @var InterfaceCommand $className */
        foreach ($this->factory->getCommandNameList() as $className) {
            printf("\t%s - %s\n", $className::commandName(), $className::about());
        }
    }

    public function run()
    {
        $this->handleArguments();
    }

    protected function handleArguments()
    {
        if (!empty($_SERVER['argv'])){
            $argv = $_SERVER['argv'];

            if (count($argv) === 1){
                $this->showCommandList();
            } elseif (count($argv) === 2){

            } else {

            }
        }
    }
}