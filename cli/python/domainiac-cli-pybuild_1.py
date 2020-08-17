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
add [DOMAIN] --cname [Existing domain] {not included yet)
add [DOMAIN] --aaaa [IPv6 addres] (not included yet)

link command guide
link [CODE]
""")

try:
    if sys.argv[1] == "link":
        code = sys.argv[2]
        result = requests.post(url, data={"command": "link", "content": code}).text.split(" ")
        if result == "Error: code not found in database":
            print("Error: invalid code")
        else:
            resultcombined = result[1] + result[0]
            hosts.add([HostsEntry(entry_type='ipv4', address=result[1], names=[result[0]])])
            hosts.write()
            print("Code {} linked".format(code))
    elif sys.argv[1] == "add":
        domain = sys.argv[2]
        ip = sys.argv[4]
        data = domain + " " + ip
        result = requests.post(url, data={"command": "add", "content": data}).text
        if result == "Error: failed to bypass filter":
            print("Error: arguments given is not a domain or IP")
        else:
            print("Please copy this code: {}".format(result))
except IndexError:
    printguide()

input("Press enter to exit")
