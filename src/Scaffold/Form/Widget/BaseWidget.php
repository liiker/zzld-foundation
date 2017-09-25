<?php
namespace Zzld\Foundation\Scaffold\Form\Widget;

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
        if($id){
            $this->id   = $id;
        }
        if($name){
            $this->name = $name;
        }
    }

    public function render(){
        $html = "<{$this->tag}";
        foreach($this->attrs as $key=>$value){
            $html .= " {$key}=\"{$value}\"";
        }

        if($this->hasContent){
            $html .= ">";
            foreach($this->subWidgets as $widget){
                $html .= $widget->render();
            }
            $html .= "{$this->body}</{$this->tag}>";
        }else{
            $html .= "/>";
        }

        return $html;
    }

    public function body($body)
    {
        $this->body = $body;
        return $this;
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
        return $this;
    }

    public function __toString(){
        return $this->render();
    }
}
