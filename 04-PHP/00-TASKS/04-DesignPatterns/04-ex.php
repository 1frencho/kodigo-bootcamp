<?php


/**
 * 
 * Ejercicio 4:
 * Tenemos un sistema donde mostramos mensajes en distintos tipos de salida, como por consola, 
 * formato JSON y archivo TXT. Debes crear un programa donde se muestren todos estos tipos de salidas.
Para este propósito, aplica el patrón de diseño Strategy.

Docs: https://kongulov.dev/blog/mastering-the-strategy-design-pattern-in-php#:~:text=In%20PHP%2C%20the%20strategy%20design,specific%20implementation%20for%20each%20strategy.
 */

interface MessageOutputStrategy
{
  public function display(string $message): void;
}

class ConsoleOutput implements MessageOutputStrategy
{
  public function display(string $message): void
  {
    echo "Console Output: " . $message . "\n";
  }
}

class JSONOutput implements MessageOutputStrategy
{
  public function display(string $message): void
  {
    $jsonMessage = json_encode(["message" => $message], JSON_PRETTY_PRINT);
    echo "JSON Output:\n" . $jsonMessage . "\n";
  }
}

class FileOutput implements MessageOutputStrategy
{
  private $filePath;

  public function __construct(string $filePath = "output.txt")
  {
    $this->filePath = $filePath;
  }

  public function display(string $message): void
  {
    file_put_contents($this->filePath, $message . PHP_EOL, FILE_APPEND);
    echo "Message saved to file: " . $this->filePath . "\n";
  }
}

class MessageOutputContext
{
  private $outputStrategy;

  public function setOutputStrategy(MessageOutputStrategy $strategy): void
  {
    $this->outputStrategy = $strategy;
  }

  public function showMessage(string $message): void
  {
    if (!$this->outputStrategy) {
      throw new Exception("No output strategy set.");
    }
    $this->outputStrategy->display($message);
  }
}

// Test
try {
  $context = new MessageOutputContext();

  $message = "Hiiiiiiiiiiiiiiiiiiiiiiiiii!";

  // Console Output
  $context->setOutputStrategy(new ConsoleOutput());
  $context->showMessage($message);

  // JSON Output
  $context->setOutputStrategy(new JSONOutput());
  $context->showMessage($message);

  // File Output
  $context->setOutputStrategy(new FileOutput());
  $context->showMessage($message);
} catch (Exception $e) {
  echo "Error: " . $e->getMessage() . "\n";
}


/**
 * Console Output: Hiiiiiiiiiiiiiiiiiiiiiiiiii!
JSON Output:
{
  "message": "Hiiiiiiiiiiiiiiiiiiiiiiiiii"
}
Message saved to file: output.txt
 */
