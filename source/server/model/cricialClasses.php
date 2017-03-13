<?php

class Critical{

    public $id, $shipid, $systemid, $phpclass, $tur, $param;
    public $updated = false;
    public $outputMod = 0;
    public $description = "";
    public $oneturn = false;
    public $inEffect = true;
		
    public function __construct($id, $shipid, $systemid, $phpclass, $turn, $param = null){
        $this->id = (int)$id;
        $this->shipid = (int)$shipid;
        $this->systemid = (int)$systemid;
        $this->phpclass = $phpclass;
        $this->turn = (int)$turn;
        $this->setParam($param);

    }
        
        
    protected function setParam($param){
        $this->param = $param;
    }

    public function getDescription(){
        return $this->description;
    }
}
	
class DisengagedFighter extends Critical{

    public $description = "DISENGAGED";

    function __construct($id, $shipid, $systemid, $phpclass, $turn){
        parent::__construct($id, $shipid, $systemid, $phpclass, $turn);
    }
}
	
class OutputReduced extends Critical{
    public $description = "Output reduced.";

    function __construct($id, $shipid, $systemid, $phpclass, $turn){
        parent::__construct($id, $shipid, $systemid, $phpclass, $turn);
    }

    function setParam($param){
        parent::setParam($param);
    }
}

class OutputReducedOneTurn extends Critical{
    public $description = "Critical Shutdown effective in Turn ";

    function __construct($id, $shipid, $systemid, $phpclass, $turn){
        $this->description = $this->description." ".($turn+1).".";
        parent::__construct($id, $shipid, $systemid, $phpclass, $turn);
    }
}

class OutputReduced1 extends Critical{
    public $description;
    public $outputMod = -1;

    function __construct($id, $shipid, $systemid, $phpclass, $turn){
        $this->description = "Output altered by ".$this->outputMod;
        parent::__construct($id, $shipid, $systemid, $phpclass, $turn);
    }
}
	
	
class OutputReduced2 extends OutputReduced1{

    public $outputMod = -2;

    function __construct($id, $shipid, $systemid, $phpclass, $turn){
            parent::__construct($id, $shipid, $systemid, $phpclass, $turn);
    }

}

class OutputReduced3 extends OutputReduced1{

    public $outputMod = -3;

    function __construct($id, $shipid, $systemid, $phpclass, $turn){
            parent::__construct($id, $shipid, $systemid, $phpclass, $turn);
    }

}

class OutputReduced4 extends OutputReduced1{

    public $outputMod = -4;

    function __construct($id, $shipid, $systemid, $phpclass, $turn){
            parent::__construct($id, $shipid, $systemid, $phpclass, $turn);
    }

}

class OutputReduced6 extends OutputReduced1{

    public $outputMod = -6;

    function __construct($id, $shipid, $systemid, $phpclass, $turn){
            parent::__construct($id, $shipid, $systemid, $phpclass, $turn);
    }

}
class OutputReduced8 extends OutputReduced1{

    public $outputMod = -8;

    function __construct($id, $shipid, $systemid, $phpclass, $turn){
            parent::__construct($id, $shipid, $systemid, $phpclass, $turn);
    }

}

class OutputReduced10 extends OutputReduced1{

    public $outputMod = -10;

    function __construct($id, $shipid, $systemid, $phpclass, $turn){
            parent::__construct($id, $shipid, $systemid, $phpclass, $turn);
    }

}

class PartialBurnout extends Critical{

    public $description = "Efficiency halved.";
    public $outputMod = -0.5;

    function __construct($id, $shipid, $systemid, $phpclass, $turn){
            parent::__construct($id, $shipid, $systemid, $phpclass, $turn);
    }

}

class SevereBurnout extends Critical{

    public $description = "System non functional";
    public $outputMod = -100;

    function __construct($id, $shipid, $systemid, $phpclass, $turn){
            parent::__construct($id, $shipid, $systemid, $phpclass, $turn);
    }

}

class DamageReductionRemoved extends Critical{

    public $description = "Damage reduction disabled";

    function __construct($id, $shipid, $systemid, $phpclass, $turn){
            parent::__construct($id, $shipid, $systemid, $phpclass, $turn);
    }
}

class ForcedOfflineOneTurn extends Critical{

    public $description = "Forced offline for ";
    public $oneturn = true;

    function __construct($id, $shipid, $systemid, $phpclass, $turn){
            parent::__construct($id, $shipid, $systemid, $phpclass, $turn);
    }
}

class ForcedOfflineForTurns extends Critical{

    public $description = "";

