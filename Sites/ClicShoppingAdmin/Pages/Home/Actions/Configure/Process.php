<?php
/**
 *
 *  @copyright 2008 - https://www.clicshopping.org
 *  @Brand : ClicShopping(Tm) at Inpi all right Reserved
 *  @Licence GPL 2 & MIT

 *  @Info : https://www.clicshopping.org/forum/trademark/
 *
 */

  namespace ClicShopping\Apps\Catalog\New_Template\Sites\ClicShoppingAdmin\Pages\Home\Actions\Configure;

  use ClicShopping\OM\Registry;

  class Process extends \ClicShopping\OM\PagesActionsAbstract  {
    public function execute() {
      $CLICSHOPPING_MessageStack = Registry::get('MessageStack');
      $CLICSHOPPING_New_Template = Registry::get('New_Template');

      $current_module = $this->page->data['current_module'];

      $m = Registry::get('New_TemplateAdminConfig' . $current_module);

      foreach ($m->getParameters() as $key) {
        $p = mb_strtolower($key);

        if (isset($_POST[$p])) {
          $CLICSHOPPING_New_Template->saveCfgParam($key, $_POST[$p]);
        }
      }

      $CLICSHOPPING_MessageStack->add($CLICSHOPPING_New_Template->getDef('alert_cfg_saved_success'), 'success', 'New_Template');

      $CLICSHOPPING_New_Template->redirect('Configure&module=' . $current_module);
    }
  }
