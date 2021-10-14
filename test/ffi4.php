<?php

# Пример #4 Создание и модификация переменной C


// создаём переменную C типа int
$x = FFI::new("int");
var_dump($x->cdata);

// простое присваивание
$x->cdata = 5;
var_dump($x->cdata);

// не простое присвоение
$x->cdata += 2;
var_dump($x->cdata);