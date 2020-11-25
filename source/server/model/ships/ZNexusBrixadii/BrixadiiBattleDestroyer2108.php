<?php
class BrixadiiBattleDestroyer2108 extends HeavyCombatVessel{
    
    function __construct($id, $userid, $name,  $slot){
        parent::__construct($id, $userid, $name,  $slot);
        
        $this->pointCost = 400;
        $this->faction = "ZNexus Brixadii";
        $this->phpclass = "BrixadiiBattleDestroyer2108";
        $this->imagePath = "img/ships/Nexus/BrixadiiBattleDestroyer.png";
			$this->canvasSize = 175; //img has 200px per side
        $this->shipClass = "Battle Destroyer (2108)";
			$this->variantOf = "Battle Destroyer";
			$this->occurence = "common";
			$this->unofficial = true;
        $this->isd = 2108;
        
        $this->forwardDefense = 12;
        $this->sideDefense = 13;
        
        $this->turncost = 0.33;
        $this->turndelaycost = 0.50;
        $this->accelcost = 2;
        $this->rollcost = 2;
        $this->pivotcost = 2;
        $this->iniativebonus = 30;
        
         
        $this->addPrimarySystem(new Reactor(4, 16, 0, 0));
        $this->addPrimarySystem(new CnC(5, 10, 0, 0));
        $this->addPrimarySystem(new Scanner(4, 10, 5, 5));
        $this->addPrimarySystem(new Engine(4, 14, 0, 9, 4));
        $this->addPrimarySystem(new Hangar(1, 2));
        $this->addPrimarySystem(new Thruster(3, 14, 0, 6, 3));
        $this->addPrimarySystem(new Thruster(3, 14, 0, 6, 4));
      
        $this->addFrontSystem(new Thruster(3, 14, 0, 6, 1));
    	$this->addFrontSystem(new NexusParticleAgitator(3, 0, 0, 240, 0));
        $this->addFrontSystem(new NexusParticleAgitator(3, 0, 0, 0, 120));
        $this->addFrontSystem(new NexusProjectorArray(2, 6, 1, 240, 60));
        $this->addFrontSystem(new NexusProjectorArray(2, 6, 1, 300, 120));
		$this->addFrontSystem(new NexusKineticBoxLauncher(0, 4, 0, 300, 60));
                
        $this->addAftSystem(new Thruster(3, 14, 0, 4, 2));
        $this->addAftSystem(new Thruster(3, 14, 0, 4, 2));
        $this->addAftSystem(new NexusProjectorArray(2, 6, 1, 180, 360));
        $this->addAftSystem(new NexusProjectorArray(2, 6, 1, 0, 180));
		$this->addAftSystem(new NexusChaffLauncher(2, 0, 0, 0, 0));
        
        //0:primary, 1:front, 2:rear, 3:left, 4:right;
        $this->addFrontSystem(new Structure( 3, 35));
        $this->addAftSystem(new Structure( 3, 32));
        $this->addPrimarySystem(new Structure( 4, 40));
        $this->hitChart = array(
            0=> array(
                    7 => "Structure",
                    10 => "Thruster",
                    13 => "Scanner",
                    16 => "Engine",
                    17 => "Hangar",
                    19 => "Reactor",
                    20 => "C&C",
            ),
            1=> array(
                    5 => "Thruster",
                    7 => "Projector Array",
                    10 => "Particle Agitator",
					12 => "Kinetic Box Launcher",
					18 => "Structure",
                    20 => "Primary",
            ),
            2=> array(
                    7 => "Thruster",
					8 => "Chaff Launcher",
                    10 => "Projector Array",
                    18 => "Structure",
                    20 => "Primary",
            ),
        );
    }
}
?>
