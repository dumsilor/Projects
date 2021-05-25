/*
1. Funtion as Variable
2. Function as Argument
3. Anonymous Function
*/

//function as Vairable

package main

import (
	"fmt"
	"strings"
)

var funcvar /*eta function er name*/ func(int) int /*type*/ // var name_of_variable type_of_vairable = var name_of_function_variable func(value_type) return_value_of_func

func intfn(x int) int {
	return x + 1
}

var name_func func(string) string

func your_name(name string) string {
	return "Hello, " + name
}

var name_count func(string) int

func name(u_name string) int {
	words := strings.Fields(u_name)
	count := 0
	for _, word := range words {
		fmt.Print(word)
		count += 1
	}
	return count
}

func main() {
	name_count = name
	fmt.Print(name_count("Rashik"))
}

// Function As a argument:
