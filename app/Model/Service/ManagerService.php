<?php
/**
 * 管理员Service层
 * @Author：chenglh
 * @Time：2020-06-07
 */
namespace App\Model\Service;

use App\Exception\ServiceException;
use App\Model\Dao\ManagerDao;
use App\Model\Entity\Manager;
use Firebase\JWT\JWT;
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Bean\Annotation\Mapping\Inject;

/**
 * Class ManagerService
 * @Bean()
 */
class ManagerService
{
	/**
	 * @Inject()
	 * @var ManagerDao \App\Model\Dao\ManagerDao
	 */
	private $managerDao;

	/**
	 * 创建用户
	 * @param array $data
	 * @return mixed
	 * @throws ServiceException
	 */
	public function create(array $data)
	{
		$data['create_time'] = time();

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
		/** @var Manager $manager */
		$manager = $this->getManagerByMobile($mobile);
		if (!$manager) {
			throw new ServiceException('该用户未注册');
		}
		if ($manager->getPassword() != getHashPassword($password, $manager->getPasswordSalt())) {
			throw new ServiceException('账号或密码错误');
		}
		if ($manager->getLoginStatus() == 2) {
			throw new ServiceException('该用户已注消');
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
	 * @param int $id
	 * @return String
	 */
	public function getTokenByManagerId($id)
	{
		//登陆成功使用jwt返回token
		$private = \config('jwt.privateKey');
		$type = \config('jwt.type');

		$tokenParam = [
			'manager_id' => $id,// 用户id
			'iat' => time(),// 创建时间
		];
		return JWT::encode($tokenParam, $private, $type);
	}
}