<?php


class Goods_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->date = time();
        $this->load->database();
    }
	//商品count
	public function getgoodsAllPagefanyi()
	{
		$sqlw = " where ltype=0 ";
		$sql = "SELECT count(1) as number FROM `yuyan`" . $sqlw;

		$number = $this->db->query($sql)->row()->number;
		return ceil($number / 10) == 0 ? 1 : ceil($number / 10);
	}
	//商品list
	public function getgoodsAllNewfanyi($pg)
	{
		$sqlw = " where ltype=0 ";
		$start = ($pg - 1) * 10;
		$stop = 10;

		$sql = "SELECT * FROM `yuyan` " . $sqlw . " LIMIT $start, $stop";
		return $this->db->query($sql)->result_array();
	}

	public function getgoodsByIdnongchangzhu($id)
	{
		$id = $this->db->escape($id);
		$sql = "SELECT * FROM `nongchangzhu` where fid=$id ";
		return $this->db->query($sql)->row_array();
	}
	public function getgoodsByIdkafeidian($id)
	{
		$id = $this->db->escape($id);
		$sql = "SELECT * FROM `kafeidian` where fid=$id ";
		return $this->db->query($sql)->row_array();
	}
    //商品count
    public function getgoodsAllPage($xingming,$youxiang,$dianhua)
    {
		$sqlw = " where 1=1 and fid='' ";
		if (!empty($xingming)) {
			$sqlw .= " and ( xingming like '%" . $xingming . "%' ) ";
		}
		if (!empty($youxiang)) {
			$sqlw .= " and ( youxiang like '%" . $youxiang . "%' ) ";
		}
		if (!empty($dianhua)) {
			$sqlw .= " and ( dianhua like '%" . $dianhua . "%' ) ";
		}
        $sql = "SELECT count(1) as number FROM `nongchangzhu`" . $sqlw;

        $number = $this->db->query($sql)->row()->number;
        return ceil($number / 10) == 0 ? 1 : ceil($number / 10);
    }
    //商品list
    public function getgoodsAllNew($pg,$xingming,$youxiang,$dianhua)
    {
        $sqlw = " where 1=1 and fid='' ";
		if (!empty($xingming)) {
			$sqlw .= " and ( xingming like '%" . $xingming . "%' ) ";
		}
		if (!empty($youxiang)) {
			$sqlw .= " and ( youxiang like '%" . $youxiang . "%' ) ";
		}
		if (!empty($dianhua)) {
			$sqlw .= " and ( dianhua like '%" . $dianhua . "%' ) ";
		}
        $start = ($pg - 1) * 10;
        $stop = 10;

        $sql = "SELECT * FROM `nongchangzhu` " . $sqlw . " order by addtime desc LIMIT $start, $stop";
        return $this->db->query($sql)->result_array();
    }
	//商品count
	public function getgoodsAllPage1($mingcheng,$youxiang,$dianhua)
	{
		$sqlw = " where 1=1 and fid='' ";
		if (!empty($mingcheng)) {
			$sqlw .= " and ( mingcheng like '%" . $mingcheng . "%' ) ";
		}
		if (!empty($youxiang)) {
			$sqlw .= " and ( youxiang like '%" . $youxiang . "%' ) ";
		}
		if (!empty($dianhua)) {
			$sqlw .= " and ( dianhua like '%" . $dianhua . "%' ) ";
		}
		$sql = "SELECT count(1) as number FROM `kafeidian`" . $sqlw;

		$number = $this->db->query($sql)->row()->number;
		return ceil($number / 10) == 0 ? 1 : ceil($number / 10);
	}
	//商品list
	public function getgoodsAllNew1($pg,$mingcheng,$youxiang,$dianhua)
	{
		$sqlw = " where 1=1 and fid='' ";
		if (!empty($mingcheng)) {
			$sqlw .= " and ( mingcheng like '%" . $mingcheng . "%' ) ";
		}
		if (!empty($youxiang)) {
			$sqlw .= " and ( youxiang like '%" . $youxiang . "%' ) ";
		}
		if (!empty($dianhua)) {
			$sqlw .= " and ( dianhua like '%" . $dianhua . "%' ) ";
		}
		$start = ($pg - 1) * 10;
		$stop = 10;

		$sql = "SELECT * FROM `kafeidian` " . $sqlw . " order by addtime desc LIMIT $start, $stop";
		return $this->db->query($sql)->result_array();
	}



    //商品图片list
    public function getgoodsimgsAllNew($gid)
    {
        $gid = $this->db->escape($gid);
        $sqlw = " where 1=1 and gid = $gid";
        $sql = "SELECT * FROM `gimgs` " . $sqlw;
        return $this->db->query($sql)->result_array();
    }
    //商品byname
    public function getgoodsByname($gname)
    {
        $gname = $this->db->escape($gname);
        $sql = "SELECT * FROM `goods` where gname=$gname ";
        return $this->db->query($sql)->row_array();
    }
    //商品save
    public function goods_save($gname, $gtitle,$tid, $gsort,$gimg,$gcontent,$addtime,$status,$starttime)
    {
        $gname = $this->db->escape($gname);
		$starttime = $this->db->escape($starttime);
        $gtitle = $this->db->escape($gtitle);
        $tid = $this->db->escape($tid);
        $gsort = $this->db->escape($gsort);
        $gimg = $this->db->escape($gimg);
        $gcontent = $this->db->escape($gcontent);
        $addtime = $this->db->escape($addtime);
        $status = $this->db->escape($status);
        $sql = "INSERT INTO `goods` (status,gname, gtitle,tid,gsort,gimg,gcontent,addtime) VALUES ($status,$gname, $starttime,$tid,$gsort,$gimg,$gcontent,$addtime)";
        $this->db->query($sql);
        $gid=$this->db->insert_id();
        return $gid;
    }
    //商品bannersave
    public function goodsimg_save($gid,$imgs)
    {
        $gid = $this->db->escape($gid);
        $imgs = $this->db->escape($imgs);
        $sql = "INSERT INTO `gimgs` (gid,imgs) VALUES ($gid,$imgs)";
        return $this->db->query($sql);;
    }
    //商品delete
    public function goods_delete($id)
    {
        $id = $this->db->escape($id);
        $sql = "DELETE FROM nongchangzhu WHERE id = $id or fid = $id";
        return $this->db->query($sql);
    }
    //商品图片delete
    public function goodsimg_delete($gid)
    {
        $gid = $this->db->escape($gid);
        $sql = "DELETE FROM gimgs WHERE gid = $gid";
        return $this->db->query($sql);
    }
    //商品byid
	public function getgoodsByIdfanyi($id)
	{
		$id = $this->db->escape($id);
		$sql = "SELECT * FROM `yuyan` where id=$id ";
		return $this->db->query($sql)->row_array();
	}
    public function getgoodsById($id)
    {
        $id = $this->db->escape($id);
        $sql = "SELECT * FROM `nongchangzhu` where id=$id ";
        return $this->db->query($sql)->row_array();
    }
	public function getgoodsByIdfid($id)
	{
		$id = $this->db->escape($id);
		$sql = "SELECT * FROM `nongchangzhu` where fid=$id ";
		return $this->db->query($sql)->row_array();
	}
	public function getgoodsByIdfid1($id)
	{
		$id = $this->db->escape($id);
		$sql = "SELECT * FROM `kafeidian` where fid=$id ";
		return $this->db->query($sql)->row_array();
	}
    //商品byname id
    public function getgoodsById2($gname, $gid)
    {
        $gname = $this->db->escape($gname);
        $gid = $this->db->escape($gid);
        $sql = "SELECT * FROM `goods` where gname=$gname and gid!=$gid ";
        return $this->db->query($sql)->row_array();
    }
    //商品save_edit
    public function goods_save_edit($id,$hongguoshuliang,$haibagaodu,$touxiang,$xingming,$xingbie,$dianhua,$youxiang,$zhou,$guojia,$chengshi,$kafeiming,$zhuangtai,$caijididian,$xiangxidizhi,$zhongzhimianji,$chulifangshi,$chulitedian,$shouhuoshijian,$niancanliang,$nonglogo,$fazhanshi,$zhuyaochanpin,$jianjie,$updatetime)
    {
		$id = $this->db->escape($id);
		$hongguoshuliang = $this->db->escape($hongguoshuliang);
		$haibagaodu = $this->db->escape($haibagaodu);
		$updatetime = $this->db->escape($updatetime);
		$touxiang = $this->db->escape($touxiang);
		$xingming = $this->db->escape($xingming);
		$xingbie = $this->db->escape($xingbie);
		$dianhua = $this->db->escape($dianhua);
		$youxiang = $this->db->escape($youxiang);
		$zhou = $this->db->escape($zhou);
		$guojia = $this->db->escape($guojia);
		$chengshi = $this->db->escape($chengshi);
		$kafeiming = $this->db->escape($kafeiming);
		$zhuangtai = $this->db->escape($zhuangtai);
		$caijididian = $this->db->escape($caijididian);
		$xiangxidizhi = $this->db->escape($xiangxidizhi);
		$zhongzhimianji = $this->db->escape($zhongzhimianji);
		$chulifangshi = $this->db->escape($chulifangshi);
		$chulitedian = $this->db->escape($chulitedian);
		$shouhuoshijian = $this->db->escape($shouhuoshijian);
		$niancanliang = $this->db->escape($niancanliang);
		$nonglogo = $this->db->escape($nonglogo);
		$fazhanshi = $this->db->escape($fazhanshi);
		$zhuyaochanpin = $this->db->escape($zhuyaochanpin);
		$jianjie = $this->db->escape($jianjie);
        $sql = "UPDATE `nongchangzhu` SET hongguoshuliang=$hongguoshuliang,haibagaodu=$haibagaodu,updatetime=$updatetime,touxiang=$touxiang,xingming=$xingming,xingbie=$xingbie,dianhua=$dianhua,youxiang=$youxiang,
                          zhou=$zhou,guojia=$guojia,chengshi=$chengshi,kafeiming=$kafeiming,zhuangtai=$zhuangtai,
                          caijididian=$caijididian,xiangxidizhi=$xiangxidizhi,zhongzhimianji=$zhongzhimianji,chulifangshi=$chulifangshi,
                          chulitedian=$chulitedian,shouhuoshijian=$shouhuoshijian,niancanliang=$niancanliang,nonglogo=$nonglogo,
                          fazhanshi=$fazhanshi,zhuyaochanpin=$zhuyaochanpin,jianjie=$jianjie WHERE id = $id";
        return $this->db->query($sql);
    }

	public function goods_save_edit_fanyi($text1,$text2,$text3,$text4,$text5,$text6,$text7,$text8)
	{
		$text1 = $this->db->escape($text1);
		$text2 = $this->db->escape($text2);
		$text3 = $this->db->escape($text3);
		$text4 = $this->db->escape($text4);
		$text5 = $this->db->escape($text5);
		$text6 = $this->db->escape($text6);
		$text7 = $this->db->escape($text7);
		$text8 = $this->db->escape($text8);
		$sql = "UPDATE `yuyan` SET text1=$text1,text2=$text2,text3=$text3,text4=$text4,text5=$text5,text6=$text6,text7=$text7,text8=$text8 WHERE id = 2";
		return $this->db->query($sql);
	}

