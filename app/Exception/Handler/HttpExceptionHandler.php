<?php declare(strict_types=1);
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://swoft.org/docs
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */
namespace App\Exception\Handler;

use App\Utils\Message;
use Swoft\Http\Message\Response;
use Swoft\Http\Message\ContentType;
use Swoft\Error\Annotation\Mapping\ExceptionHandler;
use Swoft\Http\Server\Exception\Handler\AbstractHttpErrorHandler;
use Throwable;

/**
 * Class HttpExceptionHandler
 *
 * @ExceptionHandler(\Throwable::class)
 */
class HttpExceptionHandler extends AbstractHttpErrorHandler
{
    /**
     * @param Throwable $e
     * @param Response  $response
     *
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
            ->withData(Message::success($e->getMessage()));
    }
}
