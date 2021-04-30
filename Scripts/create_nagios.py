while True:
    host = input("host address: ")
    name= input("enter hostname: ")
    group = input("hostgroup: ")
    with open("entry.txt","a+") as file:
        file.write("""define host{ \n
                              use:        """+group+"""
                              host_name   """+name+"""
                              alias       """+name+"""
                              address     """+host+"""
        }""")
    host = None
    name = None
    gorup = None
    check = input ("continue?")
    if check == "n":
        break
