<?php
namespace Zzld\Foundation\Support;

class GridMaker
{
    private $model = null;
    private $modelIns = null;
    private $cached = false;

    private $columns = [];
    private $column_wraper = [];
    private $row_wraper = null;

    /**
     * 启用缓存
     */
    public function cachedEnable()
    {
        $this->cached = true;
        return $this;
    }

    /**
     * 设置数据列表的展示列
     */
    public function column($name, $options)
    {
        $this->columns[$name] = $options;
        return $this;
    }

    /**
     * 设置绑定模型
     */
    public function model($model)
    {
        $this->model = $model;
        return $this;
    }

    /**
     * 列包装器
     */
    public function columnWrapper($column, $fun)
    {
        $this->column_wraper[$column] = $fun;
        return $this;
    }

    /**
     * 行包装器
     */
    public function rowWrapper($wrapper)
    {
        $this->row_wraper = $wrapper;
        return $this;
    }

    /**
     * 渲染表格
     */
    public function render()
    {
        return " ";
    }

    /**
     * 默认渲染
     */
    public function __toString()
    {
        $this->render();
    }
}