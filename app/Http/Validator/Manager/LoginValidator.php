<?php declare(strict_types=1);
/**
 * 登录验证器
 * @Author：chenglh
 * @Time：2020-07-01
 */
namespace App\Http\Validator\Manager;

use Swoft\Validator\Annotation\Mapping\IsString;
use Swoft\Validator\Annotation\Mapping\Length;
use Swoft\Validator\Annotation\Mapping\Pattern;
use Swoft\Validator\Annotation\Mapping\Required;
use Swoft\Validator\Annotation\Mapping\Validator;

/**
 * Class LoginValidator
 * @Validator(name="login")
 */
class LoginValidator
{
    /**
     * @IsString(message="请正确填写手机号")
     * @Length(min=11,max=11,message="手机号码长度为11位数")
     * @Pattern(regex="/^1([358][0-9]|4[579]|6[25679]|7[0-8]|9[89])[0-9]{8}$/",message="手机号码不正确")
     * @Required()
     * @var string
     */
    protected $username = '';

    /**
     * @IsString(message="请输入登录密码")
     * @Length(min=6,max=12,message="账号密码码长度是6-12位")
     * @Required()
     */
    protected $password = '';
}
