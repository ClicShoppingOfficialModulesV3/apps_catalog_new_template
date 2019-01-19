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

  namespace ClicShopping\Apps\Catalog\New_Template\Module\Hooks\ClicShoppingAdmin\Langues;

  use ClicShopping\OM\Registry;
  use ClicShopping\OM\HTML;

  use ClicShopping\Apps\Catalog\New_Template\New_Template as New_TemplateApp;

  class DeleteConfirm implements \ClicShopping\OM\Modules\HooksInterface {
    protected $app;

    public function __construct()   {
      if (!Registry::exists('New_Template')) {
        Registry::set('New_Template', new New_TemplateApp());
      }

      $this->app = Registry::get('New_Template');
    }

    private function delete($id) {
/*
      if (!is_null($id)) {
        $this->app->db->delete('new_template_info', ['languages_id' => $id]);
      }
*/
    }

    public function execute() {
      if (!defined('CLICSHOPPING_APP_NEW_TEMPLATE_CS_STATUS') || CLICSHOPPING_APP_NEW_TEMPLATE_CS_STATUS == 'False') {
        return false;
      }

      if (isset($_GET['DeleteConfirm'])) {
/*
        $id = HTML::sanitize($_GET['lID']);
        $this->delete($id);
*/
      }
    }
  }