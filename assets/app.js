/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// import "./js/vendor/modernizr-2.6.2-respond-1.1.0.min.js";
require('modernizr');
require('respond');

import "./js/plugins.js";
import "./js/main.js";
// require('font-awesome/css/font-awesome.css');

// any CSS you import will output into a single css file (app.css in this case)
// SCSS files can be compiled here the same way
import "./css/normalize-and-boilerplate.css";
// import "./css/flexslider.css";
require('flexslider');
import "./css/style.css";
// import "./css/slider.css";



// start the Stimulus application
import "./bootstrap";
