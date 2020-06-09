<?php declare(strict_types=1);
/**
 * 管理员Logic层
 * @Author：chenglh
 * @Time：2020-06-08
 */
namespace App\Model\Logic;

use App\Constant\ExceptionMsg;
use App\Exception\ValidateException;
use EasySwoole\VerifyCode\Conf;
use EasySwoole\VerifyCode\VerifyCode;
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Http\Session\HttpSession;

/**
 * Class ManagerLogic
 * @Bean()
 */
class ManagerLogic
{
	/**
	 * 用户登陆
	 * @param array $data
	 * @throws ValidateException
	 */
	public function login(array $data) {
		$session = HttpSession::current();
		var_dump($session->get('captcha'));
		echo $session->getSessionId(),PHP_EOL;
		echo '获取验证码',$session->get('captcha'),PHP_EOL;
		if (!$data['vercode'] != $session->get('captcha')){
			throw new ValidateException(ExceptionMsg::ERROR_CAPTCHA);
		}
	}
}