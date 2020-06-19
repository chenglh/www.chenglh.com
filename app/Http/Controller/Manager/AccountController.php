<?php declare(strict_types=1);
/**
 * 管理员中心
 * @Author：chenglh
 * @Time：2020-06-07
 */
namespace App\Http\Controller\Manager;

use App\Utils\Message;
use App\Model\Dao\AccessTokenDao;
use App\Model\Logic\ManagerLogic;
use App\Model\Service\ManagerService;
use Swoft\Bean\Annotation\Mapping\Inject;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\Http\Server\Annotation\Mapping\RequestMethod;
use Swoft\Http\Message\Request;
use Swoft\Http\Message\Response;

/**
 * Class AccountController
 *
 * @Controller(prefix="/account")
 * @package App\Http\Controller\Manager
 */
class AccountController{
	/**
	 * @Inject()
	 * @var ManagerLogic
	 */
	private $managerLogic;

	/**
	 * @Inject()
	 * @var ManagerService
	 */
	private $managerService;

    /**
     * @Inject()
     * @var AccessTokenDao
     */
    private $accessTokenDao;

	/**
     * 用户登录
	 * @RequestMapping(route="/v1/login")
	 * @return array
	 */
	public function login(Request $request, Response $response): array
	{
		$post = $request->post();
		$this->managerLogic->login($post);
		$access_token = $this->managerService->login($post['username'], $post['password']);
		return Message::success('success',Message::CODE_SUCCESS,['access_token'=>$access_token]);
	}

    /**
     * 用户登出
     * @RequestMapping(route="/v1/logout")
     * @return array
     */
	public function logout(Request $request)
    {
        $this->accessTokenDao->delete($request->user->user_id);
        return Message::success('success',Message::CODE_SUCCESS,[]);
    }

    /**
     * Get data list. access uri path: /account
     * @RequestMapping(route="/account", method=RequestMethod::GET)
     * @return array
     */
    public function index(Request $request): array
    {
        print_r($request);
        return [];
    }

    /**
     * Get one by ID. access uri path: /account/{id}
     * @RequestMapping(route="{id}", method=RequestMethod::GET)
     * @return array
     */
    public function get(): array
    {
        return ['item0'];
    }

    /**
     * Create a new record. access uri path: /account
     * @RequestMapping(route="/account", method=RequestMethod::POST)
     * @return array
     */
    public function post(): array
    {
        return ['id' => 2];
    }

    /**
     * Update one by ID. access uri path: /account/{id}
     * @RequestMapping(route="{id}", method=RequestMethod::PUT)
     * @return array
     */
    public function put(): array
    {
        return ['id' => 1];
    }

    /**
     * Delete one by ID. access uri path: /account/{id}
     * @RequestMapping(route="{id}", method=RequestMethod::DELETE)
     * @return array
     */
    public function del(): array
    {
        return ['id' => 1];
    }
}
