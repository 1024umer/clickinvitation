var mainApp = angular.module('mainApp', ['chart.js', 'ui-leaflet']);
mainApp.config(function ($locationProvider) {
	$locationProvider.html5Mode({
		enabled: true
	});
});

mainApp.directive('customValidation', function () {
	return {
		require: 'ngModel',
		link: function (scope, element, attrs, modelCtrl) {

			modelCtrl.$parsers.push(function (inputValue) {

				var transformedInput = inputValue.replace(/\B(?=(\d{3})+(?!\d))/g, ".") + " €";

				if (transformedInput != inputValue) {
					modelCtrl.$setViewValue(transformedInput);
					modelCtrl.$render();
				}

				return transformedInput;
			});
		}
	};
});

/*
|
|	GLOBAL CONTROLLER
|
*/
mainApp.controller('MainCtrl', function ($scope, $http, $window) {
	$scope.menumob = 0;

	if (sessionStorage.getItem("agenziaonoff") != null) $scope.agenziaon = parseInt(sessionStorage.getItem("agenziaonoff"));
	else { $scope.agenziaon = 0; sessionStorage.setItem('agenziaonoff', 0); }

	function getAgenziaonoff() {
		return sessionStorage.getItem('agenziaonoff');
	}

	$scope.$watch(getAgenziaonoff, function (newValue) {
		if (sessionStorage.getItem("agenziaonoff") != null) $scope.agenziaon = parseInt(sessionStorage.getItem("agenziaonoff"));
		else $scope.agenziaon = 0;
	});

	var version = "1.0";
	if (localStorage.getItem("version") != "2.0") {
		var acc = 0;
		if (localStorage.getItem("cookie") == '1') acc = 1;
		localStorage.clear();
		localStorage.setItem('version', '2.0');
		if (acc) {
			$scope.accepted = 1;
			localStorage.setItem('cookie', '1');
		}
	}

	if (localStorage.getItem("ref") === null) {
		localStorage.setItem('ref', document.referrer);
	}


	if (localStorage.getItem("cookie") === null) {
		$scope.accepted = 0;
	}
	else $scope.accepted = 1;

	$scope.accetta = function () {
		$scope.accepted = 1;
		localStorage.setItem('cookie', '1');
	}

	$window.onscroll = function () {
		$scope.$apply(function () { $scope.accepted = 1; })
		localStorage.setItem('cookie', '1');
	};


	if (localStorage.getItem("lastseen") != null) {
		$scope.lastseenhome = angular.fromJson(localStorage.getItem('lastseen'));

		$http({
			method: 'POST',
			url: '/lastseen',
			data: { ids: $scope.lastseenhome },
		}).then(function (response) {
			if (response.data) {
				$scope.lastseenadshome = response.data;
			}
		});
	}

	const urlParams = new URLSearchParams(window.location.search);
	const tiscaliref = urlParams.get('t');
	if (tiscaliref || sessionStorage.getItem('tiscali') == 1) {
		sessionStorage.setItem('tiscali', '1');
		$scope.tiscali = 1;
	}
	else {
		sessionStorage.setItem('tiscali', '0');
		$scope.tiscali = 0;
	}

	if (localStorage.getItem("ratamax") !== null) {
		$scope.ratamaxmenu = localStorage.getItem('ratamax');
	}

	$scope.ready = 1;



});





