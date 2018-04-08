<?php

namespace app\Commands;

use app\Actions\Action;
use app\Http\MockHttpRequest;

class MockCommand extends Command implements InterfaceCommand
{
    protected $data;

    public static function about()
    {
        return 'Команда, выполняющая мокинг http-запроса';
    }

    public static function commandName()
    {
        return 'mock';
    }

    /**
     * @param Action $action
     */
    public function handleCommand($action)
    {
        if ($action){
            $action->handle($this->data);
        }
    }

    public function beforeAction($params = [])
    {
        if (empty($params)){
            $this->commandDetails(self::commandName());
            return false;
        }

        $mockReq = new MockHttpRequest('');
        $value = $mockReq->send();
        if (is_string($value)) {
            $value = json_decode($value, true);
            $this->data = $value['data'];
        }
        return true;
    }
}