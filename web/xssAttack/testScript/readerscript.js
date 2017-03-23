var system = require('system'),
  fileName;
var fs = require('fs');
if (system.args.length === 1) {
  console.log('Usage: readerscript.js <some URL>');
  phantom.exit();
}
fileName = system.args[1];

openMockPage(fileName)

function openMockPage(webPage){
  var page = require('webpage').create()
  phantom.addCookie({
    'name'     : 'CookieMonstersFlag',
    'value'    : 'CookieMonster`s flag is 1234567890',
    'domain'   : 'ec2-34-207-121-76.compute-1.amazonaws.com',
    'path'     : '/',
    'secure'   : false,
  });
  page.onConsoleMessage = function(msg, lineNum, sourceId) {
    console.log(msg);
  };
  page.open(webPage, function(status) {
    phantom.exit();
  });
}
