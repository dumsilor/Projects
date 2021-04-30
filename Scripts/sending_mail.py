import email, smtplib, ssl

from email import encoders
from email.mime.base import MIMEBase
from email.mime.multipart import MIMEMultipart
from email.mime.text import MIMEText

sender_email = "mosiur.rahman@novocom-bd.com"
receiver_email = ["mosiur.rahman@novocom-bd.com","mosiur.rahman@brilliant.com.bd"]
password = "000011111010"

message = MIMEMultipart()
message["Subject"] = "multipart test"
message["From"] = sender_email
message["To"] = ','.join(receiver_email)
name = "Mosiur"
# Create the plain-text and HTML version of your message
text = """\
Hi,
How are you?
Real Python has many great tutorials:
www.realpython.com"""
html = """\
<html>
  <body>
    <p>Hi,<br>
       How are you?<br>

    </p>
    <h1> This will be header</h1>
    <h2>this mail is sent by """+name+"""</h2>
  </body>
</html>
"""

# Turn these into plain/html MIMEText objects
#part1 = MIMEText(text, "plain")
part2 = MIMEText(html, "html")

# Add HTML/plain-text parts to MIMEMultipart message
# The email client will try to render the last part first
#message.attach(part1)
message.attach(part2)


filename = "IC-BW-Report.xlsx"

with open(filename, "rb") as attachment:
    # Add file as application/octet-stream
    # Email client can usually download this automatically as attachment
    part = MIMEBase("application", "octet-stream")
    part.set_payload(attachment.read())

# Encode file in ASCII characters to send by email
encoders.encode_base64(part)

# Add header as key/value pair to attachment part
part.add_header(
    "Content-Disposition",
    f"attachment; filename= {filename}",
)

# Add attachment to message and convert message to string
message.attach(part)
text = message.as_string()


# Create secure connection with server and send email
context = ssl.create_default_context()
with smtplib.SMTP_SSL("mta.brilliant.com.bd", 465, context=context) as server:
    server.login(sender_email, password)
    server.sendmail(
        sender_email, receiver_email,text
    )
