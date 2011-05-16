<?php

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {

	// Background image setting
	$name = 'theme_hustoj/background';
	$title = get_string('background','theme_hustoj');
	$description = get_string('backgrounddesc', 'theme_hustoj');
	$setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
	$settings->add($setting);

	// logo image setting
	$name = 'theme_hustoj/logo';
	$title = get_string('logo','theme_hustoj');
	$description = get_string('logodesc', 'theme_hustoj');
	$setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
	$settings->add($setting);

	// link color setting
	$name = 'theme_hustoj/linkcolor';
	$title = get_string('linkcolor','theme_hustoj');
	$description = get_string('linkcolordesc', 'theme_hustoj');
	$default = '#32529a';
	$previewconfig = NULL;
	$setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
	$settings->add($setting);

	// link hover color setting
	$name = 'theme_hustoj/linkhover';
	$title = get_string('linkhover','theme_hustoj');
	$description = get_string('linkhoverdesc', 'theme_hustoj');
	$default = '#4e2300';
	$previewconfig = NULL;
	$setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
	$settings->add($setting);

	// main color setting
	$name = 'theme_hustoj/maincolor';
	$title = get_string('maincolor','theme_hustoj');
	$description = get_string('maincolordesc', 'theme_hustoj');
	$default = '#002f2f';
	$previewconfig = NULL;
	$setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
	$settings->add($setting);

	// main color accent setting
	$name = 'theme_hustoj/maincoloraccent';
	$title = get_string('maincoloraccent','theme_hustoj');
	$description = get_string('maincoloraccentdesc', 'theme_hustoj');
	$default = '#092323';
	$previewconfig = NULL;
	$setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
	$settings->add($setting);

	// heading color setting
	$name = 'theme_hustoj/headingcolor';
	$title = get_string('headingcolor','theme_hustoj');
	$description = get_string('headingcolordesc', 'theme_hustoj');
	$default = '#4e0000';
	$previewconfig = NULL;
	$setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
	$settings->add($setting);

	// block heading color setting
	$name = 'theme_hustoj/blockcolor';
	$title = get_string('blockcolor','theme_hustoj');
	$description = get_string('blockcolordesc', 'theme_hustoj');
	$default = '#002f2f';
	$previewconfig = NULL;
	$setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
	$settings->add($setting);

	// forum subject background color setting
	$name = 'theme_hustoj/forumback';
	$title = get_string('forumback','theme_hustoj');
	$description = get_string('forumbackdesc', 'theme_hustoj');
	$default = '#e6e2af';
	$previewconfig = NULL;
	$setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
	$settings->add($setting);

}