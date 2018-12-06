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
	.add, .minus{
		position:absolute;
		margin-top: -2%;
		margin-left: -11%;
		border-radius: 10px;
		z-index: 1;
	}

	.layui-form-label{
		z-index: -1;
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
	.some{
		position: relative;
	}
	.switch{
		position:relative;
		margin-left: 38%;
	}
	.fontt{
		font-size: 30px;
		text-align: center;
	}
	.layui-form-switch{
		min-width: 102px;
	}
</style>
<body>

<div class="content">
	<div class="type" style="height:345px">
		<br>
		<br>
		<span class="extract">按比例抽取</span>
		<div class="layui-form-item cen" style="margin-top:10%">
			<div class="part">
				<form action="<?php echo U('Index/cultivate');?>" method="post">
					
					<br>
					<br>
					<br>
					<span>抽取比例：</span>
					<input type="text" name="partTime" lay-verify="title" autocomplete="off" placeholder="请输入比例" class="layui-input" style="display:inline;width:50%">
					<span>%</span>	
					<input type="hidden" name="tutor" value="1" class="tutor">
					<button class="layui-btn" lay-submit="" lay-filter="demo2" style="margin-top:50px">生成Excel</button>
				</form>
			</div>
		</div>
	</div>
	

	<div class="type" style="height:100%">
		<br>
		<br>
		<span class="extract">学院专业抽取</span>
		<div class="part">
			<form class="layui-form" action="<?php echo U('Index/academy');?>" method="post">
				<div id="all">
					<div class="layui-form-item cen" id="1">
						<div class="add">
							<button class="layui-btn layui-btn-sm" onclick="addChoose(event)" type="button"><i class="layui-icon addmin"></i></button>
						</div>
					    <label class="layui-form-label">学院：</label>
					    <div class="layui-input-block" >
					      <select name="academy1">
					        <option value="">请选择省</option>
					        <option value="浙江">浙江省</option>
					        <option value="江西省">江西省</option>
					        <option value="福建省">福建省</option>
					      </select>
					    </div>
					    <label class="layui-form-label">专业：</label>
					    <div class="layui-input-block">
					      <select name="special1">
					        <option value="">请选择市</option>
					        <option value="杭州">杭州</option>
					        <option value="宁波">宁波</option>
					        <option value="温州">温州</option>
					        <option value="温州">台州</option>
					        <option value="温州">绍兴</option>
					      </select>
					    </div>
					    <div>
					    	<span>抽取比例：</span>
							<input type="text" name="percent1" lay-verify="title" autocomplete="off" placeholder="请输入比例" class="layui-input rate" style="display:inline;width:40%">
							<span>%</span>
					    </div>
					</div>
				</div>
			    <input type="hidden" name="tutor" value="1" class="tutor">
				<button class="layui-btn" lay-submit="" lay-filter="demo3" style="margin-top:10px">生成Excel</button>
				
			</form>	
		</div>
	</div>



</div>
<div class="fontt">
	<span>避免同一导师</span>
</div> 
<br>
<div class="switch">
	<form class="layui-form" action="">
	  <div class="layui-form-item">
	    <div class="layui-input-block">
	      	<input type="checkbox" checked="" name="open" lay-skin="switch" lay-filter="switchTest" lay-text="ON|OFF" style="width:102px">
	    </div>
	  </div>
	</form>
</div>
		

 
          
<script src="/paperExtract/Public/layui/layui.js" charset="utf-8"></script>
<!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->
<script>
layui.use(['form', 'layedit', 'laydate'], function(){
  form = layui.form
  ,layer = layui.layer
  ,layedit = layui.layedit
  ,laydate = layui.laydate;
  //监听指定开关
  form.on('switch(switchTest)', function(data){
    layer.msg('避免同一导师：'+ (this.checked ? '打开' : '关闭'), {
      offset: '6px'
    });
    var el = document.getElementsByClassName('tutor');
    for(let i=0;i<el.length;i++){
    	el[i].value = this.checked ? 1 : 0;
    }
  });
});


var number = 1;

function addChoose(event){

	number++;
	var first = document.getElementById('1');
	var clone = first.cloneNode(true);
	clone.setAttribute("id",number);
	clone.getElementsByClassName("rate")[0].value = '';
	clone.getElementsByClassName("add")[0].innerHTML = '<button class="layui-btn layui-btn-sm" type="button">&nbsp一&nbsp</button>';
	clone.getElementsByTagName("button")[0].addEventListener("click",deleteChoose);
	first.parentNode.appendChild(clone);
	form.render();

}

function deleteChoose(event){
	var el = event.target.parentNode.parentNode;
	console.log(el);
	var dele = el.getAttribute('id');
	console.log(dele);
	var remove = document.getElementById(dele);
	console.log(remove);
	remove.parentNode.removeChild(remove);
	form.render();
}


</script>
</body>
</html>