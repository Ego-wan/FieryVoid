<?php
class ChoukaHellfireBOSAT extends OSAT{

    function __construct($id, $userid, $name,  $slot){
        parent::__construct($id, $userid, $name,  $slot);
        
	$this->pointCost = 90;
	$this->faction = "ZEscalation Chouka";
        $this->phpclass = "ChoukaHellfireBOSAT";
        $this->imagePath = "img/ships/EscalationWars/ChoukaHellfireOSAT.png";
        $this->canvasSize = 60;
        $this->shipClass = 'Hellfire-B Defense Satellite';
        
        $this->isd = 1962;
        $this->unofficial = true;
        
        $this->forwardDefense = 10;
        $this->sideDefense = 10;
        
        $this->turncost = 0;
        $this->turndelaycost = 0;
        $this->accelcost = 0;
        $this->rollcost = 0;
        $this->pivotcost = 0;	
        $this->iniativebonus = 60;
        $this->addPrimarySystem(new Reactor(3, 6, 0, 0));
        $this->addPrimarySystem(new Scanner(3, 6, 4, 4)); 
        $this->addPrimarySystem(new Thruster(2, 6, 0, 0, 2)); 
        $this->addPrimarySystem(new HeavyPlasma(2, 8, 5, 300, 60)); 
        $this->addPrimarySystem(new LightLaser(0, 4, 3, 180, 360));
        $this->addPrimarySystem(new LightLaser(0, 4, 3, 0, 180));
        
        //0:primary, 1:front, 2:rear, 3:left, 4:right;
        
        $this->addPrimarySystem(new Structure(3, 24));
        
		
		$this->hitChart = array(
			0=> array(
					10 => "Structure",
					12 => "Thruster",
					14 => "Heavy Plasma Cannon",
          			16 => "Light Laser",
					18 => "Scanner",
					20 => "Reactor",
			)
		);
    
    
        
    }
}
?>
