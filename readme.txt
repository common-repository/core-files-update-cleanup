=== Core Files Update Cleanup ===
Contributors: indextwo
Donate link: https://www.paypal.me/indextwo
Tags: update, core, cleanup
Requires at least: 3.6.0
Tested up to: 6.4.2
Stable tag: 1.1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin deletes the unnecessary `license.txt`, `readme.html` and `wp-config-sample.php` files after a core update.

== Description ==

Whenever WordPress performs a core update, it automatically pulls down the following files onto the root:

* `license.txt`
* `readme.html`
* `wp-config-sample.php`

These files aren't an inherent security risk by themselves; however they are uneccessary clutter on the root of your site (why would you want a `wp-config-sample.php` file on your production website?!); and it's just another easy-to-read vector confirming that you have a WordPress site for script-kiddies to scrape and attack.

Simply install this plugin and it will clean up those files every time you perform a core WordPress update.

== Installation ==

Upload the Core Files Update Cleanup plugin to your website & activate it as normal. That's it! The plugin will only fire whenever a core WordPress update is performed.

Make sure to back up your installation before making any significant changes, and always test a plugin's performance before installing anything on a live production environment!

== Frequently Asked Questions ==

= Should I back up my site first? =

You should always make a backup of your site before any major updates as a matter of course. This plugin will _only_ delete the files specified above; _only_ after a core update; and _only_ attempt to do so if these files actually exist. But you should always err on the side of safety. Always back up!

== Screenshots ==

== Changelog ==

= 1.1.0 =
*Release Date - 19 January 2024*

* Will now automatically check for `license.txt`, `readme.html` and `wp-config-sample.php` files when plugin is first activated (not just on the next update) and remove them if found.

= 1.0.0 =
*Release Date - 14 January 2024*

* Initial release

== Upgrade Notice ==
