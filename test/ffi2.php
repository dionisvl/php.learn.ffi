<?php

# Пример #2 Вызов функции и возврат структуры через аргумент

// создаём привязку gettimeofday()
$ffi = FFI::cdef("
    typedef unsigned int time_t;
    typedef unsigned int suseconds_t;

    struct timeval {
        time_t      tv_sec;
        suseconds_t tv_usec;
    };

    struct timezone {
        int tz_minuteswest;
        int tz_dsttime;
    };

    int gettimeofday(struct timeval *tv, struct timezone *tz);
", "libc.so.6");
// создаём структуры данных C
$tv = $ffi->new("struct timeval");
$tz = $ffi->new("struct timezone");
// вызываем gettimeofday()
var_dump($ffi->gettimeofday(FFI::addr($tv), FFI::addr($tz)));
// получаем доступ к полю структуры данных C
var_dump($tv->tv_sec);
// печатаем всю структуру данных
var_dump($tz);