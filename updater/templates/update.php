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

?>
<?php $data=OC_Updater::check(); ?>
<?php $isNewVersionAvailable = isset($data['version']) && strlen($data['version']) ?>
<?php $navClass = $isNewVersionAvailable ? 'warn' : ''; ?>
<div id="updater-content" ng-app="updater" ng-init="navigation=1">
	<ul ng-model="navigation">
		<li ng-click="navigation=1" class="current"><?php p($l->t('Backup Management')) ?></li>
		<li ng-click="navigation=2" class="<?php p($navClass) ?>"><?php p($l->t('Update')) ?></li>
	</ul>
	<fieldset ng-controller="backupCtrl" ng-hide="navigation!=1">
		<label for="backupbase"><?php p($l->t('Backup directory')) ?></label>
		<input readonly="readonly" type="text" id="backupbase" value="<?php p(\OCA\Updater\App::getBackupBase()); ?>" />
		<table ng-controller="backupCtrl">
			<thead ng-hide="!entries.length">
				<tr>
					<th><?php p($l->t('Backup')) ?></th>
					<th><?php p($l->t('Done on')) ?></th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				<tr ng-repeat="entry in entries">
					<td>{{entry.title}}</td>
					<td>{{entry.date}}</td>
					<td><a href="">Delete</a></td>
				</tr>
				<tr ng-show="!entries.length"><td colspan="3"><?php p($l->t('No backups found')) ?></td></tr>
			</tbody>
		</table>
	</fieldset>
	<fieldset ng-controller="updateCtrl" ng-hide="navigation!=2">
		<?php print_unescaped(OC_Updater::ShowUpdatingHint()) ?>
		<div id="upd-progress" style="display:none;"><div></div></div>
		<button ng-show="<?php p($isNewVersionAvailable) ?>" id="updater-backup"><?php p($l->t('Update')) ?></button>
	</fieldset>
</div>
