package main

import "fmt"

func hello(name string) {
	fmt.Print("Hello, World and Hello, " + name)
}

func askname() string {
	var name string
	fmt.Print("Please Enter your name: ")
	fmt.Scan(&name)
	return name
}

func array(x []int) int {
	return x[0] + 1
}

func array_pointer(x *[]int) {
	(*x)[0] = (*x)[0] + 1
}

func slicer(sli []int) {
	sli[0] = sli[0] + 1
}

func main() {
	a := []int{1, 2, 3}
	slicer(a)
	//fmt.Print(x)
	fmt.Print(a)

}
