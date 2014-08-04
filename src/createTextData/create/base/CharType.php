<?php
namespace createTextData\create\base;

use createTextData\create\base\Content;

class CharType implements TypeInterface
{
    public $baseType = 'string';

    public $type = 'char';

    private $len = 85; 

    public function getContent()
    {
        $content = new Content;
        $content = $content->ContentText();
        $content = str_split($content, 3);

        $count = count($content) - 1;
        $str = '';

        for($i = 0; $i < $this->len; $i++) {
            $str .= $content{mt_rand(0, $count)};
        }
        return $str;
    }
}

