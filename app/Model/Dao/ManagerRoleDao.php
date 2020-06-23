<?php declare(strict_types=1);
/**
 * 角色Dao层
 * @Author：chenglh
 * @Time：2020-06-17
 */
namespace App\Model\Dao;

use App\Model\Entity\ManagerRole;
use Swoft\Bean\Annotation\Mapping\Bean;

/**
 * Class ManagerRoleDao
 * @Bean()
 */
class ManagerRoleDao
{
    /**
     * 角色列表
     * @param int $role_id
     * @return ManagerRole
     */
    public function getRoleByRoleId(int $role_id)
    {
        return ManagerRole::find($role_id);
    }
}
