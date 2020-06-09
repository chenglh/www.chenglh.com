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

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Context\Context;
use Swoft\Exception\SwoftException;
use Swoft\Http\Message\Request;
use Swoft\Http\Server\Contract\MiddlewareInterface;

/**
 * Class ApiMiddleware - Custom middleware
 * @Bean()
 * @package App\Http\Middleware
 */
class ApiMiddleware implements MiddlewareInterface
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
		if ('OPTIONS' === $request->getMethod()) {
			$response = context::get()->getResponse();
			return $this->configResponse($response);
        }
		$response = $handler->handle($request);
		return $this->configResponse($response);
    }

	private function configResponse(ResponseInterface $response)
	{
		return $response
			->withHeader('Access-Control-Allow-Origin', 'http://www.tladmin.com')
			->withHeader('Access-Control-Allow-Headers', 'Access_token,X-Requested-With, Content-Type, Accept, Origin, Authorization')
			->withHeader("Access-Control-Allow-Credentials", "true")
			->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
	}
}
