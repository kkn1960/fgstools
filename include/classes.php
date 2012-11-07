<?php
//framework classes
$cp['Controller']='system/framework/component/Controller.inc';
$cp['Column']='system/framework/component/Column.inc';
$cp['Component']='system/framework/component/Component.inc';
$cp['Crud']='system/framework/component/Crud.inc';
$cp['Dataset']='system/framework/component/Dataset.inc';
$cp['Form']='system/framework/component/Form.inc';
$cp['Grid']='system/framework/component/Grid.inc';
$cp['GridButton']='system/framework/component/GridButton.inc';
$cp['InputAutocomplete']='system/framework/component/InputAutocomplete.inc';
$cp['InputMultiAutocomplete']='system/framework/component/InputMultiAutocomplete.inc';
$cp['InputButton']='system/framework/component/InputButton.inc';
$cp['InputDate']='system/framework/component/InputDate.inc';
$cp['InputDatetime']='system/framework/component/InputDatetime.inc';
$cp['InputElement']='system/framework/component/InputElement.inc';
$cp['InputFile']='system/framework/component/InputFile.inc';
$cp['InputHidden']='system/framework/component/InputHidden.inc';
$cp['InputMultipleSelect']='system/framework/component/InputMultipleSelect.inc';
$cp['InputSecret']='system/framework/component/InputSecret.inc';
$cp['InputSingleSelect']='system/framework/component/InputSingleSelect.inc';
$cp['InputSystem']='system/framework/component/InputSystem.inc';
$cp['InputText']='system/framework/component/InputText.inc';
$cp['InputTextarea']='system/framework/component/InputTextarea.inc';
$cp['InputTime']='system/framework/component/InputTime.inc';

$cp['InputColumn']='system/framework/component/InputColumn.inc';
$cp['ColumnMultipleSelect']='system/framework/component/ColumnMultipleSelect.inc';
$cp['ColumnSingleSelect']='system/framework/component/ColumnSingleSelect.inc';
$cp['ColumnInputText']='system/framework/component/ColumnInputText.inc';

$cp['MasterDetail']='system/framework/component/MasterDetail.inc';
$cp['Predicate']='system/framework/component/Predicate.inc';
$cp['PredicateRange']='system/framework/component/PredicateRange.inc';
$cp['RowAction']='system/framework/component/RowAction.inc';
$cp['RowSetAction']='system/framework/component/RowSetAction.inc';
$cp['Search']='system/framework/component/Search.inc';
$cp['SelectBooleanCheckbox']='system/framework/component/SelectBooleanCheckbox.inc';
$cp['TransferFieldCheckbox']='system/framework/component/TransferFieldCheckbox.inc';
$cp['Unit']='system/framework/component/Unit.inc';
$cp['UnitSet']='system/framework/component/UnitSet.inc';


//handlers
$cp['AccessHandler']='system/framework/handler/AccessHandler.inc';
$cp['Evaluator']='system/framework/handler/Evaluator.inc';
$cp['ConditionTester']='system/framework/handler/ConditionTester.inc';
$cp['EventHandler']='system/framework/handler/EventHandler.inc';
$cp['ListLoader']='system/framework/handler/ListLoader.inc';
$cp['Registry']='system/framework/handler/Registry.inc';
$cp['RequestHandler']='system/framework/handler/RequestHandler.inc';
$cp['PredicateBuilder']='system/framework/handler/PredicateBuilder.inc';
$cp['Converter']='system/framework/handler/Converter.inc';
//renderers
$cp['FormKit']='system/framework/renderer/FormKit.inc';
$cp['GridKit']='system/framework/renderer/GridKit.inc';
$cp['FgsFormView']='system/framework/renderer/FgsFormView.inc';
$cp['FgsGridView']='system/framework/renderer/FgsGridView.inc';
$cp['FgsSearchView']='system/framework/renderer/FgsSearchView.inc';
$cp['jQuery']='system/framework/renderer/jQuery.inc';


//end of  framework classes

//configurator classes

