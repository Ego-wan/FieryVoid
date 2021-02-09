<?php
class HighguardA extends OSAT
{

	function __construct($id, $userid, $name,  $slot)
	{
		parent::__construct($id, $userid, $name,  $slot);

		$this->pointCost = 165;
		$this->faction = "Orieni";
		$this->phpclass = "HighguardA";
		$this->shipClass = "Highguard-A Orbital Satellite";
		$this->imagePath = "img/ships/OrieniHighguardOSAT.png";
		$this->canvasSize = 80;
		$this->isd = 1780;

		$this->forwardDefense = 9;
		$this->sideDefense = 9;
		
		$this->turncost = 0;
		$this->turndelaycost = 0;
		$this->accelcost = 0;
		$this->rollcost = 0;
		$this->pivotcost = 0;
		$this->iniativebonus = 12 *5;
		
		$this->addPrimarySystem(new Reactor(4, 6, 0, 0));
		$this->addPrimarySystem(new Scanner(4, 4, 2, 4));
		$this->addPrimarySystem(new Thruster(4, 4, 0, 0, 2));
		$this->addPrimarySystem(new SoMissileRack(3, 6, 0, 270, 90, true));
		$this->addPrimarySystem(new SoMissileRack(3, 6, 0, 270, 90, true));
		$this->addPrimarySystem(new OrieniGatlingRG(1, 4, 1, 180, 360));
		$this->addPrimarySystem(new OrieniGatlingRG(1, 4, 1, 0, 180));

		//0:primary, 1:front, 2:rear, 3:left, 4:right;

		$this->addPrimarySystem(new Structure(4, 20));

			$this->hitChart = array(
                0=> array(
                        9 => "Structure",
                        11 => "Thruster",
						14 => "Class-SO Missile Rack",
						16 => "Gatling Railgun",
						18 => "Scanner",
                        20 => "Reactor",
                ),
        );

	}

}

?>