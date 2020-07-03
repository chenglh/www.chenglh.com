<?php declare(strict_types=1);
/**
 * 管理员中心
 * @Author：chenglh
 * @Time：2020-06-07
 */
namespace App\Http\Controller\Manager;

use App\Utils\Message;
use Swoft\Http\Message\Request;
use Swoft\Http\Message\Response;
use App\Model\Dao\AccessTokenDao;
use App\Model\Logic\ManagerLogic;
use App\Model\Service\ManagerService;
use Swoft\Bean\Annotation\Mapping\Inject;
use Swoft\Validator\Annotation\Mapping\Validate;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMethod;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;

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
	 * @RequestMapping(route="/v1/login",method={RequestMethod::POST})
     * @Validate(validator="login")
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
     * 修改密码
     * @RequestMapping(route="/v1/resetpwd")
     * @return array
     */
    public function resetpwd() {
        return [1,2,3];
    }
}
