<?php

/**
 * **********************************************************************
 * サブシステム名  ： Task
 * 機能名         ：商品
 * 作成者        ： Gary
 * **********************************************************************
 */
class Goods extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!isset($_SESSION['user_name'])) {
            header("Location:" . RUN . '/login/logout');
        }
        $this->load->model('Goods_model', 'goods');
		$this->load->library('BingTranslate');
        header("Content-type:text/html;charset=utf-8");
    }
	public function fanyi_list()
	{
		$page = isset($_GET["page"]) ? $_GET["page"] : 1;
		$allpage = $this->goods->getgoodsAllPagefanyi();
		$page = $allpage > $page ? $page : $allpage;
		$data["pagehtml"] = $this->getpage($page, $allpage, $_GET);
		$data["page"] = $page;
		$data["allpage"] = $allpage;
		$list = $this->goods->getgoodsAllNewfanyi($page);
		$data["list"] = $list;
		$this->display("goods/fanyi_list", $data);
	}
    /**
     * 商品列表页
     */
    public function goods_list()
    {
        $xingming = isset($_GET['xingming']) ? $_GET['xingming'] : '';
		$youxiang = isset($_GET['youxiang']) ? $_GET['youxiang'] : '';
		$dianhua = isset($_GET['dianhua']) ? $_GET['dianhua'] : '';
        $page = isset($_GET["page"]) ? $_GET["page"] : 1;
        $allpage = $this->goods->getgoodsAllPage($xingming,$youxiang,$dianhua);
        $page = $allpage > $page ? $page : $allpage;
        $data["pagehtml"] = $this->getpage($page, $allpage, $_GET);
        $data["page"] = $page;
        $data["allpage"] = $allpage;
        $list = $this->goods->getgoodsAllNew($page, $xingming,$youxiang,$dianhua);
        foreach ($list as $k=>$v){
			$list_info = $this->goods->getgoodsByIdnongchangzhu($v['id']);
			$list[$k]['idf'] = $list_info['id'];
		}
        $data["xingming"] = $xingming;
		$data["youxiang"] = $youxiang;
		$data["dianhua"] = $dianhua;
        $data["list"] = $list;
        $this->display("goods/goods_list_zi", $data);
    }
	public function goods_list1()
	{
		$mingcheng = isset($_GET['mingcheng']) ? $_GET['mingcheng'] : '';
		$youxiang = isset($_GET['youxiang']) ? $_GET['youxiang'] : '';
		$dianhua = isset($_GET['dianhua']) ? $_GET['dianhua'] : '';
		$page = isset($_GET["page"]) ? $_GET["page"] : 1;
		$allpage = $this->goods->getgoodsAllPage1($mingcheng,$youxiang,$dianhua);
		$page = $allpage > $page ? $page : $allpage;
		$data["pagehtml"] = $this->getpage($page, $allpage, $_GET);
		$data["page"] = $page;
		$data["allpage"] = $allpage;
		$list = $this->goods->getgoodsAllNew1($page,$mingcheng,$youxiang,$dianhua);
		foreach ($list as $k=>$v){
			$list_info = $this->goods->getgoodsByIdkafeidian($v['id']);
			$list[$k]['idf'] = $list_info['id'];
		}
		$data["mingcheng"] = $mingcheng;
		$data["youxiang"] = $youxiang;
		$data["dianhua"] = $dianhua;
		$data["list"] = $list;
		$this->display("goods/goods_list_zi1", $data);
	}

    //nongchang
	public function goods_delete_state()
	{
		$id = isset($_POST['id']) ? $_POST['id'] : 0;
		$zhuangtai = isset($_POST['zhuangtai']) ? $_POST['zhuangtai'] : 0;
		if ($this->goods->goods_new2($id,$zhuangtai)) {
			echo json_encode(array('success' => true, 'msg' => "变更成功"));
			return;
		} else {
			echo json_encode(array('success' => false, 'msg' => "变更失败"));
			return;
		}
	}
	//kafeidian
	public function goods_delete_state1()
	{
		$id = isset($_POST['id']) ? $_POST['id'] : 0;
		$zhuangtai = isset($_POST['zhuangtai']) ? $_POST['zhuangtai'] : 0;
		if ($this->goods->goods_new1($id,$zhuangtai)) {
			echo json_encode(array('success' => true, 'msg' => "变更成功"));
			return;
		} else {
			echo json_encode(array('success' => false, 'msg' => "变更失败"));
			return;
		}
	}
    /**
     * 商品删除
     */
    public function goods_delete()
    {
        $id = isset($_POST['id']) ? $_POST['id'] : 0;
        if ($this->goods->goods_delete($id)) {
            echo json_encode(array('success' => true, 'msg' => "删除成功"));
            return;
        } else {
            echo json_encode(array('success' => false, 'msg' => "删除失败"));
            return;
        }
    }
	public function goods_edit_fanyi()
	{
		$goods_info = $this->goods->getgoodsByIdfanyi(2);
		if (empty($goods_info)) {
			echo json_encode(array('error' => true, 'msg' => "数据错误"));
			return;
		}
		$data = array();
		$data['text1'] = $goods_info['text1'];
		$data['text2'] = $goods_info['text2'];
		$data['text3'] = $goods_info['text3'];
		$data['text4'] = $goods_info['text4'];
		$data['text5'] = $goods_info['text5'];
		$data['text6'] = $goods_info['text6'];
		$data['text7'] = $goods_info['text7'];
		$data['text8'] = $goods_info['text8'];
		$this->display("goods/goods_edit_fanyi", $data);
	}
	public function goods_save_edit_fanyi()
	{
		if (empty($_SESSION['user_name'])) {
			echo json_encode(array('error' => false, 'msg' => "无法修改数据"));
			return;
		}
		$text1 = isset($_POST["text1"]) ? $_POST["text1"] : '';
		$text2 = isset($_POST["text2"]) ? $_POST["text2"] : '';
		$text3 = isset($_POST["text3"]) ? $_POST["text3"] : '';
		$text4 = isset($_POST["text4"]) ? $_POST["text4"] : '';
		$text5 = isset($_POST["text5"]) ? $_POST["text5"] : '';
		$text6 = isset($_POST["text6"]) ? $_POST["text6"] : '';
		$text7 = isset($_POST["text7"]) ? $_POST["text7"] : '';
		$text8 = isset($_POST["text8"]) ? $_POST["text8"] : '';
		$result = $this->goods->goods_save_edit_fanyi($text1,$text2,$text3,$text4,$text5,$text6,$text7,$text8);
		if ($result) {
			echo json_encode(array('success' => true, 'msg' => "操作成功。"));
			return;
		} else {
			echo json_encode(array('error' => false, 'msg' => "操作失败"));
			return;
		}
	}


