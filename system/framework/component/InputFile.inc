<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class InputFile extends InputElement
{
    function ApplyRequestValue($method,$mode)
    {
        $n=$this->name;
        $loaded=true;
        if(!isset($_FILES[$n]['name']) or null==$_FILES[$n]['name'] or ''==$_FILES[$n]['name'])
        {
            $loaded=false;
        }
        else
        {
            if(!in_array('*',$this->file_extension))
            {
                $extension = pathinfo($_FILES[$n]['name'], PATHINFO_EXTENSION);
                if(!in_array($extension,$this->file_extension))
                {
                    $this->err[]=array('id'=>'wrong_extension','text'=>'wrong_extension');
                    $loaded=false;
                }
            }
            $size=$_FILES[$n]['size'];
            if($this->filesize>=1 and $size>$this->filesize)
            {
                $this->err[]=array('id'=>'wrong_filesize','text'=>'max_filesize@@<='.$this->filesize);
                $loaded=false;
            }
            if($loaded)
            {
                if (!move_uploaded_file($_FILES[$n]['tmp_name'],$this->path.$_FILES[$n]['name']))
                {
                    $this->err[]=array('id'=>'uploading_failed','text'=>'file_uploading_failed');
                    $loaded=false;
                }
            }
        }
        if($loaded)
        {
            $this->value=$_FILES[$n]['name'];
        }
        else
        {
            $this->value='';
        }
        if(isset($this->required))
        {
            $this->value='';
            if($mode=='insert')
            {
                $this->err[]=array('id'=>'is_required','text'=>'is_required');
            }
        }
        $this->registerValue();
    }
}
