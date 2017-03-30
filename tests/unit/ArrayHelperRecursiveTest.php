<?php

require __DIR__ . '/../../ArrayHelper.php';
require __DIR__ . '/ArrayHelperCases.php';

class ArrayHelperRecursiveTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
    }

    protected function tearDown()
    {
    }

    /**
     * Тест на смещение token_1 и удаление sub_sub_sub_cat_1 в случае номер 1
     *
     * @author farZa
     */
    public function testCaseOne()
    {
        $arr = ArrayHelperCases::getArray(ArrayHelperCases::CASE_ONE);

        // Есть ли token_1
        $this->assertArrayHasKey('token_1', $arr['cat']['sub_cat_4']['sub_sub_cat_3']);

        // Смещаем
        $resWithoutItem = ArrayHelper::process($arr, 'token_1');

        // Проверяем, что token_1 исчез
        $this->assertArrayNotHasKey('token_1', $resWithoutItem['cat']['sub_cat_4']['sub_sub_cat_3']);
        // Проверяем, что sub_sub_sub_cat_1 существует
        $this->assertArrayHasKey('sub_sub_sub_cat_1', $resWithoutItem['cat']['sub_cat_4']['sub_sub_cat_3']);

        // Удаляем sub_sub_sub_cat_1
        $resWithoutCmId = ArrayHelper::unsetElementByKey($resWithoutItem, 'sub_sub_sub_cat_1');

        // Проверяем, что sub_sub_sub_cat_1 был удален
        $this->assertArrayNotHasKey('sub_sub_sub_cat_1', $resWithoutCmId['cat']['sub_cat_4']['sub_sub_cat_3']);
    }

    /**
     * Тест на смещение token_1 и удаление sub_sub_sub_cat_2 в случае номер 2
     *
     * @author farZa
     */
    public function testCaseTwo()
    {
        $arr = ArrayHelperCases::getArray(ArrayHelperCases::CASE_TWO);

        // Есть ли token_1
        $this->assertArrayHasKey('token_1', $arr['cat']['sub_cat_4']['sub_sub_cat_3']['0']);
        $this->assertArrayHasKey('token_1', $arr['cat']['sub_cat_4']['sub_sub_cat_3']['1']);

        // Смещаем
        $resWithoutItem = ArrayHelper::process($arr, 'token_1');

        // Проверяем, что token_1 исчез
        $this->assertArrayNotHasKey('token_1', $resWithoutItem['cat']['sub_cat_4']['sub_sub_cat_3']['0']);
        $this->assertArrayNotHasKey('token_1', $resWithoutItem['cat']['sub_cat_4']['sub_sub_cat_3']['1']);

        // Проверяем, что sub_sub_sub_cat_2 существует
        $this->assertArrayHasKey('sub_sub_sub_cat_2', $resWithoutItem['cat']['sub_cat_4']['sub_sub_cat_3']['0']);
        $this->assertArrayHasKey('sub_sub_sub_cat_2', $resWithoutItem['cat']['sub_cat_4']['sub_sub_cat_3']['1']);

        // Удаляем sub_sub_sub_cat_2
        $resWithoutCmId = ArrayHelper::unsetElementByKey($resWithoutItem, 'sub_sub_sub_cat_2');

        // Проверяем, что sub_sub_sub_cat_2 был удален
        $this->assertArrayNotHasKey('sub_sub_sub_cat_2', $resWithoutCmId['cat']['sub_cat_4']['sub_sub_cat_3']['0']);
        $this->assertArrayNotHasKey('sub_sub_sub_cat_2', $resWithoutCmId['cat']['sub_cat_4']['sub_sub_cat_3']['1']);
    }

    /**
     * Тест на смещение token_1 и удаление sub_sub_sub_sub_cat_2 в случае номер 3
     *
     * @author farZa
     */
    public function testCaseThree()
    {
        $arr = ArrayHelperCases::getArray(ArrayHelperCases::CASE_THREE);

        // Есть ли token_1
        $this->assertArrayHasKey('token_1', $arr['cat']['sub_cat_4']['sub_sub_cat_3']['0']['token_1']['sub_sub_sub_cat_4']['0']);
        $this->assertArrayHasKey('token_1', $arr['cat']['sub_cat_4']['sub_sub_cat_3']['0']['token_1']['sub_sub_sub_cat_4']['1']);
        $this->assertArrayHasKey('token_1', $arr['cat']['sub_cat_4']['sub_sub_cat_3']['1']['token_1']['sub_sub_sub_cat_4']['0']);
        $this->assertArrayHasKey('token_1', $arr['cat']['sub_cat_4']['sub_sub_cat_3']['1']['token_1']['sub_sub_sub_cat_4']['1']);

        // Смещаем
        $resWithoutItem = ArrayHelper::process($arr, 'token_1');

        // Проверяем, что token_1 исчез
        $this->assertArrayNotHasKey('token_1', $resWithoutItem['cat']['sub_cat_4']['sub_sub_cat_3']['0']['sub_sub_sub_cat_4']['0']);
        $this->assertArrayNotHasKey('token_1', $resWithoutItem['cat']['sub_cat_4']['sub_sub_cat_3']['0']['sub_sub_sub_cat_4']['1']);
        $this->assertArrayNotHasKey('token_1', $resWithoutItem['cat']['sub_cat_4']['sub_sub_cat_3']['1']['sub_sub_sub_cat_4']['0']);
        $this->assertArrayNotHasKey('token_1', $resWithoutItem['cat']['sub_cat_4']['sub_sub_cat_3']['1']['sub_sub_sub_cat_4']['1']);

        // Проверяем, что sub_sub_sub_sub_cat_2 существует
        $this->assertArrayHasKey('sub_sub_sub_sub_cat_2', $resWithoutItem['cat']['sub_cat_4']['sub_sub_cat_3']['0']['sub_sub_sub_cat_4']['0']);
        $this->assertArrayHasKey('sub_sub_sub_sub_cat_2', $resWithoutItem['cat']['sub_cat_4']['sub_sub_cat_3']['0']['sub_sub_sub_cat_4']['1']);
        $this->assertArrayHasKey('sub_sub_sub_sub_cat_2', $resWithoutItem['cat']['sub_cat_4']['sub_sub_cat_3']['1']['sub_sub_sub_cat_4']['0']);
        $this->assertArrayHasKey('sub_sub_sub_sub_cat_2', $resWithoutItem['cat']['sub_cat_4']['sub_sub_cat_3']['1']['sub_sub_sub_cat_4']['1']);

        // Удаляем sub_sub_sub_sub_cat_2
        $resWithoutCmId = ArrayHelper::unsetElementByKey($resWithoutItem, 'sub_sub_sub_sub_cat_2');

        // Проверяем, что sub_sub_sub_sub_cat_2 был удален
        $this->assertArrayNotHasKey('sub_sub_sub_sub_cat_2', $resWithoutCmId['cat']['sub_cat_4']['sub_sub_cat_3']['0']['sub_sub_sub_cat_4']['0']);
        $this->assertArrayNotHasKey('sub_sub_sub_sub_cat_2', $resWithoutCmId['cat']['sub_cat_4']['sub_sub_cat_3']['0']['sub_sub_sub_cat_4']['1']);
        $this->assertArrayNotHasKey('sub_sub_sub_sub_cat_2', $resWithoutCmId['cat']['sub_cat_4']['sub_sub_cat_3']['1']['sub_sub_sub_cat_4']['0']);
        $this->assertArrayNotHasKey('sub_sub_sub_sub_cat_2', $resWithoutCmId['cat']['sub_cat_4']['sub_sub_cat_3']['1']['sub_sub_sub_cat_4']['1']);
    }

    /**
     * Тест на смещение token_1 и удаление sub_sub_sub_sub_cat_2 в случае номер 4
     *
     * @author farZa
     */
    public function testCaseFour()
    {
        $arr = ArrayHelperCases::getArray(ArrayHelperCases::CASE_FOUR);

        // Есть ли token_1
        $this->assertArrayHasKey('token_1', $arr['cat']['sub_cat_4']['sub_sub_cat_3']['0']['token_1']['sub_sub_sub_cat_4']);
        $this->assertArrayHasKey('token_1', $arr['cat']['sub_cat_4']['sub_sub_cat_3']['1']['token_1']['sub_sub_sub_cat_4']);

        // Смещаем
        $resWithoutItem = ArrayHelper::process($arr, 'token_1');

        // Проверяем, что token_1 исчез
        $this->assertArrayNotHasKey('token_1', $resWithoutItem['cat']['sub_cat_4']['sub_sub_cat_3']['0']['sub_sub_sub_cat_4']);
        $this->assertArrayNotHasKey('token_1', $resWithoutItem['cat']['sub_cat_4']['sub_sub_cat_3']['1']['sub_sub_sub_cat_4']);

        // Проверяем, что sub_sub_sub_sub_cat_2 существует
        $this->assertArrayHasKey('sub_sub_sub_sub_cat_2', $resWithoutItem['cat']['sub_cat_4']['sub_sub_cat_3']['0']['sub_sub_sub_cat_4']);
        $this->assertArrayHasKey('sub_sub_sub_sub_cat_2', $resWithoutItem['cat']['sub_cat_4']['sub_sub_cat_3']['1']['sub_sub_sub_cat_4']);

        // Удаляем sub_sub_sub_sub_cat_2
        $resWithoutCmId = ArrayHelper::unsetElementByKey($resWithoutItem, 'sub_sub_sub_sub_cat_2');

        // Проверяем, что sub_sub_sub_sub_cat_2 был удален
        $this->assertArrayNotHasKey('sub_sub_sub_sub_cat_2', $resWithoutCmId['cat']['sub_cat_4']['sub_sub_cat_3']['0']['sub_sub_sub_cat_4']);
        $this->assertArrayNotHasKey('sub_sub_sub_sub_cat_2', $resWithoutCmId['cat']['sub_cat_4']['sub_sub_cat_3']['1']['sub_sub_sub_cat_4']);
    }

    /**
     * Тест на смещение token_1 и удаление sub_sub_sub_sub_cat_2 в случае номер 5
     *
     * @author farZa
     */
    public function testCaseFive()
    {
        $arr = ArrayHelperCases::getArray(ArrayHelperCases::CASE_FIVE);

        // Есть ли token_1
        $this->assertArrayHasKey('token_1', $arr['cat']['sub_cat_4']['sub_sub_cat_3']['token_1']['sub_sub_sub_cat_4']);

        // Смещаем
        $resWithoutItem = ArrayHelper::process($arr, 'token_1');

        // Проверяем, что token_1 исчез
        $this->assertArrayNotHasKey('token_1', $resWithoutItem['cat']['sub_cat_4']['sub_sub_cat_3']['sub_sub_sub_cat_4']);

        // Проверяем, что sub_sub_sub_sub_cat_2 существует
        $this->assertArrayHasKey('sub_sub_sub_sub_cat_2', $resWithoutItem['cat']['sub_cat_4']['sub_sub_cat_3']['sub_sub_sub_cat_4']);

        // Удаляем sub_sub_sub_sub_cat_2
        $resWithoutCmId = ArrayHelper::unsetElementByKey($resWithoutItem, 'sub_sub_sub_sub_cat_2');

        // Проверяем, что sub_sub_sub_sub_cat_2 был удален
        $this->assertArrayNotHasKey('sub_sub_sub_sub_cat_2', $resWithoutCmId['cat']['sub_cat_4']['sub_sub_cat_3']['sub_sub_sub_cat_4']);
    }

    /**
     * Тест на смещение token_1 и удаление sub_sub_sub_sub_sub_sub_sub_cat_2 в случае номер 5
     *
     * @author farZa
     */
    public function testCaseSix()
    {
        $arr = ArrayHelperCases::getArray(ArrayHelperCases::CASE_SIX);

        // Есть ли token_1
        $this->assertArrayHasKey('token_1', $arr['cat']['sub_cat_4']['sub_sub_cat_3']['0']['token_1']['sub_sub_sub_cat_4']['0']['token_1']['sub_sub_sub_sub_cat_3']['0']['token_1']['sub_sub_sub_sub_sub_cat_3']['0']['token_1']['sub_sub_sub_sub_sub_sub_cat_2']['1']);

        // Смещаем
        $resWithoutItem = ArrayHelper::process($arr, 'token_1');

        // Проверяем, что token_1 исчез
        $this->assertArrayNotHasKey('token_1', $resWithoutItem['cat']['sub_cat_4']['sub_sub_cat_3']['0']['sub_sub_sub_cat_4']['0']['sub_sub_sub_sub_cat_3']['0']['sub_sub_sub_sub_sub_cat_3']['0']['sub_sub_sub_sub_sub_sub_cat_2']['1']);

        // Проверяем, что sub_sub_sub_sub_sub_sub_sub_cat_2 существует
        $this->assertArrayHasKey('sub_sub_sub_sub_sub_sub_sub_cat_2', $resWithoutItem['cat']['sub_cat_4']['sub_sub_cat_3']['0']['sub_sub_sub_cat_4']['0']['sub_sub_sub_sub_cat_3']['0']['sub_sub_sub_sub_sub_cat_3']['0']['sub_sub_sub_sub_sub_sub_cat_2']['1']);

        // Удаляем sub_sub_sub_sub_sub_sub_sub_cat_2
        $resWithoutCmId = ArrayHelper::unsetElementByKey($resWithoutItem, 'sub_sub_sub_sub_sub_sub_sub_cat_2');

        // Проверяем, что sub_sub_sub_sub_sub_sub_sub_cat_2 был удален
        $this->assertArrayNotHasKey('sub_sub_sub_sub_sub_sub_sub_cat_2', $resWithoutCmId['cat']['sub_cat_4']['sub_sub_cat_3']['0']['sub_sub_sub_cat_4']['0']['sub_sub_sub_sub_cat_3']['0']['sub_sub_sub_sub_sub_cat_3']['0']['sub_sub_sub_sub_sub_sub_cat_2']['1']);
    }

    /**
     * Тест на поиск значения в указанной вложенности
     *
     * @author farZa
     * @covers ArrayHelper::getNestedElement
     */
    public function testGetNestedElement()
    {
        $arr = ArrayHelperCases::getArray(ArrayHelperCases::CASE_FOUR);

        $val = ArrayHelper::getNestedElement($arr, 'cat.sub_cat_4.sub_sub_cat_3.1.token_1.sub_sub_sub_cat_3');

        $this->assertCount(1, $val);
        $this->assertEquals('sub sub sub category 3', $val[0]);

        $val = ArrayHelper::getNestedElement($arr, 'cat.sub_cat_4.sub_sub_cat_3.x.token_1.sub_sub_sub_cat_3');

        $this->assertCount(2, $val);
        $this->assertEquals('sub sub sub category 3', $val[0]);
        $this->assertEquals('sub sub sub category 3', $val[1]);
    }
}
