<?php

/**
 * Класс помощник для теста
 *
 * @author farZa
 */
class ArrayHelperCases
{
    /**
     * Первй случай
     *
     * @author farZa
     * @var integer
     */
    const CASE_ONE = 0;

    /**
     * Второй случай
     *
     * @author farZa
     * @var integer
     */
    const CASE_TWO = 1;

    /**
     * Третий случай
     *
     * @author farZa
     * @var integer
     */
    const CASE_THREE = 2;

    /**
     * Четвертый случай
     *
     * @author farZa
     * @var integer
     */
    const CASE_FOUR = 3;

    /**
     * Пятый случай
     *
     * @author farZa
     * @var integer
     */
    const CASE_FIVE = 4;

    /**
     * Шестой случай
     *
     * @author farZa
     * @var integer
     */
    const CASE_SIX = 5;

    /**
     * Возвращает массив определенной структуры, для тестирования
     *
     * @author farZa
     * @param integer $const
     * @return array|mixed
     */
    public static function getArray($const)
    {
        switch ($const) {
            case self::CASE_ONE:
                return require __DIR__ . '/cases/CaseOne.php';
                break;

            case self::CASE_TWO:
                return require __DIR__ . '/cases/CaseTwo.php';
                break;

            case self::CASE_THREE:
                return require __DIR__ . '/cases/CaseThree.php';
                break;

            case self::CASE_FOUR:
                return require __DIR__ . '/cases/CaseFour.php';
                break;

            case self::CASE_FIVE:
                return require __DIR__ . '/cases/CaseFive.php';
                break;

            case self::CASE_SIX:
                return require __DIR__ . '/cases/CaseSix.php';
                break;
        }

        return [];
    }
}