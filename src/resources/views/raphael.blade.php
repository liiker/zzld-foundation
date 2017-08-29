<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <title>Raphael 测试页面</title>
	<link rel="stylesheet" href="/plugins/context_menu/jquery.contextmenu.css">
	<style>
	body{padding:0px; margin:0px;}
	#paper{
		border: 2px solid #000;
		width: 1000px; height:700px;
		background: url(/img/net.jpg);
	}
	</style>
</head>
<body>
        
<div id="paper"></div>
</body>
<script src="/js/raphael.min.js"></script>
<script src="/js/workflow.js"></script>
<script src="/plugins/context_menu/jquery-1.6.2.min.js"></script>
<script src="/plugins/context_menu/jquery.contextmenu.js"></script>
<script>
//----------------------------------------------
var Workflow = __Workflow("paper");
Workflow.addNode(1, "开始节点", {x:100, y:200});
Workflow.addNode(2, "结束节点", {x:500, y:200});
console.log('arrays:', Workflow.connections);
//Workflow.connect(Workflow.nodes[0], Workflow.nodes[1], '#f0f', '#f0f|2');
Workflow.paper.path("M,10,50,L,100,50").attr({'arrow-end':'open-wide-long', 'stroke':'#ff0', 'stroke-width':2});


$(function() {
        $('#paper').contextPopup({
          title: '流程操作',
          items: [
            {label:'节点属性',     icon:'',             action:function() { alert('clicked 1') } },
            {label:'设计表单', icon:'',                action:function() { alert('clicked 2') } },
            {label:'设置处理人',     icon:'',              action:function() { alert('clicked 3') } },
            null, // divider
			{label:'添加节点', icon:'', action:function(event) { 
					//alert('clicked 4'); 
					var rect = {x: Workflow.event.offsetX, y: Workflow.event.offsetY};
					console.log("old rect:", rect, Workflow.event);
					Workflow.addNode(100, '节点名称', rect);
					console.log(event); } 
			},
            {label:'Cheese',        icon:'',                   action:function() { alert('clicked 5') } },
            {label:'Bacon',         icon:'', action:function() { alert('clicked 6') } },
            null, // divide
            {label:'Onwards',       icon:'',           action:function() { alert('clicked 7') } },
            {label:'Flutters',      icon:'',                    action:function() { alert('clicked 8') } }
          ]
        });
});
</script>
</html>
