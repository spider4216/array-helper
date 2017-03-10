<?php

/**
 * Класс помощник для работы с массивом
 *
 * @author farZa
 */
class ArrayHelper
{
    /**
     * Метод, который рекурсивно проходится по переданному массиву и убирает
     * все target смещая узлы
     *
     * @author farZa
     * @param array $arr
     * @param string $target - что сместить
     * @return array
     */
    public static function process(array $arr, $target)
    {
        $res = [];
        self::recursive($arr, $res, $target);

        return $res;
    }

    /**
     * Непосредственно сама рекурсия
     *
     * @author farZa
     * @param array $arr
     * @param $target - что сместить
     * @param $res
     */
    private static function recursive($arr, &$res, $target)
    {
        foreach ($arr as $k => $v) {
            if (is_string($v)) {
                $res[$k] = $v;
            }

            if (is_array($v)) {

                if ($k === $target) {
                    $res = $v;
                    self::recursive($arr[$k], $res, $target);

                    continue;
                }

                self::recursive($arr[$k], $res[$k], $target);
            }
        }
    }

    /**
     * Метод который рекурсивно проходится по переданному массиву и удаляет элемент массива
     * по ключу
     *
     * @author farZa
     * @param array $arr - ассоциативный массива откуда нужно удалить элемент
     * @param string $key - ключ, по которому нужно удалить элемент
     * @return array
     */
    public static function unsetElementByKey(array $arr, $key)
    {
        $res = [];

        self::unsetElementRecursive($arr, $key, $res);

        return $res;
    }

    /**
     * Непосредственно сама рекурсия для метода self::unsetElementByKey()
     *
     * @author farZa
     * @param array $arr
     * @param string $key
     * @param $res
     */
    private static function unsetElementRecursive(array $arr, $key, &$res)
    {
        foreach ($arr as $k => $v) {
            if (is_string($v)) {

                if ($k !== $key) {
                    $res[$k] = $v;
                }
            }

            if (is_array($v)) {
                self::unsetElementRecursive($arr[$k], $key, $res[$k]);
            }
        }
    }


}