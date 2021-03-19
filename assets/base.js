/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (base.css in this case)
import './styles/base.css';


// start the Stimulus application
import './bootstrap';

require('bootstrap/dist/css/bootstrap.css');
import bsCustomFileInput from 'bs-custom-file-input';

bsCustomFileInput.init();

