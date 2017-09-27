<?php
namespace Zzld\Foundation\Scaffold\Form\Field;

use Zzld\Foundation\Scaffold\Form\Widget\InputWidget;

/**
 * 表单
 */
class BaseField
{
    protected $widget;

    protected $name = "";
    protected $errorMessage = [];
    protected $label = "";
    protected $helpText = "";
    protected $required = true;
    protected $validator = [];

    public function __construct($name, $label="", $helpText="")
    {
        $this->name = $name;
        $this->label = $label;
        $this->helpText = $helpText;
        $this->widget = new InputWidget("id_".$name, $name);
    }

    /**
     * 渲染
     */
    public function render()
    {
        $html = "<div class=\"form-group\">";
        $html .= "<label class=\"control-label\" for=\"{$this->name}\">{$this->label}</label>";
        $html .= $this->widget->render();
        $html .= "<span>{$this->helpText}</span>";
        $html .= "</div>";
        return $html;
    }

    public function __toString()
    {
        return $this->render();
    }
}
