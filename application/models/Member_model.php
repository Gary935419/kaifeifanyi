<?php


class Member_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->date = time();
        $this->load->database();
    }
	public function yuyan($id)
	{
		$id = $this->db->escape($id);
		$sql = "SELECT * FROM `yuyan` where id = $id ";
		return $this->db->query($sql)->row_array();
	}

	public function getmemberinfoamid($mid)
	{
		$mid = $this->db->escape($mid);
		$sql = "SELECT * FROM `member` where mid = $mid ";
		return $this->db->query($sql)->row_array();
	}
	public function getmemberyanzhengma($youxiang,$guoqishijian)
	{
		$youxiang = $this->db->escape($youxiang);
		$guoqishijian = $this->db->escape($guoqishijian);
		$sqlw = " where youxiang = $youxiang and guoqishijian >= $guoqishijian and zhuangtai = 1 ";
		$sql = "SELECT * FROM `yanzhengma` " . $sqlw;

		return $this->db->query($sql)->result_array();
	}
	public function getyanzhengmaupdatewangji($youxiang,$mima,$leixing)
	{
		$youxiang = $this->db->escape($youxiang);
		$leixing = $this->db->escape($leixing);
		$mima = md5($mima);
		$mima = $this->db->escape($mima);
		$sql = "UPDATE `member` SET mima=$mima WHERE youxiang = $youxiang and leixing = $leixing";
		return $this->db->query($sql);
	}
	public function getyanzhengmaupdatewangjinew($youxiang,$mima)
	{
		$youxiang = $this->db->escape($youxiang);
		$mima = md5($mima);
		$mima = $this->db->escape($mima);
		$sql = "UPDATE `member` SET mima=$mima WHERE youxiang = $youxiang";
		return $this->db->query($sql);
	}
	public function getyanzhengmaupdate($youxiang)
	{
		$youxiang = $this->db->escape($youxiang);
		$sql = "UPDATE `yanzhengma` SET zhuangtai=2 WHERE youxiang = $youxiang";
		return $this->db->query($sql);
	}
	public function getyanzhengmaupdatekafei($mid,$leixing)
	{
		$mid = $this->db->escape($mid);
		$leixing = $this->db->escape($leixing);
		$sql = "UPDATE `member` SET status=1 WHERE mid = $mid and leixing = $leixing";
		return $this->db->query($sql);
	}
	public function getmemberinfoa($name,$pwd,$leixing)
	{

		$name = $this->db->escape($name);
		$leixing = $this->db->escape($leixing);
		$pwd = md5($pwd);
		$sql = "SELECT * FROM `member` WHERE youxiang= $name AND leixing = $leixing AND mima = '$pwd' ";

		$rest = $this->db->query($sql);

		if ($rest->num_rows() > 0) {
			return $this->db->query($sql)->row_array();
		} else {
			return false;
		}
	}

	public function getmemberinfoanew($name,$pwd)
	{

		$name = $this->db->escape($name);
		$pwd = md5($pwd);
		$sql = "SELECT * FROM `member` WHERE youxiang= $name AND mima = '$pwd' ";

		$rest = $this->db->query($sql);

		if ($rest->num_rows() > 0) {
			return $this->db->query($sql)->row_array();
		} else {
			return false;
		}
	}

	public function getmemberinfoainsert($youxiang,$mima,$leixing,$shoujihao,$xing,$ming,$gsming,$gsdizhi,$gsjianjie)
	{
		$youxiang = $this->db->escape($youxiang);
		$mima = md5($mima);
		$mima = $this->db->escape($mima);
		$leixing = $this->db->escape($leixing);
		$shoujihao = $this->db->escape($shoujihao);
		$xing = $this->db->escape($xing);
		$ming = $this->db->escape($ming);
		$gsming = $this->db->escape($gsming);
		$gsdizhi = $this->db->escape($gsdizhi);
		$gsjianjie = $this->db->escape($gsjianjie);
		$addtime = time();
		$sql = "INSERT INTO `member` (youxiang,mima,leixing,addtime,shoujihao,xing,ming,gsming,gsdizhi,gsjianjie) VALUES ($youxiang,$mima,$leixing,$addtime,$shoujihao,$xing,$ming,$gsming,$gsdizhi,$gsjianjie);";
		return $this->db->query($sql);
	}
	public function getmemberinfoainsertkafei($fid,$yuyanflg,$mid,$touxiang,$mingcheng,$dianhua,$youxiang,$zhou,$guojia,$chengshi,$leixing,$xiangxidizhi,$xinghao,$caigouliang,$caigoushijian,$chulitedian,$dianlogo,$addttime,$zhuangtai)
	{
		$fid = $this->db->escape($fid);
		$yuyanflg = $this->db->escape($yuyanflg);
		$mid = $this->db->escape($mid);
		$touxiang = $this->db->escape($touxiang);
		$mingcheng = $this->db->escape($mingcheng);
		$dianhua = $this->db->escape($dianhua);
		$youxiang = $this->db->escape($youxiang);
		$zhou = $this->db->escape($zhou);
		$guojia = $this->db->escape($guojia);
		$chengshi = $this->db->escape($chengshi);
		$leixing = $this->db->escape($leixing);
		$xiangxidizhi = $this->db->escape($xiangxidizhi);
		$xinghao = $this->db->escape($xinghao);
		$caigouliang = $this->db->escape($caigouliang);
		$caigoushijian = $this->db->escape($caigoushijian);
		$chulitedian = $this->db->escape($chulitedian);
		$dianlogo = $this->db->escape($dianlogo);
		$addttime = $this->db->escape($addttime);
		$zhuangtai = $this->db->escape($zhuangtai);
		$sql = "INSERT INTO `kafeidian` (fid,yuyanflg,mid,touxiang,mingcheng,dianhua,youxiang,zhou,guojia,chengshi,leixing,xiangxidizhi,xinghao,caigouliang,caigoushijian,chulitedian,dianlogo,addtime,zhuangtai) VALUES ($fid,$yuyanflg,$mid,$touxiang,$mingcheng,$dianhua,$youxiang,$zhou,$guojia,$chengshi,$leixing,$xiangxidizhi,$xinghao,$caigouliang,$caigoushijian,$chulitedian,$dianlogo,$addttime,$zhuangtai)";
		$this->db->query($sql);
		$id=$this->db->insert_id();
		return $id;
	}
	public function getmemberinfoainsertnongchang($fid,$yuyanflg,$mid,$touxiang,$xingming,$xingbie,$dianhua,$youxiang,$zhou,$guojia,$chengshi,$kafeiming,$caijididian,$xiangxidizhi,$zhongzhimianji,$chulifangshi,$chulitedian,$hongguoshuliang,$haibagaodu,$shouhuoshijian,$niancanliang,$nonglogo,$addtime,$zhuangtai)
	{
		$fid = $this->db->escape($fid);
		$yuyanflg = $this->db->escape($yuyanflg);
		$mid = $this->db->escape($mid);
		$touxiang = $this->db->escape($touxiang);
		$xingming = $this->db->escape($xingming);
		$xingbie = $this->db->escape($xingbie);
		$dianhua = $this->db->escape($dianhua);
		$youxiang = $this->db->escape($youxiang);
		$zhou = $this->db->escape($zhou);
		$guojia = $this->db->escape($guojia);
		$chengshi = $this->db->escape($chengshi);
		$kafeiming = $this->db->escape($kafeiming);
		$caijididian = $this->db->escape($caijididian);
		$xiangxidizhi = $this->db->escape($xiangxidizhi);
		$zhongzhimianji = $this->db->escape($zhongzhimianji);
		$chulifangshi = $this->db->escape($chulifangshi);
		$chulitedian = $this->db->escape($chulitedian);
		$hongguoshuliang = $this->db->escape($hongguoshuliang);
		$haibagaodu = $this->db->escape($haibagaodu);
		$shouhuoshijian = $this->db->escape($shouhuoshijian);
		$niancanliang = $this->db->escape($niancanliang);
		$nonglogo = $this->db->escape($nonglogo);
		$addtime = $this->db->escape($addtime);
		$zhuangtai = $this->db->escape($zhuangtai);

		$sql = "INSERT INTO `nongchangzhu` (fid,yuyanflg,mid,touxiang,xingming,xingbie,dianhua,youxiang,zhou,guojia,chengshi,kafeiming,caijididian,xiangxidizhi,zhongzhimianji,chulifangshi,chulitedian,hongguoshuliang,haibagaodu,shouhuoshijian,niancanliang,nonglogo,addtime,zhuangtai) VALUES ($fid,$yuyanflg,$mid,$touxiang,$xingming,$xingbie,$dianhua,$youxiang,$zhou,$guojia,$chengshi,$kafeiming,$caijididian,$xiangxidizhi,$zhongzhimianji,$chulifangshi,$chulitedian,$hongguoshuliang,$haibagaodu,$shouhuoshijian,$niancanliang,$nonglogo,$addtime,$zhuangtai)";
		$this->db->query($sql);
		$id=$this->db->insert_id();
		return $id;
	}
	public function getmemberyanzhengmainsert($youxiang,$guoqishijian,$yanzhengma,$addtime,$zhuangtai)
	{
		$youxiang = $this->db->escape($youxiang);
		$guoqishijian = $this->db->escape($guoqishijian);
		$yanzhengma = $this->db->escape($yanzhengma);
		$addtime = $this->db->escape($addtime);
		$zhuangtai = $this->db->escape($zhuangtai);
		$sql = "INSERT INTO `yanzhengma` (youxiang,guoqishijian,yanzhengma,addtime,zhuangtai) VALUES ($youxiang,$guoqishijian,$yanzhengma,$addtime,$zhuangtai);";
		return $this->db->query($sql);
	}
	//获取会员感兴趣商品数
	public function getmembergoodscount($id)
	{
		$sqlw = " where 1=1 and uid = $id";
		$sql = "SELECT count(1) as number FROM `interest` " . $sqlw;
		$number = $this->db->query($sql)->row()->number;
		return $number;
	}
	//获取会员总人数
	public function getmemberAllPagev($youxiang)
	{
		$sqlw = " where 1=1 and leixing = 2";

		if (!empty($youxiang)) {
			$sqlw .= " and ( youxiang like '%" . $youxiang . "%' ) ";
		}
		$sql = "SELECT count(1) as number FROM `member` " . $sqlw;
		$number = $this->db->query($sql)->row()->number;
		return ceil($number / 10) == 0 ? 1 : ceil($number / 10);
	}
	//获取会员总信息
	public function getmemberAllv($pg, $youxiang)
	{
		$sqlw = " where 1=1 and leixing = 2";

		if (!empty($youxiang)) {
			$sqlw .= " and ( youxiang like '%" . $youxiang . "%' ) ";
		}
		$start = ($pg - 1) * 10;
		$stop = 10;
		$sql = "SELECT u.* FROM `member` u  " . $sqlw . " order by addtime desc LIMIT $start, $stop";
//        print_r($sql);die;
		return $this->db->query($sql)->result_array();
	}

	//获取会员总人数
	public function getmemberAllPage1($youxiang)
	{
		$sqlw = " where 1=1 ";

		if (!empty($youxiang)) {
			$sqlw .= " and ( youxiang like '%" . $youxiang . "%' ) ";
		}
		$sql = "SELECT count(1) as number FROM `yanzhengma` " . $sqlw;
		$number = $this->db->query($sql)->row()->number;
		return ceil($number / 10) == 0 ? 1 : ceil($number / 10);
	}
	//获取会员总信息
	public function getmemberAll1($pg,$youxiang)
	{
		$sqlw = " where 1=1 ";

		if (!empty($youxiang)) {
			$sqlw .= " and ( youxiang like '%" . $youxiang . "%' ) ";
		}
		$start = ($pg - 1) * 10;
		$stop = 10;
		$sql = "SELECT u.* FROM `yanzhengma` u  " . $sqlw . " order by addtime desc LIMIT $start, $stop";
//        print_r($sql);die;
		return $this->db->query($sql)->result_array();
	}
    //获取会员总人数
    public function getmemberAllPage($youxiang)
    {
		$sqlw = " where 1=1 and leixing = 1";

        if (!empty($youxiang)) {
            $sqlw .= " and ( youxiang like '%" . $youxiang . "%' ) ";
        }
        $sql = "SELECT count(1) as number FROM `member` " . $sqlw;
        $number = $this->db->query($sql)->row()->number;
        return ceil($number / 10) == 0 ? 1 : ceil($number / 10);
    }
    //获取会员总信息
    public function getmemberAll($pg,$youxiang)
    {
		$sqlw = " where 1=1 and leixing = 1";

		if (!empty($youxiang)) {
			$sqlw .= " and ( youxiang like '%" . $youxiang . "%' ) ";
		}
        $start = ($pg - 1) * 10;
        $stop = 10;
        $sql = "SELECT u.* FROM `member` u  " . $sqlw . " order by addtime desc LIMIT $start, $stop";
//        print_r($sql);die;
        return $this->db->query($sql)->result_array();
    }

    //根据id查看详情
    public function getmemberById($mid)
    {
        $mid = $this->db->escape($mid);
        $sql = "SELECT * FROM `member` where mid = $mid ";
        return $this->db->query($sql)->row_array();
    }
	public function getmemberById1($id)
	{
		$id = $this->db->escape($id);
		$sql = "SELECT * FROM `nongchangzhu` where id = $id ";
		return $this->db->query($sql)->row_array();
	}
	public function getmemberById11($id)
	{
		$id = $this->db->escape($id);
		$sql = "SELECT * FROM `nongchangzhu` where fid = $id ";
		return $this->db->query($sql)->row_array();
	}
	public function getmemberById2($id)
	{
		$id = $this->db->escape($id);
		$sql = "SELECT * FROM `kafeidian` where id = $id ";
		return $this->db->query($sql)->row_array();
	}
	public function getmemberById22($id)
	{
		$id = $this->db->escape($id);
		$sql = "SELECT * FROM `kafeidian` where fid = $id ";
		return $this->db->query($sql)->row_array();
	}
	public function kafeidian_delete($mid)
	{
		$mid = $this->db->escape($mid);
		$sql = "DELETE FROM kafeidian WHERE mid = $mid";
		return $this->db->query($sql);
	}
	public function nongchangzhu_delete($mid)
	{
		$mid = $this->db->escape($mid);
		$sql = "DELETE FROM nongchangzhu WHERE mid = $mid";
		return $this->db->query($sql);
	}

	public function getsearchex_xiaolistAll($pg,$caigouliang1,$caigouliang2,$guojia,$date1,$date2,$yuyanflg)
	{
		$sqlw = " where 1=1 and zhuangtai=1 and yuyanflg = " . $yuyanflg;

		if (!empty($guojia)) {
			$sqlw .= " and ( guojia like '%" . $guojia . "%' or mingcheng like '%" . $guojia . "%' or dianhua like '%" . $guojia . "%' or xiangxidizhi like '%" . $guojia . "%' ) ";
		}

		if (!empty($caigouliang1) && empty($caigouliang2)) {
			$sqlw .= " and caigouliang >= " .$caigouliang1;
		}
		if (empty($caigouliang1) && !empty($caigouliang2)) {
			$sqlw .= " and caigouliang <= " .$caigouliang2;
		}
		if (!empty($caigouliang1) && !empty($caigouliang2)) {
			$sqlw .= " and caigouliang >= " .$caigouliang1;
			$sqlw .= " and caigouliang <= " .$caigouliang2;
		}

		if (!empty($date1) && empty($date2)) {
			$sqlw .= " and addtime >= " .$date1;
		}
		if (empty($date1) && !empty($date2)) {
			$sqlw .= " and addtime <= " .$date2;
		}
		if (!empty($date1) && !empty($date2)) {
			$sqlw .= " and addtime >= " .$date1;
			$sqlw .= " and addtime <= " .$date2;
		}

		$start = ($pg - 1) * 10000;
		$stop = 10000;
		$sql = "SELECT u.* FROM `kafeidian` u  " . $sqlw . " order by addtime desc LIMIT $start, $stop";
		return $this->db->query($sql)->result_array();
	}
	public function getsearchex_xiaolistAllcount($pg,$caigouliang1,$caigouliang2,$guojia,$date1,$date2,$yuyanflg)
	{
		$sqlw = " where 1=1 and zhuangtai=1 and yuyanflg = " . $yuyanflg;
		if (!empty($guojia)) {
			$sqlw .= " and ( guojia like '%" . $guojia . "%' or mingcheng like '%" . $guojia . "%' or dianhua like '%" . $guojia . "%' or xiangxidizhi like '%" . $guojia . "%' ) ";
		}
		if (!empty($caigouliang1) && empty($caigouliang2)) {
			$sqlw .= " and caigouliang >= " .$caigouliang1;
		}
		if (empty($caigouliang1) && !empty($caigouliang2)) {
			$sqlw .= " and caigouliang <= " .$caigouliang2;
		}
		if (!empty($caigouliang1) && !empty($caigouliang2)) {
			$sqlw .= " and caigouliang >= " .$caigouliang1;
			$sqlw .= " and caigouliang <= " .$caigouliang2;
		}

		if (!empty($date1) && empty($date2)) {
			$sqlw .= " and addtime >= " .$date1;
		}
		if (empty($date1) && !empty($date2)) {
			$sqlw .= " and addtime <= " .$date2;
		}
		if (!empty($date1) && !empty($date2)) {
			$sqlw .= " and addtime >= " .$date1;
			$sqlw .= " and addtime <= " .$date2;
		}
		$sql = "SELECT count(1) as number FROM `kafeidian` " . $sqlw;
		$number = $this->db->query($sql)->row()->number;
		return $number;
	}

	public function getsearchex_xiaolistAll1($pg,$nianchanliang1,$nianchanliang2,$guojia,$date1,$date2,$yuyanflg)
	{
		$sqlw = " where 1=1 and zhuangtai=1 and yuyanflg = " . $yuyanflg;
		if (!empty($guojia)) {
			$sqlw .= " and ( guojia like '%" . $guojia . "%' or xingming like '%" . $guojia . "%' or dianhua like '%" . $guojia . "%' or xiangxidizhi like '%" . $guojia . "%' ) ";
		}
		if (!empty($nianchanliang1) && empty($nianchanliang2)) {
			$sqlw .= " and niancanliang >= " .$nianchanliang1;
		}
		if (empty($nianchanliang1) && !empty($nianchanliang2)) {
			$sqlw .= " and niancanliang <= " .$nianchanliang2;
		}
		if (!empty($nianchanliang1) && !empty($nianchanliang2)) {
			$sqlw .= " and niancanliang >= " .$nianchanliang1;
			$sqlw .= " and niancanliang <= " .$nianchanliang2;
		}

		if (!empty($date1) && empty($date2)) {
			$sqlw .= " and addtime >= " .$date1;
		}
		if (empty($date1) && !empty($date2)) {
			$sqlw .= " and addtime <= " .$date2;
		}
		if (!empty($date1) && !empty($date2)) {
			$sqlw .= " and addtime >= " .$date1;
			$sqlw .= " and addtime <= " .$date2;
		}
		$start = ($pg - 1) * 10000;
		$stop = 10000;
		$sql = "SELECT u.* FROM `nongchangzhu` u  " . $sqlw . " order by addtime desc LIMIT $start, $stop";

		return $this->db->query($sql)->result_array();
	}
	public function getsearchex_xiaolistAllcount1($pg,$nianchanliang1,$nianchanliang2,$guojia,$date1,$date2,$yuyanflg)
	{
		$sqlw = " where 1=1 and zhuangtai=1 and yuyanflg = " . $yuyanflg;
		if (!empty($guojia)) {
			$sqlw .= " and ( guojia like '%" . $guojia . "%' or xingming like '%" . $guojia . "%' or dianhua like '%" . $guojia . "%' or xiangxidizhi like '%" . $guojia . "%' ) ";
		}
		if (!empty($nianchanliang1) && empty($nianchanliang2)) {
			$sqlw .= " and niancanliang >= " .$nianchanliang1;
		}
		if (empty($nianchanliang1) && !empty($nianchanliang2)) {
			$sqlw .= " and niancanliang <= " .$nianchanliang2;
		}
		if (!empty($nianchanliang1) && !empty($nianchanliang2)) {
			$sqlw .= " and niancanliang >= " .$nianchanliang1;
			$sqlw .= " and niancanliang <= " .$nianchanliang2;
		}
		if (!empty($date1) && empty($date2)) {
			$sqlw .= " and addtime >= " .$date1;
		}
		if (empty($date1) && !empty($date2)) {
			$sqlw .= " and addtime <= " .$date2;
		}
		if (!empty($date1) && !empty($date2)) {
			$sqlw .= " and addtime >= " .$date1;
			$sqlw .= " and addtime <= " .$date2;
		}
		$sql = "SELECT count(1) as number FROM `nongchangzhu` " . $sqlw;
		$number = $this->db->query($sql)->row()->number;
		return $number;
	}
}
