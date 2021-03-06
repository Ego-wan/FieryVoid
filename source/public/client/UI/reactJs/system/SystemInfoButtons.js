import * as React from "react";
import styled from "styled-components"
import {Clickable} from "../styled";

const Container = styled.div`
    display:flex;
`;

const Button = styled.div`
	display: flex;
    width: 30px;
    height: 30px;
    background-image: url(${props => props.img});
	background-size: cover;
	align-items: center;
    justify-content: center;
    ${Clickable}
`;

class SystemInfoButtons extends React.Component {

    online(e) {
        e.stopPropagation(); e.preventDefault();
        const {ship, system} = this.props;
        shipManager.power.onOnlineClicked(ship, system);
        webglScene.customEvent('CloseSystemInfo');
    }

    offline(e) {
        e.stopPropagation(); e.preventDefault();
        const {ship, system} = this.props;
        if (!canOffline(ship, system)) {
            return;
        }

        shipManager.power.onOfflineClicked(ship, system);
        webglScene.customEvent('CloseSystemInfo');
	}
	
	allOnline(e) {
        e.stopPropagation(); e.preventDefault();
        const {ship, system} = this.props;
        shipManager.power.onlineAll(ship, system);
        webglScene.customEvent('CloseSystemInfo');
    }

    allOffline(e) {
        e.stopPropagation(); e.preventDefault();
        const {ship, system} = this.props;
        if (!canOffline(ship, system)) {
            return;
        }

        shipManager.power.offlineAll(ship, system);
        webglScene.customEvent('CloseSystemInfo');
    }
	
    overload(e) {
        e.stopPropagation(); e.preventDefault();
        const {ship, system} = this.props;
        shipManager.power.onOverloadClicked(ship, system);
        webglScene.customEvent('CloseSystemInfo');
    }

    stopOverload(e) {
        e.stopPropagation(); e.preventDefault();
        const {ship, system} = this.props;
        shipManager.power.onStopOverloadClicked(ship, system);
        webglScene.customEvent('CloseSystemInfo');
    }

    boost(e) {
        e.stopPropagation(); e.preventDefault();
        const {ship, system} = this.props;
        shipManager.power.clickPlus(ship, system);
    }

    deboost(e) {
        e.stopPropagation(); e.preventDefault();
        const {ship, system} = this.props;
        shipManager.power.clickMinus(ship, system);
	}

	addShots(e) {
        e.stopPropagation(); e.preventDefault();
		const {ship, system} = this.props;
		if (!canAddShots(ship, system)) {
            return;
		}
		
        weaponManager.changeShots(ship, system, 1);
    }

    reduceShots(e) {
        e.stopPropagation(); e.preventDefault();
		const {ship, system} = this.props;
		if (!canReduceShots(ship, system)) {
            return;
		}
		
        weaponManager.changeShots(ship, system, -1);
	}
	
	removeFireOrder(e) {
        e.stopPropagation(); e.preventDefault();
		const {ship, system} = this.props;
		if (!canRemoveFireOrder(ship, system)) {
            return;
		}
		
        weaponManager.removeFiringOrder(ship, system);
        webglScene.customEvent('CloseSystemInfo');
	}

	allChangeFiringMode(e) {
		e.stopPropagation(); e.preventDefault();
		const {ship, system} = this.props;
		if (!canChangeFiringMode(ship, system)) {
		    return;
		}		    
		//change firing mode of self
		weaponManager.onModeClicked(ship, system);
		//check which mode was set
		var modeSet = system.firingMode;		    
		//set this mode on ALL similar weapons that aren't declared and can change firing mode
		var allWeapons = [];
        if (ship.flight) {
            allWeapons = ship.systems
                .map(fighter => fighter.systems)
                .reduce((all, weapons) => all.concat(weapons), [])
                .filter(system => system.weapon);
        } else {
            allWeapons = ship.systems.filter(system => system.weapon);
        }		
		var similarWeapons = new Array();
		for (var i = 0; i < allWeapons.length; i++) {
			if (system.displayName === allWeapons[i].displayName) {
				if (system.weapon) {
					similarWeapons.push(allWeapons[i]);
				}
			}
		}
		for (var i = 0; i < similarWeapons.length; i++) {
			var weapon = similarWeapons[i];
			if (weapon.firingMode == modeSet) continue;
			if (!canChangeFiringMode(ship, weapon)) continue;
			var originalMode = weapon.firingMode; //so mode is properly reset for weapon that cannot have desired mode set for some reason!
			var iterations = 0;
			while (weapon.firingMode!=modeSet && iterations < 2){
				weaponManager.onModeClicked(ship, weapon);
				if(weapon.firingMode == 1){
					iterations++; //if an entire iteration passed and mode wasn't found, then mode cannot be reached	
				}
			}
			//reset mode back if necessary! (this one is guaranteed to be available)
			if (weapon.firingMode!=modeSet) while (weapon.firingMode!=originalMode){
				weaponManager.onModeClicked(ship, weapon);
			}
		}
		//webglScene.customEvent('CloseSystemInfo');
	}
	
