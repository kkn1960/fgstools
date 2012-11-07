<?php
function ComplexMessage($ids,$return_self=true,$first_uppercase=true)
{
    $s='';
    foreach($ids as $v)
    {
        $s.=Msg($v,$return_self,$first_uppercase)." ";
        $first_uppercase=false;
    }
    return trim($s);
}
function Msg($id,$return_self=true,$first_uppercase=true,$o='')
{
    $is_found=false;
    global $m;
    $s='';
    $ids=explode("@@",str_replace("!!","@@",$id));

    if(sizeof($ids)>1)
    {
      return ComplexMessage($ids,$return_self,$first_uppercase,$o) ;
    }
    if(substr($id,0,1)=="@")
    {
      $msf= substr($id,1);
      return $msf($o);
    }
    if (isset($m[$id]))
    {
      $s=$m[$id];
    }
    elseif(isset($m[strtolower($id)]))
    {
        $s=$m[strtolower($id)];
    }
    elseif($return_self )
    {
      $s=$id;
    }

    if($first_uppercase)
    {
      $s=mb_ucfirst( $s);
    }
    return $s;
}
function mb_ucfirst ($word)
{
    return mb_strtoupper(mb_substr($word, 0, 1, 'UTF-8'), 'UTF-8') . mb_substr($word, 1, mb_strlen($word), 'UTF-8');
}
function mqn()
{
    if (get_magic_quotes_gpc())
    {
        $input = array(&$_GET, &$_POST, &$_COOKIE, &$_ENV, &$_SERVER);
        while (list($k,$v) = each($input))
        {
            foreach ($v as $key => $val)
            {
                if (!is_array($val))
                {
                    $input[$k][$key] = stripslashes($val);
                    continue;
                }
                $input[] =& $input[$k][$key];
            }
        }
        unset($input);
    }
}
function __autoload($class_name)
{
    global $cp;

    require $cp[$class_name];
    $pos=strrpos ($cp[$class_name], '/');
    if($pos===false)
    {
        $path='';
    }
    else
    {
        $path=substr($cp[$class_name],0,$pos);
    }
    debug::writeClass($class_name,$path);
}
function __autoload12($class_name)
{
   require_once "classes/".$class_name . ".inc";
}
function getmicrotime()
{
    list($usec, $sec) = explode(" ",microtime());
    return ((float)$usec + (float)$sec);
}

