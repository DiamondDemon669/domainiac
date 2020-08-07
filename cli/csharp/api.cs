using System;
using System.Net;
using System.Collections.Specialized;
using System.Text;

public class API
{
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
}

    
