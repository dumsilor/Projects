
import ipaddress

client_name = input("Enter Client Name: ")
print("Please enter the the type of interface \n 1. Physical \n 2. Sub-interface \n *Enter only the number*\n")
interface_type=input("~#")


if interface_type=="1":
    print("Working on it!")
else:
    interface_name=input("Enter the Physical Interface name (exact): ")
    vint_name = input("Enter Vlan interface name: ")
    _mpls = input("Does MPLS needs to be enabled?(y/n):")
    mpls_script = ""
    if _mpls == "y":
        transport_address = input("enter router loopback: ")
        mpls_script ='''
        /mpls ldp interface
        add interface="'''+vint_name+'''" transport-address='''+transport_address+'''
        '''
    vlan_id = input("Enter Vlan ID(dot1Q): ")
    ip_addr= input("Enter IP address(only IP): ")
    client_end_ip = ipaddress.ip_address(ip_addr) + 1
    subnet= input("Enter subnet(e.g. /30): ")
    ip_net = str(ipaddress.ip_network(ip_addr+subnet,strict=False))
    ip_addr_net=ip_net.split("/")

    script='''
    /interface vlan
    add disabled=yes interface="'''+interface_name+'''" name='''+vint_name+''' vlan-id='''+vlan_id+'''

    /ip address
    add address='''+ip_addr+subnet+''' interface='''+vint_name+''' network='''+str(ip_addr_net[0])+'''

    '''

    ospf_script = '''
    /routing ospf network
    add area=backbone network='''+ip_addr_net[0]+'''

    /routing ospf interface
    add interface='''+vint_name+''' network-type=broadcast passive=yes
    '''
    static_script = ""
    _static=input("Does Client have static route?(y/n): ")
    if _static == "y":
        static_route = input("Please enter the route:\n #")
        distance_value = input("distance: ")
        static_script = '''
        /ip route
        add check-gateway=ping comment=static for '''+client_name+''' distance='''+str(distance_value)+''' dst-address='''+static_route+''' gateway='''+str(client_end_ip)+'''
        '''
    queue_script = ""
    _queue = input("Does Client have queue(y/n): ")
    if _queue == "y":
        bandwidth = str(input("Enter bandwidth limit: "))
        queue_script = '''
        /queue simple
        add max-limit='''+bandwidth+'''M/'''+bandwidth+'''M name='''+client_name+''' target='''+vint_name+'''
        '''
    final_script = (script + mpls_script + ospf_script + static_script + queue_script).lstrip(" ")
    with open (client_name+"-conf-template.txt", "w") as file:
        file.write(final_script)
