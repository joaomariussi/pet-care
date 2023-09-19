<?php

use App\Exceptions\CustomLog;
use App\Notifications\UserNotification;
use Illuminate\Http\RedirectResponse;

/**
 * @param Throwable|Exception $exeption
 * @return array
 */
function context(Throwable|Exception $exeption): array
{
    return [$exeption->getMessage(), $exeption->getFile(), $exeption->getLine()];
}

/**
 * @param Exception $exeption
 * @param $mode
 * @return RedirectResponse
 */
function contentsError(Exception $exeption, $mode = null): RedirectResponse
{
    UserNotification::error($exeption->getMessage());
    return match ($mode) {
        'wi' => redirect()->back()->withInput(),
        default => redirect()->back(),
    };
}

/**
 * @param Throwable $t
 * @param string|bool $message
 * @param string $redirectmode
 * @return RedirectResponse|null
 */
function applicationError(Throwable $t, string|bool $message = '', string $redirectmode = ''): RedirectResponse|null
{
    CustomLog::error($t);
    if ($message !== false) UserNotification::error($message);
    return match ($redirectmode) {
        'wi' => redirect()->back()->withInput(),
        default => redirect()->back(),
    };
}
