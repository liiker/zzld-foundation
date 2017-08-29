<?php

namespace Zzld\Foundation\Support\Widget;

class BaseField
{
    public $type = "text";
    public $name = "";
    public $value = null;
    public $options = [];

    public function __construct($name, $value, $options=[]){
        $this->name = $name;
        $this->value = $value;
        $this->options = $options;
    }

    public function render()
    {
        $options = " ";
        foreach($this->options as $key=>$value){
            $options .= "\"{$key}\"=\"$value\"";
        }
        return "<input type=\"{$this->type}\" name=\"{$this->name}\" vlaue=\"{$this->value}\" {$options} />";
    }

    public function __toString(){
        return $this->render();
    }
}