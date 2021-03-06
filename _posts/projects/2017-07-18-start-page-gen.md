---
layout: post
title: "Star Page generator"
date: 2017-07-18
project: true
excerpt: "A small utility to generate start pages"
tags: [projects, web, utility]
feature: assets/img/startpage.png
comments: true
---
An example can be found here [rotendahl.dk/start](http://rotendahl.dk/start)

A small utility to generate responsive start pages for you phone, laptop, etc.

Most browsers offers a grid that shows you the pages you visit the most on
startup. It's a useful feature but it has some problems.

* It does not sync between devices
* If you use different browsers at home and at work they look different.
* Hard to manage and get the right name and logo.

The utility is made in python 3, it uses the [jinja](http://jinja.pocoo.org)
template language, which can be installed with `pip3 install jinja`.

The links are specified in `links.txt` and has the following syntax.
`* Name -> url <- Logo`

The name and logo are optional, and are meant for sites where you want a shorter
name or a different logo. The logos are taken from
[clearbit.com/logo](https://clearbit.com/logo) if they don't have the logo it can be
manually specified. See the [links][linksFile] file for examples.

Once the links has been specified you run `python generator.py` which produces
a file called `start.html` that contains your start page.

If you want a different color scheme change the CSS in template.html and run
the generator again.

The code can be found on [github](https://github.com/Rotendahl/StartPageGenerator)


[linksFile]: https://github.com/Rotendahl/StartPageGenerator/blob/master/links.txt
