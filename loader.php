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

use YOOtheme\Builder;
use YOOtheme\Path;

return [
	'extend' => [
		Builder::class => function (Builder $builder) {
			$builder->addTypePath(Path::get(__DIR__ . '/elements/*/element.json'));
		}
	]
];