---
layout: post
title: "Mobile first games in processing"
date: 2017-07-03
project: true
excerpt: "Smartphone games made in processing"
tags: [projects, games, processing, javascript]
feature: games/brain/screenshot.png
comments: true
---
# What is it?
I made three mobile first web games in processing, this post presents how and
why they were made. The games works best on smartphones and can be played
here: [https://rotendahl.dk/games/brain](https://rotendahl.dk/games/brain) and
the code can be found on [github](https://github.com/Rotendahl/brainGames)

## About the project
The project was a freelance job for the university of Copenhagen's School
Service. It was part of a larger project entitled: "Who controls your brain",
the project was aimed at middle school children with the purpose of teaching
them about their brains. These games were made as the digital part of the
project and tasked them with various cognitive tasks.


## The choice of framework
The kids were invited to a series of events where they would play them. We did
not expect them to be able to install apps on their phones (Parental controls
etc.) which meant that the games had to be web based.

I considered different web-based game engines such as [Phaser](https://phaser.io)
but after playing a bit with them they all seemed to complex for these simple games.
From my work in Coding Pirates I knew about
[Processing](http://processingjs.org) which is a simple way to create
interactive drawings.

A quick look at the [documentation](http://processingjs.org/reference/) for
processing reveals its main strength, the functions are few and basic enough
that the learning curve is almost nonexistent. As an example the following
snippet creates small circles in different colors based on the position of the
mouse.

{% highlight javascript %}
setup = function(){
    size(400, 400);
    framerate(30);
};

background(0, 0, 0);

draw = function() {
    fill(mouseX, mouseY, 0);
    ellipse(mouseX, mouseY, 50, 50);
};
{% endhighlight %}

A programmer armed with the documentation, can start building games at once and
not focus on lengthy  the framework from the .

The downside of processing is that it's mainly made for education purposes and
interactive art. This gave the following problems:

*  The handling of touch events is not handled in a nice manner, Processing only
has a notion of mouse clicks and can't handle multitouch. I solved this using a
dirty hack where the position of the mouse and not the clicks is used, and each
frame the positions is reset so a change in position indicates a click. This is
the reason the games does not work perfectly on desktop browsers.

* It's hard to get it to work in a responsive manner.

* It's was originally implemented in java and you can tell it's a port and
not web first. The main problem is the development process, a bug is not
reported in any useful way which makes it a pain to debug.

* It's Hard to interact with the DOM.

A way to get around some of these problems is to use this excellent
[extension](https://github.com/GildasP/jProcessingJS) which makes it responsive
and mobile friendly.


{: .notice}
Update :
Since I built my project the javascript version of processing has gotten a
successor [p5](https://p5js.org) which solves these problems.


## The structure of a game
Each game starts with a html file that loads the framework and the css required
to make it responsive, lastly it loads several _.pde_ files and creates a
canvas

The next step is to load the images required, this is done with the
preprocessing directive `/* @pjs preload="image1.jpg"; */`, without these the
games will run before the images are loaded and break. Using these directives
it's simple to create a loading screen and scale the images once they are
loaded. The `setup` and `draw` functions are placed in the file _code.pde_ which
controls the game's state and the core game logic. Each game has a file
_game.pde_ that contains the data structures and classes for each game.

The _php_ files are used to send and retrieve the score to a database, this is
done in a stupid way since high score is just set using URL parameters.
Processing had no way to interact with the DOM so no post request could be made.

{: .notice}
Update :
The database is broken, and I can't be bothered to keep it alive, so the
high-score functionality is broken


### The memory game
<img src="/games/brain/assets/huske.png" style="width:50%;">
This game task the player to remember an ever increasing sequence of tiles.
In the first level the user is shown three tiles numbered from one to three.
After the timer runs out the numbers are hidden and the player must remember
their order.

The game was made to show that we can "trick" our mind into remembering more
information by storing it efficiently. First the kids had to check how they
performed when trying to remember the positions of each tile. Afterwards they
instead were told to remember the path and notice how they performed better.


#### Implementation
The game's logic starts with creating a grid of a `tile` class, which holds the
position and value for each tile, it exposes methods for hiding/showing and
drawing it self. The game randomly picks tiles corresponding to
\\(levelNumber + 2 \\) ranks them from \\( [1,levelNumber] \\) and draws them.

The state loop in _game.pde_ starts a timer and turns tiles when needed. When
the player loses they are given the option of posting their score or trying
again.



### The "tabel" game
<img src="/games/brain/assets/tabel.png" style="width:50%;">
This game presents the player with at table that keeps scrolling down, at the
bottom of the screen is the current "task" for the bottom row. The task can be
picking the sum of two numbers, picking a number \\(n \\) such that
\\( 3 \mid n  \\), etc. If the player fails a task the row goes red and one
extra row will stay red for the rest of the game.

The goal of the game was to
have the kids find a way of avoiding doing the actual computation and find a
pattern that could solve the task, I.e \\( 5 \mid n  \\) can be solved just
by finding a number that ends in 5 or 0.


#### Implementation
The game creates 5 rows containing 6 instances of the tile class. The rows
scroll down and when they hit the bottom of the screen they are moved to the
top again. When a row is "reset" the numbers on the tile are changed so they
continue the sequence from the row nearest the top that isn't red. The non red
row closets to the bottom is the active one that the current task should be
performed on. If a task is completed the row turns blue and active row and
current task is changed.



### The reaction game
<img src="/games/brain/assets/reaktion.png" style="width:50%;">
This game tests the players reactions and ability to perform simple cognitive
tasks. It was inspired by the [Batak board](http://www.batak.com)

The player has to hit a specified number of nodes in the graph, before the time
runs out.

#### Implementation
The board is created by instantiating a board class which in turn instantiates
a series of nodes. The nodes are hardcoded to show up in the baktak board
