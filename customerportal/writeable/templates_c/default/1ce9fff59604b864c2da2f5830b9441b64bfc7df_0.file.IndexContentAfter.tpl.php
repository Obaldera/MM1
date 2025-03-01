<?php
/* Smarty version 3.1.39, created on 2023-08-09 06:33:47
  from 'C:\xampp\htdocs\vtigercrm\customerportal\layouts\default\templates\HelpDesk\partials\IndexContentAfter.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_64d3172b7bef97_52841050',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1ce9fff59604b864c2da2f5830b9441b64bfc7df' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vtigercrm\\customerportal\\layouts\\default\\templates\\HelpDesk\\partials\\IndexContentAfter.tpl',
      1 => 1669294712,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64d3172b7bef97_52841050 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php echo '<script'; ?>
 type="text/ng-template" id="editRecordModalHelpDesk.template">
	<form class="form form-vertical" novalidate="novalidate" name="ticketForm">
			<div class="modal-header">
				<button type="button" class="close" ng-click="cancel()" title="Close">&times;</button>
				<h4 class="modal-title" ng-show="editRecord.id">Edit Ticket - {{editRecord.ticket_title}}</h4>
				<h4 class="modal-title" ng-show="!editRecord.id">{{'Add New Ticket'|translate}}</h4>
			</div>
			<div class="modal-body" scroll-me="{'height':'350px'}">
				<div class="form-group" ng-class="{'has-error':ticketForm.ticket_title.$error.required && submit}" ng-if="!disabledFields['ticket_title']">
					<label>{{ticketTitleLabel}}
						<span class="text-danger">*</span>
					</label>
					<input type="text" class="form-control" name="ticket_title" ng-model="data['ticket_title']" required="true" required>
				</div>
				<div class="form-group">
					<div class="row" style="margin-bottom:10px;" ng-repeat="editables in fields">
						<div class="col-sm-6 col-md-6 col-lg-6" ng-repeat="editable in editables">
							<ng-switch on="editable.type.name">
								<div ng-switch-when="picklist">
									<ng-form name="innerForm" ng-class="{'has-error':innerForm.name.$error.required && submit}">
										<label>{{editable.label}}</label>
										<span ng-show="{{editable.mandatory}}" class="text-danger mandatory-label">*</span>
										<select class="form-control" name="name" ng-model="data[$parent.editable.name]" ng-required="{{editable.mandatory}}" ng-options="picklistValue.value as picklistValue.label for picklistValue in editable.type.picklistValues">
										</select>
									</ng-form>
								</div>
								<ng-switch on="editable.type.name">
									<div ng-switch-when="multipicklist">
										<ng-form name="innerForm" ng-class="{'has-error':innerForm.name.$error.required && submit}">
											<label>{{editable.label}}</label>
											<span ng-show="{{editable.mandatory}}" class="text-danger mandatory-label">*</span>
											<ui-select multiple name="name" ng-model="data[$parent.editable.name]" ng-required="{{editable.mandatory}}" portal-select>
												<ui-select-match>{{$item.label}}</ui-select-match>
												<ui-select-choices repeat="picklistValue in editable.type.picklistValues|propsFilter: {label: $select.search,value: $select.search} track by picklistValue.label">
													{{picklistValue.label}}
												</ui-select-choices>
											</ui-select>
										</ng-form>
									</div>
									<ng-switch on="editable.type.name">
										<div ng-switch-when="string">
											<ng-form name="innerForm" ng-class="{'has-error':innerForm.name.$error.required && submit}">
												<label>{{editable.label}}</label>
												<span ng-show="{{editable.mandatory}}" class="text-danger field-error mandatory-label">*</span>
												<input type="text" name="name" class="form-control" ng-model="data[$parent.editable.name]" ng-required="{{editable.mandatory}}">
											</ng-form>
										</div>
										<ng-switch on="editable.type.name">
											<div ng-switch-when="integer">
												<ng-form name="innerForm" ng-class="{'has-error':(innerForm.name.$error.required && submit) || innerForm.name.$error.pattern}">
													<label>{{editable.label}}</label>
													<span ng-show="{{editable.mandatory}}" class="text-danger field-error mandatory-label">*</span>
													<input type="double" name="name" class="form-control" ng-model-options="{updateOn:'blur'}" ng-pattern="/^[\-\+\ ]?\d+$/" ng-trim="false" ng-model="data[$parent.editable.name]" ng-required="{{editable.mandatory}}">
												</ng-form>
												<span ng-show="innerForm.name.$error.pattern" class="text-danger pull-right" translate="Please enter a integer value."></span>
											</div>
											<ng-switch on="editable.type.name">
												<div ng-switch-when="skype">
													<ng-form name="innerForm" ng-class="{'has-error':innerForm.name.$error.required && submit}">
														<label>{{editable.label}}</label>
														<span ng-show="{{editable.mandatory}}" class="text-danger field-error mandatory-label">*</span>
														<input type="text" name="name" class="form-control" ng-model="data[$parent.editable.name]" ng-required="{{editable.mandatory}}">
													</ng-form>
												</div>
												<ng-switch on="editable.type.name">
													<div ng-switch-when="email">
														<ng-form name="innerForm" ng-class="{'has-error':(innerForm.name.$error.required && submit) || innerForm.name.$error.pattern}">
															<label>{{editable.label}}</label>
															<span ng-show="{{editable.mandatory}}" class="text-danger field-error mandatory-label">*</span>
															<input type="text" name="name" ng-model-options="{updateOn:'blur'}" ng-pattern='/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/' class="form-control"
															ng-trim="false" ng-model="data[$parent.editable.name]" ng-required="{{editable.mandatory}}">
														</ng-form>
														<span ng-show="innerForm.name.$error.pattern" class="text-danger pull-right" translate="Please enter a valid E-mail address."></span>
													</div>
													<ng-switch on="editable.type.name">
														<div ng-switch-when="double">
															<ng-form name="innerForm" ng-class="{'has-error':(innerForm.name.$error.required && submit) || innerForm.name.$error.pattern}">
																<label>{{editable.label}}</label>
																<span ng-show="{{editable.mandatory}}" class="text-danger field-error mandatory-label">*</span>
																<input type="double" name="name" ng-model-options="{updateOn:'blur'}" ng-pattern="/^-?\d*(\.\d*)?$/" class="form-control" ng-model="data[$parent.editable.name]" ng-trim="false" ng-required="{{editable.mandatory}}">
															</ng-form>
															<span ng-show="innerForm.name.$error.pattern" class="text-danger pull-right" translate="Please enter integer value."></span>
														</div>
														<ng-switch on="editable.type.name">
															<div ng-switch-when="phone">
																<ng-form name="innerForm" ng-class="{'has-error':innerForm.name.$error.required && submit}">
																	<label>{{editable.label}}</label>
																	<span ng-show="{{editable.mandatory}}" class="text-danger field-error  mandatory-label">*</span>
																	<input type="text" name="name" class="form-control" ng-model="data[$parent.editable.name]" ng-required="{{editable.mandatory}}">
																</ng-form>
															</div>
															<ng-switch on="editable.type.name">
																<div ng-switch-when="time">
																	<ng-form name="innerForm" ng-class="{'has-error':innerForm.name.$error.required && submit}">
																		<label>{{editable.label}}</label>
																		<span ng-show="{{editable.mandatory}}" class="text-danger field-error mandatory-label">*</span>
																		<p class="input-group timepicker">
																			<input type="text" class="form-control" name="name" timepicker-popup minute-step="15" hour-step="1" ng-model="data[$parent.editable.name]" is-open="timemodel[$parent.editable.name]" enable-date="false" show-meridian="true" ng-required="{{editable.mandatory}}" show-button-bar="false"
																			portal-time>
																			<span class="input-group-btn">
																				<button type="button" class="btn btn-default" ng-click="openTimePicker($event,$parent.editable.name)"><i class="glyphicon glyphicon-time"></i></button>
																			</span>
																		</p>
																	</ng-form>
																</div>
																<ng-switch on="editable.type.name">
																	<div ng-switch-when="currency">
																		<ng-form name="innerForm" ng-class="{'has-error':(innerForm.name.$error.required && submit) || innerForm.name.$error.pattern}">
																			<label>{{editable.label}}</label>
																			<span ng-show="{{editable.mandatory}}" class="text-danger field-error mandatory-label">*</span>
																			<div class="input-group">
																				<span class="input-group-addon">$</span>
																				<input type="text" name="name" ng-model-options="{updateOn:'blur'}" ng-pattern="/^\d*\.?\d*$/" class="form-control" ng-model="data[$parent.editable.name]" ng-trim="false" ng-required="{{editable.mandatory}}">
																			</div>
																			<span ng-show="innerForm.name.$error.pattern" class="text-danger pull-right field-error" translate="Please enter positive numbers."></span>
																		</ng-form>
																	</div>
																	<ng-switch on="editable.type.name">
																		<div ng-switch-when="date">
																			<ng-form name="innerForm" ng-class="{'has-error':innerForm.name.$error.required && submit}">
																				<label>{{editable.label}}</label>
																				<span ng-show="{{editable.mandatory}}" class="text-danger field-error mandatory-label">*</span>
																				<p class="input-group datepicker">
																					<input type="text" class="form-control" name="name" datepicker-popup="yyyy-MM-dd" show-weeks="false" ng-model="data[$parent.editable.name]" is-open="datemodel[$parent.editable.name]" min-date="minDate" close-text="Close" ng-required="{{editable.mandatory}}" show-button-bar="false"
																					close-on-date-selection="true" portal-date>
																					<span class="input-group-btn">
																						<button type="button" class="btn btn-default" ng-click="openDatePicker($event,$parent.editable.name)"><i class="glyphicon glyphicon-calendar"></i></button>
																					</span>
																				</p>
																			</ng-form>
																		</div>
																		<ng-switch on="editable.type.name">
																			<div ng-switch-when="url">
																				<ng-form name="innerForm" ng-class="{'has-error':(innerForm.name.$error.required && submit) || innerForm.name.$error.url}">
																					<label>{{editable.label}}</label>
																					<span ng-show="{{editable.mandatory}}" class="text-danger field-error mandatory-label">*</span>
																					<input type="url" name="name" class="form-control" ng-model-options="{updateOn:'blur'}" ng-model="data[$parent.editable.name]" ng-trim="false" ng-required="{{editable.mandatory}}">
																				</ng-form>
																				<span ng-show="innerForm.name.$error.url" class="text-danger pull-right field-error" translate="Please enter a valid Url."></span>
																			</div>
																			<ng-switch on="editable.type.name">
																				<div ng-switch-when="boolean">
																					<div class="checkbox" style="padding:10px;margin-top:20px;">
																						<ng-form name="innerForm" ng-class="{'has-error':innerForm.name.$error.required && submit}">
																							<div style="font-weight:bold;margin-left:10px;">
																								<input type="checkbox" name="name" style="cursor:pointer;" ng-model="data[$parent.editable.name]" ng-required="{{editable.mandatory}}">{{editable.label}}
																								<span ng-show="{{editable.mandatory}}" class="text-danger mandatory-label">*</span>
																							</div>
																						</ng-form>
																					</div>
																				</div>
																				<ng-switch on="editable.type.name">
																					<div ng-switch-when="reference">
																						<ng-form name="innerForm" ng-class="{'has-error':(innerForm.name.$error.required || innerForm.name.$error.editable)  && submit}">
																							<label>{{editable.label}}</label>
																							<span ng-show="{{editable.mandatory}}" class="text-danger field-error mandatory-label">*</span>
																							<input type="text" name="name" ng-model="data[$parent.editable.name]" typeahead="record as record.label for record in fetchReferenceRecords(editable.type.refersTo[0],$viewValue)" typeahead-min-length="3" typeahead-wait-ms="10" typeahead-editable="false"
																							class="form-control" placeholder="{{'Type 3 characters'|translate}}" typeahead-loading="loadingRecords" ng-required="{{editable.mandatory}}" ng-trim="false">
																							<i ng-show="loadingRecords" class="glyphicon glyphicon-refresh"></i>
																						</ng-form>
																						<span ng-show="innerForm.name.$error.editable && submit" class="text-danger pull-right field-error" translate="Record not found."></span>
																					</div>
						</div>
					</div>
					<div class="row" ng-if="serviceContractFieldPresent">
						<div class="col-lg-6 col-sm-6 col-md-6">
							<ng-form name="innerForm" ng-class="{'has-error':(innerForm.name.$error.required || innerForm.name.$error.editable)  && submit}">
								<label>Service Contract</label>
								<span ng-show="{{editable.mandatory}}" class="text-danger field-error mandatory-label">*</span>
								<input type="text" name="name" ng-model="data['serviceid']" typeahead="record as record.label for record in fetchReferenceRecords('ServiceContracts',$viewValue)" typeahead-min-length="3" typeahead-wait-ms="10" typeahead-editable="false" class="form-control" placeholder="{{'Type 3 characters'|translate}}"
								typeahead-loading="loadingRecords" ng-trim="false">
								<i ng-show="loadingRecords" class="glyphicon glyphicon-refresh"></i>
							</ng-form>
							<span ng-show="innerForm.name.$error.editable && submit" class="text-danger pull-right field-error" translate="Record not found."></span>
						</div>
					</div>
					<div class="row" ng-if="textFieldsEnabled">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" ng-repeat="editable in editableText">
							<div class="form-group">
								<ng-form name="innerForm" ng-class="{'has-error':innerForm.name.$error.required && submit}">
									<label>{{editable.label}}</label>
									<span ng-show="{{editable.mandatory}}" class="text-danger mandatory-label">*</span>
									<textarea msd-elastic class="form-control" name="name" style="resize:none;height:100px;" ng-model="data[editable.name]" ng-required="{{editable.mandatory}}"></textarea>
								</ng-form>
							</div>
						</div>
					</div>
				</div>
			</div>
			</div>
			</div>
			</div>
			</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" ng-click="cancel()" translate="Cancel">Cancel</button>
				<button type="submit" class="btn btn-success" ng-click="save(ticketForm.$valid)" translate="Save">Save</button>
			</div>
		</form>
<?php echo '</script'; ?>
>

<?php }
}