/*
|
|	FORM CONTROLLER
|
*/
mainApp.controller('FindformCtrl', function ($scope, $http, $window, $timeout, $filter, leafletData) {
	$scope.ready = 1;

	if (sessionStorage.getItem("agenziaonoff") != null) $scope.agenziaon = parseInt(sessionStorage.getItem("agenziaonoff"));
	else $scope.agenziaon = 0;

	$scope.agenziaonoff = function (idagency) {
		sessionStorage.setItem('agenziaonoff', $scope.agenziaon == 0 ? idagency : 0);
		$scope.count();
	}


	if (localStorage.getItem("fields") === null) {
		$http({
			method: 'POST',
			url: '/adsfields',
		}).then(function (response) {
			$scope.fields = response.data;
			angular.forEach($scope.fields, function (value, key) {
				$scope.fields[key].selected = 0;
			});
		});
	}
	else $scope.fields = angular.fromJson(localStorage.getItem('fields'));

	////console.log($scope.fields);

	if (localStorage.getItem("av") != null) {
		$scope.av = localStorage.getItem("av");
		$scope.cpr = parseInt(localStorage.getItem("cpr"));

		$scope.luogogeo = angular.fromJson(localStorage.getItem("luogogeo"));
		$scope.luogocercato = $scope.luogogeo.value;
	}
	else {
		$scope.av = 'v';
		$scope.cpr = 1;
		$scope.luogocercato = '';
		$scope.luogogeo = '';
	}
	$scope.ordinaper = '';


	if (localStorage.getItem("asta") != null) $scope.asta = parseInt(localStorage.getItem("asta")); else $scope.asta = '';
	if (localStorage.getItem("anticipo") != null) $scope.anticipo = localStorage.getItem("anticipo"); else $scope.anticipo = '';
	if (localStorage.getItem("ratamin") != null) $scope.ratamin = localStorage.getItem("ratamin"); else $scope.ratamin = '';
	if (localStorage.getItem("ratamax") != null && localStorage.getItem("ratamax") !== 'null') $scope.ratamax = localStorage.getItem("ratamax"); else $scope.ratamax = '';
	if (localStorage.getItem("prezzomin") != null) $scope.prezzomin = localStorage.getItem("prezzomin"); else $scope.prezzomin = '';
	if (localStorage.getItem("prezzomax") != null) $scope.prezzomax = localStorage.getItem("prezzomax"); else $scope.prezzomax = '';
	if (localStorage.getItem("metrimin") != null) $scope.metrimin = localStorage.getItem("metrimin"); else $scope.metrimin = '';
	if (localStorage.getItem("metrimax") != null) $scope.metrimax = localStorage.getItem("metrimax"); else $scope.metrimax = '';
	if (localStorage.getItem("duratamutuo") != null) $scope.duratamutuo = localStorage.getItem("duratamutuo"); else $scope.duratamutuo = '30';
	if (localStorage.getItem("finalita") != null) $scope.finalita = localStorage.getItem("finalita"); else $scope.finalita = 'qualsiasi';
	if (localStorage.getItem("tipotasso") != null) $scope.tipotasso = localStorage.getItem("tipotasso"); else $scope.tipotasso = 'fisso';
	if (localStorage.getItem("localimin") != null) $scope.localimin = localStorage.getItem("localimin"); else $scope.localimin = '';
	if (localStorage.getItem("localimax") != null) $scope.localimax = localStorage.getItem("localimax"); else $scope.localimax = '';
	if (localStorage.getItem("statoimmobile") != null) $scope.statoimmobile = localStorage.getItem("statoimmobile"); else $scope.statoimmobile = 'qualsiasi';
	if (localStorage.getItem("tipoproprieta") != null) $scope.tipoproprieta = localStorage.getItem("tipoproprieta"); else $scope.tipoproprieta = 'qualsiasi';
	if (localStorage.getItem("bagni") != null) $scope.bagni = localStorage.getItem("bagni"); else $scope.bagni = 'qualsiasi';
	if (localStorage.getItem("parcheggio") != null) $scope.parcheggio = localStorage.getItem("parcheggio"); else $scope.parcheggio = 'qualsiasi';
	if (localStorage.getItem("efficienza") != null) $scope.efficienza = localStorage.getItem("efficienza"); else $scope.efficienza = 'qualsiasi';
	if (localStorage.getItem("disabili") != null) $scope.disabili = parseInt(localStorage.getItem("disabili")); else $scope.disabili = '';
	if (localStorage.getItem("ascensore") != null) $scope.ascensore = parseInt(localStorage.getItem("ascensore")); else $scope.ascensore = '';
	if (localStorage.getItem("arredato") != null) $scope.arredato = parseInt(localStorage.getItem("arredato")); else $scope.arredato = '';
	if (localStorage.getItem("balcone") != null) $scope.balcone = parseInt(localStorage.getItem("balcone")); else $scope.balcone = '';
	if (localStorage.getItem("terrazzo") != null) $scope.terrazzo = parseInt(localStorage.getItem("terrazzo")); else $scope.terrazzo = '';
	if (localStorage.getItem("giardinop") != null) $scope.giardinop = parseInt(localStorage.getItem("giardinop")); else $scope.giardinop = '';
	if (localStorage.getItem("giardinoc") != null) $scope.giardinoc = parseInt(localStorage.getItem("giardinoc")); else $scope.giardinoc = '';
	if (localStorage.getItem("piscina") != null) $scope.piscina = parseInt(localStorage.getItem("piscina")); else $scope.piscina = '';
	if (localStorage.getItem("riscaldamentoa") != null) $scope.riscaldamentoa = parseInt(localStorage.getItem("riscaldamentoa")); else $scope.riscaldamentoa = '';
	if (localStorage.getItem("portineria") != null) $scope.portineria = parseInt(localStorage.getItem("portineria")); else $scope.portineria = '';
	if (localStorage.getItem("ordinaper") != null) $scope.ordinaper = localStorage.getItem("ordinaper"); else $scope.ordinaper = 'datadsc';
	if (localStorage.getItem("age") != null) $scope.age = localStorage.getItem("age"); else $scope.age = ' ';
	if (localStorage.getItem("sm") != null) $scope.sm = localStorage.getItem("sm"); else $scope.sm = ' ';
	if (localStorage.getItem("rm") != null) $scope.rm = localStorage.getItem("rm"); else $scope.rm = ' ';


	$scope.what = 0;
	$scope.yesn = 0;


	//calcolo rata

	$scope.$watchGroup(['age', 'sm', 'rm'], function (newValue, oldValue) {
		if ($scope.rm != ' ') {
			$scope.rm = $scope.rm.toString().replace(".", "").replace(".", "").replace(".", "").replace(" €", "");
			$scope.rmn = parseInt($scope.rm);
		}
		if ($scope.sm != ' ') {
			$scope.sm = $scope.sm.toString().replace(".", "").replace(".", "").replace(".", "").replace(" €", "");
			$scope.smn = parseInt($scope.sm);
		}
		if ($scope.age != ' ') {
			$scope.age = $scope.age.toString().replace(".", "").replace(".", "").replace(".", "").replace(" anni", "");
			$scope.agen = parseInt($scope.age);
		}

		if ($scope.rm != ' ' && $scope.sm != ' ') {
			var Ra = parseInt($scope.rm) * 13;
			var cap = (Ra / 12) - parseInt($scope.sm);
			var ratam = parseInt((cap / 100) * 35);
			if (ratam < 0) $scope.ratamax = 0;
			else if (!ratam) $scope.ratamax = 0;
			else $scope.ratamax = ratam;
		}

		if ($scope.rm != ' ') $scope.rm = $scope.rm.toString().replace(".", "").replace(".", "").replace(".", "").replace(/\B(?=(\d{3})+(?!\d))/g, ".");
		if ($scope.sm != ' ') $scope.sm = $scope.sm.toString().replace(".", "").replace(".", "").replace(".", "").replace(/\B(?=(\d{3})+(?!\d))/g, ".");
		if ($scope.ratamax) $scope.ratamax = $scope.ratamax.toString().replace(".", "").replace(".", "").replace(".", "").replace(/\B(?=(\d{3})+(?!\d))/g, ".");

		if ($scope.rm != ' ') $scope.rm = $scope.rm + " €";
		if ($scope.sm != ' ') $scope.sm = $scope.sm + " €";
		if ($scope.age != ' ') $scope.age = $scope.age + " anni";
	});




	$scope.cprChange = function () {
		if ($scope.cpr && $scope.av == 'a')
			$scope.av = 'v';
		$scope.count();
	}

	$scope.toggleCategory = function (category) {
		if (!category.selected)
			angular.forEach($scope.fields, function (value, key) {
				$scope.fields[key].selected = 0;
			});
		category.selected = !category.selected;
	}

	$scope.clickCat = function (category) {
		angular.forEach($scope.fields, function (value, key) {
			$scope.fields[key].choosed = 0;
			$scope.fields[key].hasone = 0;
		});
		category.hasone = 1;
		category.choosed = 1;
	}

	$scope.center = {
		lat: 35,
		lng: 0,
		zoom: 8
	};

	$scope.allZones = function () {
		angular.forEach($scope.geojson.data.features, function (value, key) {
			$scope.geojson.data.features[key].mystyle.fillOpacity = "0.4";
		});
	}

	$scope.clickwhere = function (geo) {
		$scope.luogo = 0;
		$scope.luogom = 0;
		$scope.checkAll = 1;
		$scope.luogocercato = geo.value;
		$scope.luogogeo = geo;
		if (geo.main_town == 1 && geo.type == 2) {
			$scope.expanded = 0;
			$scope.visualmap = 1;
			angular.extend($scope, {
				geojson: {
					data: JSON.parse(geo.geojson),
					style: function (feature) {
						return feature.mystyle;
					},
					onEachFeature: function (feature, layer) {
						layer.on('mouseover', function () {
							/*this.setStyle({
							  fillOpacity: 0.8
							});*/
							var tooltip = L.tooltip({ direction: 'right' }).setContent(feature.properties.name);
							this.bindTooltip(tooltip).openTooltip();
						});
						layer.on('mouseout', function () {
							/*this.setStyle({
							  fillOpacity: 0.4
							});*/
						});
						layer.on('click', function () {
							if (feature.mystyle.fillOpacity == "0.4") feature.mystyle.fillOpacity = "0.8";
							else feature.mystyle.fillOpacity = "0.4";
							$scope.checkAll = 0;
						});
					}
				}
			});

			leafletData.getMap().then(function (map) {

				$timeout(function () {
					map.invalidateSize();
				}, 10);

				$scope.center = {
					lat: geo.latitude,
					lng: geo.longitude - 0.09,
					zoom: 11
				};
			});
		}
		else {
			$scope.visualmap = 0;
			$scope.count();
		}

		////console.log(geo);
	}

	$scope.clickTip = function (tipology) {
		tipology.choosed = !tipology.choosed;

		if (tipology.choosed)
			angular.forEach($scope.fields, function (value, key) {
				if ($scope.fields[key].field_ads == 'id_category') {
					$scope.fields[key].choosed = 0;
					$scope.fields[key].hasone = 0;
				}
				if ($scope.fields[key].field_ads == 'id_category' && tipology.refer == $scope.fields[key].id_field)
					$scope.fields[key].hasone = 1;
				if ($scope.fields[key].field_ads == 'id_tipology' && $scope.fields[key].refer != tipology.refer)
					$scope.fields[key].choosed = 0;
			});
		else {
			var exist = 0;
			angular.forEach($scope.fields, function (value, key) {
				if ($scope.fields[key].choosed == 1) exist = 1;
			});

			if (!exist)
				angular.forEach($scope.fields, function (value, key) {
					if ($scope.fields[key].id_field == tipology.refer) {
						$scope.fields[key].choosed = 1;
						$scope.fields[key].hasone = 1;
					}
				});
		}

	}

	$scope.$watch('geojson', function (newValue, oldValue) {
		$scope.count();
	}, true);

	$scope.$watch('luogocercato', function (newValue, oldValue) {
		if (newValue != undefined)
			$http({
				method: 'POST',
				url: '/autocompletegeo',
				data: { geo: newValue },
			}).then(function (response) {
				$scope.geos = response.data;
			});
	});

	$scope.$watchGroup(['asta', 'anticipo', 'ratamin', 'ratamax', 'prezzomin', 'prezzomax', 'metrimin', 'metrimax', 'duratamutuo', 'finalita', 'tipotasso', 'localimin', 'localimax', 'statoimmobile', 'tipoproprieta', 'bagni', 'parcheggio', 'efficienza', 'disabili', 'ascensore', 'arredato', 'balcone', 'terrazzo', 'giardinop', 'giardinoc', 'piscina', 'riscaldamentoa', 'portineria', 'ordinaper', 'av'], function (newValue, oldValue) {
		if (newValue != oldValue) $scope.count();
	});

	$scope.$watch('fields', function (newValue, oldValue) {
		if (newValue != undefined) {
			var text = '';
			var categorychoosed = 0;

			angular.forEach($scope.fields, function (value, key) {

				if ($scope.fields[key]['choosed'] == 1 && $scope.fields[key]['field_ads'] == 'id_tipology') {
					angular.forEach($scope.fields, function (value2, key2) {
						if ($scope.fields[key2]['choosed'] == 1 && $scope.fields[key2]['field_ads'] == 'id_category' && $scope.fields[key]['refer'] == $scope.fields[key2]['id_field'])
							categorychoosed = 1;
					});

					if (categorychoosed == 0 && text == '') text = text + $scope.fields[key]['alias'];
					else if (categorychoosed == 0 && text != '') text = text + ' ,' + $scope.fields[key]['alias'];
					else categorychoosed = 0;
				}
				else if ($scope.fields[key]['choosed'] == 1 && $scope.fields[key]['field_ads'] == 'id_category') {
					if ($scope.fields[key]['choosed'] == 1 && text == '') text = text + $scope.fields[key]['alias'];
					else if ($scope.fields[key]['choosed'] == 1 && text != '') text = text + ' ,' + $scope.fields[key]['alias'];
				}

			});

			if (text.length > 17) text = text.substring(0, 17) + '...';
			$scope.searchtext = text;
			$scope.count();

		}

	}, true);



	$scope.addPoint = function ($event) {
		$scope.anticipo = $scope.anticipo.toString().replace(".", "").replace(".", "").replace(/\B(?=(\d{3})+(?!\d))/g, ".");
		$scope.ratamin = $scope.ratamin.toString().replace(".", "").replace(".", "").replace(/\B(?=(\d{3})+(?!\d))/g, ".");
		$scope.ratamax = $scope.ratamax.toString().replace(".", "").replace(".", "").replace(/\B(?=(\d{3})+(?!\d))/g, ".");
		$scope.prezzomin = $scope.prezzomin.toString().replace(".", "").replace(".", "").replace(/\B(?=(\d{3})+(?!\d))/g, ".");
		$scope.prezzomax = $scope.prezzomax.toString().replace(".", "").replace(".", "").replace(/\B(?=(\d{3})+(?!\d))/g, ".");
		$scope.metrimin = $scope.metrimin.toString().replace(".", "").replace(".", "").replace(/\B(?=(\d{3})+(?!\d))/g, ".");
		$scope.metrimax = $scope.metrimax.toString().replace(".", "").replace(".", "").replace(/\B(?=(\d{3})+(?!\d))/g, ".");
	}


	$scope.count = function () {
		$scope.filteredFields = [];
		$scope.filteredzones = [];
		var iscat = 0;
		angular.forEach($scope.fields, function (value, key) {
			if ($scope.fields[key].choosed == 1) {
				$scope.filteredFields.push($scope.fields[key].id_field);
				if ($scope.fields[key].field_ads == 'id_category') iscat = 1;
			}
		});

		if ($scope.geojson)
			angular.forEach($scope.geojson.data.features, function (value, key) {
				if ($scope.geojson.data.features[key].mystyle.fillOpacity == "0.8") {
					$scope.filteredzones.push(parseInt($scope.geojson.data.features[key].properties.id));
				}
			});


		$timeout(function () {
			$http({
				method: 'POST',
				url: '/count',
				data: {
					iscat: iscat,
					geo: $scope.luogogeo,
					fields: $scope.filteredFields,
					zones: $scope.filteredzones,
					av: $scope.av == 'v' ? 5 : 6,
					cpr: $scope.cpr,
					asta: $scope.asta,
					anticipo: $scope.anticipo,
					ratamin: $scope.ratamin,
					ratamax: $scope.ratamax,
					prezzomin: $scope.prezzomin,
					prezzomax: $scope.prezzomax,
					metrimin: $scope.metrimin,
					metrimax: $scope.metrimax,
					duratamutuo: $scope.duratamutuo,
					finalita: $scope.finalita,
					tipotasso: $scope.tipotasso,
					localimin: $scope.localimin,
					localimax: $scope.localimax,
					statoimmobile: $scope.statoimmobile,
					tipoproprieta: $scope.tipoproprieta,
					bagni: $scope.bagni,
					parcheggio: $scope.parcheggio,
					efficienza: $scope.efficienza,
					disabili: $scope.disabili,
					ascensore: $scope.ascensore,
					arredato: $scope.arredato,
					balcone: $scope.balcone,
					terrazzo: $scope.terrazzo,
					giardinop: $scope.giardinop,
					giardinoc: $scope.giardinoc,
					piscina: $scope.piscina,
					riscaldamentoa: $scope.riscaldamentoa,
					portineria: $scope.portineria,
					ordinaper: $scope.ordinaper,
					agenzia: sessionStorage.getItem("agenziaonoff")
				},
			}).then(function (response) {
				if (response.data) {
					$scope.yesn = 1;
					res = angular.fromJson(response.data);
					/*if(res[0]['prezzomin']!=0) $scope.prezzomin=res[0]['prezzomin'];
					if(res[0]['prezzomax']!=0) $scope.prezzomax=res[0]['prezzomax'];
					if(res[0]['ratamin']!=0) $scope.ratamin=res[0]['ratamin'];
					if(res[0]['ratamax']!=0) $scope.ratamax=res[0]['ratamax'];
					if(res[0]['anticipo']!=0) $scope.anticipo=res[0]['anticipo'];
					if(res[0]['metrimin']!=0) $scope.metrimin=res[0]['metrimin'];
					if(res[0]['metrimax']!=0) $scope.metrimax=res[0]['metrimax'];*/
					$scope.link = res[0]['link'];
					$scope.n = res[0]['count'];
				}
				else $scope.yesn = 0;

			});
		}, 10);
	}


	$scope.find = function () {
		localStorage.setItem('fields', angular.toJson($scope.fields));
		localStorage.setItem('av', $scope.av);
		localStorage.setItem('cpr', $scope.cpr);
		localStorage.setItem('luogogeo', angular.toJson($scope.luogogeo));
		localStorage.setItem('anticipo', $scope.anticipo);
		localStorage.setItem('asta', $scope.asta);
		localStorage.setItem('ratamin', $scope.ratamin);
		localStorage.setItem('ratamax', $scope.ratamax);
		localStorage.setItem('prezzomin', $scope.prezzomin);
		localStorage.setItem('prezzomax', $scope.prezzomax);
		localStorage.setItem('metrimin', $scope.metrimin);
		localStorage.setItem('metrimax', $scope.metrimax);
		localStorage.setItem('duratamutuo', $scope.duratamutuo);
		localStorage.setItem('finalita', $scope.finalita);
		localStorage.setItem('tipotasso', $scope.tipotasso);
		localStorage.setItem('localimin', $scope.localimin);
		localStorage.setItem('localimax', $scope.localimax);
		localStorage.setItem('statoimmobile', $scope.statoimmobile);
		localStorage.setItem('tipoproprieta', $scope.tipoproprieta);
		localStorage.setItem('bagni', $scope.bagni);
		localStorage.setItem('parcheggio', $scope.parcheggio);
		localStorage.setItem('efficienza', $scope.efficienza);
		localStorage.setItem('disabili', $scope.disabili);
		localStorage.setItem('ascensore', $scope.ascensore);
		localStorage.setItem('arredato', $scope.arredato);
		localStorage.setItem('balcone', $scope.balcone);
		localStorage.setItem('terrazzo', $scope.terrazzo);
		localStorage.setItem('giardinop', $scope.giardinop);
		localStorage.setItem('giardinoc', $scope.giardinoc);
		localStorage.setItem('piscina', $scope.piscina);
		localStorage.setItem('riscaldamentoa', $scope.riscaldamentoa);
		localStorage.setItem('portineria', $scope.portineria);
		localStorage.setItem('ordinaper', $scope.ordinaper);
		localStorage.setItem('lastlink', $scope.link);
		if ($scope.age != ' ') localStorage.setItem('age', $scope.age);
		if ($scope.sm != ' ') localStorage.setItem('sm', $scope.sm);
		if ($scope.rm != ' ') localStorage.setItem('rm', $scope.rm);

		$window.open($scope.link, "_self");
	}


	$scope.countandfind = function () {
		$scope.filteredFields = [];
		$scope.filteredzones = [];
		var iscat = 0;
		angular.forEach($scope.fields, function (value, key) {
			if ($scope.fields[key].choosed == 1) {
				$scope.filteredFields.push($scope.fields[key].id_field);
				if ($scope.fields[key].field_ads == 'id_category') iscat = 1;
			}
		});

		if ($scope.geojson)
			angular.forEach($scope.geojson.data.features, function (value, key) {
				if ($scope.geojson.data.features[key].mystyle.fillOpacity == "0.8") {
					$scope.filteredzones.push(parseInt($scope.geojson.data.features[key].properties.id));
				}
			});


		$timeout(function () {
			$http({
				method: 'POST',
				url: '/count',
				data: {
					iscat: iscat,
					geo: $scope.luogogeo,
					fields: $scope.filteredFields,
					zones: $scope.filteredzones,
					av: $scope.av == 'v' ? 5 : 6,
					cpr: $scope.cpr,
					asta: $scope.asta,
					anticipo: $scope.anticipo,
					ratamin: $scope.ratamin,
					ratamax: $scope.ratamax,
					prezzomin: $scope.prezzomin,
					prezzomax: $scope.prezzomax,
					metrimin: $scope.metrimin,
					metrimax: $scope.metrimax,
					duratamutuo: $scope.duratamutuo,
					finalita: $scope.finalita,
					tipotasso: $scope.tipotasso,
					localimin: $scope.localimin,
					localimax: $scope.localimax,
					statoimmobile: $scope.statoimmobile,
					tipoproprieta: $scope.tipoproprieta,
					bagni: $scope.bagni,
					parcheggio: $scope.parcheggio,
					efficienza: $scope.efficienza,
					disabili: $scope.disabili,
					ascensore: $scope.ascensore,
					arredato: $scope.arredato,
					balcone: $scope.balcone,
					terrazzo: $scope.terrazzo,
					giardinop: $scope.giardinop,
					giardinoc: $scope.giardinoc,
					piscina: $scope.piscina,
					riscaldamentoa: $scope.riscaldamentoa,
					portineria: $scope.portineria,
					ordinaper: $scope.ordinaper,
					agenzia: sessionStorage.getItem("agenziaonoff")
				},
			}).then(function (response) {
				if (response.data) {
					$scope.yesn = 1;
					res = angular.fromJson(response.data);
					/*if(res[0]['prezzomin']!=0) $scope.prezzomin=res[0]['prezzomin'];
					if(res[0]['prezzomax']!=0) $scope.prezzomax=res[0]['prezzomax'];
					if(res[0]['ratamin']!=0) $scope.ratamin=res[0]['ratamin'];
					if(res[0]['ratamax']!=0) $scope.ratamax=res[0]['ratamax'];
					if(res[0]['anticipo']!=0) $scope.anticipo=res[0]['anticipo'];
					if(res[0]['metrimin']!=0) $scope.metrimin=res[0]['metrimin'];
					if(res[0]['metrimax']!=0) $scope.metrimax=res[0]['metrimax'];*/
					$scope.link = res[0]['link'];
					$scope.n = res[0]['count'];
				}
				else $scope.yesn = 0;

				localStorage.setItem('fields', angular.toJson($scope.fields));
				localStorage.setItem('av', $scope.av);
				localStorage.setItem('cpr', $scope.cpr);
				localStorage.setItem('luogogeo', angular.toJson($scope.luogogeo));
				localStorage.setItem('anticipo', $scope.anticipo);
				localStorage.setItem('asta', $scope.asta);
				localStorage.setItem('ratamin', $scope.ratamin);
				localStorage.setItem('ratamax', $scope.ratamax);
				localStorage.setItem('prezzomin', $scope.prezzomin);
				localStorage.setItem('prezzomax', $scope.prezzomax);
				localStorage.setItem('metrimin', $scope.metrimin);
				localStorage.setItem('metrimax', $scope.metrimax);
				localStorage.setItem('duratamutuo', $scope.duratamutuo);
				localStorage.setItem('finalita', $scope.finalita);
				localStorage.setItem('tipotasso', $scope.tipotasso);
				localStorage.setItem('localimin', $scope.localimin);
				localStorage.setItem('localimax', $scope.localimax);
				localStorage.setItem('statoimmobile', $scope.statoimmobile);
				localStorage.setItem('tipoproprieta', $scope.tipoproprieta);
				localStorage.setItem('bagni', $scope.bagni);
				localStorage.setItem('parcheggio', $scope.parcheggio);
				localStorage.setItem('efficienza', $scope.efficienza);
				localStorage.setItem('disabili', $scope.disabili);
				localStorage.setItem('ascensore', $scope.ascensore);
				localStorage.setItem('arredato', $scope.arredato);
				localStorage.setItem('balcone', $scope.balcone);
				localStorage.setItem('terrazzo', $scope.terrazzo);
				localStorage.setItem('giardinop', $scope.giardinop);
				localStorage.setItem('giardinoc', $scope.giardinoc);
				localStorage.setItem('piscina', $scope.piscina);
				localStorage.setItem('riscaldamentoa', $scope.riscaldamentoa);
				localStorage.setItem('portineria', $scope.portineria);
				localStorage.setItem('ordinaper', $scope.ordinaper);
				localStorage.setItem('lastlink', $scope.link);
				if ($scope.age != ' ') localStorage.setItem('age', $scope.age);
				if ($scope.sm != ' ') localStorage.setItem('sm', $scope.sm);
				if ($scope.rm != ' ') localStorage.setItem('rm', $scope.rm);

				$window.open($scope.link, "_self");

			});
		}, 10);

	}





	/*var mymap{{$loop->index}} = new L.Map('mapid', {
		fullscreenControl: true,
		fullscreenControl: {
			pseudoFullscreen: true
		}
	});

	var MyIcon = L.Icon.extend({
		options: { }
	});


	mymap.setView([{{$ad->latitude}}, {{$ad->longitude}}], 16);

	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 18,
		attribution: 'VivoQui',
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1
	}).addTo(mymap);

	//var marker = L.marker([{{$ad->latitude}}, {{$ad->longitude}}], {icon: ic}).addTo(mymap{{$loop->index}});*/

});

