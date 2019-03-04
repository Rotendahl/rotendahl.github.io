---
title: Terminal configuration
date: 2019-02-23 00:00:00 Z
tags: [blog, productivity, jekyll]
catagories: [guide, shell, setup]
layout: post
excerpt: Possibly the best terminal setup in the world.
feature: assets/img/terminal/terminal.png
comments: true
---

Every time I've been a tutor I have given a short introduction to the shell, I
was asked if I would write a short guide to how my terminal is configured. I
won't touch on how to actually use the terminal since there already exists a
bunch of excellent guides out there, here is a short list of the some of them:

* [Codecademy](https://www.codecademy.com/learn/learn-the-command-line) A short
guide that covers the basics of the command line, it does not require any prior
knowledge.
* [Learn it the hard way](https://learnpythonthehardway.org/book/appendixa.html)
As the name implies it does not hold your hand, personally I think this
approach is more fun.
* [Over the wire](http://overthewire.org/wargames/bandit/)
A hard guide, it tasks you with using the terminal to find passwords on
servers. It's challenging but extremely fun and satisfying, if you have patience
and some experience I recommend this guide.


The configuration guide is meant for macs, but should also work on linux
systems. The guide starts with some mac specific stuff, so linux users just jump
to [section 3](#section3). (Windows uses, see [link][joke])


### 1. Step: Install Xcode (Mac only)
Xcode is apple's development environment it has an IDE and a series of command
line utilities that are needed. It's free and can be installed by opening the
terminal app and typing:
{% highlight bash %}
    $ xcode-select --install
{% endhighlight %}
It might take a while, so go get some of the beverage of your choice.

### 2. Step: Getting a package manager
We still need to install several more utilities and the first is a package
manager. A package manager is like an "app store" for your shell, it can get
programming languages, utilities, and libraries. Each linux distribution comes
with a built in package manager, Ubuntu comes with `apt-get`, so if you want to
install python you simply type:
{% highlight bash %}
    $ sudo apt-get install python # ubuntu only
{% endhighlight %}

Apple has not made a package manager, but there exists options for the for mac.
Each has their own pros and cons, I prefer [homebrew](http://brew.sh).
Here is a quick pros and cons [list][pro-con-list] of the three most popular package
managers for the curios.

You can install homebrew by running this command:
{% highlight bash %}
    $ /usr/bin/ruby -e "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/master/install)"
{% endhighlight %}

Below is some examples of basic homebrew usage
{% highlight bash %}
    $ brew install mono # Installs mono
    $ brew search node # Searches after all packages that has node in its name
    $ brew update # Updates brews list of packages
    $ brew upgrade # Upgrades all installed packages to their newest version
    $ brew doctor # Built in troubleshooting, if you ever have problems run this
{% endhighlight %}

We can use `brew install` to get a bunch of terminal utilities, but brew has
an extra trick up its sleeve. Homebrew can "tap" repos that provide extra
functionality [Caskroom](https://caskroom.github.io) is an example of this.

{% highlight bash %}
    $ brew tap caskroom/cask
{% endhighlight %}
This allows us to install GUI apps from the command line.
Instead of searching google for the `.dmg` file, installing and cleaning up we
can run:
{% highlight bash %}
    $ brew cask install google-chrome steam skype
{% endhighlight %}
It can be confusing when you should use `brew cask install` vs `brew
install`. A rule of thumb is to use _cask_ if an app has a graphical interface.


## Terminal emulator
MacOS has a built in terminal appropriately named _terminal.app_, it is decent
but I prefer _iterm2_, it has a dropdown window and is easier to customize.
We can use homebrew to install it
{% highlight bash %}
    $ brew cask install iterm2
{% endhighlight %}

Iterm has a bunch of settings for you to customize, open the app's
preferences and peruse the options. I recommend activating a _hot key window_
(You can find the setting under the keys window).
<figure>
    <a href="/assets/img/terminal/hotkey.png">
	<img src="/assets/img/terminal/hotkey.png">
    </a>
	<figcaption>How awesome is this?</figcaption>
</figure>

Iterm has an option to load a configuration from an url, If you want my setup
you can get set it in this [gist][iterm-gist]. Once Iterm is set up you can
access the hot key window with a user defined short cut I use
<kbd>alt</kbd><kbd>t</kbd>.


### Step 3: Oh my zsh!
<a name="section3"></a>

{: .notice}
Mac specific part over, welcome back linux people!


Bash is the most common shell, and is most likely what your using now and what
you'll encounter on every SSH connection you're going to make. I recommend using
the awesome [oh-my-zsh][oh-zsh] framework for _zsh_.
To install the shell run the following command:
{% highlight bash %}    
    sh -c "$(curl -fsSL https://raw.github.com/robbyrussell/oh-my-zsh/master/tools/install.sh)"
{% endhighlight %}
Enter your password in order to change shell, and enjoy the first step towards
an awesome shell. Some of the benefits are of oh-my-zsh are presented in gif
form below
<figure>
    <h4>Kickass autocompletion!</h4>
	<a href="/assets/img/terminal/autocomplete.gif">
        <img src="/assets/img/terminal/autocomplete.gif">
    </a>
	<figcaption>Just pres <kbd>tab</kbd> to get suggetions and cycle through
    them</figcaption>
</figure>
<figure>
    <h4>Command specific history</h4>
	<a href="/assets/img/terminal/commandHistory.gif">
        <img src="/assets/img/terminal/commandHistory.gif">
    </a>
	<figcaption>By pressing<kbd>↑</kbd> you will go back through you command
    history, but by pressing up after typing you will only go through commands
    that has the same prefix. In the example above we first cycle through
    any git commands, and after that only commits.</figcaption>
</figure>
One of the down sides with _zsh_ as opposed to bash is that the added complexity
can slow down the shell, especially if you are navigating a large git repo.
Remember that you can always start a bash shell by typing `bash`, use this to
test for portability of your scripts and for the rare occasion when zsh is to
slow.


#### Configuration
To customize and configure oh-my-zsh a _dotfile_ is used. A dotfile is a hidden
file, hidden in the sense that you have to type `ls -a` to see it, that is
read as the first thing when opening a new shell. The file is located in your
home directory and is called `.zshrc`. The file is just a series of shell
commands, here you can place aliases, plugins, themes, and functions.
I'm not going to go into two much detail of what all the options mean but i
suggest taking a look at the [plugins list][plugins], the _extract_ and _wd_
plugins are awesome.

#### Customize
There are three main things you can customize:
* **Emulator color theme:**. These are the colors of you emulator, how you
customize them depend on the emulator you're using. If you're using iterm
some nice themes can be found [here](https://iterm2colorschemes.com)
<figure>
	<a href="/assets/img/terminal/themes.png">
        <img src="/assets/img/terminal/themes.png">
    </a>
	<figcaption>Examples of different color themes</figcaption>
</figure>
If you're not using iterm, just google it.
* **The shell theme:** This is the layout of the terminal. Some themes are
complex and gives you a bunch of information such as host name, current
directory, git status, virtual environment etc. The list here shows some
[nice themes][shellThemes] you can test the theme out by changing the
`theme` variable in your `.zshrc` file and reloading the shell with
`source .zshrc`.
* **The font:** Having a nice mono spaced font is essential and most likley
what you are used to. A font can also support _powerlines_ which makes themes
such as [bulletTrain][bulletTrain] possible.
<figure>
    <img src="https://camo.githubusercontent.com/c5b0c78df1c3ca27bb2c5577114a92018bbdbee0/687474703a2f2f7261772e6769746875622e636f6d2f6361696f676f6e64696d2f62756c6c65742d747261696e2d6f682d6d792d7a73682d7468656d652f6d61737465722f696d672f707265766965772e676966">
    <figcaption><a href="https://github.com/caiogondim/bullet-train.zsh"
    title="The bullet train theme with a powerline font">The bullet train theme
    with a powerline font</a>.</figcaption>
</figure>
Follow the installtion guide in the bullet train repo or pick one of the
[powerline fonts][powerlineFont] and set the theme to agnoster if you want the
theme from above.

### Useful terminal utilities
The last thing I would like to show you is a list of clever utilities that makes
using the terminal a more pleasant experience.

* **[bat](https://github.com/sharkdp/bat):** Can be installed with
`brew install bat` for mac people or `sudo apt-get install bat` for linux peeps.
The utility is meant as a `cat` and `less` replacement it provides syntax
highlighting when outputting to standard our but, degrades gracefully to cat
when piped.

* **[cheat](https://github.com/cheat/cheat):** If you type `cheat ls` it will
show the most common uses for `ls` with a short description. Perfect for when
you now the command but don't want to search through _man_ pages to find the
proper flags.

* **[jq](https://stedolan.github.io/jq/):** A _json_ formatter that makes
dealing with json data in the shell a joy. It has filtering, pretty printing,
and is easy to use.

* **[prettier][prettier]:** When you encounter ugly code, fire this off. It
formats and cleans javacript and html out of the box, but has official
plugins for python.

* **[colurls][colurls]:** A replacement for `ls` that provides a better color
scheme, git info, filetype info. It's a ruby gem, so read the installtion
part of its' readme.

* **[surge](http://surge.sh)**: Want to quickly get some info up on a sharable url?
Then this is for you.

* **[youtube-dl][youtube-dl]:** Utility to download and convert youtube videos.
Good for if you want to grab some videos for offline viewing or download youtube
only songs.

* **[fortune][fortune]:** A small joke utility that gives you a fortune,
combines perfectly with the two utilities [cowsay][cowsay] and [lolcat][lolcat].
Install all three and place the command `fortune -os | cowsay | lolcat` at the
bottom of your `.zshrc` for maximum dankness.



----
That's it, Enjoy your new maxed out terminal!
If you have questions or run into problems write a comment below, and I might
get back to you.






[pkg-cmp]: https://apple.stackexchange.com/questions/32724/what-are-pros-and-cons-for-macports-fink-and-homebrew
[pro-con-list]: https://apple.stackexchange.com/questions/32724/what-are-pros-and-cons-for-macports-fink-and-homebrew
[iterm-gist]: https://gist.github.com/Rotendahl/46aa382231ee80cd58bcf8d303747188
[oh-zsh]: https://ohmyz.sh
[plugins]: https://github.com/robbyrussell/oh-my-zsh/wiki/Plugins
[shellThemes]: https://github.com/robbyrussell/oh-my-zsh/wiki/Themes
[bulletTrain]: https://github.com/caiogondim/bullet-train.zsh
[fortune]: https://www.ibiblio.org/pub/linux/games/amusements/fortune/!INDEX.html
[cowsay]: https://github.com/tnalpgge/rank-amateur-cowsay
[lolcat]: https://github.com/busyloop/lolcat
[youtube-dl]: https://rg3.github.io/youtube-dl/
[colurls]: https://github.com/athityakumar/colorls
[prettier]: https://github.com/prettier/prettier
[joke]: http://www.lmgtfy.com/?q=how+to+install+linux%3F
[powerlineFont]: https://github.com/powerline/fonts
