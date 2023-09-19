<?php

namespace App\Notifications;

use Illuminate\Support\Facades\Session;

class UserNotification
{

    /**
     * Adiciona qualquer tipo de notificação
     *
     * @param string $level
     * @param string $title
     * @param array|string $messages
     */
    static function notify(string $level, string $title, array|string $messages): void
    {
        self::mountNotification($level, $title, $messages);
    }

    /**
     * Adiciona notificação de sucesso
     *
     * @param array|string $messages
     * @param string $title
     */
    static function success(array|string $messages, string $title = "Sucesso!"): void
    {
        self::mountNotification("success", $title, $messages ?: "Ocorreu um erro inesperado");
    }

    /**
     * Adiciona notificação de erro
     *
     * @param array|string $messages
     * @param string $title
     */
    static function error(array|string $messages = [], string $title = "Erro!"): void
    {
        self::mountNotification("error", $title, $messages ?: "Ocorreu um erro inesperado");
    }

    /**
     * Adiciona notificação de aviso
     *
     * @param array|string $messages
     * @param string $title
     */
    static function warning(array|string $messages, string $title = "Aviso!"): void
    {
        self::mountNotification("warning", $title, $messages ?: "Ocorreu um erro inesperado");
    }

    /**
     * Monta a notificação na sessão
     *
     * @param $level
     * @param $title
     * @param $messages
     */
    static function mountNotification($level, $title, $messages): void
    {
        $notificationMessages['title'] = $title;
        $notificationMessages['messages'] = Session::has($level) ? Session::get($level)['messages'] : [];

        if (is_array($messages)) {
            foreach ($messages as $message) {
                $notificationMessages['messages'][] = $message;
            }
        } else {
            $notificationMessages['messages'][] = $messages;
        }

        Session::put($level , $notificationMessages);
    }
}
