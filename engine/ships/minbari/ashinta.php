<?php
class Ashinta extends HeavyCombatVessel{

    function __construct($id, $userid, $name,  $movement){
        parent::__construct($id, $userid, $name,  $movement);

        $this->pointCost = 850;
        $this->faction = "Minbari";
        $this->phpclass = "Ashinta";
        $this->imagePath = "ships/tinashi.png";
        $this->shipClass = "Ashinta";
        $this->gravitic = true;


        $this->forwardDefense = 14;
        $this->sideDefense = 17;

        $this->turncost = 1.0;
        $this->turndelaycost = 0.66;
        $this->accelcost = 3;
        $this->rollcost = 3;
        $this->pivotcost = 3;
        $this->iniativebonus = 35;

        $this->addPrimarySystem(new Reactor(5, 25, 0, 8));
        $this->addPrimarySystem(new CnC(6, 24, 0, 0));
        $this->addPrimarySystem(new Scanner(5, 22, 4, 12));
        $this->addPrimarySystem(new Engine(6, 20, 0, 10, 3));
        $this->addPrimarySystem(new JumpEngine(5, 20, 3, 12));
        $this->addPrimarySystem(new Hangar(4, 2));
        $this->addPrimarySystem(new Thruster(4, 13, 0, 4, 3));
        $this->addPrimarySystem(new Thruster(4, 13, 0, 4, 4));
        $this->addPrimarySystem(new Jammer(4, 8, 5));

        $this->addFrontSystem(new Thruster(4, 8, 0, 4, 1));
        $this->addFrontSystem(new ElectroPulseGun(2, 6, 3, 240, 0));
        $this->addFrontSystem(new FusionCannon(3, 8, 1, 240, 0));
        $this->addFrontSystem(new FusionCannon(3, 8, 1, 300, 60));
        $this->addFrontSystem(new FusionCannon(3, 8, 1, 0, 120));
        $this->addFrontSystem(new ElectroPulseGun(2, 6, 3, 0, 120));
        $this->addFrontSystem(new Thruster(4, 8, 0, 4, 1));

        
        $this->addAftSystem(new FusionCannon(3, 8, 1, 180, 300));
        $this->addAftSystem(new FusionCannon(3, 8, 1, 120, 240));
        $this->addAftSystem(new FusionCannon(3, 8, 1, 120, 240));
        $this->addAftSystem(new FusionCannon(3, 8, 1, 60, 180));
        
        $this->addAftSystem(new FusionCannon(3, 8, 1, 240, 0));
        $this->addAftSystem(new FusionCannon(3, 8, 1, 240, 0));
        $this->addAftSystem(new FusionCannon(3, 8, 1, 0, 120));
        $this->addAftSystem(new FusionCannon(3, 8, 1, 0, 120));
        
        
        
        $this->addAftSystem(new Thruster(4, 35, 0, 10, 2));
        
        //0:primary, 1:front, 2:rear, 3:left, 4:right;
        $this->addFrontSystem(new Structure( 6, 60));
        $this->addAftSystem(new Structure( 4, 56));
        $this->addPrimarySystem(new Structure( 6, 60));
    }
}
?>
