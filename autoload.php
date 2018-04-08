<?php

class ClassAutoloader
{

    protected $mainDir = __DIR__ . DIRECTORY_SEPARATOR . 'Classes';
    protected $classMap = [];

    function __construct()
    {
        $this->init();
    }

    protected function init()
    {
        $this->registerLoader();
    }

    private function registerLoader()
    {
        spl_autoload_register([$this, 'loadClass'], true, false);
    }

    protected function loadClass($class)
    {
        $class = self::normalizeName($class);

        foreach ($this->classMap as $name => $path){
            if ($name == $class) {
                return $path;
            }
        }

        $path = $this->findFile($class);
        if ($path) {
            includeFile($path);
        } else {
            throw new LogicException('File not found');
        }
        return 0;
    }

    protected function findFile($class)
    {
        $dirList[] = $this->mainDir;

        do {
            $isFinishFind = true;
            $path = array_pop($dirList);
            $dir = opendir($path);
            while (($name = readdir($dir)) !== false){
                if (in_array($name, ['.','..'])) continue;
                $absPath = $path . DIRECTORY_SEPARATOR . $name;
                if (is_dir($absPath)) {
                    $dirList[] = $absPath;
                    $isFinishFind = false;
                } else {
                    if ($this->checkFile($absPath, $class)) {
                        $this->classMap[$class] = $absPath;
                        return $absPath;
                    }
                }
            }
        } while(!$isFinishFind);

        return false;
    }

    protected function checkFile($path, $class)
    {
        $name = basename($path, '.php');
        return $name === $class;
    }

    public static function normalizeName($class)
    {
        $classPathArray = explode('\\',$class);
        return $classPathArray[count($classPathArray) - 1];
    }
}

function includeFile($file)
{
    include $file;
}