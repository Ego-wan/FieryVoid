<?php
class ChoukaFlagellantFreighter extends MediumShip{

    function __construct($id, $userid, $name,  $slot){
        parent::__construct($id, $userid, $name,  $slot);
        
        $this->pointCost = 150;
        $this->faction = "ZEscalation Chouka";
        $this->phpclass = "ChoukaFlagellantFreighter";
        $this->imagePath = "img/ships/EscalationWars/ChoukaRevelation.png";
        $this->shipClass = "Flagellant Armed Freighter";
		$this->unofficial = true;
        $this->canvasSize = 75;
	    $this->isd = 1916;
        
        $this->forwardDefense = 13;
        $this->sideDefense = 15;
        
        $this->turncost = 1.0;
        $this->turndelaycost = 1.0;
        $this->accelcost = 3;
        $this->rollcost = 2;
        $this->pivotcost = 3;
        $this->iniativebonus = -20;
         
		$this->addPrimarySystem(new Reactor(3, 9, 0, 0));
        $this->addPrimarySystem(new CnC(3, 6, 0, 0));
        $this->addPrimarySystem(new Scanner(3, 10, 4, 4));
        $this->addPrimarySystem(new Engine(3, 10, 0, 6, 2));
        $this->addPrimarySystem(new Hangar(3, 4));
		$this->addPrimarySystem(new Quarters(3, 12));
        $this->addPrimarySystem(new Thruster(2, 11, 0, 3, 3));
        $this->addPrimarySystem(new Thruster(2, 11, 0, 3, 4));        
        
		$this->addFrontSystem(new CargoBay(2, 24));
		$this->addFrontSystem(new CargoBay(2, 24));
        $this->addFrontSystem(new LightPlasma(2, 4, 2, 300, 60));	
		$this->addFrontSystem(new EWPointPlasmaGun(1, 3, 1, 180, 360));
		$this->addFrontSystem(new EWPointPlasmaGun(1, 3, 1, 0, 180));
        $this->addFrontSystem(new Thruster(2, 13, 0, 3, 1));

		$this->addAftSystem(new CargoBay(2, 24));
		$this->addAftSystem(new CargoBay(2, 24));
		$this->addAftSystem(new EWPointPlasmaGun(1, 3, 1, 180, 360));
		$this->addAftSystem(new EWPointPlasmaGun(1, 3, 1, 0, 180));
        $this->addAftSystem(new Thruster(2, 18, 0, 6, 2));    
       
        $this->addPrimarySystem(new Structure(3, 56));

	//d20 hit chart
	$this->hitChart = array(
		
		0=> array(
			8 => "Thruster",
			11 => "Quarters",
			13 => "Scanner",
			15 => "Engine",
			17 => "Hangar",
			19 => "Reactor",
			20 => "C&C",
		),

		1=> array(
			4 => "Thruster",
			5 => "Light Plasma Cannon",
			7 => "Point Plasma Gun",
			11 => "Cargo Bay",
			17 => "Structure",
			20 => "Primary",
		),

		2=> array(
			5 => "Thruster",
			7 => "Point Plasma Gun",
			11 => "Cargo Bay",
			17 => "Structure",
			20 => "Primary",
		),

	);

        
        }
    }
?>
