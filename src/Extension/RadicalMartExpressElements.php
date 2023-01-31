<?php
/*
 * @package     RadicalMart Shipping Standard Plugin
 * @subpackage  plg_radicalmart_shipping_standard
 * @version     __DEPLOY_VERSION__
 * @author      Delo Design - delo-design.ru
 * @copyright   Copyright (c) 2022 Delo Design. All rights reserved.
 * @license     GNU/GPL license: https://www.gnu.org/copyleft/gpl.html
 * @link        https://delo-design.ru/
 */

namespace Joomla\Plugin\System\RadicalMartExpressElements\Extension;

\defined('_JEXEC') or die;

use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\Event\SubscriberInterface;
use YOOtheme\Application;

class RadicalMartExpressElements extends CMSPlugin implements SubscriberInterface
{
	/**
	 * Load the language file on instantiation.
	 *
	 * @var    bool
	 *
	 * @since  __DEPLOY_VERSION__
	 */
	protected $autoloadLanguage = true;

	/**
	 * Loads the application object.
	 *
	 * @var  \Joomla\CMS\Application\CMSApplication
	 *
	 * @since  __DEPLOY_VERSION__
	 */
	protected $app = null;

	/**
	 * Returns an array of events this subscriber will listen to.
	 *
	 * @return  array
	 *
	 * @since   __DEPLOY_VERSION__
	 */
	public static function getSubscribedEvents(): array
	{
		return [
			'onAfterInitialise' => 'onAfterInitialise',
		];
	}

	/**
	 * Method to add custom elements loader.
	 *
	 * @since  __DEPLOY_VERSION__
	 */
	public function onAfterInitialise()
	{
		// Check if YOOtheme Pro is loaded
		if (!class_exists(Application::class, false))
		{
			return;
		}

		// Load a single module from the same directory
		$app = Application::getInstance();
		$app->load(JPATH_PLUGINS . '/system/radicalmart_express_elements/elements/loader.php');
	}
}