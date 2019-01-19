<?php

/*
 * Smart Replace.
 * --------------
 * String replace PHP function with the option to exclude possibilities.
 * $replace array can be as follows: [$searchfor => $replacewith]
 * 
 * @param array $replace
 * @param string $string
 * @param array $exclude
 * 
 * @return string
 */

function smart_replace($replace = [], $string = "", $exclude = []) {
    $forward = $backward = [];
    if (is_array($exclude) && count($exclude) > 0 && !empty($exclude)) {
        foreach ($exclude as $excl) {
            $exclString = str_replace(["<", ">"], "", $excl);
            $exclEncryptedString = "[[" . md5($exclString) . "]]";
            $forward = array_merge([$exclString => $exclEncryptedString], $forward);
            $backward = array_merge([$exclEncryptedString => $exclString], $backward);
            $string = str_replace(array_keys($forward), array_values($forward), $string);
        }
    }
    $replacedString = str_replace(array_keys($replace), array_values($replace), $string);
    if (is_array($exclude) && count($exclude) > 0 && !empty($exclude)) {
        $replacedString = str_replace(array_keys($backward), array_values($backward), $replacedString);
    }
    return $replacedString;
}
