<?php declare(strict_types=1);
/**
 * 公共模块
 * @Author：chenglh
 * @Time：2020-06-07
 */

namespace App\Http\Controller\Manager;

use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\Http\Server\Annotation\Mapping\RequestMethod;
use Swoft\Http\Message\Response;

/**
 * Class PublicController
 *
 * @Controller(prefix="/v1/public")
 * @package App\Http\Controller\Manager
 */
class PublicController{
	/**
	 * @
	 */
	public function captcha() {

	}
}
