$(function() {

    "use strict";

    // START DISABILITAS WIDGET
	$(".open-toolbar").on('click', function(event) {
        var stickyToolbarContainer = document.querySelector(".toolbar-disabilitas");
        stickyToolbarContainer.classList.toggle("show-toolbar");
    })

	const queryString = window.location.search;
	const urlParams = new URLSearchParams(queryString);
	const speak_voice = urlParams.get('speakUpVoice')

	if(speak_voice === 'true') {
		$(".webspeach").on("click", function(event) {
			var removeUrl = window.location.href.replace(window.location.search,'');
			window.location.href = removeUrl;
		})
	} else {
		$(".webspeach").on("click", function(event) {
			var url = new URL(window.location.href);
			url.searchParams.set('speakUpVoice', 'true');								
			window.location.href = url.href;
		})
	}

	let synth = speechSynthesis;
	function textToSpeech(text) {
		let utterance = new SpeechSynthesisUtterance(text);
		for(let voice of synth.getVoices()) {
			// Kalau perangkat voice name yang tersedia sama dengan yang user pilih, maka set speech voice nya sesuai pilihan user 
			if(voice.name === "Google Bahasa Indonesia") {
				utterance.voice = voice;
			}
		}
		synth.speak(utterance);
	}

	function removeTextToSpeech() {
		synth.cancel();
	}

	if(speak_voice === 'true') {
		// START VOICE LOGO JAKSEL HEADER MENU
		$('#logo_webadmin_jaksel').mouseover(function(){
			textToSpeech("Selamat Datang Di Website Pemerintah Kota Administrasi Jakarta Selatan");
		})
		$('#logo_webadmin_jaksel').mouseout(function(){
			removeTextToSpeech();
		})
		// END VOICE LOGO JAKSEL HEADER MENU

		// START VOICE LIST OPTION
		$('#taccessbility').mouseover(function(){
			textToSpeech("Sarana");
		})
		$('#taccessbility').mouseout(function(){
			removeTextToSpeech();
		})

		$("#twebspeach").mouseover(function(){
			textToSpeech("Moda Suara");
		})
		$("#twebspeach").mouseout(function(){
			removeTextToSpeech();
		})

		$('#tincreasetext').mouseover(function(){
			textToSpeech("Perbesar Text");
		})
		$('#tincreasetext').mouseout(function(){
			removeTextToSpeech();
		})

		$('#tdecreasetext').mouseover(function(){
			textToSpeech("Perkecil Text");
		})
		$('#tdecreasetext').mouseout(function(){
			removeTextToSpeech();
		})

		$('#tegrayscale').mouseover(function(){
			textToSpeech("Skala Abu abu");
		})
		$('#tegrayscale').mouseout(function(){
			removeTextToSpeech();
		})

		$('#thcontrash').mouseover(function(){
			textToSpeech("Warna");
		})
		$('#thcontrash').mouseout(function(){
			removeTextToSpeech();
		})

		$('#tncontrash').mouseover(function(){
			textToSpeech("Klise");
		})
		$('#tncontrash').mouseout(function(){
			removeTextToSpeech();
		})

		$('#tlgcontrash').mouseover(function(){
			textToSpeech("Penerangan");
		})
		$('#tlgcontrash').mouseout(function(){
			removeTextToSpeech();
		})

		$('#treadablefont').mouseover(function(){
			textToSpeech("Tulisan dapat dibaca");
		})
		$('#treadablefont').mouseout(function(){
			removeTextToSpeech();
		})

		$('#tlinkunderline').mouseover(function(){
			textToSpeech("Garis bawahi tautan");
		})
		$('#tlinkunderline').mouseout(function(){
			removeTextToSpeech();
		})

		$('#tidreset').mouseover(function(){
			textToSpeech("Mengatur Ulang");
		})
		$('#tidreset').mouseout(function(){
			removeTextToSpeech();
		})
		// END VOICE LIST OPTION

		// START VOICE HEADER MENU
		$('#beranda').mouseover(function(){
			textToSpeech("Beranda");
		})
		$('#beranda').mouseout(function(){
			removeTextToSpeech();
		})

		$('#pemerintahan').mouseover(function(){
			textToSpeech("Pemerintahan");
		})
		$('#pemerintahan').mouseout(function(){
			removeTextToSpeech();
		})

		$('#profil').mouseover(function(){
			textToSpeech("Profil");
		})
		$('#profil').mouseout(function(){
			removeTextToSpeech();
		})

		$('#pejabat').mouseover(function(){
			textToSpeech("Pejabat");
		})
		$('#pejabat').mouseout(function(){
			removeTextToSpeech();
		})

		$('#wilayah').mouseover(function(){
			textToSpeech("Wilayah");
		})
		$('#wilayah').mouseout(function(){
			removeTextToSpeech();
		})

		$('#bank_data').mouseover(function(){
			textToSpeech("Bank data");
		})
		$('#bank_data').mouseout(function(){
			removeTextToSpeech();
		})

		$('#agenda').mouseover(function(){
			textToSpeech("Agenda");
		})
		$('#agenda').mouseout(function(){
			removeTextToSpeech();
		})

		$('#regulasi').mouseover(function(){
			textToSpeech("Regulasi");
		})
		$('#regulasi').mouseout(function(){
			removeTextToSpeech();
		})

		$('#berita_selatan').mouseover(function(){
			textToSpeech("Berita selatan");
		})
		$('#berita_selatan').mouseout(function(){
			removeTextToSpeech();
		})

		$('#semua_berita').mouseover(function(){
			textToSpeech("Semua berita");
		})
		$('#semua_berita').mouseout(function(){
			removeTextToSpeech();
		})

		$('#kategori').mouseover(function(){
			textToSpeech("Kategori");
		})
		$('#kategori').mouseout(function(){
			removeTextToSpeech();
		})

		$('#kesejahteraan_rakyat').mouseover(function(){
			textToSpeech("Kesejahteraan rakyat");
		})
		$('#kesejahteraan_rakyat').mouseout(function(){
			removeTextToSpeech();
		})

		$('#pemerintahan2').mouseover(function(){
			textToSpeech("Pemerintahan");
		})
		$('#pemerintahan2').mouseout(function(){
			removeTextToSpeech();
		})

		$('#perekonomian_pembangunan').mouseover(function(){
			textToSpeech("Perekonomian dan pembangunan");
		})
		$('#perekonomian_pembangunan').mouseout(function(){
			removeTextToSpeech();
		})

		$('#sosial_budaya').mouseover(function(){
			textToSpeech("Sosial budaya");
		})
		$('#sosial_budaya').mouseout(function(){
			removeTextToSpeech();
		})

		$('#galeri').mouseover(function(){
			textToSpeech("Galeri");
		})
		$('#galeri').mouseout(function(){
			removeTextToSpeech();
		})

		$('#foto').mouseover(function(){
			textToSpeech("Foto");
		})
		$('#foto').mouseout(function(){
			removeTextToSpeech();
		})

		$('#video').mouseover(function(){
			textToSpeech("Video");
		})
		$('#video').mouseout(function(){
			removeTextToSpeech();
		})

		$('#ppid_jaksel').mouseover(function(){
			textToSpeech("PPID Jak-Sel");
		})
		$('#ppid_jaksel').mouseout(function(){
			removeTextToSpeech();
		})

		$('#ppid_jaksel_profil').mouseover(function(){
			textToSpeech("Profil");
		})
		$('#ppid_jaksel_profil').mouseout(function(){
			removeTextToSpeech();
		})

		$('#alur_mekanisme').mouseover(function(){
			textToSpeech("Alur Mekanisme");
		})
		$('#alur_mekanisme').mouseout(function(){
			removeTextToSpeech();
		})

		$('#daftar_informasi_publik').mouseover(function(){
			textToSpeech("Daftar Informasi Publik");
		})
		$('#daftar_informasi_publik').mouseout(function(){
			removeTextToSpeech();
		})

		$('#data_corona').mouseover(function(){
			textToSpeech("Data Corona");
		})
		$('#data_corona').mouseout(function(){
			removeTextToSpeech();
		})

		$('#ppid_prov_dki').mouseover(function(){
			textToSpeech("PPID Provinsi DKI Jakarta");
		})
		$('#ppid_prov_dki').mouseout(function(){
			removeTextToSpeech();
		})

		$('#informasi_publik').mouseover(function(){
			textToSpeech("Informasi publik");
		})
		$('#informasi_publik').mouseout(function(){
			removeTextToSpeech();
		})
		// END VOICE HEADER MENU

		// START Reset agar fitur switch off
		$('.tidreset').on("click", function(){
			var removeUrl = window.location.href.replace(window.location.search,'');
			window.location.href = removeUrl;
		})
		// END Reset agar fitur switch off
	} else {
		// START Reset agar fitur switch off jika tidak ada param voice
		$('.tidreset').on("click", function(){
			window.location.reload();
		})
		// END Reset agar fitur switch off jika tidak ada param voice
	}

	var zoomLevel = 1;
	var rootFontSize = 15;
	// var rootFontSize = 12;
	var groups = Array.from(document.querySelectorAll('#groupcekmenu'));

	function cekclassactive(groups, idhtml) {
        if (idhtml != "resetdisabilitas") {
            $('#resetdisabilitas').removeClass("subtitletoolsactive");
            $('#resetdisabilitas').addClass("subtitletools");
        }
        var namedatainput = '[class="bodytools"]';
        var namedatainput2 = 'div';
        var listgroupselector = groups.map(function(group) {
            return group.querySelector(namedatainput);
        });
        var listdata = listgroupselector.map(function(group) {
            return Array.from(group.querySelectorAll(namedatainput2)).map(function(item) {
                return item
            });
        })

        var listdatall = [];
        var listdatall2 = [];
        for (let i = 0; i < listdata.length; i++) {
            for (let k = 0; k < listdata[i].length; k++) {
                var classactive = "";
                var classid = "";
                if (listdata[i][k].id == idhtml) {

                    if ($('#' + idhtml).hasClass('subtitletools') && idhtml != "decreasetext") {
                        classactive = "active";
                        $('#' + idhtml).addClass("subtitletoolsactive");
                        $('#' + idhtml).removeClass("subtitletools");

                    } else if ($('#' + idhtml).hasClass('subtitletoolsactive') && idhtml == "resetdisabilitas") {
                        classactive = "noactive";
                        $('#' + idhtml).removeClass("subtitletoolsactive");
                        $('#' + idhtml).addClass("subtitletools");
                    } else {
                        classactive = "noactive";
                        $('#' + idhtml).removeClass("subtitletoolsactive");
                        $('#' + idhtml).addClass("subtitletools");
                    }
                } else {
                    if (idhtml == "resetdisabilitas") {

                        classactive = "noactive";
                        //   classid = listdata[i][k].id;
                        if ($('#' + listdata[i][k].id).hasClass('subtitletoolsactive')) {
                            $('#' + listdata[i][k].id).removeClass("subtitletoolsactive");
                            $('#' + listdata[i][k].id).addClass("subtitletools");
                        }
                    } else if (idhtml == "lgcontrash" || idhtml == "ncontrash" || idhtml == "hcontrash") {
                        if (listdata[i][k].id == "lgcontrash" || listdata[i][k].id == "ncontrash" || listdata[i][k].id == "hcontrash") {
                            if ($('#' + listdata[i][k].id).hasClass('subtitletoolsactive')) {
                                $('#' + listdata[i][k].id).removeClass("subtitletoolsactive");
                                $('#' + listdata[i][k].id).addClass("subtitletools");
                            }

                        }

                    }
                }
                //console.log(classactive);
                var loopmulti = {
                    id: listdata[i][k].id,
                    class: listdata[i][k].className,
                    classactiv: classactive
                }
                listdatall.push(loopmulti);
            }
        }
        var cekactiveclass = listdatall.filter(function(group) {
            return group.id == idhtml
        });
        var returndata = {
            getclass: cekactiveclass[0],
            data: listdata
        }
        return returndata;
    }

	function isBlank(str) {
        return (!str || /^\s*$/.test(str));
    }

	// START PERBESAR TEXT
	$("#increasetext").on("click", function(event) {
		// var listdatagroup = cekclassactive(groups, 'increasetext');

		setTimeout(() => {
			if (zoomLevel < 2) {
				console.log(zoomLevel);
				zoomLevel = zoomLevel + 0.1;
				rootFontSize = rootFontSize + 2;
				$("*:not(.fa-search,.toolbar-disabilitas  *,.fa,.fa-angle-down)").css({
				// $("*:not(.toolbar-disabilitas,*)").css({
					"font-family": "",
					"font-weight": 400,
					"font-size": `${rootFontSize}px`,

				});
			} else {
				$("*:not(.fa-search,.toolbar-disabilitas  *,.fa,.fa-angle-down)").css({
				// $("*:not(.toolbar-disabilitas,*)").css({
					"font-family": "",
					"font-weight": 400,
					"font-size": '20px'
				});
			}
		}, 100);
	})
	// END PERBESAR TEXT

	// START PERKECIL TEXT
	$("#decreasetext").click(function(event) {
		$('#resetdisabilitas').removeClass("subtitletoolsactive");
		$('#resetdisabilitas').addClass("subtitletools");
		//  var listdatagroup = cekclassactive(groups, 'decreasetext');
		setTimeout(() => {

			if (rootFontSize > 15) {

				zoomLevel = zoomLevel - 0.1;
				rootFontSize = rootFontSize - 2;
				$('#increasetext').removeClass("subtitletoolsactive");
				$('#increasetext').addClass("subtitletools");

				$('*:not(".fa-search,.toolbar-disabilitas  *,.fa,.fa-angle-down")').css({
					"font-family": "",
					"font-weight": 400,
					"font-size": `${rootFontSize}px`,
					"font-family": ""
				});
			}
		}, 100);
	})
	// END PERKECIL TEXT

	// START SKALA ABU ABU
	$("#egrayscale").on('click', function(event) {
		$("#effectweb").toggleClass("greyscaleall");
    })
	// END SKALA ABU ABU

	// START TULISAN DAPAT DIBACA
	$("#readablefont").on('click', function(event) {
        var listdatagroup = cekclassactive(groups, 'readablefont');
        if (listdatagroup.getclass.classactiv == "active") {
            $('*:not(".fa-search,.toolbar-disabilitas  *,.fa,.fa-angle-down")').css({
                "font-family": "",
                "font-weight": 400,
                "font-size": '16px',
                "font-family": ""
            });
        } else {
            $('*:not(".fa-search,.toolbar-disabilitas  *,.fa,.fa-angle-down")').css({
                "font-family": "",
                "font-weight": "",
                "font-size": "",
                "font-family": ""
            });
        }
    })
	// END TULISAN DAPAT DIBACA

	// START GARIS BAWAH TULISAN
	$("#linkunderline").on('click', function(event) {
        var listdatagroup = cekclassactive(groups, 'linkunderline');
        if (listdatagroup.getclass.classactiv == "active") {
            var links = document.querySelectorAll("a,div,li a strong,.columnmobile");

            for (var i = 0; i < links.length; i++) {
                if (!isBlank(links[i].href) || links[i].className == "hurufawal mylink capitalfont" || links[i].className == "subtitletools" || links[i].className == "subtitletoolsactive" || links[i].className == "mylinkweb" || links[i].className == "hurufawal mylink" || links[i].className == "col-md-12 feature-txt2" ||
                    links[i].className == "col-md-12 feature-txt" || links[i].className == "col-md-12 feature-txt" || links[i].className == "text-center") {
                    links[i].style.textDecoration = "underline";
                }
            }

            $('.toolbar-disabilitas  *').css({
                "text-decoration": ""
            });
        } else {
            $('*').css({
                "text-decoration": ""
            });
        }
    })
	// END GARIS BAWAH TULISAN

	// END DISABILITAS WIDGET
})