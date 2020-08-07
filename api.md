# API docs

Domainiac uses a rest API to link the CLI to the server. If you want to make your own cli or gui, api instructions are here.

Because the official cli is coded in python, all demonstrations will be shown in python

## adding a new record to the server

```python

import requests

requests.post(url="https://domainiac.diamonddemon.me/nameserver.php", data={"command": "add", "content": DOMAIN + IP})

```

## getting a record from the server

```python

import requests

requests.post(url="https://domainiac.diamonddemon.me/nameserver.php", data={"command": "link", "content": CODE})

```

# RULES

1. No spamming requests

2. No bruteforcing codes

3. No repeating records
