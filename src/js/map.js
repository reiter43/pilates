ymaps.ready(init);
function init(){ 
    // Создание карты.    
    var myMap = new ymaps.Map("map", {               
        center: [45.43276537, 40.56990362], // Координаты центра карты.Порядок по умолчанию: «широта, долгота».         
        zoom: 17 // Уровень масштабирования. Допустимые значения: от 0 (весь мир) до 19.
    });


    //Отключение поведений
    myMap.behaviors.disable([
        'scrollZoom' // Отключает масштабирование карты при скроле
    ]);


    //Удаление элементов управления
    myMap.controls.remove('trafficControl'); // Пробки 
    myMap.controls.remove('typeSelector'); // Слои
    myMap.controls.remove('geolocationControl'); // Геолокация
    myMap.controls.remove('searchControl'); // Окно поиска
   
    
    // Создание метки
    var myPlacemark = new ymaps.Placemark([45.43339747, 40.57067506],{
        balloonContentHeader: '<h5>"Студия пилатеса"</h5>',
        balloonContentBody: 'Всегда рады вас видеть у нас',
        hintContent: 'Мы тут',
      },
        // Опции для изображения собственной метки
       {            
        iconLayout: 'default#image',// Необходимо указать данный тип макета.        
        iconImageHref: '../img/images/placeholder.png',// Своё изображение иконки метки.        
        iconImageSize: [24, 35],// Размеры метки.        
        iconImageOffset: [0, -15]// Смещение левого верхнего угла иконки относительно её "ножки" (точки привязки).
      })
        // Вывод метки
    myMap.geoObjects.add(myPlacemark);      
}