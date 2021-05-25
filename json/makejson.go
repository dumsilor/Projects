package main

import (
	"encoding/json"
	"fmt"
)

func main() {
	mapper := make(map[string]string)
	var name string
	var address string
	fmt.Printf("Enter your name: ")
	fmt.Scan(&name)
	fmt.Printf("Enter your address: ")
	fmt.Scan(&address)
	mapper["name"] = name
	mapper["address"] = address
	json_data, _ := json.MarshalIndent(mapper, "", "\t")
	fmt.Print(string(json_data))
}
