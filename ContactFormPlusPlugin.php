<?php
/**
 * Contact Form Plus plugin for Craft CMS
 *
 * Adds ability to save form entries from first-party Contact Form plugin.
 *
 * --snip--
 * Craft plugins are very much like little applications in and of themselves. We’ve made it as simple as we can,
 * but the training wheels are off. A little prior knowledge is going to be required to write a plugin.
 *
 * For the purposes of the plugin docs, we’re going to assume that you know PHP and SQL, as well as some semi-
 * advanced concepts like object-oriented programming and PHP namespaces.
 *
 * https://craftcms.com/docs/plugins/introduction
 * --snip--
 *
 * @author    Mijingo, LLC
 * @copyright Copyright (c) 2018 Mijingo, LLC
 * @link      https://mijingo.com
 * @package   ContactFormPlus
 * @since     1.0.0
 */

namespace Craft;

class ContactFormPlusPlugin extends BasePlugin
{
    /**
     * Called after the plugin class is instantiated; do any one-time initialization here such as hooks and events:
     *
     * craft()->on('entries.saveEntry', function(Event $event) {
     *    // ...
     * });
     *
     * or loading any third party Composer packages via:
     *
     * require_once __DIR__ . '/vendor/autoload.php';
     *
     * @return mixed
     */
    public function init()
    {
        $settings = craft()->plugins->getPlugin('contactformplus')->getSettings();

        // if no section is set then bail
        if(!$settings->craftSection) { return false; }
        
        craft()->on('contactForm.onBeforeSend', function(Event $event) {
            craft()->contactFormPlus->saveSubmission($event->params['message']);
        });

        parent::init();
    }

    /**
     * Returns the user-facing name.
     *
     * @return mixed
     */
    public function getName()
    {
         return Craft::t('Contact Form Plus');
    }

    /**
     * Plugins can have descriptions of themselves displayed on the Plugins page by adding a getDescription() method
     * on the primary plugin class:
     *
     * @return mixed
     */
    public function getDescription()
    {
        return Craft::t('Adds ability to save form entries from first-party Contact Form plugin.');
    }

    /**
     * Plugins can have links to their documentation on the Plugins page by adding a getDocumentationUrl() method on
     * the primary plugin class:
     *
     * @return string
     */
    public function getDocumentationUrl()
    {
        return 'https://github.com/mijingo/contactformplus/blob/master/README.md';
    }

    /**
     * Plugins can now take part in Craft’s update notifications, and display release notes on the Updates page, by
     * providing a JSON feed that describes new releases, and adding a getReleaseFeedUrl() method on the primary
     * plugin class.
     *
     * @return string
     */
    public function getReleaseFeedUrl()
    {
        return 'https://raw.githubusercontent.com/mijingo/contactformplus/master/releases.json';
    }

    /**
     * Returns the version number.
     *
     * @return string
     */
    public function getVersion()
    {
        return '1.0.0';
    }

    /**
     * As of Craft 2.5, Craft no longer takes the whole site down every time a plugin’s version number changes, in
     * case there are any new migrations that need to be run. Instead plugins must explicitly tell Craft that they
     * have new migrations by returning a new (higher) schema version number with a getSchemaVersion() method on
     * their primary plugin class:
     *
     * @return string
     */
    public function getSchemaVersion()
    {
        return '1.0.0';
    }

    /**
     * Returns the developer’s name.
     *
     * @return string
     */
    public function getDeveloper()
    {
        return 'Mijingo, LLC';
    }

    /**
     * Returns the developer’s website URL.
     *
     * @return string
     */
    public function getDeveloperUrl()
    {
        return 'https://mijingo.com';
    }

    /**
     * Returns whether the plugin should get its own tab in the CP header.
     *
     * @return bool
     */
    public function hasCpSection()
    {
        return false;
    }

    /**
     * Add any Twig extensions.
     *
     * @return mixed
     */
    public function addTwigExtension()
    {
        Craft::import('plugins.contactformplus.twigextensions.ContactFormPlusTwigExtension');

        return new ContactFormPlusTwigExtension();
    }

    /**
     * Called right before your plugin’s row gets stored in the plugins database table, and tables have been created
     * for it based on its records.
     */
    public function onBeforeInstall()
    {
    }

    /**
     * Called right after your plugin’s row has been stored in the plugins database table, and tables have been
     * created for it based on its records.
     */
    public function onAfterInstall()
    {
    }

    /**
     * Called right before your plugin’s record-based tables have been deleted, and its row in the plugins table
     * has been deleted.
     */
    public function onBeforeUninstall()
    {
    }

    /**
     * Called right after your plugin’s record-based tables have been deleted, and its row in the plugins table
     * has been deleted.
     */
    public function onAfterUninstall()
    {
    }

    /**
     * Defines the attributes that model your plugin’s available settings.
     *
     * @return array
     */
    protected function defineSettings()
    {
        return array(
            'craftSection' => array(AttributeType::String, 'label' => 'Craft Section', 'default' => ''),
            'nameField' => array(AttributeType::String, 'label' => 'Name Field', 'default' => ''),
            'emailField' => array(AttributeType::String, 'label' => 'Email Field', 'default' => ''),
            'phoneField' => array(AttributeType::String, 'label' => 'Phone Field', 'default' => ''),
            'messageField' => array(AttributeType::String, 'label' => 'Message Field', 'default' => ''),
        );
    }

    /**
     * Returns the HTML that displays your plugin’s settings.
     *
     * @return mixed
     */
    public function getSettingsHtml()
    {
        $options = [[
            'label' => 'Please select', 
            'value' => ''
        ]];

        foreach (craft()->sections->getAllSections() as $section)
        {
            $options[] = [
                'label' => $section['name'], 
                'value' => $section['id']
            ];
        }

       return craft()->templates->render(
                'contactformplus/ContactFormPlus_Settings', 
                    array(
                        'settings' => $this->getSettings(), 
                        'craftSections' => $options,
            ));
    }

    /**
     * If you need to do any processing on your settings’ post data before they’re saved to the database, you can
     * do it with the prepSettings() method:
     *
     * @param mixed $settings  The plugin's settings
     *
     * @return mixed
     */
    public function prepSettings($settings)
    {
        // Modify $settings here...

        return $settings;
    }
}