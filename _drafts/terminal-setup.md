---
title: Terminal opsætning
date: 2017-07-15 00:00:00 Z
draft: true
tags:
- terminal
- guides
- opsætning
layout: post
excerpt: Hvordan man laver en ninja terminal på mac.
feature: assets/terminal.png
comments: true
---

Da jeg var rusvejlder i sommers holdte jeg et oplæg om terminalen på Mac og
Linux, jeg lovede så at skrive en guide om hvordan jeg havde sat min terminal
op (Dette er så en forsinket udfyldelse af det løfte).

Guiden er ment til MacOS men mange af tingene virker også på Linux.

Jeg vil ikke komme ind på hvordan terminalen bruges da der allerede findes
mange gode guides til dette på netter. Her er en liste over gode guides.
* [Codecademy](https://www.codecademy.com/learn/learn-the-command-line) En
grundlæggende guide til hvor man bliver holdt meget i hånden mens man kommer
rundt om de basale kommandoer.
* [Learn it the hard way](https://learnpythonthehardway.org/book/appendixa.html)
som navnet antyder så bliver man ikke holdt i hånden her men det er efter min
mening sjovere end Codecademy.
* [Over the wire](http://overthewire.org/wargames/bandit/) Det her en den
sværeste men helt klart også den sjoveste. Ligemeget hvad din erfaring er kommer
du til at lære noget af den.

### Første trin - Installer Xcode
Xcode er apples udvikler miljø til MacOS og iOS, derudover kommer det også med
nogle terminal programmer som vi skal bruge i guiden.
Det er gratis og kan hentes her:
[Xcode](https://itunes.apple.com/dk/app/xcode/id497799835?mt=12)


### Andet trin - En package manager.
I løbet af denne guide skal vi installere en del forskellige programmer, i
stedet for at hente og installere via browseren gør vi det via en såkaldt
_package manger_. En package manager er lidt som den app store man kender fra
sin mobil.

Linux kommer med sin egen package manager, ønsker man f.eks at installere
_python_ på ubuntu kan det gøres via denne kommando.
{% highlight bash %}
    $ sudo apt-get install python
{% endhighlight %}
MacOS kommer ikke med en package manger så vi skal installere en istedet,
der er to at vælge i mellem [Homebrew](http://brew.sh) og
[Macports](https://www.macports.org).

Der er fordele og ulemper ved begge, jeg bruger selv homebrew men Macports er
også ganske udmærket.

Installer Homebrew ved at køre:
{% highlight bash %}
    $ /usr/bin/ruby -e "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/master/install)"
{% endhighlight %}

Homebrew kan rigtig mange ting og det er værd at sætte sig ind i hele
opsætningen når man engang har tid. I mellemtiden så er her en kort guide.
{% highlight bash %}
    $ brew install mono # Installerer mono
    $ brew search node # Søger efter pakker der indeholder "node"
    $ brew update # Opdaterer homebrews liste af programmer
    $ brew upgrade # Opdaterer alle programmer brew har hentet
    $ brew doctor # Brew kan selv fortælle hvad der skal gøres hvis den ikke virker
{% endhighlight %}

Gennem "brew install" kan vi nu hente en masse programmer til terminalen, men
brew er endnu sejere end det. Vi kan "tappe" deres såkaldte
[Caskroom](https://caskroom.github.io) via kommandoen.
{% highlight bash %}
    $ brew tap caskroom/cask
{% endhighlight %}
Nu kan vi hente GUI programmer med brew, f.eks kan vi skrive
{% highlight bash %}
    $ brew cask install google-chrome
{% endhighlight %}
I starten kan det godt være lidt forvirrende hvornår det er "brew install" og
"brew cask install" der skal bruges. Som tommelfingerregel kan man huske at
cask er til ting der har et grafisk interface.


## Terminal emulator
MacOS kommer med en indbygget terminal emulator de passende har navngivet
_terminal.app_, istedet for den bruger jeg _iterm2_ da den understøtter en
dropdown terminal.

Den kan installeres med
{% highlight bash %}
    $ brew cask install iterm2
{% endhighlight %}
