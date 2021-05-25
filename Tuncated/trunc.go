package main

import (
	"fmt"
)

func main() {
	x := 7
	switch {
	case x > 3:
		fmt.Printf("1")
	case x > 5:
		fmt.Printf("2")
	case x == 7:
		fmt.Printf("3")
	default:
		fmt.Printf("4")
	}
	for i := 0; i < 10; i++ {
		fmt.Printf("\nPlease enter your number: ")
		var fnumber float32
		fmt.Scan(&fnumber)
		var inumber int = int(fnumber)
		fmt.Printf("%d", inumber)

	}
}
