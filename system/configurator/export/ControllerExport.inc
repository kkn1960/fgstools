<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class ControllerExport extends ConfigExport
{
    public $type='controller';
    function export($sid,$handle,$e)
    {
        global $registry,$db;
        $lang=$registry->get('export','export','language') ;
        $obj=new Export();
        $d=array();
        $q="select * from fgs_controller where controller_sid='$sid'";
        if(!$db->record($q,$d))
        {
            debug::writeExport($this->type,$sid,Msg("controller_not_found"));
            return;
        }
        $type=$d['controller_type'];
        $unitInfo=array();
        $q="select * from fgs_unit where unit_controller='$sid' order by unit_type DESC";
        $n=$db->set($q,$unitInfo);
        if($n==0)
        {
            debug::writeExport($this->type,$sid,Msg("units_not_found"));
            return;
        }
        elseif($n>1 and $type=='crud')
        {
            debug::writeExport($this->type,$sid,Msg("one_unit_for_crud"));
            return;
        }
        elseif($n!=2 and $type=='MasterDetail')
        {
            debug::writeExport($this->type,$sid,Msg("two_unit_for_MasterDetail"));
            return false;
        }
        $this->o=array();
        $an='$'."grid['$sid']";
        $this->o[]='<?php';
        $this->o[]='$config=array();';
        $this->o[]='$'."class='{$d['controller_class']}';";
        $this->o[]='$'."template='{$d['controller_template']}';";
        $this->o[]='$'."script='{$d['controller_script']}';";
        $this->o[]='$'."config['title']='{$d['controller_title']}';";
        $this->o[]='$'."config['system']={$d['controller_system']};";
        switch ($type)
        {
            case 'crud':
                $this->crudExport($d,$unitInfo[0]);
                break;
            case 'MasterDetail':
                $this->MasterDetailExport($d,$unitInfo);
                break;
            case 'UnitSet':
                $this->UnitSetExport($d,$unitInfo);
                break;
            default:
                debug::writeExport($this->type,$sid,Msg("illegal_controller_type"));
                return;
                break;
            
        }
        if (!fwrite($handle,implode("\n",$this->o),1000000))
        {
            debug::writeExport($this->type,$sid,Msg("cannot_write"));
        }
    }
    function crudExport($d,$unitInfo)
    {
        $o=array();
        $an='$config';

        if($d['controller_roles']==null)
        {
            $roles="'roles'=>array()";
        }
        else
        {
            $roles="'roles'=>array({$d['controller_roles']})";
        }
        if($d['controller_users']==null)
        {
            $users="'users'=>array()";
        }
        else
        {
            $users="'users'=>array({$d['controller_users']})";
        }
        $this->o[]='$'."config['acl']=array($users,$roles);";
        if($d['controller_initial']!=null)
        {
            $this->o[]='$'."config['initial']=array({$d['controller_initial']});";
        }
        else
        {
            $this->o[]='$'."config['initial']=array();";
        }
        if($d['controller_session']!=null)
        {
            $this->o[]='$'."config['session']=array({$d['controller_session']});";
        }
        else
        {
            $this->o[]='$'."config['session']=array();";
        }
        $this->unitExport($unitInfo);
    }
    
    function unitExport($unitInfo,$an=null)
    {
        $o=array();
        $r=array();
        if($an==null)
        {
            $an='$'."config['{$unitInfo['unit_sid']}']";
        }
        $o[]="{$an}['class']='{$unitInfo['unit_class']}';";
        $o[]="{$an}['type']='{$unitInfo['unit_type']}';";
        if(isset($unitInfo['unit_form']))
        {
            $form='true';

            if(isset($unitInfo['unit_form_class']))
            {
                $class= $unitInfo['unit_form_class'];
            }
            else
            {
                $class='Form';
            }
            if(isset($unitInfo['unit_form_renderer'])  and $unitInfo['unit_form_renderer']!='')
            {
                $view= $unitInfo['unit_form_renderer'];
            }
            else
            {
                $view='FgsFormView';
            }
            $r[]="'form'=>'$view'";
            $o[]="{$an}['components']['form'] =array('class'=>'$class','sid'=>'{$unitInfo['unit_form']}','display'=>{$unitInfo['unit_form_display']},'renderer'=>'$view','hide'=>{$unitInfo['unit_form_hide']});";
        }
        else
        {
            $form='false';
        }
        if(isset($unitInfo['unit_grid']))
        {
            $grid='true';
            if(isset($unitInfo['unit_grid_class']))
            {
                $class= $unitInfo['unit_grid_class'];
            }
            else
            {
                $class='Grid';
            }
            if(isset($unitInfo['unit_grid_renderer'])  and $unitInfo['unit_grid_renderer']!='')
            {
                $view= $unitInfo['unit_grid_renderer'];
            }
            else
            {
                $view='FgsGridView';
            }
            $r[]="'grid'=>'$view'";

            $o[]="{$an}['components']['grid'] =array('class'=>'$class','sid'=>'{$unitInfo['unit_grid']}','display'=>{$unitInfo['unit_grid_display']},'renderer'=>'$view','hide'=>{$unitInfo['unit_grid_hide']},'multimode_hide'=>{$unitInfo['unit_grid_multimode_hide']});";
        }
        else
        {
            $grid='false';
        }
        if(isset($unitInfo['unit_search']))
        {
            $search='true';
            if(isset($unitInfo['unit_search_class']))
            {
                $class= $unitInfo['unit_search_class'];
            }
            else
            {
                $class='Search';
            }
            if(isset($unitInfo['unit_search_renderer']) and $unitInfo['unit_search_renderer']!='')
            {
                $view= $unitInfo['unit_search_renderer'];
            }
            else
            {
                $view='FgsSearchView';
            }
            $r[]="'search'=>'$view'";

            $o[]="{$an}['components']['search'] =array('class'=>'$class','sid'=>'{$unitInfo['unit_search']}','display'=>{$unitInfo['unit_search_display']},'renderer'=>'$view','hide'=>{$unitInfo['unit_search_hide']});";
        }
        else
        {
            $search='false';
        }
        if(isset($unitInfo['unit_dataset']))
        {
            $dataset='true';
            if(isset($unitInfo['unit_dataset_class']))
            {
                $class= $unitInfo['unit_dataset_class'];
            }
            else
            {
                $class='Dataset';
            }

            $o[]="{$an}['components']['dataset'] =array('class'=>'$class','sid'=>'{$unitInfo['unit_dataset']}','hide'=>0);";
        }
        else
        {
            $dataset='false';
        }
        $this->o[]="{$an}['controller']=array('form'=>$form,'grid'=>$grid,'search'=>$search,'dataset'=>$dataset);";
        $this->o[]="{$an}['components']=array();";
        $this->o[]=implode("\n",$o);
        if($unitInfo['unit_session']!=null)
        {
            $this->o[]="{$an}['session']=array('controller',{$unitInfo['unit_session']});";
        }
        else
        {
            $this->o[]="{$an}['session']=array('controller');";
        }
        if($unitInfo['unit_initial']!=null)
        {
            $this->o[]="{$an}['initial']=array({$unitInfo['unit_initial']});";
        }
        else
        {
            $this->o[]="{$an}['initial']=array();";
        }
    }
    function MasterDetailExport($d,$unitInfo)
    {
        $o=array();

        if($d['controller_session']!=null)
        {
            $this->o[]='$'."config['session']=array({$d['controller_session']});";
        }
        else
        {
            $this->o[]='$'."config['session']=array('mode');";
        }
        if($d['controller_initial']!=null)
        {
            $this->o[]='$'."config['initial']=array({$d['controller_initial']});";
        }
        else
        {
            $this->o[]='$'."config['initial']=array('mode'=>'master');";
        }
        $this->o[]='$'."config['units']=array('master','detail');";
        $hasMaster=false;
        $hasDetail=false;
        if($unitInfo[0]['unit_type']=='master'  and $unitInfo[0]['unit_sid']=='master')
        {
            $hasMaster=true;
        }
        if($unitInfo[1]['unit_type']=='detail' and $unitInfo[1]['unit_sid']=='detail')
        {
            $hasDetail=true;
        }
        if(!$hasMaster or !$hasDetail)
        {
            debug::writeExport($this->type,$unitInfo[0]['unit_controller'],Msg("mustbe_master_detail_units"));
            return;
        }
        $this->unitExport($unitInfo[0]);
        $this->unitExport($unitInfo[1]);
        if($d['controller_roles']==null)
        {
            $roles="'roles'=>array()";
        }
        else
        {
            $roles="'roles'=>array({$d['controller_roles']})";
        }
        if($d['controller_users']==null)
        {
            $users="'users'=>array()";
        }
        else
        {
            $users="'users'=>array({$d['controller_users']})";
        }
        $this->o[]='$'."config['acl']=array($users,$roles);";
        $this->o[]='$'."config['units']=array('master','detail');";
        // table of the detail unit components must be associated by master detail relationship
        $detail_table=null;
        $master_table=null;
        if($unitInfo[0]['unit_form']!=null)
        {
            $masterTableInfo=$this->getFormTable($unitInfo[0]['unit_form']);
            if($masterTableInfo===false)
            {
                debug::writeExport($this->type,$unitInfo[0]['unit_controller'],Msg("table_not_found"));
                return;
            }
            $master_table=$masterTableInfo['form_table'];
        }
        elseif($unitInfo[0]['unit_grid']!=null)
        {
            $masterTableInfo=$this->getGridTable($unitInfo[0]['unit_grid']);
            if($masterTableInfo===false)
            {
                debug::writeExport($this->type,$unitInfo[0]['unit_controller'],Msg("master_table_not_found"));
                return;
            }
            $master_table=$masterTableInfo['grid_table'];
        }
        else
        {
            debug::writeExport($this->type,$unitInfo[0]['unit_controller'],Msg("master_form_or_grid_needed"));
            return;
        }
        
        if($unitInfo[1]['unit_form']!=null)
        {
            $detailTableInfo=$this->getFormTable($unitInfo[1]['unit_form']);
            if($detailTableInfo===false)
            {
                debug::writeExport($this->type,$unitInfo[1]['unit_controller'],Msg("detail_table_not_found"));
                return;
            }
            $detail_table=$detailTableInfo['form_table'];
        }
        elseif($unitInfo[1]['unit_grid']!=null)
        {
            $detailTableInfo=$this->getGridTable($unitInfo[1]['unit_grid']);
            if($detailTableInfo===false)
            {
                debug::writeExport($this->type,$unitInfo[1]['unit_controller'],Msg("detail_table_not_found"));
                return;
            }
            $detail_table=$detailTableInfo['grid_table'];
        }
        else
        {
            debug::writeExport($this->type,$unitInfo[1]['unit_controller'],Msg("detail_form_or_grid_needed"));
            return;
        }
        
        if($detailTableInfo['table_master']==null)
        {
            debug::writeExport($this->type,$unitInfo[0]['unit_controller'],Msg("master_detail_relationship_not_set"));
            return;
        }
        if($master_table!=$detailTableInfo['table_master'])
        {
            debug::writeExport($this->type,$unitInfo[0]['unit_controller'],Msg("master_detail_relationship_not_set"));
            return;
        }
        if($this->getMasterDetailFK($master_table,$detail_table)==0)
        {
            debug::writeExport($this->type,$unitInfo[0]['unit_controller'],Msg("foreign_key_for_detail_table_not_set"));
            return;
        }
    }
    function getFormTable($sid)
    {
       global $db;
       $q="select t.form_table,t1.* from fgs_form t left join fgs_table t1 on t.form_table=t1.table_name where t.form_sid='$sid'";
       $info=array();
       $result=$db->record($q,$info);
       if($result)
       {
           return $info;
       }
       else
       {
           return $result;
       }
    }
    function getGridTable($sid)
    {
       global $db;
       $q="select t.grid_table,t1.* from fgs_grid t left join fgs_table t1 on t.grid_table=t1.table_name where t.grid_sid='$sid'";
       $info=array();
       $result=$db->record($q,$info);
       if($result)
       {
           return $info;
       }
       else
       {
           return $result;
       }
    }
    function getMasterDetailFK($master,$detail)
    {
       global $db;
       $q="select count(*) from fgs_field where field_table='$detail' and field_lookup='$master' and field_relation='master'";
       return $db->value($q);
    }
    function UnitSetExport($d,$unitInfo)
    {
        $n=sizeof($unitInfo);
        $o=array();
        $h=array();
        if($d['controller_session']!=null)
        {
            $this->o[]='$'."config['session']=array({$d['controller_session']});";
        }
        else
        {
            $this->o[]='$'."config['session']=array('mode','previous_mode');";
        }

        if($d['controller_initial']!=null)
        {
            $this->o[]='$'."config['initial']=array({$d['controller_initial']});";
        }
        else
        {
            $this->o[]='$'."config['initial']=array('mode'=>'master','previous_mode'=>'');";
        }

        $v=implode(",",$o);
        if($d['controller_roles']==null)
        {
            $roles="'roles'=>array()";
        }
        else
        {
            $roles="'roles'=>array({$d['controller_roles']})";
        }
        if($d['controller_users']==null)
        {
            $users="'users'=>array()";
        }
        else
        {
            $users="'users'=>array({$d['controller_users']})";
        }
        $this->o[]='$'."config['acl']=array($users,$roles);";

        $master_table=null;
        for($i=0;$i<$n;$i++)
        {
            $o[]="'".$unitInfo[$i]['unit_sid']."'";
            if($unitInfo[$i]['unit_type']!='master')
            {
                continue;
            }
            $this->unitExport($unitInfo[$i]);
            //get master table
            if($unitInfo[$i]['unit_form']!=null)
            {
                $masterTableInfo=$this->getFormTable($unitInfo[$i]['unit_form']);
                if($masterTableInfo===false)
                {
                    debug::writeExport($this->type,$unitInfo[$i]['unit_controller'],Msg("master_table_not_found"));
                    return;
                }
                $master_table=$masterTableInfo['form_table'];
            }
            elseif($unitInfo[$i]['unit_grid']!=null)
            {
                $masterTableInfo=$this->getGridTable($unitInfo[$i]['unit_grid']);
                if($masterTableInfo===false)
                {
                    debug::writeExport($this->type,$unitInfo[$i]['unit_controller'],Msg("master_table_not_found"));
                    return;
                }
                $master_table=$masterTableInfo['grid_table'];
            }
            else
            {
                debug::writeExport($this->type,$unitInfo[$i]['unit_controller'],Msg("master_form_or_grid_needed"));
                return;
            }
        }
        $v=implode(",",$o);
        $this->o[]='$'."config['units']=array($v);";
        for($i=0;$i<$n;$i++)
        {
            if($unitInfo[$i]['unit_type']=='master')
            {
                continue;
            }
            $this->unitExport($unitInfo[$i]);
            $o[]="'".$unitInfo[$i]['unit_sid']."'";
            if($unitInfo[$i]['unit_type']!='detail')
            {
                continue;
            }
            //get detail table
            if($unitInfo[$i]['unit_form']!=null)
            {
                $detailTableInfo=$this->getFormTable($unitInfo[$i]['unit_form']);
                if($detailTableInfo===false)
                {
                    debug::writeExport($this->type,$unitInfo[$i]['unit_controller'],Msg("detail_table_not_found"));
                    return;
                }
                $detail_table=$detailTableInfo['form_table'];
            }
            elseif($unitInfo[$i]['unit_grid']!=null)
            {
                $detailTableInfo=$this->getGridTable($unitInfo[$i]['unit_grid']);
                if($detailTableInfo===false)
                {
                    debug::writeExport($this->type,$unitInfo[$i]['unit_controller'],Msg("detail_table_not_found"));
                    return;
                }
                $detail_table=$detailTableInfo['grid_table'];
            }
            else
            {
                debug::writeExport($this->type,$unitInfo[$i]['unit_controller'],Msg("detail_form_or_grid_needed"));
                return;
            }
            if($detailTableInfo['table_master']==null)
            {
                debug::writeExport($this->type,$unitInfo[$i]['unit_controller'],Msg("master_detail_relationship_not_set"));
                return;
            }
            if($master_table!=$detailTableInfo['table_master'])
            {
                debug::writeExport($this->type,$unitInfo[$i]['unit_controller'],Msg("master_detail_relationship_not_set"));
                return;
            }
            if($this->getMasterDetailFK($master_table,$detail_table)==0)
            {
                debug::writeExport($this->type,$unitInfo[$i]['unit_controller'],Msg("foreign_key_for_detail_table_not_set"));
                return;
            }
        }

    }
}

