@extends('zzld-foundation::scaffold.layout-inline')

@section('content')
<section id="content_wrapper">
	<section id="content">
		<div class="alert alert-micro alert-border-left alert-success alert-dismissable" style="height:50px;">
		  <i class="fa fa-check pr10"></i>
		  <strong>添加成功!</strong>
		  <a href="#" class="alert-link">继续添加</a>.
		</div>
    </section>
</section>
@stop

@section('script')
<scritp>
layer.msg('.....');
</script>
@stop
