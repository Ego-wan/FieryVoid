window.InitialPhaseStrategy = (function(){

    function InitialPhaseStrategy(coordinateConverter){
        PhaseStrategy.call(this, coordinateConverter);
    }

    InitialPhaseStrategy.prototype = Object.create(window.PhaseStrategy.prototype);

    InitialPhaseStrategy.prototype.update = function (gamedata) {
        PhaseStrategy.prototype.update.call(this, gamedata);
        if (this.selectedShip) {
            this.ewIconContainer.showForShip(this.selectedShip);
        }
    };

    InitialPhaseStrategy.prototype.activate = function (shipIcons, ewIconContainer, ballisticIconContainer, gamedata, webglScene) {

        this.changeAnimationStrategy(new window.IdleAnimationStrategy(shipIcons, gamedata.turn));

        PhaseStrategy.prototype.activate.call(this, shipIcons, ewIconContainer, ballisticIconContainer, gamedata, webglScene);

        console.log("enabled initial phase strategy");
        infowindow.informPhase(5000, function(){});
        shipManager.power.repeatLastTurnPower();
        this.selectFirstOwnShipOrActiveShip();
        gamedata.showCommitButton();
        return this;
    };

    InitialPhaseStrategy.prototype.deactivate = function () {
        PhaseStrategy.prototype.deactivate.call(this, true);
        botPanel.deactivate();
        return this;
    };

    InitialPhaseStrategy.prototype.onHexClicked = function(payload) {
        if (! this.selectedShip) {
            return;
        }

        var ballistics = gamedata.selectedSystems.filter(function(system) {
            return system.ballistic;
        });

        if (ballistics.length > 0) {
            console.log("targeting ballistics");
            weaponManager.targetHex(this.selectedShip, payload.hex);
        }
    };

    InitialPhaseStrategy.prototype.selectShip = function(ship, payload) {
        var menu = new ShipTooltipInitialOrdersMenu(this.selectedShip, ship, this.gamedata.turn);
        menu.addButton("selectShip", null, function() {
            PhaseStrategy.prototype.selectShip.call(this, ship);
            botPanel.setEW(ship);
            this.showShipEW(this.selectedShip);
        }.bind(this), "Select ship");
        this.showShipTooltip(ship, payload, menu, false);
    };

    InitialPhaseStrategy.prototype.deselectShip = function(ship) {
        PhaseStrategy.prototype.deselectShip.call(this, ship);
        botPanel.onShipStatusChanged(ship);
        this.hideShipEW(ship);
    };


    InitialPhaseStrategy.prototype.onMouseOutShips = function(ships) {
        PhaseStrategy.prototype.onMouseOutShips.call(this, ships);
        if (this.selectedShip) {
            this.showShipEW(this.selectedShip);
        }
    };

    InitialPhaseStrategy.prototype.targetShip = function(ship, payload) {
        //TODO: Targeting ship with ballistic weapons
        //TODO: Targeting ship with support EW (defensive or offensive)
        console.log("target ship");
        var menu = new ShipTooltipInitialOrdersMenu(this.selectedShip, ship, this.gamedata.turn);
        this.showShipTooltip(ship, payload, menu, false);
    };

    InitialPhaseStrategy.prototype.createReplayUI = function(gamedata) {
        if (gamedata.turn === 1) {
            return;
        }

        this.replayUI = new ReplayUI().activate();
    };

    return InitialPhaseStrategy;
})();