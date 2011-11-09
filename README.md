Smarty plugin jsEmbed
---------------------

A simple smarty plugin to improve front-end performance by embedding in-page JS rather than in an external file when the file is too small.

Usage:

``` html
{jsEmbed src="/js/main.js" threshold="15000"}
```

The threshold optional, with a default value of 10000. If the file weights less than "threshold" bytes, then it will be embedded in-page. If it weights more, the file is left external.

Particularly efficient when used along with [assetic-smarty](https://github.com/pjparra/assetic-smarty)
