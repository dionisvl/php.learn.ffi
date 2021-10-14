<?php

# Пример #6 Работа с перечислениями C

$a = FFI::cdef('typedef enum _zend_ffi_symbol_kind {
    ZEND_FFI_SYM_TYPE,
    ZEND_FFI_SYM_CONST = 2,
    ZEND_FFI_SYM_VAR,
    ZEND_FFI_SYM_FUNC
} zend_ffi_symbol_kind;
');
var_dump($a->ZEND_FFI_SYM_TYPE);
var_dump($a->ZEND_FFI_SYM_CONST);
var_dump($a->ZEND_FFI_SYM_VAR);