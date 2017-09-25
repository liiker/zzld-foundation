<?php
namespace Zzld\Foundation\Scaffold\Form\Widget;

class InputWidget extends BaseWidget
{
    public function __construct($id="", $name="")
    {
        $this->type = 'text';
        $this->hasContent = false;
        parent::__construct("input", $id, $name);
    }
}