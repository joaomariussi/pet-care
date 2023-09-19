<?php

use App\Exceptions\CustomLog;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

/**
 * @param $string
 * @return string
 */
function decimal($string): string
{
    if (!$string) {
        return "0.00";
    }
    return str_replace(['.', ','], ['', '.'], $string);
}

/**
 * Aplica mascara
 * @param $mask
 * @param $str
 * @return mixed
 */
function mask($mask,$str): mixed
{
    try {
        if (empty($str)) {
            return null;
        }
        $str = str_replace(" ","",$str);
        for($i=0;$i<strlen($str);$i++){
            $mask[strpos($mask,"#")] = $str[$i];
        }
        return $mask;
    } catch (Throwable $t) {
        return $str;
    }
}

/**
 * Remove qualquer caracter que não seja número
 * @param $attribute
 * @return string
 */
function removeMask($attribute): string
{
    return preg_replace("/[^0-9]/", "", $attribute);
}

/**
 * @info Retorna a url da loja formatado conforme ambiente
 * @return string|void
 */
function painelPartnerUrl()
{
    try {
        $sessionUrl = Session::get('rocky_admin.user.partner.domain');
        if (request()->isSecure()) {
            return "https://$sessionUrl";
        }
        return "http://$sessionUrl";
    } catch (Throwable $th) {
        CustomLog::error($th);
    }
}

if (!function_exists('form_collapse_errors')) {
    /**
     * @param $errors
     * @param array $keys
     * @return string
     */
    function form_collapse_errors($errors, array $keys = []): string
    {
        foreach ($errors->messages() as $key => $error) {
            if (in_array($key, $keys)) {
                return 'bg-label-danger';
            }
        }
        return'';
    }
}

if (!function_exists('open_collapse_on_error')) {
    /**
     * @param $errors
     * @param array $keys
     * @return string
     */
    function open_collapse_on_error($errors, array $keys = []): string
    {
        foreach ($errors->messages() as $key => $error) {
            if (in_array($key, $keys)) {
                return 'show';
            }
        }
        return '';
    }
}

if (!function_exists('form_collapse_errors_message')) {
    /**
     * @param $key
     * @param $message
     * @return string
     */
    function form_collapse_errors_message($key, $message): string
    {
        return "<label id='$key-error' class='is-invalid invalid-feedback' for='$key' style='display: block;'>$message</label>";
    }
}
