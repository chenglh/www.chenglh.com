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
     * @Column(name="create_at", prop="createAt")
     *
     * @var string
     */
    private $createAt;

    /**
     * 更新时间
     *
     * @Column(name="update_at", prop="updateAt")
     *
     * @var string
     */
    private $updateAt;


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
     * @param string $createAt
     *
     * @return self
     */
    public function setCreateAt(string $createAt): self
    {
        $this->createAt = $createAt;

        return $this;
    }

    /**
     * @param string $updateAt
     *
     * @return self
     */
    public function setUpdateAt(string $updateAt): self
    {
        $this->updateAt = $updateAt;

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
    public function getCreateAt(): ?string
    {
        return $this->createAt;
    }

    /**
     * @return string
     */
    public function getUpdateAt(): ?string
    {
        return $this->updateAt;
    }

}
