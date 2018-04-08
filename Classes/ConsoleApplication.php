<?php

namespace app;
use app\Commands\Command;
use app\Commands\InterfaceCommand;

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
            } elseif (count($argv) > 1){
                /** @var Command $command */
                $command = $this->factory->getCommand($argv[1]);
                $command->runAction(array_slice($argv,2));
            }
        }
    }
}