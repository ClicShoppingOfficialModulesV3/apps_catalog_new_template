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
  use ClicShopping\OM\CLICSHOPPING;

  $CLICSHOPPING_New_Template = Registry::get('New_Template');
  $CLICSHOPPING_Page = Registry::get('Site')->getPage();

  if (!isset($_GET['page']) || !is_numeric($_GET['page'])) {
    $_GET['page'] = 1;
  }
?>
  <div class="contentBody">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-block headerCard">
            <div class="row">
            <span class="col-md-1 logoHeading"><?php echo HTML::image($CLICSHOPPING_Template->getImageDirectory() . 'categories/new_template.gif', $CLICSHOPPING_New_Template->getDef('heading_title'), '40', '40'); ?></span>
            <span class="col-md-4 pageHeading"><?php echo '&nbsp;' . $CLICSHOPPING_New_Template->getDef('heading_title'); ?></span>
            <span class="col-md-7 text-md-right">
<?php
  echo HTML::button($CLICSHOPPING_New_Template->getDef('button_new'), null,$CLICSHOPPING_New_Template->link('Edit'), 'success');
  echo HTML::form('delete_all', $CLICSHOPPING_New_Template->link('New_Template&DeleteAll&page=' . (int)$_GET['page']));
?>
              <a onclick="$('delete').prop('action', ''); $('form').submit();" class="button"><span><?php echo HTML::button($CLICSHOPPING_New_Template->getDef('button_delete'), null, null, 'danger'); ?></span></a>
           </span>
          </div>
        </div>
      </div>
    </div>
    <div class="separator"></div>

    <table border="0" width="100%" cellspacing="0" cellpadding="2">
      <td>
        <table class="table table-sm table-hover table-striped">
          <thead>
            <tr class="dataTableHeadingRow">
              <th width="1" class="text-md-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></th>

              <th class="text-md-right"><?php echo $CLICSHOPPING_New_Template->getDef('table_heading_action'); ?>&nbsp;</th>
            </tr>
          </thead>
          <tbody>




<?php
  if ($listingTotalRow > 0) {
?>
    <div class="row">
      <div class="col-md-12">
        <div class="col-md-6 float-start pagenumber hidden-xs TextDisplayNumberOfLink"><?php echo $Qnew_template->getPageSetLabel($CLICSHOPPING_New_Template->getDef('text_display_number_of_link')); ?></div>
        <div class="float-end text-md-right"><?php echo $Qnew_template->getPageSetLinks(CLICSHOPPING::getAllGET(array('page', 'info', 'x', 'y'))); ?></div>
      </div>
    </div>
<?php
  }
?>
  </div>

