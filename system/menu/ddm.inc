<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class ddm
{

    public $items;
    function render()
    {
        $out=array();
        $n=sizeof($this->items);

        $out[]="<div class=\"ddm\">";
        $out[]="<ul>\n";
        $level=0;
        $previous=null;
        for($i=0;$i<$n;$i++)
        {
            if(!isset($this->items[$i]['pid']))
            {
                $out[]=$this->render_menu(array($i));
            }
        }
        $out[]="</ul>\n";
        $out[]="</div>";
        return  implode("",$out);
    }

    function render_menu($ai)
    {
        $out=array();
        $if_IE7_start="<!--[if IE 7]><!-->";
        $if_IE7_end="<!--<![endif]-->\n";
        $if_IE6_start="<!--[if lte IE 6]><table><tr><td><![endif]-->\n";
        $if_IE6_end="<!--[if lte IE 6]></td></tr></table></a><![endif]-->\n";
        $max=0;
        foreach ($ai as $i)
        {
            $length=strlen($this->items[$i]["name"]);
            if($length>$max)
            {
                $max=$length;
            }
        }
        foreach ($ai as $i)
        {
            global $registry;
            $window=$registry->getWindow();
            if($window=='')
            {
                $window='main';
            }
            $out[]='<li>';
            $out[]='<a href="';
            if(isset($this->items[$i]["url"]) and $this->items[$i]["url"]!='')
            {
                $pos=strpos($this->items[$i]["url"],'?');
                if($pos===false)
                {
                    $out[]=$this->items[$i]["url"];
                }
                else
                {
                    $pos=strpos($this->items[$i]["url"],'fgsw');
                    if($pos===false)
                    {
                        $out[]=$this->items[$i]["url"]."&fgsw=$window";
                    }
                    else
                    {
                        $out[]=$this->items[$i]["url"];
                    }
                }
                $out[]="\"";
            }
            else
            {
                $out[]="#\"";
            }
            if(isset($this->items[$i]["target"]))
            {
                $out[]=" target={$this->items[$i]['target']} ";
            }
            if(isset($this->items[$i]["text"]))
            {
                $text=Msg($this->items[$i]["text"]);
                $out[]=" onclick='if (confirm(\"$text\")) {location.href =\"{$this->items[$i]['url']}\"} return false;' ";
            }
            if(isset($this->items[$i]["class"]))
            {
                $out[]=" class=\"{$this->items[$i]['class']}\" ";
            }
            $out[]=">";
            $out[]=$this->items[$i]["name"];
            if (!empty($this->items[$i]['child_nodes']))
            {
                $out[]=$if_IE7_start;
            }
            $out[]="</a>";
            if (!empty($this->items[$i]['child_nodes']))
            {
                $out[]= $if_IE7_end;
            }
            if (!empty($this->items[$i]['child_nodes']))
            {
                $out[]= $if_IE6_start;
            }
            if (!empty($this->items[$i]['child_nodes']))
            {
                $out[]="<ul>\n";
                $out[]=$this->render_menu($this->items[$i]['child_nodes']);
                $out[]="</ul>\n";
            }
            if (!empty($this->items[$i]['child_nodes']))
            {
                $out[]= $if_IE6_end;
            }


            $out[]= '</li>';
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
                $this->items=array_merge ($item, $addMenu);
            }
            else
            {
                $this->items=$item;
            }
        }
        $i=0;
        foreach($this->items as $item)
        {
            if(isset($item["childs"]))
            {
                $item["childs"]($this,$i);
            }
            $i++;
        }
    }
}
