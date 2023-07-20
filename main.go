package main
//#cgo CFLAGS: -g -Wall
//#include "structs.h"
import "C"
import (
	"fmt"
)
type Test struct  {
	A int
}

//export fibonacci
func fibonacci(n C.int) C.int {
	if n < 2 {
		return 1
	}
	return fibonacci(n-2) + fibonacci(n-1)
}
//export structgen
func structgen(str C.number_struct) {
	fmt.Println("here");
	fmt.Printf("%d\n", str.a)
}

//export printer
func printer() {
	fmt.Println("Hello world ffi dll")
}
//export modifyInside
func modifyInside(v *C.int) {
	*v++
}

func Entry() {
	main()
}

func main() {}
