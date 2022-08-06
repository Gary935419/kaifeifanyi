<?php
require_once 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//require '../../vendor/phpmailer/phpmailer/src/Exception.php';
//require '../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
//require '../../vendor/phpmailer/phpmailer/src/SMTP.php';
class Webviews extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        header("Content-type:text/html;charset=utf-8");
        $this->load->model('Users_model', 'users');
		$this->load->model('Member_model', 'member');
		$this->load->library('BingTranslate');
		if (!empty($_COOKIE['user_cookie']) && isset($_COOKIE['user_cookie']) && empty($_SESSION['user_email'])){
			if ($_COOKIE['user_cookie_delete'] != 999){
				$_SESSION['user_email'] = $_COOKIE['user_cookie'];
			}
		}
    }
    /**
     * 前台首页
     */
    public function index()
    {
    	$data = array();
		$ltype = isset($_GET['ltype']) ? $_GET['ltype'] : 999;
		if ($ltype == 1){
			$_SESSION['LTYPE'] = 0;
		}elseif ($ltype == 2){
			$_SESSION['LTYPE'] = 1;
		}elseif ($ltype == 3){
			$_SESSION['LTYPE'] = '';
			$_SESSION['user_email'] = '';
			$_SESSION['user_flg'] = '';
			setcookie('user_cookie','',time()-1);
			setcookie('user_cookie_delete','',time()-1);
		}

		$data['ltype'] = empty($_SESSION['LTYPE'])?0:$_SESSION['LTYPE'];
		$data['youxiang'] = empty($_SESSION['user_email'])?'':$_SESSION['user_email'];

		if (empty($_SESSION['LTYPE'])){
			$data['yuyan1'] = $this->member->yuyan(1);
			$data['yuyan2'] = $this->member->yuyan(3);
			$data['yuyan3'] = $this->member->yuyan(5);
			$data['yuyan4'] = $this->member->yuyan(7);
		}else{
			$data['yuyan1'] = $this->member->yuyan(2);
			$data['yuyan2'] = $this->member->yuyan(4);
			$data['yuyan3'] = $this->member->yuyan(6);
			$data['yuyan4'] = $this->member->yuyan(8);
		}
		$ltype = isset($_GET['ltype']) ? $_GET['ltype'] : 999;
		if ($ltype == 1){
			$_SESSION['LTYPE'] = 0;
		}elseif ($ltype == 2){
			$_SESSION['LTYPE'] = 1;
		}
		$data['ltype'] = empty($_SESSION['LTYPE'])?0:$_SESSION['LTYPE'];
		$data['youxiang'] = empty($_SESSION['user_email'])?'':$_SESSION['user_email'];
		$user_flg = 0;
		if (empty($_SESSION['user_flg'])){
			$_SESSION['user_flg'] = $user_flg + 1;
		}else{
			$_SESSION['user_flg'] = $_SESSION['user_flg'] + 1;
		}
		$data['user_flg'] = $_SESSION['user_flg'];
        $this->view_display("web/index",$data);
    }
	public function search()
	{
		$type = isset($_GET['type']) ? $_GET['type'] : 1;
		$data = array();
		$data['type'] = $type;
		$ltype = isset($_GET['ltype']) ? $_GET['ltype'] : 999;
		if ($ltype == 1){
			$_SESSION['LTYPE'] = 0;
		}elseif ($ltype == 2){
			$_SESSION['LTYPE'] = 1;
		}
		$data['ltype'] = empty($_SESSION['LTYPE'])?0:$_SESSION['LTYPE'];
		$data['youxiang'] = empty($_SESSION['user_email'])?'':$_SESSION['user_email'];
		if (empty($_SESSION['LTYPE'])){
			$data['yuyan1'] = $this->member->yuyan(1);
			$data['yuyan2'] = $this->member->yuyan(3);
			$data['yuyan3'] = $this->member->yuyan(5);
			$data['yuyan4'] = $this->member->yuyan(7);
		}else{
			$data['yuyan1'] = $this->member->yuyan(2);
			$data['yuyan2'] = $this->member->yuyan(4);
			$data['yuyan3'] = $this->member->yuyan(6);
			$data['yuyan4'] = $this->member->yuyan(8);
		}

		$this->view_display("web/search",$data);
	}
	public function xiaozhuce()
	{
		$yanzhengma = isset($_GET['yanzhengma']) ? $_GET['yanzhengma'] : '';
		$data = array();
		$data['yanzhengma'] = $yanzhengma;
		$ltype = isset($_GET['ltype']) ? $_GET['ltype'] : 999;
		if ($ltype == 1){
			$_SESSION['LTYPE'] = 0;
		}elseif ($ltype == 2){
			$_SESSION['LTYPE'] = 1;
		}
		$data['ltype'] = empty($_SESSION['LTYPE'])?0:$_SESSION['LTYPE'];
		$data['youxiang'] = empty($_SESSION['user_email'])?'':$_SESSION['user_email'];

		if (empty($_SESSION['LTYPE'])){
			$data['yuyan1'] = $this->member->yuyan(1);
			$data['yuyan2'] = $this->member->yuyan(3);
			$data['yuyan3'] = $this->member->yuyan(5);
			$data['yuyan4'] = $this->member->yuyan(7);
		}else{
			$data['yuyan1'] = $this->member->yuyan(2);
			$data['yuyan2'] = $this->member->yuyan(4);
			$data['yuyan3'] = $this->member->yuyan(6);
			$data['yuyan4'] = $this->member->yuyan(8);
		}
		$this->view_display("web/xiaozhuce",$data);
	}
	public function xiaozhucelogin()
	{
		$yanzhengma = isset($_GET['yanzhengma']) ? $_GET['yanzhengma'] : '';
		$youxiang = isset($_GET['youxiang']) ? $_GET['youxiang'] : '';
		$data = array();
		$data['youxiang'] = $youxiang;
		$data['yanzhengma'] = $yanzhengma;

		$ltype = isset($_GET['ltype']) ? $_GET['ltype'] : 999;
		if ($ltype == 1){
			$_SESSION['LTYPE'] = 0;
		}elseif ($ltype == 2){
			$_SESSION['LTYPE'] = 1;
		}
		$data['ltype'] = empty($_SESSION['LTYPE'])?0:$_SESSION['LTYPE'];

		if (empty($_SESSION['LTYPE'])){
			$data['yuyan1'] = $this->member->yuyan(1);
			$data['yuyan2'] = $this->member->yuyan(3);
			$data['yuyan3'] = $this->member->yuyan(5);
			$data['yuyan4'] = $this->member->yuyan(7);
		}else{
			$data['yuyan1'] = $this->member->yuyan(2);
			$data['yuyan2'] = $this->member->yuyan(4);
			$data['yuyan3'] = $this->member->yuyan(6);
			$data['yuyan4'] = $this->member->yuyan(8);
		}
		$this->view_display("web/xiaozhucelogin",$data);
	}
	public function yuanzhuce()
	{
		$type = isset($_GET['type']) ? $_GET['type'] : 1;
		$data = array();
		$data['type'] = $type;
		$ltype = isset($_GET['ltype']) ? $_GET['ltype'] : 999;
		if ($ltype == 1){
			$_SESSION['LTYPE'] = 0;
		}elseif ($ltype == 2){
			$_SESSION['LTYPE'] = 1;
		}
		$data['ltype'] = empty($_SESSION['LTYPE'])?0:$_SESSION['LTYPE'];
		if (empty($_SESSION['LTYPE'])){
			$data['yuyan1'] = $this->member->yuyan(1);
			$data['yuyan2'] = $this->member->yuyan(3);
			$data['yuyan3'] = $this->member->yuyan(5);
			$data['yuyan4'] = $this->member->yuyan(7);
		}else{
			$data['yuyan1'] = $this->member->yuyan(2);
			$data['yuyan2'] = $this->member->yuyan(4);
			$data['yuyan3'] = $this->member->yuyan(6);
			$data['yuyan4'] = $this->member->yuyan(8);
		}
		$this->view_display("web/yuanzhuce",$data);
	}
	public function yuanzhucelogin()
	{
		$yanzhengma = isset($_GET['yanzhengma']) ? $_GET['yanzhengma'] : '';
		$youxiang = isset($_GET['youxiang']) ? $_GET['youxiang'] : '';
		$data = array();
		$data['youxiang'] = $youxiang;
		$data['yanzhengma'] = $yanzhengma;
		$ltype = isset($_GET['ltype']) ? $_GET['ltype'] : 999;
		if ($ltype == 1){
			$_SESSION['LTYPE'] = 0;
		}elseif ($ltype == 2){
			$_SESSION['LTYPE'] = 1;
		}
		$data['ltype'] = empty($_SESSION['LTYPE'])?0:$_SESSION['LTYPE'];
		if (empty($_SESSION['LTYPE'])){
			$data['yuyan1'] = $this->member->yuyan(1);
			$data['yuyan2'] = $this->member->yuyan(3);
			$data['yuyan3'] = $this->member->yuyan(5);
			$data['yuyan4'] = $this->member->yuyan(7);
		}else{
			$data['yuyan1'] = $this->member->yuyan(2);
			$data['yuyan2'] = $this->member->yuyan(4);
			$data['yuyan3'] = $this->member->yuyan(6);
			$data['yuyan4'] = $this->member->yuyan(8);
		}

		$this->view_display("web/yuanzhucelogin",$data);
	}
	public function searchex_yuan()
	{
		$data = array();
		$id = isset($_GET['id']) ? $_GET['id'] : '';
		$result =  $this->member->getmemberById1($id);
		$yuyanflg = $result['yuyanflg'];
		$ltype = isset($_GET['ltype']) ? $_GET['ltype'] : 999;
		if ($ltype == 1){
			$_SESSION['LTYPE'] = 0;
		}elseif ($ltype == 2){
			$_SESSION['LTYPE'] = 1;
		}
		$data['id'] = $id;
		$data['ltype'] = empty($_SESSION['LTYPE'])?0:$_SESSION['LTYPE'];
		$ltypenew = empty($_SESSION['LTYPE'])?1:2;
		if ($yuyanflg != $ltypenew){
			if (!empty($result['fid'])){
				$result =  $this->member->getmemberById1($result['fid']);
			}else{
				$result =  $this->member->getmemberById11($id);
			}
		}
		if (empty($_SESSION['LTYPE'])){
			$data['yuyan1'] = $this->member->yuyan(1);
			$data['yuyan2'] = $this->member->yuyan(3);
			$data['yuyan3'] = $this->member->yuyan(5);
			$data['yuyan4'] = $this->member->yuyan(7);
			$data['guojia'] = "国家";
			$data['chengshi'] = "城市";
			$data['mulu'] = "目录";
		}else{
			$data['yuyan1'] = $this->member->yuyan(2);
			$data['yuyan2'] = $this->member->yuyan(4);
			$data['yuyan3'] = $this->member->yuyan(6);
			$data['yuyan4'] = $this->member->yuyan(8);
			$data['guojia'] = "countries";
			$data['chengshi'] = "city";
			$data['mulu'] = "directory";
		}
		$data['youxiang'] = empty($_SESSION['user_email'])?'':$_SESSION['user_email'];
		if (empty($result)){
			$this->view_display("web/searchex_yuan",$data);
		}else{
			$data['data'] = $result;
			$this->view_display("web/searchex_yuan",$data);
		}
	}
	public function searchex_xiao()
	{
		$data = array();
		$id = isset($_GET['id']) ? $_GET['id'] : '';
		$result =  $this->member->getmemberById2($id);
		$yuyanflg = $result['yuyanflg'];
		$ltype = isset($_GET['ltype']) ? $_GET['ltype'] : 999;
		if ($ltype == 1){
			$_SESSION['LTYPE'] = 0;
		}elseif ($ltype == 2){
			$_SESSION['LTYPE'] = 1;
		}
		$data['id'] = $id;
		$data['ltype'] = empty($_SESSION['LTYPE'])?0:$_SESSION['LTYPE'];

		$ltypenew = empty($_SESSION['LTYPE'])?1:2;
		if ($yuyanflg != $ltypenew){
			if (!empty($result['fid'])){
				$result =  $this->member->getmemberById2($result['fid']);
			}else{
				$result =  $this->member->getmemberById22($id);
			}
		}

		if (empty($_SESSION['LTYPE'])){
			$data['yuyan1'] = $this->member->yuyan(1);
			$data['yuyan2'] = $this->member->yuyan(3);
			$data['yuyan3'] = $this->member->yuyan(5);
			$data['yuyan4'] = $this->member->yuyan(7);
			$data['guojia'] = "国家";
			$data['chengshi'] = "城市";
			$data['mulu'] = "目录";
		}else{
			$data['yuyan1'] = $this->member->yuyan(2);
			$data['yuyan2'] = $this->member->yuyan(4);
			$data['yuyan3'] = $this->member->yuyan(6);
			$data['yuyan4'] = $this->member->yuyan(8);
			$data['guojia'] = "countries";
			$data['chengshi'] = "city";
			$data['mulu'] = "directory";
		}
		$data['youxiang'] = empty($_SESSION['user_email'])?'':$_SESSION['user_email'];
		if (empty($result)){
			$this->view_display("web/index",$data);
		}else{
			$data['data'] = $result;
			$this->view_display("web/searchex_xiao",$data);
		}
	}
	public function memberkafei()
	{
		$type = isset($_GET['type']) ? $_GET['type'] : 1;
		$data = array();
		$data['type'] = $type;
		$ltype = isset($_GET['ltype']) ? $_GET['ltype'] : 999;
		if ($ltype == 1){
			$_SESSION['LTYPE'] = 0;
		}elseif ($ltype == 2){
			$_SESSION['LTYPE'] = 1;
		}
		$data['ltype'] = empty($_SESSION['LTYPE'])?0:$_SESSION['LTYPE'];
		if (empty($_SESSION['LTYPE'])){
			$data['yuyan1'] = $this->member->yuyan(1);
			$data['yuyan2'] = $this->member->yuyan(3);
			$data['yuyan3'] = $this->member->yuyan(5);
			$data['yuyan4'] = $this->member->yuyan(7);
		}else{
			$data['yuyan1'] = $this->member->yuyan(2);
			$data['yuyan2'] = $this->member->yuyan(4);
			$data['yuyan3'] = $this->member->yuyan(6);
			$data['yuyan4'] = $this->member->yuyan(8);
		}
		$data['youxiang'] = empty($_SESSION['user_email'])?'':$_SESSION['user_email'];
		$this->view_display("web/member_kafei",$data);
	}
	public function membernongchang()
	{
		$type = isset($_GET['type']) ? $_GET['type'] : 1;
		$data = array();
		$data['type'] = $type;
		$ltype = isset($_GET['ltype']) ? $_GET['ltype'] : 999;
		if ($ltype == 1){
			$_SESSION['LTYPE'] = 0;
		}elseif ($ltype == 2){
			$_SESSION['LTYPE'] = 1;
		}
		$data['ltype'] = empty($_SESSION['LTYPE'])?0:$_SESSION['LTYPE'];
		if (empty($_SESSION['LTYPE'])){
			$data['yuyan1'] = $this->member->yuyan(1);
			$data['yuyan2'] = $this->member->yuyan(3);
			$data['yuyan3'] = $this->member->yuyan(5);
			$data['yuyan4'] = $this->member->yuyan(7);
		}else{
			$data['yuyan1'] = $this->member->yuyan(2);
			$data['yuyan2'] = $this->member->yuyan(4);
			$data['yuyan3'] = $this->member->yuyan(6);
			$data['yuyan4'] = $this->member->yuyan(8);
		}
		$data['youxiang'] = empty($_SESSION['user_email'])?'':$_SESSION['user_email'];
		$this->view_display("web/member_nongchang",$data);
	}
	public function insertmemberlogin1()
	{
		if ($_POST["email"] == "") {
			$msg = "Please enter your email address";
			if (empty($_SESSION['LTYPE'])){
				$msg = "请输入邮件地址！";
			}
			echo json_encode(array('result' => 0, 'msg' => $msg));
			return false;
		}
		if ($_POST["mima"] == "") {
			$msg = "Please enter your password";
			if (empty($_SESSION['LTYPE'])){
				$msg = "请输入密码！";
			}
			echo json_encode(array('result' => 0, 'msg' => $msg));
			return false;
		}
		$youxiang = isset($_POST["email"]) ? $_POST["email"] : '';
		$mima = isset($_POST["mima"]) ? $_POST["mima"] : '';
		$zidongflg = $_POST["zidongflg"];
//		if($zidongflg){
//			$zidongflg = 1;
//		}else{
//			$zidongflg = 0;
//		}
		$membereinfo = $this->member->getmemberinfoa($youxiang,$mima,2);
		if (!empty($membereinfo)){
			$_SESSION['mid'] = $membereinfo['mid'];
			if ($membereinfo['status'] == 1) {
				$_SESSION['user_email'] = $youxiang;
				if($zidongflg == 'true'){
					setcookie("user_cookie", $youxiang, time()+3600*72);
					setcookie('user_cookie_delete',666, time()+3600*72);
				}else{
					setcookie('user_cookie','',time()-1);
					setcookie('user_cookie_delete',999, time()+3600*72);
				}
//				\Cookie::set('user_cookie', $youxiang,time()+3600*72);
				$msg = "Login successfully";
				if (empty($_SESSION['LTYPE'])){
					$msg = "登陆成功！";
				}
				echo json_encode(array('result' => 1, 'msg' => $msg, 'zidongflg' => $zidongflg, 'youxiang' => $youxiang, 'status' => 1));
				return false;
			}else{
				$msg = "Login success, please complete personal information first!";
				if (empty($_SESSION['LTYPE'])){
					$msg = "登录成功,请先完善个人信息!";
				}
				echo json_encode(array('result' => 1, 'msg' => $msg, 'zidongflg' => $zidongflg, 'youxiang' => $youxiang, 'status' => 0));
				return false;
			}
		}else{
			$msg = "Login failure";
			if (empty($_SESSION['LTYPE'])){
				$msg = "登录失败！";
			}
			echo json_encode(array('result' => 0, 'msg' => $msg));
			return false;
		}
	}
	public function insertmemberlogin()
	{
		if ($_POST["email"] == "") {
			$msg = "Please enter your email address";
			if (empty($_SESSION['LTYPE'])){
				$msg = "请输入邮件地址！";
			}
			echo json_encode(array('result' => 0, 'msg' => $msg));
			return false;
		}
		if ($_POST["mima"] == "") {
			$msg = "Please enter your password";
			if (empty($_SESSION['LTYPE'])){
				$msg = "请输入密码！";
			}
			echo json_encode(array('result' => 0, 'msg' => $msg));
			return false;
		}

		$youxiang = isset($_POST["email"]) ? $_POST["email"] : '';
		$mima = isset($_POST["mima"]) ? $_POST["mima"] : '';
        $zidongflg = $_POST["zidongflg"];
//		if($zidongflg){
//			$zidongflg = 1;
//		}else{
//			$zidongflg = 0;
//		}
		$membereinfo = $this->member->getmemberinfoa($youxiang,$mima,1);
		if (!empty($membereinfo)){
			$_SESSION['mid'] = $membereinfo['mid'];
			if($zidongflg == 'true'){
				setcookie("user_cookie", $youxiang, time()+3600*72);
				setcookie('user_cookie_delete',666, time()+3600*72);
			}else{
				setcookie('user_cookie','',time()-1);
				setcookie('user_cookie_delete',999, time()+3600*72);
			}
			if ($membereinfo['status'] == 1) {
				$_SESSION['user_email'] = $youxiang;
//				\Cookie::set('user_cookie', $youxiang,time()+3600*72);
				$msg = "Login successfully";
				if (empty($_SESSION['LTYPE'])){
					$msg = "登陆成功！";
				}
				echo json_encode(array('result' => 1, 'msg' => $msg, 'zidongflg' => $zidongflg, 'youxiang' => $youxiang, 'status' => 1));
				return false;
			}else{
				$msg = "Login success, please complete personal information first!";
				if (empty($_SESSION['LTYPE'])){
					$msg = "登录成功,请先完善个人信息!";
				}
				echo json_encode(array('result' => 1, 'msg' => $msg, 'zidongflg' => $zidongflg, 'youxiang' => $youxiang, 'status' => 0));
				return false;
			}
		}else{
			$msg = "Login failure";
			if (empty($_SESSION['LTYPE'])){
				$msg = "登录失败！";
			}
			echo json_encode(array('result' => 0, 'msg' => $msg));
			return false;
		}
	}
	public function insertmember()
	{
		if ($_POST["email"] == "") {
			$msg = "Please enter your email address";
			if (empty($_SESSION['LTYPE'])){
				$msg = "请输入邮件地址！";
			}
			echo json_encode(array('result' => 0, 'msg' => $msg));
			return false;
		}
		if ($_POST["yanzhengma"] == "") {
			$msg = "Please enter the verification code";
			if (empty($_SESSION['LTYPE'])){
				$msg = "请输入验证码！";
			}
			echo json_encode(array('result' => 0, 'msg' => $msg));
			return false;
		}
		if ($_POST["shoujihao"] == "") {
			$msg = "Please enter your mobile phone number";
			if (empty($_SESSION['LTYPE'])){
				$msg = "请输入手机号！";
			}
			echo json_encode(array('result' => 0, 'msg' => $msg));
			return false;
		}
		if ($_POST["xing"] == "") {
			$msg = "Please enter your First Name";
			if (empty($_SESSION['LTYPE'])){
				$msg = "请输入姓！";
			}
			echo json_encode(array('result' => 0, 'msg' => $msg));
			return false;
		}
		if ($_POST["ming"] == "") {
			$msg = "Please enter your Last Name";
			if (empty($_SESSION['LTYPE'])){
				$msg = "ming！";
			}
			echo json_encode(array('result' => 0, 'msg' => $msg));
			return false;
		}
		if ($_POST["mima"] == "") {
			$msg = "Please confirm your password";
			if (empty($_SESSION['LTYPE'])){
				$msg = "请输入确认密码！";
			}
			echo json_encode(array('result' => 0, 'msg' => $msg));
			return false;
		}
		if ($_POST["querenmima"] == "") {
			$msg = "Please confirm your password";
			if (empty($_SESSION['LTYPE'])){
				$msg = "请输入确认密码！";
			}
			echo json_encode(array('result' => 0, 'msg' => $msg));
			return false;
		}
		if ($_POST["querenmima"] != $_POST["mima"]) {
			$msg = "The confirm password does not match the password";
			if (empty($_SESSION['LTYPE'])){
				$msg = "确认密码与密码不匹配！";
			}
			echo json_encode(array('result' => 0, 'msg' => $msg));
			return false;
		}
		$shoujihao = isset($_POST["shoujihao"]) ? $_POST["shoujihao"] : '';
		$xing = isset($_POST["xing"]) ? $_POST["xing"] : '';
		$ming = isset($_POST["ming"]) ? $_POST["ming"] : '';
		$gsming = isset($_POST["gsming"]) ? $_POST["gsming"] : '';
		$gsdizhi = isset($_POST["gsdizhi"]) ? $_POST["gsdizhi"] : '';
		$gsjianjie = isset($_POST["gsjianjie"]) ? $_POST["gsjianjie"] : '';
		$youxiang = isset($_POST["email"]) ? $_POST["email"] : '';
		$yanzhengma = isset($_POST["yanzhengma"]) ? $_POST["yanzhengma"] : '';
		$mima = isset($_POST["mima"]) ? $_POST["mima"] : '';
		$memberemail = $this->member->getmemberyanzhengma($youxiang,time());
		if (empty($memberemail)){
			$msg = "Verification code expired! Please enter the correct verification code!";
			if (empty($_SESSION['LTYPE'])){
				$msg = "验证码过期！请输入正确验证码！";
			}
			echo json_encode(array('result' => 0, 'msg' => $msg));
			return false;
		}
		if ($memberemail[0]['yanzhengma'] != $yanzhengma){
			$msg = "Verification codes do not match! Please enter the correct verification code!";
			if (empty($_SESSION['LTYPE'])){
				$msg = "验证码不匹配！请输入正确验证码！";
			}
			echo json_encode(array('result' => 0, 'msg' => $msg));
			return false;
		}
		$membereinfo = $this->member->getmemberinfoa($youxiang,$mima,1);
		if (!empty($membereinfo)){
			$msg = "Current email address registered! Please enter replacement!";
			if (empty($_SESSION['LTYPE'])){
				$msg = "当前邮件地址已经注册！请输入更换！";
			}
			echo json_encode(array('result' => 0, 'msg' => $msg));
			return false;
		}
		$this->member->getmemberinfoainsert($youxiang,$mima,1,$shoujihao,$xing,$ming,$gsming,$gsdizhi,$gsjianjie);
		$this->member->getyanzhengmaupdate($youxiang);
		$msg = "Registered successfully!";
		if (empty($_SESSION['LTYPE'])){
			$msg = "注册成功！";
		}
		echo json_encode(array('result' => 1, 'msg' => $msg));
		return false;
	}
	public function insertmember1()
	{
		if ($_POST["email"] == "") {
			$msg = "Please enter your email address";
			if (empty($_SESSION['LTYPE'])){
				$msg = "请输入邮件地址！";
			}
			echo json_encode(array('result' => 0, 'msg' => $msg));
			return false;
		}
		if ($_POST["yanzhengma"] == "") {
			$msg = "Please enter the verification code";
			if (empty($_SESSION['LTYPE'])){
				$msg = "请输入验证码！";
			}
			echo json_encode(array('result' => 0, 'msg' => $msg));
			return false;
		}
		if ($_POST["shoujihao"] == "") {
			$msg = "Please enter your mobile phone number";
			if (empty($_SESSION['LTYPE'])){
				$msg = "请输入手机号！";
			}
			echo json_encode(array('result' => 0, 'msg' => $msg));
			return false;
		}
		if ($_POST["xing"] == "") {
			$msg = "Please enter your First Name";
			if (empty($_SESSION['LTYPE'])){
				$msg = "请输入姓！";
			}
			echo json_encode(array('result' => 0, 'msg' => $msg));
			return false;
		}
		if ($_POST["ming"] == "") {
			$msg = "Please enter your Last Name";
			if (empty($_SESSION['LTYPE'])){
				$msg = "ming！";
			}
			echo json_encode(array('result' => 0, 'msg' => $msg));
			return false;
		}
		if ($_POST["mima"] == "") {
			$msg = "Please confirm your password";
			if (empty($_SESSION['LTYPE'])){
				$msg = "请输入确认密码！";
			}
			echo json_encode(array('result' => 0, 'msg' => $msg));
			return false;
		}
		if ($_POST["querenmima"] == "") {
			$msg = "Please confirm your password";
			if (empty($_SESSION['LTYPE'])){
				$msg = "请输入确认密码！";
			}
			echo json_encode(array('result' => 0, 'msg' => $msg));
			return false;
		}
		if ($_POST["querenmima"] != $_POST["mima"]) {
			$msg = "The confirm password does not match the password";
			if (empty($_SESSION['LTYPE'])){
				$msg = "确认密码与密码不匹配！";
			}
			echo json_encode(array('result' => 0, 'msg' => $msg));
			return false;
		}

		$shoujihao = isset($_POST["shoujihao"]) ? $_POST["shoujihao"] : '';
		$xing = isset($_POST["xing"]) ? $_POST["xing"] : '';
		$ming = isset($_POST["ming"]) ? $_POST["ming"] : '';
		$gsming = isset($_POST["gsming"]) ? $_POST["gsming"] : '';
		$gsdizhi = isset($_POST["gsdizhi"]) ? $_POST["gsdizhi"] : '';
		$gsjianjie = isset($_POST["gsjianjie"]) ? $_POST["gsjianjie"] : '';
		$youxiang = isset($_POST["email"]) ? $_POST["email"] : '';
		$yanzhengma = isset($_POST["yanzhengma"]) ? $_POST["yanzhengma"] : '';
		$mima = isset($_POST["mima"]) ? $_POST["mima"] : '';
		$memberemail = $this->member->getmemberyanzhengma($youxiang,time());
		if (empty($memberemail)){
			$msg = "Verification code expired! Please enter the correct verification code!";
			if (empty($_SESSION['LTYPE'])){
				$msg = "验证码过期！请输入正确验证码！";
			}
			echo json_encode(array('result' => 0, 'msg' => $msg));
			return false;
		}
		if ($memberemail[0]['yanzhengma'] != $yanzhengma){
			$msg = "Verification codes do not match! Please enter the correct verification code!";
			if (empty($_SESSION['LTYPE'])){
				$msg = "验证码不匹配！请输入正确验证码！";
			}
			echo json_encode(array('result' => 0, 'msg' => $msg));
			return false;
		}
		$membereinfo = $this->member->getmemberinfoa($youxiang,$mima,2);
		if (!empty($membereinfo)){
			$msg = "Current email address registered! Please enter replacement!";
			if (empty($_SESSION['LTYPE'])){
				$msg = "当前邮件地址已经注册！请输入更换！";
			}
			echo json_encode(array('result' => 0, 'msg' => $msg));
			return false;
		}
		$this->member->getmemberinfoainsert($youxiang,$mima,2,$shoujihao,$xing,$ming,$gsming,$gsdizhi,$gsjianjie);
		$this->member->getyanzhengmaupdate($youxiang);
		$msg = "Registered successfully!";
		if (empty($_SESSION['LTYPE'])){
			$msg = "注册成功！";
		}
		echo json_encode(array('result' => 1, 'msg' => $msg));
		return false;
	}
	public function insertkafeidian()
	{
		$mid = empty($_SESSION['mid'])?'':$_SESSION['mid'];

		$membereinfo = $this->member->getmemberinfoamid($mid);
		if (empty($membereinfo)){
			$msg = "The account is abnormal. Please log in first.";
			if (empty($_SESSION['LTYPE'])){
				$msg = "账号异常，请先去登录";
			}
			echo json_encode(array('error' => true, 'msg' => $msg));
			return false;
		}

		if ($_POST["touxiang"] == "") {
			$msg = "Please upload your avatar.";
			if (empty($_SESSION['LTYPE'])){
				$msg = "请上传头像";
			}
			echo json_encode(array('error' => true, 'msg' => $msg));
			return false;
		}
		if ($_POST["mingcheng"] == "") {
			$msg = "Please enter the name of the coffee shop.";
			if (empty($_SESSION['LTYPE'])){
				$msg = "请输入咖啡店名称";
			}
			echo json_encode(array('error' => true, 'msg' => $msg));
			return false;
		}
		if ($_POST["dianhua"] == "") {
			$msg = "Please enter the number of the coffee shop.";
			if (empty($_SESSION['LTYPE'])){
				$msg = "请输入咖啡店电话";
			}
			echo json_encode(array('error' => true, 'msg' => $msg));
			return false;
		}
		if ($_POST["youxiang"] == "") {
			$msg = "Please enter the coffee shop email.";
			if (empty($_SESSION['LTYPE'])){
				$msg = "请输入咖啡店邮箱";
			}
			echo json_encode(array('error' => true, 'msg' => $msg));
			return false;
		}
		if ($_POST["zhou"] == "大洲") {
			$msg = "Please select a continent.";
			if (empty($_SESSION['LTYPE'])){
				$msg = "请选择大洲";
			}
			echo json_encode(array('error' => true, 'msg' => $msg));
			return false;
		}
		if ($_POST["guojia"] == "国家") {
			$msg = "Please select country.";
			if (empty($_SESSION['LTYPE'])){
				$msg = "请选择国家";
			}
			echo json_encode(array('error' => true, 'msg' => $msg));
			return false;
		}
		if ($_POST["chengshi"] == "城市") {
			$msg = "Please select city.";
			if (empty($_SESSION['LTYPE'])){
				$msg = "请选择城市";
			}
			echo json_encode(array('error' => true, 'msg' => $msg));
			return false;
		}
		if ($_POST["leixing"] == "") {
			$msg = "Please enter the service type.";
			if (empty($_SESSION['LTYPE'])){
				$msg = "请输入服务类型";
			}
			echo json_encode(array('error' => true, 'msg' => $msg));
			return false;
		}
		if ($_POST["xiangxidizhi"] == "") {
			$msg = "Please enter your full address.";
			if (empty($_SESSION['LTYPE'])){
				$msg = "请输入详细地址";
			}
			echo json_encode(array('error' => true, 'msg' => $msg));
			return false;
		}
		if ($_POST["xinghao"] == "") {
			$msg = "Please enter the baking model number.";
			if (empty($_SESSION['LTYPE'])){
				$msg = "请输入烘焙机型号";
			}
			echo json_encode(array('error' => true, 'msg' => $msg));
			return false;
		}
		if ($_POST["caigouliang"] == "") {
			$msg = "Please enter the purchase quantity.";
			if (empty($_SESSION['LTYPE'])){
				$msg = "请输入采购量";
			}
			echo json_encode(array('error' => true, 'msg' => $msg));
			return false;
		}
		if ($_POST["caigoushijian"] == "") {
			$msg = "Please enter purchase time.";
			if (empty($_SESSION['LTYPE'])){
				$msg = "请输入采购时间";
			}
			echo json_encode(array('error' => true, 'msg' => $msg));
			return false;
		}
		if ($_POST["chulitedian"] == "") {
			$msg = "Please enter processing characteristics.";
			if (empty($_SESSION['LTYPE'])){
				$msg = "请输入采购时间";
			}
			echo json_encode(array('error' => true, 'msg' => $msg));
			return false;
		}
		if ($_POST["dianlogo"] == "") {
			$msg = "Please enter the coffee shop cover image.";
			if (empty($_SESSION['LTYPE'])){
				$msg = "请输入咖啡店封面图";
			}
			echo json_encode(array('error' => true, 'msg' => $msg));
			return false;
		}

		$touxiang = isset($_POST["touxiang"]) ? $_POST["touxiang"] : '';
		$mingcheng = isset($_POST["mingcheng"]) ? $_POST["mingcheng"] : '';
		$dianhua = isset($_POST["dianhua"]) ? $_POST["dianhua"] : '';
		$youxiang = isset($_POST["youxiang"]) ? $_POST["youxiang"] : '';
		$zhou = isset($_POST["zhou"]) ? $_POST["zhou"] : '';
		$guojia = isset($_POST["guojia"]) ? $_POST["guojia"] : '';
		$chengshi = isset($_POST["chengshi"]) ? $_POST["chengshi"] : '';
		$leixing = isset($_POST["leixing"]) ? $_POST["leixing"] : '';
		$xiangxidizhi = isset($_POST["xiangxidizhi"]) ? $_POST["xiangxidizhi"] : '';
		$xinghao = isset($_POST["xinghao"]) ? $_POST["xinghao"] : '';
		$caigouliang = isset($_POST["caigouliang"]) ? $_POST["caigouliang"] : '';
		$caigoushijian = isset($_POST["caigoushijian"]) ? $_POST["caigoushijian"] : '';
		$chulitedian = isset($_POST["chulitedian"]) ? $_POST["chulitedian"] : '';
		$dianlogo = isset($_POST["dianlogo"]) ? $_POST["dianlogo"] : '';
		$addttime = time();
		$zhuangtai = 0;
		$yuyanflg = empty($_SESSION['LTYPE'])?1:2;
		$yuyanflg1 = empty($_SESSION['LTYPE'])?2:1;

		$this->member->kafeidian_delete($mid);
		$id = $this->member->getmemberinfoainsertkafei('',$yuyanflg,$mid,$touxiang,$mingcheng,$dianhua,$youxiang,$zhou,$guojia,$chengshi,$leixing,$xiangxidizhi,$xinghao,$caigouliang,$caigoushijian,$chulitedian,$dianlogo,$addttime,$zhuangtai);

		$fanyitype = empty($_SESSION['LTYPE'])?"ZH_CN2EN":"EN2ZH_CN";

		$strqian = urlencode($mingcheng);
		$url= "http://fanyi.youdao.com/translate?&doctype=json&type=".$fanyitype."&i=".$strqian;
		$result = json_decode(file_get_contents($url),true);
		$mingcheng1 = "";
		foreach ($result['translateResult'][0] as $k=>$v){
			$mingcheng1 = $mingcheng1.$v['tgt'];
		}

		$strqian = urlencode($zhou);
		$url= "http://fanyi.youdao.com/translate?&doctype=json&type=".$fanyitype."&i=".$strqian;
		$result = json_decode(file_get_contents($url),true);
		$zhou1 = "";
		foreach ($result['translateResult'][0] as $k=>$v){
			$zhou1 = $zhou1.$v['tgt'];
		}

		$strqian = urlencode($guojia);
		$url= "http://fanyi.youdao.com/translate?&doctype=json&type=".$fanyitype."&i=".$strqian;
		$result = json_decode(file_get_contents($url),true);
		$guojia1 = "";
		foreach ($result['translateResult'][0] as $k=>$v){
			$guojia1 = $guojia1.$v['tgt'];
		}

		$strqian = urlencode($chengshi);
		$url= "http://fanyi.youdao.com/translate?&doctype=json&type=".$fanyitype."&i=".$strqian;
		$result = json_decode(file_get_contents($url),true);
		$chengshi1 = "";
		foreach ($result['translateResult'][0] as $k=>$v){
			$chengshi1 = $chengshi1.$v['tgt'];
		}

		$strqian = urlencode($leixing);
		$url= "http://fanyi.youdao.com/translate?&doctype=json&type=".$fanyitype."&i=".$strqian;
		$result = json_decode(file_get_contents($url),true);
		$leixing1 = "";
		foreach ($result['translateResult'][0] as $k=>$v){
			$leixing1 = $leixing1.$v['tgt'];
		}

		$strqian = urlencode($xiangxidizhi);
		$url= "http://fanyi.youdao.com/translate?&doctype=json&type=".$fanyitype."&i=".$strqian;
		$result = json_decode(file_get_contents($url),true);
		$xiangxidizhi1 = "";
		foreach ($result['translateResult'][0] as $k=>$v){
			$xiangxidizhi1 = $xiangxidizhi1.$v['tgt'];
		}

		$strqian = urlencode($xinghao);
		$url= "http://fanyi.youdao.com/translate?&doctype=json&type=".$fanyitype."&i=".$strqian;
		$result = json_decode(file_get_contents($url),true);
		$xinghao1 = "";
		foreach ($result['translateResult'][0] as $k=>$v){
			$xinghao1 = $xinghao1.$v['tgt'];
		}

		$strqian = urlencode($caigouliang);
		$url= "http://fanyi.youdao.com/translate?&doctype=json&type=".$fanyitype."&i=".$strqian;
		$result = json_decode(file_get_contents($url),true);
		$caigouliang1 = "";
		foreach ($result['translateResult'][0] as $k=>$v){
			$caigouliang1 = $caigouliang1.$v['tgt'];
		}

		$strqian = urlencode($caigoushijian);
		$url= "http://fanyi.youdao.com/translate?&doctype=json&type=".$fanyitype."&i=".$strqian;
		$result = json_decode(file_get_contents($url),true);
		$caigoushijian1 = "";
		foreach ($result['translateResult'][0] as $k=>$v){
			$caigoushijian1 = $caigoushijian1.$v['tgt'];
		}

		$strqian = urlencode($chulitedian);
		$url= "http://fanyi.youdao.com/translate?&doctype=json&type=".$fanyitype."&i=".$strqian;
		$result = json_decode(file_get_contents($url),true);
		$chulitedian1 = "";
		foreach ($result['translateResult'][0] as $k=>$v){
			$chulitedian1 = $chulitedian1.$v['tgt'];
		}

		$this->member->getmemberinfoainsertkafei($id,$yuyanflg1,$mid,$touxiang,$mingcheng1,$dianhua,$youxiang,$zhou1,$guojia1,$chengshi1,$leixing1,$xiangxidizhi1,$xinghao1,$caigouliang1,$caigoushijian1,$chulitedian1,$dianlogo,$addttime,$zhuangtai);
		$this->member->getyanzhengmaupdatekafei($mid,1);
		$_SESSION['user_email'] = $membereinfo['youxiang'];

		$msg = "Operation Successful!";
		if (empty($_SESSION['LTYPE'])){
			$msg = "操作成功！";
		}
		echo json_encode(array('result' => 1, 'msg' => $msg));
		return false;
	}
	public function insertkanongchang()
	{
		$mid = empty($_SESSION['mid'])?'':$_SESSION['mid'];

		$membereinfo = $this->member->getmemberinfoamid($mid);
		if (empty($membereinfo)){
			$msg = "The account is abnormal. Please log in first.";
			if (empty($_SESSION['LTYPE'])){
				$msg = "账号异常，请先去登录";
			}
			echo json_encode(array('error' => true, 'msg' => $msg));
			return false;
		}

		if ($_POST["touxiang"] == "") {
			$msg = "Please upload your avatar.";
			if (empty($_SESSION['LTYPE'])){
				$msg = "请上传头像";
			}
			echo json_encode(array('error' => true, 'msg' => $msg));
			return false;
		}
		if ($_POST["xingming"] == "") {
			$msg = "Please enter the farm name.";
			if (empty($_SESSION['LTYPE'])){
				$msg = "请输入农场名称";
			}
			echo json_encode(array('error' => true, 'msg' => $msg));
			return false;
		}
		if ($_POST["dianhua"] == "") {
			$msg = "Please enter the farm number.";
			if (empty($_SESSION['LTYPE'])){
				$msg = "请输入农场电话";
			}
			echo json_encode(array('error' => true, 'msg' => $msg));
			return false;
		}
		if ($_POST["youxiang"] == "") {
			$msg = "Please enter the farm mailbox.";
			if (empty($_SESSION['LTYPE'])){
				$msg = "请输入农场邮箱";
			}
			echo json_encode(array('error' => true, 'msg' => $msg));
			return false;
		}
		if ($_POST["zhou"] == "大洲") {
			$msg = "Please select a continent.";
			if (empty($_SESSION['LTYPE'])){
				$msg = "请选择大洲";
			}
			echo json_encode(array('error' => true, 'msg' => $msg));
			return false;
		}
		if ($_POST["guojia"] == "国家") {
			$msg = "Please select country.";
			if (empty($_SESSION['LTYPE'])){
				$msg = "请选择国家";
			}
			echo json_encode(array('error' => true, 'msg' => $msg));
			return false;
		}
		if ($_POST["chengshi"] == "城市") {
			$msg = "Please select city.";
			if (empty($_SESSION['LTYPE'])){
				$msg = "请选择城市";
			}
			echo json_encode(array('error' => true, 'msg' => $msg));
			return false;
		}
		if ($_POST["kafeiming"] == "") {
			$msg = "Please enter the coffee name.";
			if (empty($_SESSION['LTYPE'])){
				$msg = "请输入咖啡名称";
			}
			echo json_encode(array('error' => true, 'msg' => $msg));
			return false;
		}
		if ($_POST["caijididian"] == "") {
			$msg = "Please enter the collection location.";
			if (empty($_SESSION['LTYPE'])){
				$msg = "请输入采集地点";
			}
			echo json_encode(array('error' => true, 'msg' => $msg));
			return false;
		}
		if ($_POST["xiangxidizhi"] == "") {
			$msg = "Please enter your full address.";
			if (empty($_SESSION['LTYPE'])){
				$msg = "请输入详细地址";
			}
			echo json_encode(array('error' => true, 'msg' => $msg));
			return false;
		}
		if ($_POST["zhongzhimianji"] == "") {
			$msg = "Please enter planting area.";
			if (empty($_SESSION['LTYPE'])){
				$msg = "请输入种植面积";
			}
			echo json_encode(array('error' => true, 'msg' => $msg));
			return false;
		}
		if ($_POST["chulifangshi"] == "") {
			$msg = "Please enter the processing mode.";
			if (empty($_SESSION['LTYPE'])){
				$msg = "请输入处理方式";
			}
			echo json_encode(array('error' => true, 'msg' => $msg));
			return false;
		}
		if ($_POST["chulitedian"] == "") {
			$msg = "Please enter processing characteristics.";
			if (empty($_SESSION['LTYPE'])){
				$msg = "请输入处理特点";
			}
			echo json_encode(array('error' => true, 'msg' => $msg));
			return false;
		}
		if ($_POST["hongguoshuliang"] == "") {
			$msg = "Please enter the number of red fruits.";
			if (empty($_SESSION['LTYPE'])){
				$msg = "请输入红果数量";
			}
			echo json_encode(array('error' => true, 'msg' => $msg));
			return false;
		}
		if ($_POST["haibagaodu"] == "") {
			$msg = "Please enter the altitude.";
			if (empty($_SESSION['LTYPE'])){
				$msg = "请输入海拔高度";
			}
			echo json_encode(array('error' => true, 'msg' => $msg));
			return false;
		}
		if ($_POST["shouhuoshijian"] == "") {
			$msg = "Please enter the delivery time.";
			if (empty($_SESSION['LTYPE'])){
				$msg = "请输入收货时间";
			}
			echo json_encode(array('error' => true, 'msg' => $msg));
			return false;
		}
		if ($_POST["niancanliang"] == "") {
			$msg = "Please input annual output.";
			if (empty($_SESSION['LTYPE'])){
				$msg = "请输入年产量";
			}
			echo json_encode(array('error' => true, 'msg' => $msg));
			return false;
		}
		if ($_POST["nonglogo"] == "") {
			$msg = "Please enter farm cover map.";
			if (empty($_SESSION['LTYPE'])){
				$msg = "请输入农场封面图";
			}
			echo json_encode(array('error' => true, 'msg' => $msg));
			return false;
		}

		$touxiang = isset($_POST["touxiang"]) ? $_POST["touxiang"] : '';
		$xingming = isset($_POST["xingming"]) ? $_POST["xingming"] : '';
		$xingbie = isset($_POST["xingbie"]) && !empty($_POST["xingbie"]) ? $_POST["xingbie"] : 1;
		$dianhua = isset($_POST["dianhua"]) ? $_POST["dianhua"] : '';
		$youxiang = isset($_POST["youxiang"]) ? $_POST["youxiang"] : '';
		$zhou = isset($_POST["zhou"]) ? $_POST["zhou"] : '';
		$guojia = isset($_POST["guojia"]) ? $_POST["guojia"] : '';
		$chengshi = isset($_POST["chengshi"]) ? $_POST["chengshi"] : '';
		$kafeiming = isset($_POST["kafeiming"]) ? $_POST["kafeiming"] : '';
		$caijididian = isset($_POST["caijididian"]) ? $_POST["caijididian"] : '';
		$xiangxidizhi = isset($_POST["xiangxidizhi"]) ? $_POST["xiangxidizhi"] : '';
		$zhongzhimianji = isset($_POST["zhongzhimianji"]) ? $_POST["zhongzhimianji"] : '';
		$chulifangshi = isset($_POST["chulifangshi"]) ? $_POST["chulifangshi"] : '';
		$chulitedian = isset($_POST["chulitedian"]) ? $_POST["chulitedian"] : '';
		$hongguoshuliang = isset($_POST["hongguoshuliang"]) ? $_POST["hongguoshuliang"] : '';
		$haibagaodu = isset($_POST["haibagaodu"]) ? $_POST["haibagaodu"] : '';
		$shouhuoshijian = isset($_POST["shouhuoshijian"]) ? $_POST["shouhuoshijian"] : '';
		$niancanliang = isset($_POST["niancanliang"]) ? $_POST["niancanliang"] : '';
		$nonglogo = isset($_POST["nonglogo"]) ? $_POST["nonglogo"] : '';
		$addtime = time();
		$zhuangtai = 0;
		$yuyanflg = empty($_SESSION['LTYPE'])?1:2;
		$yuyanflg1 = empty($_SESSION['LTYPE'])?2:1;
		$this->member->nongchangzhu_delete($mid);
		$id = $this->member->getmemberinfoainsertnongchang('',$yuyanflg,$mid,$touxiang,$xingming,$xingbie,$dianhua,$youxiang,$zhou,$guojia,$chengshi,$kafeiming,$caijididian,$xiangxidizhi,$zhongzhimianji,$chulifangshi,$chulitedian,$hongguoshuliang,$haibagaodu,$shouhuoshijian,$niancanliang,$nonglogo,$addtime,$zhuangtai);

		$fanyitype = empty($_SESSION['LTYPE'])?"ZH_CN2EN":"EN2ZH_CN";

		$strqian = urlencode($xingming);
		$url= "http://fanyi.youdao.com/translate?&doctype=json&type=".$fanyitype."&i=".$strqian;
		$result = json_decode(file_get_contents($url),true);
		$xingming1 = "";
		foreach ($result['translateResult'][0] as $k=>$v){
			$xingming1 = $xingming1.$v['tgt'];
		}

		$strqian = urlencode($xingbie);
		$url= "http://fanyi.youdao.com/translate?&doctype=json&type=".$fanyitype."&i=".$strqian;
		$result = json_decode(file_get_contents($url),true);
		$xingbie1 = "";
		foreach ($result['translateResult'][0] as $k=>$v){
			$xingbie1 = $xingbie1.$v['tgt'];
		}

		$strqian = urlencode($zhou);
		$url= "http://fanyi.youdao.com/translate?&doctype=json&type=".$fanyitype."&i=".$strqian;
		$result = json_decode(file_get_contents($url),true);
		$zhou1 = "";
		foreach ($result['translateResult'][0] as $k=>$v){
			$zhou1 = $zhou1.$v['tgt'];
		}

		$strqian = urlencode($guojia);
		$url= "http://fanyi.youdao.com/translate?&doctype=json&type=".$fanyitype."&i=".$strqian;
		$result = json_decode(file_get_contents($url),true);
		$guojia1 = "";
		foreach ($result['translateResult'][0] as $k=>$v){
			$guojia1 = $guojia1.$v['tgt'];
		}

		$strqian = urlencode($chengshi);
		$url= "http://fanyi.youdao.com/translate?&doctype=json&type=".$fanyitype."&i=".$strqian;
		$result = json_decode(file_get_contents($url),true);
		$chengshi1 = "";
		foreach ($result['translateResult'][0] as $k=>$v){
			$chengshi1 = $chengshi1.$v['tgt'];
		}

		$strqian = urlencode($kafeiming);
		$url= "http://fanyi.youdao.com/translate?&doctype=json&type=".$fanyitype."&i=".$strqian;
		$result = json_decode(file_get_contents($url),true);
		$kafeiming1 = "";
		foreach ($result['translateResult'][0] as $k=>$v){
			$kafeiming1 = $kafeiming1.$v['tgt'];
		}

		$strqian = urlencode($caijididian);
		$url= "http://fanyi.youdao.com/translate?&doctype=json&type=".$fanyitype."&i=".$strqian;
		$result = json_decode(file_get_contents($url),true);
		$caijididian1 = "";
		foreach ($result['translateResult'][0] as $k=>$v){
			$caijididian1 = $caijididian1.$v['tgt'];
		}

		$strqian = urlencode($xiangxidizhi);
		$url= "http://fanyi.youdao.com/translate?&doctype=json&type=".$fanyitype."&i=".$strqian;
		$result = json_decode(file_get_contents($url),true);
		$xiangxidizhi1 = "";
		foreach ($result['translateResult'][0] as $k=>$v){
			$xiangxidizhi1 = $xiangxidizhi1.$v['tgt'];
		}

		$strqian = urlencode($zhongzhimianji);
		$url= "http://fanyi.youdao.com/translate?&doctype=json&type=".$fanyitype."&i=".$strqian;
		$result = json_decode(file_get_contents($url),true);
		$zhongzhimianji1 = "";
		foreach ($result['translateResult'][0] as $k=>$v){
			$zhongzhimianji1 = $zhongzhimianji1.$v['tgt'];
		}

		$strqian = urlencode($chulifangshi);
		$url= "http://fanyi.youdao.com/translate?&doctype=json&type=".$fanyitype."&i=".$strqian;
		$result = json_decode(file_get_contents($url),true);
		$chulifangshi1 = "";
		foreach ($result['translateResult'][0] as $k=>$v){
			$chulifangshi1 = $chulifangshi1.$v['tgt'];
		}

		$strqian = urlencode($chulitedian);
		$url= "http://fanyi.youdao.com/translate?&doctype=json&type=".$fanyitype."&i=".$strqian;
		$result = json_decode(file_get_contents($url),true);
		$chulitedian1 = "";
		foreach ($result['translateResult'][0] as $k=>$v){
			$chulitedian1 = $chulitedian1.$v['tgt'];
		}

		$strqian = urlencode($hongguoshuliang);
		$url= "http://fanyi.youdao.com/translate?&doctype=json&type=".$fanyitype."&i=".$strqian;
		$result = json_decode(file_get_contents($url),true);
		$hongguoshuliang1 = "";
		foreach ($result['translateResult'][0] as $k=>$v){
			$hongguoshuliang1 = $hongguoshuliang1.$v['tgt'];
		}

		$strqian = urlencode($haibagaodu);
		$url= "http://fanyi.youdao.com/translate?&doctype=json&type=".$fanyitype."&i=".$strqian;
		$result = json_decode(file_get_contents($url),true);
		$haibagaodu1 = "";
		foreach ($result['translateResult'][0] as $k=>$v){
			$haibagaodu1 = $haibagaodu1.$v['tgt'];
		}

		$strqian = urlencode($shouhuoshijian);
		$url= "http://fanyi.youdao.com/translate?&doctype=json&type=".$fanyitype."&i=".$strqian;
		$result = json_decode(file_get_contents($url),true);
		$shouhuoshijian1 = "";
		foreach ($result['translateResult'][0] as $k=>$v){
			$shouhuoshijian1 = $shouhuoshijian1.$v['tgt'];
		}

		$strqian = urlencode($niancanliang);
		$url= "http://fanyi.youdao.com/translate?&doctype=json&type=".$fanyitype."&i=".$strqian;
		$result = json_decode(file_get_contents($url),true);
		$niancanliang1 = "";
		foreach ($result['translateResult'][0] as $k=>$v){
			$niancanliang1 = $niancanliang1.$v['tgt'];
		}

		$this->member->getmemberinfoainsertnongchang($id,$yuyanflg1,$mid,$touxiang,$xingming1,$xingbie1,$dianhua,$youxiang,$zhou1,$guojia1,$chengshi1,$kafeiming1,$caijididian1,$xiangxidizhi1,$zhongzhimianji1,$chulifangshi1,$chulitedian1,$hongguoshuliang1,$haibagaodu1,$shouhuoshijian1,$niancanliang1,$nonglogo,$addtime,$zhuangtai);
		$this->member->getyanzhengmaupdatekafei($mid,2);
		$_SESSION['user_email'] = $membereinfo['youxiang'];
		$msg = "Operation Successful!";
		if (empty($_SESSION['LTYPE'])){
			$msg = "操作成功！";
		}
		echo json_encode(array('result' => 1, 'msg' => $msg));
		return false;
	}
	public function searchex_xiaolist()
	{
		$stype = isset($_GET['stype']) ? $_GET['stype'] : 1;
		$caigouliang1 = isset($_GET['caigouliang1']) ? $_GET['caigouliang1'] : 0;
		$caigouliang2 = isset($_GET['caigouliang2']) ? $_GET['caigouliang2'] : 0;
		$date1 = isset($_GET['date1']) ? strtotime($_GET['date1']) : 0;
		$date2 = isset($_GET['date2']) ? strtotime($_GET['date2']) : 0;
		$guojia = isset($_GET['guojia']) ? $_GET['guojia'] : '';
		$data = array();

		$ltype = isset($_GET['ltype']) ? $_GET['ltype'] : 999;
		if ($ltype == 1){
			$_SESSION['LTYPE'] = 0;
		}elseif ($ltype == 2){
			$_SESSION['LTYPE'] = 1;
		}
		$data['ltype'] = empty($_SESSION['LTYPE'])?0:$_SESSION['LTYPE'];
		if (empty($_SESSION['LTYPE'])){
			$data['yuyan1'] = $this->member->yuyan(1);
			$data['yuyan2'] = $this->member->yuyan(3);
			$data['yuyan3'] = $this->member->yuyan(5);
			$data['yuyan4'] = $this->member->yuyan(7);
		}else{
			$data['yuyan1'] = $this->member->yuyan(2);
			$data['yuyan2'] = $this->member->yuyan(4);
			$data['yuyan3'] = $this->member->yuyan(6);
			$data['yuyan4'] = $this->member->yuyan(8);
		}

		$ltypenew = empty($_SESSION['LTYPE'])?1:2;
		$data['stype'] = $stype;
		$searchex_xiaolistAll = $this->member->getsearchex_xiaolistAll(1,$caigouliang1,$caigouliang2,$guojia,$date1,$date2,$ltypenew);
		$searchex_xiaolistAllcount = $this->member->getsearchex_xiaolistAllcount(1,$caigouliang1,$caigouliang2,$guojia,$date1,$date2,$ltypenew);
		$data['tiaocount'] = $searchex_xiaolistAllcount;
		$data['caigouliang1'] = empty($caigouliang1)?'':$caigouliang1;
		$data['caigouliang2'] = empty($caigouliang2)?'':$caigouliang2;
		$data['date1'] = isset($_GET['date1']) ? $_GET['date1'] : 0;
		$data['date2'] = isset($_GET['date2']) ? $_GET['date2'] : 0;
		$data['guojia'] = empty($guojia)?'':$guojia;
		$data['list'] = $searchex_xiaolistAll;
		$data['ltype'] = empty($_SESSION['LTYPE'])?0:$_SESSION['LTYPE'];
		$data['youxiang'] = empty($_SESSION['user_email'])?'':$_SESSION['user_email'];

		$this->view_display("web/searchex_xiaolist",$data);
	}
	public function wangji()
	{
		$yanzhengma = isset($_GET['yanzhengma']) ? $_GET['yanzhengma'] : '';
		$youxiang = isset($_GET['youxiang']) ? $_GET['youxiang'] : '';
		$leixing = isset($_GET['leixing']) ? $_GET['leixing'] : '';
		$data = array();
		$data['youxiang'] = $youxiang;
		$data['yanzhengma'] = $yanzhengma;
		$data['leixing'] = $leixing;
		if (empty($leixing)) {
			$ltype = isset($_GET['ltype']) ? $_GET['ltype'] : 999;
			if ($ltype == 1){
				$_SESSION['LTYPE'] = 0;
			}elseif ($ltype == 2){
				$_SESSION['LTYPE'] = 1;
			}elseif ($ltype == 3){
				$_SESSION['LTYPE'] = '';
				$_SESSION['user_email'] = '';
			}
			$data['youxiang'] = empty($_SESSION['user_email'])?'':$_SESSION['user_email'];
			$ltype = isset($_GET['ltype']) ? $_GET['ltype'] : 999;
			if ($ltype == 1){
				$_SESSION['LTYPE'] = 0;
			}elseif ($ltype == 2){
				$_SESSION['LTYPE'] = 1;
			}
			$data['ltype'] = empty($_SESSION['LTYPE'])?0:$_SESSION['LTYPE'];
			if (empty($_SESSION['LTYPE'])){
				$data['yuyan1'] = $this->member->yuyan(1);
				$data['yuyan2'] = $this->member->yuyan(3);
				$data['yuyan3'] = $this->member->yuyan(5);
				$data['yuyan4'] = $this->member->yuyan(7);
			}else{
				$data['yuyan1'] = $this->member->yuyan(2);
				$data['yuyan2'] = $this->member->yuyan(4);
				$data['yuyan3'] = $this->member->yuyan(6);
				$data['yuyan4'] = $this->member->yuyan(8);
			}
			$this->view_display("web/wangji",$data);
		}else{
			$ltype = isset($_GET['ltype']) ? $_GET['ltype'] : 999;
			if ($ltype == 1){
				$_SESSION['LTYPE'] = 0;
			}elseif ($ltype == 2){
				$_SESSION['LTYPE'] = 1;
			}
			$data['ltype'] = empty($_SESSION['LTYPE'])?0:$_SESSION['LTYPE'];
			if (empty($_SESSION['LTYPE'])){
				$data['yuyan1'] = $this->member->yuyan(1);
				$data['yuyan2'] = $this->member->yuyan(3);
				$data['yuyan3'] = $this->member->yuyan(5);
				$data['yuyan4'] = $this->member->yuyan(7);
			}else{
				$data['yuyan1'] = $this->member->yuyan(2);
				$data['yuyan2'] = $this->member->yuyan(4);
				$data['yuyan3'] = $this->member->yuyan(6);
				$data['yuyan4'] = $this->member->yuyan(8);
			}
			$data['youxiang'] = empty($_SESSION['user_email'])?'':$_SESSION['user_email'];
			$this->view_display("web/wangji",$data);
		}
	}
	public function insertmemberwangji()
	{
		if ($_POST["email"] == "") {
			$msg = "Please enter your email address";
			if (empty($_SESSION['LTYPE'])){
				$msg = "请输入邮件地址！";
			}
			echo json_encode(array('result' => 0, 'msg' => $msg));
			return false;
		}
		if ($_POST["yanzhengma"] == "") {
			$msg = "Please enter the verification code";
			if (empty($_SESSION['LTYPE'])){
				$msg = "请输入验证码！";
			}
			echo json_encode(array('result' => 0, 'msg' => $msg));
			return false;
		}
		if ($_POST["mima"] == "") {
			$msg = "Please confirm your password";
			if (empty($_SESSION['LTYPE'])){
				$msg = "请输入确认密码！";
			}
			echo json_encode(array('result' => 0, 'msg' => $msg));
			return false;
		}
		if ($_POST["querenmima"] == "") {
			$msg = "Please confirm your password";
			if (empty($_SESSION['LTYPE'])){
				$msg = "请输入确认密码！";
			}
			echo json_encode(array('result' => 0, 'msg' => $msg));
			return false;
		}
		if ($_POST["querenmima"] != $_POST["mima"]) {
			$msg = "The confirm password does not match the password";
			if (empty($_SESSION['LTYPE'])){
				$msg = "确认密码与密码不匹配！";
			}
			echo json_encode(array('result' => 0, 'msg' => $msg));
			return false;
		}
		$leixing = isset($_POST["leixing"]) ? $_POST["leixing"] : '';
		$youxiang = isset($_POST["email"]) ? $_POST["email"] : '';
		$yanzhengma = isset($_POST["yanzhengma"]) ? $_POST["yanzhengma"] : '';
		$mima = isset($_POST["mima"]) ? $_POST["mima"] : '';
		$memberemail = $this->member->getmemberyanzhengma($youxiang,time());
		if (empty($memberemail)){
			$msg = "Verification code expired! Please enter the correct verification code!";
			if (empty($_SESSION['LTYPE'])){
				$msg = "验证码过期！请输入正确验证码！";
			}
			echo json_encode(array('result' => 0, 'msg' => $msg));
			return false;
		}
		if ($memberemail[0]['yanzhengma'] != $yanzhengma){
			$msg = "Verification codes do not match! Please enter the correct verification code!";
			if (empty($_SESSION['LTYPE'])){
				$msg = "验证码不匹配！请输入正确验证码！";
			}
			echo json_encode(array('result' => 0, 'msg' => $msg));
			return false;
		}
		$membereinfo = $this->member->getmemberinfoa($youxiang,$mima,$leixing);
		if (empty($membereinfo)){
			$this->member->getyanzhengmaupdatewangjinew($youxiang,$mima);
		}else{
			$this->member->getyanzhengmaupdatewangji($youxiang,$mima,$leixing);
		}

		$msg = "Update Successfully!";
		if (empty($_SESSION['LTYPE'])){
			$msg = "修改成功！";
		}

		if (empty($membereinfo)){
			$membereinfo = $this->member->getmemberinfoanew($youxiang,$mima);
		}
		echo json_encode(array('result' => 1,'msg' => $msg,'leixing' => $membereinfo['leixing']));
		return false;
	}
	public function searchex_yuanlist()
	{
		$stype = isset($_GET['stype']) ? $_GET['stype'] : 1;
		$guojia = isset($_GET['guojia']) ? $_GET['guojia'] : '';
		$nianchanliang1 = isset($_GET['nianchanliang1']) ? $_GET['nianchanliang1'] : 0;
		$nianchanliang2 = isset($_GET['nianchanliang2']) ? $_GET['nianchanliang2'] : 0;
		$date1 = isset($_GET['date1']) ? strtotime($_GET['date1']) : 0;
		$date2 = isset($_GET['date2']) ? strtotime($_GET['date2']) : 0;
		$data = array();

		$ltype = isset($_GET['ltype']) ? $_GET['ltype'] : 999;
		if ($ltype == 1){
			$_SESSION['LTYPE'] = 0;
		}elseif ($ltype == 2){
			$_SESSION['LTYPE'] = 1;
		}
		$data['ltype'] = empty($_SESSION['LTYPE'])?0:$_SESSION['LTYPE'];
		if (empty($_SESSION['LTYPE'])){
			$data['yuyan1'] = $this->member->yuyan(1);
			$data['yuyan2'] = $this->member->yuyan(3);
			$data['yuyan3'] = $this->member->yuyan(5);
			$data['yuyan4'] = $this->member->yuyan(7);
		}else{
			$data['yuyan1'] = $this->member->yuyan(2);
			$data['yuyan2'] = $this->member->yuyan(4);
			$data['yuyan3'] = $this->member->yuyan(6);
			$data['yuyan4'] = $this->member->yuyan(8);
		}
		$ltypenew = empty($_SESSION['LTYPE'])?1:2;
		$data['stype'] = $stype;
		$searchex_xiaolistAll = $this->member->getsearchex_xiaolistAll1(1,$nianchanliang1,$nianchanliang2,$guojia,$date1,$date2,$ltypenew);
		$searchex_xiaolistAllcount = $this->member->getsearchex_xiaolistAllcount1(1,$nianchanliang1,$nianchanliang2,$guojia,$date1,$date2,$ltypenew);
		$data['tiaocount'] = $searchex_xiaolistAllcount;
		$data['nianchanliang1'] = empty($nianchanliang1)?'':$nianchanliang1;
		$data['nianchanliang2'] = empty($nianchanliang2)?'':$nianchanliang2;
		$data['date1'] = isset($_GET['date1']) ? $_GET['date1'] : 0;
		$data['date2'] = isset($_GET['date2']) ? $_GET['date2'] : 0;
		$data['guojia'] = empty($guojia)?'':$guojia;
		$data['list'] = $searchex_xiaolistAll;
		$data['ltype'] = empty($_SESSION['LTYPE'])?0:$_SESSION['LTYPE'];
		$data['youxiang'] = empty($_SESSION['user_email'])?'':$_SESSION['user_email'];
		$this->view_display("web/searchex_yuanlist",$data);
	}
	public function sendemail()
	{

		if ($_POST["email"] == "") {
			$msg = "Please enter your email address";
			if (empty($_SESSION['LTYPE'])){
				$msg = "请输入邮件地址";
			}
			echo json_encode(array('error' => true, 'msg' => $msg));
			return false;
		}

		$email = isset($_POST["email"]) ? $_POST["email"] : '';
		$pattern = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
		if (!preg_match($pattern,$email))
		{
			$msg = "The email address you entered is invalid";
			if (empty($_SESSION['LTYPE'])){
				$msg = "您输入的电子邮件地址不合法";
			}
			echo json_encode(array('error' => true, 'msg' => $msg));
			return false;
		}
		$memberemail = $this->member->getmemberyanzhengma($email,time());
		if (!empty($memberemail)){
			$msg = "Sent successfully! Please check the verification code in the mailbox!";
			if (empty($_SESSION['LTYPE'])){
				$msg = "发送成功！请去邮箱内查看验证码！";
			}
			echo json_encode(array('error' => true, 'msg' => $msg));
			return false;
		}
		$mail = new PHPMailer(true);
		try {
			//服务器配置
			$mail->CharSet ="UTF-8";                     //设定邮件编码
			$mail->SMTPDebug = 0;                        // 调试模式输出
			$mail->isSMTP();                             // 使用SMTP
			$mail->Host = 'smtp.163.com';                // SMTP服务器
			$mail->SMTPAuth = true;                      // 允许 SMTP 认证
			$mail->Username = 'zhaoyue_gary@163.com';                // SMTP 用户名  即邮箱的用户名
			$mail->Password = 'PBTGNNPWHIQIQWVQ';             // SMTP 密码  部分邮箱是授权码(例如163邮箱)
			$mail->SMTPSecure = 'ssl';                    // 允许 TLS 或者ssl协议
			$mail->Port = 465;                            // 服务器端口 25 或者465 具体要看邮箱服务器支持

			$mail->setFrom('zhaoyue_gary@163.com', 'Mailer');  //发件人
			$mail->addAddress($email, 'Joe');  // 收件人
			//$mail->addAddress('ellen@example.com');  // 可添加多个收件人
			$mail->addReplyTo('zhaoyue_gary@163.com', 'info'); //回复的时候回复给哪个邮箱 建议和发件人一致
			//$mail->addCC('cc@example.com');                    //抄送
			//$mail->addBCC('bcc@example.com');                    //密送

			//发送附件
			// $mail->addAttachment('../xy.zip');         // 添加附件
			// $mail->addAttachment('../thumb-1.jpg', 'new.jpg');    // 发送附件并且重命名
			$yanzhengma = $this->randStr();
			//Content
			$mail->isHTML(true);                                  // 是否以HTML文档格式发送  发送后客户端可直接显示对应HTML内容
			$mail->Subject = '验证码';
			$mail->Body    = '<h1>'.$yanzhengma.'</h1><br>发送时间：' . date('Y-m-d H:i:s') . '<br>过期时间：'. date('Y-m-d H:i:s',time() + 3600);
			$mail->AltBody = '如果邮件客户端不支持HTML则显示此内容';

			$mail->send();
			$this->member->getmemberyanzhengmainsert($email,time()+1800,$yanzhengma,time(),1);
			$msg = "Sent successfully! Please check the verification code in the mailbox!";
			if (empty($_SESSION['LTYPE'])){
				$msg = "发送成功！请去邮箱内查看验证码！";
			}
			echo json_encode(array('error' => true, 'msg' => $msg));
		} catch (Exception $e) {
			$msg = "Sent error!";
			if (empty($_SESSION['LTYPE'])){
				$msg = "发送失败！";
			}
			echo json_encode(array('error' => true, 'msg' => $msg));
		}
	}
	function randStr($len=6,$format='ALL') {
		switch($format) {
			case 'ALL':
				$chars='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'; break;
			case 'CHAR':
				$chars='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; break;
			case 'NUMBER':
				$chars='0123456789'; break;
			default :
				$chars='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
				break;
		}
		mt_srand((double)microtime()*1000000*getmypid());
		$password="";
		while(strlen($password)<$len)
			$password.=substr($chars,(mt_rand()%strlen($chars)),1);
		return $password;
	}
}
