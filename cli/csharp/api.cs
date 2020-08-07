using System;
using System.Net;


public class API
{
    public string GetLink(string code)
    {
        WebClient client = new WebClient();
        String url = "https://domainiac.diamonddemon.me/nameserver.php";
        client.Headers[HttpRequestHeader.ContentType] = "application/form-data";
        String data = "command=link&content=" + code;
        String result = client.UploadString(url, data);
        client.Dispose();
        return result;
    }
    public string GetAdd(string entry)
    {
        WebClient client = new WebClient();
        String url = "https://domainiac.diamonddemon.me/nameserver.php";
        client.Headers[HttpRequestHeader.ContentType] = "application/form-data";
        String data = "command=add&content=" + entry;
        String result = client.UploadString(url, data);
        client.Dispose();
        return result;
    }
}

