<?php
class Helper_Util {
    public static function get_uuid() {
        return md5(uniqid(mt_rand(), true));
    }

    static function uuid($prefix = '') {
        $chars = md5(uniqid(rand()));
        $uuid = substr($chars, 0, 8);
        $uuid .= substr($chars, 8, 4);
        $uuid .= substr($chars, 12, 4);
        $uuid .= substr($chars, 16, 4);
        $uuid .= substr($chars, 20, 12);
        return $prefix . $uuid;
    }
    /**
     * 比较输入的日期和当前日期的比较
     *
     * 大于当前日期返回1，小于等于返回0
     */
    static function date_cmp($date) {
        $date = explode('-', $date);
        list($y, $m, $d) = $date;
        $input = mktime(0, 0, 0, $m, $d, $y);
        $now = time();
        return $input > $now;
    }
    /**
     * @desc 全角字符与成半角字符的相互转换
     * @param $string
     * @param $flag 0=全角到半角,1=半角到全角
     */
    static function sbc2dbc($string, $flag = 0) {
        //全角
        $SBC = array('０', '１', '２', '３', '４',
            '５', '６', '７', '８', '９',
            'Ａ', 'Ｂ', 'Ｃ', 'Ｄ', 'Ｅ',
            'Ｆ', 'Ｇ', 'Ｈ', 'Ｉ', 'Ｊ',
            'Ｋ', 'Ｌ', 'Ｍ', 'Ｎ', 'Ｏ',
            'Ｐ', 'Ｑ', 'Ｒ', 'Ｓ', 'Ｔ',
            'Ｕ', 'Ｖ', 'Ｗ', 'Ｘ', 'Ｙ',
            'Ｚ', 'ａ', 'ｂ', 'ｃ', 'ｄ',
            'ｅ', 'ｆ', 'ｇ', 'ｈ', 'ｉ',
            'ｊ', 'ｋ', 'ｌ', 'ｍ', 'ｎ',
            'ｏ', 'ｐ', 'ｑ', 'ｒ', 'ｓ',
            'ｔ', 'ｕ', 'ｖ', 'ｗ', 'ｘ',
            'ｙ', 'ｚ', '－', '　', '：',
            '．', '，', '／', '％', '＃',
            '！', '＠', '＆', '（', '）',
            '＜', '＞', '＂', '＇', '？',
            '［', '］', '｛', '｝', '＼',
            '｜', '＋', '＝', '＿', '＾',
            '￥', '￣', '｀');
        //半角
        $DBC = array('0', '1', '2', '3', '4',
            '5', '6', '7', '8', '9',
            'A', 'B', 'C', 'D', 'E',
            'F', 'G', 'H', 'I', 'J',
            'K', 'L', 'M', 'N', 'O',
            'P', 'Q', 'R', 'S', 'T',
            'U', 'V', 'W', 'X', 'Y',
            'Z', 'a', 'b', 'c', 'd',
            'e', 'f', 'g', 'h', 'i',
            'j', 'k', 'l', 'm', 'n',
            'o', 'p', 'q', 'r', 's',
            't', 'u', 'v', 'w', 'x',
            'y', 'z', '-', ' ', ':',
            '.', ',', '/', '%', '#',
            '!', '@', '&', '(', ')',
            '<', '>', '"', '\'', '?',
            '[', ']', '{', '}', '\\',
            '|', '+', '=', '_', '^',
            '￥', '~', '`');
        //半角到全角
        if ($flag == 1) {
            return str_replace($DBC, $SBC, $string);
        } else {
            //全角到半角
            return str_replace($SBC, $DBC, $string);
        }
    }
    /*
     * 去掉slassh
     */
    static function sstripslashes($string) {
        if (is_array($string)) {
            foreach ($string as $key => $val) {
                $string[$key] = sstripslashes($val);
            }
        } else {
            $string = stripslashes($string);
        }
        return $string;
    }
    static function isemail($email) {
        return strlen($email) > 8 && preg_match("/^[-_+.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+([a-z]{2,4})|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i", $email);
    }
    /**
     * 取消HTML代码
     */
    static function shtmlspecialchars($string) {
        if (is_array($string)) {
            foreach ($string as $key => $val) {
                $string[$key] = shtmlspecialchars($val);
            }
        } else {
            $string = preg_replace('/&amp;((#(\d{3,5}|x[a-fA-F0-9]{4})|[a-zA-Z][a-z0-9]{2,5});)/', '&\\1',
                str_replace(array('&', '"', '<', '>'), array('&amp;', '&quot;', '&lt;', '&gt;'), $string));
        }
        return $string;
    }
    static function formhash() {
        $CI = &get_instance();
        $hashadd = defined('IN_ADMINCP') ? 'Only For XiKang AdminCP' : '';
        $formhash = substr(md5(substr(SITE_TIME, 0, -7) . '|' . $CI->user->mid . '|' . md5($CI->config->item('site_key')) . '|' . $hashadd), 8, 8);
        return $formhash;
    }
    static function isbadword($string) {
        //只允许汉字，大小写字母，数字作为用户名
        return !preg_match("/^[\x{4e00}-\x{9fa5}|a-z|A-Z|0-9]+$/u", $string);
    }
    /*
     *计算字符串长度,1个中文字符长度为1，1个英文字符串长度为0.5
     */
    static function cnstrlen($str) {
        $i = 0;
        $count = 0;
        $len = strlen($str);
        while ($i < $len) {
            $chr = ord($str[$i]);
            if ($chr > 127) {
                $count++;
            } else {
                $count += 0.5;
            }
            $i++;
            if ($i >= $len) {
                break;
            }
            if ($chr & 0x80) {
                $chr <<= 1;
                while ($chr & 0x80) {
                    $i++;
                    $chr <<= 1;
                }
            }
        }
        return $count;
    }
    /**
     * 计算2的n次方
     */
    static function twoncifang($n) {
        $res = pow(2, $n);
        $res = $res / 1024 / 1024 / 1024;
        return $res;
    }
    /**
     * 生成随机码
     */
    static function randomkeys($length) {
        //$pattern = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLOMNOPQRSTUVWXYZ'; //字符池
        $pattern = '3456789abcdefghijkmnpqrstuvwxyABCDEFGHJKLOMNPQRSTUVWXY';
        $key = '';
        for ($i = 0; $i < $length; $i++) {
            $key .= $pattern{mt_rand(0, strlen($pattern))}; //生成php随机数
        }
        return $key;
    }
    /**
     * 比较好用字符串截取函数
     */
    static function substring($str, $start, $length) {
        $len = $length;
        if ($length < 0) {
            $str = strrev($str);
            $len = -$length;
        }
        $len = ($len < strlen($str)) ? $len : strlen($str);
        for ($i = $start; $i < $len; $i++) {
            if (ord(substr($str, $i, 1)) > 0xa0) {
                $tmpstr .= substr($str, $i, 2);
                $i++;
            } else {
                $tmpstr .= substr($str, $i, 1);
            }
        }
        if ($length < 0) {
            $tmpstr = strrev($tmpstr);
        }

        return $tmpstr;
    }
}
