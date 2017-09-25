<?php
namespace Zzld\Foundation\Scaffold\Form\Widget;

/**
 * 下拉框控件类
 */
class SelectWidget extends BaseWidget
{
    public function __construct($id="", $name="")
    {
        parent::__construct("select", $id, $name);
    }

    /**
     * 设置下拉框中的选项
     *
     * 通过传入一个数组参数来生成选项内容， 使用方法如下：
     * ```$select = (new SelectWidget("id", "name"))->options([1=>"aaa", 2=>"bbb"]);```
     *
     * 注意: 当前不支持分组
     *
     * @param array $opts 数组格式如下： [1=>'aaa', 2=>'bbb']
     *
     * @return SelectWidget
     */
    public function options($opts)
    {
        foreach($opts as $key=>$val)
        {
            $option = (new BaseWidget("option"))->setAttr('value', $key)->body($val);
            $this->subWidgets[] = $option;
        }

        return $this;
    }
}
