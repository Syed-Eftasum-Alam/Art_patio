@ECHO OFF
SETLOCAL ENABLEDELAYEDEXPANSION
CD /D %~dp0

TITLE TailwindCSS Watcher


IF NOT EXIST "tailwindcss.exe" (
    ECHO  -^> TailwindCSS NOT FOUND!
    ECHO  -^> TailwindCSS Downloading...
    SET "Download_Link=https://github.com/tailwindlabs/tailwindcss/releases/download/v3.3.5/tailwindcss-windows-x64.exe"
    SET "Download_Location=tailwindcss.exe"
    CALL :Any_Downloader
    ECHO.
)

FOR /R %%A in (src\*.css) DO (
    ECHO  -^> %%A
    START /B tailwindcss -i "%%~dpA/%%~nxA" -o "%%~nxA" --watch
)

EXIT

:Any_Downloader
PowerShell -Command ^
$ProgressPreference = 'SilentlyContinue';^
$dlLink = \"%Download_Link%\";^
$dlLocation = \"%Download_Location%\";^
function downloadFile($url, $targetFile)^
{^
    $uri = New-Object \"System.Uri\" \"$url\";^
    $request = [System.Net.HttpWebRequest]::Create($uri);^
    $request.set_Timeout(15000);^
    $response = $request.GetResponse();^
    $totalLength = [System.Math]::Floor($response.get_ContentLength()/1024);^
    $responseStream = $response.GetResponseStream();^
    $targetStream = New-Object -TypeName System.IO.FileStream -ArgumentList $targetFile, Create;^
    $buffer = new-object byte[] 10KB;^
    $count = $responseStream.Read($buffer,0,$buffer.length);^
    $downloadedBytes = $count;^
    while ($count -gt 0)^
    {^
        [System.Console]::CursorLeft = 0;^
        [System.Console]::Write(\"  >>   Downloaded {0}K of {1}K ({2}%%) <<   \", [System.Math]::Floor($downloadedBytes/1024), $totalLength, [System.Math]::Floor((($downloadedBytes/1024)/$totalLength)*100));^
        $targetStream.Write($buffer, 0, $count);^
        $count = $responseStream.Read($buffer,0,$buffer.length);^
        $downloadedBytes = $downloadedBytes + $count;^
    }^
    $targetStream.Flush();^
    $targetStream.Close();^
    $targetStream.Dispose();^
    $responseStream.Dispose();^
}^
downloadFile $dlLink $dlLocation;

ECHO.
EXIT /B
