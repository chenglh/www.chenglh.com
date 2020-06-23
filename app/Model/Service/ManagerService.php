<?php
/**
 * 管理员Service层
 * @Author：chenglh
 * @Time：2020-06-07
 */
namespace App\Model\Service;

use App\Model\Dao\AccessTokenDao;
use Firebase\JWT\JWT;
use App\Constant\ExceptionMsg;
use App\Exception\ServiceException;
use App\Model\Dao\ManagerDao;
use App\Model\Entity\Manager;
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Bean\Annotation\Mapping\Inject;
use Swoft\Redis\Redis;

/**
 * Class ManagerService
 * @Bean()
 */
class ManagerService
{
	/**
	 * @Inject()
	 * @var ManagerDao
	 */
	private $managerDao;

    /**
     * @Inject()
     * @var AccessTokenDao
     */
	private $accessTokenDao;

	/**
	 * 创建用户
	 * @param array $data
	 * @return mixed
	 * @throws ServiceException
	 */
	public function create(array $data)
	{
        //$data['create_time'] = time();
        //$this->codeService->checkCode($data['mobile'], $data['code']);
        //$user = $this->getUserByMobile($data['mobile']);
        //if ($user) {
        //    throw new ServiceException('该手机号已经注册');
        //}
        //return $this->userDao->create($data);
	}

	/**
	 * 用户登陆
	 * @param string $mobile
	 * @param string $passwd
	 * @return String
	 * @throws ServiceException
	 */
	public function login(string $mobile, string $password)
	{
		$remote_addr = getRemoteAddr(true);
		/** @var Manager $manager */
		$manager = $this->getManagerByMobile($mobile);
		if (!$manager) {
			setErrorValiCount($remote_addr, 60 * 20);
			throw new ServiceException(ExceptionMsg::ERR_NOTREGISTE);
		}
		if ($manager->getPassword() != getHashPassword($password, $manager->getPasswordSalt())) {
			setErrorValiCount($remote_addr, 60 * 20);
			throw new ServiceException(ExceptionMsg::ERR_PASSWORD);
		}
		if ($manager->getLoginStatus() == 2) {
			setErrorValiCount($remote_addr, 60 * 20);
			throw new ServiceException(ExceptionMsg::ERR_LOGINSTATE);
		}
		return $this->getTokenByManagerId($manager->getManagerId());
	}

	/**
	 * 获取用户信息
	 * @param string $mobile
	 * @return mixed
	 */
	public function getManagerByMobile(string $mobile)
	{
		return $this->managerDao->getManagerByMobile($mobile);
	}

	/**
	 * 生成Token
	 * @param int $managerId
	 * @return String
	 */
	public function getTokenByManagerId(int $managerId)
	{
	    //jwt数据串
		$tokenParam = [
			'iat' => time(),//创建时间
			'user' => [
				'managerId' => $managerId,//管理员ID
			]
		];

		$access_token = JWT::encode($tokenParam, \config('jwt.privateKey'), \config('jwt.type'));
        {
            //协程写token及写入表中
            sgo(function () use ($managerId, $access_token) {
                $data = [
                    'manager_id' => $managerId,
                    'login_type' => 0,
                    'access_token' => $access_token,
                    'login_ip' => getRemoteAddr()
                ];
                $this->accessTokenDao->create($data);
            });
        }
        $redis1 = Redis::connection('redis1.pool');
        $redis1->set('manager:token:' . $managerId, $access_token, 300);

		return $access_token;
	}
}
