<?php declare(strict_types = 1);
/**
 * 函数库
 * @Author：chenglh
 * @Time：2020-06-07
 */
use \Swoft\Redis\Redis;

/** 实现系统级别 */
/**
 * 获取错误验证次数
 */
function setErrorValiCount(string $key, int $expire = 60) {
	$keyM = md5('ErrorCountKey' . $key);
	return Redis::set($keyM, Redis::incr($keyM), $expire);
}

function getErrorValiCount($key): int {
	$keyM = md5('ErrorCountKey' . $key);
	return intval(Redis::get($keyM));
}

function rmErrorValiCount($key) {
	$keyM = md5('ErrorCountKey' . $key);
	return Redis::del($keyM);
}

/**
 * 判断手机号
 * @param $mobile
 * @return bool
 */
function isMobile($mobile): bool {
	$regular = "/^1([358][0-9]|4[579]|6[2567]|7[0-8]|9[89])[0-9]{8}$/";
	return  preg_match($regular, trim($mobile)) ? true : false;
}

/*
 * 获取随机串
 * @param int $length
 * @return string
 */
function getCode($length = 6): string {
	$string = '123456789123456789123456789';
	return substr(str_shuffle($string), 0, $length);
}

/**
 * 加密密码
 * @param mixed $password 原密码
 * @param mixed $salt_len 盐长度，默认4位
 * @return mixed
 */
function hashPassword($password, $salt_len = 4) {
	if (!$password) {
		$pwd_salt = '';
		$hashpwd  = '';
	} else {
		$pwd_salt = getRandomChar($salt_len);
		$hashpwd  = getHashPassword($password, $pwd_salt);
	}
	return ['password' => $hashpwd, 'pwd_salt' => $pwd_salt];
}

/**
 * 生成随机字符串
 * @param number $length
 * @return string
 */
function getRandomChar($length = 6):string {
	$chars = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z',
		'A','B','N','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z',
		'1','2','3','4','5','6','7','8','9','0'];
	$count = count($chars) - 1;
	$tmpChars = '';
	for ($i = 0; $i<$length; $i++){
		$tmpChars .= $chars[mt_rand(0, $count)];
	}
	return $tmpChars;
}

/**
 * 对密码进行HASH，加SALT
 * @param string $password 原密码
 * @param string $salt 盐
 * @return string 加密密码
 */
function getHashPassword($password, $salt):string {
	return md5($salt . md5($password));
}

/** 实现业务级别 */