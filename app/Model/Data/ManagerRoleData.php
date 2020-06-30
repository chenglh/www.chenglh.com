<?php declare(strict_types=1);
/**
 * 角色数据层
 * @Author：chenglh
 * @Time：2020-06-29
 */

namespace App\Model\Data;

use App\Model\Entity\ManagerRole;
use Swoft\Bean\Annotation\Mapping\Bean;

/**
 * Class ManagerRoleData
 * @Bean()
 */
class ManagerRoleData extends Repository
{
	/**
	 * @param int $role_id
	 * @return mixed
	 */
	public function getRoleInfo(int $role_id) {
		$aa = $this->setModel(new ManagerRole())
			->setTag("roleInfo")
			->remeber($this->getTag() . ":" . $role_id, function () use ($role_id) {
				return $this->getModel()::where('role_id', $role_id)->first();
			});
		print_r($aa);
		var_dump($aa);
		return $aa;
	}
}