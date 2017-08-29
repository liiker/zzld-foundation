<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $table = '{{table}}';
    protected $fillable = [{% for col in columns %}'{{col.COLUMN_NAME}}', {% endfor %}];

    public function search_list(){
        return ['field_a', 'field_b'];
    }

    public function display_list(){
        return [{% for col in columns %}'{{col.COLUMN_NAME}}', {% endfor %}];
    }

    public function model_bind(){
        return ['modela', 'modelb'];
    }

    public function admin_field(){
        return [
            {% for col in columns %}'{{col.COLUMN_NAME}}' => [
                'label' => '',
            {% if col.DATA_TYPE == 'text' %}
            'widget' => [
                    'name' => 'textarea', //richeditor
                ],
            {% elseif col.DATA_TYPE == 'date' %}
            'widget' => [
                    'name' => 'date', //richeditor
                ],
            {% elseif col.DATA_TYPE == 'time' %}
            'widget' => [
                    'name' => 'time', //richeditor
                ],
            {% elseif col.DATA_TYPE == 'datetime' %}
            'widget' => [
                    'name' => 'datetime', //richeditor
                ],
            {% elseif col.DATA_TYPE == 'timestamp' %}
            'widget' => [
                    'name' => 'datetime', //richeditor
                ],
            {% endif %}
],

            {% endfor %}
];
    }
}