//components
$cp['Attribute']='system/configurator/component/Attribute.inc';
$cp['Editor']='system/configurator/component/Editor.inc';
$cp['AttributeForm']='system/configurator/component/AttributeForm.inc';
$cp['Configurator']='system/configurator/component/Configurator.inc';
$cp['FormGrid']='system/configurator/component/FormGrid.inc';
$cp['GridGrid']='system/configurator/component/GridGrid.inc';
$cp['SearchGrid']='system/configurator/component/SearchGrid.inc';

//classes for specification's export

$cp['ConfigExport']='system/configurator/export/ConfigExport.inc';
$cp['ControllerExport']='system/configurator/export/ControllerExport.inc';
$cp['DatasetExport']='system/configurator/export/DatasetExport.inc';
$cp['Export']='system/configurator/export/Export.inc';
$cp['FormExport']='system/configurator/export/FormExport.inc';
$cp['GridExport']='system/configurator/export/GridExport.inc';
$cp['ListExport']='system/configurator/export/ListExport.inc';
$cp['MenuExport']='system/configurator/export/MenuExport.inc';
$cp['SearchExport']='system/configurator/export/SearchExport.inc';
$cp['MessageExport']='system/configurator/export/MessageExport.inc';

//renderers
$cp['AttributeView']='system/configurator/renderer/AttributeView.inc';
$cp['FgsAddGridView']='system/configurator/renderer/FgsAddGridView.inc';
$cp['FormExportView']='system/configurator/renderer/FormExportView.inc';
$cp['GridExportView']='system/configurator/renderer/GridExportView.inc';
$cp['SearchExportView']='system/configurator/renderer/SearchExportView.inc';
$cp['ControllerExportView']='system/configurator/renderer/ControllerExportView.inc';
$cp['ListExportView']='system/configurator/renderer/ListExportView.inc';
$cp['MessageExportView']='system/configurator/renderer/MessageExportView.inc';
$cp['DatasetExportView']='system/configurator/renderer/DatasetExportView.inc';
$cp['MenuExportView']='system/configurator/renderer/MenuExportView.inc';
$cp['ExportView']='system/configurator/renderer/ExportView.inc';
$cp['ControllerLink']='system/configurator/renderer/ControllerLink.inc';
$cp['FormLink']='system/configurator/renderer/FormLink.inc';
$cp['GridLink']='system/configurator/renderer/GridLink.inc';
$cp['SearchLink']='system/configurator/renderer/SearchLink.inc';
$cp['DatasetLink']='system/configurator/renderer/DatasetLink.inc';
$cp['ListDatasetLink']='system/configurator/renderer/ListDatasetLink.inc';
$cp['ElementListLink']='system/configurator/renderer/ElementListLink.inc';
$cp['ColumnListLink']='system/configurator/renderer/ColumnListLink.inc';
$cp['FieldListLink']='system/configurator/renderer/FieldListLink.inc';
$cp['FieldLink']='system/configurator/renderer/FieldLink.inc';
//end of  configurator classes

//extensions

$cp['FormFieldsList']='system/extension/FormFieldsList.inc';
$cp['MenuItem']='system/extension/MenuItem.inc';
$cp['FGSLogin']='system/extension/FGSLogin.inc';
$cp['LoginForm']='system/extension/LoginForm.inc';
$cp['LoginFormView']='system/extension/LoginFormView.inc';

//debug classes
//components
$cp['log']='system/debug/log.inc';
$cp['debug']='system/debug/component/debug.inc';
$cp['Timer']='system/debug/component/Timer.inc';

//renderers
$cp['DebugView']='system/debug/renderer/DebugView.inc';
$cp['TimerView']='system/debug/renderer/TimerView.inc';

//end of  debug classes

//menu classes
$cp['ddm']='system/menu/ddm.inc';
$cp['svm']='system/menu/svm.inc';

//end of  menu classes


//db drivers
$cp['Mysql']='system/driver/Mysql.inc';
$cp['MySqlLoader']='system/driver/MySqlLoader.inc';

$cp['PostgreSql']='system/driver/PostgreSql.inc';
$cp['PostgreSqlLoader']='system/driver/PostgreSqlLoader.inc';

// system custom classes
// forms
//grids
//searchs
//datasets
//controllers

//filters
$cp['FilterDigits']='system/filter/FilterDigits.inc';



