<?php
$grid['elements']=array();
$selector['elements']=array('field'=>'selectrow','renderer'=>'selector','view'=>"<input onclick=\"toggleRow(%1\$d)\" type=checkbox name=\"selectrow[%1\$d]\" id=\"id_selectrow_%1\$d\" value=\"%2\$s\">");
$grid['elements']['properties']=array('table'=>'fgs_element','system'=>1,'primary_key'=>array('element_rowid'),'modal'=>0,'user_order'=>1,'user_pagesize'=>1,'user_offset'=>1,'inline_edit'=>1,'fkr'=>array('element_form'=>'form_sid'),'title'=>'elements','joins'=>array(),'save'=>array('element_component'),'sort'=>array('element_rowid'=>'element_rowid','element_table'=>'element_table','element_field'=>'element_field','element_component'=>'element_component','element_label'=>'element_label','element_index'=>'element_index','element_name'=>'element_name','element_fieldset'=>'element_fieldset','element_hidden'=>'element_hidden'),'sort_prefix'=>array(),'sort_suffix'=>array(),'register'=>array(),'select'=>'t.element_rowid,t.element_table,t.element_field,t.element_component,t.element_label,t.element_list,t.element_index,t.element_name,t.element_fieldset,t.element_hidden','from'=>'fgs_element t ');
$grid['elements']['initial']=array('pagesize'=>-1,'direction'=>'ASC','order'=>'element_index','offset'=>0);
$grid['elements']['session']=array('pagesize','direction','order','offset','total','multimode_hide','display','hide','apk','foreign_key','adk');
$ra['elements']=array();
$ra['elements'][]=array('load'=>false,'action'=>'update','renderer'=>'RowAction','immediate'=>0,'view'=>'<a href="%3$s&amp;update=%1$d&amp;key=%2$s" class="icon_edit" title="Редактировать" ></a>');
$ra['elements'][]=array('load'=>false,'action'=>'remove','renderer'=>'RowAction','immediate'=>0,'view'=>'<a href="%3$s&amp;remove=%1$d&amp;key=%2$s" class="icon_delete" title="Удалить" ></a>');
$ra['elements'][]=array('load'=>false,'action'=>'copy','renderer'=>'RowAction','immediate'=>0,'view'=>'<a href="%3$s&amp;copy=%1$d&amp;key=%2$s" class="icon_copy" title="Копировать" ></a>');
$ra['elements'][]=array('load'=>false,'action'=>'attribute','renderer'=>'RowAction','immediate'=>0,'view'=>'<a href="%3$s&amp;attribute=%1$d&amp;key=%2$s" class="icon_attr" title="Attribute" ></a>','field'=>'element_component');
$rsa['elements']=array();
$rsa['elements'][]=array('action'=>'multi_update','renderer'=>'RowSetAction','immediate'=>0,'view'=>'<button type="submit" name="multi_update"  title="Multi_update" ><span style="margin:0 -5px -3px -0px;" class="icon_edit"></span></button>');
$rsa['elements'][]=array('action'=>'multi_remove','renderer'=>'RowSetAction','immediate'=>0,'view'=>'<button type="submit" name="multi_remove"  title="Multi_remove" ><span style="margin:0 -5px -3px -0px;" class="icon_delete"></span></button>');
$column['elements']=array();
$column['elements'][0]=array('rowid'=>95,'component'=>'ColumnText','header'=>'Id','sid'=>'element_rowid','hidden'=>'0','renderer'=>'text','type'=>'int','field'=>'element_rowid','hidden'=>'0','calculate'=>'0');
$column['elements'][1]=array('rowid'=>96,'component'=>'ColumnText','header'=>'Таблица','sid'=>'element_table','hidden'=>'0','renderer'=>'text','type'=>'varchar','field'=>'element_table','hidden'=>'0','calculate'=>'0');
$column['elements'][2]=array('rowid'=>97,'component'=>'ColumnText','header'=>'Поле','sid'=>'element_field','hidden'=>'0','renderer'=>'text','type'=>'varchar','field'=>'element_field','hidden'=>'0','calculate'=>'0');
$column['elements'][3]=array('rowid'=>99,'table'=>'fgs_element','name'=>'element_component','inline_edit'=>1,'attributes'=>'','onclick'=>'inlineEdit','required'=>1,'save'=>'1','component'=>'ColumnSelectOneMenu','header'=>'Компонент','sid'=>'element_component','hidden'=>'0','list'=>array('sid'=>'ElementComponent','table'=>'fgs_component','from'=>'fgs_component','primary_key'=>'component_sid','select'=>'component_sid id,component_name as name','order'=>'component_name ASC','where'=>'component_type=\'element\'','display_field'=>'component_name'),'required'=>1,'relation'=>'0','field'=>'element_component','type'=>'varchar','list_sid'=>'ElementComponent','renderer'=>'option');
$column['elements'][4]=array('rowid'=>98,'table'=>'fgs_element','name'=>'element_label','inline_edit'=>1,'attributes'=>'','size'=>'20','maxlength'=>'64','renderer'=>'text','onclick'=>'inlineEdit','required'=>0,'component'=>'ColumnInputText','header'=>'Ярлык','sid'=>'element_label','hidden'=>'0','field'=>'element_label','type'=>'varchar','attributes'=>'size=\'20\' maxlength=\'64\'');
$column['elements'][5]=array('rowid'=>100,'component'=>'ColumnLink','header'=>'Список','sid'=>'element_list','hidden'=>'0','calculate'=>'0','renderer'=>'ElementListLink','field'=>'element_list','type'=>'varchar');
$column['elements'][6]=array('rowid'=>101,'table'=>'fgs_element','name'=>'element_index','inline_edit'=>1,'attributes'=>'','size'=>'4','maxlength'=>'4','renderer'=>'text','onclick'=>'inlineEdit','required'=>1,'component'=>'ColumnInputText','header'=>'Индекс','sid'=>'element_index','hidden'=>'0','required'=>1,'field'=>'element_index','type'=>'smallint','attributes'=>'size=\'4\' maxlength=\'4\'');
$column['elements'][7]=array('rowid'=>3172,'component'=>'ColumnText','header'=>'Атрибут name','sid'=>'element_name','hidden'=>'0','renderer'=>'text','type'=>'varchar','field'=>'element_name','hidden'=>'0','calculate'=>'0');
$column['elements'][8]=array('rowid'=>5641,'table'=>'fgs_element','name'=>'element_fieldset','inline_edit'=>1,'attributes'=>'','size'=>'20','maxlength'=>'64','renderer'=>'text','onclick'=>'inlineEdit','required'=>0,'component'=>'ColumnInputText','header'=>'Fieldset','sid'=>'element_fieldset','hidden'=>'0','align'=>'left','field'=>'element_fieldset','type'=>'varchar','attributes'=>'size=\'20\' maxlength=\'64\'');
$column['elements'][9]=array('rowid'=>5724,'component'=>'ColumnLookup','header'=>'Скрытый ?','sid'=>'element_hidden','hidden'=>'0','join_lookup'=>0,'relation'=>'0','list'=>array('options'=>array('0'=>'нет','1'=>'да')),'field'=>'element_hidden','hidden'=>'0','type'=>'tinyint','align'=>'center','list_sid'=>'YesNo','renderer'=>'option');
$button['elements']=array();