
ymaps.ready(init);
function init(){
    var map_root = document.getElementById("map__block");
    
    var locations = map_root.getAttribute("data-coordinates").split(',');
    var map_title = map_root.getAttribute("data-map-title");
    var map_body = map_root.getAttribute("data-map-body");
    var map_footer = map_root.getAttribute("data-map-footer");

    var officeMap = new ymaps.Map("map__block", {
        center: locations,
        zoom: 16,
        controls: [],
    });
    
    var officePlaceMark = new ymaps.Placemark(locations, {
            balloonContentHeader: map_title,
            balloonContentBody: map_body,
            balloonContentFooter: map_footer,
            hintContent: map_title
        }, {
            overlayFactory: 'default#interactiveGraphics',
            iconLayout: 'default#image',
            iconImageHref: '/img/sprite.svg#logo',
            iconImageSize: [60, 60],
            iconImageOffset: [-30, -70],
            iconCaption: map_title
        }
    );			 	
        
    officeMap.geoObjects.add( officePlaceMark );
    officeMap.behaviors.disable('scrollZoom');
}		