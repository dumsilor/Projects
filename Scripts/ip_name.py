from bs4 import BeautifulSoup

new_text = []

filename = "NovoCom phpipam IP address management.html"
fhandle = open(filename)
soup = BeautifulSoup(fhandle,'html.parser')
raw_texts = soup.get_text()

adjusted_text = raw_texts.split("\n")
#print(adjusted_text)

for text in adjusted_text:
    if text!="":
        new_text.append(text)

final_text =[]

for text in new_text:
    try:
        int(text)
    except:
        final_text.append(text)
print(final_text)
texts = []

for text in final_text:
    removed = text.lstrip()
    if text.startswith("phpIPAM") or text.endswith("NOC ") or text.endswith("NovoCom") or text.endswith("NOC ") or text.endswith("jQuery"):
        continue
    else:
        texts.append(removed)
