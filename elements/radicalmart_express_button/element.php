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

namespace YOOtheme;

defined('_JEXEC') or die;

return [
	'transforms' => [
		'render' => function ($node) {
			\JLoader::register('RadicalMartExpressHelperProducts',
				JPATH_SITE . '/components/com_radicalmart_express/helpers/products.php');
			$node->product = ($pk = (int) trim($node->props['product']))
				? \RadicalMartExpressHelperProducts::getProduct($pk) : false;

			return true;
		}
	]
];