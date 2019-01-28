<?php


if (! function_exists('flashtoast')) {
    /**
     * Arrange for a flash message.
     *
     * @param  string|null $message
     * @param  string      $level
     * @return \Laracasts\Flash\FlashNotifier
     */
    function flashtoast($message = null, $level = 'info')
    {
        $notifier = app('flashtoast');
        if (! is_null($message)) {
            return $notifier->message($message, $level);
        }
        return $notifier;
    }
  }

if (!function_exists('menuIsRoute')) {
  function menuIsRoute($route, $active_class = 'active') {
    $curr_route = Route::currentRouteName();
    if($route == $curr_route) {
      return $active_class;
    }
  }
}

if (!function_exists('urlDoesContainParam')) {
  function urlDoesContainParam($param_name, $param_value = true, $active_class = 'active') {
    if(request()->get($param_name) == $param_value) {
      return $active_class;
    }
  }
}

/**
 * prints array in readable format
 *
 * @param $data
 * @param bool $exit
 */
function prettyPrint($data, $exit = true)
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';

    if ($exit) {
        exit;
    }
}

