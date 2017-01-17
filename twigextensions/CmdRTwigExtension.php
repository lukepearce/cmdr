<?php
/**
 * Cache Buster plugin for Craft CMS
 *
 * Cache Buster Twig Extension
 *
 * @author    Luke Pearce
 * @copyright Copyright (c) 2016 Luke Pearce
 * @link      http://ten4design.co.uk
 * @package   CacheBuster
 * @since     1
 */

namespace Craft;

use Twig_Extension;
use Twig_Filter_Method;

class CmdRTwigExtension extends \Twig_Extension
{
	/**
	 * @return string The extension name
	 */
	public function getName()
	{
		return 'cmdR';
	}

	/**
	* @return array
	 */
	public function getFunctions()
	{
		return array(
			'cmdR' => new \Twig_Function_Method($this, 'getBustedAssetFilename'),
		);
	}

	/**
	 * @return string
	 */
	public function getBustedAssetFilename($file)
	{
		$environmentVariables = craft()->config->get('environmentVariables');
		$filePath = $environmentVariables['fileSystemPath'] . $file;
		$siteUrl = craft()->getSiteUrl();
		$fileUrl = $siteUrl . $file;

		if !IOHelper::fileExists($filePath) {
			return $filePath;
		}
		$lastModified = filemtime($filePath);
		$bustString = substr(md5($lastModified), 0, 5);

		return $fileUrl . '?lm=' . $bustString;
	}
}
