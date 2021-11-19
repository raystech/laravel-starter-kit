<?php

namespace Raystech\StarterKit\Exceptions;

use Exception;

class TermException extends Exception
{

  public static function fileDoesNotExist(string $path)
  {
    return new static("File `{$path}` does not exist");
  }

  public static function unknownType()
  {
    return new static("Only strings, FileObjects and UploadedFileObjects can be imported");
  }

  public static function diskDoesNotExist($diskName)
  {
    return new static("There is no filesystem disk named `{$diskName}`");
  }
}
