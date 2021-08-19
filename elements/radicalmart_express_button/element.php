<?php
/*
 * @package     RadicalMart Express Package
 * @subpackage  plg_system_radicalmart_express_elements
 * @version     0.1.0
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
			$node->product = false;
			$pk            = (int) trim($node->props['product']);
			if (empty($pk)) return false;

			\JLoader::register('RadicalMartExpressHelperProducts',
				JPATH_SITE . '/components/com_radicalmart_express/helpers/products.php');
			if (!$product = \RadicalMartExpressHelperProducts::getProduct($pk)) return false;

			$node->product = $product;

			return true;
		}
	]
];