<?php declare(strict_types=1);
/**
 * 数据缓存层
 * @Author：chenglh
 * @Time：2020-06-23
 */
namespace App\Model\Data;

use Swoft\Bean\Annotation\Mapping\Inject;

class Repository
{
    protected $ttl = 10;

    protected $model;
    protected $tag;

	/**
	 * @Inject("redis1.pool")
	 * @var Redis
	 */
	protected $redis1;

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
		$value = $this->redis1->get($key);
		if (empty($value)) {
			$value = $entity();
			if (!empty($value)) {
				$this->redis1->set($key, $value, $this->getTtl());
			}
		}
		return $value;
	}
}
