<?php

/**
 * **********************************************************************
 * サブシステム名  ： TASK
 * 機能名         ：会员
 * 作成者        ： Gary
 * **********************************************************************
 */
class Member extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!isset($_SESSION['user_name'])) {
            header("Location:" . RUN . '/login/logout');
        }
        $this->load->model('Member_model', 'member');
		$this->config->load('myconfig');
        header("Content-type:text/html;charset=utf-8");
    }
    /**
     * 会员列表页
     */
    public function member_list()
    {
        $youxiang = isset($_GET['youxiang']) ? $_GET['youxiang'] : '';
		$shoujihao = isset($_GET['shoujihao']) ? $_GET['shoujihao'] : '';
		$gongsiming = isset($_GET['gongsiming']) ? $_GET['gongsiming'] : '';
		$xingming = isset($_GET['xingming']) ? $_GET['xingming'] : '';
        $page = isset($_GET["page"]) ? $_GET["page"] : 1;
        $allpage = $this->member->getmemberAllPage($youxiang,$shoujihao,$gongsiming,$xingming);
        $page = $allpage > $page ? $page : $allpage;
        $data["pagehtml"] = $this->getpage($page, $allpage, $_GET);
        $data["page"] = $page;
        $data["allpage"] = $allpage;
        $list = $this->member->getmemberAll($page,$youxiang,$shoujihao,$gongsiming,$xingming);
        $data["list"] = $list;
        $data["youxiang"] = $youxiang;
		$data["shoujihao"] = $shoujihao;
		$data["gongsiming"] = $gongsiming;
		$data["xingming"] = $xingming;
        $this->display("member/member_list", $data);
    }
	public function member_listv()
	{
		$youxiang = isset($_GET['youxiang']) ? $_GET['youxiang'] : '';
		$shoujihao = isset($_GET['shoujihao']) ? $_GET['shoujihao'] : '';
		$gongsiming = isset($_GET['gongsiming']) ? $_GET['gongsiming'] : '';
		$xingming = isset($_GET['xingming']) ? $_GET['xingming'] : '';
		$page = isset($_GET["page"]) ? $_GET["page"] : 1;
		$allpage = $this->member->getmemberAllPagev($youxiang,$shoujihao,$gongsiming,$xingming);
		$page = $allpage > $page ? $page : $allpage;
		$data["pagehtml"] = $this->getpage($page, $allpage, $_GET);
		$data["page"] = $page;
		$data["allpage"] = $allpage;
		$list = $this->member->getmemberAllv($page,$youxiang,$shoujihao,$gongsiming,$xingming);
		$data["list"] = $list;
		$data["youxiang"] = $youxiang;
		$data["shoujihao"] = $shoujihao;
		$data["gongsiming"] = $gongsiming;
		$data["xingming"] = $xingming;
		$this->display("member/member_listv", $data);
	}

	public function yanzhengma_list()
	{
		$youxiang = isset($_GET['youxiang']) ? $_GET['youxiang'] : '';
		$page = isset($_GET["page"]) ? $_GET["page"] : 1;
		$allpage = $this->member->getmemberAllPage1($youxiang);
		$page = $allpage > $page ? $page : $allpage;
		$data["pagehtml"] = $this->getpage($page, $allpage, $_GET);
		$data["page"] = $page;
		$data["allpage"] = $allpage;
		$list = $this->member->getmemberAll1($page,$youxiang);
		$data["list"] = $list;
		$data["youxiang"] = $youxiang;
		$this->display("member/yanzhengma_list", $data);
	}
    /**
     * 会员修改页
     */
    public function member_edit()
    {
        $mid = isset($_GET['mid']) ? $_GET['mid'] : 0;
        $data = array();
        $gidlist = $this->member->getgradeAll();
        $data['gidlist'] = $gidlist;
        $cnamelist = $this->member->getcnameAll();
        $data['cnamelist'] = $cnamelist;
        $member_info = $this->member->getmemberById($mid);
        $data['nickname'] = $member_info['nickname'];
        $data['sex'] = $member_info['sex'];
        $data['mobile'] = $member_info['mobile'];
        $data['gid'] = $member_info['gid'];
        $data['status'] = $member_info['status'];
        $data['email'] = $member_info['email'];
        $data['truename'] = $member_info['truename'];
        $data['opend_bank'] = $member_info['opend_bank'];
        $data['bank_card'] = $member_info['bank_card'];
        $data['avater'] = $member_info['avater'];
        $data['is_agent'] = $member_info['is_agent'];
        $data['cityname'] = $member_info['cityname'];
        $data['mid'] = $mid;

        $this->display("member/member_edit", $data);
    }
	/**
	 * 会员修改页
	 */
	public function member_editpdf()
	{
		$mid = isset($_GET['mid']) ? $_GET['mid'] : 0;
		$data = array();
		$member_info = $this->member->getmemberById($mid);
		$data['pdfurl'] = $member_info['pdfurl'];
		$data['mid'] = $mid;

		$this->display("member/member_editpdf", $data);
	}
    /**
     * 会员修改提交
     */
    public function member_save_edit()
    {
        if (empty($_SESSION['user_name'])) {
            echo json_encode(array('error' => false, 'msg' => "无法修改数据"));
            return;
        }
        $mid = isset($_POST["mid"]) ? $_POST["mid"] : '';
        $nickname = isset($_POST["nickname"]) ? $_POST["nickname"] : '';
        $sex = isset($_POST["sex"]) ? $_POST["sex"] : '1';
        $mobile = isset($_POST["mobile"]) ? $_POST["mobile"] : '';
        $gid = isset($_POST["gid"]) ? $_POST["gid"] : '';
        $status = isset($_POST["status"]) ? $_POST["status"] : '1';
        $email = isset($_POST["email"]) ? $_POST["email"] : '';
        $truename = isset($_POST["truename"]) ? $_POST["truename"] : '';
        $opend_bank = isset($_POST["opend_bank"]) ? $_POST["opend_bank"] : '';
        $bank_card = isset($_POST["bank_card"]) ? $_POST["bank_card"] : '';
        $avater = isset($_POST["avater"]) ? $_POST["avater"] : '';
        $is_agent = isset($_POST["is_agent"]) ? $_POST["is_agent"] : '';
        $cityname = isset($_POST["cname"]) ? $_POST["cname"] : '';
        $result = $this->member->member_save_edit($cityname,$is_agent,$avater,$mid, $nickname, $sex, $mobile, $gid, $status, $email, $truename, $opend_bank, $bank_card);
        if ($result) {
            echo json_encode(array('success' => true, 'msg' => "操作成功。"));
            return;
        } else {
            echo json_encode(array('error' => false, 'msg' => "操作失败"));
            return;
        }

    }
	/**
	 * 会员修改提交  pdf
	 */
	public function member_save_edit_pdf()
	{
		if (empty($_SESSION['user_name'])) {
			echo json_encode(array('error' => false, 'msg' => "无法修改数据"));
			return;
		}
		$mid = isset($_POST["mid"]) ? $_POST["mid"] : '';
		$pdfurl = isset($_POST["pdfurl"]) ? $_POST["pdfurl"] : '';

		$result = $this->member->member_save_edit_pdf($pdfurl,$mid);
		if ($result) {
			echo json_encode(array('success' => true, 'msg' => "操作成功。"));
			return;
		} else {
			echo json_encode(array('error' => false, 'msg' => "操作失败"));
			return;
		}

	}
    /**
     * 发送消息页
     */
    public function send_news()
    {
        $mid = isset($_GET['mid']) ? $_GET['mid'] : 0;
        $data = array();
        $data['mid'] = $mid;
        $this->display("member/send_news", $data);
    }
    /**
     * 发送消息提交
     */
    public function member_new_save()
    {
        if (empty($_SESSION['user_name'])) {
            echo json_encode(array('error' => false, 'msg' => "无法修改数据"));
            return;
        }
        $mid = isset($_POST["mid"]) ? $_POST["mid"] : '';
        $ncontent = isset($_POST["ncontent"]) ? $_POST["ncontent"] : '';
        $add_time = time();
        $add_timeend = time()-5;
        $if_flag = 2;
        $news_info = $this->member->getnewsinfo($mid,$add_timeend,$add_time);
        if (!empty($news_info)){
            echo json_encode(array('error' => false, 'msg' => "发送消息过于频繁,请稍后再试。"));
            return;
        }
        $result = $this->member->member_new_save($mid,$ncontent, $add_time, $if_flag);
        if ($result) {
            echo json_encode(array('success' => true, 'msg' => "操作成功。"));
            return;
        } else {
            echo json_encode(array('error' => false, 'msg' => "操作失败"));
            return;
        }
    }
}
