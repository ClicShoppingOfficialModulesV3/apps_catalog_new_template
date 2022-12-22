<?php
/**
 *
 *  @copyright 2008 - https://www.clicshopping.org
 *  @Brand : ClicShopping(Tm) at Inpi all right Reserved
 *  @Licence GPL 2 & MIT

 *  @Info : https://www.clicshopping.org/forum/trademark/
 *
 */

  namespace ClicShopping\Apps\Catalog\New_Template\Module\ClicShoppingAdmin\Config\NT\Params;

  class sort_order extends \ClicShopping\Apps\Catalog\New_Template\Module\ClicShoppingAdmin\Config\ConfigParamAbstract {

    public $default = '300';
    public bool $app_configured = false;

    protected function init() {
        $this->title = $this->app->getDef('cfg_new_template_sort_order_title');
        $this->description = $this->app->getDef('cfg_new_template_sort_order_description');
    }
  }
