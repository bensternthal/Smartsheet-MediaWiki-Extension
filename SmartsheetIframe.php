<?php
/**
 * An extension that embeds a smartsheet via iframe.
 *
 * User supplies smartsheet ID, width, height
 * Example: <smartsheet id="53e9029517dc4d8c8b799eaacfee9a1e" width="500" height="500" />
 *
 * Width/height optional defaults will be used
 *
 * @author Benjamin Sternthal <ben@devpatch.com>
 * @license This Source Code Form is subject to the terms of the Mozilla Public
 * License, v. 2.0. If a copy of the MPL was not distributed with this
 * file, You can obtain one at http://mozilla.org/MPL/2.0/.
 */


$wgExtensionCredits['other'][] = array(
    'name'          => 'Smartsheet',
    'author'        => 'Benjamin Sternthal With Inspiration From https://github.com/LegNeato/mediawiki-bugzilla',
    'url'           => 'https://github.com/bensternthal/Smartsheet-MediaWiki-Extension',
    'description'   => 'This extension allows embedding of a smartsheet within an iframe.'
);

// Hooks for plugin display
$wgHooks['ParserFirstCallInit'][] = 'SmartsheetParserInit';

// Hook our callback function into the parser
function SmartsheetParserInit( Parser &$parser ) {
    global $wgSmartsheetTagName;

    // Register the desired tag
    $parser->setHook( $wgSmartsheetTagName, 'SmartsheetRender' );

    // Let the other hooks keep processing
    return TRUE;
}

// Function to be called when our tag is found by the parser
function SmartsheetRender($input, array $args) {
    $attr = array();
    global $wgSmartsheetPublishURL;
    global $wgSmartsheetIframeWidth;
    global $wgSmartsheetIframeHeight;

    foreach($args as $key => $value ) {
        $attr[$key] = $value;
    }

    // Handle defaults
    if(!isset($attr['width'])) {
        $attr['width'] = $wgSmartsheetIframeWidth;
    };

    if(!isset($attr['height'])) {
        $attr['height'] = $wgSmartsheetIframeHeight;
    };

    // Assemble iframe
    $output = '<iframe name="smartsheet" frameborder="0" '.
                'src="'.$wgSmartsheetPublishURL . htmlspecialchars($attr['id']).'" ' .
                'width="'.htmlspecialchars($attr['width']).'" '.
                'height="'.htmlspecialchars($attr['height']).'">'.
             '</iframe>';

    return $output;
}

//Defaults
$wgSmartsheetTagName = 'smartsheet'; // The tag name to be processed
$wgSmartsheetPublishURL = 'http://publish.smartsheet.com/'; // The URL for smartsheet published sheets
$wgSmartsheetIframeWidth = 1000; // Default width
$wgSmartsheetIframeHeight = 700; // Default height