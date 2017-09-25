<?php
namespace Zzld\Foundation\Scaffold\Form\Widget;

class TextareaWidget extends BaseWidget
{
    public function __construct($id="", $name="")
    {
        parent::__construct("textarea", $id, $name);
    }

    public function body($body)
    {
        $this->body = $body;
        return $this;
    }
}
