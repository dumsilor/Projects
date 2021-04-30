from bs4 import BeautifulSoup

new_text = []

filename = "NovoCom phpipam IP address management.html"
fhandle = open(filename)
soup = BeautifulSoup(fhandle,'html.parser')
tag_td_first_child = soup.select('td:first-child')
tag_td_second_child = soup.select('td:nth-child(2)')

ip_list =[]
name_list = []
ip_name_dict = {}

for line in tag_td_first_child:
    ip_list.append(line.get_text())

for line in tag_td_second_child:
    name_list.append(line.get_text())

count = 0
#for ip in ip_list:
#    ip_name_dict[ip].append(name_list[count])
#    count = count + 1

print(ip_list)
