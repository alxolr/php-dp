<?php
namespace DP\GOF\Creational\FactoryMethod;

/**
 * Interface Format
 */
interface Format {}

/**
 * Class Factory
 */
class Factory
{
    /**
     * @param $type
     * @return Format
     * @throws Exception
     */
    public static function build($type)
    {
        $class = 'Format' . $type;
        if (!class_exists($class)) {
            throw new Exception('Missing format class.');
        }

        return new $class;
    }
}

/**
 * Class FormatString
 */
class FormatString implements Format {}

/**
 * Class FormatNumber
 */
class FormatNumber implements Format {}

try {
    $string = Factory::build('String');
} catch (Exception $e) {
    echo $e->getMessage();
}

try {
    $number = Factory::build('Number');
} catch (Exception $e) {
    echo $e->getMessage();
}