	changeFiringMode(e) {
        	e.stopPropagation(); e.preventDefault();
		const {ship, system} = this.props;
		if (!canChangeFiringMode(ship, system)) {
            		return;
		}		
		weaponManager.onModeClicked(ship, system);
		//webglScene.customEvent('CloseSystemInfo');
	}
	
	
	/*declare this weapon to be eligible for defensive fire this turn*/
	declareSelfIntercept(e) {
        	e.stopPropagation(); e.preventDefault();
		const {ship, system} = this.props;
		if (!canSelfIntercept(ship, system)) {
            		return;
		}		
		weaponManager.onDeclareSelfInterceptSingle(ship, system);
		webglScene.customEvent('CloseSystemInfo');
	}	
	/*declare all similar undeclared weapons for defensive fire this turn*/
	declareSelfInterceptAll(e) {
        	e.stopPropagation(); e.preventDefault();
		const {ship, system} = this.props;
		weaponManager.onDeclareSelfInterceptSingleAll(ship,system);
		webglScene.customEvent('CloseSystemInfo');
	}	
	
	
	/*switch Adaptive Armor display to next damage class*/
	nextCurrClass(e) {
        e.stopPropagation(); e.preventDefault();
		const {ship, system} = this.props;
		system.nextCurrClass();
		webglScene.customEvent('SystemDataChanged', { ship: ship, system: system });
	}	
	
	/*Adaptive Armor increase rating for current class*/
	AAincrease(e) {
        e.stopPropagation(); e.preventDefault();
		const {ship, system} = this.props;
		system.doIncrease();
		webglScene.customEvent('SystemDataChanged', { ship: ship, system: system });
	}		
	/*Adaptive Armor decrease rating for current class*/
	AAdecrease(e) {
        e.stopPropagation(); e.preventDefault();
		const {ship, system} = this.props;
		system.doDecrease();
		webglScene.customEvent('SystemDataChanged', { ship: ship, system: system });
	}
	/*Adaptive Armor propagate setting for current damage type*/
	AApropagate(e) {
        e.stopPropagation(); e.preventDefault();
		const {ship, system} = this.props;
		var dmgType = system.getCurrDmgType();
		var allocated = system.getCurrAllocated();
		//loop through all own units and increase setting for this dmg type until this level is achieved (or as high as possible otherwise)
		var allOwnAA = [];
		for (var i in gamedata.ships) {
            var otherUnit = gamedata.ships[i];
			if (otherUnit.userid != ship.userid) continue; //ignore other players' units
            if (shipManager.isDestroyed(otherUnit)) continue; //ignore destroyed units
			//now find AA controllers, if any...
			if (otherUnit.flight) {
				for (var iFtr=0;iFtr<otherUnit.systems.length;iFtr++){
					var ftr = otherUnit.systems[iFtr];
					if (ftr) for (var iSys=0;iSys<ftr.systems.length;iSys++){
						var ctrl = ftr.systems[iSys];
						if (ctrl) if (ctrl.displayName == "Adaptive Armor Controller"){
							allOwnAA.push(ctrl);
							break;//no point looking for SECOND AA Controller on a fighter
						}
					}
				}				
				/*
				
				
				allOwnAA = ship.systems
					.map(fighter => fighter.systems)
					.filter(system => system.displayName = "Adaptive Armor Controller");
					*/
			} else {
				for (var iSys=0;iSys<otherUnit.systems.length;iSys++){
					var ctrl = otherUnit.systems[iSys];
					if (ctrl.displayName == "Adaptive Armor Controller"){
						allOwnAA.push(ctrl);
						break;//no point looking for SECOND AA Controller on a ship
					}
				}
			}
        }
		
		//for each Controller: set allocated level to desired if possible
		for (var c = 0; c < allOwnAA.length; c++) {
			var ctrl = allOwnAA[c];
			ctrl.setCurrDmgType(dmgType); //set damage type to desired (or none)
			while(
				ctrl.getCurrAllocated() < allocated // level lower than desired
				&& ctrl.canIncrease() //level can be increased
			){
				ctrl.doIncrease();
			}
		}
		
		webglScene.customEvent('SystemDataChanged', { ship: ship, system: system });
	}		
	
