<?php
/**
 * Contact Form Plus plugin for Craft CMS
 *
 * ContactFormPlus Command
 *
 * --snip--
 * Craft is built on the Yii framework and includes a command runner, yiic in ./craft/app/etc/console/yiic
 *
 * Action methods are mapped to command-line commands, and begin with the prefix “action”, followed by
 * a description of what the method does (for example, actionPrint().  The actionIndex() method is what
 * is executed if no sub-commands are supplied, e.g.:
 *
 * ./craft/app/etc/console/yiic contactformplus
 *
 * The actionPrint() method above would be invoked via:
 *
 * ./craft/app/etc/console/yiic contactformplus print
 *
 * http://spin.atomicobject.com/2015/06/16/craft-console-plugin/
 * --snip--
 *
 * @author    Mijingo, LLC
 * @copyright Copyright (c) 2018 Mijingo, LLC
 * @link      https://mijingo.com
 * @package   ContactFormPlus
 * @since     1.0.0
 */

namespace Craft;

class ContactFormPlusCommand extends BaseCommand
{
    /**
     * Handle our plugin's index action command, e.g.: ./craft/app/etc/console/yiic contactformplus
     */
    public function actionIndex($param="")
    {
    }
}