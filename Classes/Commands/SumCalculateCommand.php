<?php
/**
 * Created by PhpStorm.
 * User: azat
 * Date: 08.04.18
 * Time: 14:49
 */

namespace app\Commands;


class SumCalculateCommand implements InterfaceCommand
{

    /**  */
    public function about()
    {
        return 'Команда, запрашивающая данные по указанному URL и выводящая сумму по ключу value';
    }

    public static function commandName()
    {
        return 'sumValues';
    }

    public function handleCommand()
    {
        return 0;
    }
}