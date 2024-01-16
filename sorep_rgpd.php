<?php
/**
 * Copyright since 2007 PrestaShop SA and Contributors
 * PrestaShop is an International Registered Trademark & Property of PrestaShop SA
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License version 3.0
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * @author    PrestaShop SA and Contributors <contact@prestashop.com>
 * @copyright Since 2007 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License version 3.0
 */


if (!defined('_PS_VERSION_'))
  exit;
 
class Sorep_Rgpd extends Module
{
	public function __construct()
	{
		$this->name = 'sorep_rgpd';
        $this->tab = 'administration';
        $this->version = '1.0.0';
        $this->author = 'HES Inovacao';
        $this->need_instance = 0;
        $this->bootstrap = false;
	 
		parent::__construct();
	 
		$this->displayName = $this->l('Sorep RGPD');
		$this->description = $this->l('Module for privacy police of sorep website');
	 
		$this->confirmUninstall = $this->l('Are you sure you want to uninstall?');
		
		$this->ps_versions_compliancy = [
            'min' => '1.7.5',
            'max' => _PS_VERSION_,
        ];
		
		if (!Configuration::get('SOREPRGPD'))      
		  $this->warning = $this->l('No name provided');
	}
  
	public function install()
	{

          // Legacy BO Controller does not use namespaces
          include_once dirname(__FILE__).'/controllers/admin/adminsorep_rgpdController.php';

        if (Shop::isFeatureActive()) {
            Shop::setContext(Shop::CONTEXT_ALL);
        }



		return parent::install() && 
		$this->registerHook('displayHome') &&
		$this->registerHook('header') &&
        $this->registerHook('registerGDPRConsent') &&
        $this->registerHook('actionDeleteGDPRCustomer') &&
        $this->registerHook('actionExportGDPRData') &&
		$this->registerHook('actionFrontControllerSetMedia') ;;
	}
  
	public function uninstall()
	{
		return parent::uninstall();
	}

	public function hookDisplayHome($params)
    {
        $sql = " select * from `"._DB_PREFIX_."product` order by date_add desc limit 8";
        $products = Db::getInstance()->executeS($sql);
        $this->context->smarty->assign([
            'sorep_rgpd' => Configuration::get('sorep_rgpd'),
            'sorep_rgpd' => $this->context->link->getModuleLink('sorep_rgpd', 'displayHome')
        ]);
        
        $accessory_products=array();
        foreach($products as $product){

            $p = new Product($product["id_product"]);
            $id_image = Product::getCover($product["id_product"]);
            
            if (sizeof($id_image) > 0) {
                $image = new Image($id_image['id_image']);
                $image_url = _PS_BASE_URL_._THEME_PROD_DIR_.$image->getExistingImgPath().".jpg";
                $arraytest[] = $image_url;
            }
            $p->images=$arraytest;
            $accessory_products[]=$p;
        }

        $this->smarty->assign('accessory_data', $accessory_products);

        $this->_html .= $this->display(__FILE__, 'rgpd.tpl');
        return $this->_html;
    }




	public function hookDisplayHeader()
{
  $this->context->controller->addCSS($this->_path.'views/css/sorep_rgpd.css', 'all');
}
public function hookActionFrontControllerSetMedia()
    {
        $this->context->controller->registerStylesheet(
            'sorep_rgpd',
            $this->_path.'views/css/sorep_rgpd.css',
            [
                'media' => 'all',
                'priority' => 1000,
            ]
        );

		$this->context->controller->registerJavascript(
            'sorep_rgpd-javascript',
            $this->_path.'views/js/default.js',
            [
                'position' => 'bottom',
                'priority' => 1000,
            ]
        );
    }
public function hookHeader ($params)
{
     $this->context->controller->addJS($this->_path.'views/js/default.js');
     $this->context->controller->addCSS($this->_path.'views/css/sorep_rgpd.css');
}


public function hookActionDeleteGDPRCustomer ($customer)
{
    if (!empty($customer['email']) && Validate::isEmail($customer['email'])) {
        $sql = "DELETE FROM "._DB_PREFIX_."popnewsletter_subcribers WHERE email = '".pSQL($customer['email'])."'";
        if (Db::getInstance()->execute($sql)) {
            return json_encode(true);
        }
        return json_encode($this->l('Newsletter Popup : Unable to delete customer using email.'));
    }
}

public function hookActionExportGDPRData ($customer)
   {
       if (!Tools::isEmpty($customer['email']) && Validate::isEmail($customer['email'])) {
           $sql = "SELECT * FROM "._DB_PREFIX_."popnewsletter_subcribers WHERE email = '".pSQL($customer['email'])."'";
           if ($res = Db::getInstance()->ExecuteS($sql)) {
               return json_encode($res);
           }
           return json_encode($this->l('Newsletter Popup : Unable to export customer using email.'));
           $this->context->smarty->assign(array('sorep_rgpd' => $this->id));
       }
   }

}
