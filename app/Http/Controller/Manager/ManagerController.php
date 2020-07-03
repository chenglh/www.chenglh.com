<?php declare(strict_types=1);
/**
 * 管理员中心
 * @Author：chenglh
 * @Time：2020-07-03
 */
namespace App\Http\Controller\Manager;

use Swoft\Bean\Annotation\Mapping\Inject;
use Swoft\Http\Message\Request;
use Swoft\Http\Message\Response;
use App\Model\Logic\ManagerLogic;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\Http\Server\Annotation\Mapping\RequestMethod;

/**
 * Class ManagersController
 *
 * @Controller(prefix="/v1")
 * @package App\Http\Controller\Manager
 */
class ManagerController{
    /**
     * @Inject()
     * @var ManagerLogic
     */
    private $managerLogic;

    /**
     * 管理员列表
     * @RequestMapping(route="manager", method={RequestMethod::POST})
     * @return array
     */
    public function index(Request $request): array
    {
        print_r($request->getHeaders());
        $where = $this->managerLogic->form($request->post());

        return ['item0', 'item1'];
    }

    /**
     * Get one by ID. access uri path: /manager/{id}
     * @RequestMapping(route="{id}", method=RequestMethod::GET)
     * @return array
     */
    public function get(): array
    {
        return ['item0'];
    }

    /**
     * Create a new record. access uri path: /manager
     * @RequestMapping(route="/managers", method=RequestMethod::POST)
     * @return array
     */
    public function post(): array
    {
        return ['id' => 2];
    }

    /**
     * Update one by ID. access uri path: /manager/{id}
     * @RequestMapping(route="{id}", method=RequestMethod::PUT)
     * @return array
     */
    public function put(): array
    {
        return ['id' => 1];
    }

    /**
     * Delete one by ID. access uri path: /manager/{id}
     * @RequestMapping(route="{id}", method=RequestMethod::DELETE)
     * @return array
     */
    public function del(): array
    {
        return ['id' => 1];
    }
}
