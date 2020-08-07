using System;
using System.IO;

public class Hostedit {
    public static bool ModifyHostsFile(string entry)
    {
    try
    {
            using StreamWriter w = File.AppendText(Path.Combine(Environment.GetFolderPath(Environment.SpecialFolder.System), @"drivers\etc\hosts"));
            w.WriteLine(entry);
            return true;
        }
    catch (Exception ex)
    {
        Console.WriteLine(ex.Message);
        return false;
    }
    }
}