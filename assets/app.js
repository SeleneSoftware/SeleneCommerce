/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */


// any CSS you import will output into a single css file (app.css in this case)
// SCSS files can be compiled here the same way
// import "./css/normalize-and-boilerplate.css";

import Dropkick from 'dropkickjs';
import Shuffle from 'shufflejs';

import "./js/includes/searchToggle.js";
import "./js/includes/styledDropdown.js";
import "./js/includes/mainNav.js";
import "./js/includes/slider.js";
// import "./js/includes/shuffleJS.js";

import "./scss/styles.scss";


// start the Stimulus application
import "./bootstrap";
