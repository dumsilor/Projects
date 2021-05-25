import random

possible_throw = ["rock","paper","scissor"]



while True:
    throw = random.choice(possible_throw)
    user_throw = input("1. Rock \n2. Papper \n3. Scissor \nYour Choise: ")
    if throw == "rock" and user_throw== "3":
        print("You Selected Scissor, Computer Selected " +throw+ "! You lose!")
    elif throw =="rock" and user_throw=="1":
        print("You Selected Rock, Computer Selected " +throw+ "! Match draw!")
    elif throw =="rock" and user_throw=="2":
        print("You Selected Paper, Computer Selected " +throw+ "! You Win!")
    elif (throw == "paper" and user_throw== "3"):
        print("You Selected Scissor, Computer Selected " +throw+ "! You Win!")
    elif throw =="paper" and user_throw=="1":
        print("You Selected Rock, Computer Selected " +throw+ "! You lose!")
    elif throw =="paper" and user_throw=="2":
        print("You Selected Paper, Computer Selected " +throw+ "! Match Draw!")
    elif throw == "scissor" and user_throw== "3":
        print("You Selected Scissor, Computer Selected " +throw+ "! Match Draw!")
    elif throw =="scissor" and user_throw=="1":
        print("You Selected Rock, Computer Selected " +throw+ "! You Win!")
    elif throw =="scissor" and user_throw=="2":
        print("You Selected Paper, Computer Selected " +throw+ "! You lose!")
    else:
        print("INVALID SELECTION! Please enter a number between 1 to 3")
        continue
    proceed = input("Do you want to continue?(y/n)")
    if proceed == "n":
        break


