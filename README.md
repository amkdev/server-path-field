![Plugin Icon: A folder with a dropdown arrow on a blue background.](./src/icon.svg) 

# Server Path Field plugin for Craft CMS 3.x

A dropdown field that lets you select a directory in the public webroot of a craftCMS project. It's possible to define a root path (within the webroot) and filter multiple directories.

## Requirements

This plugin requires Craft CMS 3.0.0 or later.

## Installation

To install the plugin, follow these instructions.

1. Open your terminal and go to your Craft project:

        cd /path/to/project

2. Then tell Composer to load the plugin:

        composer require amkdev/server-path-field

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for Server Path Field.

## Server Path Field Overview

Server Path Field adds a custom FieldType to Craft CMS called Server Path. This lets you choose from any direcotry found in the webroot, which then returns the path as twig value. 

This plugin is basic and not so useful as standalone, but it extends the possiblities of other extensions need a specific public path. For instance [Server Files](https://github.com/amkdev/server-files) or [GetFiles](https://github.com/amkdev/craft-getfiles).

## Disclaimer

This plugin is distributed free of charge under the MIT License. The author is not responsible for any data loss or issues resulting from use of the plugin. 

## Special Thanks 

This plugin is based on the Asset Folder Field plugin by Ryan Whitney.

This plugin was made with the help of assets and code found within the CraftCMS community. These folks are **not** affiliated with this plugin in any way, though I greatly appreciate their contributions to the community.

Thanks to [@mmikkel](https://github.com/mmikkel/IncognitoField-Craft3), whose [IncognitoField](https://github.com/mmikkel/IncognitoField-Craft3) plugin was heavily referenced and used as a general framework when using this plugin. 🎉

Thanks to [@anubarak](https://github.com/Anubarak), whose [StackExchange answer](https://craftcms.stackexchange.com/a/24011) provided the basis for the folder finding logic. 🎉

And thanks to [@landon](https://thenounproject.com/landan), whose [folder icon](https://thenounproject.com/search/?q=folder&i=1594035) was used in the logo. 🎉
