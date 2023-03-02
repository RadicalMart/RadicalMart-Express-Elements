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

namespace YOOtheme;

defined('_JEXEC') or die;

use Joomla\Component\RadicalMartExpress\Site\Helper\CheckoutHelper;
use Joomla\Component\RadicalMartExpress\Site\Helper\ProductsHelper;

return [
	'transforms' => [
		'render' => function ($node) {

			$pk            = (!empty($node->props['product'])) ? (int) trim($node->props['product']) : 0;
			$node->product = ($pk > 0)
				? ProductsHelper::getProduct('com_radicalmart.shortcode', $pk) : false;

			if ($node->product)
			{
				$node->layoutData = CheckoutHelper::getBlankFormData('com_radicalmart_express.shortcode',
					$node->product->id);
			}

			return true;
		}
	]
];