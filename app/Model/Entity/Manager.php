<?php declare(strict_types=1);


namespace App\Model\Entity;

use Swoft\Db\Annotation\Mapping\Column;
use Swoft\Db\Annotation\Mapping\Entity;
use Swoft\Db\Annotation\Mapping\Id;
use Swoft\Db\Eloquent\Model;


/**
 * 管理员表
 * Class Manager
 *
 * @since 2.0
 *
 * @Entity(table="manager")
 */
class Manager extends Model
{
    /**
     * 自增ID
     * @Id()
     * @Column(name="manager_id", prop="managerId")
     *
     * @var int
     */
    private $managerId;

    /**
     * 姓名
     *
     * @Column(name="user_name", prop="userName")
     *
     * @var string
     */
    private $userName;

    /**
     * 登录账号
     *
     * @Column()
     *
     * @var string
     */
    private $mobile;

    /**
     * 登录密码
     *
     * @Column(hidden=true)
     *
     * @var string
     */
    private $password;

    /**
     * 密码盐值
     *
     * @Column(name="password_salt", prop="passwordSalt")
     *
     * @var string
     */
    private $passwordSalt;

    /**
     * 所属分组
     *
     * @Column(name="role_id", prop="roleId")
     *
     * @var int
     */
    private $roleId;

    /**
     * 登录状态,0未登录,1登录
     *
     * @Column(name="is_login", prop="isLogin")
     *
     * @var int
     */
    private $isLogin;

    /**
     * 登录IP
     *
     * @Column(name="last_login_ip", prop="lastLoginIp")
     *
     * @var string
     */
    private $lastLoginIp;

    /**
     * 最后登录时间
     *
     * @Column(name="last_login_time", prop="lastLoginTime")
     *
     * @var int
     */
    private $lastLoginTime;

    /**
     * 状态,1正常;2禁用
     *
     * @Column(name="login_status", prop="loginStatus")
     *
     * @var int
     */
    private $loginStatus;

    /**
     * 创建时间
     *
     * @Column(name="create_time", prop="createTime")
     *
     * @var int
     */
    private $createTime;

    /**
     * 更新时间
     *
     * @Column(name="update_time", prop="updateTime")
     *
     * @var int
     */
    private $updateTime;


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
     * @param string $userName
     *
     * @return self
     */
    public function setUserName(string $userName): self
    {
        $this->userName = $userName;

        return $this;
    }

    /**
     * @param string $mobile
     *
     * @return self
     */
    public function setMobile(string $mobile): self
    {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * @param string $password
     *
     * @return self
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @param string $passwordSalt
     *
     * @return self
     */
    public function setPasswordSalt(string $passwordSalt): self
    {
        $this->passwordSalt = $passwordSalt;

        return $this;
    }

    /**
     * @param int $roleId
     *
     * @return self
     */
    public function setRoleId(int $roleId): self
    {
        $this->roleId = $roleId;

        return $this;
    }

    /**
     * @param int $isLogin
     *
     * @return self
     */
    public function setIsLogin(int $isLogin): self
    {
        $this->isLogin = $isLogin;

        return $this;
    }

    /**
     * @param string $lastLoginIp
     *
     * @return self
     */
    public function setLastLoginIp(string $lastLoginIp): self
    {
        $this->lastLoginIp = $lastLoginIp;

        return $this;
    }

    /**
     * @param int $lastLoginTime
     *
     * @return self
     */
    public function setLastLoginTime(int $lastLoginTime): self
    {
        $this->lastLoginTime = $lastLoginTime;

        return $this;
    }

    /**
     * @param int $loginStatus
     *
     * @return self
     */
    public function setLoginStatus(int $loginStatus): self
    {
        $this->loginStatus = $loginStatus;

        return $this;
    }

    /**
     * @param int $createTime
     *
     * @return self
     */
    public function setCreateTime(int $createTime): self
    {
        $this->createTime = $createTime;

        return $this;
    }

    /**
     * @param int $updateTime
     *
     * @return self
     */
    public function setUpdateTime(int $updateTime): self
    {
        $this->updateTime = $updateTime;

        return $this;
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
    public function getUserName(): ?string
    {
        return $this->userName;
    }

    /**
     * @return string
     */
    public function getMobile(): ?string
    {
        return $this->mobile;
    }

    /**
     * @return string
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getPasswordSalt(): ?string
    {
        return $this->passwordSalt;
    }

    /**
     * @return int
     */
    public function getRoleId(): ?int
    {
        return $this->roleId;
    }

    /**
     * @return int
     */
    public function getIsLogin(): ?int
    {
        return $this->isLogin;
    }

    /**
     * @return string
     */
    public function getLastLoginIp(): ?string
    {
        return $this->lastLoginIp;
    }

    /**
     * @return int
     */
    public function getLastLoginTime(): ?int
    {
        return $this->lastLoginTime;
    }

    /**
     * @return int
     */
    public function getLoginStatus(): ?int
    {
        return $this->loginStatus;
    }

    /**
     * @return int
     */
    public function getCreateTime(): ?int
    {
        return $this->createTime;
    }

    /**
     * @return int
     */
    public function getUpdateTime(): ?int
    {
        return $this->updateTime;
    }

}
