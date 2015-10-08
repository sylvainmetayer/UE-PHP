<?php
class ExceptionPerso extends Exception
{
  public function __construct($message, $code = 0)
  {
    parent::__construct($message, $code);
  }

  public function __toString()
  {
    //Faire un switch selon le code retour avec des détails ?
    return $this->message;
  }
}
?>
