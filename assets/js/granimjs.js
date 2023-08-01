var granimInstance = new Granim({
    element: '#canvas-interactive',
    name: 'interactive-gradient',
    elToSetClassOn: '.canvas-interactive-wrapper',
    direction: 'diagonal',
    isPausedWhenNotInView: true,
    stateTransitionSpeed: 500,
    states: {
        "default-state": {
            gradients: [
                ['#9D50BB', '#6E48AA'],
                ['#4776E6', '#8E54E9']
            ],
            transitionSpeed: 10000
        },
        "violet-state": {
            gradients: [
                ['#FF4E50', '#F9D423']
            ],
            transitionSpeed: 10000
        },
        "orange-state": {
            gradients: [['#FF4E50', '#F9D423']],
            loop: false
        }
    }
});


const defaultStateCta = document.getElementById('default-state-cta');
const violetStateCta = document.getElementById('violet-state-cta');
const orangeStateCta = document.getElementById('orange-state-cta');


defaultStateCta.addEventListener('click', function (event) {
    event.preventDefault();
    granimInstance.changeState('default-state');
    setClass(defaultStateCta);
});

violetStateCta.addEventListener('click', function (event) {
    event.preventDefault();
    granimInstance.changeState('violet-state');
    setClass(violetStateCta);
});

orangeStateCta.addEventListener('click', function (event) {
    event.preventDefault();
    granimInstance.changeState('orange-state');
    setClass(orangeStateCta);
});

function setClass(element) {
    const anchorElements = document.querySelectorAll('.canvas-interactive-wrapper a');
    anchorElements.forEach(anchorElement => {
        anchorElement.classList.remove('active');
    });

    element.classList.add('active');
}