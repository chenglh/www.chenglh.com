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
use App\Model\Data\MenuData;
use App\Model\Entity\ManagerRole;
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
     * @var MenuData
     */
    private $menuData;

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
		if ($request->user->getRoleId() != 1) {
		    /** @var ManagerRole $manager_roles */
			$manager_roles = $this->managerRoleData->getRoleInfo($request->user->getRoleId());
			$manager_menu = $this->menuData->getManagerMenu($request->user->getRoleId(), $manager_roles['role_menu']);
		} else {
            $manager_menu = $this->menuData->getManagerMenu($request->user->getRoleId(), '');
        }

        $menu_list = $this->menuData->getManagerMenuList($manager_menu);

//$aa = $this->menuData->getManagerMenuList();
//print_r($manager_menu);

		//加工返回菜单
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
