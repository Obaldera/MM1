<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is: vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

class Whatsapp_InRelation_View extends Vtiger_RelatedList_View {

	function process(Vtiger_Request $request) {
		$startindex = 0;
		$parentRecordId = $request->get('record');
		$commentRecordId = $request->get('commentid');
		$moduleName = $request->getModule();
		$rollupSettings = $request->get('rollup_settings');
		$rollupStatus = isset($rollupSettings['rollup_status'])? $rollupSettings['rollup_status'] : false;
		$rollupid = isset($rollupSettings['rollupid']) ? $rollupSettings['rollupid'] : false;
		$currentUserModel = Users_Record_Model::getCurrentUserModel();
		$whatsappModel = Vtiger_Module_Model::getInstance('Whatsapp');

		if ($rollupStatus) {
			$parentRecordModel = Vtiger_Record_Model::getInstanceById($parentRecordId, $moduleName);
			$parentCommentModels = $parentRecordModel->getRollupCommentsForModule($startindex);
			$startindex = $startindex + 10;
		} else {
			$parentCommentModels = Whatsapp_Record_Model::getAllParentComments($parentRecordId);
		}

		$currentCommentModel = null;
		if (!empty($commentRecordId)) {
			$currentCommentModel = Whatsapp_Record_Model::getInstanceById($commentRecordId);
		}

		// To get field model of filename
		$fileNameFieldModel = Vtiger_Field::getInstance("filename", $whatsappModel);
		$fileFieldModel = Vtiger_Field_Model::getInstanceFromFieldObject($fileNameFieldModel);
		$viewer = $this->getViewer($request);
		$viewer->assign('CURRENTUSER', $currentUserModel);
		$viewer->assign('COMMENTS_MODULE_MODEL', $whatsappModel);
		$viewer->assign('PARENT_COMMENTS', $parentCommentModels);
		$viewer->assign('CURRENT_COMMENT', $currentCommentModel);
		$viewer->assign('FIELD_MODEL', $fileFieldModel);
		$viewer->assign('MAX_UPLOAD_LIMIT_MB', Vtiger_Util_Helper::getMaxUploadSize());
		$viewer->assign('MAX_UPLOAD_LIMIT_BYTES', Vtiger_Util_Helper::getMaxUploadSizeInBytes());

		$viewer->assign('MODULE_NAME', $request->getModule());
		$viewer->assign('MODULE_RECORD', $parentRecordId);
		$viewer->assign('ROLLUP_STATUS', $rollupStatus);
		$viewer->assign('ROLLUPID', $rollupid);
		$viewer->assign('STARTINDEX', $startindex);

		return $viewer->view('ShowAllCommentswhatsapp.tpl', $moduleName, 'true');
	}

}
