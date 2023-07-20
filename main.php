<?php

function ffi_fib(): void
{
	$ffi = FFI::cdef("int fibonacci(int n);", 'D:\projects\GO\FFI-PHP\libfib.dll');
	$start = microtime(true);
	for ($i = 0; $i < 1000000; $i++) {
		$ffi->fibonacci(12);
	}

	echo '[Go-FFI] execution time, seconds: ' . (microtime(true) - $start) . PHP_EOL;
}

function test()
{
	$ffi = FFI::cdef("void printer();", 'D:\projects\GO\FFI-PHP\libfib.dll');
	$start = microtime(true);
	$ffi->printer();
	echo '[Go-FFI] execution time, seconds: ' . (microtime(true) - $start) . PHP_EOL;
}

function test2()
{

	$ffi2 = FFI::cdef('typedef struct number number_struct;

	struct number
	{
	  int a;
	};void structgen(number_struct str);', './libfib.dll');
	$var = $ffi2->new('number_struct');
	$var->a = 5;
	$ffi2->structgen($var);
	//$ffi = FFI::cdef("void structgen(number_struct str);", './libfib.dll');
	//echo $v;
}
function test3() {
	
}
test2();
//ffi_fib();