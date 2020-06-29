<?php declare(strict_types=1);


namespace App\Model\Entity;

use Swoft\Db\Annotation\Mapping\Column;
use Swoft\Db\Annotation\Mapping\Entity;
use Swoft\Db\Annotation\Mapping\Id;
use Swoft\Db\Eloquent\Model;


/**
 * 会员表
 * Class User
 *
 * @since 2.0
 *
 * @Entity(table="user")
 */
class User extends Model
{
    /**
     * 会员ID
     * @Id()
     * @Column(name="user_id", prop="userId")
     *
     * @var int
     */
    private $userId;

    /**
     * 会员昵称
     *
     * @Column(name="user_nickname", prop="userNickname")
     *
     * @var string
     */
    private $userNickname;

    /**
     * 会员头像
     *
     * @Column(name="user_headimg", prop="userHeadimg")
     *
     * @var string
     */
    private $userHeadimg;

    /**
     * 注册手机
     *
     * @Column(name="user_mobile", prop="userMobile")
     *
     * @var string
     */
    private $userMobile;

    /**
     * 登录IP
     *
     * @Column(name="user_login_ip", prop="userLoginIp")
     *
     * @var string
     */
    private $userLoginIp;

    /**
     * 登录时间
     *
     * @Column(name="user_login_time", prop="userLoginTime")
     *
     * @var int
     */
    private $userLoginTime;

    /**
     * 推广码
     *
     * @Column(name="user_qr_code", prop="userQrCode")
     *
     * @var string
     */
    private $userQrCode;

    /**
     * 注册来源,0-WAP，1-Android，2-IOS
     *
     * @Column(name="user_regfrom", prop="userRegfrom")
     *
     * @var int
     */
    private $userRegfrom;

    /**
     * 渠道来源
     *
     * @Column(name="user_regchannel", prop="userRegchannel")
     *
     * @var string
     */
    private $userRegchannel;

    /**
     * 会员状态，0-正常;1-禁用
     *
     * @Column(name="user_state", prop="userState")
     *
     * @var int
     */
    private $userState;

    /**
     * 用户余额
     *
     * @Column(name="user_black", prop="userBlack")
     *
     * @var int
     */
    private $userBlack;

    /**
     * 创建时间
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
     * @param int $userId
     *
     * @return self
     */
    public function setUserId(int $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @param string $userNickname
     *
     * @return self
     */
    public function setUserNickname(string $userNickname): self
    {
        $this->userNickname = $userNickname;

        return $this;
    }

    /**
     * @param string $userHeadimg
     *
     * @return self
     */
    public function setUserHeadimg(string $userHeadimg): self
    {
        $this->userHeadimg = $userHeadimg;

        return $this;
    }

    /**
     * @param string $userMobile
     *
     * @return self
     */
    public function setUserMobile(string $userMobile): self
    {
        $this->userMobile = $userMobile;

        return $this;
    }

    /**
     * @param string $userLoginIp
     *
     * @return self
     */
    public function setUserLoginIp(string $userLoginIp): self
    {
        $this->userLoginIp = $userLoginIp;

        return $this;
    }

    /**
     * @param int $userLoginTime
     *
     * @return self
     */
    public function setUserLoginTime(int $userLoginTime): self
    {
        $this->userLoginTime = $userLoginTime;

        return $this;
    }

    /**
     * @param string $userQrCode
     *
     * @return self
     */
    public function setUserQrCode(string $userQrCode): self
    {
        $this->userQrCode = $userQrCode;

        return $this;
    }

    /**
     * @param int $userRegfrom
     *
     * @return self
     */
    public function setUserRegfrom(int $userRegfrom): self
    {
        $this->userRegfrom = $userRegfrom;

        return $this;
    }

    /**
     * @param string $userRegchannel
     *
     * @return self
     */
    public function setUserRegchannel(string $userRegchannel): self
    {
        $this->userRegchannel = $userRegchannel;

        return $this;
    }

    /**
     * @param int $userState
     *
     * @return self
     */
    public function setUserState(int $userState): self
    {
        $this->userState = $userState;

        return $this;
    }

    /**
     * @param int $userBlack
     *
     * @return self
     */
    public function setUserBlack(int $userBlack): self
    {
        $this->userBlack = $userBlack;

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
    public function getUserId(): ?int
    {
        return $this->userId;
    }

    /**
     * @return string
     */
    public function getUserNickname(): ?string
    {
        return $this->userNickname;
    }

    /**
     * @return string
     */
    public function getUserHeadimg(): ?string
    {
        return $this->userHeadimg;
    }

    /**
     * @return string
     */
    public function getUserMobile(): ?string
    {
        return $this->userMobile;
    }

    /**
     * @return string
     */
    public function getUserLoginIp(): ?string
    {
        return $this->userLoginIp;
    }

    /**
     * @return int
     */
    public function getUserLoginTime(): ?int
    {
        return $this->userLoginTime;
    }

    /**
     * @return string
     */
    public function getUserQrCode(): ?string
    {
        return $this->userQrCode;
    }

    /**
     * @return int
     */
    public function getUserRegfrom(): ?int
    {
        return $this->userRegfrom;
    }

    /**
     * @return string
     */
    public function getUserRegchannel(): ?string
    {
        return $this->userRegchannel;
    }

    /**
     * @return int
     */
    public function getUserState(): ?int
    {
        return $this->userState;
    }

    /**
     * @return int
     */
    public function getUserBlack(): ?int
    {
        return $this->userBlack;
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
