<?php
/**
 *
 *  @copyright 2008 - https://www.clicshopping.org
 *  @Brand : ClicShopping(Tm) at Inpi all right Reserved
 *  @Licence GPL 2 & MIT
 *  @licence MIT - Portion of osCommerce 2.4
 *  @Info : https://www.clicshopping.org/forum/trademark/
 *
 */

  namespace ClicShopping\Apps\Catalog\New_Template\Sites\ClicShoppingAdmin\Pages\Home\Actions\New_Template;

  use ClicShopping\OM\Registry;

  class DeleteAll extends \ClicShopping\OM\PagesActionsAbstract {
    protected mixed $app;

    public function __construct() {
      $this->app = Registry::get('New_Template');
    }

    public function execute() {

      if (isset($_POST['selected'])) {
        foreach ($_POST['selected'] as $id ) {

        }
      }

      $this->app->redirect('New_Template');
    }
  }