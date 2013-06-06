Smartsheet MediaWiki Extension
==========

A media wiki extension that embeds a smartsheet via iframe.
Tested on MediaWiki 1.19.1

Developer Setup
---------------

1. Download, checkout or clone
2. Create a folder called Smartsheet in your MediaWiki extensions folder `extensions/Smartsheet`
2. Move contents into above folder
3. Add require_once( "$IP/extensions/Smartsheet/SmartsheetIframe.php") to LocalSettings.php

Usage
------------


Example:

    <smartsheet id="53e9029517dc4d8c8b799blahblah" width="500" height="500" />

Example:

    <smartsheet id="53e9029517dc4d8c8b799blahblah" />

    id: The id of your smartsheet
    width: optional, default 1000
    height: optional, default 700


Smartsheet Settings
------------
To embed smartsheets you must publish them using the smartsheet interface.

This plugin requires embedded smartsheets to have the publish option 
"Read-Only Full" set to on.


License
-------
This Source Code Form is subject to the terms of the Mozilla Public
License, v. 2.0. If a copy of the MPL was not distributed with this
file, You can obtain one at http://mozilla.org/MPL/2.0/.