mainApp.directive('clickOut', function ($window, $parse) {
	return {
		restrict: 'A',
		link: function (scope, element, attrs) {
			var clickOutHandler = $parse(attrs.clickOut);

			angular.element($window).on('click', function (event) {
				if (element[0].contains(event.target)) return;
				if (event.target.id == "noclickout") return;

				clickOutHandler(scope, { $event: event });
				scope.$apply();
			});
		}
	};
});


const debounce = (fn) => {
	let frame;
	return (...params) => {
		if (frame) {
			cancelAnimationFrame(frame);
		}
		frame = requestAnimationFrame(() => {
			fn(...params);
		});

	}
};
const storeScroll = () => {
	document.documentElement.dataset.scroll = window.scrollY;
}
document.addEventListener('scroll', debounce(storeScroll), { passive: true });
storeScroll();


/*
|
|	MUTUO CONTROLLER
|
*/
mainApp.controller('MutuoCtrl', function ($scope, $http, $timeout) {
	$scope.ready = 1;
	$scope.data = [];
	$scope.confirmed = 0;

	$scope.tipotasso = 'fisso';
	$scope.durata = '30';
	$scope.orario = "8-10";

	$scope.$watchGroup(['anticipo', 'prezzoimmobile', 'tipotasso', 'durata'], function (newValue, oldValue) {
		if (newValue != oldValue || !$scope.anticipo) {
			if ($scope.prezzoimmobile) $scope.prezzoimmobile = $scope.prezzoimmobile.toString().replace(".", "").replace(".", "").replace(".", "").replace(/\B(?=(\d{3})+(?!\d))/g, ".");
			if ($scope.anticipo) $scope.anticipo = $scope.anticipo.toString().replace(".", "").replace(".", "").replace(".", "").replace(/\B(?=(\d{3})+(?!\d))/g, ".");
			$timeout(function () {
				$http({
					method: 'POST',
					url: '/calcolarata',
					data: { anticipo: $scope.anticipo, prezzoimmobile: $scope.prezzoimmobile, durata: $scope.durata, tipotasso: $scope.tipotasso },
				}).then(function (response) {
					if (response.data) {
						$scope.data[0] = [Number(response.data[0].mutuoperc), Number(response.data[0].anticipoperc)];
						$scope.anticipoRes = response.data[0].anticipo;
						$scope.anticipoPercRes = response.data[0].anticipoperc;
						$scope.mutuoRes = response.data[0].mutuo;
						$scope.mutuoPercRes = response.data[0].mutuoperc;
						$scope.taegRes = response.data[0].taeg;
						$scope.tanRes = response.data[0].tan;
						$scope.rata = response.data[0].rata;
					}

				});
			}, 200);
		}
	});


	$scope.labels = ['Mutuo', 'Anticipo'];
	$scope.options = {
		cutoutPercentage: 80,
		tooltips: {
			callbacks: {
				title: function (tooltipItem, data) {
					return data['labels'][tooltipItem[0]['index']];
				},
				label: function (tooltipItem, data) {
					var dataset = data['datasets'][0];
					var percent = Math.round((dataset['data'][tooltipItem['index']] / dataset["_meta"][0]['total']) * 100)
					return percent + '%';
				}
			},
			backgroundColor: '#cecece',
			titleFontSize: 16,
			titleFontColor: ['#bb9414', '#dcdcdc'],
			displayColors: false,

		}
	}
	$scope.datasetOverride = [{
		backgroundColor: ['#fd7e14', '#dcdcdc'],
		borderWidth: [0, 0],
		hoverBorderWidth: [4, 4],
		hoverBackgroundColor: ['#fd7e14', '#dcdcdc'],
		hoverBorderColor: ['#fd7e14', '#dcdcdc']
	}];


	$scope.requestmutuo = function () {
		$scope.rmutok = 1;
		$http({
			method: 'POST',
			url: '/mutuorequest',
			data: {
				form_type: 'home',
				ref: localStorage.getItem("ref"),
				anticipo: $scope.anticipo,
				prezzoimmobile: $scope.prezzoimmobile,
				durata: $scope.durata,
				tipotasso: $scope.tipotasso,
				mutuo: $scope.mutuo,
				rata: $scope.rata,
				nome: $scope.nome,
				cognome: $scope.cognome,
				residenza: $scope.residenza,
				email: $scope.email,
				telefono: $scope.tel,
				messaggio: $scope.messaggio,
				orari: $scope.orari
			},
		}).then(function (response) {
			/*if(response.data=='ok'){
				$scope.rmutok=1;
			}*/

		});
	}
});

