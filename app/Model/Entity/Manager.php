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
     * @Column(name="manager_name", prop="managerName")
     *
     * @var string
     */
    private $managerName;

    /**
     * 登录账号
     *
     * @Column(name="manager_mobile", prop="managerMobile")
     *
     * @var string
     */
    private $managerMobile;

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
     * @Column(name="login_state", prop="loginState")
     *
     * @var int
     */
    private $loginState;

    /**
     * 账号状态,1正常;2禁用
     *
     * @Column(name="login_status", prop="loginStatus")
     *
     * @var int
     */
    private $loginStatus;

    /**
     * 登录IP
     *
     * @Column(name="login_ip", prop="loginIp")
     *
     * @var string
     */
    private $loginIp;

    /**
     * 最后登录时间
     *
     * @Column(name="login_time", prop="loginTime")
     *
     * @var int
     */
    private $loginTime;

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
     * @param string $managerName
     *
     * @return self
     */
    public function setManagerName(string $managerName): self
    {
        $this->managerName = $managerName;

        return $this;
    }

    /**
     * @param string $managerMobile
     *
     * @return self
     */
    public function setManagerMobile(string $managerMobile): self
    {
        $this->managerMobile = $managerMobile;

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
     * @param int $loginState
     *
     * @return self
     */
    public function setLoginState(int $loginState): self
    {
        $this->loginState = $loginState;

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
    public function getManagerId(): ?int
    {
        return $this->managerId;
    }

    /**
     * @return string
     */
    public function getManagerName(): ?string
    {
        return $this->managerName;
    }

    /**
     * @return string
     */
    public function getManagerMobile(): ?string
    {
        return $this->managerMobile;
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
    public function getLoginState(): ?int
    {
        return $this->loginState;
    }

    /**
     * @return int
     */
    public function getLoginStatus(): ?int
    {
        return $this->loginStatus;
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
