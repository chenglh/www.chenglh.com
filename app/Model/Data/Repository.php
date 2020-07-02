<?php declare(strict_types=1);
namespace App\Model\Data;
use Swoft\Redis\Redis;

/**
 * Class Repository
 * @package App\Model\Data
 */
class Repository
{
    /**
     * @var int 缓存时长(单位：秒)
     */
	protected $ttl = 60;

    /**
     * @var string 缓存key
     */
	protected $tag;

	public function getTtl()
	{
		return $this->ttl;
	}

	public function setTtl($time)
	{
		$this->ttl = $time;
		return $this;
	}

	public function setTag($tag)
	{
		$this->tag = $tag;
		return $this;
	}

	public function getTag()
	{
		return $this->tag;
	}

	public function remeber($key, \Closure $function)
	{
		$redis = Redis::connection("redis1.pool");
		$value = $redis->get($key);
		if (empty($value)) {
            $value = json_encode($function());
			if (!empty($value)) {
				$redis->set($key, $value, $this->getTtl());
			}
		}

		return json_decode($value,true);
	}
}
