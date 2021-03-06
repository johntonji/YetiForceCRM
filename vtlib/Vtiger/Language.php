<?php
/* +**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 * ********************************************************************************** */
namespace vtlib;

/**
 * Language Manager class for vtiger Modules.
 * @package vtlib
 */
class Language extends LanguageImport
{

	/**
	 * Constructor
	 */
	function __construct()
	{
		parent::__construct();
	}

	/**
	 * Function to remove language files related to a module
	 * @param Vtiger_Module Instance of module
	 */
	static function deleteForModule($moduleInstance)
	{
		$db = \PearDatabase::getInstance();
		$result = $db->query('SELECT prefix FROM vtiger_language');
		while ($lang = $db->getSingleValue($result)) {
			$langFilePath = "languages/$lang/" . $moduleInstance->name . '.php';
			if (file_exists($langFilePath))
				@unlink($langFilePath);
		}
	}
}
