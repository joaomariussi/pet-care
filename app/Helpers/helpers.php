<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Config;

class helpers
{
    /**
     * @return array
     */
    public static function applClasses(): array
    {
        // valor de dados padrão
        $dataDefault = [
            'mainLayoutType' => 'menu',
            'theme' => 'light',
            'isContentSidebar'=> false,
            'pageHeader' => false,
            'bodyCustomClass' => '',
            'navbarBgColor' => 'bg-white',
            'navbarType' => 'fixed',
            'isMenuCollapsed' => false,
            'footerType' => 'static',
            'templateTitle' => '',
            'isCustomizer' => true,
            'isCardShadow' => true,
            'isScrollTop' => true,
            'defaultLanguage' => 'pt',
        ];

        // se alguma chave estiver faltando na matriz do arquivo custom.php, ela será mesclada e definirá um valor padrão da matriz dataDefault e armazenará na variável de dados
        $data = array_merge($dataDefault, config('custom.custom'));

        // todas as opções disponíveis de modelo de materialização
        $allOptions = [
            'mainLayoutType' => array('menu'),
            'theme' => array('light'=>'light'),
            'isContentSidebar'=> array(false,true),
            'pageHeader' => array(false,true),
            'bodyCustomClass' => '',
            'navbarBgColor' => array('bg-white','bg-primary', 'bg-success','bg-danger','bg-info','bg-warning','bg-dark'),
            'navbarType' => array('fixed'=>'fixed','static'=>'static','hidden'=>'hidden'),
            'isMenuCollapsed' => array(false,true),
            'footerType' => array('fixed'=>'fixed','static'=>'static','hidden'=>'hidden'),
            'templateTitle' => '',
            'isCustomizer' => array(true,false),
            'isCardShadow' => array(true,false),
            'isScrollTop' => array(true,false),
            'defaultLanguage'=>array('pt' => 'pt'),
        ];
        // navbar body class array
        $navbarBodyClass = [
            'fixed'=>'navbar-sticky',
            'static'=>'navbar-static',
            'hidden'=>'navbar-hidden',
        ];
        $navbarClass  = [
            'fixed'=>'fixed-top',
            'static'=>'navbar-static-top',
            'hidden'=>'d-none',
        ];
        // footer class
        $footerBodyClass = [
            'fixed'=>'fixed-footer',
            'static'=>'footer-static',
            'hidden'=>'footer-hidden',
        ];
        $footerClass = [
            'fixed'=>'footer-sticky',
            'static'=>'footer-static',
            'hidden'=>'d-none',
        ];

        // se algum valor de opções estiver vazio ou errado no arquivo de configuração custom.php, defina um valor padrão
        foreach ($allOptions as $key => $value) {
            if (gettype($data[$key]) === gettype($dataDefault[$key])) {
                if (is_string($data[$key])) {
                    if(is_array($value)){

                        $result = array_search($data[$key], $value);
                        if (empty($result)) {
                            $data[$key] = $dataDefault[$key];
                        }
                    }
                }
            } else {
                if (is_string($dataDefault[$key])) {
                    $data[$key] = $dataDefault[$key];
                } elseif (is_bool($dataDefault[$key])) {
                    $data[$key] = $dataDefault[$key];
                } elseif (is_null($dataDefault[$key])) {
                    is_string($data[$key]) ? $data[$key] = $dataDefault[$key] : '';
                }
            }
        }

        //  sobreposição de array acima por meio de dados dinâmicos
        $layoutClasses = [
            'mainLayoutType' => $data['mainLayoutType'],
            'theme' => $data['theme'],
            'isContentSidebar'=> $data['isContentSidebar'],
            'pageHeader' => $data['pageHeader'],
            'bodyCustomClass' => $data['bodyCustomClass'],
            'navbarBgColor' => $data['navbarBgColor'],
            'navbarType' => $navbarBodyClass[$data['navbarType']],
            'navbarClass' => $navbarClass[$data['navbarType']],
            'isMenuCollapsed' => $data['isMenuCollapsed'],
            'footerType' => $footerBodyClass[$data['footerType']],
            'footerClass' => $footerClass[$data['footerType']],
            'templateTitle' => $data['templateTitle'],
            'isCustomizer' => $data['isCustomizer'],
            'isCardShadow' => $data['isCardShadow'],
            'isScrollTop' => $data['isScrollTop'],
            'defaultLanguage' => $data['defaultLanguage'],
        ];

        // define o idioma padrão se a sessão não tiver valor de localidade usa o idioma padrão definido
        if(!session()->has('locale')){
            app()->setLocale($layoutClasses['defaultLanguage']);
        }

        return $layoutClasses;
    }

    /**
     * updatesPageConfig function override all
     * configuration of custom.php file as page requirements.
     * @param $pageConfigs
     * @return void
     */
    public static function updatePageConfig($pageConfigs): void
    {
        $demo = 'custom';
        $custom = 'custom';

        if (isset($pageConfigs)) {
            if (count($pageConfigs) > 0) {
                foreach ($pageConfigs as $config => $val) {
                    Config::set($demo . '.' . $custom . '.' . $config, $val);
                }
            }
        }
    }
}
