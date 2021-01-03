'use strict';

const fractal = module.exports = require('@frctl/fractal').create();
const twigAdapter = require('@frctl/twig')();

fractal.set('project.title', 'eida.st component library');

fractal.components.set('path', __dirname + '/src/components');
fractal.components.set('engine', twigAdapter);
fractal.components.set('ext', '.twig');

fractal.docs.set('path', __dirname + '/src/docs');
