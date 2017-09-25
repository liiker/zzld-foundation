<?php
namespace Zzld\Foundation\Test;

use PHPUnit\Framework\TestCase;
use Zzld\Foundation\Scaffold\Form\Widget\BaseWidget;
use Zzld\Foundation\Scaffold\Form\Widget\InputWidget;
use Zzld\Foundation\Scaffold\Form\Widget\TextareaWidget;
use Zzld\Foundation\Scaffold\Form\Widget\SelectWidget;

class WidgetTest extends TestCase
{
    public function testNoBodyWidget()
    {
        $input = new BaseWidget("input", "userid", "username");
        // $input->name = "username";
        $input->hasContent = false;
        $input->setAttr("type", "text");

        //test render method
        $this->assertEquals("<input id=\"userid\" name=\"username\" type=\"text\"/>", $input->render());

        //test __toString method
        $this->assertEquals("<input id=\"userid\" name=\"username\" type=\"text\"/>", $input);

    }

    public function testWithBodyWidget()
    {
        $textarea = (new BaseWidget("textarea", "", "desc"))->setAttr("style", "width:100%; height:200px;");
        $textarea->body = "This is desc!";

        $html = '<textarea name="desc" style="width:100%; height:200px;">This is desc!</textarea>';

        $this->assertEquals($html, $textarea);
    }

    public function testInputWidget()
    {
        $input = new InputWidget("userid", "username");//->setAttr('type', 'text');
        // $input->type="text";

        $html = '<input type="text" id="userid" name="username"/>';

        //test string
        $this->assertEquals($html, $input->render());

        $input->type = "password";
        $html = '<input type="password" id="userid" name="username"/>';
        $this->assertEquals($html, $input->render());
    }

    public function testTextareaWidget()
    {
        $textarea = (new TextareaWidget("userid", "username"))->body('hello, world');
        // $textarea->body('hello, world');
        $html = '<textarea id="userid" name="username">hello, world</textarea>';
        $this->assertEquals($html, $textarea->render());
    }

    public function testSelectWidget()
    {
        $select = (new SelectWidget("id", "name"))->options(
            [
                1 => 'aaa',
                2 => 'bbb',
            ]

        );

        $html = '<select id="id" name="name"><option value="1">aaa</option><option value="2">bbb</option></select>';
        
        $this->assertEquals($html, $select->render());
    }
}