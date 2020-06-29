<?php declare(strict_types=1);
/**
 * This file is part of Swoft.
 *
 * @link https://swoft.org
 * @document https://swoft.org/docs
 * @contact group@swoft.org
 * @license https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */
namespace App\Http\Middleware;

use App\Constant\Message;
use App\Model\Entity\Manager;
use Firebase\JWT\JWT;
use App\Model\Dao\ManagerDao;
use Swoft\Http\Message\Request;
use Swoft\Exception\SwoftException;
use App\Exception\ValidateException;
use App\Model\Logic\ManagerLogic;
use App\Model\Logic\AccessTokenLogic;
use Swoft\Bean\Annotation\Mapping\Bean;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Swoft\Http\Server\Contract\MiddlewareInterface;

/**
 * Class AuthMiddleware - Custom middleware
 * @Bean()
 * @package App\Http\Middleware
 */
class AuthMiddleware implements MiddlewareInterface
{
   /**
     * Process an incoming server request.
     *
     * @param ServerRequestInterface|Request  $request
     * @param RequestHandlerInterface $handler
     *
     * @return ResponseInterface
     * @throws SwoftException
     * @inheritdoc
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $path = $request->getUri()->getPath();
        if (in_array($path, \config('app.allow_list'))) {
            return $handler->handle($request);
        }

        $access_token = $request->getHeaderLine('access_token');
        try {
            $auth = JWT::decode($access_token, \config('jwt.publicKey'), [\config('jwt.type')]);
            /** 单端登录 */
            /** @var $tokenLogic AccessTokenLogic */
            $tokenLogic = \Swoft::getBean(AccessTokenLogic::class);
            $tokenLogic->checkAccessToken($auth->user->manager_id, $access_token);

			/** @var $managerDao ManagerDao */
            $managerDao = \Swoft::getBean(ManagerDao::class);
            /** @var Manager $manager */
            $manager = $managerDao->getManagerById($auth->user->manager_id);
            $manager = $manager->getArrayableAttributes();

			/** @var $managerLogic ManagerLogic */
            $managerLogic = \Swoft::getBean(ManagerLogic::class);
            $managerLogic->checkStatus($manager);

            /** 挂载到Request请求对象*/
            $request->user = $manager;
        } catch (\Exception $e) {
            throw new ValidateException(Message::ERR_AUTHORIZE);
        }

        /** 用户权限校验 */
        if (!in_array($path, \config('app.allow_menu'))) {
            //TODO未实现
        }

        return $handler->handle($request);
    }
}
