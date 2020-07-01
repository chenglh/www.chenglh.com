<?php declare(strict_types=1);
/**
 * Menu数据库层
 * @Author：chenglh
 * @Time：2020-06-17
 */
namespace App\Model\Dao;

use Swoft\Bean\Annotation\Mapping\Bean;

/**
 * Class MenuDao
 * @Bean()
 */
class MenuDao
{
    /**
     * @param int $role_id
     * @param string $menu_ids
     */
    public function getMenu(int $role_id, string $menu_ids) {
        //缓存读取
        //$this->redis1->get('get');

        //设置缓存

    }
}
