---
title: Terminal configuration
date: 2017-07-19 00:00:00 Z
tags: [blog, productivity, jekyll]
catagories: [guide, shell, setup]
layout: post
excerpt: Probably the best terminal setup in the world.
feature: assets/img/terminal.png
draft: true
comments: true
---

When I was a tutor last sommer I gave a quick introduction to the command line.
This post walks trough my terminal configuration, it's made for MacOS but the
vast majority of things can also be used on linux.


I won't touch on how to actually use the terminal since there already exists a
a bunch of excellent guides out there, here is a short list of the some guides:
* [Codecademy](https://www.codecademy.com/learn/learn-the-command-line) A short
guide that covers the basics of the command line, it's very "hand-holdy" and
does not require any prior knowledge.
* [Learn it the hard way](https://learnpythonthehardway.org/book/appendixa.html)
As the name implies it does not hold your hand, personally I think this
approach is more fun.
* [Over the wire](http://overthewire.org/wargames/bandit/)
A really hard guide, it task you with using the terminal to find passwords on
servers. It's hard but extremely fun and satisfying, if you have patience and
some experience I would recommend this guide.

### 1. Step: Install xcode (Mac only)
Xcode is apple's development environment it has an IDE and a series of command
line utilities that are needed. It's free and can be installed by typing
{% highlight bash %}
    $ xcode-select --install
{% endhighlight %}
in the terminal and following the popup that appears.


### 2. Step : Getting a package manager
We still need to install several more utilities and the first is a package
manager, which is kinda like an `app store` for your shell.

Each linux distribution comes with a built in package manager, Ubuntu comes
with`apt-get`, so if you want to install python you simply type:
{% highlight bash %}
    $ sudo apt-get install python
{% endhighlight %}

Apple has not made a package manager, but there exists options for the for mac.
Each has their own pros and cons, I prefer [homebrew](http://brew.sh).
Here is a quick pros and cons [list](https://apple.stackexchange.com/questions/32724/what-are-pros-and-cons-for-macports-fink-and-homebrew)

You can install homebrew by running this command:
{% highlight bash %}
    $ /usr/bin/ruby -e "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/master/install)"
{% endhighlight %}

Below is some examples of basic homebrew usage
{% highlight bash %}
    $ brew install mono # Installs mono
    $ brew search node # Searches after all packages that has node in it's name
    $ brew update # Updated brews list of packages
    $ brew upgrade # Upgrades all install packages to their newest version
    $ brew doctor # Built in troubleshooting if you ever have problems run this
{% endhighlight %}

We can use `brew install` to get a bunch of terminal utilities, but brew has
an extra trick up it's sleeve. Homebrew can "tap" repos that provide extra
functionality [Caskroom](https://caskroom.github.io) is an example of this.

{% highlight bash %}
    $ brew tap caskroom/cask
{% endhighlight %}
This allows us to install GUI apps from the command line.
Instead of searching google for the `.dmg`, installing and cleaning up we
can just run:
{% highlight bash %}
    $ brew cask install google-chrome steam skype
{% endhighlight %}
It can be a bit confusing when you should use `brew cask install` vs `brew
install`. A rule of thumb is that _cask_ if for app that have a graphical
interface.


## Terminal emulator
MacOS has a built in terminal appropriately named _terminal.app_, it is decent
but I use _iterm2_, it has a dropdown window and is easier to customize. 


Den kan installeres med
{% highlight bash %}
    $ brew cask install iterm2
{% endhighlight %}
