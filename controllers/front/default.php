<?php
/**
 * <ModuleClassName> => catalogSlider
 * <FileName> =>showSlider.php
 * Format expected: <ModuleClassName><FileName>ModuleFrontController
 */
class Sorep_RgpdShowModalModuleFrontController extends ModuleFrontController
{ 

    public function __construct() {
    parent::__construct();  

    }

    public function init() {
      parent::init();

    }

    public function initContent()
    {
   $this->setTemplate('module:sorep_rgpd/views/templates/hook/slider.tpl');
      parent::initContent();
      $this->context->smarty->assign(array());
      if (Tools::getValue('id') != '')
     $this->setTemplate('slider.tpl');
     else
    $this->errors[] = Tools::displayError('You do not have permission to view this.');
  
  
    
    
    $sql = " select * from `"._DB_PREFIX_."product` ";
    $acessory_data = Db::getInstance()->executeS($sql);
 
    
    //and now pass data to template 
    $this->context->smarty->assign([
      'accessory' => $presented_accessory,
      'acessory_data' => $acessory_data, // passing data to template 
    ]);
    
    
    
    // $this->setTemplate('sorep_rgpd/slider');
  



  }

  public function setMedia() {
    $this->registerStylesheet(
      'sorep_rgpd-default',
      'modules/fbsample_messageoftheday/views/css/sorep_rgpd.css',
      array('media' => 'all', 'priority' => 150)
  );
  $this->context->controller->registerJavascript(
      'sorep_rgpd-default',
      'modules/fbsample_messageoftheday/views/js/default.js',
      ['position' => 'bottom', 'priority' => 150]
  );
  parent::setMedia();
  }
                 
      
                }
                
              
  
              
              
              // $sql = 'SELECT * FROM ps_accessory  ';
              // $result = Db::getInstance()->ExecuteS($sql);
              // if(Tools::issubmit('result'))
              //     {
                //         $custdata = Tools::getValue('ps_accessory');
    //         echo 'test test'.$custdata;     
    //     }
 
 //set template
    
    // /** @var \Db $db */
    // $db = \Db::getInstance();
    // $request = 'SELECT `sorep_db` FROM `' . _DB_PREFIX_ . 'ps_accessory` ...';
    // /** @var array $result */
    // $result = $db->executeS($request);
    // $this->context->smarty->assign("request" , $request);
    
  // echo "<script> alert('vou parar dentro do php'); </script>";
  
  //public function Link::getModuleLink($sorep_rgpd, $showSlider, array $params = array());
   
   
   
   
   
   
   //     $db = Db::getInstance(_PS_USE_SQL_SLAVE_);
    //     $sql = " SELECT '*' FROM `"._DB_PREFIX_."ps_accessory`  WHERE id_product='".$this->context->product->id."'";
    //     $productData = Db::getInstance()->executeS($sql);
  
  
    //   //and now pass data to template 
    //   $this->context->smarty->assign([
    // 'product' => $product,
    //  'productData' => $productData, // passing data to template 
    //  ]);
    // $this->setTemplate('hook/slider.tpl');
    // var_dump($productData);
    // die();
        