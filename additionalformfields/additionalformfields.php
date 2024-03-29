<?php
/**
* 2007-2024 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright 2007-2024 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/


if (!defined('_PS_VERSION_')) {
    exit;
}

class CustomRadioField extends FormField
{
    public function setOptions(array $options)
    {
        $this->options = $options;

        return $this;
    }
}

class Additionalformfields extends Module
{
    protected $config_form = false;

    public function __construct()
    {
        $this->name = 'additionalformfields';
        $this->tab = 'administration';
        $this->version = '1.0.0';
        $this->author = 'Hes Inovação';
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Additional Form Fields');
        $this->description = $this->l('Module that adds custom fields at the registeringpage.');

        $this->confirmUninstall = $this->l('');

        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => '8.0');
    }

    public function install()
    {
        return parent::install() && $this->registerHook('additionalCustomerFormFields');
    }

    public function uninstall()
    {
        return parent::uninstall();
    }



    public function hookAdditionalCustomerFormFields($params)
        {
            $format = $params['fields'];
        
            $options = array(
                array(
                    'id' => 'private',
                    'name' => 'private',
                    'value' => 1,
                    'label' => $this->trans('Private', [], 'Modules.AdditionalCustomerFormFields.Front'),
                )
            );
        
            $format['client_type'] = (new CustomRadioField())
                ->setName('client_type')
                ->setType('checkbox')
                ->setLabel($this->trans('Are you a Business client?', [], 'Modules.AdditionalCustomerFormFields.Front'))
                ->setRequired(true)
                ->setOptions($options);
        
            $params['fields'] = $format;
        }

}