/*
|
|	LOGIN CONTROLLER
|
*/
mainApp.controller('LoginCtrl', function ($scope, $http, $window) {
	$scope.showpwd = 0;
	$scope.togglepwd = function () {
		var x = document.getElementById("password");
		if (x.type === "password") {
			x.type = "text";
		} else {
			x.type = "password";
		}
		$scope.showpwd = !$scope.showpwd;
	}

	$scope.login = function () {
		if ($scope.formlogin.$submitted && $scope.formlogin.$valid)
			$http({
				method: 'POST',
				url: '/login',
				data: { email: $scope.email, password: $scope.password }
			}).then(function (response) {
				$scope.result = response.data;
				if (response.data == 1) {
					//$window.location.reload();
					$window.location.replace('https://www.vivoqui.it/');
				}
			});
	}

	$scope.recoverp = function () {
		if ($scope.formrecover.$submitted && $scope.formrecover.$valid)
			$http({
				method: 'POST',
				url: '/recoverp',
				data: { emailrec: $scope.emailrec }
			}).then(function (response) {
				$scope.resultrec = response.data;
			});
	}
});



/*
|
|	MAIL ALERT CONTROLLER
|
*/
mainApp.controller('MailalertCtrl', function ($scope, $http, $window) {

	$scope.sendmailalert = function () {
		if ($scope.formma.$submitted && $scope.formma.$valid)
			$http({
				method: 'POST',
				url: '/mailalertrequest',
				data: { nomealert: $scope.nomealert, cognomealert: $scope.cognomealert, emailalert: $scope.emailalert }
			}).then(function (response) {
				$scope.result = response.data;
			});
	}
});


