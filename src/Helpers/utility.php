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

