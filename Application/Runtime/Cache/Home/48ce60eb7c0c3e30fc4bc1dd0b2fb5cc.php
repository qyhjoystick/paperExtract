<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>删选条件</title>
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
	.choose{
		display: flex;
		Justify-content:center;
		Align-items:center;
		width: 100%;
		height: 100%;
	}
	.content{
		display: flex;
		Justify-content:center;	
	}
	.type{
		position: relative;
		border:1.5px solid rgb(0,0,0);
		margin: 50px 25px;
		width: 25%;
		height: 300px;
		border-radius: 50px;
	}
	.extract{
		text-align: center;
		display: block;
		font-size: 30px;
	}
	.part{
		text-align: center;
		margin:10% 10%;
	}
</style>
<body>

<div class="content">
	<div class="type">
		<span class="extract">培养类型抽取</span>
		<div class="layui-form-item cen" style="margin-top:10%">
			<div class="part">
				<form action="" method="post">
					<span>全日制比例&nbsp&nbsp&nbsp：&nbsp</span>
					<input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入比例" class="layui-input" style="display:inline;width:50%">
					<span>%</span>
					<br>
					<br>
					<br>
					<span>非全日制比例：</span>
					<input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入比例" class="layui-input" style="display:inline;width:50%">
					<span>%</span>	
					<button class="layui-btn" lay-submit="" lay-filter="demo1">生成Excel</button>
				</form>
			</div>
		</div>
	</div>
	<div class="type">
		<span class="extract">学位类别抽取</span>
		<div class="layui-form-item cen" style="margin-top:10%">
			<div class="part">
				<form action="" method="post">
					<span>学术比例：</span>
					<input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入比例" class="layui-input" style="display:inline;width:50%">
					<span>%</span>
					<br>
					<br>
					<br>
					<span>专业比例：</span>
					<input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入比例" class="layui-input" style="display:inline;width:50%">
					<span>%</span>
					<button class="layui-btn" lay-submit="" lay-filter="demo1">生成Excel</button>
				</form>
			</div>
		</div>
	</div>
	<div class="type">
		<span class="extract">按学院专业抽取</span>
	</div>
</div>
        
<div class="content">
	<form class="layui-form" action="">
	  <div class="layui-form-item">
	    <div class="layui-input-block">
	    	<div style="margin-top:10px">
	    		<span>避免同一导师</span>
	    	</div>
	      	<input type="checkbox" checked="" name="open" lay-skin="switch" lay-filter="switchTest" lay-text="ON|OFF">
	    </div>
	  </div>
	</form>
</div>
		

 
          
<script src="/paperExtract/Public/layui/layui.js" charset="utf-8"></script>
<!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->
<script>
layui.use(['form', 'layedit', 'laydate'], function(){
  var form = layui.form
  ,layer = layui.layer
  ,layedit = layui.layedit
  ,laydate = layui.laydate;
  
  //日期
  laydate.render({
    elem: '#date'
  });
  laydate.render({
    elem: '#date1'
  });
  
  //创建一个编辑器
  var editIndex = layedit.build('LAY_demo_editor');
 
  //自定义验证规则
  form.verify({
    title: function(value){
      if(value.length < 5){
        return '标题至少得5个字符啊';
      }
    }
    ,pass: [/(.+){6,12}$/, '密码必须6到12位']
    ,content: function(value){
      layedit.sync(editIndex);
    }
  });
  
  //监听指定开关
  form.on('switch(switchTest)', function(data){
    layer.msg('避免同一导师：'+ (this.checked ? '打开' : '关闭'), {
      offset: '6px'
    });
    
  });
  
  //监听提交
  form.on('submit(demo1)', function(data){
    layer.alert(JSON.stringify(data.field), {
      title: '最终的提交信息'
    })
    return false;
  });
  
});
</script>
</body>
</html>