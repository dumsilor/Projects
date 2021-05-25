import os

print("1")

cwd = os.getcwd()
if not os.path.exists("dummy"):
    os.mkdir(cwd+ r'\dummy')   
os.chdir(cwd+ r'\dummy')



no_of_file = input("Please enter the number of file you want to create: ")
file_name = input("Enter your File name: ")
file_extension = input("Enter your File Extension: ")
count = 0
while count < int(no_of_file):
    file=open(file_name+"-"+str(count+1)+"."+file_extension,"x")
    count+=1
