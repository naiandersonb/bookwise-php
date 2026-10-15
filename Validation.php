<?php
class Validation
{
  public $validations = [];

  public static function validate($regras, $dados)
  {
    $validation = new self;
    foreach ($regras as $campo => $regrasDoCampo) {
      foreach ($regrasDoCampo as $regra) {
        $valorDoCampo = $dados[$campo];

        if ($regra == 'confirmed') {
          $validation->$regra($campo, $valorDoCampo, $dados["confirm_{$campo}"]);
        } else if (str_contains($regra, ":")) {
          $temp = explode(":", $regra);
          $regra = $temp[0];
          $regraArg = $temp[1];
          $validation->$regra($regraArg, $campo, $valorDoCampo);
        } else {
          $validation->$regra($campo, $valorDoCampo);
        }
      }
    }

    return $validation;
  }

  private function required($field, $value)
  {
    if (strlen($value) == 0) {
      $this->validations[] = "O $field é obrigatório";
    }
  }

  private function email($field, $value)
  {
    if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
      $this->validations[] = "O $field é inválido";
    }
  }

  private function confirmed($field, $value, $confirmed_value)
  {
    if ($value !== $confirmed_value) {
      $this->validations[] = 'O e-mail de confirmação está diferente.';
    }
  }

  private function min($min, $campo, $valor)
  {
    if (strlen($valor) <= $min) {
      $this->validations[] = "O $campo precisa ter no mínino $min caracteres.";
    }
  }

  private function max($max, $campo, $valor)
  {
    if (strlen($valor) > $max) {
      $this->validations[] = "O $campo precisa ter no mínino $max caracteres.";
    }
  }

  public function isInvalid()
  {
    // $_SESSION['validations'] = $this->validations;
    flash()->push("validations", $this->validations);
    return sizeof($this->validations) > 0;
  }
}