public function goods_edit_fanyi3()
	{
		$goods_info = $this->goods->getgoodsByIdfanyi(8);
		if (empty($goods_info)) {
			echo json_encode(array('error' => true, 'msg' => "数据错误"));
			return;
		}
		$data = array();
		$data['text1'] = $goods_info['text1'];
		$data['text2'] = $goods_info['text2'];
		$data['text3'] = $goods_info['text3'];
		$data['text4'] = $goods_info['text4'];
		$data['text5'] = $goods_info['text5'];
		$data['text6'] = $goods_info['text6'];
		$data['text7'] = $goods_info['text7'];
		$data['text8'] = $goods_info['text8'];
		$data['text9'] = $goods_info['text9'];
		$data['text10'] = $goods_info['text10'];
		$data['text11'] = $goods_info['text11'];
		$data['text12'] = $goods_info['text12'];
		$data['text13'] = $goods_info['text13'];
		$data['text14'] = $goods_info['text14'];
		$this->display("goods/goods_edit_fanyi3", $data);
	}
	public function goods_save_edit_fanyi3()
	{
		if (empty($_SESSION['user_name'])) {
			echo json_encode(array('error' => false, 'msg' => "无法修改数据"));
			return;
		}
		$text1 = isset($_POST["text1"]) ? $_POST["text1"] : '';
		$text2 = isset($_POST["text2"]) ? $_POST["text2"] : '';
		$text3 = isset($_POST["text3"]) ? $_POST["text3"] : '';
		$text4 = isset($_POST["text4"]) ? $_POST["text4"] : '';
		$text5 = isset($_POST["text5"]) ? $_POST["text5"] : '';
		$text6 = isset($_POST["text6"]) ? $_POST["text6"] : '';
		$text7 = isset($_POST["text7"]) ? $_POST["text7"] : '';
		$text8 = isset($_POST["text8"]) ? $_POST["text8"] : '';
		$text9 = isset($_POST["text9"]) ? $_POST["text9"] : '';
		$text10 = isset($_POST["text10"]) ? $_POST["text10"] : '';
		$text11 = isset($_POST["text11"]) ? $_POST["text11"] : '';
		$text12 = isset($_POST["text12"]) ? $_POST["text12"] : '';
		$text13 = isset($_POST["text13"]) ? $_POST["text13"] : '';
		$text14 = isset($_POST["text14"]) ? $_POST["text14"] : '';
		$result = $this->goods->goods_save_edit_fanyi3($text1,$text2,$text3,$text4,$text5,$text6,$text7,$text8,$text9,$text10,$text11,$text12,$text13,$text14);
		if ($result) {
			echo json_encode(array('success' => true, 'msg' => "操作成功。"));
			return;
		} else {
			echo json_encode(array('error' => false, 'msg' => "操作失败"));
			return;
		}
	}
	
	public function goods_edit_fanyi1()
	{
		$goods_info = $this->goods->getgoodsByIdfanyi(4);
		if (empty($goods_info)) {
			echo json_encode(array('error' => true, 'msg' => "数据错误"));
			return;
		}
		$data = array();
		$data['text1'] = $goods_info['text1'];
		$data['text2'] = $goods_info['text2'];
		$data['text3'] = $goods_info['text3'];
		$data['text4'] = $goods_info['text4'];
		$data['text5'] = $goods_info['text5'];
		$data['text6'] = $goods_info['text6'];
		$data['text7'] = $goods_info['text7'];
		$data['text8'] = $goods_info['text8'];
		$data['text9'] = $goods_info['text9'];
		$data['text10'] = $goods_info['text10'];
		$data['text11'] = $goods_info['text11'];
		$data['text12'] = $goods_info['text12'];
		$data['text13'] = $goods_info['text13'];
		$data['text14'] = $goods_info['text14'];
		$data['text15'] = $goods_info['text15'];
		$data['text16'] = $goods_info['text16'];
		$data['text17'] = $goods_info['text17'];
		$data['text18'] = $goods_info['text18'];
		$data['text19'] = $goods_info['text19'];
		$data['text20'] = $goods_info['text20'];
		$data['text21'] = $goods_info['text21'];
		$data['text22'] = $goods_info['text22'];
		$this->display("goods/goods_edit_fanyi1", $data);
	}
	public function goods_save_edit_fanyi1()
	{
		if (empty($_SESSION['user_name'])) {
			echo json_encode(array('error' => false, 'msg' => "无法修改数据"));
			return;
		}
		$text1 = isset($_POST["text1"]) ? $_POST["text1"] : '';
		$text6 = isset($_POST["text6"]) ? $_POST["text6"] : '';
		$text7 = isset($_POST["text7"]) ? $_POST["text7"] : '';
		$text8 = isset($_POST["text8"]) ? $_POST["text8"] : '';
		$text9 = isset($_POST["text9"]) ? $_POST["text9"] : '';
		$text10 = isset($_POST["text10"]) ? $_POST["text10"] : '';
		$text11 = isset($_POST["text11"]) ? $_POST["text11"] : '';
		$text12 = isset($_POST["text12"]) ? $_POST["text12"] : '';
		$text13 = isset($_POST["text13"]) ? $_POST["text13"] : '';
		$text14 = isset($_POST["text14"]) ? $_POST["text14"] : '';
		$text15 = isset($_POST["text15"]) ? $_POST["text15"] : '';
		$text16 = isset($_POST["text16"]) ? $_POST["text16"] : '';
		$text17 = isset($_POST["text17"]) ? $_POST["text17"] : '';
		$text18 = isset($_POST["text18"]) ? $_POST["text18"] : '';
		$text19 = isset($_POST["text19"]) ? $_POST["text19"] : '';
		$text20 = isset($_POST["text20"]) ? $_POST["text20"] : '';
		$text21 = isset($_POST["text21"]) ? $_POST["text21"] : '';
		$text22 = isset($_POST["text22"]) ? $_POST["text22"] : '';
		$result = $this->goods->goods_save_edit_fanyi1($text1,$text6,$text7,$text8,$text9,$text10,$text11,$text12,$text13,$text14,$text15,$text16,$text17,$text18,$text19,$text20,$text21,$text22);
		if ($result) {
			echo json_encode(array('success' => true, 'msg' => "操作成功。"));
			return;
		} else {
			echo json_encode(array('error' => false, 'msg' => "操作失败"));
			return;
		}
	}




