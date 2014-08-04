<?php
namespace createTextData\create\base;

class IntType implements TypeInterface
{
    public $baseType = 'num';

    public $type = 'int';

    private $min = -2147483648;

    private $max = 2147483647;

    private $unsign = 4294957295;

    private $isUnsign = false;

    public function getContent()
    {   
        if ($this->isUnsign) {
            return mt_rand(0, $this->unsign);
        
        } else {
            return mt_rand($this->min, $this->max);

        }
    
    }

    public function set($key, $val)
    {
        return $this->$key = $val;
    
    }

    public function get($key)
    {
        return $this->$key;

    }
}