    render() {
		const {ship, selectedShip, system} = this.props;
		
		if (!canDoAnything) {
			return null;
		}
		
        return (
            <Container>
				{canOnline(ship, system) && <Button title="power on (R = mass for weapons)" onClick={this.online.bind(this)} onContextMenu={this.allOnline.bind(this)} img="./img/on.png"></Button>}
                {canOffline(ship, system) && <Button title="power off (R = mass for weapons)" onClick={this.offline.bind(this)} onContextMenu={this.allOffline.bind(this)} img="./img/off.png"></Button>}
                {canOverload(ship, system) && <Button title="overload" onClick={this.overload.bind(this)} img="./img/overload.png"></Button>}
                {canStopOverload(ship, system) && <Button title="stop overload" nClick={this.stopOverload.bind(this)} img="./img/overloading.png"></Button>}
                {canDeBoost(ship, system) && <Button title="deboost"onClick={this.deboost.bind(this)} img="./img/minussquare.png"></Button>}
                {canBoost(ship, system) && <Button title="boost" onClick={this.boost.bind(this)} img="./img/plussquare.png"></Button>}
                {canAddShots(ship, system) && <Button title="more shots"onClick={this.addShots.bind(this)} img="./img/plussquare.png"></Button>}
                {canReduceShots(ship, system) && <Button title="less shots" onClick={this.reduceShots.bind(this)} img="./img/minussquare.png"></Button>}
				{canRemoveFireOrder(ship, system) && <Button title="cancel fire order" onClick={this.removeFireOrder.bind(this)} img="./img/firing.png"></Button>}
				
				{canChangeFiringMode(ship, system) && getFiringModesCurr(ship, system)}
				{canChangeFiringMode(ship, system) && getFiringModes(ship, system, this.changeFiringMode.bind(this), this.allChangeFiringMode.bind(this))}
				{canSelfIntercept(ship, system) && <Button title="allow interception (R = mass)" onClick={this.declareSelfIntercept.bind(this)} onContextMenu={this.declareSelfInterceptAll.bind(this)} img="./img/selfIntercept.png"></Button>}
				
				{canAAdisplayCurrClass(ship, system) && <Button title={getAAcurrClassName(ship,system)} img={getAAcurrClassImg(ship,system)}></Button>}
				{canAAdisplayCurrClass(ship, system) && <Button title="next" onClick={this.nextCurrClass.bind(this)} img="./img/systemicons/AAclasses/iconNext.png"></Button>}
				{canAAincrease(ship, system) && <Button onClick={this.AAincrease.bind(this)} img="./img/systemicons/AAclasses/iconPlus.png"></Button>}
				{canAAdecrease(ship, system) && <Button onClick={this.AAdecrease.bind(this)} img="./img/systemicons/AAclasses/iconMinus.png"></Button>}
				{canAApropagate(ship, system) && <Button title="propagate setting" onClick={this.AApropagate.bind(this)} img="./img/systemicons/AAclasses/iconPropagate.png"></Button>}
            </Container>
        )
    }
}

//can do something with Adaptive Armor Controller
const canAA = (ship,system) => (gamedata.gamephase === 1) && (system.name == 'adaptiveArmorController'); 
const canAAdisplayCurrClass = (ship,system) => canAA(ship,system) && system.getCurrClass()!='';
const getAAcurrClassImg = (ship,system) => './img/systemicons/AAclasses/'+system.getCurrClass()+'.png'; 
const getAAcurrClassName = (ship,system) => system.getCurrClass(); 
const canAAincrease = (ship,system) => canAA(ship,system) && system.canIncrease()!='';
const canAAdecrease = (ship,system) => canAA(ship,system) && system.canDecrease()!='';
const canAApropagate = (ship,system) => canAA(ship,system) && system.canPropagate()!='';

export const canDoAnything = (ship, system) => canOffline(ship, system) || canOnline(ship, system) 
	|| canOverload(ship, system) || canStopOverload(ship, system) || canBoost(ship, system) 
	|| canDeBoost(ship, system) || canAddShots(ship, system) || canReduceShots(ship, system)
	|| canRemoveFireOrder(ship, system) || canChangeFiringMode(ship, system)
	|| canSelfIntercept(ship, system) || canAA(ship,system);

