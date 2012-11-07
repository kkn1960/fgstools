<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class Dataset extends Component
{
    public $predicates;
    public $type='dataset';
    function __construct($unit,$sid,$hide)
    {
        parent::__construct($unit,$sid,$hide);
        require DATASET_PATH.$this->sid.'.php';
        foreach($ds[$sid] as $k=>$v)
        {
            $this->$k=$v;
        }
        $this->setRegistry();
    }
    function setRegistry()
    {
        global $registry;
        if(isset($this->predicates))
        {
            $v=PredicateBuilder::getFilter($this->predicates);
            if($v=='empty')
            {
                $registry->set($this->unit,'grid','filter','empty');
                return;
            }
            elseif(is_array($v))
            {
                $registry->set($this->unit,'grid','filter',$v);
            }

        }
    }
}
