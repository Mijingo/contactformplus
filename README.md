_DO NOT USE FOR CRAFT 3_

# Contact Form+ plugin for Craft CMS

Adds ability to save form entries from first-party Contact Form plugin.

## Installation

To install Contact Form+, follow these steps:

1. Make sure you have the [Contact Form plugin from Pixel & Tonic](https://github.com/craftcms/contact-form) installed.
1. Download & unzip the file and place the `contactformplus` directory into your `craft/plugins` directory
2.  -OR- do a `git clone https://github.com/mijingo/contactformplus.git` directly into your `craft/plugins` folder.  You can then update it with `git pull`
3.  -OR- install with Composer via `composer require mijingo/contactformplus`
4. Install plugin in the Craft Control Panel under Settings > Plugins
5. The plugin folder should be named `contactformplus` for Craft to see it.  GitHub recently started appending `-master` (the branch name) to the name of the folder for zip file downloads.

Contact Form+ works on Craft 2.4.x and Craft 2.5.x.

## Contact Form Plus Overview

Contact Form+ adds the ability for your Contact Form plugin form to save submissions to a Craft section of your choosing.

## Configuring Contact Form Plus

After installing Contact Form+, go to the Settings for the plugin and do the following:

* Choose the Section where Contact Form+ should save the form submissions.
* Map your Section fields to the form fields. Input only the Field Handles. Right now the plugin is limited to Name, Email, Phone, and Message. See the docs for the Contact Form plugin for information on setting up your form code.


## Contact Form Plus Roadmap

Some things to do, and ideas for potential features:

* ~Release it~
* Improve mapping with dropdown of fields from Section

Brought to you by [Mijingo, LLC](https://mijingo.com)
