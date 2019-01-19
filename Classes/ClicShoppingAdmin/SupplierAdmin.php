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

  namespace ClicShopping\Apps\Catalog\New_Template\Classes\ClicShoppingAdmin;

  use ClicShopping\OM\Registry;

  class NewTemplateAdmin {

    protected $new_template_id;
    protected $language_id;
    protected $db;

    public function __construct() {
      $this->db = Registry::get('Db');
    }


/**
 * the new_template_url
 *
 * @param string  $new_template_id, $language_id
 * @return string $new_template['new_template_description'],  description of the new_template
 * @access public
 */
    public function getNewTemplateUrl($new_template_id, $language_id) {

      $Qnew_template = $this->db->prepare('select new_template_url
                                         from :table_new_template_info
                                         where new_template_id = :new_template_id
                                         and languages_id = :language_id
                                       ');
      $Qnew_template->bindInt(':new_template_id', (int)$new_template_id);
      $Qnew_template->bindInt(':language_id', (int)$language_id);

      $Qnew_template->execute();

      return $Qnew_template->value('new_template_url');
    }
  }