public function goods_save_edit_fanyi3($text1,$text2,$text3,$text4,$text5,$text6,$text7,$text8,$text9,$text10,$text11,$text12,$text13,$text14)
	{
		$text1 = $this->db->escape($text1);
		$text2 = $this->db->escape($text2);
		$text3 = $this->db->escape($text3);
		$text4 = $this->db->escape($text4);
		$text5 = $this->db->escape($text5);
		$text6 = $this->db->escape($text6);
		$text7 = $this->db->escape($text7);
		$text8 = $this->db->escape($text8);
		$text9 = $this->db->escape($text9);
		$text10 = $this->db->escape($text10);
		$text11 = $this->db->escape($text11);
		$text12 = $this->db->escape($text12);
		$text13 = $this->db->escape($text13);
		$text14 = $this->db->escape($text14);
		$sql = "UPDATE `yuyan` SET text1=$text1,text2=$text2,text3=$text3,text4=$text4,text5=$text5,text6=$text6,text7=$text7,text8=$text8,text9=$text9,text10=$text10,text11=$text11,text12=$text12,text13=$text13,text14=$text14 WHERE id = 8";
		return $this->db->query($sql);
	}
	
public function goods_save_edit_fanyi2($text8,$text9,$text10,$text11,$text12,$text13,$text14,$text15,$text16,$text17,$text18,$text19,$text20,$text21,$text22,$text23,$text24,$text25,$text26,$text27)
	{
		$text8 = $this->db->escape($text8);
		$text9 = $this->db->escape($text9);
		$text10 = $this->db->escape($text10);
		$text11 = $this->db->escape($text11);
		$text12 = $this->db->escape($text12);
		$text13 = $this->db->escape($text13);
		$text14 = $this->db->escape($text14);
		$text15 = $this->db->escape($text15);
		$text16 = $this->db->escape($text16);
		$text17 = $this->db->escape($text17);
		$text18 = $this->db->escape($text18);
		$text19 = $this->db->escape($text19);
		$text20 = $this->db->escape($text20);
		$text21 = $this->db->escape($text21);
		$text22 = $this->db->escape($text22);
		$text23 = $this->db->escape($text23);
		$text24 = $this->db->escape($text24);
		$text25 = $this->db->escape($text25);
		$text26 = $this->db->escape($text26);
		$text27 = $this->db->escape($text27);

		$sql = "UPDATE `yuyan` SET text8=$text8,text9=$text9,text10=$text10,text11=$text11,text12=$text12,text13=$text13,text14=$text14,text15=$text15,text16=$text16,text17=$text17,text18=$text18,text19=$text19,text20=$text20,text21=$text21,text22=$text22,text23=$text23,text24=$text24,text25=$text25,text26=$text26,text27=$text27 WHERE id = 6";
		return $this->db->query($sql);
	}
	
	public function goods_save_edit_fanyi1($text1,$text6,$text7,$text8,$text9,$text10,$text11,$text12,$text13,$text14,$text15,$text16,$text17,$text18,$text19,$text20,$text21,$text22)
	{
		$text1 = $this->db->escape($text1);
		$text6 = $this->db->escape($text6);
		$text7 = $this->db->escape($text7);
		$text8 = $this->db->escape($text8);
		$text9 = $this->db->escape($text9);
		$text10 = $this->db->escape($text10);
		$text11 = $this->db->escape($text11);
		$text12 = $this->db->escape($text12);
		$text13 = $this->db->escape($text13);
		$text14 = $this->db->escape($text14);
		$text15 = $this->db->escape($text15);
		$text16 = $this->db->escape($text16);
		$text17 = $this->db->escape($text17);
		$text18 = $this->db->escape($text18);
		$text19 = $this->db->escape($text19);
		$text20 = $this->db->escape($text20);
		$text21 = $this->db->escape($text21);
		$text22 = $this->db->escape($text22);

		$sql = "UPDATE `yuyan` SET text1=$text1,text6=$text6,text7=$text7,text8=$text8,text9=$text9,text10=$text10,text11=$text11,text12=$text12,text13=$text13,text14=$text14,text15=$text15,text16=$text16,text17=$text17,text18=$text18,text19=$text19,text20=$text20,text21=$text21,text22=$text22 WHERE id = 4";
		return $this->db->query($sql);
	}

	public function goods_save_edit1($leixing,$id,$touxiang,$mingcheng,$dianhua,$youxiang,$zhou,$guojia,$chengshi,$zhuangtai,$xiangxidizhi,$xinghao,$caigouliang,$caigoushijian,$chulitedian,$dianlogo,$fazhanshi,$zhuyaochanpin,$jianjie,$updatetime)
	{
		$leixing = $this->db->escape($leixing);
		$id = $this->db->escape($id);
		$updatetime = $this->db->escape($updatetime);
		$touxiang = $this->db->escape($touxiang);
		$mingcheng = $this->db->escape($mingcheng);
		$dianhua = $this->db->escape($dianhua);
		$youxiang = $this->db->escape($youxiang);
		$zhou = $this->db->escape($zhou);
		$guojia = $this->db->escape($guojia);
		$chengshi = $this->db->escape($chengshi);
		$zhuangtai = $this->db->escape($zhuangtai);
		$xiangxidizhi = $this->db->escape($xiangxidizhi);
		$xinghao = $this->db->escape($xinghao);
		$caigouliang = $this->db->escape($caigouliang);
		$caigoushijian = $this->db->escape($caigoushijian);
		$chulitedian = $this->db->escape($chulitedian);
		$dianlogo = $this->db->escape($dianlogo);
		$fazhanshi = $this->db->escape($fazhanshi);
		$zhuyaochanpin = $this->db->escape($zhuyaochanpin);
		$jianjie = $this->db->escape($jianjie);
		$sql = "UPDATE `kafeidian` SET leixing=$leixing,updatetime=$updatetime,touxiang=$touxiang,mingcheng=$mingcheng,dianhua=$dianhua,youxiang=$youxiang,
                          zhou=$zhou,guojia=$guojia,chengshi=$chengshi,zhuangtai=$zhuangtai,
                          xiangxidizhi=$xiangxidizhi,xinghao=$xinghao,caigouliang=$caigouliang,caigoushijian=$caigoushijian,
                          chulitedian=$chulitedian,dianlogo=$dianlogo,
                          fazhanshi=$fazhanshi,zhuyaochanpin=$zhuyaochanpin,jianjie=$jianjie WHERE id = $id";
		return $this->db->query($sql);
	}

	public function goods_new1($id,$zhuangtai)
	{
		$id = $this->db->escape($id);
		$zhuangtai = $this->db->escape($zhuangtai);
		$sql = "UPDATE `kafeidian` SET zhuangtai=$zhuangtai WHERE id = $id or fid = $id";
		return $this->db->query($sql);
	}

	public function goods_new2($id,$zhuangtai)
	{
		$id = $this->db->escape($id);
		$zhuangtai = $this->db->escape($zhuangtai);
		$sql = "UPDATE `nongchangzhu` SET zhuangtai=$zhuangtai WHERE id = $id or fid = $id";
		return $this->db->query($sql);
	}

	public function goods_save_edit1_new($id,$fazhanshi,$zhuyaochanpin,$jianjie,$updatetime)
	{
		$id = $this->db->escape($id);
		$updatetime = $this->db->escape($updatetime);
		$fazhanshi = $this->db->escape($fazhanshi);
		$zhuyaochanpin = $this->db->escape($zhuyaochanpin);
		$jianjie = $this->db->escape($jianjie);
		$sql = "UPDATE `kafeidian` SET updatetime=$updatetime,fazhanshi=$fazhanshi,zhuyaochanpin=$zhuyaochanpin,jianjie=$jianjie WHERE id = $id";
		return $this->db->query($sql);
	}

	public function goods_save_edit_new($id,$fazhanshi,$zhuyaochanpin,$jianjie,$updatetime)
	{
		$id = $this->db->escape($id);
		$updatetime = $this->db->escape($updatetime);
		$fazhanshi = $this->db->escape($fazhanshi);
		$zhuyaochanpin = $this->db->escape($zhuyaochanpin);
		$jianjie = $this->db->escape($jianjie);
		$sql = "UPDATE `nongchangzhu` SET updatetime=$updatetime,fazhanshi=$fazhanshi,zhuyaochanpin=$zhuyaochanpin,jianjie=$jianjie WHERE id = $id";
		return $this->db->query($sql);
	}

	//商品图片list
	public function getgoodsimgsAllNew1($gid)
	{
		$gid = $this->db->escape($gid);
		$sqlw = " where 1=1 and gid = $gid";
		$sql = "SELECT * FROM `home` " . $sqlw;
		return $this->db->query($sql)->result_array();
	}
	//商品byname
	public function getgoodsByname1($gname)
	{
		$gname = $this->db->escape($gname);
		$sql = "SELECT * FROM `home` where gname=$gname ";
		return $this->db->query($sql)->row_array();
	}
	//商品save
	public function goods_save1($gname, $gtitle,$tid, $gsort,$gimg,$gcontent,$addtime,$status,$starttime,$tel,$gimg1)
	{
		$gname = $this->db->escape($gname);
		$starttime = $this->db->escape($starttime);
		$tel = $this->db->escape($tel);
		$gimg1 = $this->db->escape($gimg1);
		$gsort = $this->db->escape($gsort);
		$gimg = $this->db->escape($gimg);
		$gcontent = $this->db->escape($gcontent);
		$addtime = $this->db->escape($addtime);
		$status = $this->db->escape($status);
		$sql = "INSERT INTO `home` (gname, gtitle,gsort,gimg,gcontent,addtime,tel,gimg1) VALUES ($gname, $starttime,$gsort,$gimg,$gcontent,$addtime,$tel,$gimg1)";
		$this->db->query($sql);
		$gid=$this->db->insert_id();
		return $gid;
	}
	//商品delete
	public function goods_delete1($id)
	{
		$id = $this->db->escape($id);
		$sql = "DELETE FROM kafeidian WHERE id = $id or fid = $id";
		return $this->db->query($sql);
	}
	//商品byid
	public function getgoodsById1($id)
	{
		$id = $this->db->escape($id);
		$sql = "SELECT * FROM `kafeidian` where id=$id ";
		return $this->db->query($sql)->row_array();
	}
	//商品byname id
	public function getgoodsById21($gname, $gid)
	{
		$gname = $this->db->escape($gname);
		$gid = $this->db->escape($gid);
		$sql = "SELECT * FROM `home` where gname=$gname and gid!=$gid ";
		return $this->db->query($sql)->row_array();
	}

	//商品count
	public function getgoodsAllPage2($gname)
	{
		$sqlw = " where 1=1 ";
		if (!empty($gname)) {
			$sqlw .= " and ( gname like '%" . $gname . "%' ) ";
		}
		$sql = "SELECT count(1) as number FROM `decorate`" . $sqlw;

		$number = $this->db->query($sql)->row()->number;
		return ceil($number / 10) == 0 ? 1 : ceil($number / 10);
	}
	//商品list
	public function getgoodsAllNew2($pg,$gname)
	{
		$sqlw = " where 1=1 ";
		if (!empty($gname)) {
			$sqlw .= " and ( gname like '%" . $gname . "%' ) ";
		}
		$start = ($pg - 1) * 10;
		$stop = 10;

		$sql = "SELECT * FROM `decorate` " . $sqlw . " order by gsort desc LIMIT $start, $stop";
		return $this->db->query($sql)->result_array();
	}
	//商品图片list
	public function getgoodsimgsAllNew2($gid)
	{
		$gid = $this->db->escape($gid);
		$sqlw = " where 1=1 and gid = $gid";
		$sql = "SELECT * FROM `decorate` " . $sqlw;
		return $this->db->query($sql)->result_array();
	}
	//商品byname
	public function getgoodsByname2($gname)
	{
		$gname = $this->db->escape($gname);
		$sql = "SELECT * FROM `decorate` where gname=$gname ";
		return $this->db->query($sql)->row_array();
	}
	//商品save
	public function goods_save2($gname, $gtitle,$tid, $gsort,$gimg,$gcontent,$addtime,$status,$starttime,$tel,$gimg1)
	{
		$gname = $this->db->escape($gname);
		$starttime = $this->db->escape($starttime);
		$tel = $this->db->escape($tel);
		$gimg1 = $this->db->escape($gimg1);
		$gsort = $this->db->escape($gsort);
		$gimg = $this->db->escape($gimg);
		$gcontent = $this->db->escape($gcontent);
		$addtime = $this->db->escape($addtime);
		$status = $this->db->escape($status);
		$sql = "INSERT INTO `decorate` (gname, gtitle,gsort,gimg,gcontent,addtime,tel,gimg1) VALUES ($gname, $starttime,$gsort,$gimg,$gcontent,$addtime,$tel,$gimg1)";
		$this->db->query($sql);
		$gid=$this->db->insert_id();
		return $gid;
	}
	//商品delete
	public function goods_delete2($id)
	{
		$id = $this->db->escape($id);
		$sql = "DELETE FROM decorate WHERE gid = $id";
		return $this->db->query($sql);
	}
	//商品byid
	public function getgoodsById12($id)
	{
		$id = $this->db->escape($id);
		$sql = "SELECT * FROM `decorate` where gid=$id ";
		return $this->db->query($sql)->row_array();
	}
	//商品byname id
	public function getgoodsById22($gname, $gid)
	{
		$gname = $this->db->escape($gname);
		$gid = $this->db->escape($gid);
		$sql = "SELECT * FROM `decorate` where gname=$gname and gid!=$gid ";
		return $this->db->query($sql)->row_array();
	}
	//商品save_edit
	public function goods_save_edit2($gid, $gname, $gtitle, $tid, $gsort, $gimg, $gcontent,$status,$starttime,$tel,$gimg1)
	{
		$gid = $this->db->escape($gid);
		$gname = $this->db->escape($gname);
		$tel = $this->db->escape($tel);
		$gimg1 = $this->db->escape($gimg1);
		$starttime = $this->db->escape($starttime);
		$gsort = $this->db->escape($gsort);
		$gimg = $this->db->escape($gimg);
		$gcontent = $this->db->escape($gcontent);
		$status = $this->db->escape($status);
		$sql = "UPDATE `decorate` SET tel=$tel,gimg1=$gimg1,gname=$gname,gtitle=$starttime,gsort=$gsort,gimg=$gimg,gcontent=$gcontent WHERE gid = $gid";
		return $this->db->query($sql);
	}





	//商品count
	public function getgoodsAllPage3($gname)
	{
		$sqlw = " where 1=1 ";
		if (!empty($gname)) {
			$sqlw .= " and ( gname like '%" . $gname . "%' ) ";
		}
		$sql = "SELECT count(1) as number FROM `gamble`" . $sqlw;

		$number = $this->db->query($sql)->row()->number;
		return ceil($number / 10) == 0 ? 1 : ceil($number / 10);
	}
	//商品list
	public function getgoodsAllNew3($pg,$gname)
	{
		$sqlw = " where 1=1 ";
		if (!empty($gname)) {
			$sqlw .= " and ( gname like '%" . $gname . "%' ) ";
		}
		$start = ($pg - 1) * 10;
		$stop = 10;

		$sql = "SELECT * FROM `gamble` " . $sqlw . " order by gsort desc LIMIT $start, $stop";
		return $this->db->query($sql)->result_array();
	}
	//商品图片list
	public function getgoodsimgsAllNew3($gid)
	{
		$gid = $this->db->escape($gid);
		$sqlw = " where 1=1 and gid = $gid";
		$sql = "SELECT * FROM `gamble` " . $sqlw;
		return $this->db->query($sql)->result_array();
	}
	//商品byname
	public function getgoodsByname3($gname)
	{
		$gname = $this->db->escape($gname);
		$sql = "SELECT * FROM `gamble` where gname=$gname ";
		return $this->db->query($sql)->row_array();
	}
	//商品save
	public function goods_save3($gname, $gtitle,$tid, $gsort,$gimg,$gcontent,$addtime,$status,$starttime,$tel,$gimg1)
	{
		$gname = $this->db->escape($gname);
		$starttime = $this->db->escape($starttime);
		$tel = $this->db->escape($tel);
		$gimg1 = $this->db->escape($gimg1);
		$gsort = $this->db->escape($gsort);
		$gimg = $this->db->escape($gimg);
		$gcontent = $this->db->escape($gcontent);
		$addtime = $this->db->escape($addtime);
		$status = $this->db->escape($status);
		$sql = "INSERT INTO `gamble` (gname, gtitle,gsort,gimg,gcontent,addtime,tel,gimg1) VALUES ($gname, $starttime,$gsort,$gimg,$gcontent,$addtime,$tel,$gimg1)";
		$this->db->query($sql);
		$gid=$this->db->insert_id();
		return $gid;
	}
	//商品delete
	public function goods_delete3($id)
	{
		$id = $this->db->escape($id);
		$sql = "DELETE FROM gamble WHERE gid = $id";
		return $this->db->query($sql);
	}
	//商品byid
	public function getgoodsById123($id)
	{
		$id = $this->db->escape($id);
		$sql = "SELECT * FROM `gamble` where gid=$id ";
		return $this->db->query($sql)->row_array();
	}
	//商品byname id
	public function getgoodsById223($gname, $gid)
	{
		$gname = $this->db->escape($gname);
		$gid = $this->db->escape($gid);
		$sql = "SELECT * FROM `gamble` where gname=$gname and gid!=$gid ";
		return $this->db->query($sql)->row_array();
	}
	//商品save_edit
	public function goods_save_edit3($gid, $gname, $gtitle, $tid, $gsort, $gimg, $gcontent,$status,$starttime,$tel,$gimg1)
	{
		$gid = $this->db->escape($gid);
		$gname = $this->db->escape($gname);
		$tel = $this->db->escape($tel);
		$gimg1 = $this->db->escape($gimg1);
		$starttime = $this->db->escape($starttime);
		$gsort = $this->db->escape($gsort);
		$gimg = $this->db->escape($gimg);
		$gcontent = $this->db->escape($gcontent);
		$status = $this->db->escape($status);
		$sql = "UPDATE `gamble` SET tel=$tel,gimg1=$gimg1,gname=$gname,gtitle=$starttime,gsort=$gsort,gimg=$gimg,gcontent=$gcontent WHERE gid = $gid";
		return $this->db->query($sql);
	}



    //商品count
	public function getgoodsAllPage4($gname)
	{
		$sqlw = " where 1=1 ";
		if (!empty($gname)) {
			$sqlw .= " and ( gname like '%" . $gname . "%' ) ";
		}
		$sql = "SELECT count(1) as number FROM `thelaw`" . $sqlw;

		$number = $this->db->query($sql)->row()->number;
		return ceil($number / 10) == 0 ? 1 : ceil($number / 10);
	}
	//商品list
	public function getgoodsAllNew4($pg,$gname)
	{
		$sqlw = " where 1=1 ";
		if (!empty($gname)) {
			$sqlw .= " and ( gname like '%" . $gname . "%' ) ";
		}
		$start = ($pg - 1) * 10;
		$stop = 10;

		$sql = "SELECT * FROM `thelaw` " . $sqlw . " order by gsort desc LIMIT $start, $stop";
		return $this->db->query($sql)->result_array();
	}
	//商品图片list
	public function getgoodsimgsAllNew4($gid)
	{
		$gid = $this->db->escape($gid);
		$sqlw = " where 1=1 and gid = $gid";
		$sql = "SELECT * FROM `thelaw` " . $sqlw;
		return $this->db->query($sql)->result_array();
	}
	//商品byname
	public function getgoodsByname4($gname)
	{
		$gname = $this->db->escape($gname);
		$sql = "SELECT * FROM `thelaw` where gname=$gname ";
		return $this->db->query($sql)->row_array();
	}
	//商品save
	public function goods_save4($gname, $gtitle,$tid, $gsort,$gimg,$gcontent,$addtime,$status,$starttime,$tel,$gimg1)
	{
		$gname = $this->db->escape($gname);
		$starttime = $this->db->escape($starttime);
		$tel = $this->db->escape($tel);
		$gimg1 = $this->db->escape($gimg1);
		$gsort = $this->db->escape($gsort);
		$gimg = $this->db->escape($gimg);
		$gcontent = $this->db->escape($gcontent);
		$addtime = $this->db->escape($addtime);
		$status = $this->db->escape($status);
		$sql = "INSERT INTO `thelaw` (gname, gtitle,gsort,gimg,gcontent,addtime,tel,gimg1) VALUES ($gname, $starttime,$gsort,$gimg,$gcontent,$addtime,$tel,$gimg1)";
		$this->db->query($sql);
		$gid=$this->db->insert_id();
		return $gid;
	}
	//商品delete
	public function goods_delete4($id)
	{
		$id = $this->db->escape($id);
		$sql = "DELETE FROM thelaw WHERE gid = $id";
		return $this->db->query($sql);
	}
	//商品byid
	public function getgoodsById1234($id)
	{
		$id = $this->db->escape($id);
		$sql = "SELECT * FROM `thelaw` where gid=$id ";
		return $this->db->query($sql)->row_array();
	}
	//商品byname id
	public function getgoodsById2234($gname, $gid)
	{
		$gname = $this->db->escape($gname);
		$gid = $this->db->escape($gid);
		$sql = "SELECT * FROM `thelaw` where gname=$gname and gid!=$gid ";
		return $this->db->query($sql)->row_array();
	}
	//商品save_edit
	public function goods_save_edit4($gid, $gname, $gtitle, $tid, $gsort, $gimg, $gcontent,$status,$starttime,$tel,$gimg1)
	{
		$gid = $this->db->escape($gid);
		$gname = $this->db->escape($gname);
		$tel = $this->db->escape($tel);
		$gimg1 = $this->db->escape($gimg1);
		$starttime = $this->db->escape($starttime);
		$gsort = $this->db->escape($gsort);
		$gimg = $this->db->escape($gimg);
		$gcontent = $this->db->escape($gcontent);
		$status = $this->db->escape($status);
		$sql = "UPDATE `thelaw` SET tel=$tel,gimg1=$gimg1,gname=$gname,gtitle=$starttime,gsort=$gsort,gimg=$gimg,gcontent=$gcontent WHERE gid = $gid";
		return $this->db->query($sql);
	}



	//商品count
	public function getgoodsAllPage5($gname)
	{
		$sqlw = " where 1=1 ";
		if (!empty($gname)) {
			$sqlw .= " and ( gname like '%" . $gname . "%' ) ";
		}
		$sql = "SELECT count(1) as number FROM `ercar`" . $sqlw;

		$number = $this->db->query($sql)->row()->number;
		return ceil($number / 10) == 0 ? 1 : ceil($number / 10);
	}
	//商品list
	public function getgoodsAllNew5($pg,$gname)
	{
		$sqlw = " where 1=1 ";
		if (!empty($gname)) {
			$sqlw .= " and ( gname like '%" . $gname . "%' ) ";
		}
		$start = ($pg - 1) * 10;
		$stop = 10;

		$sql = "SELECT * FROM `ercar` " . $sqlw . " order by gsort desc LIMIT $start, $stop";
		return $this->db->query($sql)->result_array();
	}
	//商品图片list
	public function getgoodsimgsAllNew5($gid)
	{
		$gid = $this->db->escape($gid);
		$sqlw = " where 1=1 and gid = $gid";
		$sql = "SELECT * FROM `ercar` " . $sqlw;
		return $this->db->query($sql)->result_array();
	}
	//商品byname
	public function getgoodsByname5($gname)
	{
		$gname = $this->db->escape($gname);
		$sql = "SELECT * FROM `ercar` where gname=$gname ";
		return $this->db->query($sql)->row_array();
	}
	//商品save
	public function goods_save5($gname, $gtitle,$tid, $gsort,$gimg,$gcontent,$addtime,$status,$starttime,$tel,$gimg1)
	{
		$gname = $this->db->escape($gname);
		$starttime = $this->db->escape($starttime);
		$tel = $this->db->escape($tel);
		$gimg1 = $this->db->escape($gimg1);
		$gsort = $this->db->escape($gsort);
		$gimg = $this->db->escape($gimg);
		$gcontent = $this->db->escape($gcontent);
		$addtime = $this->db->escape($addtime);
		$status = $this->db->escape($status);
		$sql = "INSERT INTO `ercar` (gname, gtitle,gsort,gimg,gcontent,addtime,tel,gimg1) VALUES ($gname, $starttime,$gsort,$gimg,$gcontent,$addtime,$tel,$gimg1)";
		$this->db->query($sql);
		$gid=$this->db->insert_id();
		return $gid;
	}
	//商品delete
	public function goods_delete5($id)
	{
		$id = $this->db->escape($id);
		$sql = "DELETE FROM ercar WHERE gid = $id";
		return $this->db->query($sql);
	}
	//商品byid
	public function getgoodsById12345($id)
	{
		$id = $this->db->escape($id);
		$sql = "SELECT * FROM `ercar` where gid=$id ";
		return $this->db->query($sql)->row_array();
	}
	//商品byname id
	public function getgoodsById22345($gname, $gid)
	{
		$gname = $this->db->escape($gname);
		$gid = $this->db->escape($gid);
		$sql = "SELECT * FROM `ercar` where gname=$gname and gid!=$gid ";
		return $this->db->query($sql)->row_array();
	}
	//商品save_edit
	public function goods_save_edit5($gid, $gname, $gtitle, $tid, $gsort, $gimg, $gcontent,$status,$starttime,$tel,$gimg1)
	{
		$gid = $this->db->escape($gid);
		$gname = $this->db->escape($gname);
		$tel = $this->db->escape($tel);
		$gimg1 = $this->db->escape($gimg1);
		$starttime = $this->db->escape($starttime);
		$gsort = $this->db->escape($gsort);
		$gimg = $this->db->escape($gimg);
		$gcontent = $this->db->escape($gcontent);
		$status = $this->db->escape($status);
		$sql = "UPDATE `ercar` SET tel=$tel,gimg1=$gimg1,gname=$gname,gtitle=$starttime,gsort=$gsort,gimg=$gimg,gcontent=$gcontent WHERE gid = $gid";
		return $this->db->query($sql);
	}






	//商品count
	public function getgoodsAllPage6($gname)
	{
		$sqlw = " where 1=1 ";
		if (!empty($gname)) {
			$sqlw .= " and ( gname like '%" . $gname . "%' ) ";
		}
		$sql = "SELECT count(1) as number FROM `plane`" . $sqlw;

		$number = $this->db->query($sql)->row()->number;
		return ceil($number / 10) == 0 ? 1 : ceil($number / 10);
	}
	//商品list
	public function getgoodsAllNew6($pg,$gname)
	{
		$sqlw = " where 1=1 ";
		if (!empty($gname)) {
			$sqlw .= " and ( gname like '%" . $gname . "%' ) ";
		}
		$start = ($pg - 1) * 10;
		$stop = 10;

		$sql = "SELECT * FROM `plane` " . $sqlw . " order by gsort desc LIMIT $start, $stop";
		return $this->db->query($sql)->result_array();
	}
	//商品图片list
	public function getgoodsimgsAllNew6($gid)
	{
		$gid = $this->db->escape($gid);
		$sqlw = " where 1=1 and gid = $gid";
		$sql = "SELECT * FROM `plane` " . $sqlw;
		return $this->db->query($sql)->result_array();
	}
	//商品byname
	public function getgoodsByname6($gname)
	{
		$gname = $this->db->escape($gname);
		$sql = "SELECT * FROM `plane` where gname=$gname ";
		return $this->db->query($sql)->row_array();
	}
	//商品save
	public function goods_save6($gname, $gtitle,$tid, $gsort,$gimg,$gcontent,$addtime,$status,$starttime,$tel,$gimg1)
	{
		$gname = $this->db->escape($gname);
		$starttime = $this->db->escape($starttime);
		$tel = $this->db->escape($tel);
		$gimg1 = $this->db->escape($gimg1);
		$gsort = $this->db->escape($gsort);
		$gimg = $this->db->escape($gimg);
		$gcontent = $this->db->escape($gcontent);
		$addtime = $this->db->escape($addtime);
		$status = $this->db->escape($status);
		$sql = "INSERT INTO `plane` (gname, gtitle,gsort,gimg,gcontent,addtime,tel,gimg1) VALUES ($gname, $starttime,$gsort,$gimg,$gcontent,$addtime,$tel,$gimg1)";
		$this->db->query($sql);
		$gid=$this->db->insert_id();
		return $gid;
	}
	//商品delete
	public function goods_delete6($id)
	{
		$id = $this->db->escape($id);
		$sql = "DELETE FROM plane WHERE gid = $id";
		return $this->db->query($sql);
	}
	//商品byid
	public function getgoodsById123456($id)
	{
		$id = $this->db->escape($id);
		$sql = "SELECT * FROM `plane` where gid=$id ";
		return $this->db->query($sql)->row_array();
	}
	//商品byname id
	public function getgoodsById223456($gname, $gid)
	{
		$gname = $this->db->escape($gname);
		$gid = $this->db->escape($gid);
		$sql = "SELECT * FROM `plane` where gname=$gname and gid!=$gid ";
		return $this->db->query($sql)->row_array();
	}
	//商品save_edit
	public function goods_save_edit6($gid, $gname, $gtitle, $tid, $gsort, $gimg, $gcontent,$status,$starttime,$tel,$gimg1)
	{
		$gid = $this->db->escape($gid);
		$gname = $this->db->escape($gname);
		$tel = $this->db->escape($tel);
		$gimg1 = $this->db->escape($gimg1);
		$starttime = $this->db->escape($starttime);
		$gsort = $this->db->escape($gsort);
		$gimg = $this->db->escape($gimg);
		$gcontent = $this->db->escape($gcontent);
		$status = $this->db->escape($status);
		$sql = "UPDATE `plane` SET tel=$tel,gimg1=$gimg1,gname=$gname,gtitle=$starttime,gsort=$gsort,gimg=$gimg,gcontent=$gcontent WHERE gid = $gid";
		return $this->db->query($sql);
	}










	//兴趣商品count
	public function getinterestAllPage($ename,$mid)
	{
		$sqlw = " where 1=1 and uid = $mid";
		if (!empty($ename)) {
			$sqlw .= " and ( goodsname like '%" . $ename . "%' ) ";
		}
		$sql = "SELECT count(1) as number FROM `interest`" . $sqlw;

		$number = $this->db->query($sql)->row()->number;
		return ceil($number / 10) == 0 ? 1 : ceil($number / 10);
	}
	//兴趣商品list
	public function getinterestAllNew($pg,$ename,$mid)
	{
		$sqlw = " where 1=1 and uid = $mid";
		if (!empty($ename)) {
			$sqlw .= " and ( goodsname like '%" . $ename . "%' ) ";
		}
		$start = ($pg - 1) * 10;
		$stop = 10;

		$sql = "SELECT * FROM `interest` " . $sqlw . " order by id desc LIMIT $start, $stop";
		return $this->db->query($sql)->result_array();
	}

	//商品count
	public function getitemsAllPage($ename)
	{
		$sqlw = " where 1=1 ";
		if (!empty($ename)) {
			$sqlw .= " and ( ename like '%" . $ename . "%' ) ";
		}
		$sql = "SELECT count(1) as number FROM `items`" . $sqlw;

		$number = $this->db->query($sql)->row()->number;
		return ceil($number / 10) == 0 ? 1 : ceil($number / 10);
	}
	//商品list
	public function getitemsAllNew($pg,$ename)
	{
		$sqlw = " where 1=1 ";
		if (!empty($ename)) {
			$sqlw .= " and ( ename like '%" . $ename . "%' ) ";
		}
		$start = ($pg - 1) * 10;
		$stop = 10;

		$sql = "SELECT * FROM `items` " . $sqlw . " order by esort desc LIMIT $start, $stop";
		return $this->db->query($sql)->result_array();
	}
	//商品图片list
	public function getitemsimgsAllNew($id)
	{
		$id = $this->db->escape($id);
		$sqlw = " where 1=1 and eid = $id";
		$sql = "SELECT * FROM `itemsimg` " . $sqlw;
		return $this->db->query($sql)->result_array();
	}
	//商品byname
	public function getitemsByname($ename)
	{
		$ename = $this->db->escape($ename);
		$sql = "SELECT * FROM `items` where ename=$ename ";
		return $this->db->query($sql)->row_array();
	}
	//商品save
	public function items_save($topprice,$topnums,$cid,$ename,$etitle,$unitprice,$unitnums,$batchprice,$batchnums,$sumnums,$place,$delivery,$esort,$gimg,$content,$parameter,$addtime,$ishot)
	{
		$topprice = $this->db->escape($topprice);
		$topnums = $this->db->escape($topnums);
		$cid = $this->db->escape($cid);
		$ename = $this->db->escape($ename);
		$etitle = $this->db->escape($etitle);
		$unitprice = $this->db->escape($unitprice);
		$unitnums = $this->db->escape($unitnums);
		$batchprice = $this->db->escape($batchprice);
		$batchnums = $this->db->escape($batchnums);
		$sumnums = $this->db->escape($sumnums);
		$place = $this->db->escape($place);
		$delivery = $this->db->escape($delivery);
		$esort = $this->db->escape($esort);
		$gimg = $this->db->escape($gimg);
		$content = $this->db->escape($content);
		$parameter = $this->db->escape($parameter);
		$addtime = $this->db->escape($addtime);
		$ishot = $this->db->escape($ishot);
		$sql = "INSERT INTO `items` (topprice,topnums,cid,ename,etitle,unitprice,unitnums,batchprice,batchnums,sumnums,place,delivery,esort,img,content,parameter,addtime,ishot) VALUES ($topprice,$topnums,$cid,$ename,$etitle,$unitprice,$unitnums,$batchprice,$batchnums,$sumnums,$place,$delivery,$esort,$gimg,$content,$parameter,$addtime,$ishot)";
		$this->db->query($sql);
		$gid=$this->db->insert_id();
		return $gid;
	}
	//商品bannersave
	public function itemsimg_save($id,$imgs)
	{
		$id = $this->db->escape($id);
		$imgs = $this->db->escape($imgs);
		$sql = "INSERT INTO `itemsimg` (eid,img) VALUES ($id,$imgs)";
		return $this->db->query($sql);;
	}
	//商品delete
	public function items_delete($id)
	{
		$id = $this->db->escape($id);
		$sql = "DELETE FROM items WHERE id = $id";
		return $this->db->query($sql);
	}
	//商品图片delete
	public function itemsimg_delete($gid)
	{
		$gid = $this->db->escape($gid);
		$sql = "DELETE FROM itemsimg WHERE eid = $gid";
		return $this->db->query($sql);
	}
	//商品byid
	public function getitemsById($id)
	{
		$id = $this->db->escape($id);
		$sql = "SELECT * FROM `items` where id=$id ";
		return $this->db->query($sql)->row_array();
	}
	//商品byname id
	public function getitemsById2($ename, $id)
	{
		$ename = $this->db->escape($ename);
		$gid = $this->db->escape($id);
		$sql = "SELECT * FROM `items` where ename=$ename and id!=$gid ";
		return $this->db->query($sql)->row_array();
	}
	//商品save_edit
	public function items_save_edit($topprice,$topnums,$id,$cid,$ename,$etitle,$unitprice,$unitnums,$batchprice,$batchnums,$sumnums,$place,$delivery,$esort,$gimg,$content,$parameter,$ishot)
	{
		$topprice = $this->db->escape($topprice);
		$topnums = $this->db->escape($topnums);
		$id = $this->db->escape($id);
		$cid = $this->db->escape($cid);
		$ename = $this->db->escape($ename);
		$etitle = $this->db->escape($etitle);
		$unitprice = $this->db->escape($unitprice);
		$unitnums = $this->db->escape($unitnums);
		$batchprice = $this->db->escape($batchprice);
		$batchnums = $this->db->escape($batchnums);
		$sumnums = $this->db->escape($sumnums);
		$place = $this->db->escape($place);
		$delivery = $this->db->escape($delivery);
		$esort = $this->db->escape($esort);
		$gimg = $this->db->escape($gimg);
		$content = $this->db->escape($content);
		$parameter = $this->db->escape($parameter);
		$ishot = $this->db->escape($ishot);
		$sql = "UPDATE `items` SET topprice=$topprice,topnums=$topnums,cid=$cid,ename=$ename,etitle=$etitle,unitprice=$unitprice,unitnums=$unitnums,batchprice=$batchprice,batchnums=$batchnums,sumnums=$sumnums,place=$place,delivery=$delivery,esort=$esort,img=$gimg,content=$content,parameter=$parameter,ishot=$ishot WHERE id = $id";
		return $this->db->query($sql);
	}
}
