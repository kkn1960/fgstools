<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class svm
{
    public $items;
    function render()
    {
        global $registry;
        $window=$registry->getWindow();
        if($window=='')
        {
            $window='main';
        }
        $out=array();
        $n=sizeof($this->items);
        $menu1=false;
        $previous=$this->items[0]["name"];
        for($i=0;$i<$n;$i++)
        {
            if($this->items[$i]["type"]=='menu')
            {
                $option_div='option_'.$i;
                $anchor_id='anchor_'.$i;
                $out[]="<div class=\"menu_header\"><a href=\"#\" onclick=\"toggleSubmenu('$anchor_id','$option_div')\" class=\"icon_expand\" id=\"$anchor_id\"></a>";
                $out[]=Msg($this->items[$i]["name"]);
                $out[]='</div>';
                if(isset($this->items[$i]["child_nodes"]))
                {
                    $out[]="<div class=\"menu_items\" id=\"$option_div\" style=\"display : none \"><ul>";
                    foreach($this->items[$i]["child_nodes"] as $j)
                    {
                        if(isset($this->items[$j]["condition"]) and !Evaluator::get($this->items[$j]["condition"],$this->items[$j])) continue;
                        if(isset($this->items[$j]["url"]) and $this->items[$j]["url"]!='')
                        {
                            $href=Evaluator::get($this->items[$j]["url"]);
                            $pos=strpos($this->items[$j]["url"],'?');
                            if($pos===false)
                            {
                                $href=$this->items[$j]["url"];
                            }
                            else
                            {
                            
                                $pos=strpos($this->items[$j]["url"],'fgsw');
                                if($pos===false)
                                {
                                    $href=$this->items[$j]["url"]."&fgsw=$window";
                                }
                                else
                                {
                                    $href=$this->items[$j]["url"];
                                }

                            }
                            if(isset($this->items[$j]["target"]))
                            {
                                $target="target=\"{$this->items[$j]['target']}\"";
                            }
                            else
                            {
                                $target='';
                            }
                            if(isset($this->items[$j]["text"]))
                            {
                                 $text=Msg($this->items[$j]["text"]);

                              //   ick='if (confirm("¬ы действительно хотите удалить запись?")) {location.href ="/adsedit.php?g35_remove=0"} return false;'
                                 $out[]="<li><a href=".$href." onclick='if (confirm(\"$text\")) {window.open(\"$href\", $target)} return false;' $target>".$this->items[$j]["name"]." </a></li>";
                            }
                            else
                            {
                                $out[]="<li><a href=".$href." $target>".Msg($this->items[$j]["name"])." </a></li>";
                            }
                        }
                    }
                    $out[]='</ul></div>';
                }
            }
        }
        return implode("",$out);
    }
    function __construct($a,$addMenu=null)
    {
        if(is_array($a))
        {
            $this->items=$a;
        }
        else
        {
            require MENU_PATH.$a.".php";
            if(isset($addMenu))
            {
                $this->items=array_merge ($addMenu,$item );
            }
            else
            {
                $this->items=$item;
            }
        }
    }
}
?>
