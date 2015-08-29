<?php

class Walk extends Eloquent {
  public $timestamps = false;  

  public function user() {
    return $this->hasOne('User', 'id', 'host_id');
  }

  public function get_friendliness(){
    if($this->dog_friendliness == 0)
      return "Friendly";
    if($this->dog_friendliness == 1)
      return "Cordial";
    if($this->dog_friendliness == 2)
      return "Neutral";
    if($this->dog_friendliness == 3)
      return "Warning";
    if($this->dog_friendliness == 4)
      return "Mean";
  }

  public function get_pace(){
    if($this->pace == 0)
      return "Slow";
    if($this->pace == 0)
      return "Steady";
    if($this->pace == 0)
      return "Brisk";
    if($this->pace == 0)
      return "Jog";

  }

  public function get_time_remaining(){
    $now = strtotime(date("%H:%i"));
    $end = strtotime($this->finish);
    $remaining = $end - $now;
    return date('i', $remaining);
  }
}
