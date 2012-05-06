<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    /**
     * Initialises Kint class and sets up shorthand version functions d() and dd()
     * @param void
     * @return void
     */

    protected function _initKint()
    {
        $applicationConfig = $this->getOptions();

        $kintConfig = !empty($applicationConfig['Kint'])
            ? $applicationConfig['Kint']
            : array();

        Kint::init($kintConfig);
    }
}

