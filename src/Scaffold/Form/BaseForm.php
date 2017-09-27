<?php
namespace Zzld/Foundation/Scaffold/Form;

/**
 * 表单
 */
class BaseForm
{
    private $fields = [];

    public function field($field)
    {
        $this->fields[] = $field;
    }

    /**
     * 渲染表单
     */
    public function render()
    {
    }

    public function __toString()
    {
        return $this->render();
    }
}