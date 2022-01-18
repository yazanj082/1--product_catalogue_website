<?php namespace App\Validation;

class ExtendedRules {
/**
   * Codeigniter rules format
   *
   * @param [type] $str
   * @return void
   */
  public function username($str){
    return (bool) preg_match('/^[A-Z0-9\_\-.\[\]]+$/i', $str);
  }


  public function icon_class($str){
    return (bool) preg_match('/^[A-Z 0-9_\-\|]+$/i', $str);
  }
    
}