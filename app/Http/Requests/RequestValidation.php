<?php


namespace App\Http\Requests;

use App\Exceptions\CustomLog;

/**
 * Class RequestValidation
 * @package App\Http\Requests
 */
class RequestValidation
{

    /**
     * Validação de cnpj
     *
     * @param null $cnpj
     * @return bool
     */
    static function validateCnpj($cnpj = null): bool
    {

        // Verifica se um número foi informado
        if(empty($cnpj)) {
            return false;
        }

        // Elimina possivel mascara
        $cnpj = self::removeMask($cnpj);
        $cnpj = self::strPad($cnpj);

        // Verifica se o numero de digitos informados é igual a 14
        if (strlen($cnpj) != 14) {
            return false;
        }

        // Verifica se nenhuma das sequências invalidas abaixo
        // foi digitada. Caso afirmativo, retorna falso
        else if ($cnpj == '00000000000000' ||
            $cnpj == '11111111111111' ||
            $cnpj == '22222222222222' ||
            $cnpj == '33333333333333' ||
            $cnpj == '44444444444444' ||
            $cnpj == '55555555555555' ||
            $cnpj == '66666666666666' ||
            $cnpj == '77777777777777' ||
            $cnpj == '88888888888888' ||
            $cnpj == '99999999999999') {
            return false;

            // Calcula os digitos verificadores para verificar se o
            // cnpj é válido
        } else {

            $j = 5;
            $k = 6;
            $soma1 = 0;
            $soma2 = 0;

            for ($i = 0; $i < 13; $i++) {

                $j = $j == 1 ? 9 : $j;
                $k = $k == 1 ? 9 : $k;

                $soma2 += ($cnpj[$i] * $k);

                if ($i < 12) {
                    $soma1 += ($cnpj[$i] * $j);
                }

                $k--;
                $j--;

            }

            $digito1 = $soma1 % 11 < 2 ? 0 : 11 - $soma1 % 11;
            $digito2 = $soma2 % 11 < 2 ? 0 : 11 - $soma2 % 11;

            return (($cnpj[12] == $digito1) and ($cnpj[13] == $digito2));

        }
    }

    /**
     * Valida cpf
     * @param $cpf
     * @return bool|string
     */
    static function validaCPF($cpf): bool|string
    {

        // Extrai somente os números
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );

        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }

        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return $cpf;

    }

    /**
     * Remove máscara de campo cpf e cnpj
     *
     * @param $attribute
     * @return string
     */
    static function removeMask($attribute): string
    {
        return preg_replace("/[^0-9]/", "", $attribute);
    }

    /**
     * @param $attribute
     * @return string
     */
    static function strPad($attribute): string
    {
        return str_pad($attribute, 14, '0', STR_PAD_LEFT);
    }

    /**
     * Remove duplicados
     * @param array $attributes
     * @return array
     */
    static function removeDuplicateValues(array $attributes = []): array
    {
        return array_unique($attributes);
    }

}
