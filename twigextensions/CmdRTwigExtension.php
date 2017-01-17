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
		// Get the file path using the passed in path and our file system path
		$filePath = $environmentVariables['fileSystemPath'] . $file;
		$siteUrl = craft()->getSiteUrl();
		$fileUrl = $siteUrl . $file;

		// If the file we're trying to bust doesn't exist then we should return the normal filepath
		if (!IOHelper::fileExists($filePath)) {
			return $filePath;
		}

		// Get the last modified time of the file
		$lastModified = filemtime($filePath);
		// Take the first 5 characters of a hashed last modified time
		$bustString = substr(md5($lastModified), 0, 5);

		// return the original file URL along with a query string set to our 5 character hash
		return $fileUrl . '?lm=' . $bustString;
	}
}
