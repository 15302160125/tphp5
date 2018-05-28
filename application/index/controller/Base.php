<?php 
	namespace app\index\controller;
	use think\Controller;
	use think\Session;
	class Base extends Controller
	{
		private $account='';
		public function _initialize()
		{
			if(!$this->isLogin())
			{
				$this->redirect("login/login");
			}
			$user=$this->getLoginUser();
			$this->assign('user',$user);
		}
		public function isLogin()
		{
			$user=$this->getLoginUser();
			if($user&&$user->id)
			{
				return true;
			}
			return false;
		}
		public function getLoginUser()
		{
			if(!$this->account)
			{
				$this->account=Session::get('my_user','my');
			}
			return $this->account;
		}
	}

?>