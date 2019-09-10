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

  namespace ClicShopping\Apps\Catalog\New_Template\Sites\ClicShoppingAdmin\Pages\Home\Actions\Configure;

  use ClicShopping\OM\Registry;
  use ClicShopping\OM\Cache;
  use ClicShopping\OM\CLICSHOPPING;

  class Install extends \ClicShopping\OM\PagesActionsAbstract {

    public function execute() {

      $CLICSHOPPING_MessageStack = Registry::get('MessageStack');
      $CLICSHOPPING_New_Template = Registry::get('New_Template');

      $current_module = $this->page->data['current_module'];

      $CLICSHOPPING_New_Template->loadDefinitions('Sites/ClicShoppingAdmin/install');

      $m = Registry::get('New_TemplateAdminConfig' . $current_module);
      $m->install();

      static::installDbMenuAdministration();
      static::installDb();

      $CLICSHOPPING_MessageStack->add($CLICSHOPPING_New_Template->getDef('alert_module_install_success'), 'success', 'New_Template');

      $CLICSHOPPING_New_Template->redirect('Configure&module=' . $current_module);
    }

    private static function installDbMenuAdministration() {
      $CLICSHOPPING_Db = Registry::get('Db');
      $CLICSHOPPING_New_Template = Registry::get('New_Template');
      $CLICSHOPPING_Language = Registry::get('Language');

      $Qcheck = $CLICSHOPPING_Db->get('administrator_menu', 'app_code', ['app_code' => 'app_catalog_new_template']);

      if ($Qcheck->fetch() === false) {

        $sql_data_array = ['sort_order' => 7,
                           'link' => 'index.php?A&Catalog\New_Template&New_Template',
                           'image' => 'new_template.gif',
                           'b2b_menu' => 0,
                           'access' => 0,
                           'app_code' => 'app_catalog_new_template'
                          ];

        $insert_sql_data = ['parent_id' => 3];

        $sql_data_array = array_merge($sql_data_array, $insert_sql_data);

        $CLICSHOPPING_Db->save('administrator_menu', $sql_data_array);

        $id = $CLICSHOPPING_Db->lastInsertId();

        $languages = $CLICSHOPPING_Language->getLanguages();

        for ($i=0, $n=count($languages); $i<$n; $i++) {

          $language_id = $languages[$i]['id'];

          $sql_data_array = ['label' => $CLICSHOPPING_New_Template->getDef('title_menu')];

          $insert_sql_data = ['id' => (int)$id,
                              'language_id' => (int)$language_id
                             ];

          $sql_data_array = array_merge($sql_data_array, $insert_sql_data);

          $CLICSHOPPING_Db->save('administrator_menu_description', $sql_data_array );
        }

        Cache::clear('menu-administrator');
      }
    }

    private static function installDb() {
      $CLICSHOPPING_Db = Registry::get('Db');

/*
 * uncomment if you need to create a db when the apps is installed
      $Qcheck = $CLICSHOPPING_Db->query('show tables like ":table_new_template"');

      if ($Qcheck->fetch() === false) {
        $sql = <<<EOD
CREATE TABLE :table_new_template (
  new_template_id int not null auto_increment,
  new_template_name varchar(32) NOT NULL,
  new_template_image varchar(255),
  date_added datetime,
  last_modified datetime,
  new_template_manager varchar(64),
  new_template_phone varchar(32),
  new_template_email_address varchar(96),
  new_template_fax varchar(32),
  new_template_address varchar(64),
  new_template_suburb varchar(32),
  new_template_postcode varchar(10),
  new_template_city varchar(32),
  new_template_states varchar(32),
  new_template_country_id int NOT NULL DEFAULT 0,
  new_template_notes text,
  new_template_status int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (new_template_id),
  ADD KEY idx_new_template_name (new_template_name)
) CHARSET=utf8 COLLATE=utf8_unicode_ci;
EOD;
        $CLICSHOPPING_Db->exec($sql);
      }


      $Qcheck = $CLICSHOPPING_Db->query('show tables like ":table_new_template_info"');

      if ($Qcheck->fetch() === false) {
        $sql = <<<EOD
CREATE TABLE :table_new_template_info (
  new_template_id int NOT NULL DEFAULT 0,
  languages_id int NOT NULL DEFAULT 0,
  new_template_url varchar(255),
  url_clicked int(5) NOT NULL DEFAULT 0
  date_last_click datetime
  PRIMARY KEY new_template_id (languages_id)
) CHARSET=utf8 COLLATE=utf8_unicode_ci;
EOD;
        $CLICSHOPPING_Db->exec($sql);
      }
*/
    }
  }
