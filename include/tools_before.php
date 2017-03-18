<?php
$_SERVER["DOCUMENT_ROOT"] = realpath(dirname(__FILE__)."/../../../..");
$DOCUMENT_ROOT = $_SERVER["DOCUMENT_ROOT"];

define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS",true);
define('NO_AGENT_CHECK', true);
define("STATISTIC_SKIP_ACTIVITY_CHECK", true);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

@set_time_limit(0);
if (!\Bitrix\Main\Loader::includeModule("intervolga.migrato"))
{
	echo "Module intervolga.migrato not installed";
}

try
{
	\Intervolga\Migrato\Tool\Page::checkRights();
}
catch (\Exception $exception)
{
	\Intervolga\Migrato\Tool\Page::handleException($exception);
	include "tools_after.php";
	die;
}