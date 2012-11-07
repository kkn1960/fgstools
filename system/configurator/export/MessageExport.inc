<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class MessageExport extends ConfigExport
{
    public $type='message';
    function export()
    {
        global $languages,$db;
        $info="";
        $query="select * from fgs_message order by msg_abbr ASC";
        $n=$db->set($query,$info);
        foreach($languages as $lang)
        {
            $filename="include/{$lang}.php";
            if (!$handle = fopen($filename, 'wb'))
            {

                debug::writeExport($this->type,$filename,Msg("Cannot_open_file"));
                return false;
            }
            $o=array();
            $o[]="<?php \n";
            for($i=0;$i<$n;$i++)
            {

                if($info[$i]["msg_$lang"]=='')
                {
                    $o[]="$".'m[\''.trim($info[$i]["msg_abbr"]).'\']=\''.addSingleQuoteSlashes($info[$i]["msg_abbr"]).'\';'."\n";
                }
                else
                {
                    $o[]="$".'m[\''.trim($info[$i]["msg_abbr"]).'\']=\''.addSingleQuoteSlashes($info[$i]["msg_$lang"]).'\';'."\n";
                }
            }
            $buf=implode('',$o);
            if (!fwrite($handle,$buf,100000))
            {
                debug::writeExport($this->type,$filename,Msg("Cannot_write_into_file"));
                return ;
            }
            fclose($handle);
        }
    }
}
