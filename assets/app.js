// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// start the Stimulus application
import './bootstrap';

import noUiSlider from 'nouislider';
import 'nouislider/dist/nouislider.css';

const slider = document.getElementById('price-slider');

if(slider) {
  const min = document.getElementById('min');
  const max = document.getElementById('max');
  
   
  const range = noUiSlider.create(slider, {
    start: [min.value || parseInt(slider.dataset.min, 10), max.value || parseInt(slider.dataset.max, 10)],
    connect: true,
    step: 1,
    range: {
        'min': parseInt(slider.dataset.min, 10),
        'max': parseInt(slider.dataset.max, 10)
    }
})

range.on('slide', function(values, handle) {
    if(handle === 0) {
        min.value = Math.round(values[0]);
    }
    if(handle === 1) {
        max.value = Math.round(values[1]);
    }
})
}


