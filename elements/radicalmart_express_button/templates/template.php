<?php
/*
 * @package     RadicalMart Express - YOOtheme Elements Plugin
 * @subpackage  plg_system_radicalmart_express_elements
 * @version     2.0.0
 * @author      Delo Design - delo-design.ru
 * @copyright   Copyright (c) 2023 Delo Design. All rights reserved.
 * @license     GNU/GPL license: https://www.gnu.org/copyleft/gpl.html
 * @link        https://delo-design.ru/
 */

defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Joomla\Component\RadicalMartExpress\Site\Helper\CheckoutHelper;
use Joomla\Component\RadicalMartExpress\Site\Helper\ProductsHelper;

CheckoutHelper::loadAssets();

if ($product)
{
	$pid = $product->id;
}
else
{
	$props['button_style'] = 'danger';
	$props['text']         = Text::_('COM_RADICALMART_EXPRESS_ERROR_PRODUCT_NOT_FOUND');
	$pid                   = 0;
}

$el = $this->el('button', [

	'class'                        => [
		'radicalmart_express-button',
		'uk-button',
		'uk-{button_style: link-\w+}'                                              => ['button_style' => $props['button_style']],
		'uk-button uk-button-{!button_style: |link-\w+} [uk-button-{button_size}]' => ['button_style' => $props['button_style']],
	],
	'radicalmart_express-checkout' => 'openWindow',
	'data-product_id'              => $pid,
]);

// Prepare text
$props['text'] = ProductsHelper::replaceShortcodes(Text::_($props['text']), $product);

echo $el($props, $attrs, $props['text']);