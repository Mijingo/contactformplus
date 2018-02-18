<?php
/**
 * Contact Form Plus plugin for Craft CMS
 *
 * ContactFormPlus Service
 *
 * --snip--
 * All of your plugin’s business logic should go in services, including saving data, retrieving data, etc. They
 * provide APIs that your controllers, template variables, and other plugins can interact with.
 *
 * https://craftcms.com/docs/plugins/services
 * --snip--
 *
 * @author    Mijingo, LLC
 * @copyright Copyright (c) 2018 Mijingo, LLC
 * @link      https://mijingo.com
 * @package   ContactFormPlus
 * @since     1.0.0
 */

namespace Craft;

class ContactFormPlusService extends BaseApplicationComponent
{
    /**
     * This function can literally be anything you want, and you can have as many service functions as you want
     *
     * From any other plugin file, call it like this:
     *
     *     craft()->contactFormPlus->exampleService()
     */
    public function saveSubmission($submissionData)
    {
        $formattedData = $this->_processSubmissionData($submissionData);
        $save = $this->_saveEntry($formattedData);
    }

    private function _processSubmissionData($data) {
        $settings = craft()->plugins->getPlugin('contactformplus')->getSettings();
        // set this as an array
        $formData = array(
            $settings->nameField    => $data->fromName,
            $settings->emailField   => $data->fromEmail,
            $settings->phoneField   => $data->messageFields['phone'],
            $settings->messageField => $data->messageFields['body']
        );

        return $formData;
    }

    private function _saveEntry($data) {
        $settings = craft()->plugins->getPlugin('contactformplus')->getSettings();
        
        $entry = new EntryModel();
        $entry->sectionId = $settings->craftSection;
        $entry->authorId  = 1;
        $entry->enabled   = false;
        $entry->setContentFromPost($data);
        craft()->entries->saveEntry($entry);

    }

}