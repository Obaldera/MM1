{*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.1
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is: vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************}
{* modules/Vtiger/views/MassActionAjax.php *}

{assign var="COMMENT_TEXTAREA_DEFAULT_ROWS" value="2"}
<div class="modal-dialog">
    <div class="modal-content">
        <form class="form-horizontal" id="massSave" method="post" action="index.php">
            <input type="hidden" name="module" value="{$MODULE}" />
            <input type="hidden" name="source_module" value="{$SOURCE_MODULE}" />
            <input type="hidden" name="action" value="MassSaveAjax" />
            <input type="hidden" name="viewname" value="{$CVID}" />
            <input type="hidden" name="selected_ids" value={ZEND_JSON::encode($SELECTED_IDS)}>
            <input type="hidden" name="excluded_ids" value={ZEND_JSON::encode($EXCLUDED_IDS)}>
            <input type="hidden" name="search_key" value= "{$SEARCH_KEY}" />
            <input type="hidden" name="operator" value="{$OPERATOR}" />
            <input type="hidden" name="search_value" value="{$ALPHABET_VALUE}" />
            <input type="hidden" name="search_params" value='{Vtiger_Util_Helper::toSafeHTML(ZEND_JSON::encode($SEARCH_PARAMS))}' />
            <input type="hidden" name="tag_params" value={ZEND_JSON::encode($TAG_PARAMS)}>

            {assign var=HEADER_TITLE value={vtranslate('LBL_ADDING_COMMENT', $MODULE)}}
            {include file="ModalHeader.tpl"|vtemplate_path:$MODULE TITLE=$HEADER_TITLE}

            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row commentTextArea" id="mass_action_add_commentwhatsapp">
                        <select class="col-lg-12 form-control" name="commentcontent" id="commentcontent" rows="{$COMMENT_TEXTAREA_DEFAULT_ROWS}" placeholder="{vtranslate('LBL_WRITE_YOUR_COMMENT_HERE', $MODULE)}..." data-rule-required="true"></select>
                    </div>
                </div>
            </div>
			{include file='AddCommentFooter.tpl'|@vtemplate_path:$MODULE}
       </form>
    </div>
</div>

<script>
    function populateSelect() {
            const selectElement = document.getElementById("commentcontent");
            const proxyUrl = 'https://thingproxy.freeboard.io/fetch/';
            const apiUrl = 'https://whatsaapapi.onrender.com/templateNames';
            fetch(proxyUrl + apiUrl, {
                method: 'GET',
                headers: {
                    'Authorization': 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJPd25lck5hbWUiOiJrYXJhbi10ZXN0LWF1dGgiLCJpYXQiOjE2OTk1MjcyNzV9.h0PMMOPYBjREoV0I8-yHOrtH389qE_kG5DFdDxc08VY',
                }
            })
            .then(response => response.json())
            .then(data => {
                const templates = data.templates;
                templates.forEach(template => {
                    const option = document.createElement("option");
                    option.value = template.name;
                    option.textContent = template.name + " (" + template.status + ")";
                    selectElement.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
        }
    populateSelect();
</script>
