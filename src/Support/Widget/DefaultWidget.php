<?php
namespace Zzld\Foundation\Support\Widget;

class DefaultWidget
{
    public $id = "";
    public $name = "";
    public $tag = "";
    public $isCloseTag = true;
    public $attrs = [];
    public $subWidgets = [];


    public function render(){
        $html = "<{$this->tag} id=\"{$this->id}\" name=\"{$this->name}\" ";
        foreach($this->attrs as $key=>$value){
            $html .= " \"{$key}\"=\"{$value}\"";
        }

        foreach($this->subWidgets as $widget){
            $html .= $widget->render();
        }
        if($this->isCloseTag){
            $html .= "></{$tag}>";
        }

        return $html;
    }

    /**
     * 添加子控件
     */
    public function addSubWidgets($widget){
        $this->subWidgets = $widget;
    }
}