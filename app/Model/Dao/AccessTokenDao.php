<?php declare(strict_types=1);
/**
 * TokenDao层
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
class AccessTokenDao{
    /**
     * 获取用户登录信息
     * @param int $manager_id
     * @return mixed
     */
    public function getAccessTokenByManagerId(int $manager_id)
    {
        return AccessToken::where('manager_id',$manager_id)->first();
    }

    /**
     * 创建用户登录记录
     * @param array $data
     * @return bool
     */
    public function create(array $data)
    {
        return AccessToken::updateOrInsert(
            ['manager_id'=>$data['user_id'],'login_type'=>$data['login_type']],
            ['access_token'=>$data['access_token'],'login_time'=>time(),'login_ip'=>$data['login_id']]
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
