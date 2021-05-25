import glob
import os

loc = input("Please Enter your Location: ")
os.chdir(loc)
files = glob.glob("*.*")

for file in files:
    os.remove(file)