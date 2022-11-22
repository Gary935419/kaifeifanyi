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
}
