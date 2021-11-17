<?php

namespace Hackathon\LevelC;

class RotationString
{
    /**
     * @TODO ! BAM
     *
     * @param $s1
     * @param $s2
     *
     * @return bool|int
     */
    public static function isRotation($s1, $s2)
    {
        if (strlen($s1) != strlen($s2)) {
            return false;
        }

        $temp = $s1 . $s1;
        if (self::isSubString($temp, $s2) > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public static function isSubString($s1, $s2)
    {
        $pos = strpos($s1, $s2);

        return $pos;
    }
}
/*
$rotate = new RotationString;
$s1 = "abcdef";
$s2 = "cdefab";
if ($rotate->isRotation($s1, $s2) == true) {
    echo "WORKS\n";
} else {
    echo "NUL\n";
}
*/

?>
