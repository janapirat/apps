<?php

/**
 * ownCloud - Updater plugin
 *
 * @author Victor Dubiniuk
 * @copyright 2013 Victor Dubiniuk victor.dubiniuk@gmail.com
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 */

namespace OCA\Updater;

\OCP\Util::addScript(App::APP_ID, '3rdparty/angular');
\OCP\Util::addScript(App::APP_ID, 'app');
\OCP\Util::addScript(App::APP_ID, 'controllers');

\OCP\Util::addStyle(App::APP_ID, 'updater');

\OCP\User::checkAdminUser();
$tmpl = new \OCP\Template(App::APP_ID, 'update', 'guest');

$tmpl->printPage();