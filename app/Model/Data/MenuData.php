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
    public function getManagerMenu($role_id, $role_menu) {
        return $this->setTag("menuInfo")
            ->remeber($this->getTag() . ":" . $role_id, function () use ($role_id, $role_menu) {
                if ($role_id == 1) {
                    $menuList = ManagerMenu::orderByRaw('menu_pid asc,menu_sort asc')->get()->toArray();
                } else {
                    $menuList = ManagerMenu::whereIn('menu_id', explode(',', $role_menu))->orderByRaw('menu_pid asc,menu_sort asc')->get()->toArray();
                }
                return attributes($menuList);
            });
    }

    /**
     * 菜单列表处理
     * @param array $menu_list
     * @return array
     */
    public function getManagerMenuList(array $menu_list) {
        #找出顶级菜单
        $parent = getTree($menu_list);
        print_r($parent);
//        foreach ($menu_list as ) {
//            if ()
//        }
//
//        $list = [];

//        return $list;
    }
}
