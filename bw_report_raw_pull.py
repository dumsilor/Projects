#!/usr/bin/env python3

import requests
from bs4 import BeautifulSoup
import re
from datetime import timezone,datetime,timedelta,date
from hurry.filesize import size
import xlsxwriter
import os


os.chdir("/shared/Bandwidth Report/Scripts")

today = datetime.today()
dt = today - timedelta(days=1)
start_time = dt.strftime("%Y-%m-%d 00:00:00")
end_time =dt.strftime("%Y-%m-%d 23:59:59")
start_date_formated=datetime.strptime(start_time, '%Y-%m-%d %H:%M:%S')
end_date_formated=datetime.strptime(end_time, '%Y-%m-%d %H:%M:%S')
timestamp_unix_start = start_date_formated.timestamp()
timestamp_unix_end = end_date_formated.timestamp()


print("Retriving data form NovoCom Cacti.........")
graph_id = {"bsccl":"2500", "airtel":"1936", "uk":"1117", "sg_SMW4": "2368" , "FNA":"2294","akamai":"1113", "singtel":"1392", "TATA": "1192","digicon":"716", "nv-tel-iplc": "1905", "nv-sg-sw": "777", "UIL-SG":"1161", "level3":"1369", "nv-uk":"2283", "dbl":"1373", "google-node-1": "1109", "google-node-2":"1218" }
graph_name = None
row_count = 1
bandwidht_raw_workbook = xlsxwriter.Workbook("nv_raw_bw.xlsx")
worksheet = bandwidht_raw_workbook.add_worksheet()

for name, id in graph_id.items():
    graph_name = str(name)
    url  = "http://cacti.novocom-bd.com/graph_xport.php?local_graph_id="+id+"&rra_id=0&view_type=tree&graph_start="+ str(int(timestamp_unix_start)) +"&graph_end=" + str(int(timestamp_unix_end))

    graph_reg = r"[graph_xport.php]\?"
    login_data = {"login_username" : 'admin', "login_password" : 'M0g0nl@l@pp$', "action":"login"}
    head = { "User-Agent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36"}


    inbound_byte_lst = []
    outbound_byte_lst = []


    with requests.Session() as opensession:
        graph_page = opensession.post(url,data=login_data,headers=head)
        graph_page_content = graph_page.content
        soup = BeautifulSoup(graph_page_content,"html.parser")
        lines = str(soup).split("\n")


        for line in lines:
            if line =="":
                continue
            line_list =  (line.split(","))
            inbound_byte = float(line_list[1].strip("\""))
            outbound_byte = float(line_list[2].strip("\""))
            inbound_byte_lst.append(inbound_byte)
            outbound_byte_lst.append(outbound_byte)
        max_inbound = max(inbound_byte_lst)
        inbound_gb_rounded = max_inbound/1000000
        inbound_gb_true = size(max_inbound)
        max_outbound = max(outbound_byte_lst)
        outbound_gb_rounded = max_outbound/1000000
        outbound_gb_true = size(max_outbound)

        print("Seq {}.  Graph name: {} , outbound rounded {:.2f}Mbps, outbound true {}, inbound rounded {:.2f}Mbps, inbound true {}".format(row_count, graph_name,outbound_gb_rounded, outbound_gb_true,inbound_gb_rounded,inbound_gb_true))


        worksheet.write("A"+str(row_count), "{}".format(graph_name))
        worksheet.write("B"+str(row_count), "{:.2f}".format(inbound_gb_rounded))
        worksheet.write("C"+str(row_count), "{:.2f}".format(outbound_gb_rounded))
        row_count += 1
    #print(tags)
#http://cacti.novocom-bd.com/graph_xport.php?local_graph_id=2500&rra_id=0&view_type=tree&graph_start=1597255200&graph_end=1597341599

bandwidht_raw_workbook.close()

        #print(re.findall(graph_reg,tag))



#Script for InterCloud
print("InteCloud Bandwidth report parsing started!")
print("Retriving InterCloud Bandwidth from InterCloud Cacti.........")
graph_id = {"NovoCom":"1176","BDIX":"8251"}
graph_name = None
row_count = 1
bandwidht_raw_workbook = xlsxwriter.Workbook("IC_raw_bw.xlsx")
worksheet = bandwidht_raw_workbook.add_worksheet()

for name, id in graph_id.items():
    graph_name = str(name)
    url  = "http://103.248.12.33/cacti/graph_xport.php?local_graph_id="+id+"&rra_id=0&view_type=tree&graph_start="+ str(int(timestamp_unix_start)) +"&graph_end=" + str(int(timestamp_unix_end))
    #url  = "http://103.248.12.33/cacti/graph_xport.php?local_graph_id="+id+"&amp;rra_id=0&amp;view_type=tree&amp;graph_start="+ str(int(timestamp_unix_start))+"&amp;graph_end="+str(int(timestamp_unix_end))

    graph_reg = r"[graph_xport.php]\?"
    login_data = {"login_username" : 'admin', "login_password" : 'M0g0nl@l@pp$', "action":"login"}
    head = { "User-Agent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36"}


    inbound_byte_lst = []
    outbound_byte_lst = []


    with requests.Session() as opensession:
        graph_page = opensession.post(url,data=login_data,headers=head)
        graph_page_content = graph_page.content
        soup = BeautifulSoup(graph_page_content,"html.parser")
        lines = str(soup).split("\n")



        for line in lines:
            if line =="":
                continue
            line_list =  (line.split(","))
            inbound_byte = float(line_list[1].strip("\""))
            outbound_byte = float(line_list[2].strip("\""))
            inbound_byte_lst.append(inbound_byte)
            outbound_byte_lst.append(outbound_byte)
        max_inbound = max(inbound_byte_lst)
        inbound_gb_rounded = max_inbound/1000000
        inbound_gb_true = size(max_inbound)
        max_outbound = max(outbound_byte_lst)
        outbound_gb_rounded = max_outbound/1000000
        outbound_gb_true = size(max_outbound)

        print("Seq {}.  Graph name: {} , outbound rounded {:.2f}Mbps, outbound true {}, inbound rounded {:.2f}Mbps, inbound true {}".format(row_count, graph_name,outbound_gb_rounded, outbound_gb_true,inbound_gb_rounded,inbound_gb_true))


        worksheet.write("A"+str(row_count), "{}".format(graph_name))
        worksheet.write("B"+str(row_count), "{:.2f}".format(inbound_gb_rounded))
        worksheet.write("C"+str(row_count), "{:.2f}".format(outbound_gb_rounded))
        row_count += 1
    #print(tags)
#http://cacti.novocom-bd.com/graph_xport.php?local_graph_id=2500&rra_id=0&view_type=tree&graph_start=1597255200&graph_end=1597341599

bandwidht_raw_workbook.close()
