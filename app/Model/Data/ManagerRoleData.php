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
class ManagerRoleData
{
	/**
	 * @param int $role_id
	 * @return mixed
	 */
	public function getRoleInfo(int $role_id) {
		return ;
	}
}