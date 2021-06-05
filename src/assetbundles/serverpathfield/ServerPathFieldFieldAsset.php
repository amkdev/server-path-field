<?php
/**
 * Server Path Field plugin for Craft CMS
 *
 * ServerPathField Field Asset
 *
 * @author     Various
 * @link       https://github.com/amkdev
 */

namespace amkdev\serverpathfield\assetbundles\serverpathfield;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

/**
 * @author    
 * @package   ServerPathField
 * @since     
 */
class ServerPathFieldFieldAsset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->sourcePath = "@amkdev/serverpathfield/assetbundles/serverpathfield/dist";

        $this->depends = [
            CpAsset::class,
        ];

        $this->js = [
            'js/serverpathfield.js',
        ];

        $this->css = [
            'css/serverpathfield.css',
        ];

        parent::init();
    }
}
