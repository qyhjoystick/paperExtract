<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>layui</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="/paperExtract/Public/layui/css/layui.css"  media="all">
  <script src="/paperExtract/Public/jquery.js"></script>
  <!-- 注意：如果你直接复制所有代码到本地，上述css路径需要改成你本地的 -->
</head>
<style type="text/css">
	html, body{
		height: 100%
	}
	button{
		margin: 30px;
	}
</style>
<body>
<div style="display:flex;Justify-content:center;Align-items:center;width：100%;height:100%">

	<button type="button" class="layui-btn" id="test3" style="width:300px;height:300px;border-radius:30px"><i class="layui-icon" style="font-size:40px"></i><span style="font-size:40px">上传Excel</span></button>
	<button class="layui-btn layui-btn-normal" style="width:300px;height:300px;border-radius:30px" onclick="condition()"><span style="font-size:40px">选择条件<br>(已上传Excel)</span></button>
</div>

<script src="/paperExtract/Public/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript">
layui.use('upload', function(){
    var $ = layui.jquery,
    upload = layui.upload;
	upload.render({
	    elem: '#test3',
	    url: "<?php echo U('Index/upload');?>",
	    accept: 'file', //普通文件s
	    done: function(res){
	    	// console.log(res);
	    	window.location.href = "<?php echo U('Index/upload');?>";
	    }
	});
})
	
	// function upload(){
	// 	window.location.href = "<?php echo U('Index/upload');?>";
	// }
	function condition(){
		window.location.href = "<?php echo U('Index/condition');?>";
	}

</script>
</body>
</html>