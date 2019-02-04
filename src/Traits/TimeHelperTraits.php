<?php

namespace Raystech\StarterKit\Traits;

use Carbon\Carbon;

trait TimeHelperTraits
{

  public function getThaiMonth() {
    try {
      $date = Carbon::parse($this->updated_at);
    }
    catch (\Exception $err) {
      $date = Carbon::now();
    }

    $month_th = [
      "",
      "มกราคม",
      "กุมภาพันธ์",
      "มีนาคม",
      "เมษายน",
      "พฤษภาคม",
      "มิถุนายน",
      "กรกฎาคม",
      "สิงหาคม",
      "กันยายน",
      "ตุลาคม",
      "พฤศจิกายน",
      "ธันวาคม",
    ];
    $month_index = $date->month;

    if (isset($month_th[$month_index])) {
      return $month_th[$month_index];
    }
    return '';
  }

  public function ago()
  {
    if(!$this->created_at) {
      return 'n/a';
    }
    $time = Carbon::parse($this->created_at);
    $diff = $time->diffInSeconds(Carbon::now());
    if ($diff == 0) {
      return 'Just now';
    }
    $intervals = array(
      1                => array('year', 31556926),
      $diff < 31556926 => array('month', 2628000),
      $diff < 2629744  => array('week', 604800),
      $diff < 604800   => array('day', 86400),
      $diff < 86400    => array('hr', 3600),
      $diff < 3600     => array('min', 60),
      $diff < 60       => array('second', 1),
    );
    $value = floor($diff / $intervals[1][1]);
    $ago = $value.' '.$intervals[1][0].($value > 1 ? 's' : '');

    // $ago  = $value . ' ' . $intervals[1][0];
    $days = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
    $day  = $time->format('d');
    // return $intervals[1][0];
    if ($ago == '1 day') {
      return 'Yesterday at ' . $time->format('H:i');
    } elseif ($value <= 59 && $intervals[1][0] == 'second' || $intervals[1][0] == 'min' || $intervals[1][0] == 'hr') {
      return $ago;
    } elseif($time->year == Carbon::now()->year) {
      return $time->format('M d') . ' at ' . $time->format('H:i');
    } else {
      return $time->format('M d, Y') . ' at ' . $time->format('H:i');
    }
  }
}