//SOCIAL
function signOutG() {
	var auth2 = gapi.auth2.getAuthInstance();
	auth2.signOut().then(function () {
		//console.log('Google User signed out.');
	});
}

/* Facebook login */

$("#logoutbtn1").click(function () {
	FB.getLoginStatus(function (response) {
		if (response.status === 'connected') {
			//alert('ora sloggo facebook');
			//(FB.logout()).done( function(){ signOutG(); $('form#logoutform').submit(); });
			FB.logout(); FB.logout(); signOutG(); $('form#logoutform').submit();
		}
		else {
			signOutG(); $('form#logoutform').submit();
		}
	});
});

$("#logoutbtn2").click(function () {
	FB.getLoginStatus(function (response) {
		if (response.status === 'connected') {
			//alert('ora sloggo facebook');
			//(FB.logout()).done( function(){ signOutG(); $('form#logoutform').submit(); });
			FB.logout(); FB.logout(); signOutG(); $('form#logoutform').submit();
		}
		else {
			signOutG(); $('form#logoutform').submit();
		}
	});
});
/* end facebook login*/


$("#loginfacebook").click(function () {
	FB.login(function (response) {
		if (response.authResponse) {
			FB.api('/me', function (response2) {
				$.ajax({
					type: "POST",
					url: "/loginfacebook",
					data: "id=" + response.authResponse.userID + "&name=" + response2.name,
					dataType: "html",
					success: function (msg) {
						if (msg == 1) window.location.reload(true);
					},
					error: function () {
						//alert("Chiamata fallita, si prega di riprovare...");
					}
				});
			});

		}
	}, { scope: 'email,public_profile', return_scopes: true });
});

function onSignIn(googleUser) {
	$.ajax({
		type: "POST",
		url: "/logingoogle",
		data: "&id=" + googleUser.getBasicProfile().getId() + "&name=" + googleUser.getBasicProfile().getGivenName(),
		dataType: "html",
		success: function (msg) {
			if (msg == 1) window.location.reload(true);
		},
		error: function () {
		}
	});
}

$(function () {
	$('[data-toggle="tooltip"]').tooltip()
})