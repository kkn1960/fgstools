<?php
$grid['columns']=array();
$selector['columns']=array('field'=>'selectrow','renderer'=>'selector','view'=>"<input onclick=\"toggleRow(%1\$d)\" type=checkbox name=\"selectrow[%1\$d]\" id=\"id_selectrow_%1\$d\" value=\"%2\$s\">");
$grid['columns']['properties']=array('table'=>'fgs_column','system'=>1,'primary_key'=>array('column_rowid'),'modal'=>0,'user_order'=>1,'user_pagesize'=>1,'user_offset'=>1,'inline_edit'=>1,'fkr'=>array('column_grid'=>'grid_sid'),'title'=>'columns','joins'=>array(),'save'=>array('column_component'),'sort'=>array('column_rowid'=>'column_rowid','column_table'=>'column_table','column_table_alias'=>'column_table_alias','column_field'=>'column_field','column_component'=>'column_component','column_action'=>'column_action','column_header'=>'column_header','column_list'=>'column_list','column_index'=>'column_index','column_hidden'=>'column_hidden','column_save'=>'column_save'),'sort_prefix'=>array(),'sort_suffix'=>array(),'register'=>array(),'select'=>'t.column_rowid,t.column_table,t.column_table_alias,t.column_field,t.column_component,t.column_action,t.column_header,t.column_list,t.column_index,t.column_hidden,t.column_save','from'=>'fgs_column t ');
$grid['columns']['initial']=array('pagesize'=>-1,'direction'=>'ASC','order'=>'column_index','offset'=>0);
$grid['columns']['session']=array('pagesize','direction','order','offset','total','multimode_hide','display','hide','apk','foreign_key','adk');
$ra['columns']=array();
$ra['columns'][]=array('load'=>false,'action'=>'update','renderer'=>'RowAction','immediate'=>0,'view'=>'<a href="%3$s&amp;update=%1$d&amp;key=%2$s" class="icon_edit" title="Редактировать" ></a>');
$ra['columns'][]=array('load'=>false,'action'=>'remove','renderer'=>'RowAction','immediate'=>0,'view'=>'<a href="%3$s&amp;remove=%1$d&amp;key=%2$s" class="icon_delete" title="Удалить" ></a>');
$ra['columns'][]=array('load'=>false,'action'=>'copy','renderer'=>'RowAction','immediate'=>0,'view'=>'<a href="%3$s&amp;copy=%1$d&amp;key=%2$s" class="icon_copy" title="Копировать" ></a>');
$ra['columns'][]=array('load'=>false,'action'=>'attribute','renderer'=>'RowAction','immediate'=>0,'view'=>'<a href="%3$s&amp;attribute=%1$d&amp;key=%2$s" class="icon_attr" title="Attribute" ></a>','field'=>'column_component');
$rsa['columns']=array();
$rsa['columns'][]=array('action'=>'multi_update','renderer'=>'RowSetAction','immediate'=>0,'view'=>'<button type="submit" name="multi_update"  title="Multi_update" ><span style="margin:0 -5px -3px -0px;" class="icon_edit"></span></button>');
$rsa['columns'][]=array('action'=>'multi_remove','renderer'=>'RowSetAction','immediate'=>0,'view'=>'<button type="submit" name="multi_remove"  title="Multi_remove" ><span style="margin:0 -5px -3px -0px;" class="icon_delete"></span></button>');
$column['columns']=array();
$column['columns'][0]=array('rowid'=>5703,'component'=>'ColumnText','header'=>'Rowid','sid'=>'column_rowid','hidden'=>'0','renderer'=>'text','type'=>'int','field'=>'column_rowid','hidden'=>'0','calculate'=>'0');
$column['columns'][1]=array('rowid'=>18,'component'=>'ColumnText','header'=>'Таблица','sid'=>'column_table','hidden'=>'0','renderer'=>'text','type'=>'varchar','field'=>'column_table','hidden'=>'0','calculate'=>'0');
$column['columns'][2]=array('rowid'=>5745,'component'=>'ColumnText','header'=>'Алиас таблицы','sid'=>'column_table_alias','hidden'=>'0','renderer'=>'text','type'=>'varchar','field'=>'column_table_alias','hidden'=>'0','calculate'=>'0');
$column['columns'][3]=array('rowid'=>19,'component'=>'ColumnText','header'=>'Поле','sid'=>'column_field','hidden'=>'0','renderer'=>'text','type'=>'varchar','field'=>'column_field','hidden'=>'0','calculate'=>'0');
$column['columns'][4]=array('rowid'=>21,'table'=>'fgs_column','name'=>'column_component','inline_edit'=>1,'attributes'=>'','onclick'=>'inlineEdit','required'=>1,'save'=>'1','component'=>'ColumnSelectOneMenu','header'=>'Компонент','sid'=>'column_component','hidden'=>'0','list'=>array('options'=>array('ColumnText'=>'ColumnText','ColumnDate'=>'ColumnDate','ColumnDatetime'=>'ColumnDatetime','ColumnTime'=>'ColumnTime','ColumnLookup'=>'ColumnLookup','ColumnLink'=>'ColumnLink','ColumnTableJoiner'=>'ColumnTableJoiner','ColumnInputText'=>'ColumnInputText','ColumnSelectOneMenu'=>'ColumnSelectOneMenu','RowSetAction'=>'RowSetAction','RowAction'=>'RowAction','RowSelector'=>'RowSelector','GridButton'=>'GridButton')),'required'=>1,'relation'=>'0','field'=>'column_component','type'=>'varchar','list_sid'=>'ColumnComponent','renderer'=>'option');
$column['columns'][5]=array('rowid'=>5592,'component'=>'ColumnText','header'=>'Действие','sid'=>'column_action','hidden'=>'0','renderer'=>'text','type'=>'varchar','field'=>'column_action','hidden'=>'0','calculate'=>'0');
$column['columns'][6]=array('rowid'=>20,'table'=>'fgs_column','name'=>'column_header','inline_edit'=>1,'attributes'=>'','size'=>'20','maxlength'=>'64','renderer'=>'text','onclick'=>'inlineEdit','required'=>0,'component'=>'ColumnInputText','header'=>'Заголовок','sid'=>'column_header','hidden'=>'0','field'=>'column_header','type'=>'varchar','attributes'=>'size=\'20\' maxlength=\'64\'');
$column['columns'][7]=array('rowid'=>22,'component'=>'ColumnLink','header'=>'Список','sid'=>'column_list','hidden'=>'0','calculate'=>'0','renderer'=>'ColumnListLink','field'=>'column_list','type'=>'varchar');
$column['columns'][8]=array('rowid'=>23,'table'=>'fgs_column','name'=>'column_index','inline_edit'=>1,'attributes'=>'','size'=>'4','maxlength'=>'4','renderer'=>'text','onclick'=>'inlineEdit','required'=>1,'component'=>'ColumnInputText','header'=>'Индекс','sid'=>'column_index','hidden'=>'0','required'=>1,'field'=>'column_index','type'=>'smallint','attributes'=>'size=\'4\' maxlength=\'4\'');
$column['columns'][9]=array('rowid'=>5723,'component'=>'ColumnLookup','header'=>'Скрытый ?','sid'=>'column_hidden','hidden'=>'0','join_lookup'=>0,'relation'=>'0','list'=>array('options'=>array('0'=>'нет','1'=>'да')),'field'=>'column_hidden','hidden'=>'0','type'=>'varchar','align'=>'center','list_sid'=>'YesNo','renderer'=>'option');
$column['columns'][10]=array('rowid'=>5728,'component'=>'ColumnLookup','header'=>'Сохранить','sid'=>'column_save','hidden'=>'0','join_lookup'=>0,'relation'=>'0','list'=>array('options'=>array('0'=>'нет','1'=>'да')),'field'=>'column_save','hidden'=>'0','type'=>'tinyint','list_sid'=>'YesNo','renderer'=>'option');
$button['columns']=array();
$button['columns'][]=array('rowid'=>5769,'type'=>'submit','renderer'=>'button','name'=>'save','events'=>'','attributes'=>'','value'=>'Сохранить');