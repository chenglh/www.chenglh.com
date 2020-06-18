<?php declare(strict_types=1);
/**
 * MenuDao层
 * @Author：chenglh
 * @Time：2020-06-17
 */
namespace App\Model\Dao;

use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Bean\Annotation\Mapping\Inject;
use Swoft\Redis\Redis;

/**
 * Class MenuDao
 * @Bean()
 */
class MenuDao
{
    /**
     * @Inject(redis1.pool)
     * @var $redis1 Redis
     */
    private $redis1;
    /**
     * @param int $role_id
     * @param string $menu_ids
     */
    public function getMenu(int $role_id, string $menu_ids) {
        //缓存读取
        $this->redis1->get('get');

        //设置缓存

    }
}
