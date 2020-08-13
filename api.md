# API docs

Domainiac uses a rest API to link the CLI to the server. If you want to make your own cli or gui, api instructions are here.

Because the official cli is coded in python and csharp, all demonstrations will be shown in python and csharp

## python

### adding a new record to the server

```python

import requests

result = requests.post(url="https://domainiac.diamonddemon.me/nameserver.php", data={"command": "add", "content": DOMAIN + IP}).text

```

### getting a record from the server

```python

import requests

result = requests.post(url="https://domainiac.diamonddemon.me/nameserver.php", data={"command": "link", "content": CODE}).text

```

### deleting a record from the server

```python

import requests

result = requests.post(url="https://domainiac.diamonddemon.me/nameserver.php", data={"command": "delete", "content": DELETECODE}).text

```

## csharp

### adding a new record to the server

```csharp

public string GetAdd(string entry)
{
    WebClient client = new WebClient();
    String url = "https://domainiac.diamonddemon.me/nameserver.php";
    NameValueCollection data = new NameValueCollection();
    data.Add("command", "add");
    data.Add("content", entry);
    String result = Encoding.ASCII.GetString(client.UploadValues(url, data));
    client.Dispose();
    return result;
}

```

### getting a record from the server

```csharp

public string GetLink(string code)
{
    WebClient client = new WebClient();
    String url = "https://domainiac.diamonddemon.me/nameserver.php";
    NameValueCollection data = new NameValueCollection();
    data.Add("command", "link");
    data.Add("content", code);
    String result = Encoding.ASCII.GetString(client.UploadValues(url, data));
    client.Dispose();
    return result;
}

```

### deleting a record from the server

```csharp

public string GetDelete(string delcode)
{
    WebClient client = new WebClient();
    String url = "https://domainiac.diamonddemon.me/nameserver.php";
    NameValueCollection data = new NameValueCollection();
    data.Add("command", "delete");
    data.Add("content", delcode);
    String result = Encoding.ASCII.GetString(client.UploadValues(url, data));
    client.Dispose();
    return result;
}

```

All C# examples require 

```csharp

using system;

using system.net;

using system.text;

```

# RULES

1. No spamming requests

2. No bruteforcing codes

3. No repeating records
