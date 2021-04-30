import os

ip = ["103.248.14.", "103.248.15.","118.67.214.","118.67.216.","118.67.217.","118.67.218.","118.67.219.","118.67.220.","118.67.221.","118.67.222.","163.53.150.","163.53.151.","103.23.41.","103.23.42."]


host_up = False
down_ip_list = []

for block in ip:
    subnet = 0
    while subnet < 255:
        print(block+str(subnet))
        if os.system("ping -n 1 " + block+str(subnet) ):
            down_ip_list.append(block+str(subnet))
        subnet += 1

f = open("IP addresses","a")

for ip in down_ip_list:
    f.write(ip + "\n")
f.close()
