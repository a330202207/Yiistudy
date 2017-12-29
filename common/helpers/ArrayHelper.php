<?php

namespace common\helpers;

class ArrayHelper extends \yii\helpers\ArrayHelper
{
    /*
     * @a array, @b array
     * 递归，合并数组，如果下标存在 '_unmerge'，则后面覆盖前面数据
     */
    public static function merge($a, $b)
    {
        $args = func_get_args();
        $res = array_shift($args);
        while (!empty($args)) {
            $next = array_shift($args);
            foreach ($next as $k => $v) {
                if (is_int($k)) {
                    if (isset($res[$k])) {
                        $res[] = $v;
                    } else {
                        $res[$k] = $v;
                    }
                } elseif (is_array($v) && isset($res[$k]) && is_array($res[$k])) {
                    $res[$k] = (strrpos($k, '_unmerge') !== false) ? $v : self::merge($res[$k], $v);
                } else {
                    $res[$k] = $v;
                }
            }
        }

        return $res;
    }

    /*
     * @arr array, @key string
     * 递归，查找下标出现$key的元素，移动到最前面
     */
    public static function sort($arr, $key)
    {
        $res = [];
        foreach ($arr as $k => $v) {
            if (is_array($v)) {
                //递归
                $v = self::sort($v, $key);
            }
            if (is_int($k)) {
                array_push($res, $v);
            } elseif (strrpos($k, $key) !== false) {
                //如果$k带有$key，则从最前面插入数组
                array_unshift($res, $v);
            } else {
                $res[$k] = $v;
            }
        }
        return $res;
    }
}