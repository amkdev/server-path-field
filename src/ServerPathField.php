<?php
/**
 * Server Path Field plugin for Craft CMS
 *
 * ServerPathField 
 *
 * @author     Ryan Whitney, Alexander M. Korn
 * @link       https://github.com/amkdev
 */

namespace amkdev\ServerPathField;

use amkdev\serverpathfield\fields\ServerPathFieldType;

use Craft;
use craft\base\Plugin;
use craft\services\Fields;
use craft\events\RegisterComponentTypesEvent;

use yii\base\Event;

/**
 * Class ServerPathField
 *
 * @author     Various
 * @package   ServerPathField
 *
 */
class ServerPathField extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var ServerPathField
     */
    public static $plugin;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        // Register our fields
        Event::on(
        	Fields::class, 
        	Fields::EVENT_REGISTER_FIELD_TYPES,
            function(RegisterComponentTypesEvent $event) {
                $event->types[] = ServerPathFieldType::class;
            }
        );

        Craft::info(
            Craft::t(
                'server-path-field',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }

    // Protected Methods
    // =========================================================================

}
