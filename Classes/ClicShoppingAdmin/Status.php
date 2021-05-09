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

  class Status {

    protected $languages_id;
    protected $new_template_id;

/**
 * Status products new_template  - Sets the status of a product on new_template
 *
 * @param string new_template_id, status
 * @return string status on or off
 *
 */

    Public static function getNew_TemplateStatus($new_template_id, $status) {
      $CLICSHOPPING_Db = Registry::get('Db');

      if ($status === 1) {

        return $CLICSHOPPING_Db->save('new_template', ['new_template_status' => 1,
                                             'date_added' => 'null',
                                             'last_modified' => 'null'
                                            ],
                                            ['new_template_id' => (int)$new_template_id]
                            );

      } elseif ($status === 0) {

        return $CLICSHOPPING_Db->save('new_template', ['new_template_status' => 0,
                                             'last_modified' => 'now()'
                                            ],
                                            ['new_template_id' => (int)$new_template_id]
                              );
      } else {
        return -1;
      }
    }
  }