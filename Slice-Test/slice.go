package main

import (
	"fmt"
	"sort"
)

func main() {

	var count int
	fmt.Print("How many number you want to enter?: ")
	fmt.Scan(&count)
	number := make([]int, 0)
	for i := 1; i <= count; i++ {
		fmt.Printf("Please enter your number: ")
		var num int
		fmt.Scan(&num)
		number = append(number, num)
		sort.Ints(number)
	}
	fmt.Printf("Here is your Sorted Value: %d \n", number)

}
