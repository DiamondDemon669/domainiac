using System;
using static Hostedit;

namespace domainiac
{
    class Program
    {
        static void Main(string[] args)
        {
            API api = new API();
            if (args[0] == "link")
            {
                string entry = api.GetLink(args[1]);
                ModifyHostsFile(entry);
            }
            if (args[0] == "add")
            {
                String entry = args[1] + args[3];
                string code = api.GetAdd(entry);
                Console.WriteLine(code);
            }
        }
    }
}
