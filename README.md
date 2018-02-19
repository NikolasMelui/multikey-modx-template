Multikey Modx Template
======
Multikey Modx Template powered by [NikolasMelui][nikolasmelui] and [RinatDav][rinatdav] for Multikey Studio.

# Important!

You need to install [Gitify][gitify] first.

You also need:
  - [Apache][apache], [Nginx][nginx] or another web server
  - [PHP][php] v5+ and Composer
  - [MySQL][mysql]
  - [Node.js][nodejs] v7+ and NPM

You can think this is useless template with old technologies and MODX is bad and dead. Ok.
__

> Go and fu** yourself. J. Stat.

## Installation

First install [Gitify][gitify]:
```
$ git clone https://github.com/modmore/Gitify.git Gitify
$ cd Gitify
$ composer install
$ chmod +x Gitify
```

If there is no unzip command installed in your system:
```
$ sudo apt-get install unzip
```

Clone the template to your local mashine:
```
$ git clone https://github.com/NikolasMelui/multikey-modx-template.git
```
Install the latest MODX and all packages:
```
$ Gitify modx:install
$ Gitify packages:install --all
```

Now build the project installation:
```
$ Gitify build --force
```

You can ```chmod 777``` on all files you need if you have problems with permissions after build the project.

### Quick Start

Use npm to install frontend dependencies and run browserSync and watchers to realy 'reactive' development:
```
$ npm i
$ npm run dev
```

You can use this command to create a production minified files:
```
$ npm run prod
```

### Development

Want to contribute? Great!
This is an opensource project. All contributions are welcome. Make a fork and go on!

| Todos | Status |
| ------ | ------ |
| es6 | - |
| Webpack | - |
| ESLint | - |
| Mocha | - |
| CI\CD | - |
| Docker | - |
| Kubernates | - |

License
----
Apache


**From developers 2 developers.**
[NikolasMelui][https://github.com/NikolasMelui]
[RinatDav][https://github.com/RinatDav]

[//]: # (These are reference links used in the body of this note and get stripped out when the markdown processor does its job. There is no need to format nicely because it shouldn't be seen. Thanks SO - http://stackoverflow.com/questions/4823468/store-comments-in-markdown-syntax)
   [nikolasmelui]:[]
   [rinatdav]:[]
   [gitify]:[http://modmore.github.io/Gitify/]
   [apache]: [https://httpd.apache.org/download.cgi]
   [nginx]: [https://nginx.ru/ru/download.html]
   [php]: [http://php.net/downloads.php]
   [mysql]:[https://www.mysql.com/downloads/]
   [nodejs]: <http://nodejs.org>
