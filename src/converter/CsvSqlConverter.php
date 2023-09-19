<?php
namespace taskforce\converver;

use taskforce\exceptions\ConverterException;

class CsvSqlConverter {

  protected array $filesToConvert; // сохраняем объекты класса SplFileInfo

  /**
   * CsvSqlConverter constructor.
   * @param $inputDir
   * @throws ConverterException
   */
  public function __construct(string $inputDir)
  {
    if(!is_dir($inputDir))
    {
      throw new ConverterException("Указанная директория не существует");
    }

    $this->loadCsvFiles($inputDir);
    
  }
  // добавить в массив объекты SplFileInfo, которые хранят всю инфу о файле
  private function loadCsvFiles(string $inputDir): void
  {
    foreach( new DirectoryIterator($inputDir) as $file)
    {
      if($file->getExtension() == 'cvs')
      {
        $this->filesToConvert = $file->getFileInfo;
      }
    }
  }

  public function convertFiles(string $outputDir):array
  { // кладем в массив имена созданных файлов
    $result = [];

    foreach($filesToConvert as $file)
    {
      $result[] = $this->convertFile($file, $outputDir);
    }

    return $result;
  }


  private function convertFile(SplFileInfo $file, string $outputDir): string
  {
    $fileObject = new SplFileObject($file->getRealPath());
    $fileObject->setFlags(SplFileObject::READ_CVS);

    $colums = $fileObject->fgetcsv(); // возвращает массив
    $values = [];

    while($fileObject->eof())
    {
      $values[] = $fileObject->fgetcsv();
    }

    $tableName = $file->getBasename('csv');
    $sqlContent = $this->getSqlContent($tableName, $colums, $values);

    return $this->saveSqlContent($tableName, $outputDir, $sqlContent);
  }

  private function getSqlContent(string $tableName, array $colums, array $values): string
  { // $values  - двумерный массив
    $columsString = implode(", ", $colums); // строка с колонками таблицы
    $sql = "INSERT INTO $tableName ($columsString) VALUES";

    foreach ($values as $row)
    {
      array_walk($row, function (&$value)  // применяет заданную пользователем функцию к каждому элементу массива
      {
        $value = addslashes($value);
        $value = "'$value'";
      });

      $sql .="(" .implode(', ', $row) . "), ";
    }
    
    $sql = substr($sql, 0, -2);

  }

  private function saveSqlContent(string $tableName, string $outputDir, string $content):string
  {
    if(!is_dir($outputDir))
    {
      throw new ConverterException("Директории для выходных файлов не существует");
    }

    $filename = $outputDir . DIRECTORY_SEPARATOR . $tableName . '.sql';
    file_put_contents($filename, $content);

    return $filename;
  }

}


