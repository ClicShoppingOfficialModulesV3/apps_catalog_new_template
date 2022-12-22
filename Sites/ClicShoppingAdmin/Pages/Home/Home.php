<?php
/**
 *
 *  @copyright 2008 - https://www.clicshopping.org
 *  @Brand : ClicShopping(Tm) at Inpi all right Reserved
 *  @Licence GPL 2 & MIT

 *  @Info : https://www.clicshopping.org/forum/trademark/
 *
 */

  namespace ClicShopping\Apps\Catalog\New_Template\Sites\ClicShoppingAdmin\Pages\Home;

  use ClicShopping\OM\Registry;

  use ClicShopping\Apps\Catalog\New_Template\New_Template;

  class Home extends \ClicShopping\OM\PagesAbstract {
    public mixed $app;

    protected function init() {
      $CLICSHOPPING_New_Template = new New_Template();
      Registry::set('New_Template', $CLICSHOPPING_New_Template);

      $this->app = Registry::get('New_Template');

      $this->app->loadDefinitions('Sites/ClicShoppingAdmin/main');
    }
  }
