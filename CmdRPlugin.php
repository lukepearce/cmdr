<?php
/**
 * cmdR plugin for Craft CMS
 *
 * Tired of explaning to clients and PM&#39;s that they&#39;ll need to force refresh to see your latest changes? Let cmdR take care of it for you!
 *
 * @author    Luke Pearce
 * @copyright Copyright (c) 2016 Luke Pearce
 * @link      http://ten4design.co.uk
 * @package   CmdR
 * @since     1
 */

namespace Craft;

class CmdRPlugin extends BasePlugin
{
    /**
     * @return mixed
     */
    public function init()
    {
    }

    /**
     * @return mixed
     */
    public function getName()
    {
         return Craft::t('cmdR');
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return Craft::t('cmdR cache busts an asset by appending a query string using the assets last modified timestamp');
    }

    /**
     * @return string
     */
    public function getDocumentationUrl()
    {
        return 'https://github.com/ten4design/cmdr/blob/master/README.md';
    }

    /**
     * @return string
     */
    public function getReleaseFeedUrl()
    {
        return 'https://raw.githubusercontent.com/ten4design/cmdr/master/releases.json';
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return '1';
    }

    /**
     * @return string
     */
    public function getSchemaVersion()
    {
        return '1';
    }

    /**
     * @return string
     */
    public function getDeveloper()
    {
        return 'Luke Pearce';
    }

    /**
     * @return string
     */
    public function getDeveloperUrl()
    {
        return 'http://ten4design.co.uk';
    }

    /**
     * @return bool
     */
    public function hasCpSection()
    {
        return false;
    }

    /**
     * @return mixed
     */
    public function addTwigExtension()
    {
        Craft::import('plugins.cmdr.twigextensions.CmdRTwigExtension');

        return new CmdRTwigExtension();
    }

    /**
     */
    public function onBeforeInstall()
    {
    }

    /**
     */
    public function onAfterInstall()
    {
    }

    /**
     */
    public function onBeforeUninstall()
    {
    }

    /**
     */
    public function onAfterUninstall()
    {
    }
}
