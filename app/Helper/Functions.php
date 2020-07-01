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
function setErrorValiCount(string $key, int $expire = 60): bool {
	$keyM = md5('ErrorCountKey' . $key);
	return Redis::set($keyM, Redis::incr($keyM), $expire);
}

function getErrorValiCount(string $key): int {
	$keyM = md5('ErrorCountKey' . $key);
	return intval(Redis::get($keyM));
}

function rmErrorValiCount(string $key) {
	$keyM = md5('ErrorCountKey' . $key);
	return Redis::del($keyM);
}

/**
 * 判断手机号
 * @param $mobile
 * @return bool
 */
function isMobile(string $mobile): bool {
	$regular = "/^1([358][0-9]|4[579]|6[2567]|7[0-8]|9[89])[0-9]{8}$/";
	return  preg_match($regular, trim($mobile)) ? true : false;
}

/*
 * 数字随机串
 * @param int $length
 * @return string
 */
function getCode(int $length = 6): string {
	$string = '123456789123456789123456789';
	return substr(str_shuffle($string), 0, $length);
}

/**
 * 字符随机串
 * @param number $length
 * @return string
 */
function getRandomChar(int $length = 6) : string {
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
 * 加密密码
 * @param mixed $password 原密码
 * @param mixed $salt_len 盐长度，默认4位
 * @return mixed
 */
function hashPassword(string $password, int $salt_len = 4) : array {
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
 * 对密码进行HASH，加SALT
 * @param string $password 原密码
 * @param string $salt 盐
 * @return string 加密密码
 */
function getHashPassword(string $password, string $salt) : string {
	return md5($salt . md5($password));
}

/**
 * 用户ID加密函数
 * @param string $uid
 * @return string
 */
function uid_encryption(int $uid) : string {
    $startLen = 13;
    $endLen = 8;

    $coderes = '';
    $uidlen = strlen($uid);
    $codestr = $uid . \config('app.secret_salt');
    $encodestr = hash('md4', $codestr);
    $coderes = $uidlen . substr($encodestr, 5, $startLen - $uidlen) . $uid . substr($encodestr, - 12, $endLen);
    $coderes = strtoupper($coderes);
    return  $coderes;
}

/**
 * 用户ID解密函数
 * @param string $string
 * @return int
 */
function uid_decryption(string $string) : int {
    $startLen = 13;

    $coderes = '';
    $strlen = strlen($string);
    $uidlen = $string[0];
    $coderes = (int)substr($string, $startLen - $uidlen + 1, $uidlen);
    return $coderes;
}

/**
 * 缓存管理
 * @param $name
 * @param string $value
 * @param null $options
 * @return bool|int|mixed
 */
function cacheRemeber($name, $value = '', $options = null) {
    if ('' === $value) { // 获取缓存
        return Redis::get($name);
    } elseif (is_null($value)) { // 删除缓存
        return Redis::del($name);
    } else { // 缓存数据
        if(is_array($options)) {
            $expire = isset($options['expire']) ? $options['expire'] : NULL;
        }else{
            $expire = is_numeric($options) ? $options : NULL;
        }
        return Redis::set($name, $value, $expire);
    }
}

/**
 * 下划线转驼峰
 * step1.原字符串转小写,原字符串中的分隔符用空格替换,在字符串开头加上分隔符
 * step2.将字符串中每个单词的首字母转换为大写,再去空格,去字符串首部附加的分隔符.
 */
function camelize($uncamelized_words,$separator='_')
{
    $uncamelized_words = $separator. str_replace($separator, " ", strtolower($uncamelized_words));
    return ltrim(str_replace(" ", "", ucwords($uncamelized_words)), $separator );
}

/**
 * 驼峰命名转下划线命名
 * 小写和大写紧挨一起的地方,加上分隔符,然后全部转小写
 */
function uncamelize($camelCaps,$separator='_')
{
    return strtolower(preg_replace('/([a-z])([A-Z])/', "$1" . $separator . "$2", $camelCaps));
}

/** 实现业务级别 */

/**
 * 获取客户端IP
 * @return string
 */
function getRemoteAddr() : string {
	return Swoft\Context\Context::get()->getRequest()->server('remote_addr');
}

/**
 * 获取客户端IP段
 * @return string
 */
function getRemoteAddrPart() : string {
	$remote_addr = Swoft\Context\Context::get()->getRequest()->server('remote_addr');
	return substr($remote_addr, 0, -4);
}

/**
 * 验证姓名是否为百家姓
 * @param string $realname
 * @return bool
 */
function checkPrefixName(string $realname) : bool {
    $single = ['赵', '钱', '孙', '李', '周', '吴', '郑', '王', '冯', '陈', '楮', '卫', '蒋', '沈', '韩',
        '杨', '朱', '秦', '尤', '许', '何', '吕', '施', '张', '孔', '曹', '严', '华', '金', '魏', '陶',
        '姜', '戚', '谢', '邹', '喻', '柏', '水', '窦', '章', '云', '苏', '潘', '葛', '奚', '范', '彭',
        '郎', '鲁', '韦', '昌', '马', '苗', '凤', '花', '方', '俞', '任', '袁', '柳', '酆', '鲍', '史',
        '唐', '费', '廉', '岑', '薛', '雷', '贺', '倪', '汤', '滕', '殷', '罗', '毕', '郝', '邬', '安',
        '常', '乐', '于', '时', '傅', '皮', '卞', '齐', '康', '伍', '余', '元', '卜', '顾', '孟', '平',
        '黄', '和', '穆', '萧', '尹', '姚', '邵', '湛', '汪', '祁', '毛', '禹', '狄', '米', '贝', '明',
        '臧', '计', '伏', '成', '戴', '谈', '宋', '茅', '庞', '熊', '纪', '舒', '屈', '项', '祝', '董',
        '梁', '杜', '阮', '蓝', '闽', '席', '季', '麻', '强', '贾', '路', '娄', '危', '江', '童', '颜',
        '郭', '梅', '盛', '林', '刁', '锺', '徐', '丘', '骆', '高', '夏', '蔡', '田', '樊', '胡', '凌',
        '霍', '虞', '万', '支', '柯', '昝', '管', '卢', '莫', '经', '房', '裘', '缪', '干', '解', '应',
        '宗', '丁', '宣', '贲', '邓', '郁', '单', '杭', '洪', '包', '诸', '左', '石', '崔', '吉', '钮',
        '龚', '程', '嵇', '邢', '滑', '裴', '陆', '荣', '翁', '荀', '羊', '於', '惠', '甄', '麹', '家',
        '封', '芮', '羿', '储', '靳', '汲', '邴', '糜', '松', '井', '段', '富', '巫', '乌', '焦', '巴',
        '弓', '牧', '隗', '山', '谷', '车', '侯', '宓', '蓬', '全', '郗', '班', '仰', '秋', '仲', '伊',
        '宫', '宁', '仇', '栾', '暴', '甘', '斜', '厉', '戎', '祖', '武', '符', '刘', '景', '詹', '束',
        '龙', '叶', '幸', '司', '韶', '郜', '黎', '蓟', '薄', '印', '宿', '白', '怀', '蒲', '邰', '从',
        '鄂', '索', '咸', '籍', '赖', '卓', '蔺', '屠', '蒙', '池', '乔', '阴', '郁', '胥', '能', '苍',
        '双', '闻', '莘', '党', '翟', '谭', '贡', '劳', '逄', '姬', '申', '扶', '堵', '冉', '宰', '郦',
        '雍', '郤', '璩', '桑', '桂', '濮', '牛', '寿', '通', '边', '扈', '燕', '冀', '郏', '浦', '尚',
        '农', '温', '别', '庄', '晏', '柴', '瞿', '阎', '充', '慕', '连', '茹', '习', '宦', '艾', '鱼',
        '容', '向', '古', '易', '慎', '戈', '廖', '庾', '终', '暨', '居', '衡', '步', '都', '耿', '满',
        '弘', '匡', '国', '文', '寇', '广', '禄', '阙', '东', '欧', '殳', '沃', '利', '蔚', '越', '夔',
        '隆', '师', '巩', '厍', '聂', '晁', '勾', '敖', '融', '冷', '訾', '辛', '阚', '那', '简', '饶',
        '空', '曾', '毋', '沙', '乜', '养', '鞠', '须', '丰', '巢', '关', '蒯', '相', '查', '后', '荆',
        '红', '游', '竺', '权', '逑', '盖', '益', '桓', '公', '仉', '督', '晋', '楚', '阎', '法', '汝',
        '鄢', '涂', '钦', '岳', '帅', '缑', '亢', '况', '后', '有', '琴', '归', '海', '墨', '哈', '谯',
        '笪', '年', '爱', '阳', '佟', '商', '牟', '佘', '佴', '伯', '赏', '钟'];
    $double = ["万俟", "司马", "上官", "欧阳", "夏侯", "诸葛", "闻人", "东方", "赫连", "皇甫", "尉迟",
        "公羊", "澹台", "公冶", "宗政", "濮阳", "淳于", "单于", "太叔", "申屠", "公孙", "仲孙", "轩辕",
        "令狐", "锺离", "宇文", "长孙", "慕容", "鲜于", "闾丘", "司徒", "司空", "丌官", "司寇", "子车",
        "微生", "颛孙", "端木", "巫马", "公西", "漆雕", "乐正", "壤驷", "公良", "拓拔", "夹谷", "宰父",
        "谷梁", "段干", "百里", "东郭", "南门", "呼延", "羊舌", "梁丘", "左丘", "东门", "西门", "南宫"];
    if(in_array(mb_substr($realname, 0,1), $single) || in_array(mb_substr($realname, 0,2), $double)){
        return true;
    } else {
        return false;
    }
}

/**
 * IP地址解析
 * @param string $ip
 * @return array
 */
function getRemoteAddrInfo(string $ip) : array {
    $remote_addr = substr($ip, 0, -4);
    $redisCache = json_decode(cacheRemeber($remote_addr));
    if (empty($redisCache)) {
        $province = $city = '';

        /** 方法一,太平洋 */
 		$apiUrl = sprintf('http://whois.pconline.com.cn/ipJson.jsp?ip=%s', $ip);
 		$ipInfo = file_get_contents($apiUrl);
 		$ipInfo = iconv("gb2312", "utf-8//IGNORE", $ipInfo);

 		preg_match_all("/\(\{(.*)\}\)/i", $ipInfo, $match);
 		$ipInfo = str_replace(['(',')'], '', $match[0][0]);
 		$ipInfo = json_decode($ipInfo);
        $city = $ipInfo->city;
        $province = $ipInfo->pro;

        /** 方法二,126 */
        if (empty($city) && empty($province)) {
            $ipInfo = httpGet('http://ip.ws.126.net/ipquery?ip=' . $ip);
            $ipInfo = iconv("gb2312", "utf-8//IGNORE",$ipInfo);
            $ipInfo = str_replace('city', '"city"', $ipInfo);
            $ipInfo = str_replace('province', '"province"', $ipInfo);

            preg_match_all("/(?:\{)(.*)(?:\})/i", $ipInfo, $match);
            $ipInfo = $match[0][0];
            $ipInfo = json_decode($ipInfo);
            if ($ipInfo->city && $ipInfo->province) {
                $city = $ipInfo->city;
                $province = $ipInfo->province;
            }
        }

        /** 方法3,国际免费 */
        if (empty($city) && empty($province)) {
            $apiUrl = sprintf('http://ip-api.com/json/%s?lang=zh-CN', $ip);
            $ipInfo = file_get_contents($apiUrl);
            $ipInfo = json_decode($ipInfo);
            if ($ipInfo->status == 'success') {
                $city = $ipInfo->city;
                $province = $ipInfo->regionName;
            }
        }

        $redisCache = [
            $city ? str_replace('市', '', $city) : '',
            $province ? str_replace(['省','壮族','回族','自治区'], '', $province) : '未知',
        ];
        cacheRemeber($remote_addr, json_encode($redisCache), 3600);
    }
    return $redisCache;
}

