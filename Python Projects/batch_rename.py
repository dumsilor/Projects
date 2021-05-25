import glob
import os

loc = input("Please Enter your Location: ")
os.chdir(loc)

extntn = input("what extention you want to change: ")


files = glob.glob("*.*")

for file in files:
    file_name = file.split(".")
    source = os.path.join(loc,file)
    dest = file_name[0] + "." + extntn
    os.rename(source,dest)