    function __construct($id, $shipid, $systemid, $phpclass, $turn, $time){
        $this->$time = $time;
        $this->description = "Forced offline until end of turn ".($turn + $time);
            parent::__construct($id, $shipid, $systemid, $phpclass, $turn, $time);
    }
}

class FirstThrustIgnored extends Critical{
    public $description = "First point of channeled thrust is ignored.";
    public $outputMod = -1;
    function __construct($id, $shipid, $systemid, $phpclass, $turn){
            parent::__construct($id, $shipid, $systemid, $phpclass, $turn);
    }
}

class HalfEfficiency extends Critical{

    public $description = "Two points of thrust required to channel one through.";
    public $outputMod = 0;

    function __construct($id, $shipid, $systemid, $phpclass, $turn){
            parent::__construct($id, $shipid, $systemid, $phpclass, $turn);
    }
}

class OSATThrusterCrit extends Critical{
    public $description = "Can only turn once per turn.";
    function __construct($id, $shipid, $systemid, $phpclass, $turn){
            parent::__construct($id, $shipid, $systemid, $phpclass, $turn);
    }
}

class AmmoExplosion extends Critical{
    public $description = "Stored ammunition did explode.";
    function __construct($id, $shipid, $systemid, $phpclass, $turn){
            parent::__construct($id, $shipid, $systemid, $phpclass, $turn);
    }
}

class SensorsDisrupted extends Critical{
    public $description = "Sensors disrupted. Cannot change sensor settings. [TODO]";
    public $oneturn = true;	
    function __construct($id, $shipid, $systemid, $phpclass, $turn){
            parent::__construct($id, $shipid, $systemid, $phpclass, $turn);
    }
}

class CommunicationsDisrupted extends Critical{
    public $description = "Communications disrupted. -5 initiative.";
    function __construct($id, $shipid, $systemid, $phpclass, $turn){
            parent::__construct($id, $shipid, $systemid, $phpclass, $turn);
    }
}

class PenaltyToHit extends Critical{
    public $description = "-1 penalty to hit for all weapons.";
    function __construct($id, $shipid, $systemid, $phpclass, $turn){
            parent::__construct($id, $shipid, $systemid, $phpclass, $turn);
    }
}

class RestrictedEW extends Critical{
    public $description = "-2 EW. May use no more than half of its EW offensively.";
    function __construct($id, $shipid, $systemid, $phpclass, $turn){
            parent::__construct($id, $shipid, $systemid, $phpclass, $turn);
    }
}

class ReducedIniativeOneTurn extends Critical{
    public $description = "-10 iniative for  ";
    public $oneturn = true;
    function __construct($id, $shipid, $systemid, $phpclass, $turn){
            parent::__construct($id, $shipid, $systemid, $phpclass, $turn);
    }
}

class ReducedIniative extends Critical{
    public $description = "-10 iniative.";

    function __construct($id, $shipid, $systemid, $phpclass, $turn){
        parent::__construct($id, $shipid, $systemid, $phpclass, $turn);
    }
}

class ShipDisabledOneTurn extends Critical{
    public $description = "Ship disabled for ";
    public $oneturn = true;
    function __construct($id, $shipid, $systemid, $phpclass, $turn){
            parent::__construct($id, $shipid, $systemid, $phpclass, $turn);
    }
}

class ReducedRange extends Critical{
    public $description = "Range penalty increased.";

    function __construct($id, $shipid, $systemid, $phpclass, $turn){
            parent::__construct($id, $shipid, $systemid, $phpclass, $turn);
    }
}

class ReducedDamage extends Critical{
    public $description = "Damage reduced.";

    function __construct($id, $shipid, $systemid, $phpclass, $turn){
            parent::__construct($id, $shipid, $systemid, $phpclass, $turn);
    }
}

class ArmorReduced extends Critical{
    public $description = "Armor reduced.";

    function __construct($id, $shipid, $systemid, $phpclass, $turn){
            parent::__construct($id, $shipid, $systemid, $phpclass, $turn);
    }
}

class NastierCrit extends Critical{ /*next critical (or dropout!) roll will be nastier*/
    public $description = "Vulnerable to critical.";
    public $oneturn = true;	
    function __construct($id, $shipid, $systemid, $turn, $strength){
	    $outputMod = $strength;
            parent::__construct($id, $shipid, $systemid, 'NastierCrit', $turn);
    }
}



class swtargetheld extends Critical{ /*next turn target is being held by tractor beam!*/
    public $description = "Held by tractor beam! Initiative and remaining thrust reduced.";
    public $oneturn = true;	
    function __construct($id, $shipid, $systemid, $turn){
            parent::__construct($id, $shipid, $systemid, 'swtargetheld', $turn);
    }
}