const canOffline = (ship, system) => gamedata.gamephase === 1 && (system.canOffLine || system.powerReq > 0) && !shipManager.power.isOffline(ship, system) && !shipManager.power.getBoost(system) && !weaponManager.hasFiringOrder(ship, system);

const canOnline = (ship, system) => gamedata.gamephase === 1 && shipManager.power.isOffline(ship, system);

const canOverload = (ship, system) => !shipManager.power.isOffline(ship, system) && system.weapon && system.overloadable && !shipManager.power.isOverloading(ship, system) && shipManager.power.canOverload(ship, system);

const canStopOverload = (ship, system) => system.weapon && system.overloadable && shipManager.power.isOverloading(ship, system);

const canBoost = (ship, system) => system.boostable && gamedata.gamephase === 1 && shipManager.power.canBoost(ship, system) && (!system.isScanner() || system.id == shipManager.power.getHighestSensorsId(ship));

const canDeBoost = (ship, system) => gamedata.gamephase === 1 && Boolean(shipManager.power.getBoost(system));

const canAddShots = (ship, system) => system.weapon && system.canChangeShots && weaponManager.hasFiringOrder(ship, system) && weaponManager.getFiringOrder(ship, system).shots < system.shots;

const canReduceShots = (ship, system) => system.weapon && system.canChangeShots && weaponManager.hasFiringOrder(ship, system) && weaponManager.getFiringOrder(ship, system).shots > 1; 

const canRemoveFireOrder = (ship, system) => system.weapon && weaponManager.hasFiringOrder(ship, system);

const canChangeFiringMode = (ship, system) => system.weapon  && ((gamedata.gamephase === 1 && system.ballistic) || (gamedata.gamephase === 3 && !system.ballistic)) && !weaponManager.hasFiringOrder(ship, system) && (Object.keys(system.firingModes).length > 1 || system.dualWeapon);

//can declare eligibility for interception: charged, recharge time >1 turn, intercept rating >0, no firing order
const canSelfIntercept = (ship, system) => system.weapon && weaponManager.canSelfInterceptSingle(ship, system);

const getFiringModes = (ship, system, changeFiringMode, allChangeFiringMode) => {
	if (system.parentId >= 0) {
		let parentSystem = shipManager.systems.getSystem(ship, system.parentId);
	
		if (parentSystem.parentId >= 0) {
			parentSystem = shipManager.systems.getSystem(ship, parentSystem.parentId);
			//$(".parentsystem_" + parentSystem.id).addClass("modes");
			//let modebutton = $(".mode", $(".parentsystem_" + parentSystem.id));
		} else {
			//$(".parentsystem_" + parentSystem.id).addClass("modes");
			//let modebutton = $(".mode", systemwindow);
		}
	
		console.log(parentSystem.firingModes[parentSystem.firingMode]);
		//modebutton.html("<span>" + parentSystem.firingModes[parentSystem.firingMode].substring(0, 1) + "</span>");
	} else {
		
		console.log(system.firingModes, system.firingMode);

		const firingMode = system.firingModes[system.firingMode + 1] ? system.firingModes[system.firingMode + 1] : system.firingModes[1];

		let img = '';

		if (system.iconPath) {
			img = `./img/systemicons/${system.iconPath}`;
		} else {
			img = `./img/systemicons/${system.name}.png`;
		}
		
		var textTitle = "set mode " + firingMode + " (R = mass)"; 
		return <Button title={textTitle} onClick={changeFiringMode} onContextMenu={allChangeFiringMode}  img={img}>{firingMode.substring(0, 1)}</Button>;
	}
}

/*getFiringModesCurr - display current firing mode (no effect on click)*/
const getFiringModesCurr = (ship, system) => {
	if (system.parentId >= 0) { //...obsolete...
		/*
		let parentSystem = shipManager.systems.getSystem(ship, system.parentId);	
		if (parentSystem.parentId >= 0) {
			parentSystem = shipManager.systems.getSystem(ship, parentSystem.parentId);
		} else {
		}
		*/
	} else {
		const firingMode = system.firingModes[system.firingMode] ? system.firingModes[system.firingMode] : system.firingModes[1];
		let img = '';
		if (system.iconPath) {
			img = `./img/systemicons/${system.iconPath}`;
		} else {
			img = `./img/systemicons/${system.name}.png`;
		}
		
		var textTitle = "current mode: " + firingMode; 
		return <Button title={textTitle} img={img}>{firingMode.substring(0, 1)}</Button>;
	}
} //endof getFiringModesCurr

export default SystemInfoButtons;

