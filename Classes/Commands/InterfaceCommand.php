<?php

namespace app\Commands;

interface InterfaceCommand
{
    /**  */
    public static function about();
    public static function commandName();
    public function commandDetails();
    public function handleCommand();
}