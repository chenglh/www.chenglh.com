<?php declare(strict_types=1);
/**
 * This file is part of Swoft.
 *
 * @link https://swoft.org
 * @document https://swoft.org/docs
 * @contact group@swoft.org
 * @license https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Http\Controller\Manager;

use App\Http\Middleware\AuthMiddleware;
use App\Model\Dao\ManagerRoleDao;
use App\Model\Dao\MenuDao;
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
     * 用户菜单列表
     * @RequestMapping(route="menu",method=RequestMethod::GET)
     * @return array
     */
    public function mlist(Request $request): array {
        if ($request->user->role_id != 1) { // 非管理员
            $roles = $this->managerRoleDao->getRoleByRoleId($request->user->role_id);
            $menu_ids = $roles->getRoleDesc();
        }

        //角色ID --> (角色)对应menu_ids   -->  具体的菜单

        #管理员，全部

        #非管理员，部分

        //
        ///当前角色下有什么菜单
        //$menu_ids = $roles->getRoleMenu();

        /** 菜单列表 */
        //$this->menuDao->getMenu($role_id,$menu_ids);

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
