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
     * @param array $arr - ассоциативный массива откуда нужно удалить элемент
     * @param array $keys - ключи, по которым нужно удалить элемент
     * @return array
     */
    public static function unsetElementByKey(array $arr, array $keys)
    {
        $res = [];

        // Перебираем ключи
        foreach ($keys as $key) {

            // Обнуляем результирующий массив на каждой итерации
            if (!empty($res)) {
                $res = [];
            }

            self::unsetElementRecursive($arr, $key, $res);

            // Присваеваем в ассоциативный массив откуда нужно удалить элемент результат каждой итерации
            if (is_array($res) && !empty($res)) {
                $arr = $res;
            }
        }

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

    /**
     * Получить элемент масива по указанной вложенности. Укажите x, вмето числового индекста, если не
     * хотите завязываться на конкретный числовой индекс
     * ArrayShifterHelper::getNestedElement($arr, 'cat.sub_cat_4.sub_sub_cat_3.0.token_1.sub_sub_sub_cat_1');
     *
     * @param array $arr
     * @param string $nested - вложенность формата "cat.sub_cat_4.sub_sub_cat_3.0.token_1.sub_sub_sub_cat_1"
     * @return array
     */
    public static function getNestedElement(array $arr, $nested)
    {
        $nest = explode('.', $nested);

        $res = [];
        self::nestedRecursive($arr, $nest, $res);

        return $res;
    }

    /**
     * Непосредственно сама рекурсия
     *
     * @author farZa
     * @param array $arr
     * @param string $nested
     * @param $res
     * @param int $lvl
     */
    private static function nestedRecursive(array $arr, $nested, &$res, $lvl = 0)
    {
        foreach ($arr as $k => $v) {

            if (
                !is_array($v) &&
                array_key_exists($lvl, $nested) &&
                $lvl === (count($nested) - 1) &&
                $nested[$lvl] === $k
            ) {
                $res[] = $v;
            } elseif (
                is_array($v) &&
                (
                    $k === $nested[$lvl] ||
                    ($nested[$lvl] === 'x' && is_numeric($k)) ||
                    (is_numeric($nested[$lvl]) && (int)$nested[$lvl] === $k)
                )
            ) {
                $lvl++;

                self::nestedRecursive($arr[$k], $nested, $res, $lvl);

                $lvl--;
            }
        }
    }


}