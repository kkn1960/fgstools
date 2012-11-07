<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class FormFieldsList
{
    public $params;
    static function load($params)
    {
        global $registry,$db;

        $id=$registry->getGlobal('form_sid');
        $info=array();
        $q="select element_field ,element_alias from fgs_element where element_component!='InputButton' and element_form='{$id}' order by element_field,element_alias";
        $n=$db->set($q,$info);
        $options=array();
        for($i=0;$i<$n;$i++)
        {
            if($info[$i]["element_alias"]!='')
            {
                $options[$info[$i]["element_alias"]]=$info[$i]["element_alias"];
            }
            else
            {
                $options[$info[$i]["element_field"]]=$info[$i]["element_field"];
            }
        }
        return $options;
    }
}
