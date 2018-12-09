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
		width: 50%;
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

	.layui-unselect, .layui-form-select{
		display: inline-block;
		width: 150px;
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
		margin-left: 36%;
	}
	.fontt{
		font-size: 30px;
		text-align: center;
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
				<form action="<?php echo U('Index/major');?>" method="post">
					
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
<!--***********************all开始 ************************-->
				<div id="all">
					<div class="layui-form-item cen" id="1" style="position:relative">
						<div class="add">
							<button class="layui-btn layui-btn-sm" onclick="addChoose(event)" type="button"><i class="layui-icon addmin"></i></button>
						</div>

						<div class="academy">
							<label class="layui-form-label">学院：</label>
						    <div class="layui-input-block">
						      	<select name="academy1" lay-filter="academy1">
						      		<option value="">请选择学院</option>
						      		<?php if(is_array($list2)): $i = 0; $__LIST__ = $list2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["academy"]); ?>"><?php echo ($vo["academy"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
						      	</select>
						      	<div style="display:inline">
									<input type="text" name="academyDefault1" lay-verify="title" autocomplete="off" placeholder="学院默认比例" class="layui-input rate" style="display:inline;width:30%">
									<span>%</span>
								</div>
						    </div>
						</div>
					    
					    <br>

					    
					    <div class="special" style="position:relative">
					    	<label class="layui-form-label">专业：</label>
							    <div class="layui-input-block">
							      	<select name="special1">
								        <option value="">请选择专业</option>

								
										</volist>
								        <!-- <option value="杭州">杭州</option>
								        <option value="宁波">宁波</option>
								        <option value="温州">温州</option>
								        <option value="台州">台州</option>
								        <option value="绍兴">绍兴</option> -->
							        </select>
								    <div style="display:inline">
										<input type="text" name="percent1" lay-verify="title" autocomplete="off" placeholder="抽取比例" class="layui-input rate sss" style="display:inline;width:30%">
										<span>%</span>
								    </div>
								    <br>
								</div>
							<button class="layui-btn layui-btn-xs layui-btn-normal" style="position:absolute;border-radius:10px;right:0px;top:-24px;z-index:2;width: 22px;" onclick="addSpecial(event)" type="button">+</button>	
					    </div>


					    <hr>   
					</div>
				</div>
<!--***********************all结束 ************************-->

				<div class="default choose">
					<span>未选学院抽取比例：</span>
					<input type="text" name="default" lay-verify="title" autocomplete="off" placeholder="请输入比例" class="layui-input rate rest" style="display:inline;width:20%">
					<span>%</span>
				</div>
			    <input type="hidden" name="tutor" value="1" class="tutor">
				<button class="layui-btn" lay-submit="" lay-filter="demo3" style="margin-top:10px" type="button" onclick="submitt()">生成Excel</button>
				
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
	
  form.on('select(academy1)', function(data){
	console.log(data.value);
            // $.getJSON("/api/getCity?pid="+data.value, function(data){
            //     var optionstring = "";
            //     $.each(data.data, function(i,item){
            //         optionstring += "<option value=\"" + item.code + "\" >" + item.name + "</option>";
            //     });
            //     $("#city").html('<option value=""></option>' + optionstring);
            //     form.render('select'); //这个很重要
  });

});





var number = 1;
var spe    = 1;

function addChoose(event){

	number++;
	var first = document.getElementById('1');
	var clone = first.cloneNode(true);
	clone.setAttribute("id",number);
	clone.getElementsByClassName("rate")[0].value = '';
	clone.getElementsByClassName("rate")[1].value = '';
	clone.getElementsByClassName("add")[0].innerHTML = '<button class="layui-btn layui-btn-sm" type="button">&nbsp一&nbsp</button>';
	clone.getElementsByTagName("button")[0].addEventListener("click",deleteChoose);
	while(clone.getElementsByClassName("special").length>1){
		clone.removeChild(clone.getElementsByClassName("special")[1]);
	}
	// var newel = document.createElement("hr");
	// clone.appendChild(newel);
	first.parentNode.appendChild(clone);
	form.render();
}

function deleteChoose(event){
	var el = event.target.parentNode.parentNode;
	// console.log(el);
	var dele = el.getAttribute('id');
	// console.log(dele);
	var remove = document.getElementById(dele);
	// console.log(remove);
	remove.parentNode.removeChild(remove);
	form.render();
}

function addSpecial(event){
	spe++;
	
	// debugger;
	var el = event.target.parentNode; //special
	var clone = el.cloneNode(true);



	var hr = el.parentNode.getElementsByTagName("hr")[0];
	// console.log(hr);

	clone.getElementsByTagName("select")[0].setAttribute("name","special"+spe);
	clone.getElementsByClassName("sss")[0].setAttribute("name","percent"+spe);
	clone.getElementsByTagName("button")[0].innerHTML = "—"; //把第一个+按钮改为-
	clone.getElementsByTagName("button")[0].removeAttribute("onclick");
	clone.getElementsByTagName("button")[0].addEventListener("click",minusSpecial);
	// console.log(clone);
	clone.getElementsByClassName("sss")[0].value = "";

	el.parentNode.insertBefore(clone,hr);

	form.render();
	// console.log(el);
}

function minusSpecial(event){
	var spe = event.target.parentNode
	event.target.parentNode.parentNode.removeChild(spe);
}

function submitt(){
	var all = document.getElementById("all");
	console.log(all.childNodes[3]);
	//用于存放发送数据的数组
	var data = [];
	//拥有id节点个数
	var idnumber = all.childNodes.length-2;
	console.log(idnumber);





	for(let i = 1 ;i < idnumber+1 ; i++){
		var academy = [];
		var selectnumber = all.childNodes[i*2-1].getElementsByTagName("select").length;
		for(let j = 0 ; j < selectnumber ; j++){
			academy.push(all.childNodes[i*2-1].getElementsByTagName("select")[j].value);
		}
		var inputnumber = all.childNodes[i*2-1].getElementsByClassName("rate").length;
		for(let j = 0 ; j < inputnumber ; j++){
			academy.push(all.childNodes[i*2-1].getElementsByClassName("rate")[j].value);
		}
		data.push(academy);
	}
	console.log(data);
	// debugger;



	// $.ajax({
	// 	type:"POST",
	// 	url:"<?php echo U('Index/degree');?>",
	// 	data:{data:data},
	// 	dataType:"json",
	// 	success:function(callback){
	// 		alert('成功');
	// 	},
	// 	error:function(XMLHttpRequest, textStatus, errorThrown){
	// 		// 状态码
 //            console.log(XMLHttpRequest.status);
 //            // 状态
 //            console.log(XMLHttpRequest.readyState);
 //            // 错误信息   
 //            console.log(textStatus);
	// 	}
	// });
}

</script>
</body>
</html>