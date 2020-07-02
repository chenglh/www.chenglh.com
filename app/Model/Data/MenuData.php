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
			->setTtl(120)
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
		$itemTree = [];
        $tree_list = getTree($menu_list);
        foreach ($tree_list as $key => $tree) {
        	$children = [];
            if ($tree['menu_hide'] == 1) {
				continue; // 隐藏菜单
			}

			if ($tree['child']) foreach ($tree['child'] as $child) {
            	if ($child['menu_hide'] == 0) {
					$children[] = [
						'title' => $child['menu_title'],
						'jump'  => $child['menu_url']
					];
				}
			}
			$itemTree[] = [
				'title' => $tree['menu_title'],
				'icon'  => $tree['menu_icon'],
				'list'  => $children
			];
        }

        return $itemTree;
    }
}
