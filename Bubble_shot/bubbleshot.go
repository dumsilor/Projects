package main

import (
	"fmt"
)

var count int = 10

func swap(number_one int, number_two int) {
	var temp int
	if number_one > number_two {
		temp = number_one
		number_one = number_two
		number_two = temp
	}
}

func BubbleSort(number_slice []int) {
	for i := 0; i < count-1; i++ {
		swap(number_slice[i], number_slice[i+1])
	}
}

func main() {

	var num int
	var num_arry []int
	for i := 0; i < count; i++ {
		fmt.Print("Enter your number: ")
		fmt.Scan(&num)
		num_arry = append(num_arry, num)
	}

	BubbleSort(num_arry)
	for _, number := range num_arry {
		fmt.Print(number, " ")
	}
}
