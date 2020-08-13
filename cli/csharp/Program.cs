using System;
using static Hostedit;

namespace domainiac
{
    class Program
    {
        static void Main(string[] args)
        {
            API api = new API();
            try
            {
                if (args[0] == "link")
                {
                    string entry = api.GetLink(args[1]);
                    string[] list = entry.Split(' ');
                    if (list[0] == "Error:")
                    {
                        Console.WriteLine("Error: code not found in database");
                    }
                    else
                    {
                        String fentry = list[1] + " " + list[0];
                        ModifyHostsFile(fentry);
                    }
                }
                if (args[0] == "add")
                {
                    String entry = args[1] + " " + args[3];
                    string code = api.GetAdd(entry);
                    string[] splitcode = code.Split(' ');
                    String dcode = splitcode[0];
                    String delcode = splitcode[1];
                    String message = "This is your domain code: " + dcode +  " And this is your delete code: " + delcode;
                    Console.WriteLine(message);
                }
                if (args[0] == "delete") 
                {
                	String verdict = api.GetDelete(args[1]);
                	Console.WriteLine(verdict);
                }
            }
            catch (System.IndexOutOfRangeException)
            {
                Console.WriteLine("How to use domainiac:\nadd adds a new domain to the nameserver\nlink gets a domain from the nameserver by its code and adds it to your hosts file\ndelete removes a domain with the specified delete code\n\nadd command guide\nadd [DOMAIN] -a [IP]\nadd [DOMAIN] --cname [Existing domain] (not included yet)\nadd [DOMAIN] --aaaa [IPv6 addres] (not included yet)\n\nlink command guide\nlink [CODE]\ndelete command guide\ndelete [DELETE CODE]");
            }
        }
    }
}
