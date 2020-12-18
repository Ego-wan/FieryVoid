<?php
class CircasianElaric extends HeavyCombatVessel{
    
    function __construct($id, $userid, $name,  $slot){
        parent::__construct($id, $userid, $name,  $slot);
        
        $this->pointCost = 475;
        $this->faction = "ZEscalation Circasian";
        $this->phpclass = "CircasianElaric";
        $this->imagePath = "img/ships/EscalationWars/CircasianTormin.png";
			$this->canvasSize = 150; //img has 200px per side
        $this->shipClass = "Elaric Torpedo Cruiser";
			$this->variantOf = "Tormin Light Cruiser";
			$this->occurence = "rare";
			$this->unofficial = true;
        $this->isd = 1974;
		$this->fighters = array("light"=>6);
        
        $this->forwardDefense = 14;
        $this->sideDefense = 16;
        
        $this->turncost = 0.50;
        $this->turndelaycost = 0.66;
        $this->accelcost = 2;
        $this->rollcost = 2;
        $this->pivotcost = 2;
        $this->iniativebonus = 6*5;
        
         
        $this->addPrimarySystem(new Reactor(4, 15, 0, 0));
        $this->addPrimarySystem(new CnC(5, 12, 0, 0));
        $this->addPrimarySystem(new Scanner(4, 12, 3, 7));
        $this->addPrimarySystem(new Engine(4, 13, 0, 8, 2));
        $this->addPrimarySystem(new Hangar(4, 8));
        $this->addPrimarySystem(new Thruster(2, 13, 0, 4, 3));
        $this->addPrimarySystem(new Thruster(2, 13, 0, 4, 4));
      
        $this->addFrontSystem(new Thruster(2, 5, 0, 1, 1));
        $this->addFrontSystem(new Thruster(2, 5, 0, 1, 1));
        $this->addFrontSystem(new Thruster(3, 8, 0, 3, 1));
		$this->addFrontSystem(new LightParticleBeamShip(2, 2, 1, 240, 60));
		$this->addFrontSystem(new LightParticleBeamShip(2, 2, 1, 300, 120));
		$this->addFrontSystem(new EWRocketLauncher(2, 4, 1, 240, 60));
		$this->addFrontSystem(new EWRocketLauncher(2, 4, 1, 300, 120));
		$this->addFrontSystem(new EWHeavyRocketLauncher(3, 9, 1, 240, 360));
		$this->addFrontSystem(new EWHeavyRocketLauncher(3, 9, 1, 0, 120));
		$this->addFrontSystem(new EWHeavyRocketLauncher(3, 9, 1, 300, 60));
                
        $this->addAftSystem(new Thruster(4, 9, 0, 4, 2));
        $this->addAftSystem(new Thruster(4, 9, 0, 4, 2));
        $this->addAftSystem(new LightParticleBeamShip(2, 2, 1, 120, 300));
        $this->addAftSystem(new LightParticleBeamShip(2, 2, 1, 60, 240));
        $this->addAftSystem(new EWRocketLauncher(2, 4, 1, 120, 300));
        $this->addAftSystem(new EWRocketLauncher(2, 4, 1, 60, 240));
        
        //0:primary, 1:front, 2:rear, 3:left, 4:right;
        $this->addFrontSystem(new Structure( 4, 52));
        $this->addAftSystem(new Structure( 4, 48));
        $this->addPrimarySystem(new Structure( 4, 48));
		
        $this->hitChart = array(
            0=> array(
                    8 => "Structure",
                    11 => "Thruster",
                    13 => "Scanner",
                    15 => "Hangar",
                    17 => "Engine",
                    19 => "Reactor",
                    20 => "C&C",
            ),
            1=> array(
                    4 => "Thruster",
					7 => "Heavy Rocket Launcher",
 					9 => "Rocket Launcher",
					11 => "Light Particle Beam",
					18 => "Structure",
                    20 => "Primary",
            ),
            2=> array(
                    6 => "Thruster",
					8 => "Rocket Launcher",
                    10 => "Light Particle Beam",
                    18 => "Structure",
                    20 => "Primary",
            ),
        );
    }
}
?>