public function goods_edit_fanyi2()
	{
		$goods_info = $this->goods->getgoodsByIdfanyi(6);
		if (empty($goods_info)) {
			echo json_encode(array('error' => true, 'msg' => "数据错误"));
			return;
		}
		$data = array();
		$data['text8'] = $goods_info['text8'];
		$data['text9'] = $goods_info['text9'];
		$data['text10'] = $goods_info['text10'];
		$data['text11'] = $goods_info['text11'];
		$data['text12'] = $goods_info['text12'];
		$data['text13'] = $goods_info['text13'];
		$data['text14'] = $goods_info['text14'];
		$data['text15'] = $goods_info['text15'];
		$data['text16'] = $goods_info['text16'];
		$data['text17'] = $goods_info['text17'];
		$data['text18'] = $goods_info['text18'];
		$data['text19'] = $goods_info['text19'];
		$data['text20'] = $goods_info['text20'];
		$data['text21'] = $goods_info['text21'];
		$data['text22'] = $goods_info['text22'];
		$data['text23'] = $goods_info['text23'];
		$data['text24'] = $goods_info['text24'];
		$data['text25'] = $goods_info['text25'];
		$data['text26'] = $goods_info['text26'];
		$data['text27'] = $goods_info['text27'];
		$this->display("goods/goods_edit_fanyi2", $data);
	}
	public function goods_save_edit_fanyi2()
	{
		if (empty($_SESSION['user_name'])) {
			echo json_encode(array('error' => false, 'msg' => "无法修改数据"));
			return;
		}
		$text8 = isset($_POST["text8"]) ? $_POST["text8"] : '';
		$text9 = isset($_POST["text9"]) ? $_POST["text9"] : '';
		$text10 = isset($_POST["text10"]) ? $_POST["text10"] : '';
		$text11 = isset($_POST["text11"]) ? $_POST["text11"] : '';
		$text12 = isset($_POST["text12"]) ? $_POST["text12"] : '';
		$text13 = isset($_POST["text13"]) ? $_POST["text13"] : '';
		$text14 = isset($_POST["text14"]) ? $_POST["text14"] : '';
		$text15 = isset($_POST["text15"]) ? $_POST["text15"] : '';
		$text16 = isset($_POST["text16"]) ? $_POST["text16"] : '';
		$text17 = isset($_POST["text17"]) ? $_POST["text17"] : '';
		$text18 = isset($_POST["text18"]) ? $_POST["text18"] : '';
		$text19 = isset($_POST["text19"]) ? $_POST["text19"] : '';
		$text20 = isset($_POST["text20"]) ? $_POST["text20"] : '';
		$text21 = isset($_POST["text21"]) ? $_POST["text21"] : '';
		$text22 = isset($_POST["text22"]) ? $_POST["text22"] : '';
		$text23 = isset($_POST["text23"]) ? $_POST["text23"] : '';
		$text24 = isset($_POST["text24"]) ? $_POST["text24"] : '';
		$text25 = isset($_POST["text25"]) ? $_POST["text25"] : '';
		$text26 = isset($_POST["text26"]) ? $_POST["text26"] : '';
		$text27 = isset($_POST["text27"]) ? $_POST["text27"] : '';
		$result = $this->goods->goods_save_edit_fanyi2($text8,$text9,$text10,$text11,$text12,$text13,$text14,$text15,$text16,$text17,$text18,$text19,$text20,$text21,$text22,$text23,$text24,$text25,$text26,$text27);
		if ($result) {
			echo json_encode(array('success' => true, 'msg' => "操作成功。"));
			return;
		} else {
			echo json_encode(array('error' => false, 'msg' => "操作失败"));
			return;
		}
	}
	
	
	

    /**
     * 类型修改页
     */
    public function goods_edit()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        $goods_info = $this->goods->getgoodsById($id);
        if (empty($goods_info)) {
            echo json_encode(array('error' => true, 'msg' => "数据错误"));
            return;
        }
        $data = array();
        $data['touxiang'] = $goods_info['touxiang'];
        $data['xingming'] = $goods_info['xingming'];
        $data['xingbie'] = $goods_info['xingbie'];
        $data['dianhua'] = $goods_info['dianhua'];
        $data['youxiang'] = $goods_info['youxiang'];
        $data['zhou'] = $goods_info['zhou'];
		$data['guojia'] = $goods_info['guojia'];
		$data['chengshi'] = $goods_info['chengshi'];
		$data['kafeiming'] = $goods_info['kafeiming'];
		$data['caijididian'] = $goods_info['caijididian'];
		$data['xiangxidizhi'] = $goods_info['xiangxidizhi'];
		$data['zhongzhimianji'] = $goods_info['zhongzhimianji'];
		$data['chulifangshi'] = $goods_info['chulifangshi'];
		$data['chulitedian'] = $goods_info['chulitedian'];
		$data['hongguoshuliang'] = $goods_info['hongguoshuliang'];
		$data['shouhuoshijian'] = $goods_info['shouhuoshijian'];
		$data['hongguoshuliang'] = $goods_info['hongguoshuliang'];
		$data['haibagaodu'] = $goods_info['haibagaodu'];
		$data['niancanliang'] = $goods_info['niancanliang'];
		$data['nonglogo'] = $goods_info['nonglogo'];
		$data['zhuangtai'] = $goods_info['zhuangtai'];
		$data['fazhanshi'] = $goods_info['fazhanshi'];
		$data['zhuyaochanpin'] = $goods_info['zhuyaochanpin'];
		$data['jianjie'] = $goods_info['jianjie'];
		$data['fid'] = empty($goods_info['fid'])?0:1;
        $data['id'] = $id;
        $this->display("goods/goods_edit_zi", $data);
    }
	public function goods_edit1()
	{
		$id = isset($_GET['id']) ? $_GET['id'] : 0;
		$goods_info = $this->goods->getgoodsById1($id);
		if (empty($goods_info)) {
			echo json_encode(array('error' => true, 'msg' => "数据错误"));
			return;
		}
		$data = array();
		$data['touxiang'] = $goods_info['touxiang'];
		$data['mingcheng'] = $goods_info['mingcheng'];
		$data['dianhua'] = $goods_info['dianhua'];
		$data['youxiang'] = $goods_info['youxiang'];
		$data['zhou'] = $goods_info['zhou'];
		$data['guojia'] = $goods_info['guojia'];
		$data['chengshi'] = $goods_info['chengshi'];
		$data['leixing'] = $goods_info['leixing'];
		$data['xiangxidizhi'] = $goods_info['xiangxidizhi'];
		$data['xinghao'] = $goods_info['xinghao'];
		$data['caigouliang'] = $goods_info['caigouliang'];
		$data['caigoushijian'] = $goods_info['caigoushijian'];
		$data['chulitedian'] = $goods_info['chulitedian'];
		$data['nonglogo'] = $goods_info['dianlogo'];
		$data['zhuangtai'] = $goods_info['zhuangtai'];
		$data['fazhanshi'] = $goods_info['fazhanshi'];
		$data['zhuyaochanpin'] = $goods_info['zhuyaochanpin'];
		$data['jianjie'] = $goods_info['jianjie'];
		$data['fid'] = empty($goods_info['fid'])?0:1;
		$data['id'] = $id;
		$this->display("goods/goods_edit_zi1", $data);
	}
    /**
     * nongchang修改提交
     */
    public function goods_save_edit()
    {
        if (empty($_SESSION['user_name'])) {
            echo json_encode(array('error' => false, 'msg' => "无法修改数据"));
            return;
        }
        $id = isset($_POST["id"]) ? $_POST["id"] : '';
		$touxiang = isset($_POST["touxiang"]) ? $_POST["touxiang"] : '';
        $xingming = isset($_POST["xingming"]) ? $_POST["xingming"] : '';
        $xingbie = isset($_POST["xingbie"]) ? $_POST["xingbie"] : 1;
        $dianhua = isset($_POST["dianhua"]) ? $_POST["dianhua"] : '';
		$youxiang = isset($_POST["youxiang"]) ? $_POST["youxiang"] : '';
        $zhou = isset($_POST["zhou"]) ? $_POST["zhou"] : '';
        $guojia = isset($_POST["guojia"]) ? $_POST["guojia"] : '';
        $chengshi = isset($_POST["chengshi"]) ? $_POST["chengshi"] : '';
        $kafeiming = isset($_POST["kafeiming"]) ? $_POST["kafeiming"] : '';
        $zhuangtai = isset($_POST["zhuangtai"]) ? $_POST["zhuangtai"] : '0';
		$caijididian = isset($_POST["caijididian"]) ? $_POST["caijididian"] : '';
		$xiangxidizhi = isset($_POST["xiangxidizhi"]) ? $_POST["xiangxidizhi"] : '';
		$zhongzhimianji = isset($_POST["zhongzhimianji"]) ? $_POST["zhongzhimianji"] : '';
		$chulifangshi = isset($_POST["chulifangshi"]) ? $_POST["chulifangshi"] : '';
		$chulitedian = isset($_POST["chulitedian"]) ? $_POST["chulitedian"] : '';
		$shouhuoshijian = isset($_POST["shouhuoshijian"]) ? $_POST["shouhuoshijian"] : '';
		$hongguoshuliang = isset($_POST["hongguoshuliang"]) ? $_POST["hongguoshuliang"] : '';
		$haibagaodu = isset($_POST["haibagaodu"]) ? $_POST["haibagaodu"] : '';
		$niancanliang = isset($_POST["niancanliang"]) ? $_POST["niancanliang"] : '';
		$nonglogo = isset($_POST["nonglogo"]) ? $_POST["nonglogo"] : '';
		$fazhanshi = isset($_POST["fazhanshi"]) ? $_POST["fazhanshi"] : '';
		$zhuyaochanpin = isset($_POST["zhuyaochanpin"]) ? $_POST["zhuyaochanpin"] : '';
		$jianjie = isset($_POST["jianjie"]) ? $_POST["jianjie"] : '';

		$goods_info = $this->goods->getgoodsById($id);
		if (empty($goods_info)) {
			echo json_encode(array('error' => true, 'msg' => "数据错误"));
			return;
		}

		if (!empty($goods_info['fid'])){
			$goods_info1 = $this->goods->getgoodsById($goods_info['fid']);
			$zhuangtai = $goods_info1['zhuangtai'];
		}

		if (empty($goods_info['fid'])){
			$goflg = !empty($_POST["goflg"]) ? $_POST["goflg"] : 0;
			if (!empty($goflg)){
				$yuyanflg = $goods_info['yuyanflg'];
				$fanyitype = $yuyanflg == 1 ?"ZH_CN2EN":"EN2ZH_CN";
				$from = 'cn';
				$to = 'en';
				if ($fanyitype == "EN2ZH_CN"){
					$from = 'en';
					$to = 'cn';
				}

				$BingTranslate = new BingTranslate();

				$goods_info2 = $this->goods->getgoodsByIdfid($id);
				$idfid = $goods_info2['id'];

				$str = $xingming.' + '.$xingbie.' + '.$zhou.' + '.$guojia.' + '.$chengshi.' + '.$kafeiming.' + '.$caijididian.' + '.$xiangxidizhi.' + '.$zhongzhimianji.' + '.$chulifangshi.' + '.$chulitedian.' + '.$hongguoshuliang.' + '.$haibagaodu.' + '.$shouhuoshijian.' + '.$niancanliang;
				$result = $BingTranslate->xfyun($str,$from,$to);
				$result = json_decode($result,true);

				$xingming1 = "";
				$xingbie1 = "";
				$zhou1 = "";
				$guojia1 = "";
				$chengshi1 = "";
				$kafeiming1 = "";
				$caijididian1 = "";
				$xiangxidizhi1 = "";
				$zhongzhimianji1 = "";
				$chulifangshi1 = "";
				$chulitedian1 = "";
				$hongguoshuliang1 = "";
				$haibagaodu1 = "";
				$shouhuoshijian1 = "";
				$niancanliang1 = "";
				if (empty($result['code'])) {
					$arr = explode('+',$result['data']['result']['trans_result']['dst']);
					$xingming1 = empty($arr[0])?'':$arr[0];
					$xingbie1 = empty($arr[1])?'':$arr[1];
					$zhou1 = empty($arr[2])?'':$arr[2];
					$guojia1 = empty($arr[3])?'':$arr[3];
					$chengshi1 = empty($arr[4])?'':$arr[4];
					$kafeiming1 = empty($arr[5])?'':$arr[5];
					$caijididian1 = empty($arr[6])?'':$arr[6];
					$xiangxidizhi1 = empty($arr[7])?'':$arr[7];
					$zhongzhimianji1 = empty($arr[8])?'':$arr[8];
					$chulifangshi1 = empty($arr[9])?'':$arr[9];
					$chulitedian1 = empty($arr[10])?'':$arr[10];
					$hongguoshuliang1 = empty($arr[11])?'':$arr[11];
					$haibagaodu1 = empty($arr[12])?'':$arr[12];
					$shouhuoshijian1 = empty($arr[13])?'':$arr[13];
					$niancanliang1 = empty($arr[14])?'':$arr[14];
				}

				$fazhanshi1 = "";
				if (!empty($fazhanshi)){
					$result = $BingTranslate->xfyun($fazhanshi,$from,$to);
					$result = json_decode($result,true);
					if (empty($result['code'])) {
						$fazhanshi1 = $result['data']['result']['trans_result']['dst'];
					}
					$fazhanshi1 = str_replace("< p >", "<p>", $fazhanshi1);
					$fazhanshi1 = str_replace("< / p >", "</p>", $fazhanshi1);
					$fazhanshi1 = str_replace("< br >", "<br>", $fazhanshi1);
				}

				$zhuyaochanpin1 = "";
				if (!empty($zhuyaochanpin)){
					$result = $BingTranslate->xfyun($zhuyaochanpin,$from,$to);
					$result = json_decode($result,true);
					if (empty($result['code'])) {
						$zhuyaochanpin1 = $result['data']['result']['trans_result']['dst'];
					}
					$zhuyaochanpin1 = str_replace("< p >", "<p>", $zhuyaochanpin1);
					$zhuyaochanpin1 = str_replace("< / p >", "</p>", $zhuyaochanpin1);
					$zhuyaochanpin1 = str_replace("< br >", "<br>", $zhuyaochanpin1);
				}

				$jianjie1 = "";
				if (!empty($jianjie)){
					$result = $BingTranslate->xfyun($jianjie,$from,$to);
					$result = json_decode($result,true);
					if (empty($result['code'])) {
						$jianjie1 = $result['data']['result']['trans_result']['dst'];
					}
					$jianjie1 = str_replace("< p >", "<p>", $jianjie1);
					$jianjie1 = str_replace("< / p >", "</p>", $jianjie1);
					$jianjie1 = str_replace("< br >", "<br>", $jianjie1);
				}
				$this->goods->goods_save_edit($idfid,$hongguoshuliang1,$haibagaodu1,$touxiang,$xingming1,$xingbie,$dianhua,$youxiang,$zhou1,$guojia1,$chengshi1,$kafeiming1,$zhuangtai,$caijididian1,$xiangxidizhi1,$zhongzhimianji1,$chulifangshi1,$chulitedian1,$shouhuoshijian1,$niancanliang1,$nonglogo,$fazhanshi1,$zhuyaochanpin1,$jianjie1,time());
				$this->goods->goods_new2($id,$zhuangtai);
			}
		}

		$result = $this->goods->goods_save_edit($id,$hongguoshuliang,$haibagaodu,$touxiang,$xingming,$xingbie,$dianhua,$youxiang,$zhou,$guojia,$chengshi,$kafeiming,$zhuangtai,$caijididian,$xiangxidizhi,$zhongzhimianji,$chulifangshi,$chulitedian,$shouhuoshijian,$niancanliang,$nonglogo,$fazhanshi,$zhuyaochanpin,$jianjie,time());

        if ($result) {
            echo json_encode(array('success' => true, 'msg' => "操作成功。"));
            return;
        } else {
            echo json_encode(array('error' => false, 'msg' => "操作失败"));
            return;
        }
    }
	function SBC_DBC($str,$args2=1) { //半角和全角转换函数，第二个参数如果是0,则是半角到全角；如果是1，则是全角到半角

		$DBC = Array(

			'０' , '１' , '２' , '３' , '４' ,

			'５' , '６' , '７' , '８' , '９' ,

			'Ａ' , 'Ｂ' , 'Ｃ' , 'Ｄ' , 'Ｅ' ,

			'Ｆ' , 'Ｇ' , 'Ｈ' , 'Ｉ' , 'Ｊ' ,

			'Ｋ' , 'Ｌ' , 'Ｍ' , 'Ｎ' , 'Ｏ' ,

			'Ｐ' , 'Ｑ' , 'Ｒ' , 'Ｓ' , 'Ｔ' ,

			'Ｕ' , 'Ｖ' , 'Ｗ' , 'Ｘ' , 'Ｙ' ,

			'Ｚ' , 'ａ' , 'ｂ' , 'ｃ' , 'ｄ' ,

			'ｅ' , 'ｆ' , 'ｇ' , 'ｈ' , 'ｉ' ,

			'ｊ' , 'ｋ' , 'ｌ' , 'ｍ' , 'ｎ' ,

			'ｏ' , 'ｐ' , 'ｑ' , 'ｒ' , 'ｓ' ,

			'ｔ' , 'ｕ' , 'ｖ' , 'ｗ' , 'ｘ' ,

			'ｙ' , 'ｚ' , '－' , '　'  , '：' ,

			'．' , '，' , '／' , '％' , '＃' ,

			'！' , '＠' , '＆' , '（' , '）' ,

			'＜' , '＞' , '＂' , '＇' , '？' ,

			'［' , '］' , '｛' , '｝' , '＼' ,

			'｜' , '＋' , '＝' , '＿' , '＾' ,

			'￥' , '￣' , '｀'

		);

		$SBC = Array( //半角

			'0', '1', '2', '3', '4',

			'5', '6', '7', '8', '9',

			'A', 'B', 'C', 'D', 'E',

			'F', 'G', 'H', 'I', 'J',

			'K', 'L', 'M', 'N', 'O',

			'P', 'Q', 'R', 'S', 'T',

			'U', 'V', 'W', 'X', 'Y',

			'Z', 'a', 'b', 'c', 'd',

			'e', 'f', 'g', 'h', 'i',

			'j', 'k', 'l', 'm', 'n',

			'o', 'p', 'q', 'r', 's',

			't', 'u', 'v', 'w', 'x',

			'y', 'z', '-', ' ', ':',

			'.', ',', '/', '%', '#',

			'!', '@', '&', '(', ')',

			'<', '>', '"', '\'','?',

			'[', ']', '{', '}', '\\',

			'|', '+', '=', '_', '^',

			'$', '~', '`'

		);

		if($args2==0)

			return str_replace($SBC,$DBC,$str);  //半角到全角

		if($args2==1)

			return str_replace($DBC,$SBC,$str);  //全角到半角

		else

			return false;

	}
	public function goods_save_edit1()
	{
		if (empty($_SESSION['user_name'])) {
			echo json_encode(array('error' => false, 'msg' => "无法修改数据"));
			return;
		}
		$id = isset($_POST["id"]) ? $_POST["id"] : '';
		$touxiang = isset($_POST["touxiang"]) ? $_POST["touxiang"] : '';
		$mingcheng = isset($_POST["mingcheng"]) ? $_POST["mingcheng"] : '';
		$dianhua = isset($_POST["dianhua"]) ? $_POST["dianhua"] : '';
		$youxiang = isset($_POST["youxiang"]) ? $_POST["youxiang"] : '';
		$zhou = isset($_POST["zhou"]) ? $_POST["zhou"] : '';
		$guojia = isset($_POST["guojia"]) ? $_POST["guojia"] : '';
		$chengshi = isset($_POST["chengshi"]) ? $_POST["chengshi"] : '';
		$leixing = isset($_POST["leixing"]) ? $_POST["leixing"] : '';
		$xiangxidizhi = isset($_POST["xiangxidizhi"]) ? $_POST["xiangxidizhi"] : '';
		$zhuangtai = isset($_POST["zhuangtai"]) ? $_POST["zhuangtai"] : '0';
		$xinghao = isset($_POST["xinghao"]) ? $_POST["xinghao"] : '';
		$caigouliang = isset($_POST["caigouliang"]) ? $_POST["caigouliang"] : '';
		$caigoushijian = isset($_POST["caigoushijian"]) ? $_POST["caigoushijian"] : '';
		$chulitedian = isset($_POST["chulitedian"]) ? $_POST["chulitedian"] : '';
		$dianlogo = isset($_POST["nonglogo"]) ? $_POST["nonglogo"] : '';
		$fazhanshi = isset($_POST["fazhanshi"]) ? $_POST["fazhanshi"] : '';
		$zhuyaochanpin = isset($_POST["zhuyaochanpin"]) ? $_POST["zhuyaochanpin"] : '';
		$jianjie = isset($_POST["jianjie"]) ? $_POST["jianjie"] : '';

		$goods_info = $this->goods->getgoodsById1($id);
		if (empty($goods_info)) {
			echo json_encode(array('error' => true, 'msg' => "数据错误"));
			return;
		}
		if (!empty($goods_info['fid'])){
			$goods_info1 = $this->goods->getgoodsById1($goods_info['fid']);
			$zhuangtai = $goods_info1['zhuangtai'];
		}

		if (empty($goods_info['fid'])){
			$goflg = !empty($_POST["goflg"]) ? $_POST["goflg"] : 0;
			if (!empty($goflg)){
				$yuyanflg = $goods_info['yuyanflg'];

				$fanyitype = $yuyanflg == 1 ?"ZH_CN2EN":"EN2ZH_CN";
				$from = 'cn';
				$to = 'en';
				if ($fanyitype == "EN2ZH_CN"){
					$from = 'en';
					$to = 'cn';
				}

				$BingTranslate = new BingTranslate();

				$goods_info2 = $this->goods->getgoodsByIdfid1($id);
				$idfid = $goods_info2['id'];

				$str = $mingcheng.' + '.$zhou.' + '.$guojia.' + '.$chengshi.' + '.$leixing.' + '.$xiangxidizhi.' + '.$xinghao.' + '.$caigouliang.' + '.$caigoushijian.' + '.$chulitedian;
				$result = $BingTranslate->xfyun($str,$from,$to);
				$result = json_decode($result,true);
				$mingcheng1 = "";
				$zhou1 = "";
				$guojia1 = "";
				$chengshi1 = "";
				$leixing1 = "";
				$xiangxidizhi1 = "";
				$xinghao1 = "";
				$caigouliang1 = "";
				$caigoushijian1 = "";
				$chulitedian1 = "";
				if (empty($result['code'])) {
					$arr = explode('+',$result['data']['result']['trans_result']['dst']);
					$mingcheng1 = empty($arr[0])?'':$arr[0];
					$zhou1 = empty($arr[1])?'':$arr[1];
					$guojia1 = empty($arr[2])?'':$arr[2];
					$chengshi1 = empty($arr[3])?'':$arr[3];
					$leixing1 = empty($arr[4])?'':$arr[4];
					$xiangxidizhi1 = empty($arr[5])?'':$arr[5];
					$xinghao1 = empty($arr[6])?'':$arr[6];
					$caigouliang1 = empty($arr[7])?'':$arr[7];
					$caigoushijian1 = empty($arr[8])?'':$arr[8];
					$chulitedian1 = empty($arr[9])?'':$arr[9];
				}

				$fazhanshi1 = "";
				if (!empty($fazhanshi)){
					$result = $BingTranslate->xfyun($fazhanshi,$from,$to);
					$result = json_decode($result,true);
					if (empty($result['code'])) {
						$fazhanshi1 = $result['data']['result']['trans_result']['dst'];
					}
					$fazhanshi1 = str_replace("< p >", "<p>", $fazhanshi1);
					$fazhanshi1 = str_replace("< / p >", "</p>", $fazhanshi1);
					$fazhanshi1 = str_replace("< br >", "<br>", $fazhanshi1);
				}

				$zhuyaochanpin1 = "";
				if (!empty($zhuyaochanpin)){
					$result = $BingTranslate->xfyun($zhuyaochanpin,$from,$to);
					$result = json_decode($result,true);
					if (empty($result['code'])) {
						$zhuyaochanpin1 = $result['data']['result']['trans_result']['dst'];
					}
					$zhuyaochanpin1 = str_replace("< p >", "<p>", $zhuyaochanpin1);
					$zhuyaochanpin1 = str_replace("< / p >", "</p>", $zhuyaochanpin1);
					$zhuyaochanpin1 = str_replace("< br >", "<br>", $zhuyaochanpin1);
				}

				$jianjie1 = "";
				if (!empty($jianjie)){
					$result = $BingTranslate->xfyun($jianjie,$from,$to);
					$result = json_decode($result,true);
					if (empty($result['code'])) {
						$jianjie1 = $result['data']['result']['trans_result']['dst'];
					}
					$jianjie1 = str_replace("< p >", "<p>", $jianjie1);
					$jianjie1 = str_replace("< / p >", "</p>", $jianjie1);
					$jianjie1 = str_replace("< br >", "<br>", $jianjie1);
				}

				$this->goods->goods_save_edit1($leixing1,$idfid,$touxiang,$mingcheng1,$dianhua,$youxiang,$zhou1,$guojia1,$chengshi1,$zhuangtai,$xiangxidizhi1,$xinghao1,$caigouliang1,$caigoushijian1,$chulitedian1,$dianlogo,$fazhanshi1,$zhuyaochanpin1,$jianjie1,time());
				$this->goods->goods_new1($id,$zhuangtai);
			}
		}

		$result = $this->goods->goods_save_edit1($leixing,$id,$touxiang,$mingcheng,$dianhua,$youxiang,$zhou,$guojia,$chengshi,$zhuangtai,$xiangxidizhi,$xinghao,$caigouliang,$caigoushijian,$chulitedian,$dianlogo,$fazhanshi,$zhuyaochanpin,$jianjie,time());
		if ($result) {
			echo json_encode(array('success' => true, 'msg' => "操作成功。"));
			return;
		} else {
			echo json_encode(array('error' => false, 'msg' => "操作失败"));
			return;
		}
	}


	/**
	 * 商品添加页
	 */
	public function goods_add1()
	{
		$this->display("goods/goods_add1");
	}
	/**
	 * 商品删除
	 */
	public function goods_delete1()
	{
		$id = isset($_POST['id']) ? $_POST['id'] : 0;
		if ($this->goods->goods_delete1($id)) {
			echo json_encode(array('success' => true, 'msg' => "删除成功"));
			return;
		} else {
			echo json_encode(array('success' => false, 'msg' => "删除失败"));
			return;
		}
	}





	/**
	 * 商品列表页
	 */
	public function goods_list2()
	{

		$gname = isset($_GET['gname']) ? $_GET['gname'] : '';
		$page = isset($_GET["page"]) ? $_GET["page"] : 1;
		$allpage = $this->goods->getgoodsAllPage2($gname);
		$page = $allpage > $page ? $page : $allpage;
		$data["pagehtml"] = $this->getpage($page, $allpage, $_GET);
		$data["page"] = $page;
		$data["allpage"] = $allpage;
		$list = $this->goods->getgoodsAllNew2($page, $gname);

		$data["gname"] = $gname;

		$data["list"] = $list;
		$this->display("goods/goods_list2", $data);
	}
	/**
	 * 商品添加页
	 */
	public function goods_add2()
	{
		$this->display("goods/goods_add2");
	}
	/**
	 * 商品删除
	 */
	public function goods_delete2()
	{
		$id = isset($_POST['id']) ? $_POST['id'] : 0;
		if ($this->goods->goods_delete2($id)) {
			echo json_encode(array('success' => true, 'msg' => "删除成功"));
			return;
		} else {
			echo json_encode(array('success' => false, 'msg' => "删除失败"));
			return;
		}
	}



	/**
	 * 商品列表页
	 */
	public function goods_list3()
	{

		$gname = isset($_GET['gname']) ? $_GET['gname'] : '';
		$page = isset($_GET["page"]) ? $_GET["page"] : 1;
		$allpage = $this->goods->getgoodsAllPage3($gname);
		$page = $allpage > $page ? $page : $allpage;
		$data["pagehtml"] = $this->getpage($page, $allpage, $_GET);
		$data["page"] = $page;
		$data["allpage"] = $allpage;
		$list = $this->goods->getgoodsAllNew3($page, $gname);

		$data["gname"] = $gname;

		$data["list"] = $list;
		$this->display("goods/goods_list3", $data);
	}
	/**
	 * 商品添加页
	 */
	public function goods_add3()
	{
		$this->display("goods/goods_add3");
	}
	/**
	 * 商品删除
	 */
	public function goods_delete3()
	{
		$id = isset($_POST['id']) ? $_POST['id'] : 0;
		if ($this->goods->goods_delete3($id)) {
			echo json_encode(array('success' => true, 'msg' => "删除成功"));
			return;
		} else {
			echo json_encode(array('success' => false, 'msg' => "删除失败"));
			return;
		}
	}


	/**
	 * 商品列表页
	 */
	public function goods_list4()
	{

		$gname = isset($_GET['gname']) ? $_GET['gname'] : '';
		$page = isset($_GET["page"]) ? $_GET["page"] : 1;
		$allpage = $this->goods->getgoodsAllPage4($gname);
		$page = $allpage > $page ? $page : $allpage;
		$data["pagehtml"] = $this->getpage($page, $allpage, $_GET);
		$data["page"] = $page;
		$data["allpage"] = $allpage;
		$list = $this->goods->getgoodsAllNew4($page, $gname);

		$data["gname"] = $gname;

		$data["list"] = $list;
		$this->display("goods/goods_list4", $data);
	}
	/**
	 * 商品添加页
	 */
	public function goods_add4()
	{
		$this->display("goods/goods_add4");
	}
	/**
	 * 商品删除
	 */
	public function goods_delete4()
	{
		$id = isset($_POST['id']) ? $_POST['id'] : 0;
		if ($this->goods->goods_delete4($id)) {
			echo json_encode(array('success' => true, 'msg' => "删除成功"));
			return;
		} else {
			echo json_encode(array('success' => false, 'msg' => "删除失败"));
			return;
		}
	}



	/**
	 * 商品列表页
	 */
	public function goods_list5()
	{

		$gname = isset($_GET['gname']) ? $_GET['gname'] : '';
		$page = isset($_GET["page"]) ? $_GET["page"] : 1;
		$allpage = $this->goods->getgoodsAllPage5($gname);
		$page = $allpage > $page ? $page : $allpage;
		$data["pagehtml"] = $this->getpage($page, $allpage, $_GET);
		$data["page"] = $page;
		$data["allpage"] = $allpage;
		$list = $this->goods->getgoodsAllNew5($page, $gname);

		$data["gname"] = $gname;

		$data["list"] = $list;
		$this->display("goods/goods_list5", $data);
	}
	/**
	 * 商品添加页
	 */
	public function goods_add5()
	{
		$this->display("goods/goods_add5");
	}
	/**
	 * 商品删除
	 */
	public function goods_delete5()
	{
		$id = isset($_POST['id']) ? $_POST['id'] : 0;
		if ($this->goods->goods_delete5($id)) {
			echo json_encode(array('success' => true, 'msg' => "删除成功"));
			return;
		} else {
			echo json_encode(array('success' => false, 'msg' => "删除失败"));
			return;
		}
	}




	/**
	 * 商品列表页
	 */
	public function goods_list6()
	{

		$gname = isset($_GET['gname']) ? $_GET['gname'] : '';
		$page = isset($_GET["page"]) ? $_GET["page"] : 1;
		$allpage = $this->goods->getgoodsAllPage6($gname);
		$page = $allpage > $page ? $page : $allpage;
		$data["pagehtml"] = $this->getpage($page, $allpage, $_GET);
		$data["page"] = $page;
		$data["allpage"] = $allpage;
		$list = $this->goods->getgoodsAllNew6($page, $gname);

		$data["gname"] = $gname;

		$data["list"] = $list;
		$this->display("goods/goods_list6", $data);
	}
	/**
	 * 商品添加页
	 */
	public function goods_add6()
	{
		$this->display("goods/goods_add6");
	}
	/**
	 * 商品删除
	 */
	public function goods_delete6()
	{
		$id = isset($_POST['id']) ? $_POST['id'] : 0;
		if ($this->goods->goods_delete6($id)) {
			echo json_encode(array('success' => true, 'msg' => "删除成功"));
			return;
		} else {
			echo json_encode(array('success' => false, 'msg' => "删除失败"));
			return;
		}
	}



}
