<?php declare(strict_types=1);
namespace App\Constant;

/**
 * 自定义消息常量
 * @package App\Constant
 */
class Message
{
	/** 异常消息常量 */
	const ERR_LOGIN_TIME    = '5';
	const ERR_LOGIN_LIMIT   = '当前操作已经被锁';
	const ERR_NOTREGISTE    = '该用户未注册';
	const ERR_PASSWORD      = '账号或密码错误';
	const ERR_LOGINSTATE    = '该用户已注消';
	const ERR_AUTHORIZE     = '授权失败';

	/** 正常消息常量 */
}