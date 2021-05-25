package main

import (
	"bufio"
	"fmt"
	"os"
	"strings"
)

type Person struct {
	fname string
	lname string
}

func main() {
	var filename string
	fmt.Print("Please enter file name: ")
	fmt.Scan(&filename)
	var fileHandler *os.File
	slice := make([]Person, 0, 1)

	for {
		fi, err := os.Open(filename)
		fmt.Print(&fi)
		if err != nil {
			fmt.Printf("ERROR: %v\n", err)
			fmt.Println("Please Enter valid file name:")
			fmt.Scan(&filename)
		} else {
			fileHandler = fi
			break
		}
	}
	fileScanner := bufio.NewScanner(fileHandler)
	var arr []string

	for fileScanner.Scan() {
		arr = strings.Split(fileScanner.Text(), " ")
		slice = append(slice, Person{arr[0], arr[1]})
	}

	fileHandler.Close()

	for _, person := range slice {
		fmt.Printf("%v - %v\n", person.fname, person.lname)
	}
}
