<?php
class DudromaB extends OSAT{
    
    function __construct($id, $userid, $name,  $slot){
        parent::__construct($id, $userid, $name,  $slot);
        
		$this->pointCost = 175;
		$this->faction = "Drazi";
        $this->phpclass = "DudromaB";
        $this->imagePath = "img/ships/dudroma.png";
        $this->shipClass = 'Dudroma B Satellite';
        
        $this->forwardDefense = 11;
        $this->sideDefense = 11;
        
        $this->turncost = 0;
        $this->turndelaycost = 0;
        $this->accelcost = 0;
        $this->rollcost = 0;
        $this->pivotcost = 0;	
        $this->iniativebonus = 60;


        $this->addPrimarySystem(new Reactor(4, 6, 0, 0));
        $this->addPrimarySystem(new Scanner(4, 6, 3, 5)); 
        $this->addPrimarySystem(new Thruster(3, 4, 0, 0, 2)); 

        $this->addPrimarySystem(new ParticleCannon(3, 8, 7, 300, 60));
        $this->addPrimarySystem(new ParticleCannon(3, 8, 7, 300, 60));
        $this->addPrimarySystem(new StdParticleBeam(2, 4, 1, 180, 360));
        $this->addPrimarySystem(new StdParticleBeam(2, 4, 1, 0, 180));
        
        //0:primary, 1:front, 2:rear, 3:left, 4:right;
        
        $this->addPrimarySystem(new Structure(4, 28));
    }
}