# cmdR plugin for Craft CMS

Tired of explaning to clients and PM's that they'll need to force refresh to see your latest changes? Let cmdR take care of it for you!

cmdR appends a query string using the last modified timestamp of your asset. The next time your asset gets modified, the query string will update and you'll have busted that cache!

## Installation

To install cmdR, follow these steps:

1. Download & unzip the file and place the `cmdr` directory into your `craft/plugins` directory
2.  -OR- do a `git clone https://github.com/ten4design/cmdr.git` directly into your `craft/plugins` folder.  You can then update it with `git pull`
4. Install plugin in the Craft Control Panel under Settings > Plugins
5. The plugin folder should be named `cmdr` for Craft to see it.

cmdR works on Craft 2.6.2954

## Using cmdR

Install the plugin and replace any asset URLs you'd like to be cache busted with

`{{ cmdR( 'fileUrl' ) }}`

`fileUrl` is relative from the web root. e.g. `{{ cmdR( 'assets/css/main.css' ) }}`

## cmdR Changelog

### 1 -- 2016.12.19

* Initial release

Brought to you by [Luke Pearce](http://ten4design.co.uk)
