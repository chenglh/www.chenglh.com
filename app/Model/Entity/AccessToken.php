<?php declare(strict_types=1);


namespace App\Model\Entity;

use Swoft\Db\Annotation\Mapping\Column;
use Swoft\Db\Annotation\Mapping\Entity;
use Swoft\Db\Annotation\Mapping\Id;
use Swoft\Db\Eloquent\Model;


/**
 *
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
     * @Column()
     *
     * @var int
     */
    private $id;

    /**
     * 管理员ID
     *
     * @Column(name="manager_id", prop="managerId")
     *
     * @var int
     */
    private $managerId;

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
     * @Column(name="login_ip", prop="loginIp")
     *
     * @var string
     */
    private $loginIp;

    /**
     * 登录时间
     *
     * @Column(name="login_time", prop="loginTime")
     *
     * @var int
     */
    private $loginTime;

    /**
     * 终端类型，0-WAP;1-IOS;2-Android
     *
     * @Column(name="login_type", prop="loginType")
     *
     * @var int
     */
    private $loginType;


    /**
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param int $managerId
     *
     * @return self
     */
    public function setManagerId(int $managerId): self
    {
        $this->managerId = $managerId;

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
     * @param string $loginIp
     *
     * @return self
     */
    public function setLoginIp(string $loginIp): self
    {
        $this->loginIp = $loginIp;

        return $this;
    }

    /**
     * @param int $loginTime
     *
     * @return self
     */
    public function setLoginTime(int $loginTime): self
    {
        $this->loginTime = $loginTime;

        return $this;
    }

    /**
     * @param int $loginType
     *
     * @return self
     */
    public function setLoginType(int $loginType): self
    {
        $this->loginType = $loginType;

        return $this;
    }

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getManagerId(): ?int
    {
        return $this->managerId;
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
    public function getLoginIp(): ?string
    {
        return $this->loginIp;
    }

    /**
     * @return int
     */
    public function getLoginTime(): ?int
    {
        return $this->loginTime;
    }

    /**
     * @return int
     */
    public function getLoginType(): ?int
    {
        return $this->loginType;
    }

}
