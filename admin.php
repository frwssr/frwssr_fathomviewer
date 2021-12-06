<?php
    include(__DIR__.'/_version.php');

    $this->register_app('frwssr_fathomviewer', 'Fathom Viewer', 100, 'Fathom Analytics shared dashboard viewing app', FRWSSR_FA_VERSION, true);
    $this->require_version('frwssr_fathomviewer', '3.2');
	$this->add_setting('frwssr_fathomviewer_pageid', 'Dashboard ID', 'url', false);
	$this->add_setting('frwssr_fathomviewer_password', 'Password', 'text', false);

    $API  = new PerchAPI(1.0, 'frwssr_fathomviewer');