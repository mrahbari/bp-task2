<?php
/**
 * @author Mojtaba Rahbari <mojtaba.rahbari@gmail.com | mojtabarahbari.ir>
 * @copyright Copyright &copy; from 2022 Mojtaba.
 * @version 1.0.0
 * @date 2022/02/06 23:00 PM
 */

namespace App\Enums;

use ReflectionClass;
use ReflectionException;

class SourceEnum
{
    const CSV = 'csv';
    const DB = 'db';

    /**
     * @return array
     */
    public static function getConstants(): array
    {
        $constants = [];
        try {
            $reflectionClass = new ReflectionClass(self::class);
            $constants = array_flip($reflectionClass->getConstants());
        } catch (ReflectionException $e) {
        }
        return $constants;
    }
}
