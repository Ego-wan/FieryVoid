<?php
class CircasianRollanBeta extends BaseShip{
    
    function __construct($id, $userid, $name,  $slot){
        parent::__construct($id, $userid, $name,  $slot);
        
	$this->pointCost = 350;
	$this->faction = "ZEscalation Circasian";
        $this->phpclass = "CircasianRollanBeta";
        $this->imagePath = "img/ships/EscalationWars/CircasianRollan.png";
        $this->shipClass = "Rollan Heavy Cruiser (1930 Refit)";
			$this->variantOf = "Rollan Heavy Cruiser";
			$this->occurence = "common";
        $this->shipSizeClass = 3;
		$this->canvasSize = 175; //img has 200px per side
		$this->unofficial = true;
		$this->limited = 33;

		$this->isd = 1930;
        
        $this->forwardDefense = 15;
        $this->sideDefense = 16;
        
        $this->turncost = 1.0;
        $this->turndelaycost = 1.0;
        $this->accelcost = 2;
        $this->rollcost = 2;
        $this->pivotcost = 2;
        $this->iniativebonus = 0;
        
        $this->addPrimarySystem(new Reactor(3, 15, 0, 0));
        $this->addPrimarySystem(new CnC(4, 12, 0, 0));
        $this->addPrimarySystem(new Scanner(3, 12, 3, 5));
        $this->addPrimarySystem(new Engine(3, 13, 0, 6, 4));
		$this->addPrimarySystem(new Hangar(3, 3));
   
        $this->addFrontSystem(new Thruster(2, 8, 0, 2, 1));
        $this->addFrontSystem(new Thruster(2, 8, 0, 2, 1));
        $this->addFrontSystem(new EWRocketLauncher(2, 4, 1, 240, 360));
        $this->addFrontSystem(new EWRocketLauncher(2, 4, 1, 0, 120));
		$this->addFrontSystem(new LightLaser(2, 4, 3, 300, 60));
		$this->addFrontSystem(new LightLaser(2, 4, 3, 300, 60));
		$this->addFrontSystem(new EWDualRocketLauncher(3, 6, 2, 270, 90));
		$this->addFrontSystem(new LightParticleBeamShip(1, 2, 1, 240, 360));
		$this->addFrontSystem(new LightParticleBeamShip(1, 2, 1, 0, 120));

        $this->addAftSystem(new Thruster(1, 8, 0, 2, 2));
        $this->addAftSystem(new Thruster(1, 8, 0, 2, 2));
        $this->addAftSystem(new Thruster(2, 15, 0, 4, 2));
        $this->addAftSystem(new LightLaser(1, 4, 3, 90, 270));
        $this->addAftSystem(new LightLaser(1, 4, 3, 90, 270));
        $this->addAftSystem(new LightParticleCannon(3, 6, 5, 180, 240));
        $this->addAftSystem(new LightParticleCannon(3, 6, 5, 120, 180));

        $this->addLeftSystem(new EWRocketLauncher(2, 4, 1, 240, 360));
        $this->addLeftSystem(new LightParticleCannon(3, 6, 5, 300, 360));
        $this->addLeftSystem(new Thruster(2, 13, 0, 3, 3));
		$this->addLeftSystem(new LightParticleBeamShip(1, 2, 1, 180, 300));
		
        $this->addRightSystem(new EWRocketLauncher(2, 4, 1, 0, 120));
        $this->addRightSystem(new LightParticleCannon(3, 6, 5, 0, 60));
        $this->addRightSystem(new Thruster(2, 13, 0, 3, 4));
		$this->addRightSystem(new LightParticleBeamShip(1, 2, 1, 60, 180));

        //0:primary, 1:front, 2:rear, 3:left, 4:right;
        $this->addFrontSystem(new Structure(3, 32));
        $this->addAftSystem(new Structure(3, 30));
        $this->addLeftSystem(new Structure(3, 34));
        $this->addRightSystem(new Structure(3, 34));
        $this->addPrimarySystem(new Structure(3, 30));
		
		$this->hitChart = array(
			0=> array(
					10 => "Structure",
					12 => "Scanner",
					15 => "Engine",
					17 => "Hangar",
					19 => "Reactor",
					20 => "C&C",
			),
			1=> array(
					4 => "Thruster",
					6 => "Light Laser",
					8 => "Rocket Launcher",
					10 => "Dual Rocket Launcher",
					11 => "Light Particle Beam",
					18 => "Structure",
					20 => "Primary",
			),
			2=> array(
					6 => "Thruster",
					9 => "Light Particle Cannon",
					11 => "Light Laser",
					18 => "Structure",
					20 => "Primary",
			),
			3=> array(
					5 => "Thruster",
					8 => "Light Particle Cannon",
					10 => "Rocket Launcher",
					11 => "Light Particle Beam",
					18 => "Structure",
					20 => "Primary",
			),
			4=> array(
					5 => "Thruster",
					8 => "Light Particle Cannon",
					10 => "Rocket Launcher",
					11 => "Light Particle Beam",
					18 => "Structure",
					20 => "Primary",
			),
		);
    }
}

?>
