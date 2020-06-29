<?php declare(strict_types=1);


namespace App\Model\Entity;

use Swoft\Db\Annotation\Mapping\Column;
use Swoft\Db\Annotation\Mapping\Entity;
use Swoft\Db\Annotation\Mapping\Id;
use Swoft\Db\Eloquent\Model;


/**
 * 管理员角色表
 * Class ManagerRole
 *
 * @since 2.0
 *
 * @Entity(table="manager_role")
 */
class ManagerRole extends Model
{
    /**
     * 自增ID
     * @Id()
     * @Column(name="role_id", prop="roleId")
     *
     * @var int
     */
    private $roleId;

    /**
     * 所属分组
     *
     * @Column(name="role_name", prop="roleName")
     *
     * @var string
     */
    private $roleName;

    /**
     * 角色菜单
     *
     * @Column(name="role_menu", prop="roleMenu")
     *
     * @var string
     */
    private $roleMenu;

    /**
     * 角色描述
     *
     * @Column(name="role_desc", prop="roleDesc")
     *
     * @var string
     */
    private $roleDesc;

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
     * @param string $roleName
     *
     * @return self
     */
    public function setRoleName(string $roleName): self
    {
        $this->roleName = $roleName;

        return $this;
    }

    /**
     * @param string $roleMenu
     *
     * @return self
     */
    public function setRoleMenu(string $roleMenu): self
    {
        $this->roleMenu = $roleMenu;

        return $this;
    }

    /**
     * @param string $roleDesc
     *
     * @return self
     */
    public function setRoleDesc(string $roleDesc): self
    {
        $this->roleDesc = $roleDesc;

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
    public function getRoleId(): ?int
    {
        return $this->roleId;
    }

    /**
     * @return string
     */
    public function getRoleName(): ?string
    {
        return $this->roleName;
    }

    /**
     * @return string
     */
    public function getRoleMenu(): ?string
    {
        return $this->roleMenu;
    }

    /**
     * @return string
     */
    public function getRoleDesc(): ?string
    {
        return $this->roleDesc;
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
