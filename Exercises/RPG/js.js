(function (d, w) {
    var map = d.querySelector('#map');
    var context = map.getContext('2d');
    var round = 0;
    var end = 0;
    var fightMode = 0;
    var playerTable = [];
    var gameZone = d.getElementById('game');
    var log, title, titleText, description, descriptionText, welcome, welcomeText, playerStat, playerName, space, spaceTwo, spaceTree, life, lifeValue, weaponName, damageWeapon, selectWeapon, selectWeaponDamage, stepText, spaceStep, selectStep;


    /**
     * The world contains the characters and different weapons
     * @constructor
     */
    var World = function () {
        this.createMap();
    };

    World.prototype.characters = [];
    World.prototype.weapons = [];

    World.prototype.collides = function (element) {
        var x = element.x,
            y = element.y,
            nameToCheck = element.nick || element.name || null,
            char, weapon,
            i, l;

        for (i = 0, l = this.characters.length; i < l; i++) {
            char = this.characters[i];
            if (x === char.x && y === char.y && char.nick !== nameToCheck) {
                return true;
            }
        }

        for (i = 0, l = this.weapons.length; i < l; i++) {
            weapon = this.weapons[i];
            if (x === this.weapons[i].x && y === this.weapons[i].y && weapon.name !== nameToCheck) {
                return true;
            }
        }

        return false;
    };

    function fightEngine(character) {
        if (isCombat(character)) {
            fightMode = 1;
            if (character.step == 3) {
                for (var i = 0, l = playerTable.length; i < l; i++) {
                    if (playerTable[i].nick != character.nick) {
                        playerTable[i].isFirstFight = true;
                        createFightText(playerTable[i]);
                        createEventFight(playerTable[i]);
                    }
                }
            } else {
                character.isFirstFight = true;
                createFightText(character);
                createEventFight(character);

            }

        }
    }


    function textEngine(character) {
        var inputFight = d.getElementById('fight' + character.nick);
        inputFight.parentNode.removeChild(inputFight);
        var inputDefend = d.getElementById('defend' + character.nick);
        inputDefend.parentNode.removeChild(inputDefend);
        var br1 = d.getElementById('space1' + character.nick);
        br1.parentNode.removeChild(br1);
        var br2 = d.getElementById('space2' + character.nick);
        br2.parentNode.removeChild(br2);
    }

    function win(character) {
        var body, winP, winText;

        for (var i = 0, l = playerTable.length, removeText; i < l; i++) {
            removeText = d.getElementById('data' + playerTable[i].nick);
            removeText.parentNode.removeChild(removeText);
        }

        body = d.getElementById('log');
        winP = d.createElement('p');
        winText = d.createTextNode('Félicitation à ' + character.nick + ' qui remporte le combat ! ');
        winP.appendChild(winText);
        body.appendChild(winP);
    }

    function switchRound(character, character2) {
        if (end == 0) {
            textEngine(character);
            createFightText(character2);
            createEventFight(character2);
        } else {
            win(character);
        }
    }

    function createEventFight(character) {
        var fight = d.getElementById('fight' + character.nick);
        var l = playerTable.length;

        fight.addEventListener('click', function () {
            for (var i = 0; i < l; i++) {
                if (playerTable[i].nick != character.nick) {
                    if (playerTable[i].defend) {
                        playerTable[i].life = playerTable[i].life - character.weapon.damage / 2;
                        playerTable[i].defend = false;
                        if (playerTable[i].life == 0) {
                            end = 1;
                        }
                    } else {
                        playerTable[i].life = playerTable[i].life - character.weapon.damage;
                        if (playerTable[i].life == 0) {
                            end = 1;
                        }
                    }
                    var life = d.getElementById('life' + playerTable[i].nick);
                    life.value = playerTable[i].life;
                    switchRound(character, playerTable[i]);
                }
            }
        });

        var defend = d.getElementById('defend' + character.nick);
        defend.addEventListener('click', function () {
            character.defend = true;
            for (var i = 0; i < l; i++) {
                if (playerTable[i].nick != character.nick) {
                    switchRound(character, playerTable[i]);
                }
            }
        });
    }

    function createFightText(character) {
        var body = d.getElementById('log'), player, brP, brP2, defend, fight;
        player = d.getElementById('data' + character.nick);
        brP = d.createElement('br');
        brP.id = 'space1' + character.nick;
        player.appendChild(brP);
        fight = d.createElement('input');
        fight.id = 'fight' + character.nick;
        fight.type = 'button';
        fight.name = 'fight';
        fight.value = 'Attaquer';
        player.appendChild(fight);
        brP2 = d.createElement('br');
        brP2.id = 'space2' + character.nick;
        player.appendChild(brP2);
        defend = d.createElement('input');
        defend.type = 'button';
        defend.id = 'defend' + character.nick;
        defend.value = 'Defendre';
        player.appendChild(defend);
        body.appendChild(player);
    }

    /**
     *
     * @param element
     * @param randomPosition
     * @returns {World}
     */
    World.prototype.addElement = function (element, randomPosition) {
        randomPosition = !!randomPosition;
        var position;
        var limit = (this.weapons.length + this.characters.length) * 2 || 50;
        var i = 0, l;
        var nameToCheck = element.nick || element.name || null;
        var char, weapon;

        for (i = 0, l = this.characters.length; i < l; i++) {
            char = this.characters[i];
            if (char.nick === nameToCheck) {
                throw Error('Name "' + nameToCheck + '" already exists in the game.');
            }
        }

        for (i = 0, l = this.weapons.length; i < l; i++) {
            weapon = this.weapons[i];
            if (weapon.name === nameToCheck) {
                throw Error('Name "' + nameToCheck + '" already exists in the game.');
            }
        }

        if (randomPosition) {
            i = 0;
            do {
                position = {
                    x: this.aleaPosition(),
                    y: this.aleaPosition()
                };
                i++;
            } while (this.collides(position) && i < limit);

            if (i >= limit) {
                throw Error('It seems your world is full...');
            }

            element.x = position.x;
            element.y = position.y;
        }

        if (element.isCharacter) {
            this.characters.push(element);
        } else if (element.isWeapon) {
            this.weapons.push(element);
        } else {
            throw Error('What kind of element did you want to add to the world?');
        }

        element.image.src = element.src;
        element.image.addEventListener('load', function () {
            context.drawImage(element.image, element.x, element.y);
        }, false);

        return this;
    };


    World.prototype.aleaPosition = function () {
        return Math.floor(Math.random() * (10 - 1)) * 50;
    };

    World.prototype.createMap = function () {
        for (var x = 0; x <= 10; x++) {
            for (var y = 0; y <= 10; y++) {
                context.strokeStyle = "black";
                context.strokeRect(x * 50, y * 50, 50, 50);
            }
        }
    };

    World.prototype.drawElement = function (element) {
        element.image.src = element.src;
        element.image.addEventListener('load', function () {
            context.drawImage(element.image, element.x, element.y);
        }, false);
    };

    World.prototype.updateStep = function (character) {
        selectStep = d.getElementById('step' + character.nick);
        selectStep.innerText = 'Déplacement restant : ' + character.step;
    };
    // TO BE REMOVED IN THE END
    var aleaPosition = World.prototype.aleaPosition;

    //Constructor of characters
    function Character(nick, x, y, src, weapon) {
        this.isCharacter = true;
        this.nick = nick;
        this.x = x;
        this.y = y;
        this.life = 100;
        this.weapon = weapon;
        this.src = src;
        this.image = new Image();
        this.step = 3;
        this.clear = 1;
        this.oldWeapon = null;
        this.defend = false;

        this.setWeapon = function (weapon) {
            this.weapon = weapon;
            weapon.x = this.x;
            weapon.y = this.y;
        };

        this.move = function (direction) {
            var valid = {
                    'up': {attribute: 'y', value: -50},
                    'down': {attribute: 'y', value: 50},
                    'left': {attribute: 'x', value: -50},
                    'right': {attribute: 'x', value: 50}
                },
                modificators = valid[direction];

            if (!valid[direction]) {
                throw Error('Direction not valid. Must be one of "up", "down", "left" or "right".');
            }

            console.info(this.nick + ' moves ' + direction);

            clearContext(this.x, this.y);
            if (this.clear !== 1) {
                world.drawElement(this.oldWeapon);
            }
            this[modificators.attribute] = this[modificators.attribute] + modificators.value;
            if (catchWeapon(this)) {
                this.weapon.onTheMap(this.x, this.y);
                this.oldWeapon = this.weapon;
                this.weapon = returnWeaponCatch(this);
                updateWeaponText(this);
                world.drawElement(this);
                this.clear = 0;
            } else {
                this.weapon[modificators.attribute] = this.weapon[modificators.attribute] + modificators.value;
                move(this, this.weapon);
                this.clear = 1;
            }


        };
        /**
         * @param character Character
         * @returns {boolean}
         */
        var catchWeapon = function (character) {
            return (character.x == baton.x && character.y == baton.y)
                || (character.x == gun.x && character.y == gun.y)
                || (character.x == dagger.x && character.y == dagger.y)
                || (character.x == weapDefaultA.x && character.y == weapDefaultA.y)
                || (character.x == weapDefaultB.x && character.y == weapDefaultB.y)
                ;
        };

        this.moveUp = function () {
            if (this.y == 0) {
                this.step++;
                console.log("you can't go in this direction");
            } else {
                this.move('up');
            }
        };

        this.moveDown = function () {
            if (this.y == 450) {
                this.step++;
                console.log("you can't go in this direction");
            } else {
                this.move('down');
            }
        };

        this.moveRight = function () {
            if (this.x == 450) {
                this.step++;
                console.log("you can't go in this direction");
            } else {
                this.move('right');
            }
        };

        this.moveLeft = function () {
            if (this.x == 0) {
                this.step++;
                console.log("you can't go in this direction");
            } else {
                this.move('left');
            }
        };


    }

    //Constructor of weapons
    function Weapon(name, damage, src) {
        this.isWeapon = true;
        this.name = name;
        this.damage = damage;
        this.x = aleaPosition();
        this.y = aleaPosition();
        this.src = src;
        this.image = new Image();


        this.onTheMap = function (cordx, cordy) {
            this.x = cordx;
            this.y = cordy;
            world.drawElement(this);
        };
    }

    function move(character) {
        var weapon = character.weapon;
        delete character.image;
        character.image = new Image();
        character.image.src = character.src;
        character.image.addEventListener('load', function () {
            context.drawImage(character.image, character.x, character.y);
        }, false);
        weapon.image.src = weapon.src;
        weapon.image.addEventListener('load', function () {
            context.drawImage(weapon.image, weapon.x, weapon.y)
        }, false);
    }

    function isCombat(character) {
        for (var i = 0, o = playerTable.length; i < o; i++) {
            if (character.nick != playerTable[i].nick) {
                if (playerTable[i].y == character.y + 50 && playerTable[i].x == character.x) {
                    return true
                } else if (playerTable[i].y == character.y - 50 && playerTable[i].x == character.x) {
                    return true
                } else if (playerTable[i].x == character.x - 50 && playerTable[i].y == character.y) {
                    return true
                } else if (playerTable[i].x == character.x + 50 && playerTable[i].y == character.y) {
                    return true
                }
            }
            else {
                return false
            }
        }
    }

    function returnWeaponCatch(character) {
        if (character.x == baton.x && character.y == baton.y && character.weapon.name != baton.name) {
            return baton
        } else if (character.x == gun.x && character.y == gun.y && character.weapon.name != gun.name) {
            return gun
        } else if (character.x == dagger.x && character.y == dagger.y && character.weapon.name != dagger.name) {
            return dagger
        } else if (character.x == weapDefaultA.x && character.y == weapDefaultA.y && character.weapon.name != weapDefaultA.name) {
            return weapDefaultA
        } else if (character.x == weapDefaultB.x && character.y == weapDefaultB.y && character.weapon.name != weapDefaultB.name) {
            return weapDefaultB
        }
        else {
            return null
        }
    }

    function createText() {
        log = d.createElement('div');
        log.id = 'log';
        title = d.createElement('h1');
        titleText = d.createTextNode('Rpg game');

        title.appendChild(titleText);
        log.appendChild(title);

        description = d.createElement('p');
        descriptionText = d.createTextNode("Bienvenue sur ce mini Rpg le but est simple : vous devez vaincre votre adversaire pour cela vous pouvez les différentes armes sur la carte de jeux. Lorsque vous vous retrouver a coter de votre adversaire un combat a mort débuttera, vous aurez alors deux possibilité la première attaquer et la seconde defencre si vous attaque vous infligerez a votre adversaire les dégats complet, si vous choissisez de vous défendre alors vous ne pourrer pas attque pendant votre tour mais vous prendrer la moitier des dégats de l'arme de votre adversaire.");

        description.appendChild(descriptionText);
        log.appendChild(description);

        welcome = d.createElement('h2');
        welcomeText = d.createTextNode('Que le combat commence !');

        welcome.appendChild(welcomeText);
        log.appendChild(welcome);

        for (var i = 0, o = playerTable.length; i < o; i++) {
            playerStat = d.createElement('p');
            playerStat.id = 'data' + playerTable[i].nick;
            playerName = d.createTextNode(playerTable[i].nick);

            playerStat.appendChild(playerName);
            space = d.createElement('br');
            playerStat.appendChild(space);

            life = d.createTextNode('life : ');
            playerStat.appendChild(life);

            lifeValue = d.createElement('progress');
            lifeValue.id = 'life' + playerTable[i].nick;
            lifeValue.value = playerTable[i].life;
            lifeValue.max = playerTable[i].life;

            playerStat.appendChild(lifeValue);

            weaponName = d.createElement('span');
            weaponName.id = 'weapon' + playerTable[i].nick;
            weaponName.innerText = 'Arme : ' + playerTable[i].weapon.name;


            spaceTwo = d.createElement('br');
            playerStat.appendChild(spaceTwo);

            playerStat.appendChild(weaponName);

            damageWeapon = d.createElement('span');
            damageWeapon.id = 'damage' + playerTable[i].nick;
            damageWeapon.innerText = 'Dégat de l\'arme : ' + playerTable[i].weapon.damage;
            spaceTree = d.createElement('br');
            playerStat.appendChild(spaceTree);
            playerStat.appendChild(damageWeapon);

            spaceStep = d.createElement('br');
            playerStat.appendChild(spaceStep);

            stepText = d.createElement('span');
            stepText.id = 'step' + playerTable[i].nick;
            stepText.innerText = 'Déplacement restant : ' + playerTable[i].step;
            playerStat.appendChild(stepText);


            log.appendChild(playerStat);

        }

        gameZone.insertBefore(log, map);
    }

    function updateWeaponText(character) {
        selectWeapon = d.getElementById('weapon' + character.nick);
        selectWeapon.innerText = 'Arme : ' + character.weapon.name;
        selectWeaponDamage = d.getElementById('damage' + character.nick);
        selectWeaponDamage.innerText = 'Dégat de l\'arme : ' + character.weapon.damage;
    }


    function clearContext(x, y) {
        context.clearRect(x, y, 50, 50);
        context.strokeStyle = "black";
        context.strokeRect(x, y, 50, 50);
    }

    function manageStep(character) {
        if (character.step > 0) {
            return true;
        } else if (character.step == 0) {
            character.step = 3;
            if (round == 0) {
                round = 1;
            } else {
                round = 0;
            }
            return false;
        }
    }

    function moveCharacters() {
        d.addEventListener('keydown', function (e) {
            if (e.keyCode == 38) {
                if (fightMode == 0) {
                    if (round == 0) {
                        if (manageStep(playerA)) {
                            playerA.moveUp();
                            playerA.step--;
                            world.updateStep(playerA);
                            fightEngine(playerB);
                        } else {
                            playerB.moveUp();
                            playerB.step--;
                            world.updateStep(playerB);
                            fightEngine(playerB);
                        }
                    }
                    else {
                        if (manageStep(playerB)) {
                            playerB.moveUp();
                            playerB.step--;
                            world.updateStep(playerB);
                            fightEngine(playerB);
                        } else {
                            playerA.moveUp();
                            playerA.step--;
                            world.updateStep(playerA);
                            fightEngine(playerA);
                        }
                    }
                } else {
                    console.info("you can't escape you");
                }


            } else if (e.keyCode == 40) {
                if (fightMode == 0) {
                    if (round == 0) {
                        if (manageStep(playerA)) {
                            playerA.moveDown();
                            playerA.step--;
                            world.updateStep(playerA);
                            fightEngine(playerB);
                        } else {
                            playerB.moveDown();
                            playerB.step--;
                            world.updateStep(playerB);
                            fightEngine(playerB);
                        }
                    }
                    else {
                        if (manageStep(playerB)) {
                            playerB.moveDown();
                            playerB.step--;
                            world.updateStep(playerB);
                            fightEngine(playerB);
                        } else {
                            playerA.moveDown();
                            playerA.step--;
                            world.updateStep(playerA);
                            fightEngine(playerA);
                        }
                    }
                } else {
                    console.info("you can't escape you");
                }

            } else if (e.keyCode == 39) {
                if (fightMode == 0) {
                    if (round == 0) {
                        if (manageStep(playerA)) {
                            playerA.moveRight();
                            playerA.step--;
                            world.updateStep(playerA);
                            fightEngine(playerB);
                        } else {
                            playerB.moveRight();
                            playerB.step--;
                            world.updateStep(playerB);
                            fightEngine(playerA);
                        }
                    }
                    else {
                        if (manageStep(playerB)) {
                            playerB.moveRight();
                            playerB.step--;
                            world.updateStep(playerB);
                            fightEngine(playerB);
                        } else {
                            playerA.moveRight();
                            playerA.step--;
                            world.updateStep(playerA);
                            fightEngine(playerA);
                        }
                    }
                } else {
                    console.info("you can't escape you");
                }


            } else if (e.keyCode == 37) {
                if (fightMode == 0) {
                    if (round == 0) {
                        if (manageStep(playerA)) {
                            playerA.moveLeft();
                            playerA.step--;
                            world.updateStep(playerA);
                            fightEngine(playerB);
                        } else {
                            playerB.moveLeft();
                            playerB.step--;
                            world.updateStep(playerB);
                            fightEngine(playerA);
                        }
                    }
                    else {
                        if (manageStep(playerB)) {
                            playerB.moveLeft();
                            playerB.step--;
                            world.updateStep(playerB);
                            fightEngine(playerB);
                        } else {
                            playerA.moveLeft();
                            playerA.step--;
                            world.updateStep(playerA);
                            fightEngine(playerA);
                        }
                    }
                } else {
                    console.info("you can't escape you");
                }

            }
        })
    }

    //Player name request
    var playerA = prompt('What is the name of player 1 ?');
    var playerB = prompt('What is the name of player 2 ?');

    //Weapon creation
    var weapDefaultA = new Weapon('swordA', 10, 'images/weaponC.png');
    var weapDefaultB = new Weapon('swordB', 10, 'images/weaponC.png');
    var baton = new Weapon('baton', 20, 'images/weaponD.png');
    var dagger = new Weapon('dagger', 15, 'images/weaponA.png');
    var gun = new Weapon('gun', 30, 'images/weaponB.png');

    //Character creation
    playerA = new Character(playerA, 0, 0, 'images/characterA.png');
    playerB = new Character(playerB, 0, 0, 'images/characterB.png');

    var world = new World();

    world
        .addElement(playerA, true)
        .addElement(playerB, true)
        .addElement(weapDefaultA, true)
        .addElement(weapDefaultB, true)
        .addElement(baton, true)
        .addElement(dagger, true)
        .addElement(gun, true)
    ;
    w.world = world;
    playerTable.push(playerA);
    playerTable.push(playerB);
    playerA.setWeapon(weapDefaultA);
    playerB.setWeapon(weapDefaultB);
    createText();
    moveCharacters();
})(document, window);

/*
 Game
 World
 Characters[]
 .world
 .weapon
 Weapons[]
 */
