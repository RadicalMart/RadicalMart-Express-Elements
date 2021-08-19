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

defined('_JEXEC') or die;

use Joomla\CMS\Plugin\CMSPlugin;
use YOOtheme\Application;

class plgSystemRadicalMart_Express_Elements extends CMSPlugin
{
	/**
	 * Affects constructor behavior.
	 *
	 * @var  boolean
	 *
	 * @since  __DEPLOY_VERSION__
	 */
	protected $autoloadLanguage = true;

	/**
	 * Method to add custom elements loader.
	 *
	 * @since  __DEPLOY_VERSION__
	 */
	public function onAfterInitialise()
	{
		// Check if YOOtheme Pro is loaded
		if (!class_exists(Application::class, false)) return;

		// Load a single module from the same directory
		$app = Application::getInstance();
		$app->load(__DIR__ . '/loader.php');
	}
}
