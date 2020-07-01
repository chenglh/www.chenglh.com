<?php declare(strict_types=1);
/**
 * 菜单数据层
 * @Author：chenglh
 * @Time：2020-07-01
 */
namespace App\Model\Data;

use App\Model\Entity\ManagerMenu;
use Swoft\Bean\Annotation\Mapping\Bean;

/**
 * Class MenuData
 * @Bean()
 */
class MenuData extends Repository
{
    /**
     * 管理员菜单列表
     * @param int $role_id
     * @param string $role_menu
     * @return bool|mixed
     * @throws \Swoft\Db\Exception\DbException
     */
    public function getManagerMenu(int $role_id, string $role_menu) {
        return $this->setModel(new ManagerMenu())
            ->setTag("managerMenuInfo")
            ->remeber($this->getTag() . ":" . $role_id, function () use ($role_id, $role_menu) {
                if ($role_id == 1) {
                    return $this->getModel()::get(['*'])->toArray();
                } else {
                    return $this->getModel()::whereIn('menu_id', explode(',', $role_menu))->get(['*'])->toArray();
                }
            });
    }
}
