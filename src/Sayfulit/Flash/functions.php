<?php

if ( ! function_exists('flash')) {

    /**
     * Arrange for a flash message.
     *
     * @param  string|null $message
     * @param  string      $level
     * @return \Laracasts\Flash\FlashNotifier
     */
    function flash($title = null, $message = null)
    {
        $notifier = app('flash');

        if (func_num_args() == 0) {
            return $notifier;
        }

        return $notifier->info($title, $message);
    }

}
