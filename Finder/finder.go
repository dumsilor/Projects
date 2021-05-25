package main

import (
	"fmt"
	"strings"
)

func main() {
	var word string
	fmt.Printf("Please enter your string: ")
	fmt.Scan(&word)
	print("\n")
	index_i := strings.Index(word, "i")
	index_I := strings.Index(word, "I")
	index_a := strings.Index(word, "a")
	index_A := strings.Index(word, "A")
	index_n := strings.Index(word, "n")
	index_N := strings.Index(word, "N")
	word_len := len(word) - 1
	if index_i == 0 || index_I == 0 {
		if index_n == word_len || index_N == word_len {
			if index_a != -1 || index_A != -1 {
				fmt.Printf("Found!")
			} else {
				fmt.Printf("Not Found!")
			}
		} else {
			fmt.Printf("Not Found!")
		}
	} else {
		fmt.Printf("Not Found!")
	}
}
