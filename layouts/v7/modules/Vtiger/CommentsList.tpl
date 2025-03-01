{*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.1
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is: vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************}
{strip}

{assign var=IS_CREATABLE value=$COMMENTS_MODULE_MODEL->isPermitted('CreateView')}
{assign var=IS_EDITABLE value=$COMMENTS_MODULE_MODEL->isPermitted('EditView')}
{* 


<div class="container">
    <div class="col-sm-6" style="position:absolute;right:20px;background-color: #fff; ">
        <div class="row">
            <div class="col-sm-1 image">
                <div class="media-left title">
                    <div class="col-lg-2 recordImage commentInfoHeader" style="width:50px; height:50px; font-size: 30px;">
                        {if !empty($IMAGE_PATH)}
                        <img src="{$IMAGE_PATH}" width="100%" height="100%" align="left">
                        {else}
                        <div class="name" style="color: #fff;font-size:12px;">User Replies<span><strong></strong></span></div>
                        {/if}
                    </div>
                </div>
            </div>

            <div class="replies col-sm-12"></div>
        </div>
    </div>
</div>

<style>
.replies {
    font-size: 15px !important;
    padding-top:2%;
}
.time-ago {
    font-size: 10px !important;
    color: rgb(18, 184, 18);
    position: relative;
    top: -5px !important;
}
.media-reply{
    padding: 1%;   
}
</style>
 *}


{if !empty($PARENT_COMMENTS)}
	<ul class="unstyled">
		{if $CURRENT_COMMENT}
			{assign var=CHILDS_ROOT_PARENT_MODEL value=$CURRENT_COMMENT}
			{assign var=CURRENT_COMMENT_PARENT_MODEL value=$CURRENT_COMMENT->getParentCommentModel()}
			{while $CURRENT_COMMENT_PARENT_MODEL neq false}
				{assign var=TEMP_COMMENT value=$CURRENT_COMMENT_PARENT_MODEL}
				{assign var=CURRENT_COMMENT_PARENT_MODEL value=$CURRENT_COMMENT_PARENT_MODEL->getParentCommentModel()}
				{if $CURRENT_COMMENT_PARENT_MODEL eq false}
					{assign var=CHILDS_ROOT_PARENT_MODEL value=$TEMP_COMMENT}
				{/if}	
			{/while}
		{/if}
		{if is_array($PARENT_COMMENTS)}
			{foreach key=Index item=COMMENT from=$PARENT_COMMENTS}
				{assign var=PARENT_COMMENT_ID value=$COMMENT->getId()}
				<li class="commentDetails">
					{include file='Comment.tpl'|@vtemplate_path COMMENT=$COMMENT COMMENT_MODULE_MODEL=$COMMENTS_MODULE_MODEL}

					{if $CHILDS_ROOT_PARENT_MODEL}
						{if $CHILDS_ROOT_PARENT_MODEL->getId() eq $PARENT_COMMENT_ID}		
							{assign var=CHILD_COMMENTS_MODEL value=$CHILDS_ROOT_PARENT_MODEL->getChildComments()}
							{include file='CommentsListIteration.tpl'|@vtemplate_path CHILD_COMMENTS_MODEL=$CHILD_COMMENTS_MODEL}
						{/if}
					{/if}
				</li>	
			{/foreach}

			


			
		{else}
			{include file='Comment.tpl'|@vtemplate_path COMMENT=$PARENT_COMMENTS}
		{/if}
	</ul>
{else}
	<div class="noCommentsMsgContainer" style='padding:20px;'>
		<p class="textAlignCenter">{vtranslate('LBL_NO_COMMENTS',$MODULE_NAME)}</p>	
	</div>
{/if}
{/strip}
