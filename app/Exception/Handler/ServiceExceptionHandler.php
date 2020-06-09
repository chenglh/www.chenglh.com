<?php declare(strict_types=1);
/**
 * +----------------------------------------------------------------------
 * | 异常接管
 * +----------------------------------------------------------------------
 * | Date：2020-06-08 12:43:56
 * | Author: chenglh
 * +----------------------------------------------------------------------
 */
namespace App\Exception\Handler;

use App\Utils\Message;
use Swoft\Http\Message\ContentType;
use Swoft\Http\Message\Response;
use App\Exception\ServiceException;
use Swoft\Error\Annotation\Mapping\ExceptionHandler;
use Swoft\Http\Server\Exception\Handler\AbstractHttpErrorHandler;
use Throwable;

/**
 * Class ServiceExceptionHandler
 * @ExceptionHandler(ServiceException::class)
 */
class ServiceExceptionHandler extends AbstractHttpErrorHandler
{
	/**
	 * @param Throwable $e
	 * @param Response $response
	 * @return Response
	 */
	public function handle(Throwable $e, Response $response): Response
	{
		return $response
			->withHeader('Access-Control-Allow-Origin', \config('app.website'))
			->withHeader('Access-Control-Allow-Headers', 'Access_token,X-Requested-With, Content-Type, Accept, Origin, Authorization')
			->withHeader("Access-Control-Allow-Credentials", "true")
			->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS')
			->withContentType(ContentType::JSON)
			->withData(Message::error($e->getMessage()));
	}
}