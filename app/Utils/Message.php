<?php
/**
 * +----------------------------------------------------------------------
 * | Date：2019-02-27 23:16:02
 * | Author: chenglh
 * +----------------------------------------------------------------------
 */
namespace App\Utils;

class Message
{
    const CODE_SUCCESS = 200;
    const CODE_ERROR = 201;

    public static function success($msg = 'success', $code = self::CODE_SUCCESS, $data = [])
    {
        return ['code' => $code, 'msg' => $msg, 'data' => $data];
    }

    public static function error($msg = 'error', $code = self::CODE_ERROR, $data = [])
    {
        return ['code' => $code, 'msg' => $msg, 'data' => $data];
    }
}
