
import ipaddress


print("Please enter the the type of interface \n 1. Physical \n 2. Sub-interface \n *Enter only the number*\n")
interface_type=input("~$")


if interface_type=="1":
    print("Working on it!")
else:
    interface_name=input("Enter the Interface name (exact): ")
    vint_name = input("Enter Vlan interface name: ")
    vlan_id = input("Enter Vlan ID: ")
    ip_addr= input("Enter IP address: ")
    ip_addr_net = ipaddress.ip_network(ip_addr+"/30",strict=False)
    script='''
    /interface vlan
    add disabled=yes interface='''+interface_name+''' name='''+vint_name+''' vlan-id='''+vlan_id+'''

    /ip address
    add address='''+ip_addr+'''/30 interface='''+vint_name+''' network='''+str(ip_addr_net)+'''

    '''

    print (script)
