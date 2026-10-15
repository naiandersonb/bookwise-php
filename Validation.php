<?php
class Validation
{
  public $validations;
  public static function validate($roles, $data = null)
  {
    $validation = new Validation;
    foreach ($roles as $field => $roleField) {
      $validation->$roleField;
    }
    return $validation;
  }

  private function required($field)
  {
    if (strlen(($field) == 0)) {
      $this->validations[] = "O $field é obrigatório";
    }
  }
}