<?php
/**
 * Contact Form Plus plugin for Craft CMS
 *
 * ContactFormPlus Task
 *
 * --snip--
 * Tasks let you run background processing for things that take a long time, dividing them up into steps.  For
 * example, Asset Transforms are regenerated using Tasks.
 *
 * Keep in mind that tasks only get timeslices to run when Craft is handling requests on your website.  If you
 * need a task to be run on a regular basis, write a Controller that triggers it, and set up a cron job to
 * trigger the controller.
 *
 * https://craftcms.com/classreference/services/TasksService
 * --snip--
 *
 * @author    Mijingo, LLC
 * @copyright Copyright (c) 2018 Mijingo, LLC
 * @link      https://mijingo.com
 * @package   ContactFormPlus
 * @since     1.0.0
 */

namespace Craft;

class ContactFormPlusTask extends BaseTask
{
    /**
     * Defines the settings.
     *
     * @access protected
     * @return array
     */

    protected function defineSettings()
    {
        return array(
            'someSetting' => AttributeType::String,
        );
    }

    /**
     * Returns the default description for this task.
     *
     * @return string
     */
    public function getDescription()
    {
        return 'ContactFormPlus Tasks';
    }

    /**
     * Gets the total number of steps for this task.
     *
     * @return int
     */
    public function getTotalSteps()
    {
        return 1;
    }

    /**
     * Runs a task step.
     *
     * @param int $step
     * @return bool
     */
    public function runStep($step)
    {
        return true;
    }
}
