<?php declare(strict_types=1);
/**
 * 菜单管理
 * @Author：chenglh
 * @Time：2020-06-29
 */

namespace App\Http\Controller\Manager;

use App\Http\Middleware\AuthMiddleware;
use App\Model\Dao\ManagerRoleDao;
use App\Model\Dao\MenuDao;
use App\Model\Data\ManagerRoleData;
use Swoft\Bean\Annotation\Mapping\Inject;
use Swoft\Http\Message\Request;
use Swoft\Http\Message\Response;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\Middleware;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\Http\Server\Annotation\Mapping\RequestMethod;

/**
 * Class MenuController
 *
 * @Controller(prefix="/v1")
 * @package App\Http\Controller\Manager
 * @Middleware(AuthMiddleware::class)
 */
class MenuController
{
    /**
     * @Inject()
     * @var ManagerRoleDao
     */
    private $managerRoleDao;

    /**
     * @Inject()
     * @var MenuDao
     */
    private $menuDao;

	/**
	 * @Inject()
	 * @var ManagerRoleData
	 */
    private $managerRoleData;

    /**
     * 用户菜单列表
     * @RequestMapping(route="menu",method=RequestMethod::GET)
     * @return array
     */
    public function mlist(Request $request): array {
    	$role_id = $request->user->getRoleId();
		if ($role_id != 1) { // 普通管理员
			$roles = $this->managerRoleData->getRoleInfo($role_id);
		} else { // 超级管理员

		}

		return ['item0', 'item1'];
    }

    /**
     * Get data list. access uri path: /menu
     * @RequestMapping(route="index", method=RequestMethod::GET)
     * @return array
     */
    public function index(): array
    {
        return ['item0', 'item1'];
    }

    /**
     * Get one by ID. access uri path: /menu/{id}
     * @RequestMapping(route="{id}", method=RequestMethod::GET)
     * @return array
     */
    public function get(): array
    {
        return ['item0'];
    }

    /**
     * Create a new record. access uri path: /menu
     * @RequestMapping(route="/menu", method=RequestMethod::POST)
     * @return array
     */
    public function post(): array
    {
        return ['id' => 2];
    }

    /**
     * Update one by ID. access uri path: /menu/{id}
     * @RequestMapping(route="{id}", method=RequestMethod::PUT)
     * @return array
     */
    public function put(): array
    {
        return ['id' => 1];
    }

    /**
     * Delete one by ID. access uri path: /menu/{id}
     * @RequestMapping(route="{id}", method=RequestMethod::DELETE)
     * @return array
     */
    public function del(): array
    {
        return ['id' => 1];
    }
}
