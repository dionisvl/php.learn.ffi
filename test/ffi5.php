<?php

# Пример #5 Работа с массивами C


// создаём структуру данных
$a = FFI::new("long[1024]");
// работаем с ней как с обычным массивом PHP
for ($i = 0; $i < count($a); $i++) {
    $a[$i] = $i;
}
var_dump($a[25]);
$sum = 0;
foreach ($a as $n) {
    $sum += $n;
}
var_dump($sum);
var_dump(count($a));
var_dump(FFI::sizeof($a));