<?php declare(strict_types=1);
/**
 * 管理员Logic层
 * @Author：chenglh
 * @Time：2020-06-08
 */
namespace App\Model\Logic;

use App\Constant\ExceptionMsg;
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
		if (getErrorValiCount(getRemoteAddr(true)) >= ExceptionMsg::ERR_LOGIN_TIME) {
			throw new ValidateException(ExceptionMsg::ERR_LOGIN_LIMIT);
		}
	}

    /**
     * 检查用户
     * @param array $data
     */
	public function checkStatus(array $data) {
	    if (empty($data)) {
            throw new ValidationException(ExceptionMsg::ERR_NOTREGISTE);
        } elseif ($data['loginStatus'] == 2) {
            throw new ValidationException(ExceptionMsg::ERR_LOGINSTATE);
        }
    }
}
