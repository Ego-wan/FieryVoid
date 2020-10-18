<?php
class ChoukaRevelationMinelayer extends HeavyCombatVessel{
    
    function __construct($id, $userid, $name,  $slot){
        parent::__construct($id, $userid, $name,  $slot);
        
        $this->pointCost = 250;
        $this->faction = "ZEscalation Chouka";
        $this->phpclass = "ChoukaRevelationMinelayer";
        $this->imagePath = "img/ships/EscalationWars/ChoukaRevelation.png";
			$this->canvasSize = 125; //img has 200px per side
        $this->shipClass = "Revelation Minelayer";
			$this->variantOf = "Revelation Military Freighter";
			$this->occurence = "uncommon";
			$this->unofficial = true;
        $this->isd = 1953;
		
        
        $this->forwardDefense = 13;
        $this->sideDefense = 15;
        
        $this->turncost = 1.0;
        $this->turndelaycost = 1.0;
        $this->accelcost = 3;
        $this->rollcost = 3;
        $this->pivotcost = 4;
        $this->iniativebonus = 4*5;
        
         
        $this->addPrimarySystem(new Reactor(3, 9, 0, 0));
        $this->addPrimarySystem(new CnC(3, 6, 0, 0));
        $this->addPrimarySystem(new Scanner(3, 11, 4, 4));
        $this->addPrimarySystem(new Engine(2, 10, 0, 6, 4));
        $this->addPrimarySystem(new Hangar(3, 4));
        $this->addPrimarySystem(new CargoBay(2, 24));
        $this->addPrimarySystem(new Thruster(2, 11, 0, 2, 3));
        $this->addPrimarySystem(new Thruster(2, 11, 0, 2, 4));
      
        $this->addFrontSystem(new Thruster(2, 15, 0, 4, 1));
		$this->addFrontSystem(new LightEnergyMine(2, 4, 4, 300, 60));
		$this->addFrontSystem(new LightEnergyMine(2, 4, 4, 300, 60));
		$this->addFrontSystem(new LightEnergyMine(2, 5, 4, 300, 60));

                
        $this->addAftSystem(new Thruster(1, 18, 0, 6, 2));
        $this->addAftSystem(new EWPointPlasmaGun(2, 3, 1, 180, 360));
        $this->addAftSystem(new EWPointPlasmaGun(2, 3, 1, 180, 360));
        $this->addAftSystem(new EWPointPlasmaGun(2, 3, 1, 0, 180));
        $this->addAftSystem(new EWPointPlasmaGun(2, 3, 1, 0, 180));
		$this->addAftSystem(new LightEnergyMine(2, 4, 4, 120, 240));
		$this->addAftSystem(new LightEnergyMine(2, 4, 4, 120, 240));
		$this->addAftSystem(new CargoBay(1, 24));

        
        //0:primary, 1:front, 2:rear, 3:left, 4:right;
        $this->addFrontSystem(new Structure( 3, 40));
        $this->addAftSystem(new Structure( 3, 40));
        $this->addPrimarySystem(new Structure( 3, 40));
		
        $this->hitChart = array(
            0=> array(
                    8 => "Structure",
                    11 => "Thruster",
					12 => "Cargo",
					14 => "Scanner",
                    16 => "Engine",
					18 => "Hangar",
                    19 => "Reactor",
                    20 => "C&C",
            ),
            1=> array(
                    5 => "Thruster",
					9 => "Light Energy Mine",
					18 => "Structure",
                    20 => "Primary",
            ),
            2=> array(
                    5 => "Thruster",
					7 => "Light Energy Mine",
					9 => "Cargo",
                    11 => "Point Plasma Gun",
                    18 => "Structure",
                    20 => "Primary",
            ),
        );
    }
}
?>