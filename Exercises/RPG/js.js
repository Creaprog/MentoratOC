(function (d, w) {
    var map = d.querySelector('#map');
    var context = map.getContext('2d');
    var round = 0;

    //Map creation
    function createMap(){
        for(var x = 0; x <= 10; x++){
            for(var y = 0; y <= 10; y++){
                context.strokeStyle = "black";
                context.strokeRect(x*50, y*50, 50, 50);
            }
        }
    }

    //Constructor of characters
    function Character(nick, x, y, src, weapon){
        this.nick = nick;
        this.x = x;
        this.y = y;
        this.life = 100;
        this.weapon = weapon;
        this.src = src;
        this.image = new Image();
        this.step = 3;

        this.moveUp = function(){
            if(this.y == 0){
                this.step++;
                console.log('vous ne pouvez pas aller dans cette direction');
            }else{
                clearContext(this.x, this.y);
                this.y = this.y - 50;
                this.weapon.y = this.weapon.y - 50;
                move(this, this.weapon);
            }
        };

        this.moveDown = function() {
            if(this.y == 450){
                this.step++;
                console.log('vous ne pouvez pas aller dans cette direction');
            }else {
                clearContext(this.x, this.y);
                this.y = this.y + 50;
                this.weapon.y = this.weapon.y + 50;
                move(this, this.weapon);
            }

        };

        this.moveRight = function(){
            if(this.x == 450){
                this.step++;
                console.log('vous ne pouvez pas aller dans cette direction');
            }else{
                clearContext(this.x, this.y);
                this.x = this.x + 50;
                this.weapon.x = this.weapon.x + 50;
                move(this, this.weapon);
            }

        };

        this.moveLeft = function(){
            if(this.x == 0){
                this.step++;
                console.log('vous ne pouvez pas aller dans cette direction');
            }else{
                clearContext(this.x, this.y);
                this.x = this.x - 50;
                this.weapon.x = this.weapon.x - 50;
                move(this, this.weapon);
            }

        };
    }

    //Constructor of weapons
    function Weapon(name, damage, src){
        this.name = name;
        this.damage = damage;
        this.x = aleaPosition();
        this.y = aleaPosition();
        this.src = src;
        this.image = new Image();

        this.sendTo = function(character){
            character.weapon = this;
            this.x = character.x;
            this.y = character.y;
        }
    }

    //Core
    function addToGame(character){
        character.image.src = character.src;
        character.image.addEventListener('load', function(){
            context.drawImage(character.image, character.x, character.y);
        }, false);
    }

    function move(character, weapon){
        delete character.image;
        character.image = new Image();
        character.image.src = character.src;
        character.image.addEventListener('load', function(){
            context.drawImage(character.image, character.x, character.y);
        }, false);
        weapon.image.src = weapon.src;
        weapon.image.addEventListener('load', function(){
            context.drawImage(weapon.image, weapon.x, weapon.y)
        }, false);
    }

    function aleaPosition(){
        return Math.floor(Math.random() * (10 - 1)) * 50;
    }

    function collision(character, character2){
        if(character.x == character2.x && character.y == character2.y){
            character.x = aleaPosition();
            character.y = aleaPosition();
            character2.x = aleaPosition();
            character2.y = aleaPosition();
        }
    }

    function collisionWeapon(weapon, weapon2, weapon3, character, character2){
        if(weapon.x == weapon2.x && weapon.y == weapon2.y){
            weapon.x = aleaPosition();
        }else if(weapon2.x == weapon3.x && weapon2.y == weapon3.y){
            weapon2.y = aleaPosition();
        }else if(weapon.x == character.x && weapon.y == character.y){
            weapon.x = aleaPosition();
        }else if(weapon.x == character2.x && weapon.y == character2.y){
            weapon.y = aleaPosition();
        }else if(weapon2.x == character.x && weapon2.y == character.y){
            weapon2.x = aleaPosition();
        }else if(weapon2.x == character2.x && weapon2.y == character2.y){
            weapon2.y = aleaPosition();
        }else if(weapon3.x == character.x && weapon3.y == character.y){
            weapon3.x = aleaPosition();
        }else if(weapon3.x == character2.x && weapon3.y == character2.y){
            weapon3.y = aleaPosition();
        }
    }

    function clearContext(x, y){
        context.clearRect(x, y, 50, 50);
        context.strokeStyle = "black";
        context.strokeRect(x, y, 50, 50);
    }

    function manageStep(character){
        if(character.step > 0){
            return true;
        }else if(character.step == 0){
            character.step = 3;
            if(round == 0){
                round = 1;
            }else{
                round = 0;
            }
            return false;
        }
    }

    function moveCharacters(){
        d.addEventListener('keydown', function(e){
            if(e.keyCode == 38){
                if(round == 0) {
                    if (manageStep(Greg)) {
                        Greg.moveUp();
                        Greg.step--;
                    }else {
                        Emilie.moveUp();
                        Emilie.step --;
                    }
                }
                else{
                    if (manageStep(Emilie)) {
                        Emilie.moveUp();
                        Emilie.step--;
                    }else {
                         Greg.moveUp();
                        Greg.step--;
                    }
                }

            }else if(e.keyCode == 40){
                if(round == 0) {
                    if (manageStep(Greg)) {
                        Greg.moveDown();
                        Greg.step--;
                    }else {
                         Emilie.moveDown();
                        Emilie.step --;
                    }
                }
                else{
                    if (manageStep(Emilie)) {
                         Emilie.moveDown();
                         Emilie.step--;
                    }else {
                        Greg.moveDown();
                        Greg.step--;
                    }
                }

            }else if(e.keyCode == 39){
                if(round == 0) {
                    if (manageStep(Greg)) {
                        Greg.moveRight();
                        Greg.step--;
                    }else {
                        Emilie.moveRight();
                        Emilie.step --;
                    }
                }
                else{
                    if (manageStep(Emilie)) {
                        Emilie.moveRight();
                        Emilie.step--;
                    }else {
                        Greg.moveRight();
                        Greg.step--;
                    }
                }

            }else if(e.keyCode == 37){
                if(round == 0) {
                    if (manageStep(Greg)) {
                        Greg.moveLeft();
                        Greg.step--;
                    }else {
                        Emilie.moveLeft();
                        Emilie.step --;
                    }
                }
                else{
                    if (manageStep(Emilie)) {
                        Emilie.moveLeft();
                        Emilie.step--;
                    }else {
                        Greg.moveLeft();
                        Greg.step--;
                    }
                }

            }
        })
    }

    //Weapon creation
    var weapDefaultA = new Weapon('sword', 10, 'images/weaponC.png');
    var weapDefaultB = new Weapon('sword', 10, 'images/weaponC.png');
    var baton = new Weapon('baton', 20, 'images/weaponD.png');
    var dagger = new Weapon('dagger', 15, 'images/weaponA.png');
    var gun = new Weapon('gun', 30, 'images/weaponB.png');


    //Character creation
    var Greg = new Character('Greg', aleaPosition(), aleaPosition(), 'images/characterA.png');
    var Emilie = new Character('Emilie', aleaPosition(), aleaPosition(), 'images/characterB.png');



    //Launch the game
    createMap();
    addToGame(Greg);
    addToGame(Emilie);
    collision(Greg, Emilie);
    weapDefaultA.sendTo(Greg);
    addToGame(weapDefaultA);
    weapDefaultB.sendTo(Emilie);
    addToGame(weapDefaultB);
    addToGame(baton);
    addToGame(dagger);
    addToGame(gun);
    collisionWeapon(baton, dagger, gun, Greg, Emilie);
    moveCharacters();

})(document, window);
