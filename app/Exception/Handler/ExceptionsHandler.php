<?php
/**
 * +----------------------------------------------------------------------
 * | 异常接管
 * +----------------------------------------------------------------------
 * | Date：2020-06-08 12:43:56
 * | Author: chenglh
 * +----------------------------------------------------------------------
 */
namespace App\Exception;

use App\Utils\Message;
use Swoft\Bean\Annotation\ExceptionHandler;
use Swoft\Bean\Annotation\Handler;
use Swoft\Http\Message\ContentType;
use Swoft\Http\Message\Response;

/**
 * @ExceptionHandler()
 */
class ExceptionsHandler
{
	/**
	 * @Handler(ServiceException::class)
	 * @param Response $response
	 * @param \Throwable $throwable
	 * @return Response
	 */
	public function service(Response $response, \Throwable $throwable)
	{
		$data = Message::error($throwable->getMessage());
		return $response->withContentType(ContentType::JSON)->withData($data);
	}

	/**
	 * @Handler(ValidateException::class)
	 * @param Response $response
	 * @param \Throwable $throwable
	 * @return Response
	 */
	public function validate(Response $response, \Throwable $throwable)
	{
		$data = Message::error($throwable->getMessage());
		return $response->withContentType(ContentType::JSON)->withData($data);
	}
}