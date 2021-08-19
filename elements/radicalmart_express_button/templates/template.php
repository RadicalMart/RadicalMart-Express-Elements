<?php
/*
 * @package     RadicalMart Express Package
 * @subpackage  plg_system_radicalmart_express_elements
 * @version     __DEPLOY_VERSION__
 * @author      Delo Design - delo-design.ru
 * @copyright   Copyright (c) 2021 Delo Design. All rights reserved.
 * @license     GNU/GPL license: https://www.gnu.org/copyleft/gpl.html
 * @link        https://delo-design.ru/
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;

HTMLHelper::script('com_radicalmart_express/radicalmart_express.min.js', array('version' => 'auto', 'relative' => true));
HTMLHelper::script('com_radicalmart_express/axios.min.js', array('version' => 'auto', 'relative' => true));

HTMLHelper::_('behavior.formvalidator');

Factory::getLanguage()->load('com_radicalmart_express');
Factory::getDocument()->addScriptOptions('radicalmart_express', array(
	'controller' => Route::_('index.php?option=com_radicalmart_express')
));

$el = $this->el('button', [

	'class'                   => [
		'radicalmart_express-button',
		'uk-button',
		'uk-{button_style: link-\w+}'                                              => ['button_style' => $props['button_style']],
		'uk-button uk-button-{!button_style: |link-\w+} [uk-button-{button_size}]' => ['button_style' => $props['button_style']],
	],
	'radicalmart_express-buy' => [$product->id],
]);

// Prepare text
$props['text'] = RadicalMartExpressHelperProducts::replaceShortcodes(Text::_($props['text']), $product);

echo $el($props, $attrs, $props['text']);