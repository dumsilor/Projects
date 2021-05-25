package main

import "fmt"

func one(y int) int {
	y = y + 1
	return y
}

func two(y *int) int {
	*y = *y + 2
	return *y
}

func main() {
	x := 1
	fmt.Print("Function One: ", one(x), "\n")
	fmt.Print("Function two: ", two(&x), "\n")
	fmt.Print("Value of x: ", x, "\n")
	fmt.Print("Function One: ", one(x), "\n")
}
