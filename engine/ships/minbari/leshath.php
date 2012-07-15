<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of leshath
 *
 * @author Jasper van Rosmalen
 */
class Leshath extends BaseShip{

    function __construct($id, $userid, $name,  $movement){
        parent::__construct($id, $userid, $name,  $movement);

	$this->pointCost = 1500;
	$this->faction = "Minbari";
        $this->phpclass = "Leshath";
        $this->imagePath = "ships/leshath.png";
        $this->shipClass = "Leshath Heavy Scout";
        $this->shipSizeClass = 3;
        $this->gravitic = true;

        $this->forwardDefense = 15;
        $this->sideDefense = 17;

        $this->turncost = 1.0;
        $this->turndelaycost = 1.0;
        $this->accelcost = 4;
        $this->rollcost = 3;
        $this->pivotcost = 4;
        $this->iniativebonus = 5;

        // Ship system arguments: armor, health, power req, output
        $this->addPrimarySystem(new Reactor(6, 25, 0, 0));
        $this->addPrimarySystem(new CnC(6, 24, 0, 0));
        $this->addPrimarySystem(new ElintScanner(6, 35, 8, 15));
        $this->addPrimarySystem(new Engine(6, 20, 0, 10, 3));
        $this->addPrimarySystem(new JumpEngine(6, 25, 5, 16));
        $this->addPrimarySystem(new Hangar(5, 8));
        $this->addPrimarySystem(new Jammer(5, 10, 5));

        // weapons arguments: armor, health, power, start arc, end arc
        $this->addFrontSystem(new FusionCannon(3, 8, 1, 300, 60));
        $this->addFrontSystem(new FusionCannon(3, 8, 1, 300, 60));
	$this->addFrontSystem(new Thruster(4, 25, 0, 6, 1));
        $this->addFrontSystem(new FusionCannon(3, 8, 1, 300, 60));
        $this->addFrontSystem(new FusionCannon(3, 8, 1, 300, 60));

        $this->addAftSystem(new FusionCannon(3, 8, 1, 120, 240));
        $this->addAftSystem(new FusionCannon(3, 8, 1, 120, 240));
        $this->addAftSystem(new Thruster(4, 38, 0, 10, 2));
        $this->addAftSystem(new FusionCannon(3, 8, 1, 120, 240));
        $this->addAftSystem(new FusionCannon(3, 8, 1, 120, 240));

        $this->addLeftSystem(new ElectroPulseGun(2, 6, 3, 240, 0));
        $this->addLeftSystem(new FusionCannon(3, 8, 1, 240, 0));
        $this->addLeftSystem(new FusionCannon(3, 8, 1, 240, 0));
        $this->addLeftSystem(new Thruster(4, 16, 0, 5, 3));
        $this->addLeftSystem(new FusionCannon(3, 8, 1, 180, 300));

        $this->addLeftSystem(new ElectroPulseGun(2, 6, 3, 0, 120));
        $this->addRightSystem(new FusionCannon(3, 8, 1, 0, 120));
        $this->addRightSystem(new FusionCannon(3, 8, 1, 0, 120));
        $this->addRightSystem(new Thruster(4, 16, 0, 5, 4));
        $this->addRightSystem(new FusionCannon(3, 8, 1, 60, 180));

        //0:primary, 1:front, 2:rear, 3:left, 4:right;
        $this->addFrontSystem(new Structure( 5, 48));
        $this->addAftSystem(new Structure( 5, 48));
        $this->addLeftSystem(new Structure( 5, 70));
        $this->addRightSystem(new Structure( 5, 70));
        $this->addPrimarySystem(new Structure( 6, 60));
    }
}
?>
