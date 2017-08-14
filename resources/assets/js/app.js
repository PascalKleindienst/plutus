/**
 * First, we will load all of this project's Javascript utilities and other
 * dependencies. Then, we will be ready to develop a robust and powerful
 * application frontend using useful Laravel and JavaScript libraries.
 */

require('./bootstrap');

/**
 * CONFIGURATION
 */
$.navigation = $('nav > ul.nav');
$.panelIconOpened = 'icon-arrow-up';
$.panelIconClosed = 'icon-arrow-down';

'use strict';

/**
 * MAIN NAVIGATION
 */
require('./navigation');

/**
 * CARDS ACTIONS
 */
require('./cards');
