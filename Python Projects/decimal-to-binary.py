
decimal_number = int(input("Please enter your number here: "))

check_values= [128,64,32,16,8,4,2,1]

result = ""

for value in check_values:
    if decimal_number >= value:
        decimal_number = decimal_number - int(value)
        result = result + "1"
    else:
       result = result + "0"
    
print("Your Result: " + result)