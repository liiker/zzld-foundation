<?php
namespace Zzld\Foundation\Support;

use Zzld\Foundation\Support\Widget\BaseField;

class FormMaker
{
    private $model = null;
    private $modelIns = null;

    private $fields = [];

    public function field($label, BaseField $field, $help_text=""){
        $this->fields[] = [
            'label' => $label,
            'field' => $field,
            'help_text' => $help_text,
        ];
        return $this;
    }

    public function render()
    {
        $html = "<div class=\"form-group\" >";
        foreach($this->fields as $field){
            $html .= "<label class=\"col-lg-3 control-label\">{$field['label']}</label>";
            $html .= "<div class=\"bs-component\">";
            $html .= "<div class=\"col-lg-6\">";
            $html .= $field['field']->render();
            $html .= "</div>";
            $html .= "</div>";
            $html .= "<div class=\"col-lg-3 form-control-static\">{$field['help_text']}</div>";

            $html .= "</div>";
        }
        $html .= "</div>";

        return $html;
    }

    public function __toString()
    {
        return $this->render();
    }

}