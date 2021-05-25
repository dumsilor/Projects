package main

/* Using for loop for the array
func main() {
	var arr = []int{1, 2, 3, 4, 5, 6, 7, 8, 9, 10}
	for _, element := range arr {
		if element > 0 {
			fmt.Print("Here is your number: ", element, "\n")
		}

	}

}
*/

// Check if the file exists:
/*
func main() {
	if _, err := os.Stat("tests.txt"); err == nil {

		fmt.Print("File Exists")
	} else {
		fmt.Print("file Does not exits")
	}

}
*/

//Read Files:

/*
func main() {
	var file_name string
	fmt.Scan(&file_name)
	content, err := ioutil.ReadFile(file_name)
	if err != nil {
		fmt.Print(err)
	}

	str := string(content)
	fmt.Print(str)
}
*/

func main(){
	var city_names := []string{America, India, Bangladesh, Australia, Canada, China, Singapore}
	file,err := os.Create("Country_name.txt")
	for index,city_name := range city_name{

	}

}