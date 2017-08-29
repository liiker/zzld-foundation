var valField = {};
var showField = {};
var currModel = '';
var showValue = '';

$(function(){
    //jquery csrf token support
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#check-all').on('change', function(){
        var status = this.checked;

        $('.grid').find(':checkbox').each(function(it){
            this.checked = status;
        });

    });

    $('.zzld-row-destory').on('click', function(){
        alert('..');
    });

    $('#btn-remove-all').on('click', function(){
        var ids = [];
        $('.grid').find(':checked').each(function(){
            ids.push($(this).val());
        });

        if(ids.length<1){
            alert('请选择要删除的数据');
            return;
        }

        if(!confirm('确定删除选中数据')){
            return;
        }

        var url = $(this).attr('url');

        $.post(url, {ids: ids}, function(data){
            console.log(data);
            if(data.code == 0){
                alert('删除成功');
                window.location.reload();
            }else{
                alert(data.message);
            }
        });
    });


    $('.datetimepicker').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss'
    });

    $('.datepicker').datetimepicker({
        format: 'YYYY-MM-DD',
        pickTime: false
    });

    $('.timepicker').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss'
    });

    $('.model-input').on('click', function(){
        valField = $('#'+$(this).attr('val-field'));
        showField = $('#'+$(this).attr('show-field'));
        currModel = $(this).attr('model');
        showValue = $(this).attr('show-value');

        var url = '/backend/scaffold/'+$(this).attr('model')+'/model/html';
        layer.open({
            type: 2,
            title: '选择数据',
            shadeClose: true,
            shade: false,
            maxmin: true, //开启最大化最小化按钮
            area: ['893px', '600px'],
            content: url
        });
    });

    initModelInput($('.model-input'));
});


function modelSelected(sid){
    valField.val(sid);
    var url = '/backend/scaffold/'+currModel+'/show/'+sid+'/json';
    console.log(url);
    $.get(url, {}, function(data){
        showField.val(data[showValue]);
        layer.closeAll();
    }, 'json');
}

function initModelInput(objs){
    console.log(objs);
    objs.each(function(){
        var self = $(this);
        valField = $('#'+self.attr('val-field'));
        showField = $('#'+self.attr('show-field'));
        currModel = self.attr('model');
        showValue = self.attr('show-value');
        console.log(valField.val());
        if(valField.val()){
            modelSelected(valField.val());
        }
    });
}
