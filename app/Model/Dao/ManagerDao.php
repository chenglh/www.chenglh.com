<?php
/**
 * 管理员Dao层
 * @Author：chenglh
 * @Time：2020-06-08
 */
namespace App\Model\Dao;

use App\Model\Entity\Manager;
use Swoft\Bean\Annotation\Mapping\Bean;

/**
 * Class ManagerDao
 * @Bean()
 */
class ManagerDao
{
	/**
	 * 获取用户信息
	 * @param string $mobile
	 * @return mixed
	 */
	public function getManagerByMobile(string $mobile){
		return Manager::where(['mobile'=>$mobile])->find();
	}

	/**
	 * 获取用户信息
	 * @param string $id
	 * @return mixed
	 */
	public function getManagerById(string $id){
		return User::findOne(['manager_id'=>$id])->getResult();
	}
}