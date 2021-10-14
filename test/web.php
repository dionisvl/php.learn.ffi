<?php

echo 'start' . PHP_EOL;

// создаём объект FFI, загружаем libc и экспортируем функцию printf()
$ffi = FFI::cdef(
    "int printf(const char *format, ...);", // это стандартная декларация C
    "libc.so.6");
// вызываем printf()
$ffi->printf("Hello, %s!\n", "world");