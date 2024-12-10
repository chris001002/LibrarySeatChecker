Set WshShell = CreateObject("WScript.Shell")
Set FSO = CreateObject("Scripting.FileSystemObject")

' Get the directory of the current script
scriptDir = FSO.GetParentFolderName(WScript.ScriptFullName)

' Run the batch file from the same directory
WshShell.Run scriptDir & "\task.bat", 1