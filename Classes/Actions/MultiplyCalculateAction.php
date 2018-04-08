<?php

namespace app\Actions;

class MultiplyCalculateAction extends Action
{

    public function handle($data)
    {
        $multiply = 1;
        if (is_array($data)){
            foreach ($data as $item){
                if (isset($item['value']) && is_int($item['value']) && $item['value'] % 2 === 0){
                    $multiply *= $item['value'];
                }
                if (isset($item['alt']) && is_int($item['alt']) && $item['alt'] % 2 !== 0){
                    $multiply *= $item['alt'];
                }
            }
        }

        printf("Произведение равна %d\n",$multiply);
    }

    public function name()
    {
        return 'multiply';
    }

    public function description()
    {
        return 'Перемножает между собой все чётные значения value и нечётные значения alt и выводит результат';
    }
}