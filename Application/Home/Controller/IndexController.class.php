<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover,{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }
    public function hello(){

    	$this->display();
    }

    public function upload(){
    	if(IS_POST){
    		$upload = new \Think\Upload();// 实例化上传类
		    $upload->maxSize   =     3145728000 ;// 设置附件上传大小
		    $upload->exts      =     array('xls', 'xlsx');// 设置附件上传类型
		    $upload->rootPath  =     './Public/upload/'; // 设置附件上传根目录
		    // $upload->savePath  =     ''; // 设置附件上传（子）目录
		    // 上传文件 
		    $upload->saveName  = 'test';
		    $upload->replace   = true;
		    $upload->autoSub   = false;
		    $info   =   $upload->upload();
		    // echo $info;
		    if(!$info) {// 上传错误提示错误信息
		        $this->error($upload->getError());
		    }else{// 上传成功
		        $this->success('上传成功!');
		    }
    	}else{
    		$path = './Public/upload/test.xls';
    		//Excel的数据数组
    		$source = $this->excel($path);
            
    		// var_dump($source);die;

    		/*将data导入数据库*/
   			$data = M('data');
            // var_dump($source[2]);die();

            // $i=2;
            // $dataList[] = array(
            //     'number'          => $source[2]['A'], //'A' => string '学号' (length=6)
            //     'grade'           => $source[2]['B'], //'B' => string '年级' (length=6)
            //     'name'            => $source[2]['C'], //'C' => string '姓名' (length=6)
            //     'sex'             => $source[2]['D'], //'D' => string '性别' (length=6)
            //     'idcard'          => $source[2]['E'], //'E' => string '证件号码' (length=12)
            //     'cultivationType' => $source[2]['F'], //'F' => string '培养类型' (length=12)
            //     'academy'         => $source[2]['G'], //'G' => string '学院' (length=6)
            //     'major'           => $source[2]['H'], //'H' => string '专业' (length=6)
            //     'majorCode'       => $source[2]['I'], //'I' => string '专业代码' (length=12)
            //     'tutor'           => $source[2]['J'], //'J' => string '导师' (length=6)
            //     'expirationDate'  => $source[2]['K'], //'K' => string '到期时间' (length=12)
            //     'degreeType'      => $source[2]['L'], //'L' => string '学位类别' (length=12)
            // );

            // $dataList[] = array(
            //     'number'          => $source[3]['A'], //'A' => string '学号' (length=6)
            //     'grade'           => $source[3]['B'], //'B' => string '年级' (length=6)
            //     'name'            => $source[3]['C'], //'C' => string '姓名' (length=6)
            //     'sex'             => $source[3]['D'], //'D' => string '性别' (length=6)
            //     'idcard'          => $source[3]['E'], //'E' => string '证件号码' (length=12)
            //     'cultivationType' => $source[3]['F'], //'F' => string '培养类型' (length=12)
            //     'academy'         => $source[3]['G'], //'G' => string '学院' (length=6)
            //     'major'           => $source[3]['H'], //'H' => string '专业' (length=6)
            //     'majorCode'       => $source[3]['I'], //'I' => string '专业代码' (length=12)
            //     'tutor'           => $source[3]['J'], //'J' => string '导师' (length=6)
            //     'expirationDate'  => $source[3]['K'], //'K' => string '到期时间' (length=12)
            //     'degreeType'      => $source[3]['L'], //'L' => string '学位类别' (length=12)
            // );
            

            // $result = $data->data($dataList)->add(); //单条记录插入
            // $data->addAll($dataList);die;

            $stu_num = count($source);//1524人
            // echo $stu_num;die;
            for($i = 2 ; $i < $stu_num+1 ; $i++){
                $dataList = array(  //单条插入
                // $dataList[] = array(  //批量插入
                    'number'          => $source[$i]['A'], //'A' => string '学号' (length=6)
                    'grade'           => $source[$i]['B'], //'B' => string '年级' (length=6)
                    'name'            => $source[$i]['C'], //'C' => string '姓名' (length=6)
                    'sex'             => $source[$i]['D'], //'D' => string '性别' (length=6)
                    'idcard'          => $source[$i]['E'], //'E' => string '证件号码' (length=12)
                    'cultivationType' => $source[$i]['F'], //'F' => string '培养类型' (length=12)
                    'academy'         => $source[$i]['G'], //'G' => string '学院' (length=6)
                    'acadeCode'       => $source[$i]['H'], //'H' => string '学院' (length=6)
                    'major'           => $source[$i]['I'], //'I' => string '专业' (length=6)
                    'majorCode'       => $source[$i]['J'], //'J' => string '专业代码' (length=12)
                    'tutor'           => $source[$i]['K'], //'K' => string '导师' (length=6)
                    'expirationDate'  => $source[$i]['L'], //'L' => string '到期时间' (length=12)
                    'degreeType'      => $source[$i]['M'], //'M' => string '学位类别' (length=12)
                );
                // var_dump($dataList);
                $data->data($dataList)->add();//循环插入需26s
                

            }
            $this->redirect('Index/condition');
            // var_dump($dataList);die;
			// $data->addAll($dataList);//批量插入

            //$this->display();

    	}
	    
	}

    public function condition(){
        if(IS_POST){

        }else{
            $this->display();
        }
    }

    public function cultivate(){
        $data = I('post.');
        var_dump($data);
    }

    public function academy(){
        $data = I('post.');
        var_dump($data);
    }
    public function degree(){
        $data = I('post.');
        var_dump($data);
    }





	public function excel($filePath='', $sheet=0){
        header("Content-type: text/html; charset=utf-8"); 
        
        import("Org.Util.PHPExcel");
        import("Org.Util.PHPExcel.Reader.Excel5");
        import("Org.Util.PHPExcel.Reader.Excel2007");

        if(empty($filePath) or !file_exists($filePath)){die('file not exists');}
        $PHPReader = new \PHPExcel_Reader_Excel2007();        //建立reader对象
        if(!$PHPReader->canRead($filePath)){
            $PHPReader = new \PHPExcel_Reader_Excel5();
            if(!$PHPReader->canRead($filePath)){
                 echo 'no Excel';
                return ;
            }
        }
        $PHPExcel = $PHPReader->load($filePath);        //建立excel对象
        $currentSheet = $PHPExcel->getSheet($sheet);        //**读取excel文件中的指定工作表*/
        $allColumn = $currentSheet->getHighestColumn();        //**取得最大的列号*/
        $allRow = $currentSheet->getHighestRow();        //**取得一共有多少行*/
        $data = array();
        for($rowIndex=1;$rowIndex<=$allRow;$rowIndex++){        //循环读取每个单元格的内容。注意行从1开始，列从A开始
            for($colIndex='A';$colIndex<=$allColumn;$colIndex++){
                $addr = $colIndex.$rowIndex; 
                $cell = $currentSheet->getCell($addr)->getValue();
                if($cell instanceof PHPExcel_RichText){ //富文本转换字符串
                    $cell = $cell->__toString();
                }
                $data[$rowIndex][$colIndex] = $cell;
            }
        }
        return $data;
    }

    public function extract(){

    }





    public function example(){
    	echo 'example';
    }
}