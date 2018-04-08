<?php

namespace app\Actions;

class SumCalculateAction extends Action
{

    public function handle($data)
    {
        $sum = 0;
        if (is_array($data)){
            foreach ($data as $item){
                if (isset($item['value']) && is_int($item['value'])){
                    $sum += $item['value'];
                }
            }
        }
        printf("Сумма равна %d\n",$sum);
    }

    public function name()
    {
        return 'sum';
    }

    public function description()
    {
        return 'Выводит сумму значений по ключу value';
    }
}