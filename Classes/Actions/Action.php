<?php

namespace app\Actions;

abstract class Action
{
    abstract public function handle($data);
    abstract public function name();
    abstract public function description();
}