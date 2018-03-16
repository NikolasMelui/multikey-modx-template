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
$ Gitify package:install --all
```

Now build the project installation:
```
$ Gitify build --force
```

After that use this sh script to add necessary rules for files and folders:
```
$ sh rules.sh
```

### Quick Start

Use npm to install frontend dependencies and run browserSync and watchers to realy 'reactive' development:
```
$ npm i
$ npm run dev
```

... and this command  is needed to create a minified frontend files:
```
$ npm run prod
```

### Development

Want to contribute? Great!
This is an opensource project. All contributions are welcome. Make a fork and go on!

| Todos | Status |
| ------ | ------ |
| es6 | - |
| Patterns | - |
| Webpack | - |
| ESLint | - |
| Mocha | - |
| CI\CD | - |
| SFTP\rsync | - |
| Docker | - |
| Kubernates | - |

License
----
MIT License

Copyright (c) 2018 NikolasMelui

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.

**From developers 2 developers.**
[NikolasMelui][nikolasmelui]
[RinatDav][rinatdav]

[//]: # (These are reference links used in the body of this note and get stripped out when the markdown processor does its job. There is no need to format nicely because it shouldn't be seen. Thanks SO - http://stackoverflow.com/questions/4823468/store-comments-in-markdown-syntax)
   [nikolasmelui]: <https://github.com/NikolasMelui>
   [rinatdav]: <https://github.com/RinatDav>
   [gitify]: <http://modmore.github.io/Gitify/>
   [apache]: <https://httpd.apache.org/download.cgi>
   [nginx]: <https://nginx.ru/ru/download.html>
   [php]: <http://php.net/downloads.php>
   [mysql]: <https://www.mysql.com/downloads/>
   [nodejs]: <http://nodejs.org>
