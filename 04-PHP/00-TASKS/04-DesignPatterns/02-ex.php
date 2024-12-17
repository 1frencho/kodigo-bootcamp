<?php

/*
Ejercicio 2:

Estamos trabajando con distintas versiones de sistemas operativos Windows 7 y Windows 10. 
Al compartir archivos como Word, Excel, Power Point, surgen problemas al abrirlos en Windows 10 debido a la falta de compatibilidad con la versión Windows 7. Debes crear un programa donde Windows 10 pueda aceptar estos archivos independientemente de que sean de versiones anteriores.

Para ello, aplica el patrón de diseño Adapter utilizando Composición.

Following docs: https://gist.github.com/im4aLL/ba0504e2a3a931ee0fa07a8b4b63592d

*/

// Interfaz común para los sistemas de archivos
interface FileSharingSystem
{
  public function shareFile($filePath, $targetSystem);
  public function openFile($filePath);
  public function deleteFile($filePath);
}

class Windows7FileSharingSystem
{
  public function shareFile($filePath, $targetSystem)
  {
    echo "Windows 7: Sharing file '$filePath' to $targetSystem." . PHP_EOL;
  }

  public function openFile($filePath)
  {
    echo "Windows 7: Opening file '$filePath'." . PHP_EOL;
  }

  public function deleteFile($filePath)
  {
    echo "Windows 7: Deleting file '$filePath'." . PHP_EOL;
  }
}

class Windows10FileSharingSystem implements FileSharingSystem
{
  public function shareFile($filePath, $targetSystem)
  {
    echo "Windows 10: Sharing file '$filePath' to $targetSystem." . PHP_EOL;
  }

  public function openFile($filePath)
  {
    echo "Windows 10: Opening file '$filePath'." . PHP_EOL;
  }

  public function deleteFile($filePath)
  {
    echo "Windows 10: Deleting file '$filePath'." . PHP_EOL;
  }
}

// Adapter
class Windows7ToWindows10Adapter implements FileSharingSystem
{
  private $windows7System;

  public function __construct(Windows7FileSharingSystem $windows7System)
  {
    $this->windows7System = $windows7System;
  }

  public function shareFile($filePath, $targetSystem)
  {
    echo "Adapter: Converting file '$filePath' to Windows 10 compatible format..." . PHP_EOL;
    $this->windows7System->shareFile($filePath, $targetSystem);
  }

  public function openFile($filePath)
  {
    echo "Adapter: Converting and opening file '$filePath' in Windows 10..." . PHP_EOL;
    $this->windows7System->openFile($filePath);
  }

  public function deleteFile($filePath)
  {
    echo "Adapter: Deleting file '$filePath' from Windows 10 view..." . PHP_EOL;
    $this->windows7System->deleteFile($filePath);
  }
}

// File on Windows 7
$windows7System = new Windows7FileSharingSystem();

// Adapting the file system to Windows 10
$adapter = new Windows7ToWindows10Adapter($windows7System);

$adapter->shareFile('document.docx', 'Windows 10');
$adapter->openFile('presentation.pptx');
$adapter->deleteFile('report.pdf');

$windows10System = new Windows10FileSharingSystem();
$windows10System->shareFile('newfile.xlsx', 'Windows 7');
$windows10System->openFile('newfile.xlsx');


/**
 * Adapter: Converting file 'document.docx' to Windows 10 compatible format...
 * Windows 7: Sharing file 'document.docx' to Windows 10.
 * Adapter: Converting and opening file 'presentation.pptx' in Windows 10...
 * Windows 7: Opening file 'presentation.pptx'.
 * Adapter: Deleting file 'report.pdf' from Windows 10 view...
 * Windows 7: Deleting file 'report.pdf'.
 * Windows 10: Sharing file 'newfile.xlsx' to Windows 7.
 * Windows 10: Opening file 'newfile.xlsx'.
 */
