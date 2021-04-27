new Vivus('animation',
    {duration: 100, type:'oneByOne'},
    after
);

function after(){
    fillPath('color-1','white')
    fillPath('color-2','white')
    fillPath('color-3','white')
    fillPath('color-4','white')
    fillPath('color-5','white')
    fillPath('color-6','white')
    fillPath('color-7','white')
    fillPath('color-8','white')
    fillPath('color-9','white')
}
function fillPath(classname, color) {
    const paths = document.querySelectorAll(`#animation .${classname}`);
    for (path of paths){
        path.style.fill = `${color}`;
}
}
