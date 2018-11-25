<?php
// @codingStandardsIgnoreFile
// @codeCoverageIgnoreStart
// this is an autogenerated file - do not edit
spl_autoload_register(
    function($class) {
        static $classes = null;
        if ($classes === null) {
            $classes = array(
                'absorbtionshield' => '/server/model/weapons/customs.php',
                'advancedassaultlaser' => '/server/model/weapons/lasers.php',
                'advparticlebeam' => '/server/model/weapons/particle.php',
                'ammo' => '/server/model/weapons/ammo.php',
                'ammoexplosion' => '/server/model/cricialClasses.php',
                'antimatterconverter' => '/server/model/weapons/antimatter.php',
                'aoe' => '/server/model/weapons/AoE.php',
                'armorreduced' => '/server/model/cricialClasses.php',
                'assaultlaser' => '/server/model/weapons/lasers.php',
                'bainterceptormki' => '/server/model/weapons/particle.php',
                'ballistic' => '/server/model/BaseClasses.php',
                'ballistictorpedo' => '/server/model/weapons/torpedo.php',
                'baseship' => '/server/model/ships/BaseShip.php',
                'baseshipnoaft' => '/server/model/ships/ShipClasses.php',
                'battlelaser' => '/server/model/weapons/lasers.php',
                'blastcannonfamily' => '/server/model/weapons/pulse.php',
                'bmissilerack' => '/server/model/weapons/missile.php',
                'bombrack' => '/server/model/weapons/missile.php',
                'burstbeam' => '/server/model/weapons/specialWeapons.php',
                'burstpulsecannon' => '/server/model/weapons/specialWeapons.php',
                'buyinggamephase' => '/server/Phase/BuyingGamePhase.php',
                'capital' => '/server/model/ships/uc/Capital.php',
                'cargobay' => '/server/model/systems/baseSystems.php',
                'catapult' => '/server/model/systems/baseSystems.php',
                'chatmanager' => '/server/controller/ChatManager.php',
                'chatmessage' => '/server/model/ChatMessage.php',
                'checkforselfinterceptfire' => '/server/model/weapons/weapon.php',
                'cnc' => '/server/model/systems/baseSystems.php',
                'combatlaser' => '/server/model/weapons/lasers.php',
                'commdisruptor' => '/server/model/weapons/specialWeapons.php',
                'commjammer' => '/server/model/weapons/specialWeapons.php',
                'communicationsdisrupted' => '/server/model/cricialClasses.php',
                'critical' => '/server/model/cricialClasses.php',
                'criticals' => '/server/handlers/criticals.php',
                'cubecoordinate' => '/server/model/CubeCoordinate.php',
                'customheavymattercannon' => '/server/model/weapons/customs.php',
                'customheavypolaritypulsar' => '/server/model/weapons/customs.php',
                'customlightmattercannon' => '/server/model/weapons/customs.php',
                'customlightmattercannonf' => '/server/model/weapons/customs.php',
                'customltphasedisruptor' => '/server/model/weapons/customs.php',
                'customltphasedisruptorship' => '/server/model/weapons/customs.php',
                'customltpolaritypulsar' => '/server/model/weapons/customs.php',
                'custommedpolaritypulsar' => '/server/model/weapons/customs.php',
                'custommphasedbeamacc' => '/server/model/weapons/customs.php',
                'customphasedisruptor' => '/server/model/weapons/customs.php',
                'custompulsarlaser' => '/server/model/weapons/customs.php',
                'customstrikelaser' => '/server/model/weapons/customs.php',
                'damageentry' => '/server/model/BaseClasses.php',
                'damagereductionremoved' => '/server/model/cricialClasses.php',
                'dbmanager' => '/server/controller/DBManager.php',
                'debug' => '/server/lib/Debug.php',
                'defensivesystem' => '/server/model/systems/baseSystems.php',
                'deploymentgamephase' => '/server/Phase/DeploymentGamePhase.php',
                'destabilizerbeam' => '/server/model/weapons/molecular.php',
                'dice' => '/server/lib/dice.php',
                'disengagedfighter' => '/server/model/cricialClasses.php',
                'drakhraidercontroller' => '/server/model/systems/baseSystems.php',
                'dualburstbeam' => '/server/model/weapons/specialWeapons.php',
                'dualweapon' => '/server/model/weapons/dualWeapon.php',
                'duogravitonbeam' => '/server/model/weapons/gravitic.php',
                'duoweapon' => '/server/model/weapons/duoWeapon.php',
                'electropulsegun' => '/server/model/weapons/specialWeapons.php',
                'elintscanner' => '/server/model/systems/baseSystems.php',
                'embolter' => '/server/model/weapons/specialWeapons.php',
                'empulsar' => '/server/model/weapons/specialWeapons.php',
                'emshield' => '/server/model/systems/baseSystems.php',
                'emwavedisruptor' => '/server/model/weapons/defensive.php',
                'energymine' => '/server/model/weapons/AoE.php',
                'energypulsar' => '/server/model/weapons/pulse.php',
                'engine' => '/server/model/systems/baseSystems.php',
                'error' => '/server/lib/random_compat-2.0.2/lib/error_polyfill.php',
                'ew' => '/server/handlers/EW.php',
                'ewentry' => '/server/model/BaseClasses.php',
                'fieldfluctuations' => '/server/model/cricialClasses.php',
                'fighter' => '/server/model/systems/fighter.php',
                'fighterflight' => '/server/model/ships/FighterFlight.php',
                'fightermissilerack' => '/server/model/weapons/missile.php',
                'fightertorpedolauncher' => '/server/model/weapons/missile.php',
                'firegamephase' => '/server/Phase/FireGamePhase.php',
                'fireorder' => '/server/model/BaseClasses.php',
                'firing' => '/server/handlers/firing.php',
                'firstthrustignored' => '/server/model/cricialClasses.php',
                'forcedofflineforturns' => '/server/model/cricialClasses.php',
                'forcedofflineoneturn' => '/server/model/cricialClasses.php',
                'ftrshield' => '/server/model/weapons/defensive.php',
                'fusionagitator' => '/server/model/weapons/molecular.php',
                'fusioncannon' => '/server/model/weapons/molecular.php',
                'gamerules' => '/server/model/GameRules.php',
                'gatlingpulsecannon' => '/server/model/weapons/pulse.php',
                'gausscannon' => '/server/model/weapons/matter.php',
                'gravitic' => '/server/model/weapons/gravitic.php',
                'graviticbolt' => '/server/model/weapons/gravitic.php',
                'graviticcannon' => '/server/model/weapons/gravitic.php',
                'graviticcutter' => '/server/model/weapons/gravitic.php',
                'graviticlance' => '/server/model/weapons/gravitic.php',
                'graviticlanceold' => '/server/model/weapons/gravitic.php',
                'graviticshield' => '/server/model/systems/baseSystems.php',
                'graviticthruster' => '/server/model/systems/baseSystems.php',
                'gravitonbeam' => '/server/model/weapons/gravitic.php',
                'gravitonpulsar' => '/server/model/weapons/gravitic.php',
                'gravlance' => '/server/model/weapons/gravitic.php',
                'guardianarray' => '/server/model/weapons/defensive.php',
                'halfefficiency' => '/server/model/cricialClasses.php',
                'hangar' => '/server/model/systems/baseSystems.php',
                'heavyarray' => '/server/model/weapons/particle.php',
                'heavybolter' => '/server/model/weapons/particle.php',
                'heavyburstbeam' => '/server/model/weapons/specialWeapons.php',
                'heavycombatvessel' => '/server/model/ships/ShipClasses.php',
                'heavycombatvesselleftright' => '/server/model/ships/ShipClasses.php',
                'heavyfusioncannon' => '/server/model/weapons/molecular.php',
                'heavygausscannon' => '/server/model/weapons/matter.php',
                'heavylaser' => '/server/model/weapons/lasers.php',
                'heavylaserlance' => '/server/model/weapons/lasers.php',
                'heavyplasma' => '/server/model/weapons/plasma.php',
                'heavypulse' => '/server/model/weapons/pulse.php',
                'heavyrailgun' => '/server/model/weapons/matter.php',
                'helpmanager' => '/server/controller/HelpManager.php',
                'hkcontrolnode' => '/server/model/systems/baseSystems.php',
                'hlpa' => '/server/model/weapons/customs.php',
                'hvyblastcannon' => '/server/model/weapons/pulse.php',
                'hvyparticlecannon' => '/server/model/weapons/particle.php',
                'impcommjammer' => '/server/model/weapons/specialWeapons.php',
                'imperiallaser' => '/server/model/weapons/lasers.php',
                'improvedblastlaser' => '/server/model/weapons/lasers.php',
                'improvedioncannon' => '/server/model/weapons/ion.php',
                'improvedneutronlaser' => '/server/model/weapons/lasers.php',
                'initialordersgamephase' => '/server/Phase/InitialOrdersGamePhase.php',
                'interceptormki' => '/server/model/weapons/defensive.php',
                'interceptormkii' => '/server/model/weapons/defensive.php',
                'interceptorprototype' => '/server/model/weapons/defensive.php',
                'invulnerablethruster' => '/server/model/systems/Thrusters.php',
                'ionbolt' => '/server/model/weapons/ion.php',
                'ioncannon' => '/server/model/weapons/ion.php',
                'iontorpedo' => '/server/model/weapons/torpedo.php',
                'jammer' => '/server/model/systems/baseSystems.php',
                'jumpengine' => '/server/model/systems/baseSystems.php',
                'laser' => '/server/model/weapons/lasers.php',
                'lasercutter' => '/server/model/weapons/lasers.php',
                'laserlance' => '/server/model/weapons/lasers.php',
                'laserpulsearray' => '/server/model/weapons/dualWeapon.php',
                'lhmissilerack' => '/server/model/weapons/missile.php',
                'lightballistictorpedo' => '/server/model/weapons/ammo.php',
                'lightbolter' => '/server/model/weapons/particle.php',
                'lightfusioncannon' => '/server/model/weapons/molecular.php',
                'lightgraviticbolt' => '/server/model/weapons/gravitic.php',
                'lightgravitonbeam' => '/server/model/weapons/gravitic.php',
                'lightiontorpedo' => '/server/model/weapons/ammo.php',
                'lightlaser' => '/server/model/weapons/lasers.php',
                'lightmoleculardisrupterhandler' => '/server/model/weapons/molecular.php',
                'lightmoleculardisruptor' => '/server/model/weapons/molecular.php',
                'lightparticlebeam' => '/server/model/weapons/particle.php',
                'lightparticlebeamship' => '/server/model/weapons/particle.php',
                'lightparticleblaster' => '/server/model/weapons/particle.php',
                'lightparticlecannon' => '/server/model/weapons/particle.php',
                'lightplasma' => '/server/model/weapons/plasma.php',
                'lightpulse' => '/server/model/weapons/pulse.php',
                'lightrailgun' => '/server/model/weapons/matter.php',
                'lightscattergun' => '/server/model/weapons/customs.php',
                'lightship' => '/server/model/ships/ShipClasses.php',
                'linkedweapon' => '/server/model/weapons/linkedWeapon.php',
                'lmissilerack' => '/server/model/weapons/missile.php',
                'ltblastcannon' => '/server/model/weapons/pulse.php',
                'ltsurgeblaster' => '/server/model/weapons/specialWeapons.php',
                'maggraviticthruster' => '/server/model/systems/baseSystems.php',
                'maggravreactor' => '/server/model/systems/baseSystems.php',
                'maggun' => '/server/model/weapons/plasma.php',
                'manager' => '/server/controller/Manager.php',
                'manouveringthruster' => '/server/model/systems/Thrusters.php',
                'massdriver' => '/server/model/weapons/matter.php',
                'mathlib' => '/server/lib/mathlib.php',
                'matter' => '/server/model/weapons/matter.php',
                'mattercannon' => '/server/model/weapons/matter.php',
                'mattergun' => '/server/model/weapons/matter.php',
                'medblastcannon' => '/server/model/weapons/pulse.php',
                'mediumbolter' => '/server/model/weapons/particle.php',
                'mediumburstbeam' => '/server/model/weapons/specialWeapons.php',
                'mediumlaser' => '/server/model/weapons/lasers.php',
                'mediumplasma' => '/server/model/weapons/plasma.php',
                'mediumpulse' => '/server/model/weapons/pulse.php',
                'mediumship' => '/server/model/ships/ShipClasses.php',
                'mediumshipleftright' => '/server/model/ships/ShipClasses.php',
                'missileb' => '/server/model/weapons/ammo.php',
                'missilefb' => '/server/model/weapons/ammo.php',
                'missilefy' => '/server/model/weapons/ammo.php',
                'missilelauncher' => '/server/model/weapons/missile.php',
                'mlpa' => '/server/model/weapons/customs.php',
                'molecular' => '/server/model/weapons/molecular.php',
                'moleculardisruptor' => '/server/model/weapons/molecular.php',
                'molecularflayer' => '/server/model/weapons/molecular.php',
                'molecularpulsar' => '/server/model/weapons/pulse.php',
                'movement' => '/server/handlers/movement.php',
                'movementgamephase' => '/server/Phase/MovementGamePhase.php',
                'movementorder' => '/server/model/movement/MovementOrder.php',
                'movementvalidationexception' => '/server/model/movement/MovementValidationException.php',
                'movementvalidator' => '/server/model/movement/MovementValidator.php',
                'nastiercrit' => '/server/model/cricialClasses.php',
                'neutronlaser' => '/server/model/weapons/lasers.php',
                'offsetcoordinate' => '/server/model/OffsetCoordinate.php',
                'orienigatlingrg' => '/server/model/weapons/matter.php',
                'osat' => '/server/model/ships/ShipClasses.php',
                'osatthrustercrit' => '/server/model/cricialClasses.php',
                'outputreduced' => '/server/model/cricialClasses.php',
                'outputreduced1' => '/server/model/cricialClasses.php',
                'outputreduced10' => '/server/model/cricialClasses.php',
                'outputreduced2' => '/server/model/cricialClasses.php',
                'outputreduced3' => '/server/model/cricialClasses.php',
                'outputreduced4' => '/server/model/cricialClasses.php',
                'outputreduced6' => '/server/model/cricialClasses.php',
                'outputreduced8' => '/server/model/cricialClasses.php',
                'outputreducedoneturn' => '/server/model/cricialClasses.php',
                'pairedgatlinggun' => '/server/model/weapons/matter.php',
                'pairedlightboltcannon' => '/server/model/weapons/pulse.php',
                'pairedparticlegun' => '/server/model/weapons/particle.php',
                'pairedplasmablaster' => '/server/model/weapons/plasma.php',
                'partialburnout' => '/server/model/cricialClasses.php',
                'particle' => '/server/model/weapons/particle.php',
                'particleblaster' => '/server/model/weapons/particle.php',
                'particlecannon' => '/server/model/weapons/particle.php',
                'particlecutter' => '/server/model/weapons/particle.php',
                'particleimpeder' => '/server/model/weapons/defensive.php',
                'particleprojector' => '/server/model/weapons/particle.php',
                'particlerepeater' => '/server/model/weapons/particle.php',
                'penaltytohit' => '/server/model/cricialClasses.php',
                'phase' => '/server/Phase/Phase.php',
                'phasefactory' => '/server/Phase/PhaseFactory.php',
                'phasemanager' => '/server/controller/PhaseManager.php',
                'plasma' => '/server/model/weapons/plasma.php',
                'plasmaaccelerator' => '/server/model/weapons/plasma.php',
                'plasmagun' => '/server/model/weapons/plasma.php',
                'plasmastream' => '/server/model/weapons/specialWeapons.php',
                'plasmatorch' => '/server/model/weapons/plasma.php',
                'plasmawavetorpedo' => '/server/model/weapons/torpedo.php',
                'playerslot' => '/server/model/BaseClasses.php',
                'playerslotfromjson' => '/server/model/BaseClasses.php',
                'pointpulsar' => '/server/model/weapons/pulse.php',
                'powermanagemententry' => '/server/model/BaseClasses.php',
                'pulse' => '/server/model/weapons/pulse.php',
                'quadarray' => '/server/model/weapons/particle.php',
                'quadparticlebeam' => '/server/model/weapons/particle.php',
                'quadpulsar' => '/server/model/weapons/pulse.php',
                'railgun' => '/server/model/weapons/matter.php',
                'raking' => '/server/model/weapons/lasers.php',
                'rammingattack' => '/server/model/weapons/specialWeapons.php',
                'rapidgatling' => '/server/model/weapons/matter.php',
                'reactor' => '/server/model/systems/baseSystems.php',
                'reduceddamage' => '/server/model/cricialClasses.php',
                'reducediniative' => '/server/model/cricialClasses.php',
                'reducediniativeoneturn' => '/server/model/cricialClasses.php',
                'reducedrange' => '/server/model/cricialClasses.php',
                'reloadrack' => '/server/model/weapons/missile.php',
                'repeatergun' => '/server/model/weapons/particle.php',
                'requiredthrust' => '/server/model/movement/RequiredThrust.php',
                'resonancegenerator' => '/server/model/weapons/specialWeapons.php',
                'restrictedew' => '/server/model/cricialClasses.php',
                'rmissilerack' => '/server/model/weapons/missile.php',
                'rogolonltplasmacannon' => '/server/model/weapons/plasma.php',
                'rogolonltplasmagun' => '/server/model/weapons/plasma.php',
                'scanner' => '/server/model/systems/baseSystems.php',
                'scattergun' => '/server/model/weapons/pulse.php',
                'scatterpulsar' => '/server/model/weapons/pulse.php',
                'sensorsdisrupted' => '/server/model/cricialClasses.php',
                'sensorspear' => '/server/model/weapons/specialWeapons.php',
                'sensorspike' => '/server/model/weapons/specialWeapons.php',
                'sentinelpointdefense' => '/server/model/weapons/defensive.php',
                'severeburnout' => '/server/model/cricialClasses.php',
                'shield' => '/server/model/systems/baseSystems.php',
                'shieldgenerator' => '/server/model/systems/baseSystems.php',
                'shipdisabledoneturn' => '/server/model/cricialClasses.php',
                'shiploader' => '/server/controller/shipLoader.php',
                'shipsystem' => '/server/model/systems/ShipSystem.php',
                'shockcannon' => '/server/model/weapons/specialWeapons.php',
                'simultaneousmovementrule' => '/server/model/SimultaneousMovementRule.php',
                'smallstarbasefoursections' => '/server/model/ships/ShipClasses.php',
                'smissilerack' => '/server/model/weapons/missile.php',
                'solarcannon' => '/server/model/weapons/particle.php',
                'somissilerack' => '/server/model/weapons/missile.php',
                'sparkfield' => '/server/model/weapons/specialWeapons.php',
                'sparkfieldhandler' => '/server/model/weapons/specialWeapons.php',
                'specialability' => '/server/model/systems/baseSystems.php',
                'starbase' => '/server/model/ships/ShipClasses.php',
                'starbasefivesections' => '/server/model/ships/ShipClasses.php',
                'starbasesixsections' => '/server/model/ships/ShipClasses.php',
                'stdparticlebeam' => '/server/model/weapons/particle.php',
                'stealth' => '/server/model/systems/baseSystems.php',
                'structure' => '/server/model/systems/baseSystems.php',
                'stunbeam' => '/server/model/weapons/specialWeapons.php',
                'subreactor' => '/server/model/systems/baseSystems.php',
                'superheavyfighter' => '/server/model/ships/FighterFlight.php',
                'surgeblaster' => '/server/model/weapons/specialWeapons.php',
                'surgecannon' => '/server/model/weapons/specialWeapons.php',
                'swballisticweapon' => '/server/model/weapons/customSW.php',
                'swcapitalconcussion' => '/server/model/weapons/customSW.php',
                'swcapitalproton' => '/server/model/weapons/customSW.php',
                'swdirectweapon' => '/server/model/weapons/customSW.php',
                'swfighterion' => '/server/model/weapons/customSW.php',
                'swfighterlaser' => '/server/model/weapons/customSW.php',
                'swftrballisticlauncher' => '/server/model/weapons/customSW.php',
                'swftrconcmissile' => '/server/model/weapons/customSW.php',
                'swftrconcmissilelauncher' => '/server/model/weapons/customSW.php',
                'swftrmissile' => '/server/model/weapons/customSW.php',
                'swftrprotontorpedo' => '/server/model/weapons/customSW.php',
                'swftrprotontorpedolauncher' => '/server/model/weapons/customSW.php',
                'swheavyion' => '/server/model/weapons/customSW.php',
                'swheavylaser' => '/server/model/weapons/customSW.php',
                'swheavylasere' => '/server/model/weapons/customSW.php',
                'swheavytlaser' => '/server/model/weapons/customSW.php',
                'swheavytlasere' => '/server/model/weapons/customSW.php',
                'swion' => '/server/model/weapons/customSW.php',
                'swionhandler' => '/server/model/weapons/customSW.php',
                'swlightion' => '/server/model/weapons/customSW.php',
                'swlightlaser' => '/server/model/weapons/customSW.php',
                'swlightlasere' => '/server/model/weapons/customSW.php',
                'swlighttlaser' => '/server/model/weapons/customSW.php',
                'swlighttlasere' => '/server/model/weapons/customSW.php',
                'swmediumion' => '/server/model/weapons/customSW.php',
                'swmediumlaser' => '/server/model/weapons/customSW.php',
                'swmediumlaseraf' => '/server/model/weapons/customSW.php',
                'swmediumlasere' => '/server/model/weapons/customSW.php',
                'swmediumtlaser' => '/server/model/weapons/customSW.php',
                'swmediumtlasere' => '/server/model/weapons/customSW.php',
                'swrayshield' => '/server/model/weapons/customSW.php',
                'swscanner' => '/server/model/systems/baseSystems.php',
                'swtargetheld' => '/server/model/cricialClasses.php',
                'swtractorbeam' => '/server/model/weapons/customSW.php',
                'sx11' => '/server/model/ships/uc/Sx11.php',
                'systemdata' => '/server/model/SystemData.php',
                'tacgamedata' => '/server/model/TacGamedata.php',
                'taclaser' => '/server/model/weapons/lasers.php',
                'thruster' => '/server/model/systems/Thrusters.php',
                'tmpinidown' => '/server/model/cricialClasses.php',
                'tmpsensordown' => '/server/model/cricialClasses.php',
                'torpedo' => '/server/model/weapons/torpedo.php',
                'tractorbeam' => '/server/model/weapons/specialWeapons.php',
                'twinarray' => '/server/model/weapons/particle.php',
                'typeerror' => '/server/lib/random_compat-2.0.2/lib/error_polyfill.php',
                'ultralightgraviticbolt' => '/server/model/weapons/gravitic.php',
                'vault1gunship' => '/server/model/ships/uc/Vault1gunship.php',
                'weapon' => '/server/model/weapons/weapon.php',
                'weaponloading' => '/server/model/BaseClasses.php'
            );
        }
        $cn = strtolower($class);
        if (isset($classes[$cn])) {
            require __DIR__ . $classes[$cn];
        }
    },
    true,
    false
);
// @codeCoverageIgnoreEnd
