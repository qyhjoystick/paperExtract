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
</style>
<body>

          

<div class="choose">
	<form class="layui-form" action="">
	  <div class="layui-form-item">
	    <label class="layui-form-label">复选框</label>
	    <div class="layui-input-block">
	      <input type="checkbox" name="like[write]" title="写作">
	      <input type="checkbox" name="like[read]" title="阅读" checked="">
	      <input type="checkbox" name="like[game]" title="游戏">
	    </div>
	  </div>
	  
	  <div class="layui-form-item" pane="">
	    <label class="layui-form-label">原始复选框</label>
	    <div class="layui-input-block">
	      <input type="checkbox" name="like1[write]" lay-skin="primary" title="写作" checked="">
	      <input type="checkbox" name="like1[read]" lay-skin="primary" title="阅读">
	      <input type="checkbox" name="like1[game]" lay-skin="primary" title="游戏" disabled="">
	    </div>
	  </div>

	  <div class="layui-form-item">
	    <label class="layui-form-label">开关-默认开</label>
	    <div class="layui-input-block">
	      <input type="checkbox" checked="" name="open" lay-skin="switch" lay-filter="switchTest" lay-text="ON|OFF">
	    </div>
	  </div>
	  <div class="layui-form-item">
	    <label class="layui-form-label">单选框</label>
	    <div class="layui-input-block">
	      <input type="radio" name="sex" value="男" title="男" checked="">
	      <input type="radio" name="sex" value="女" title="女">
	      <input type="radio" name="sex" value="禁" title="禁用" disabled="">
	    </div>
	  </div>
	  <div class="layui-form-item">
	    <div class="layui-input-block">
	      <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
	      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
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
    layer.msg('开关checked：'+ (this.checked ? 'true' : 'false'), {
      offset: '6px'
    });
    layer.tips('温馨提示：请注意开关状态的文字可以随意定义，而不仅仅是ON|OFF', data.othis)
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