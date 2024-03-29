<?php
/**
 *
 *  @copyright 2008 - https://www.clicshopping.org
 *  @Brand : ClicShopping(Tm) at Inpi all right Reserved
 *  @Licence GPL 2 & MIT

 *  @Info : https://www.clicshopping.org/forum/trademark/
 *
 */


  namespace ClicShopping\Apps\Catalog\New_Template\Sites\ClicShoppingAdmin\Pages\Home\Actions\New_Template;

  use ClicShopping\OM\Registry;
  use ClicShopping\Apps\Catalog\New_Template\Classes\ClicShoppingAdmin\Status;

  class SetFlag extends \ClicShopping\OM\PagesActionsAbstract {
    protected mixed $app;

    public function __construct() {
      $this->app = Registry::get('New_Template');
    }

    public function execute() {

      $this->app->redirect('New_Template&' . (int)$_GET['page'] . '&mID=' . (int)$_GET['id']);
    }
  }