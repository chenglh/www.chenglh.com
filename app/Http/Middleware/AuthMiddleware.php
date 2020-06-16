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

use Firebase\JWT\JWT;
use App\Utils\Message;
use App\Model\Dao\ManagerDao;
use Swoft\Http\Message\Request;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Exception\SwoftException;
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
			/** @var $managerDao ManagerDao */
            $managerDao = \Swoft::getBean(ManagerDao::class);
			/** 挂在到Request请求对象*/
			$request->user = $managerDao->getManagerById($auth->user->user_id);
			print_r($request->user);
			echo "vvv",PHP_EOL;
        } catch (\Exception $e) {
            return Message::error('授权失败');
        }
        return $handler->handle($request);
    }
}
