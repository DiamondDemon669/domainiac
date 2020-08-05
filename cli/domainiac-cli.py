import sys
import requests
from python_hosts import Hosts, HostsEntry

hosts = Hosts()
url = "https://domainiac.diamonddemon.me/nameserver.php"
def printguide():
    print("""How to use domainiac:
add adds a new domain to the nameserver
link gets a domain from the nameserver by its code and adds it to your hosts file

add command guide
add [DOMAIN] -a [IP]
add [DOMAIN] --cname [Existing domain]
add [DOMAIN] --aaaa [IPv6 addres]

link command guide
link [CODE]
""")
try:
    if sys.argv[1] != "link" or sys.argv[1] != "add":
        pass
except:
    pass
finally:
    printguide()

try:
    if sys.argv[1] == "link":
        code = sys.argv[2]
        result = requests.post(url, data={"command": "link", "content": code}).text.split(" ")
        resultcombined = result[1] + result[0]
        hosts.add([HostsEntry(entry_type='ipv4', address=result[1], names=[result[0]])])
        hosts.write()
        print("Code {} linked".format(code))
except:
    print("This beta does not have proper error handling")    
