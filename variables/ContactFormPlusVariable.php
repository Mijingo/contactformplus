<?php
/**
 * Contact Form Plus plugin for Craft CMS
 *
 * Contact Form Plus Variable
 *
 * --snip--
 * Craft allows plugins to provide their own template variables, accessible from the {{ craft }} global variable
 * (e.g. {{ craft.pluginName }}).
 *
 * https://craftcms.com/docs/plugins/variables
 * --snip--
 *
 * @author    Mijingo, LLC
 * @copyright Copyright (c) 2018 Mijingo, LLC
 * @link      https://mijingo.com
 * @package   ContactFormPlus
 * @since     1.0.0
 */

namespace Craft;

class ContactFormPlusVariable
{
    /**
     * Whatever you want to output to a Twig template can go into a Variable method. You can have as many variable
     * functions as you want.  From any Twig template, call it like this:
     *
     *     {{ craft.contactFormPlus.exampleVariable }}
     *
     * Or, if your variable requires input from Twig:
     *
     *     {{ craft.contactFormPlus.exampleVariable(twigValue) }}
     */
    public function exampleVariable($optional = null)
    {
        return "And away we go to the Twig template...";
    }
}