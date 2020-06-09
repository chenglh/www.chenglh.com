<?php declare(strict_types=1);


namespace App\Model\Entity;

use Swoft\Db\Annotation\Mapping\Column;
use Swoft\Db\Annotation\Mapping\Entity;
use Swoft\Db\Annotation\Mapping\Id;
use Swoft\Db\Eloquent\Model;


/**
 * 后台菜单管理
 * Class ManagerMenu
 *
 * @since 2.0
 *
 * @Entity(table="manager_menu")
 */
class ManagerMenu extends Model
{
    /**
     * 
     * @Id()
     * @Column(name="menu_id", prop="menuId")
     *
     * @var int
     */
    private $menuId;

    /**
     * 菜单标题
     *
     * @Column(name="menu_title", prop="menuTitle")
     *
     * @var string
     */
    private $menuTitle;

    /**
     * PID,0是顶级
     *
     * @Column(name="menu_pid", prop="menuPid")
     *
     * @var int
     */
    private $menuPid;

    /**
     * 排序
     *
     * @Column(name="menu_sort", prop="menuSort")
     *
     * @var int
     */
    private $menuSort;

    /**
     * 链接
     *
     * @Column(name="menu_url", prop="menuUrl")
     *
     * @var string
     */
    private $menuUrl;

    /**
     * 是否显示,0显示,1隐藏
     *
     * @Column(name="menu_hide", prop="menuHide")
     *
     * @var int
     */
    private $menuHide;

    /**
     * 所属组
     *
     * @Column(name="menu_group", prop="menuGroup")
     *
     * @var string|null
     */
    private $menuGroup;

    /**
     * 图标
     *
     * @Column(name="menu_icon", prop="menuIcon")
     *
     * @var string|null
     */
    private $menuIcon;


    /**
     * @param int $menuId
     *
     * @return self
     */
    public function setMenuId(int $menuId): self
    {
        $this->menuId = $menuId;

        return $this;
    }

    /**
     * @param string $menuTitle
     *
     * @return self
     */
    public function setMenuTitle(string $menuTitle): self
    {
        $this->menuTitle = $menuTitle;

        return $this;
    }

    /**
     * @param int $menuPid
     *
     * @return self
     */
    public function setMenuPid(int $menuPid): self
    {
        $this->menuPid = $menuPid;

        return $this;
    }

    /**
     * @param int $menuSort
     *
     * @return self
     */
    public function setMenuSort(int $menuSort): self
    {
        $this->menuSort = $menuSort;

        return $this;
    }

    /**
     * @param string $menuUrl
     *
     * @return self
     */
    public function setMenuUrl(string $menuUrl): self
    {
        $this->menuUrl = $menuUrl;

        return $this;
    }

    /**
     * @param int $menuHide
     *
     * @return self
     */
    public function setMenuHide(int $menuHide): self
    {
        $this->menuHide = $menuHide;

        return $this;
    }

    /**
     * @param string|null $menuGroup
     *
     * @return self
     */
    public function setMenuGroup(?string $menuGroup): self
    {
        $this->menuGroup = $menuGroup;

        return $this;
    }

    /**
     * @param string|null $menuIcon
     *
     * @return self
     */
    public function setMenuIcon(?string $menuIcon): self
    {
        $this->menuIcon = $menuIcon;

        return $this;
    }

    /**
     * @return int
     */
    public function getMenuId(): ?int
    {
        return $this->menuId;
    }

    /**
     * @return string
     */
    public function getMenuTitle(): ?string
    {
        return $this->menuTitle;
    }

    /**
     * @return int
     */
    public function getMenuPid(): ?int
    {
        return $this->menuPid;
    }

    /**
     * @return int
     */
    public function getMenuSort(): ?int
    {
        return $this->menuSort;
    }

    /**
     * @return string
     */
    public function getMenuUrl(): ?string
    {
        return $this->menuUrl;
    }

    /**
     * @return int
     */
    public function getMenuHide(): ?int
    {
        return $this->menuHide;
    }

    /**
     * @return string|null
     */
    public function getMenuGroup(): ?string
    {
        return $this->menuGroup;
    }

    /**
     * @return string|null
     */
    public function getMenuIcon(): ?string
    {
        return $this->menuIcon;
    }

}
