<?php

# ставим заставку на РС windows

if (!extension_loaded("ffi")) // Load the extension
{
    throw new Exception('Cound not load the FFI extension.');
}

function setWindowsDesktop($bmpFilePath)
{
    define('SPI_SETDESKWALLPAPER', 0x14);
    define('SPIF_UPDATEINIFILE', 0x1);
    define('SPIF_SENDWININICHANGE', 0x2);
    assert(File_Exists($bmpFilePath));

    // declare the Win32 API function used to change desktop settings.
    $User32 = FFI::cdef(<<<'IDL'
      int SystemParametersInfoA(int uAction, int uParam, char *lpvParam, int fuWinIni);
    IDL, 'User32.dll');
    $Kernel32 = FFI::cdef(<<<'IDL'
      int GetLastError();
    IDL, 'Kernel32.dll');
    // call the Windows API to update the desktop background.
    $Ret = $User32->SystemParametersInfoA(SPI_SETDESKWALLPAPER, 0, $bmpFilePath, SPIF_UPDATEINIFILE || SPIF_SENDWININICHANGE);
    if ($Ret == 0) {
        $Error = $Kernel32->GetLastError();
        throw new Exception("The call to the Windows API failed (error {$Error}).");
    }
}

$Url = 'https://www.php.net//images/news/phpkonf_2015.png';
$Img = File_Get_Contents($Url);
File_Put_Contents($File = basename($Url), $Img);
setWindowsDesktop(realpath($File));