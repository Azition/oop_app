<?php

namespace app\Commands;

interface InterfaceCommand
{
    /**  */
    public function about();
    public static function commandName();
    public function handleCommand();
}