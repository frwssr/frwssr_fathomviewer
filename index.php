<?php

include(__DIR__ . '/../../../core/inc/api.php');

// Perch API
$API = new PerchAPI(1.0, 'frwssr_fathomviewer');

// APIs
$Lang = $API->get('Lang');
$HTML = $API->get('HTML');
$Settings = $API->get('Settings');

// Page settings
$Perch->page_title = $Lang->get('Fathom Viewer');

$Perch->add_javascript($API->app_path('frwssr_fathomviewer').'/js/iframeResizer.min.js?v=2');
$Perch->add_javascript($API->app_path('frwssr_fathomviewer').'/js/fathom-iframe-init.js');

// Perch Frame
include(PERCH_CORE . '/inc/top.php');

// Page
if (!$Settings->get('frwssr_fathomviewer_pageid')->settingValue()) {
	$Alert->set('error', $Lang->get('No URL alert'));
	$Alert->output();
	echo '<header class="title-panel"><h1>' . $Lang->get('Fathom Viewer') . '</h1><div class="notifications"></div></header>';
} else {
	echo '<header class="title-panel"><h1>' . $Lang->get('Fathom Viewer') . '</h1><div class="notifications"></div></header>';
    echo '<iframe id="fathom-viewer-iframe" src="https://app.usefathom.com/share/' . $Settings->get('frwssr_fathomviewer_pageid')->settingValue() . '/wordpress' . ($Settings->get("frwssr_fathomviewer_password")->settingValue() != '' ? '?password=' . hash("sha256", $Settings->get("frwssr_fathomviewer_password")->settingValue()) : '') . '" style="width: 1px;min-width: 100%; height:1000px; max-width:1100px" frameborder="0" onload=fathomInitResizeIframe();></iframe>';
	};

// Perch Frame
include(PERCH_CORE . '/inc/btm.php');
