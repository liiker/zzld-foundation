<?php
namespace Zzld\Foundation\Support\Widget;

class BaseWidget
{
    public $tag = "";
    public $body = "";
    public $hasContent = true;
    public $attrs = [];
    public $subWidgets = [];

    public function __construct($tag, $id="", $name="")
    {
        $this->tag  = $tag;
        $this->id   = $id;
        $this->name = $name;
    }

    public function render(){
        $html = "<{$this->tag}";
        foreach($this->attrs as $key=>$value){
            $html .= " {$key}=\"{$value}\"";
        }

        foreach($this->subWidgets as $widget){
            $html .= $widget->render();
        }

        if($this->hasContent){
            $html .= ">{$this->body}</{$this->tag}>";
        }else{
            $html .= "/>";
        }

        return $html;
    }

    public function __set($name, $value)
    {
        $this->setAttr($name, $value);
    }

    public function setAttr($name, $value)
    {
        $this->attrs[$name] = $value;
        return $this;
    }

    public function getAttr($name){
        return $this->attrs[$name];
    }

    /**
     * 添加子控件
     */
    public function addSubWidgets($widget){
        $this->subWidgets[] = $widget;
    }

    public function __toString(){
        return $this->render();
    }
}