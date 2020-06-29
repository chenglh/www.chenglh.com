<?php declare(strict_types=1);


namespace App\Model\Entity;

use Swoft\Db\Annotation\Mapping\Column;
use Swoft\Db\Annotation\Mapping\Entity;
use Swoft\Db\Annotation\Mapping\Id;
use Swoft\Db\Eloquent\Model;


/**
 * 管理员Token表
 * Class AccessToken
 *
 * @since 2.0
 *
 * @Entity(table="access_token")
 */
class AccessToken extends Model
{
    /**
     * 自增ID
     * @Id()
     * @Column(name="access_id", prop="accessId")
     *
     * @var int
     */
    private $accessId;

    /**
     * 管理员ID
     *
     * @Column(name="access_mid", prop="accessMid")
     *
     * @var int
     */
    private $accessMid;

    /**
     * Token值
     *
     * @Column(name="access_token", prop="accessToken")
     *
     * @var string
     */
    private $accessToken;

    /**
     * 登录IP
     *
     * @Column(name="access_login_ip", prop="accessLoginIp")
     *
     * @var string
     */
    private $accessLoginIp;

    /**
     * 终端类型，0-WAP;1-IOS;2-Android
     *
     * @Column(name="access_login_type", prop="accessLoginType")
     *
     * @var int
     */
    private $accessLoginType;

    /**
     * 登录时间
     *
     * @Column(name="created_at", prop="createdAt")
     *
     * @var string
     */
    private $createdAt;

    /**
     * 更新时间
     *
     * @Column(name="updated_at", prop="updatedAt")
     *
     * @var string
     */
    private $updatedAt;


    /**
     * @param int $accessId
     *
     * @return self
     */
    public function setAccessId(int $accessId): self
    {
        $this->accessId = $accessId;

        return $this;
    }

    /**
     * @param int $accessMid
     *
     * @return self
     */
    public function setAccessMid(int $accessMid): self
    {
        $this->accessMid = $accessMid;

        return $this;
    }

    /**
     * @param string $accessToken
     *
     * @return self
     */
    public function setAccessToken(string $accessToken): self
    {
        $this->accessToken = $accessToken;

        return $this;
    }

    /**
     * @param string $accessLoginIp
     *
     * @return self
     */
    public function setAccessLoginIp(string $accessLoginIp): self
    {
        $this->accessLoginIp = $accessLoginIp;

        return $this;
    }

    /**
     * @param int $accessLoginType
     *
     * @return self
     */
    public function setAccessLoginType(int $accessLoginType): self
    {
        $this->accessLoginType = $accessLoginType;

        return $this;
    }

    /**
     * @param string $createdAt
     *
     * @return self
     */
    public function setCreatedAt(string $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @param string $updatedAt
     *
     * @return self
     */
    public function setUpdatedAt(string $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return int
     */
    public function getAccessId(): ?int
    {
        return $this->accessId;
    }

    /**
     * @return int
     */
    public function getAccessMid(): ?int
    {
        return $this->accessMid;
    }

    /**
     * @return string
     */
    public function getAccessToken(): ?string
    {
        return $this->accessToken;
    }

    /**
     * @return string
     */
    public function getAccessLoginIp(): ?string
    {
        return $this->accessLoginIp;
    }

    /**
     * @return int
     */
    public function getAccessLoginType(): ?int
    {
        return $this->accessLoginType;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * @return string
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

}
