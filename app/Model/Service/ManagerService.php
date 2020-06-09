<?php
/**
 * 管理员Service层
 * @Author：chenglh
 * @Time：2020-06-07
 */
namespace App\Model\Service;

use App\Model\Dao\ManagerDao;
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
	 * @var ManagerDao
	 * @var ManagerDao $manager
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
		if ($password != $manager->getPasswd()) {
			throw new ServiceException('账号或密码错误');
		}

		return $this->getTokenByUserId($manager->getId());
	}

	/**
	 * 获取用户信息
	 * @param string $mobile
	 * @return mixed
	 */
	public function getManagerByMobile(string $mobile)
	{
		/** @var managerDao $manager */
		return $this->managerDao->getManagerByMobile($mobile);
	}
}