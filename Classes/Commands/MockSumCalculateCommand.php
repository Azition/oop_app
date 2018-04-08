<?php
/**
 * Created by PhpStorm.
 * User: azat
 * Date: 08.04.18
 * Time: 14:57
 */

namespace app\Commands;


class MockSumCalculateCommand implements InterfaceCommand
{

    /**  */
    public function about()
    {
        return 'Команда, выполняющий мокинг http-запроса';
    }

    public static function commandName()
    {
        return 'mockSumValue';
    }

    public function handleCommand()
    {
        return 0;
    }
}