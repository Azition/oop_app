<?php


namespace app\Commands;

use app\Actions\Action;
use app\Http\HttpRequest;

class HttpCommand extends Command implements InterfaceCommand
{
    protected $data;

    CONST URL_REQUEST = 'https://gist.githubusercontent.com/appelsin/d9cc31889a8af9cd36528f81420642af/raw/35f7f827c3db47a801822b824957e676ff5b710c/gistfile1.txt';

    public static function about()
    {
        return 'Команда, запрашивающая данные по указанному URL';
    }

    public static function commandName()
    {
        return 'http';
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

        $httpReq = new HttpRequest(self::URL_REQUEST);
        $value = $httpReq->send();
        if (is_string($value)){
            $value = json_decode($value, true);
            $this->data = $value['data'];
        }
        return true;
    }
}