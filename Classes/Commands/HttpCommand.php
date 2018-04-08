<?php
/**
 * Created by PhpStorm.
 * User: azat
 * Date: 08.04.18
 * Time: 14:49
 */

namespace app\Commands;


class HttpCommand implements InterfaceCommand
{

    public static function about()
    {
        return 'Команда, запрашивающая данные по указанному URL';
    }

    public static function commandName()
    {
        return 'http';
    }

    public function handleCommand()
    {
        return 0;
    }

    public function commandDetails()
    {

    }
}