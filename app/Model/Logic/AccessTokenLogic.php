<?php declare(strict_types=1);
/**
 * TokenLogic层
 * @Author：chenglh
 * @Time：2020-06-17
 */
namespace App\Model\Logic;

use App\Model\Entity\AccessToken;
use Swoft\Redis\Redis;
use App\Constant\Message;
use App\Model\Dao\AccessTokenDao;
use App\Exception\ValidateException;
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Bean\Annotation\Mapping\Inject;

/**
 * Class AccessTokenLogic
 * @Bean()
 */
class AccessTokenLogic
{
    /**
     * @Inject("redis1.pool")
     * @var Redis
     */
    private $redis1;

    /**
     * @Inject()
     * @var AccessTokenDao
     */
    private $accessTokenDao;

    /**
     * 单端登录检查
     * @param int $manager_id
     * @param string $access_token
     */
    public function checkAccessToken(int $manager_id, string $access_token)
    {
        //先从缓存中检查
        $token = $this->redis1->get('manager:token:' . $manager_id);
        if (empty($token)) {
            //缓存没有数据，则从数据表中查询
			/** @var AccessToken $result */
            $result = $this->accessTokenDao->getAccessTokenByManagerId($manager_id);
            if ($result != false) {
                $token = $result->getAccessToken();
                $this->redis1->set('manager:token:' . $manager_id, $token, 300);
            } else {
                throw new ValidateException(Message::ERR_AUTHORIZE);
            }
        }
        if ($token != $access_token) {
            throw new ValidateException(Message::ERR_AUTHORIZE);
        }
    }
}
