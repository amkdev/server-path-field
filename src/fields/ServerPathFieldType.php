<?php

/**
 * Server Path Field plugin for Craft CMS 3.x
 *
 * @author     Various
 * @link       https://github.com/amkdev
 */

namespace amkdev\serverpathfield\fields;

use Craft;
use craft\base\ElementInterface;
use craft\base\Field;
use craft\base\PreviewableFieldInterface;
use craft\fields\PlainText;
use craft\volumes\Local;
use craft\base\LocalVolumeInterface;
use amkdev\serverpathfield\assetbundles\serverpathfield\ServerPathFieldFieldAsset;

/**
 * Server Path Field type
 *
 *
 */
class ServerPathFieldType extends PlainText implements PreviewableFieldInterface
{
    // Properties
    // =========================================================================

    public $mode = 'plain';
    public $modeOverride;

    /**
     * @var string
     */
    public $dirFilter = '';
    public $rootPath = 'media/';

    // Static Methods
    // =========================================================================

    /**
     * Returns the display name of this class.
     *
     * @return string The display name of this class.
     */
    public static function displayName(): string
    {
        return Craft::t('server-path-field', 'Server Path');
    }

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            ['dirFilter', 'string'],
            ['dirFilter', 'default', 'value' => 'images'],
        ], [
            ['rootPath', 'string'],
            ['rootPath', 'default', 'value' => 'media/'],
        ]);
        return $rules;
    }

    /**
     * @return string
     */
    public function getSettingsHtml()
    {
        // Render an empty settings template, to override the default plaintext version
        return Craft::$app->getView()->renderTemplate(
            'server-path-field/_components/fields/ServerPathFieldType_settings',
            [
                'field' => $this,
            ]
        );
    }


    /**
     * @param mixed $value
     * @param ElementInterface|null $element
     *
     * @return string
     */
    public function getInputHtml($value, ElementInterface $element = null): string
    {
        $settings = $this->getSettings();
        $path = rtrim(Craft::getAlias('@webroot') . DIRECTORY_SEPARATOR . $settings['rootPath'], DIRECTORY_SEPARATOR);


        $dirList = array();
        if (is_dir($path)) {

            $iterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path));
            foreach ($iterator as $file) {
                if ($file->isDir() && ($file->isDir() && $file->getFilename() != '..')) {
                    $p = $file->getPathname();
                    $p = str_replace(array($path, DIRECTORY_SEPARATOR . '.'), '', $p);
                    $p = ltrim($p, '/\\');
                    if (!empty($p) && (!empty($settings['dirFilter']) && $this->strposa( $p, explode(',',$settings['dirFilter']) ) ))
                        $dirList[] = $p;
                }
            }
            natsort($dirList);
            if (count($dirList) > 0) {
                $string = '<div class="select"><select name="' . $this->handle .  '">';
                $string .= '<option value="">Choose a directory</option>';

                foreach ($dirList as $entry) {
                    $selected = ($value === $entry) ? 'selected="selected' : '';
                    $string .= '<option ' . $selected .  ' value="' .  $settings['rootPath'] . DIRECTORY_SEPARATOR . $entry . '">' . $entry .  '</option>';
                }
                $string .= '</select></div>';
            } else {
                $string="<p>No directories found.</p>";
            }
        } else {
            $string="<p>No directories found.</p>";
        }

        return $string;
    }

    function strposa($haystack, $needle, $offset=0) {
        if(!is_array($needle)) $needle = array($needle);
        foreach($needle as $query) {
            if(strpos($haystack, $query, $offset) !== false) return true; // stop on first true result
        }
        return false;
    }
    
    // Private Methods
    // =========================================================================

    /**
     * @param ElementInterface|null $element
     * @return string
     * @throws \yii\base\Exception
     */
}
