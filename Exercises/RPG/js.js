(function (d, w) {
    var map = d.querySelector('#map');
    var context = map.getContext('2d');

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
    function Character(nick, x, y, src){
        this.nick = nick;
        this.x = x;
        this.y = y;
        this.life = 100;
        this.weapon = 0;
        this.src = src;
        this.image = new Image();
    }

    //Core
    function addToGame(character){
        character.image.src = character.src;
        character.image.addEventListener('load', function(){
            context.drawImage(character.image, character.x, character.y);
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


    //Character creation
    var Greg = new Character('Greg', aleaPosition(), aleaPosition(), 'images/characterA.png');
    var Emilie = new Character('Emilie', aleaPosition(), aleaPosition(), 'images/characterB.png');



    //Launch the game
    createMap();
    addToGame(Greg);
    addToGame(Emilie);
    collision(Greg, Emilie);


})(document, window);
