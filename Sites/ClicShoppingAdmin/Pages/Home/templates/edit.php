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

  use ClicShopping\OM\HTML;
  use ClicShopping\OM\Registry;
  use ClicShopping\OM\ObjectInfo;

  use ClicShopping\Sites\ClicShoppingAdmin\HTMLOverrideAdmin;

  use ClicShopping\Apps\Catalog\New_Template\Classes\ClicShoppingAdmin\NewTemplateAdmin;

  Registry::set('NewTemplateAdmin', new NewTemplateAdmin());
  $CLICSHOPPING_NewTemplateAdmin = Registry::get('NewTemplateAdmin');
  $CLICSHOPPING_ProductsAdmin = Registry::get('ProductsAdmin');
  $CLICSHOPPING_Language = Registry::get('Language');
  $CLICSHOPPING_Address = Registry::get('Address');
  $CLICSHOPPING_New_Template = Registry::get('New_Template');

  $CLICSHOPPING_Page = Registry::get('Site')->getPage();

  $form_action = 'Insert';

  if ( (isset($_GET['Edit']) && isset($_GET['mID']) && !empty($_GET['mID']))) {
    $form_action = 'Update';
    $variable =  '&mID=' . $_GET['mID'];
  }
?>
  <div class="contentBody">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-block headerCard">
          <div class="row">
            <span class="col-md-1 logoHeading"><?php echo HTML::image($CLICSHOPPING_Template->getImageDirectory() . '/categories/new_template.gif', $CLICSHOPPING_New_Template->getDef('heading_title'), '40', '40'); ?></span>
            <span class="col-md-4 pageHeading"><?php echo '&nbsp;' . $CLICSHOPPING_New_Template->getDef('heading_title'); ?></span>
            <span class="col-md-7 text-md-right">
<?php
  echo HTML::form ('new_template',  $CLICSHOPPING_New_Template->link('New_Template&' . $form_action . $variable) );
  if ($form_action == 'Update') echo HTML::hiddenField('new_template_id', $_GET['mID']);

  echo HTML::button($CLICSHOPPING_New_Template->getDef('button_cancel'), null, $CLICSHOPPING_New_Template->link('New_Template&page=' . (int)$_GET['page'] . '&mID=' . $_GET['mID']), 'warning') .'&nbsp;';
  echo (($form_action == 'Insert') ? HTML::button($CLICSHOPPING_New_Template->getDef('button_insert'), null, null, 'success') : HTML::button($CLICSHOPPING_New_Template->getDef('button_update'), null, null, 'success'));
?>
            </span>
          </div>
        </div>
      </div>
    </div>
    <div class="separator"></div>


</form>
</div>

