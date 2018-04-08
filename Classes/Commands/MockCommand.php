<?php
/**
 * Created by PhpStorm.
 * User: azat
 * Date: 08.04.18
 * Time: 14:57
 */

namespace app\Commands;


class MockCommand implements InterfaceCommand
{

    /**  */
    public static function about()
    {
        return 'Команда, выполняющий мокинг http-запроса';
    }

    public static function commandName()
    {
        return 'mock';
    }

    public function handleCommand()
    {
        return 0;
    }

    public function commandDetails()
    {

    }
}