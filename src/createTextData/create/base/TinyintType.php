<?php
namespace createTextData\create\base;

class TinyintType implements TypeInterface
{
    public $baseType = 'num';

    public $type = 'tinyint';

    private $min = -128;

    private $max = 127;

    private $unsign = 255;

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

