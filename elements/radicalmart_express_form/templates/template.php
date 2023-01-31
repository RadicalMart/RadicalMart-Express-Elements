<?php
/*
 * @package     RadicalMart Express - YOOtheme Elements Plugin
 * @subpackage  plg_system_radicalmart_express_elements
 * @version     __DEPLOY_VERSION__
 * @author      Delo Design - delo-design.ru
 * @copyright   Copyright (c) 2023 Delo Design. All rights reserved.
 * @license     GNU/GPL license: https://www.gnu.org/copyleft/gpl.html
 * @link        https://delo-design.ru/
 */

defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\Component\RadicalMartExpress\Site\Helper\CheckoutHelper;

CheckoutHelper::loadAssets();

if ($product)
{
	$pid = $product->id;
}
else
{
	echo '<div class="uk-alert uk-alert-danger">' . Text::_('COM_RADICALMART_EXPRESS_ERROR_PRODUCT_NOT_FOUND') . '</div>';

	return;
}

if (empty($layoutData)) {
	echo '<div class="uk-alert uk-alert-danger">' . Text::_('COM_RADICALMART_EXPRESS_ERROR_CHECKOUT_FORM') . '</div>';

	return;

}
if ($layoutData['success'] === false) {
	echo '<div class="uk-alert uk-alert-danger">' . $layoutData['message'] . '</div>';

	return;
}

?>
<div radicalmart_express-checkout="renderForm" data-product_id="<?php echo $product->id; ?>">
	<?php echo LayoutHelper::render('components.radicalmart_express.checkout.form', $layoutData); ?>
</div>
