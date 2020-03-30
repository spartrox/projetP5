        
        $(function(){
        	
        	let apiKey = "789c8346a5c65a2ee6fce98d39e2ba70";
        	let baseUrl = 'http://api.openweathermap.org/data/2.5/weather?APPID='+ apiKey + '&units=metric&lang=fr';

            $('#weather button').click(function(e){
                e.preventDefault()

                let city = $('#city');
                let cityValue = city.val();
                let params = {
                	url: baseUrl + '&q=' + cityValue,
                	method: 'GET'
                };

                fetch(params.url).then((response) => {
                    console.log(response);
                        return response.json();
                })
                .then((data) => {
                   
                    //Afficher les infos
                    $('.card').removeClass('d-none');

                    //Erreur
                    city.removeClass('is-invalid');
                    $('.card').show();

                    //Titre
                    $('.card-title').text(data.name);

                    //Description
                    $('.description-weather').text(data.weather[0].description);

                    //Température
                    let celsius = "°";
                    let temp = Math.round(data.main.temp) + (celsius);
                    let tempMax = Math.round(data.main.temp_max) + (celsius);
                    let tempMin = Math.round(data.main.temp_min) + (celsius);
                    let humidity = Math.round(data.main.humidity) + ('%');

                    $('.temp-weather').text(temp);
                    $('.temp-max-weather').text(tempMax);
                    $('.temp-min-weather').text(tempMin);
                    $('.humidity').text(humidity);

                    //Image
                    let image = data.weather[0].icon;

                    $('.image-weather').attr('src','http://openweathermap.org/img/w/' + image + '.png');
                    $('.image-weather').attr('alt', data.sys.name);
                })

                .catch(function(err) {
                    $('.invalide-feedback');
                    city.addClass('is-invalid');
                    
                        
                });
            });
        
        });