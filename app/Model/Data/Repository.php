<?php
namespace App\Model\Data;
use Swoft\Redis\Redis;

/**
 * Class Repository
 * @package App\Model\Data
 */
class Repository
{
	protected $ttl = 10;
	protected $model;
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

	public function setModel($model)
	{
		$this->model = $model;
		return $this;
	}

	public function getModel()
	{
		return $this->model;
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

	public function findById($id)
	{
		return $this->remeber($this->getTag() . ":" . $id, function () use ($id) {
			return $this->getModel()::find($id);
		});
	}

	public function remeber($key,\Closure $entity)
	{
		$redis = Redis::connection("redis1.pool");
		$value = $redis->get($key);
		if (empty($value)) {
			$value = $entity();
			if (!empty($value)) {
				$redis->set($key, $value, $this->getTtl());
			}
		}
		return $value;
	}
}