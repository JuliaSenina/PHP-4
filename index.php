<?php

$name = 'иван';
$surname = 'сидоров';
$patronymic = 'петрович';

$fullName = $surname . ' ' . $name . ' ' . $patronymic;
$fullName = mb_convert_case($fullName, MB_CASE_TITLE, "UTF-8");

$strSurnameAndInitials = $surname.' '.mb_substr($name, 0, 1).'.'.mb_substr($patronymic, 0, 1).'.';
$surnameAndInitials = preg_replace_callback('/(^|\.|\s){1}\w/u',
  static function($m) {
    return mb_convert_case($m[0], MB_CASE_UPPER, "UTF-8");
  },
  $strSurnameAndInitials);

$strFIO = mb_substr($surname, 0, 1).mb_substr($name, 0, 1).mb_substr($patronymic, 0, 1);
$fio = mb_convert_case($strFIO, MB_CASE_UPPER, "UTF-8");

echo "Полное имя: '$fullName' ".PHP_EOL;
echo "Фамилия и инициалы: '$surnameAndInitials'".PHP_EOL;
echo "Аббревиатура: '$fio'\\";