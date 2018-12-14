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
            $data->where('1')->delete();
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
                    'academyCode'       => $source[$i]['H'], //'H' => string '学院代码' (length=6)
                    'major'           => $source[$i]['I'], //'I' => string '专业' (length=6)
                    'majorCode'       => $source[$i]['J'], //'J' => string '专业代码' (length=12)
                    'tutor'           => $source[$i]['K'], //'K' => string '导师' (length=6)
                    'expirationDate'  => $source[$i]['L'], //'L' => string '到期时间' (length=12)
                    'degreeType'      => $source[$i]['M'], //'M' => string '学位类别' (length=12)
                    'flag'            => 0,
                );
                // var_dump($dataList);
                $data->data($dataList)->add();//循环插入需26s
                

            }
            // $this->ajaxReturn(1);
            $this->redirect('Index/condition');
 

    	}
	    
	}

    public function condition(){
        if(IS_POST){

        }else{
            $User = M('data');
            $list = $User->limit(3)->select();
            // var_dump($list);
            $list2 = array(0=>array('academy' => '信电','special'=>['special1','special2','special3']),
                          1=>array('academy' => '财会','special'=>['special4','special5','special6'])
                );
            // var_dump($list2);die();
            $this->assign('list2',$list2);

            $this->display();
        }
    }

    //按学院/专业进行随机抽取
    public function major(){
        $DATA = M('data');
        $avoid = I('post.tutor');//是否避免同一导师
        $ratio = I('post.partTime')/100;//设置比例
        // echo $avoid;
        // echo "</br>";
        // echo $ratio;die();
        $DATA->where(array('flag'=>1))->setField('flag',0);
        $Model = new \Think\Model(); // 实例化一个model对象 没有对应任何数据表
        $singleArr = $Model->query("SELECT distinct(majorCode) FROM `data` WHERE majorCode IN (SELECT majorCode FROM `data` GROUP BY majorCode HAVING COUNT(majorCode)=1)");
        // var_dump($singleArr);die;
        //某专业只有一个人，则此人必中
        foreach ($singleArr as $kk => $vv) {
            $DATA->where(array('majorCode'=>$vv['majorCode']))->setField('flag',1);
        }
        
        $majorCode = $DATA->distinct(true)->field('majorCode')->order('majorCode')->select();//所有专业
        if($avoid == 1){ //如果避免同一导师
            foreach ($majorCode as $key => $value) {  //71
                // $value['majorCode'] = '025100';
                // echo "第".($key+1)."个专业".$value['majorCode'];
                $map['majorCode'] = array('EQ',$value['majorCode']);
                $stu_num = $DATA->where($map)->count('number');//某专业学生总人数
                // echo "学生共".$stu_num."人，";
                $extract_num = ceil($stu_num*$ratio);//应抽取人数               
                $tutorArr = $DATA->distinct(true)->field('tutor')->where($map)->select();//某专业导师
                $tutorNum = count($tutorArr);//该专业导师人数
                // echo "导师共".$tutorNum."人，";
                if($extract_num <= $tutorNum){  //如果应抽取人数<导师人数
                    foreach ($tutorArr as $k => $v) {  
                        $tutor = $v['tutor'];
                        $result = $DATA->where(array('tutor'=>$tutor,'flag'=>1))->find();
                        if(!$result){//如果该导师没有学生被抽中
                            $map2['majorCode'] = array('EQ',$value['majorCode']);
                            $map2['tutor'] = array('EQ',$tutor);
                            $student = $DATA->where($map2)->limit(1)->order('rand()')->find();//某个导师抽取一人
                            $DATA->where(array('number'=>$student['number']))->setField('flag',1);
                        }
                        // else{
                        //     echo $tutor."已有学生被抽中<br/>";
                        // }
                    }
                    $map3['majorCode'] = array('EQ',$value['majorCode']);
                    $map3['flag'] = array('EQ',1);
                    $stu = $DATA->where($map3)->limit($extract_num)->order('rand()')->select();
                    // var_dump($stu);
                    $DATA->where(array('flag'=>1,'majorCode'=>$value['majorCode']))->setField('flag',0);
                    foreach ($stu as $kq => $vq) {
                        $DATA->where(array('number'=>$vq['number']))->setField('flag',1);
                    }

                    // if(count($stu)==0){
                    //     echo "应抽取".$extract_num."人,未抽中学生。";
                    // }else{
                    //     echo "应抽取".$extract_num."人,实际抽取".count($stu)."人。";
                    // }

                    if(count($stu)<$extract_num){  
                        // 如果实际抽取人数<应抽取人数，此时无法避免
                        // echo "实际抽取人数<应抽取人数，此时无法避免。";
                        $map4['majorCode'] = array('EQ',$value['majorCode']);
                        $map4['flag'] = array('EQ',0);
                        $add = $extract_num-count($stu);
                        $stu1 = $DATA->where($map4)->limit($add)->order('rand()')->select();
                        $stu = array_merge($stu,$stu1);
                    }
                    

                    // if($extract_num == count($stu)){
                    //     echo "，√<br/>";
                    // }else{
                    //     echo "，×<br/>";
                    // }

                    foreach ($stu as $kkk => $vvv) {
                        $export[] = $vvv;
                    }

                }else{  // 如果应抽取人数大于导师人数，此时无法避免，这情况概率较小
                    $stu = $DATA->where($map)->limit($extract_num)->order('rand()')->select();
                    foreach ($stu as $k => $v) {
                        $export[] = $v;
                    }
                    // echo "应抽取人数>导师人数，此时无法避免<br/>";
                }
                // die;
            }
            // var_dump($export);
        }else{  //不避免同一导师，直接随机抽取
            foreach ($majorCode as $key => $value) {  //71
                // echo "第".($key+1)."个专业".$value['majorCode'];
                $map['majorCode'] = array('EQ',$value['majorCode']);
                $stu_num = $DATA->where($map)->count('number');//某专业学生总人数
                // echo "共".$stu_num."人，";
                $extract_num = ceil($stu_num*$ratio);//应抽取人数                  
                $stu = $DATA->where($map)->limit($extract_num)->order('rand()')->select();
                // var_dump($stu);die;
                foreach ($stu as $k => $v) {
                    $export[] = $v;
                }
                //$export[] = $this->mergee($stu);
                
                // if(count($stu)==0){
                //     echo "应抽取".$extract_num."人,未抽中学生";
                // }else{
                //     echo "应抽取".$extract_num."人,实际抽取".count($stu)."人";
                // }                    
                // if($extract_num == count($stu)){
                //     echo "，√<br/>";
                // }else{
                //     echo "，×<br/>";
                // }                
            }
            // var_dump($export);
        }
        $DATA->where(array('flag'=>1))->setField('flag',0);
        foreach ($export as $key => $value) {
            $DATA->where(array('number'=>$value['number']))->setField('flag',1);
        }
        $this->export();
        // $this->ajaxReturn(1);
    }

    public function academy(){
        $data = I('get.');
        var_dump($data);
    }
    public function degree(){
        $data = I('post.');

        $this->ajaxReturn(1);
    }

    //查看 应抽查人数是否大于导师人数
    public function check(){
        $DATA = M('data');
        $avoid = 1;
        $ratio = 0.1;
        $majorCode = $DATA->distinct(true)->field('majorCode')->select();//全日制所有专业
        foreach ($majorCode as $key => $value) {  //74层
            $map['majorCode'] = array('EQ',$value['majorCode']);
            $stu_num = $DATA->where($map)->count('number');//某专业学生总数
            // echo $stu_num;
            $extract_num = ceil($stu_num*$ratio);//抽取人数
            // echo "专业".$value['majorCode']."共".$stu_num."人，";
            $tutorArr = $DATA->distinct(true)->field('tutor')->where($map)->select();//某专业导师
            $tutorNum = count($tutorArr);//某专业导师人数
            if($extract_num > $tutorNum){
                echo $value['majorCode']."，抽取人数大于导师人数<br/>";
            }else{
                echo $value['majorCode']."，抽取人数小于导师人数<br/>";
            }
        }

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

    /**
     * 导出 抽查名单excel
     * @author 小菜比
     * @copyright  2018-12-09 14:17Authors
     * @var  
     * @return 
     */
    public function export() {
        $DATA = M('data');

        $title = array('学号','年级','姓名','性别','证件号码','培养类型','学院','专业代码','专业','导师','到期时间','学位类别');
        $filename  = '浙江工商大学毕业论文抽查名单';
        $map['flag'] = array('EQ',1);
        $list = $DATA->where($map)->field('number,grade,name,sex,idcard,cultivationType,academy,academyCode,major,tutor,expirationDate,degreeType')->order('academy,major,number')->select();

        $this->excell($list, $title, $filename);
    }


    public function excell($arr=array(),$title=array(),$filename='export'){
        header("Content-type:application/octet-stream");
        header("Accept-Ranges:bytes");
        header("Content-type:application/vnd.ms-excel");  
        header("Content-Disposition:attachment;filename=".$filename.".xls");
        header("Pragma: no-cache");
        header("Expires: 0");
        //导出xls 开始
      
        if (!empty($title)){
            foreach ($title as $k => $v) {
                $title[$k]=iconv("UTF-8", "GB2312",$v);
            }
            $title= implode("\t", $title);
            echo "$title\n";
        }
        //查询数据库  $arr 是二维数组

        if(!empty($arr)){
            foreach($arr as $key=>$val){
                foreach ($val as $ck => $cv) {
                    // $arr[$key][$ck]=iconv("UTF-8", "GB2312", $cv);
                    $arr[$key][$ck]=iconv("UTF-8", "gbk//TRANSLIT", $cv);
                    // if($ck==9 && strlen($arr[$key][$ck])==5){
                    //     $arr[$key][$ck] = '0'.$arr[$key][$ck];
                    // }

                }
                $arr[$key]=implode("\t", $arr[$key]);
            }
            echo implode("\n",$arr);
        }

        // die;
        // 使用die是为了避免输出多余的模板html代码
    }
    public function extract(){

    }





    public function example(){
    	echo 'example';
    }
}