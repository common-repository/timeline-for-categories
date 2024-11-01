=== Plugin Name ===
Contributors: thecodeisclear
Donate link: http://thecodeisclear.in
Tags: categories, order posts, chronological display
Requires at least: 2.3
Tested up to: 3.4
Stable tag: 1.0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Customize post ordering (default/chronological) by category.

== Description ==

A no-frills plugin that is designed to change the order of posts within a particular category. By default, the posts on the category page will be displayed in Reverse Chronological order (Last Post Displayed First). By editing the settings in the category page, you can change this order to **Chronological** (First Post Displayed First). 

Posts can belong to multiple categories and categories could have child categories under them. In such cases, the plugin will work in the following way (s)

* If a Child Category displays posts in "Default Order" and the parent Category displays posts in "Chronological Order", posts under the Child Category will be shown in *Chronological Order* on the Parent Category page. However, they will be shown in *Default Order* when viewing only the Child Category
* Assume that Post A (Published 1st January 2012 under Category A & Category B) and Post B (Published on 30th March 2012 under Category A & Category B) are present in the blog. Category A shows posts in *Default Order* and Category B shows posts in *Chronological Order*. While viewing Category A, Post B will precede Post A and while viewing Category B, Post A will be shown ahead of Post B. 

This plugin was developed to cater to my individual need to order my posts (that were chapters of a novel and categorized by the name of the novel) in chronological order while leaving the other categories in the default order. I am new to Wordpress (and to PHP) and to a large extent has been created by reading the codex, adambrown's pages on hooks and some resolved answers from stackoverflow.com. If you feel that this plugin can be improved, please use the support forum.

== Installation ==

1. Upload `timeline-for-categories.zip` to the `/wp-content/plugins/` directory
1. Unzip the contents of the .zip file to the `/wp-content/plugins/` directory (contents will extract to `/wp-content/plugins/timeline-for-categories/`
1. Alternatively, you could install the plugin directly via the 'Plugins' &raquo; 'Add New' &raquo; 'Upload' option
1. Once the plugin is installed, activate the plugin through the 'Plugins' menu in WordPress
1. Now, you can edit/add categories and it will show a new field to set the order for displaying posts

== Frequently Asked Questions ==

= I am getting errors while activating the plugin =

Please raise a support ticket with the details of other active plugins at that time and I will look into the issue.

== Screenshots ==

1. Edit Category settings page

== Changelog ==

= 1.0 =
* Initial Release

= 1.0.1 =
* Fixed the error message "The plugin generated 3 characters of unexpected output during activation."

== Upgrade Notice ==

= 1.0 =
* Initial Release

= 1.0.1 =
* Fixed the error message "The plugin generated 3 characters of unexpected output during activation."

== Coming Up ==

Once the number of posts in a particular category exceeds the number defined by the admin under "Blog Pages show at most" settings, a category page will more or less resemble a static page. The next version will include an option to provide a link to the latest post in that category. Also planned for the next upgrade is to bypass these settings for robots & web crawlers so that the category page does not show up as a static page (with no updates).
