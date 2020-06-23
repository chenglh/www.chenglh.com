<?php declare(strict_types=1);
/**
 * 管理员Logic层
 * @Author：chenglh
 * @Time：2020-06-08
 */
namespace App\Model\Logic;

use App\Constant\Message;
use App\Exception\ValidateException;
use Dotenv\Exception\ValidationException;
use Swoft\Bean\Annotation\Mapping\Bean;

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
		/** 判断账号是否恶意登录被锁 */
		if (getErrorValiCount(getRemoteAddrPart()) >= Message::ERR_LOGIN_TIME) {
			throw new ValidateException(Message::ERR_LOGIN_LIMIT);
		}
	}

	/**
	 * 检查账号是否正常
	 * @param array $data
	 */
	public function checkStatus(array $data) {
	    if (empty($data)) {
            throw new ValidationException(Message::ERR_NOTREGISTE);
        } elseif ($data['login_status'] == 2) {
            throw new ValidationException(Message::ERR_LOGINSTATE);
        }
    }
}
