# Shopware Backend Shortcut Widget

This is a simple plugin, that allows Shopware-Users to use a widget with shortcuts.

Shortcuts are records with a name and two links, one intended to go to some page in the storefront, and one to the corresponding backend-window.

## Usage

### Installation

Download the lastest stable release as zip-file from the [release page](https://github.com/sebastianwieland/shopware-backend-shortcut-widget/releases).
Install the zip in your Shopware plugin-manager. As this plugin is completely free, you don't have to register a license for this plugin.
Install it just like any other Shopware-plugin by clicking the "+"-icon next to the name of the Plugin

### Creating Shortcuts

A shortcut consists of three parts:
* a name
* a link to a specific page in the storefront
* a Shopware-backend SubApplication corresponding to the page
  * You may specify parameters, that should be passed to the subapplication

#### Examples
| Name | Storefront-Link | Backend-SubApplication | Action for the SubApplication | Parameters for the SubApplication |
|------|-----------------|------------------------|-------------------------------|-----------------------------------|
| ANTIDOGMA | http://my-shop.com/antidogma | Shopware.apps.Article | index | articleId = 13 (integer) |
| DIE ZEIT 100 | http://my-shop.com/die-zeit-100 | Shopware.apps.Article | index | articleId = 166 (integer) |