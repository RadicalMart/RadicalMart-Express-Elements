<?php
/*
 * @package     RadicalMart Express Package
 * @subpackage  plg_system_radicalmart_express_elements
 * @version     1.0.0
 * @author      Delo Design - delo-design.ru
 * @copyright   Copyright (c) 2021 Delo Design. All rights reserved.
 * @license     GNU/GPL license: https://www.gnu.org/copyleft/gpl.html
 * @link        https://delo-design.ru/
 */

defined('_JEXEC') or die;

use Joomla\CMS\Component\ComponentHelper;
use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;

Factory::getLanguage()->load('com_radicalmart_express');
if ($product)
{
	HTMLHelper::script('com_radicalmart_express/radicalmart_express.min.js', array('version' => 'auto', 'relative' => true));
	HTMLHelper::script('com_radicalmart_express/axios.min.js', array('version' => 'auto', 'relative' => true));

	HTMLHelper::_('behavior.formvalidator');

	if (ComponentHelper::getParams('com_radicalmart_express')->get('fields_quantity', 'required') === 'required')
	{
		HTMLHelper::script('com_radicalmart_express/field-quantity.min.js', array('version' => 'auto', 'relative' => true));
	}

	Text::script('COM_RADICALMART_EXPRESS_ERROR_FORM_FIELD_INVALID');
	Factory::getDocument()->addScriptOptions('radicalmart_express', array(
		'controller' => Route::_('index.php?option=com_radicalmart_express')
	));

	$pid = $product->id;
}
else
{
	$props['button_style'] = 'danger';
	$props['text']         = Text::_('COM_RADICALMART_EXPRESS_ERROR_PRODUCT_NOT_FOUND');
	$pid                   = 0;
}


$el = $this->el('button', [

	'class'                   => [
		'radicalmart_express-button',
		'uk-button',
		'uk-{button_style: link-\w+}'                                              => ['button_style' => $props['button_style']],
		'uk-button uk-button-{!button_style: |link-\w+} [uk-button-{button_size}]' => ['button_style' => $props['button_style']],
	],
	'radicalmart_express-buy' => $pid,
]);

// Prepare text
$props['text'] = RadicalMartExpressHelperProducts::replaceShortcodes(Text::_($props['text']), $product);

echo $el($props, $attrs, $props['text']);