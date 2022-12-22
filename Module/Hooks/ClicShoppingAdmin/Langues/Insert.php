<?php
/**
 *
 *  @copyright 2008 - https://www.clicshopping.org
 *  @Brand : ClicShopping(Tm) at Inpi all right Reserved
 *  @Licence GPL 2 & MIT

 *  @Info : https://www.clicshopping.org/forum/trademark/
 *
 */

  namespace ClicShopping\Apps\Catalog\New_Template\Module\Hooks\ClicShoppingAdmin\Langues;

  use ClicShopping\OM\Registry;
  use ClicShopping\OM\HTML;

  use ClicShopping\Apps\Catalog\New_Template\New_Template as New_TemplateApp;

  class Insert implements \ClicShopping\OM\Modules\HooksInterface {
    protected mixed $app;
    protected $insert_language_id;

    public function __construct()   {
      if (!Registry::exists('New_Template')) {
        Registry::set('New_Template', new New_TemplateApp());
      }

      $this->app = Registry::get('New_Template');
      $this->insert_language_id = HTML::sanitize($_POST['insert_id']);
      $this->lang =  Registry::get('Language');
    }

    private function insert() {
/*
      if (isset($this->insert_language_id)) {
        $Qnew_template = $this->app->db->prepare('select m.new_template_id as orig_new_template_id,
                                                      mi.*
                                              from :table_new_template m left join :table_new_template_info mi on m.new_template_id = mi.new_template_id
                                              where mi.languages_id = :languages_id
                                             ');

        $Qnew_template->bindInt(':languages_id', (int)$this->lang->getId());
        $Qnew_template->execute();

        while ($Qnew_template->fetch()) {
          $cols = $Qnew_template->toArray();

          $cols['new_template_id'] = $cols['orig_new_template_id'];
          $cols['languages_id'] = $this->insert_language_id;

          unset($cols['orig_new_template_id']);

          $this->app->db->save('new_template_info', $cols);
        }
      }
*/
    }

    public function execute() {
      if (!\defined('CLICSHOPPING_APP_NEW_TEMPLATE_CS_STATUS') || CLICSHOPPING_APP_NEW_TEMPLATE_CS_STATUS == 'False') {
        return false;
      }
/*
      if (isset($_GET['Insert'])) {
        $this->insert();
      }
*/
    }
  }