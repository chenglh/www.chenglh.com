<?php declare(strict_types=1);
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
	public function getManagerByMobile(string $mobile) {
		return Manager::where('mobile',$mobile)->first();
	}

	/**
	 * 获取用户信息
	 * @param string $id
	 * @return mixed
	 */
	public function getManagerById(int $id) {
		return Manager::find($id);
	}


}
