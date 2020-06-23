<?php declare(strict_types=1);
/**
 * TokenDao层(数据操作层)
 * @Author：chenglh
 * @Time：2020-06-17
 */
namespace App\Model\Dao;

use App\Model\Entity\AccessToken;
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Redis\Redis;

/**
 * Class AccessTokenDao
 * @Bean()
 */
class AccessTokenDao
{
    /**
     * 获取用户登录信息
     * @param int $access_mid
     * @return mixed
     */
    public function getAccessTokenByManagerId(int $access_mid)
    {
        return AccessToken::where('access_mid', $access_mid)->first();
    }

    /**
     * 创建用户登录记录
     * @param array $data
     * @return bool
     */
    public function create(array $data)
    {
        return AccessToken::updateOrCreate(
            ['access_mid'=>$data['access_mid'],'access_login_type'=>$data['access_login_type']],
			[
				'access_token'=>$data['access_token'],
				'access_login_ip'=>$data['access_login_ip'],
				'create_at'=>date('Y-m-d H:i:s'),
				'update_at'=>date('Y-m-d H:i:s')
			]
        );
    }

    /**
     * 退出登录
     * @param int $user_id
     * @return int|mixed
     */
    public function delete(int $user_id)
    {
        //移除缓存
        $redis1 = Redis::connection('redis1.pool');
        $redis1->del('manager:token:'.$user_id);

        //删除表数据
        return AccessToken::where('manager_id', $user_id)->delete();
    }
}
