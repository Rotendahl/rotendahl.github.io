var lev1Expl = function()
{
    background(white);
    image(lev1ExplImg, 0, 0);
}

var lev2Expl = function()
{
    background(white);
    image(lev2ExplImg, 0, 0);
}

var newNodes = function()
{
    var rands = [];
    for (var i = 0; i < 100; i ++)
    {
        rands[i] = String(Math.floor(Math.random()*89+10));
    }
    nodes = [
            new node(250, 350, 70, rands[0], false), // center
            new node(330, 500, 70, rands[3], false), // low right
            new node(420, 650, 70, rands[4], false), // low low right
            new node(380, 350, 70, rands[9], false), // mid right
            new node(330, 200, 70, rands[5], false), // up right
            new node(420, 50, 70, rands[6], false), // up up right
            new node(80, 50, 70, rands[8], false), // up up left
            new node(170, 200, 70, rands[7], false), // up left
            new node(100, 350, 70, rands[10], false), // mid left
            new node(80, 650, 70, rands[2], false), // low low left
            new node(170, 500, 70, rands[1], false), // low left
    ];
    for(var i = 0; i < nodes.length; i++)
    {
        if(nodes[i].content % 2 === 0)
        {
            nodes[i].active = true;
            break;
        }
        if(i === nodes.length -1)
        {
            nodes[i].active = true;
            nodes[i].content = "42";
        }
    }
    return nodes
}


nodes = newNodes();

var lev1 = function()
{
    for(var i = 0; i < nodes.length; i++)
    {
        strokeWeight(4);
        stroke(black);
        if(i + 1 < nodes.length)
        {
            var node1X = nodes[i].xPos
            var node1Y = nodes[i].yPos
            var node2X = nodes[i+1].xPos
            var node2Y = nodes[i+1].yPos
            line(node1X, node1Y, node2X, node2Y);
        }
    }
    var node1X = nodes[0].xPos
    var node1Y = nodes[0].yPos
    var node2X = nodes[nodes.length-1].xPos
    var node2Y = nodes[nodes.length-1].yPos
    line(node1X, node1Y, node2X, node2Y);
    for(var i = 0; i < nodes.length; i++)
    {
        nodes[i].draw();
    }
}


var lev2 = function()
{
    for(var i = 0; i < nodes.length; i++)
    {
        strokeWeight(4);
        stroke(black);
        if(i + 1 < nodes.length)
        {
            var node1X = nodes[i].xPos
            var node1Y = nodes[i].yPos
            var node2X = nodes[i+1].xPos
            var node2Y = nodes[i+1].yPos
            line(node1X, node1Y, node2X, node2Y);
        }
    }
    var node1X = nodes[0].xPos
    var node1Y = nodes[0].yPos
    var node2X = nodes[nodes.length-1].xPos
    var node2Y = nodes[nodes.length-1].yPos
    line(node1X, node1Y, node2X, node2Y);
    for(var i = 0; i < nodes.length; i++)
    {
        nodes[i].draw();
    }
}


var lev1Stats = function()
{
    background(white);
    image(lev1StatsImg, 0, 0);
    fill(blue);
    textSize(25);
    text(lev1Time, 320, 363);
}


var lev2Stats = function()
{
    background(white);
    image(lev2StatsImg, 0, 0);
    fill(blue);
    textSize(25);
    text(lev1Time, 320, 363);
}


var End = function()
{
    background(white);
    image(endImg, 0, 0);
}

var gameStates = ["Greeting", "lev1Expl", "lev1", "lev1Stats", "lev2Expl",
                  "lev2", "lev2Stats", "End"];

// Input Handling
mouseClicked = function()
{
    if(gameStates[curState] === "lev1")
    {
        for(var i = 0; i < nodes.length; i++)
        {
            if(nodes[i].isClicked(mouseX,mouseY))
            {
                if(nodes[i].active)
                {
                    score++;
                    nodes[i].active = false;
                    if(score < lev1Limit)
                    {
                        var newNode = Math.floor(Math.random()*nodes.length);
                        while(newNode === i)
                        {
                            newNode = Math.floor(Math.random()*nodes.length);
                        }
                        nodes[newNode].active = true;
                    }
                    else
                    {
                        lev1Time = String(secs + ":" + frames);
                        curState = 3
                    }
                }
            }
        }
    }
    else if(gameStates[curState] === "lev1Expl")
    {
            curState = 2;
            console.log("Leeeets play for real!")
    }
    else if(gameStates[curState] === "Greeting")
    {
            curState = 1;
            console.log("Leeeets play!")
    }
    else if(gameStates[curState] === "lev1Stats")
    {
            curState = 4;
            console.log("Leeeets play for real!")
    }
    else if(gameStates[curState] === "lev2Stats")
    {
            curState = 7;
            console.log("Leeeets play for real!")
    }
    else if(gameStates[curState] === "lev2Expl")
    {
            curState = 5;
            console.log("Leeeets play for real again!")
    }
    else if(gameStates[curState] === "lev2")
    {
        for(var i = 0; i < nodes.length; i++)
        {
            if(nodes[i].isClicked(mouseX,mouseY))
            {
                if(nodes[i].active && nodes[i].content % 2 === 0)
                {
                    score++;
                    nodes[i].active = false;
                    if(score < lev1Limit)
                    {
                        nodes[cheatNode].active = false;
                        cheatNode = Math.floor(Math.random()*nodes.length);
                        nodes[cheatNode].active = true;
                        var newNode = Math.floor(Math.random()*nodes.length);
                        while(newNode === i || nodes[newNode].content % 2 === 1)
                        {
                            newNode = Math.floor(Math.random()*nodes.length);
                        }
                            nodes[newNode].active = true;
                    }
                    else
                    {
                        lev1Time = String(secs + ":" + frames);
                        curState = 6
                    }
                }
            }
        }
    }
};


curState = 0
var cheatNode = Math.floor(Math.random()*nodes.length);
var firstLev1 = true;
var frames = 0;
var secs = 0;
var score = 0;
var lev1Limit = 15;
var lev1Time = 0;
var lev2First = true;
var draw = function()
{

    background(white);

    if(gameStates[curState] === "Greeting")
    {
        greet();
    }
    if(gameStates[curState] === "lev1Expl")
    {
        lev1Expl();
        secs = 0;
    }
    if(gameStates[curState] === "lev1")
    {
        lev1();
        fill(orange)
        ms = frames % 60;
        if(ms === 59)
        {
            secs++;
        }
        text("Score: " + score, 180, 580);
        text("Tid: " + secs + ":" + ms, 180, 650);
    }

    if(gameStates[curState] === "lev1Stats")
    {
        lev1Stats();
    }

    if(gameStates[curState] === "lev2Expl")
    {
        lev2Expl();
        secs = 0;
        score = 0;
    }

    if(gameStates[curState] === "lev2")
    {
        if(lev2First)
        {
            nodes = newNodes();
            lev2First = false;
        }
        lev2()
        fill(orange)
        ms = frames % 60;
        if(ms === 59)
        {
            secs++;
        }
        text("Score: " + score, 180, 580);
        text("Tid: " + secs + ":" + ms, 180, 650);
    }
    if(gameStates[curState] === "lev2Stats")
    {
        lev2Stats();
    }
    if(gameStates[curState] === "End")
    {
        End();
    }
    borders();
    frames++;
}

}};

// Run game
var canvas = document.getElementById("mycanvas");
var pros = new Processing(canvas, sketchProc);
