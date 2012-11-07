<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class Timer
{
    public $m;
    public $sql;
    static $m1;
    static private $instance = NULL;
    private function __construct($start=null)
    {
        $this->m=array();
        $this->m1=array();
        $this->sql=0;
        if($start===null)
        {
            $start=getmicrotime();
        }
        $this->m[0]=array('point'=>'start','start'=>$start);
    }
    static public function getInstance($start=null)
    {
        if(self::$instance === NULL)
        {
            self::$instance = new Timer($start);
        }
        return self::$instance;
    }
    function start($point)
    {
        $this->m1[$point]=array('start'=>getmicrotime());
    }
    function stop($point,$comment)
    {
        global $FGSDebug;
        if(isset($this->m1[$point]))
        {
            $this->m1[$point]['interval']=getmicrotime()-$this->m1[$point]['start'];;
            $this->m1[$point]['comment']=$comment;
        }
        else
        {
            debug::write('error',$point.' -point not started ');
        }
    }
    function mark($point)
    {
        $n=sizeof( $this->m);
        $start=getmicrotime();
        $interval=$start-$this->m[$n-1]['start'];
        $this->m[$n]=array('point'=>$point,'start'=>$start,'interval'=>$interval);
    }
    function addSql($time)
    {
        $this->sql+=$time;
    }
    function render()
    {
        global $FGSDebug,$debugStore,$registry,$db,$timerRenderer;
        if(!$FGSDebug) return;
        $obj=new $timerRenderer();
        return $obj->render();

    }
}
?>
