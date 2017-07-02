var sketchProc = function(pros) {
with (pros) {

// Game settings

var screenX = 1340;
var screenY = 750;
size(screenX, screenY);

frameRate(60);

/* @pjs preload="ocean.jpg"; */

var ocean = loadImage("ocean.jpg");
// x = 750 and y = 225

var black = color(0,0,0);
var white = color(255, 255, 255);




var fish = function(xPos, yPos, speedIn, colorIn, direct, Stripe, sc, ss, size,
   length, shark) {
    this.x =  xPos;
    this.y = yPos;
    this.speed = speedIn;
    this.color = colorIn;
    this.dir = direct;
    this.hasStripes = Stripe;
    this.stripeColor = sc;
    this.stripeStroke = ss;
    this.size = size;
    this.length = length;
    this.time = 0;
    this.timelimit = floor(random(1, 20));
    this.bubble = new bubble(this.x, this.y, this.speed, this.size);
    this.shark = shark;
    this.drawfish = function(){

      if(this.shark === true){
        noStroke();
        if(this.dir === 1){
          var leftX = this.x - (130 * this.size * this.length) / 4;
          var bottomY = this.y;
          var rightX = this.x + (130 * this.size * this.length) / 4;
          var topX = this.x - (this.x - leftX) / 2;
          var topY = this.y - (100 * this.size);
          fill(this.color);
          triangle(leftX,bottomY, rightX, bottomY, topX, topY);
        }
        if(this.dir === -1){
          var leftX = this.x - (130 * this.size * this.length) / 4;
          var bottomY = this.y;
          var rightX = this.x + (130 * this.size * this.length) / 4;
          var topX = this.x + (this.x - leftX) / 2;
          var topY = this.y - (100 * this.size);
          fill(this.color);
          triangle(leftX,bottomY, rightX, bottomY, topX, topY);
        }
      };
      // fish swims right
      strokeWeight(5);
      if(this.dir === 1){
        fill(this.color);
        stroke(this.color);
        ellipse(this.x,this.y,130 * this.size * this.length, 100 * this.size);
        triangle(this.x - 80 * this.size * this.length,this.y - 75 * this.size,
                this.x - 80 * this.size * this.length,this.y + 75 * this.size,
                this.x,this.y);
        stroke(0,0,0);
        fill(0,0,0);
        //eye of the fish
        ellipse(this.x + 40 * this.size,this.y - 20 * this.size,10 * this.size,
          10 * this.size);
      }
      if(this.dir === -1){
        fill(this.color);
        stroke(this.color);
        //body of the fish
        ellipse(this.x,this.y, 130 * this.size * this.length, 100 * this.size);
        triangle(this.x + 80 * this.size * this.length,this.y + 75 * this.size ,
              this.x + 80 * this.size * this.length,this.y - 75 * this.size,
               this.x, this.y);
        stroke(0,0,0);
        fill(0,0,0);
        //eye of the fish
        ellipse(this.x - 40 * this.size,this.y - 20 * this.size,10 * this.size,
          10 * this.size);
      }
      //mouth of the fish
      // var MouthTopX = this.x + (130 * this.size * this.length) / 2;
      // var MouthTopY = this.y;
      // line(MouthBottomX, MouthBottomY, MouthTopX, MouthTopY);
      if(this.dir === 1){
       var MouthX = this.x + (130 * this.size * this.length) / 4;
       var MouthY = this.y
       var Mouthheight = (100 * this.size) / 2;
       var Mouthwidth = (130 * this.size * this.length) / 2;
      noFill();
      arc(MouthX, MouthY, Mouthwidth, Mouthheight, radians(0),
       radians(90));
       }
       if(this.dir === -1){
         var MouthX = this.x - (130 * this.size * this.length) / 4;
         var MouthY = this.y
         var Mouthheight = (100 * this.size) / 2;
         var Mouthwidth = (130 * this.size * this.length) / 2;
        noFill();
        arc(MouthX, MouthY, Mouthwidth, Mouthheight, radians(90),
         radians(180));
       }
      if(this.hasStripes){
        // stripy code goes here
        var topX = this.x;
        var topY = this.y;
        var botX = this.x;
        var botY = this.y + 50 * this.size;
        stroke(this.stripeStroke);
        fill(this.stripeColor);
        ellipse(topX, topY, 15 * this.size, 100 * this.size);
        if(this.length > 1){
          ellipse()
        }
        ellipse(topX - (35 * this.size * this.dir) , topY, 15 * this.size,
         84 * this.size);
      }
      if(this.time === this.timelimit){
      this.bubble.drawBubble()
      }
      if(this.time === this.timelimit + 1){
        var bubbleX = this.x + ((130 * this.size * this.length) / 2
                      * this.dir) ;
        this.bubble = new bubble(bubbleX, this.y, this.speed, this.size);
        this.time = 0;
      }
      this.x += this.speed * this.dir;

      if(this.x > screenX){
        this.dir = -1;
      }
      if(this.x < 0){
        this.dir = 1;
      }
      if(frameCount % 60 === 0){
        this.time += 1;
      }
    };
};

var bubble = function(xPos, yPos, speedIn, Size){
  this.xPos = xPos;
  this.yPos = yPos;
  this.speed = speedIn;
  this.size = Size;

  this.drawBubble = function(){
    stroke(0,0,0);
    fill(141, 217, 230);
    ellipse(this.xPos,this.yPos,100 * this.size,100 * this.size);
    fill(255, 255, 255);
    ellipse(this.xPos + 10,this.yPos - 10,50 * this.size,40 * this.size);
    this.yPos -= this.speed;
    //if(this.yPos < 0){
    //  this.yPos = 700;
    //};
  };
};


var createfish = function(){
  var number = random(0, 10);
  var dir;
  var stripes = false;
  if(number < 5){
    dir = -1;
    stripes = true;
  }
  else{
    dir = 1;
  }


  return new fish(random(0, screenX) , random(0, screenY), random(5, 20),
           color(random(0, 255), random(0, 255), random(0, 255)), dir, stripes,
           color(random(0, 255), random(0, 255), random(0, 255)),
           color(random(0, 255), random(0, 255), random(0, 255)),
           random(1, 3),random(1, 2),false);
}

var bubbles = [
    new bubble(50, 500, 10, 1),

]

var fishes = [
  new fish(50, 500, 10, color(0, 145, 255), 1, true, black, black, 1.5, 1, false),
  // Dori
  new fish(42 , 314,5, color(250, 138, 0), -1, true, white, black, 1, 1, false),
  // Nemo
  new fish(60 , 100, 10, color(200, 200, 200), 1, true,white, black, 1, 1, true),
  // sharks
  new fish(200 , 200, 10, color(200, 200, 200), -1, true,white, black, 2, 2, true),
  // sharks
  createfish(),
  createfish(),
  createfish(),
  createfish(),
  createfish(),

]

var yPos = 700;
var draw = function(){
image(ocean,0,0);
  for(var i = 0; i < bubbles.length; i++){
  bubbles[i].drawBubble();
}
  for(var i = 0; i < fishes.length; i++){
    fishes[i].drawfish();
  }
}


}};

// Run game
var canvas = document.getElementById("mycanvas");
var pros = new Processing(canvas, sketchProc);
