<?php declare(strict_types=1);
/**
 * 公共模块
 * @Author：chenglh
 * @Time：2020-06-07
 */

namespace App\Http\Controller\Manager;

use EasySwoole\VerifyCode\Conf;
use EasySwoole\VerifyCode\VerifyCode;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\Http\Server\Annotation\Mapping\RequestMethod;
use Swoft\Http\Message\Request;
use Swoft\Http\Message\Response;

/**
 * Class PublicController
 * @Controller(prefix="/v1/public")
 * @package App\Http\Controller\Manager
 */
class PublicController{
	/**
	 * @RequestMapping(route="captcha",method={RequestMethod::GET})
	 */
	public function captcha(Response $response): Response {
		$verifyConf = new Conf();
		$verifyConf->setCharset('23456789AaBbCcdEeFfGgHhiJjKkLMmNnPpQqRrSsTtUuVvWwXxYyZz')
			->setBackColor('#3A0000') //设置背景色
			->setBackColor('CCC')
			->setBackColor([30, 144, 255])
			->setUseNoise(); //开启或关闭混淆噪点
		$captcha = new VerifyCode($verifyConf);

		//生成验证码
		return $response->withHeader('Content-Type','image/png')
			->withContent($captcha->DrawCode()->getImageByte());
	}
}