function db()
{
   return call_user_func($GLOBALS["gaDbConnect"][$GLOBALS['dbname']]["dbms"].'::getInstance',$GLOBALS['dbname']);
}
function js()
{
   return call_user_func(array($GLOBALS["jsClass"],'getInstance'));
}
function save($value,$var)
{
    global $db;
    $fv=array();
    $fv['log_var']=addslashes($var);
    $fv['log_datetime']=date("Y-m-d H:i:s\n");
    $o=array();
    $o[]="\n variable[$var]:";;
    if(is_array($value))
    {
        foreach($value as $k=>$v)
        {
            $o[]="$k=$v;";
        }
    }
    else
    {
        $o[]=$value;
    }
    $buf=implode("\n",$o);
    $fv['log_value']=addslashes($buf);
    $db->insert('log_debug',$fv);
}
function json_safe_encode12($var)
{
   return json_encode(json_fix_cyr($var));
}
function json_fix_cyr12($var)
{

   if (is_array($var)) {
       $new = array();
       foreach ($var as $k => $v) {
           $new[json_fix_cyr($k)] = json_fix_cyr($v);
       }
       $var = $new;
   } elseif (is_object($var)) {
       $vars = get_class_vars(get_class($var));
       foreach ($vars as $m => $v) {
           $var->$m = json_fix_cyr($v);
       }
   } elseif (is_string($var)) {
       $var = iconv(DEFAULT_CHARSET, 'utf-8', $var);
   }
   return $var;
}
function toggleDebug()
{
    global $FGSDebug,$registry;

    if('programmer'==$registry->getUserRole())
    {
        if($FGSDebug)
        {
            $class="icon_green_ball";
        }
        else
        {
            $class="icon_red_ball";
        }
        return "<a href=\"#\" style=\"float:right;\" onclick=\"toggleDebug()\"><span id=\"debug_icon\" class=\"$class\"></span>Debug</a>";
    }
    else
    {
        return '';
    }
}
function restoreDebug()
{
    global $FGSDebug,$registry;
    if('programmer'==$registry->getUserRole())
    {
        if(isset($_SESSION[FGS_SESSION_KEY]['session_debug']))
        {
            $FGSDebug=$_SESSION[FGS_SESSION_KEY]['session_debug'];
        }
        else
        {
           $_SESSION[FGS_SESSION_KEY]['session_debug']=$FGSDebug;
        }
    }
}
function editFormLink($sid)
{
    global $newInstantEditWindow;
    if($newInstantEditWindow)
    {
        $fgsw='instant_edit_form_'.$sid;
        $target='_instant_edit_window_form_'.$sid;
    }
    else
    {
        $fgsw='instant_edit';
        $target='_instant_edit_window';
    }
    return "window.open('configurator.php?fgsw=$fgsw&fgsc=forms&fgsu=master&fgst=search&fgsinit=1&argument_form_sid=$sid&&operator_form_sid=equal','$target')";
}
function editSearchLink($sid)
{
    global $newInstantEditWindow;
    if($newInstantEditWindow)
    {
        $fgsw='instant_edit_search_'.$sid;
        $target='_instant_edit_window_search'.$sid;
    }
    else
    {
        $fgsw='instant_edit';
        $target='_instant_edit_window';
    }
    return "window.open('configurator.php?fgsw=$fgsw&fgsc=searchs&fgsu=master&fgst=search&fgsinit=1&argument_form_sid=$sid&&operator_form_sid=equal','$target')";
}
function editGridLink($sid)
{
    global $newInstantEditWindow;
    if($newInstantEditWindow)
    {
        $fgsw='instant_edit_grid_'.$sid;
        $target='_instant_edit_window_grid_'.$sid;
    }
    else
    {
        $fgsw='instant_edit';
        $target='_instant_edit_window';
    }
    return "window.open('configurator.php?fgsw=$fgsw&fgsc=grids&fgsu=master&fgst=search&fgsinit=1&argument_grid_sid=$sid&&operator_grid_sid=equal','$target')";
}
function editAttributeLink($rowid,$type,$component,$field,$system)
{
    global $newInstantEditWindow;
    if($newInstantEditWindow)
    {
        $fgsw='instant_edit_attribute_'.$rowid;
        $target='_instant_edit_window_attribute_'.$rowid;
    }
    else
    {
        $fgsw='instant_edit';
        $target='_instant_edit_window';
    }
    return "window.open('editor.php?fgsw=$fgsw&fgsc=editor&fgsu=crud&fgsinit=1&fgst=controller&update=$rowid&component=$component&field=$field&system=$system','$target')";
}
function systemDateTime($form=null)
{
    global $db;
    $today=getdate();
    return $db->code(array("year"=>$today['year'],"month"=>$today['mon'],"day"=>$today['mday'],"hour"=>$today['hours'],"minute"=>$today['minutes'],"second"=>$today['seconds']),"datetime");
}
function GoToPage($url,$msg_out='')
{

  if (!headers_sent())
  {
    $url='Location: '.$url;
    header ($url);
    exit;
  }
  else
  {
    GLOBAL $js_url,$msg,$lang;
    if($js_url==true)
    {
      echo "\n<script language=\"javascript\">\n";
      if($msg_out!="")
      {
        echo "alert(\"{$msg_out}\")\n self.location=\"{$url}\"</script>\n";
      }
      else
      {
        echo "\n self.location=\"{$url}\"</script>\n";
      }
    }
    else
    {
      if($msg_out!="")
      {
        print $msg_out."<br>";
        print "<a href=$url>".Msg("Continue")."</a>"  ;
        die("");
      }
      else
      {
        echo "access denied";
      }
    }
  }
}
function getComponentClass($class)
{
    if($class=='SelectOneMenu' or $class=='SelectOneRadio' or $class=='SelectOneListbox'  )
    {
        $class='InputSingleSelect';
    }
    elseif($class=='SelectManyMenu' or $class=='SelectManyListbox' or $class=='SelectManyCheckbox'  )
    {
        $class='InputMultipleSelect';
    }
    elseif($class=='InputForeignKey' )
    {
        $class='InputSystem';
    }
    if($class=='ColumnSelectOneMenu' or $class=='ColumnSelectOneRadio' or $class=='ColumnSelectOneListbox'  )
    {
        $class='ColumnSingleSelect';
    }
    elseif($class=='ColumnSelectManyMenu' or $class=='ColumnSelectManyListbox' or $class=='ColumnSelectManyCheckbox'  )
    {
        $class='ColumnMultipleSelect';
    }
    return $class;
}
function SetToday($args=null)
{
    global $db;
    $today=getdate();
    return $db->code(array("year"=>$today['year'],"month"=>$today['mon'],"day"=>$today['mday']),"date");
}
function addSingleQuoteSlashes($s)
{
    return  str_replace("'","\\'",$s);
}
