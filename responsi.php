<!DOCTYPE html>
<head>
    <!-- Metadata -->
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="DIVSIG UGM">
    <meta name="description" content="leaflet basic">

    <!-- Judul pada tab browser -->
    <title>GoToTrans</title>

    <!-- Leaflet CSS Library -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css">

    <!-- Tab browser icon -->
    <link rel="icon" type="image/x-icon" href="https://www.freepik.com/icon/bus-school_3066259">

    <style>
        /* Tampilan peta fullscreen */
        html,
        body,
        #map {
            height: 100%;
            width: 100%;
            margin: 0px;
        }
    </style>
</head>
<body>
    <div id="map" ></div>

    <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"></script>

    <script>
    var map = L.map('map').setView([-1.850253, 118.876685], 5); //lat, long, zoom


    /* Tile Basemap */ 
    var basemap1 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '<a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> | <a href="DIVSIGUGM" target="_blank">DIVSIG UGM</a>' 
        //menambahkan nama//
    });

    var basemap2 = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/ { z } / { y } / { x }', {
        attribution: 'Tiles &copy; Esri | <a href="Latihan WebGIS" target="_blank">DIVSIG UGM</a>'
    });

    var basemap3 = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{ x } ', {
       attribution: 'Tiles &copy; Esri | <a href="Lathan WebGIS" target="_blank">DIVSIG UGM</a>'
    });

    var basemap4 = L.tileLayer('https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.png', {
           attribution: '&copy; <a href="https://stadiamaps.com/">Stadia Maps</a>, &copy; <a href="https://openmaptiles.org / ">OpenMapTiles</a> &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors'
    });

    basemap4.addTo(map);

    // Tambahkan tile layer dari OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

    // Objek layer untuk jalur trans Jogja
    var layer1B = L.layerGroup();
    var layer2B = L.layerGroup();
    var layer3A = L.layerGroup();
    var layer3B = L.layerGroup();
    var layer4A = L.layerGroup();
    var layer4B = L.layerGroup();
    var layer5A = L.layerGroup();
    var layer5B = L.layerGroup();
    var layer6A = L.layerGroup();
    var layer6B = L.layerGroup();
    var layer7 = L.layerGroup();
    var layer8 = L.layerGroup();
    var layer9 = L.layerGroup();
    var layer10 = L.layerGroup();
    var layer11 = L.layerGroup();
    var layer13 = L.layerGroup();
    var layer14 = L.layerGroup();
    var layer15 = L.layerGroup();

    var locations1 = {
    "Jalur 3A 3B 4A 4B 7 9 11 Halte Terminal Giwangan": [-7.83408412312758, 110.39167021180103],
    "Jalur 3A 3B 4A 4B 7 TPB Pasar Giwangan": [-7.830964072714939, 110.3898035035863],
    "Jalur 3A 3B 4A 4B 7 TPB Gedung SGM": [-7.8266275068189, 110.38997516497486],
    "Jalur 4A 4B 7 Halte Muhammadiyah 3":  [-7.8223251255282795, 110.38957338564904],
    "Jalur 4A TPB Pasar Sepeda Tanjungsari": [-7.81602792522192, 110.3801164836291],
    "Jalur 4A TPB SRD Visi Tamsis": [-7.81062483773132, 110.37690939232341],
    "Jalur 4A TPB Wirogunan Tamsis": [-7.803617902584983, 110.37818282729438],
    "Jalur 1B 4A Halte Biologi": [-7.801375076483603, 110.37418097144976],
    "Jalur 4A 10 TPB Lempuyangan":  [-7.790163007120137, 110.37372759120173],
    "Jalur 1B 3B 4A 5B 11Halte TJ Cik Di Tiro 2": [-7.781032713410256, 110.37519007637883],
    "Jalur 3B 4A Halte Vokasi": [-7.774387259934946, 110.37496213240124],
    "Jalur 3B 4A 5A Halte RSUP Dr.Sardjito":[-7.767718818895514, 110.37421591405094],
    "Jalur 3B 4A TPB MM UGM": [-7.764924617985609, 110.37700378752925],
    "Jalur 4A TPB Polsek Bulaksumur": [-7.770560219875563, 110.38642123757937],
    "Jalur 3B 4A Halte Jln Colombo Panti Raph": [-7.776069886932191, 110.37821079932752],
    "Jalur 2B 3A 4A 4B 5B 10 11 Halte Yos Sudarsono": [-7.786980591850023, 110.37530534259712],
    "Jalur 4A Halte TJ YKPN": [-7.785621915439945, 110.38300999382454],
    "Jalur 1B 4A 5A Halte TJ Solo": [-7.782871547498574, 110.3939682165504],
    "Jalur 4A Halte UIN Sunan Kalijaga 1": [-7.7860447375383215, 110.39491278000187],
    "Jalur 4A 10 Halte TJ SMKN 5": [-7.79976941574141, 110.39519890309907],
    "Jalur 1B 4A 10 Halte Kusumanegara 4": [-7.801828862031231, 110.39334781350249],
    "Jalur 4A TPB UTY Glagasar": [-7.805185665949695, 110.38855023762693],
    "Jalur 4A 4B 7 TPB Jalan Pramuka": [-7.820415995751518, 110.3886077714881],
    "Jalur 3A 3B 4A 4B 7 TPB Pasar Giwangan": [-7.832124291818957, 110.39022588673292],
    "Jalur 3A 3B 4A 4B 7 9 11 Halte Terminal Giwangan": [-7.83408412312758, 110.39167021180103],
        // Tambahkan lokasi lainnya sesuai kebutuhan
    };
    
    // Tambahkan marker untuk setiap lokasi dalam objek
    for (var locationName in locations1) {
        if (locations1.hasOwnProperty(locationName)) {
            var coord = locations1[locationName];
            var marker = L.marker(coord, { draggable: true }).addTo(map);
            marker.bindPopup( locationName + " (" + coord.toString() + ")");
            marker.addTo(layer4A);
        }
    }

    // Ambil koordinat untuk membuat jalur
    var coordinates1 = Object.values(locations1);

    // Tambahkan jalur untuk locations1
    var polyline1 = L.polyline(coordinates1, { color: 'green' }).addTo(map);
    marker.addTo(layer4A);


    var locations2 = {
        "Jalur 3A 3B 4A 4B 7 9 11 Halte Terminal Giwangan": [-7.83408412312758, 110.39167021180103],
        "Jalur 3A 3B 4A 4B 7 TPB Gedung SGM": [-7.8266275068189, 110.38997516497486],
        "Jalur 4A 4B 7 Halte Muhammadiyah 3":  [-7.8223251255282795, 110.38957338564904],
        "Jalur 4B TPB S3 PSKY Umbulharjo": [-7.815555577500772, 110.38645857654892],
        "Jalur 2B 4B Halte Kusumanegara": [-7.803948356640684, 110.38877600513337],
        "Jalur 4B Halte SGM": [-7.799744163664376, 110.39467848539303],
        "Jalur 4B Halte UIN Sunan Kalijaga 1": [-7.785245870352289, 110.39480479114367],
        "Jalur 4B 5B Halte TJ Solo (Gedung Wanita)": [-7.782740014192799, 110.38615604117003],
        "Jalur 4B TPB Galeria Mall": [-7.782015602510605, 110.3793212629618],
        "Jalur 4B TPB Lembah UGM": [-7.772246203814118, 110.38144005803233],
        "Jalur 4B TPB Polsek Bulaksumur": [-7.770275997966262, 110.38646320782715],
        "Jalur 3A 4B TPB Fakultas Biologi UGM": [-7.765107627989725, 110.37685846729408],
        "Jalur 3A 4B 5B Halte FK UGM": [-7.767435453710055, 110.37429524344628],
        "Jalur 3A 4B Halte TJ Kaliurang Kopma": [-7.77420831380697, 110.37516052191958],
        "Jalur 2B 3A 4A 4B 5B 10 11 Halte Yos Sudarsono": [-7.786980591850023, 110.37530534259712],
        "Jalur 4B 10 TPB Lempuyangan": [-7.790390181537271, 110.37366145273482],
        "Jalur 4B Halte Pakualaman": [-7.8015000320767856, 110.37573908351555],
        "Jalur 4B Halte Tamansiswa": [-7.813655560384433, 110.37653660911177],
        "Jalur 4A 4B 7 TPB Jalan Pramuka": [-7.820415995751518, 110.3886077714881],
        "Jalur 3A 3B 4A 4B 7 TPB Pasar Giwangan": [-7.832124291818957, 110.39022588673292],
        "Jalur 3A 3B 4A 4B 7 9 11 Halte Terminal Giwangan": [-7.83408412312758, 110.39167021180103],
        // Tambahkan lokasi lainnya sesuai kebutuhan
    };
    
    // Tambahkan marker untuk setiap lokasi dalam objek
    for (var locationName in locations2) {
        if (locations2.hasOwnProperty(locationName)) {
            var coord = locations2[locationName];
            var marker = L.marker(coord, { draggable: true }).addTo(map);
            marker.bindPopup(locationName + " (" + coord.toString() + ")");
            marker.addTo(layer4B);
        }
    }
    var coordinates2 = Object.values(locations2);
    var polyline1 = L.polyline(coordinates2, { color: 'red' }).addTo(map);
    marker.addTo(layer4B);

    var locations3 = {
        "Jalur 1B 2B 3A 3B 5A 5B Halte Terminal Condongcatur": [-7.756554502266263, 110.39585707432119],
        "Jalur 1B 5A PTB Pasar Demangan": [-7.779159279805259, 110.3885424917273],
        "Jalur 1B 4A 5A Halte TJ Solo": [-7.782871547498574, 110.3939682165504],
        "Jalur 1B 5A Halte Ambarukmo": [-7.782989207585249, 110.40243884507854],
        "Jalur 1B 5A 5B Halte Janti Selatan": [-7.7852753232509855, 110.41044092541884],
        "Jalur 1B 5B Halte Transmart Maguwo": [-7.782967172907841, 110.42018707164274],
        "Jalur 1B 3A 3B 5B 14 Halte Solo Maguwo": [-7.78296732824304, 110.4309190342717],
        "Jalur 1B 3A 3B 5B 14 Halte Bandara Adisucipto": [-7.784196167859689, 110.43578399583164],

    };
    
    // Tambahkan marker untuk setiap lokasi dalam objek
    for (var locationName in locations3) {
        if (locations3.hasOwnProperty(locationName)) {
            var coord = locations3[locationName];
            var marker = L.marker(coord, { draggable: true }).addTo(map);
            marker.bindPopup(locationName + " (" + coord.toString() + ")");
            marker.addTo(layer1B);
        }
    }
    var coordinates3 = Object.values(locations3);
    var polyline1 = L.polyline(coordinates3, { color: 'white' }).addTo(map);
    marker.addTo(layer1B);

    // Jalur 2B
    var locations4 = {
        "Jalur 1B 2B 3A 3B 5A 5B Halte Terminal Condongcatur": [-7.756554502266263, 110.39585707432119],
        "Jalur 1B 2B Halte Senata Dharma Gejayan": [-7.765671426666838, 110.39226338440243],
        "Jalur 2B Jalan Colombo": [-7.777236480729478, 110.38743627444337],
        "Jalur 2B 4A Halte Jln Colombo Panti Raph": [-7.776069886932191, 110.37821079932752],
        "Jalur 2B 3A 4A 4B 5B 10 11 Halte Yos Sudarsono": [-7.786980591850023, 110.37530534259712],
        "Jalur 2B 10 TPB SMP Kanisius Kota": [-7.7954323912178465, 110.37782324733492],
        "Jalur 2B TPB Among Rogo Kota": [-7.798376293838053, 110.3849059718225],
        "Jalur 2B 4B Halte Kusumanegara": [-7.803948356640684, 110.38877600513337],
        "Jalur 2B 3B Halte Kuning Banguntapan" : [-7.807228693178946, 110.40228543543884],
        "Jalur 2B 3B TPB Kehutanan Gedongkuning" : [-7.817944032607973, 110.40185734853073],
        "Jalur 2B TPB SMP 9 Basen": [-7.819513044045955, 110.39799318052148],
        "Jalur 2B 7 TPB Jalan Veteran": [-7.814806535837748, 110.38931742286954],
        "Jalur 4A TPB Pasar Sepeda Tanjungsari": [-7.81602792522192, 110.3801164836291],
        "Jalur 2B 3B Halte Sugiono 2": [-7.8147629925308255, 110.37178392906567],
        "Jalur 2B Halte Katamso 2": [-7.802212687542011, 110.3691662111337],
        "Jalur 2B 3A 6A 6B 8 10 13 15 Halte KHA Dahlan 1": [-7.801247347748509, 110.36005415272642],
        "Jalur 2B 3A 3B 6A 6B 8 9 10 11 13 15 Halte Ngabean": [-7.803630076641254, 110.35629632599264],
    };
    
    // Tambahkan marker untuk setiap lokasi dalam objek
    for (var locationName in locations4) {
        if (locations4.hasOwnProperty(locationName)) {
            var coord = locations4[locationName];
            var marker = L.marker(coord, { draggable: true }).addTo(map);
            marker.bindPopup(locationName + " (" + coord.toString() + ")");
            marker.addTo(layer2B);
        }
    }
    var coordinates4 = Object.values(locations4);
    var polyline1 = L.polyline(coordinates4, { color: 'pink' }).addTo(map);
    marker.addTo(layer2B);

    // Jalur 3A
    var locations5 = {
        "Jalur 1B 3A 3B 5B 14 Halte Bandara Adisucipto": [-7.784196167859689, 110.43578399583164],
        "Jalur 3A 14 Halte Tj RRU Disnaker": [-7.769109846865241, 110.43104629059006],
        "Jalur 3A TPB Polsek Depok Timur": [-7.762258748843151, 110.41543820485101],
        "Jalur 3A Halte RRU UPN": [-7.760444987866329, 110.40802439293111],
        "Jalur 3A 5A Halte Pakuwon Mall": [-7.758210603609557, 110.39944879685765],
        "Jalur 1B 2B 3A 3B 5A 5B Halte Terminal Condongcatur": [-7.756554502266263, 110.39585707432119],
        "Jalur 3A 5A TPB Tj RRU Manggung": [-7.757580201142985, 110.38628726947688],
        "Jalur 3A 5A TPB McD Jakal": [-7.762768501819372, 110.3799067280511],
        "Jalur 3A 4B TPB Fakultas Biologi UGM": [-7.765107627989725, 110.37685846729408],
        "Jalur 3A 4B 5B Halte FK UGM": [-7.767435453710055, 110.37429524344628],
        "Jalur 3A 4B Halte TJ Kaliurang Kopma": [-7.77420831380697, 110.37516052191958],
        "Jalur 3A 3B 4A TPB Panti Raph": [-7.777541334205189, 110.376027372742],
        "Jalur 2B 3A 4A 11 Halte TJ Cik Di Tiro 1": [-7.7821383642036945, 110.37518564049002],
        "Jalur 2B 3A 4A 4B 5B 10 11 Halte Yos Sudarsono": [-7.786980591850023, 110.37530534259712],
        "Jalur 3A 6A 6B 8 10 13 15 Halte Malioboro 1": [-7.790581822210973, 110.36614427282639],
        "Jalur 3A 6A 6B 8 10 13 15 Halte Malioboro 2": [-7.795234654795902, 110.3655511629087],
        "Jalur 3A 6A 6B 8 10 13 15 Halte Malioboro 3": [-7.799736294500316, 110.3650093585163],
        "Jalur 2B 3A 6A 6B 8 10 13 15 Halte KHA Dahlan 1": [-7.801247347748509, 110.36005415272642],
        "Jalur 2B 3A 3B 6A 6B 8 9 10 11 13 15 Halte Ngabean": [-7.803630076641254, 110.35629632599264],
    };

    // Tambahkan marker untuk setiap lokasi dalam objek
    for (var locationName in locations5) {
        if (locations5.hasOwnProperty(locationName)) {
            var coord = locations5[locationName];
            var marker = L.marker(coord, { draggable: true }).addTo(map);
            marker.bindPopup(locationName + " (" + coord.toString() + ")");
            marker.addTo(layer3A);
        }
    }
    var coordinates5 = Object.values(locations5);
    var polyline1 = L.polyline(coordinates5, { color: 'gray' }).addTo(map);
    marker.addTo(layer3A);

    // Jalur 3B
    var locations6 = {
        "Jalur 3A 3B 4A 4B 7 9 11 Halte Terminal Giwangan": [-7.83408412312758, 110.39167021180103],
        "Jalur 3A 3B 4A 4B 7 TPB Pasar Giwangan": [-7.830964072714939, 110.3898035035863],
        "Jalur 3A 3B 4A 4B 7 TPB Gedung SGM": [-7.8266275068189, 110.38997516497486],
        "Jalur 3B Halte Nitikan": [-7.82466095530521, 110.37996198242611],
        "Jalur 3B TPB PA Muhammadiyah": [-7.816772078585342, 110.37603216426534],
        "Jalur 3B 8 Halte Jl Mayjen Sutoyo Joteng": [-7.814379094903118, 110.36716711989963],
        "Jalur 3B 8 11 Halte MT Haryono 2": [-7.813371407268862, 110.35818592747037],
        "Jalur 2B 3B 6A 6B 8 9 10 11 13 15 Halte Tejokusuman Tamansari": [-7.807457637136658, 110.35593035753311],
        "Jalur 2B 3A 3B 6A 6B 8 9 10 11 13 15 Halte Ngabean": [-7.803630076641254, 110.35629632599264],
        "Jalur 2B 3A 6A 6B 8 10 13 15 Halte KHA Dahlan 2": [-7.800884112262622, 110.36032723655426],
        "Jalur 3B 8 1B TPB Pasar Pathuk": [-7.79586483468442, 110.36185013998556],
        "Jalur 3B 8 1B TPB Stasiun Tugu": [-7.791862653142814, 110.36161798498976],
        "Jalur 3B 8 1B TPB Jln Jlagran": [-7.789258914503123, 110.35879498023723],
        "Jalur 1B 2B 3B 9 11 Halte Tentara Pelajar 1": [-7.786351540563891, 110.35987217941464],
        "Jalur 1B 3B 11 Halte Sudirman": [-7.782710712656637, 110.36884478446387],
        "Jalur 1B 3B 4A 5B 11 Halte TJ Cik Di Tiro 2": [-7.781032713410256, 110.37519007637883],
        "Jalur 3B 4A Halte Vokasi": [-7.774387259934946, 110.37496213240124],
        "Jalur 3B 4A 5A Halte RSUP Dr.Sardjito":[-7.767718818895514, 110.37421591405094],
        "Jalur 3B 4A TPB MM UGM": [-7.764924617985609, 110.37700378752925],
        "Jalur 3B 5B TPB Hotel Vidi Jakal": [-7.761281093866212, 110.38006498185052],
        "Jalur 2B 3B 5B Halte Tj RRU Kentungan": [-7.755827619431015, 110.38468765127026],
        "Jalur 1B 2B 3A 3B 5A 5B Halte Terminal Condongcatur": [-7.756554502266263, 110.39585707432119],
        "Jalur 3B TPB Polsek Depok Timur": [-7.761990752679569, 110.41518010844868],
        "Jalur 3B TPB SMK Tajem Ringroad Utara": [-7.76593841536064, 110.43123041773411],
        "Jalur 1B 3A 3B 5B 14 Halte Solo Maguwo": [-7.78296732824304, 110.4309190342717],
        "Jalur 1B 3A 3B 5B 14 Halte Bandara Adisucipto": [-7.784196167859689, 110.43578399583164]
    };

    // Tambahkan marker untuk setiap lokasi dalam objek
    for (var locationName in locations6) {
        if (locations6.hasOwnProperty(locationName)) {
            var coord = locations6[locationName];
            var marker = L.marker(coord, { draggable: true }).addTo(map);
            marker.bindPopup(locationName + " (" + coord.toString() + ")");
            marker.addTo(layer3B);
        }
    }
    var coordinates6 = Object.values(locations6);
    var polyline1 = L.polyline(coordinates6, { color: 'black' }).addTo(map);
    marker.addTo(layer3B);

    // Jalur 5A
    var locations7 = {
        "Jalur 2B 5A 5B 8 9 Halte Terminal Jombor": [-7.747388379963963, 110.36122325778749],
        "Jalur 5A 9 TPB Jogja City Mall 2": [-7.753134453845562, 110.3622439442672],
        "Jalur 5A 9 Halte Karangwaru Polsek Tegalrejo": [-7.772151804012335, 110.3613117662742],
        "Jalur 5A 9 TPB Eks Borobudur Plaza 2": [-7.778732151895225, 110.36202286139414],
        "Jalur 2B 5A TPB Wolter Monginsidi, Sleman": [-7.777583779508086, 110.36677834340907],
        "Jalur 1B 5A Halte TJ Colombo Kosudgama": [-7.775690480205011, 110.3784938054607],
        "Jalur 1B 5A TPB Jln Colombo UNY": [-7.777588135426673, 110.38665912916946],
        "Jalur 1B 5A PTB Pasar Demangan": [-7.779159279805259, 110.3885424917273],
        "Jalur 1B 4A 5A Halte TJ Solo": [-7.782871547498574, 110.3939682165504],
        "Jalur 1B 5A Halte Ambarukmo": [-7.782989207585249, 110.40243884507854],
    };

    // Tambahkan marker untuk setiap lokasi dalam objek
    for (var locationName in locations7) {
        if (locations7.hasOwnProperty(locationName)) {
            var coord = locations7[locationName];
            var marker = L.marker(coord, { draggable: true }).addTo(map);
            marker.bindPopup(locationName + " (" + coord.toString() + ")");
            marker.addTo(layer5A);
        }
    }
    var coordinates7 = Object.values(locations7);
    var polyline1 = L.polyline(coordinates7, { color: 'purple' }).addTo(map);
    marker.addTo(layer5A);

    // Jalur 5B
    var locations8 = {
        "Jalur 2B 5A 5B 8 9 Halte Terminal Jombor": [-7.747388379963963, 110.36122325778749],
        "Jalur 2B 5B Halte RRU Monjali 1": [-7.7501843100168735, 110.36756748621194],
        "Jalur 5B TPB PDAM Monjali": [-7.7556156983025515, 110.36996786589643],
        "Jalur 5B TPB Teknik UGM 1": [-7.7639846024874775, 110.37473348187955],
        "Jalur 3A 4B 5B Halte FK UGM": [-7.767435453710055, 110.37429524344628],
        "Jalur 3B 5B TPB Hotel Vidi Jakal": [-7.761281093866212, 110.38006498185052],
        "Jalur 2B 3B 5B Halte Tj RRU Kentungan": [-7.755827619431015, 110.38468765127026],
        "Jalur 1B 2B 3A 3B 5A 5B Halte Terminal Condongcatur": [-7.756554502266263, 110.39585707432119],
        "Jalur 3B 5B Halte TJ RRU (STIKES)": [-7.76020772651032, 110.40910306796499],
        "Jalur 5B TPB AA YKPN 1": [-7.7678858504639825, 110.41032292450959],
        "Jalur 5B TPB SMP N 4 Depok": [-7.773651324807083, 110.4121045340415],
        "Jalur 5B TPB Dishub DIY": [-7.778052673627278, 110.41512523109448],
        "Jalur 1B 3A 5B Halte Transmart Maguwo": [-7.782806545051567, 110.42026088490277],
        "Jalur 1B 3A 3B 5B 14 Halte Solo Maguwo": [-7.78296732824304, 110.4309190342717],
        "Jalur 1B 3A 3B 5B 14 Halte Bandara Adisucipto": [-7.784196167859689, 110.43578399583164],
    };

    // Tambahkan marker untuk setiap lokasi dalam objek
    for (var locationName in locations8) {
        if (locations8.hasOwnProperty(locationName)) {
            var coord = locations8[locationName];
            var marker = L.marker(coord, { draggable: true }).addTo(map);
            marker.bindPopup(locationName + " (" + coord.toString() + ")");
            marker.addTo(layer5B);
        }
    }
    var coordinates8 = Object.values(locations8);
    var polyline1 = L.polyline(coordinates8, { color: 'magenta' }).addTo(map);
    marker.addTo(layer5B);

     // Jalur 6A
     var locations9 = {
        "Jalur 6A 6B 10 Halte Gamping Ambarketawang": [-7.802709462572275, 110.3122037204836],
        "Jalur 6A TPB Ruko Bateman 2": [-7.800238758002371, 110.33718099219551],
        "Jalur 6A TPB Jln IKIP PGRI 1 Sonosewu": [-7.805709532359451, 110.34060339636767],
        "Jalur 6A 6B 10 TPB Mualimin": [-7.807820607418825, 110.3509487522559],
        "Jalur 2B 3B 6A 6B 8 9 10 11 13 15 Halte Tejokusuman Tamansari": [-7.807457637136658, 110.35593035753311],
        "Jalur 2B 3A 3B 6A 6B 8 9 10 11 13 15 Halte Ngabean": [-7.803630076641254, 110.35629632599264],
        "Jalur 2B 3A 6A 6B 8 10 13 15 Halte KHA Dahlan 2": [-7.800884112262622, 110.36032723655426],
        "Jalur 6A 6B 10 15 Halte Senopati 2": [-7.80120296196882, 110.36764387320949],
        "Jalur 6A 6B 10 15 TPB Jln Mayor Suryotomo 1": [-7.798896422809527, 110.3692345578283],
        "Jalur 6A 6B 10 15 TPB Teras Malioboro 2": [-7.792676226612099, 110.36751663674193],
        "Jalur 3A 6A 6B 8 10 13 15 Halte Malioboro 1": [-7.790581822210973, 110.36614427282639],
        "Jalur 3A 6A 6B 8 10 13 15 Halte Malioboro 2": [-7.795234654795902, 110.3655511629087],
        "Jalur 3A 6A 6B 8 10 13 15 Halte Malioboro 3": [-7.799736294500316, 110.3650093585163],
    };

    // Tambahkan marker untuk setiap lokasi dalam objek
    for (var locationName in locations9) {
        if (locations9.hasOwnProperty(locationName)) {
            var coord = locations9[locationName];
            var marker = L.marker(coord, { draggable: true }).addTo(map);
            marker.bindPopup(locationName + " (" + coord.toString() + ")");
            marker.addTo(layer6A);
        }
    }
    var coordinates9 = Object.values(locations9);
    var polyline1 = L.polyline(coordinates9, { color: 'Brown' }).addTo(map);
    marker.addTo(layer6A);

    // Jalur 6B
    var locations10 = {
        "Jalur 6A 6B 10 Halte Gamping Ambarketawang": [-7.802709462572275, 110.3122037204836],
        "Jalur 6B 10 TPB UMY 2": [-7.810863811155067, 110.32464817404981],
        "Jalur 6B 10 TPB Universitas Alma Ata": [-7.8182542270635915, 110.32423957509485],
        "Jalur 6B TPB Simpang Diklat DIY": [-7.8283691545830205, 110.33158682172929],
        "Jalur 6B TPB Gedung Madu Candhya 2": [-7.828381694982489, 110.34429405556489],
        "Jalur 6B Halte Pasar Legi Yogyakarta": [-7.810682810275551, 110.34969461379205],
        "Jalur 6A 6B 10 TPB Mualimin": [-7.807820607418825, 110.3509487522559],
        "Jalur 2B 3B 6A 6B 8 9 10 11 13 15 Halte Tejokusuman Tamansari": [-7.807457637136658, 110.35593035753311],
        "Jalur 2B 3A 3B 6A 6B 8 9 10 11 13 15 Halte Ngabean": [-7.803630076641254, 110.35629632599264],
        "Jalur 2B 3A 6A 6B 8 10 13 15 Halte KHA Dahlan 2": [-7.800884112262622, 110.36032723655426],
        "Jalur 6A 6B 10 15 Halte Senopati 2": [-7.80120296196882, 110.36764387320949],
        "Jalur 6A 6B 10 15 TPB Jln Mayor Suryotomo 1": [-7.798896422809527, 110.3692345578283],
        "Jalur 6A 6B 10 15 TPB Teras Malioboro 2": [-7.792676226612099, 110.36751663674193],
        "Jalur 3A 6A 6B 8 10 13 15 Halte Malioboro 1": [-7.790581822210973, 110.36614427282639],
        "Jalur 3A 6A 6B 8 10 13 15 Halte Malioboro 2": [-7.795234654795902, 110.3655511629087],
        "Jalur 3A 6A 6B 8 10 13 15 Halte Malioboro 3": [-7.799736294500316, 110.3650093585163],
    };

    // Tambahkan marker untuk setiap lokasi dalam objek
    for (var locationName in locations10) {
        if (locations10.hasOwnProperty(locationName)) {
            var coord = locations10[locationName];
            var marker = L.marker(coord, { draggable: true }).addTo(map);
            marker.bindPopup(locationName + " (" + coord.toString() + ")");
            marker.addTo(layer6B);
        }
    }
    var coordinates10 = Object.values(locations10);
    var polyline1 = L.polyline(coordinates10, { color: 'Coral' }).addTo(map);
    marker.addTo(layer6B);

    // Jalur 7
    var locations11 = {
        "Jalur 3A 3B 4A 4B 7 9 11 Halte Terminal Giwangan": [-7.83408412312758, 110.39167021180103],
        "Jalur 3A 3B 4A 4B 7 TPB Gedung SGM": [-7.8266275068189, 110.38997516497486],
        "Jalur 4A 4B 7 Halte Muhammadiyah 3":  [-7.8223251255282795, 110.38957338564904],
        "Jalur 4A 4B 7 TPB Jalan Pramuka": [-7.820415995751518, 110.3886077714881],
        "Jalur 7 Halte RSI Hidayatullah": [-7.815482462995668, 110.38776929050258],
        "Jalur 7 TPB Masjid Panembahan": [-7.813136063877682, 110.39477288270076],
        "Jalur 7 TPB Jln Ki Penjawi 1": [-7.812309292801055, 110.39611832900401],
        "Jalur 7 TPB Wisma Martha": [-7.810540931212579, 110.40100512967243],
        "Jalur 7 TPB Ketandan": [-7.810784473421029, 110.40877252343138],
        "Jalur 3A 7 TPB Blok 0": [-7.796950397137886, 110.40992424664354],
        "Jalur 1B 3A 5A 7 Halte Janti Utara": [-7.782997528399702, 110.41171188160604],
        "Jalur 1B 5A 7 Halte Mall Sahid J-Walk": [-7.779454670094937, 110.41463505241464],
        "Jalur 1B 5A 7 TPB Babarsari": [-7.773806853697642, 110.41227059309294],
        "Jalur 1B 5A 7 TPB Kledokan Babarsari": [-7.777916672784237, 110.40851468054073],
    };
    
    // Tambahkan marker untuk setiap lokasi dalam objek
    for (var locationName in locations11) {
        if (locations11.hasOwnProperty(locationName)) {
            var coord = locations11[locationName];
            var marker = L.marker(coord, { draggable: true }).addTo(map);
            marker.bindPopup(locationName + " (" + coord.toString() + ")");
            marker.addTo(layer7);
        }
    }
    var coordinates11 = Object.values(locations11);
    var polyline1 = L.polyline(coordinates11, { color: 'cyan' }).addTo(map);
    marker.addTo(layer7);

    // Jalur 8
    var locations12 = {
        "Jalur 2B 5A 5B 8 9 Halte Terminal Jombor": [-7.747388379963963, 110.36122325778749],
        "Jalur 8 TPB UTY Ringroad 2": [-7.746941664390677, 110.35658712792304],
        "Jalur 8 TPB Simpang Kronggahan 1": [-7.744361158749659, 110.34824899527516],
        "Jalur 8 TPB Westlake": [-7.749177946959374, 110.3412096806859],
        "Jalur 8 TPB RS Queen Latifa": [-7.762283413133934, 110.33670276900408],
        "Jalur 8 TPB Simpang Demak Ijo": [-7.776017865569052, 110.33212872227709],
        "Jalur 8 13 TPB McD Godean": [-7.779557758740254, 110.34377290324556],
        "Jalur 8 13 TPB Soragan": [-7.780901026919999, 110.34970300402279],
        "Jalur 8 13 TPB TJ Mangkubumi 1": [-7.78441837824178, 110.36699798443446],
        "Jalur 3A 6A 6B 8 10 13 15 Halte Malioboro 1": [-7.790581822210973, 110.36614427282639],
        "Jalur 3A 6A 6B 8 10 13 15 Halte Malioboro 2": [-7.795234654795902, 110.3655511629087],
        "Jalur 3A 6A 6B 8 10 13 15 Halte Malioboro 3": [-7.799736294500316, 110.3650093585163],
        "Jalur 2B 3A 6A 6B 8 10 13 15 Halte KHA Dahlan 1": [-7.801247347748509, 110.36005415272642],
        "Jalur 2B 3A 3B 6A 6B 8 9 10 11 13 15 Halte Ngabean": [-7.803630076641254, 110.35629632599264],
        "Jalur 8 15 TPB Pasty 2": [-7.825592273667237, 110.35460283263771],
        "Jalur 8 TPB ATK Yogyakarta": [-7.8342281586645495, 110.36243406847284],
        "Jalur 8 15 TPB Druwo": [-7.8337097201046975, 110.3663643566156],
        "Jalur 8 11 TPB Jogokaryan Farma 1": [-7.823289412477116, 110.36767915363814],
    };
    
    // Tambahkan marker untuk setiap lokasi dalam objek
    for (var locationName in locations12) {
        if (locations12.hasOwnProperty(locationName)) {
            var coord = locations12[locationName];
            var marker = L.marker(coord, { draggable: true }).addTo(map);
            marker.bindPopup(locationName + " (" + coord.toString() + ")");
            marker.addTo(layer8);
        }
    }
    var coordinates12 = Object.values(locations12);
    var polyline1 = L.polyline(coordinates12, { color: 'yellow' }).addTo(map);
    marker.addTo(layer8);

     // Jalur 9
     var locations13 = {
        "Jalur 3A 3B 4A 4B 7 9 11 Halte Terminal Giwangan": [-7.83408412312758, 110.39167021180103],
        "Jalur 9 11 TPB UAD Ringroad Selatan 2": [-7.834958791388843, 110.38294490369876],
        "Jalur 9 TPB Astra Isuzu": [-7.834641518611069, 110.36288794203963],
        "Jalur 9 15 TPB Pasty": [-7.82564718205421, 110.35446159365459],
        "Jalur 9 15 TPB Gereja Pugeran": [-7.816286519860117, 110.3559551892559],
        "Jalur 2B 3B 6A 6B 8 9 10 11 13 15 Halte Tejokusuman Tamansari": [-7.807457637136658, 110.35593035753311],
        "Jalur 2B 3A 3B 6A 6B 8 9 10 11 13 15 Halte Ngabean": [-7.803630076641254, 110.35629632599264],
        "Jalur 2B 9 11 13 TPB Pasar Serangan": [-7.800845547693048, 110.35422587217573],
        "Jalur 2B 9 11 13 Halte Cokroaminoto SMA 1": [-7.798975316325059, 110.35213926714968],
        "Jalur 2B 9 11 13 Halte SMPN11": [-7.792719711180996, 110.35343928010793],
        "Jalur 1B 2B 3B 9 11 Halte Tentara Pelajar 1": [-7.786351540563891, 110.35987217941464],
        "Jalur 9 5B TPB Grand Pasific Restoran": [-7.765238751045165, 110.36151179994644],
        "Jalur 9 5B TPB City Mall 1": [-7.753061373433205, 110.3621185911232],
        "Jalur 2B 5A 5B 8 9 Halte Terminal Jombor": [-7.747388379963963, 110.36122325778749],
    };
    
    // Tambahkan marker untuk setiap lokasi dalam objek
    for (var locationName in locations13) {
        if (locations13.hasOwnProperty(locationName)) {
            var coord = locations13[locationName];
            var marker = L.marker(coord, { draggable: true }).addTo(map);
            marker.bindPopup(locationName + " (" + coord.toString() + ")");
            marker.addTo(layer9);
        }
    }
    var coordinates13 = Object.values(locations13);
    var polyline1 = L.polyline(coordinates13, { color: 'Blue' }).addTo(map);
    marker.addTo(layer9);

     // Jalur 10
     var locations14 = {
        "Jalur 6A 6B 10 Halte Gamping Ambarketawang": [-7.802709462572275, 110.3122037204836],
        "Jalur 6B 10 TPB UMY 2": [-7.810863811155067, 110.32464817404981],
        "Jalur 6B 10 TPB Universitas Alma Ata": [-7.8182542270635915, 110.32423957509485],
        "Jalur 10 TPB Sonosewu": [-7.809725195153497, 110.33856393956007],
        "Jalur 6A 6B 10 TPB Mualimin": [-7.807820607418825, 110.3509487522559],
        "Jalur 2B 3B 6A 6B 8 9 10 11 13 15 Halte Tejokusuman Tamansari": [-7.807457637136658, 110.35593035753311],
        "Jalur 2B 3A 3B 6A 6B 8 9 10 11 13 15 Halte Ngabean": [-7.803630076641254, 110.35629632599264],
        "Jalur 2B 3A 6A 6B 8 10 13 15 Halte KHA Dahlan 2": [-7.800884112262622, 110.36032723655426],
        "Jalur 6A 6B 10 15 Halte Senopati 2": [-7.80120296196882, 110.36764387320949],
        "Jalur 6A 6B 10 15 TPB Jln Mayor Suryotomo 1": [-7.798896422809527, 110.3692345578283],
        "Jalur 2B 3A 4A 4B 5B 10 11 Halte Yos Sudarsono": [-7.786980591850023, 110.37530534259712],
        "Jalur 4B 10 TPB Lempuyangan": [-7.790390181537271, 110.37366145273482],
        "Jalur 10 TPB Lempuyangan Exit": [-7.790036031472913, 110.3773253308178],
        "Jalur 10 TPB Mako Lanal Yogyakarta": [-7.791849037285039, 110.39098606978386],
        "Jalur 4A 10 Halte TJ SMKN 5": [-7.79976941574141, 110.39519890309907],
        "Jalur 1B 4A 10 Halte Kusumanegara 4": [-7.801828862031231, 110.39334781350249],
    };
    
    // Tambahkan marker untuk setiap lokasi dalam objek
    for (var locationName in locations14) {
        if (locations14.hasOwnProperty(locationName)) {
            var coord = locations14[locationName];
            var marker = L.marker(coord, { draggable: true }).addTo(map);
            marker.bindPopup(locationName + " (" + coord.toString() + ")");
            marker.addTo(layer10);
        }
    }
    var coordinates14 = Object.values(locations14);
    var polyline1 = L.polyline(coordinates14, { color: 'Violet' }).addTo(map);
    marker.addTo(layer10);

    // Jalur 11
    var locations15 = {
        "Jalur 3A 3B 4A 4B 7 9 11 Halte Terminal Giwangan": [-7.83408412312758, 110.39167021180103],
        "Jalur 9 11 TPB UAD Ringroad Selatan 2": [-7.834958791388843, 110.38294490369876],
        "Jalur 11 TPB Pasar Telo 1": [-7.824075587280316, 110.37317624447871],
        "Jalur 8 11 TPB Jogokaryan Farma 1": [-7.823289412477116, 110.36767915363814],
        "Jalur 11 TPB Ruba Graha 1": [-7.820814625249123, 110.36200528684307],
        "Jalur 3B 8 11 Halte MT Haryono 2": [-7.813371407268862, 110.35818592747037],
        "Jalur 2B 3B 6A 6B 8 9 10 11 13 15 Halte Tejokusuman Tamansari": [-7.807457637136658, 110.35593035753311],
        "Jalur 2B 3A 3B 6A 6B 8 9 10 11 13 15 Halte Ngabean": [-7.803630076641254, 110.35629632599264],
        "Jalur 2B 9 11 13 TPB Pasar Serangan": [-7.800845547693048, 110.35422587217573],
        "Jalur 2B 9 11 13 Halte Cokroaminoto SMA 1": [-7.798975316325059, 110.35213926714968],
        "Jalur 2B 9 11 13 Halte SMPN11": [-7.792719711180996, 110.35343928010793],
        "Jalur 1B 2B 3B 9 11 Halte Tentara Pelajar 1": [-7.786351540563891, 110.35987217941464],
        "Jalur 1B 3B 11 Halte Sudirman": [-7.782710712656637, 110.36884478446387],
        "Jalur 1B 3B 4A 5B 11 Halte TJ Cik Di Tiro 2": [-7.781032713410256, 110.37519007637883],
    };
    
    // Tambahkan marker untuk setiap lokasi dalam objek
    for (var locationName in locations15) {
        if (locations15.hasOwnProperty(locationName)) {
            var coord = locations15[locationName];
            var marker = L.marker(coord, { draggable: true }).addTo(map);
            marker.bindPopup(locationName + " (" + coord.toString() + ")");
            marker.addTo(layer11);
        }
    }
    var coordinates15 = Object.values(locations15);
    var polyline1 = L.polyline(coordinates15, { color: 'navy' }).addTo(map);
    marker.addTo(layer11);

     // Jalur 13
     var locations16 = {
        "Jalur 2B 3B 6A 6B 8 9 10 11 13 15 Halte Tejokusuman Tamansari": [-7.807457637136658, 110.35593035753311],
        "Jalur 2B 3A 3B 6A 6B 8 9 10 11 13 15 Halte Ngabean": [-7.803630076641254, 110.35629632599264],
        "Jalur 2B 9 11 13 TPB Pasar Serangan": [-7.800845547693048, 110.35422587217573],
        "Jalur 2B 9 11 13 Halte Cokroaminoto SMA 1": [-7.798975316325059, 110.35213926714968],
        "Jalur 2B 9 11 13 Halte SMPN11": [-7.792719711180996, 110.35343928010793],
        "Jalur 8 13 TPB Soragan": [-7.780901026919999, 110.34970300402279],
        "Jalur 13 Halte Simpang Nogotirta": [-7.7775426520670035, 110.33436510704442],
        "Jalur 13 Halte Simpang Munggur sidomoyo": [-7.773729869256765, 110.31835983985462],
        "Jalur 13 Halte Kantor Kecamatan Godean": [-7.769140355375329, 110.30026614751088],
        "Jalur 13 Halte Kuliner Belut Godean": [-7.767343837477072, 110.2934592909851],
    };
    
    // Tambahkan marker untuk setiap lokasi dalam objek
    for (var locationName in locations16) {
        if (locations16.hasOwnProperty(locationName)) {
            var coord = locations16[locationName];
            var marker = L.marker(coord, { draggable: true }).addTo(map);
            marker.bindPopup(locationName + " (" + coord.toString() + ")");
            marker.addTo(layer13);
        }
    }
    var coordinates16 = Object.values(locations16);
    var polyline1 = L.polyline(coordinates16, { color: 'lime' }).addTo(map);
    marker.addTo(layer13);

     // Jalur 14
     var locations17 = {
        "Jalur 1B 3A 3B 5B 14 Halte Bandara Adisucipto": [-7.784196167859689, 110.43578399583164],
        "Jalur 14 Halte Kantor Kesehatan Pelabuhan Jogja": [-7.781892190757101, 110.42973536889288],
        "Jalur 3A 14 Halte Tj RRU Disnaker": [-7.769109846865241, 110.43104629059006],
        "Jalur 14 Halte SMKN 1 Depok": [-7.765016431830906, 110.43160853198208],
        "Jalur 14 Halte Man 2 Sleman": [-7.750435529237624, 110.43456939533147],
        "Jalur 14 Halte Kantor Desa Wedomartani": [-7.731126899843589, 110.4349055468756],
        "Jalur 14 Halte Simpang Kebunan": [-7.718582268170498, 110.4386062285209],
        "Jalur 14 Halte Raya Kebunan": [-7.713118932676063, 110.44285114773801],
        "Jalur 14 Halte RS Kemasan": [-7.713603487055171, 110.44776248610239],
        "Jalur 14 Halte Simpang Pasar Jangkang": [-7.701957691308313, 110.44744703225179],
        "Jalur 14 Halte SMA Negeri 2 Ngaglik": [-7.7047547584852705, 110.43502620029194],
        "Jalur 14 Halte SD Negeri 2 Selomulyo": [-7.7018762188843155, 110.42044913202926],
        "Jalur 14 Halte Kampus Terpadu UII": [-7.687099415537558, 110.41874904783089],
        "Jalur 14 Halte Raminten Boutique & Cafe": [-7.675670405631642, 110.41719303585978],
        "Jalur 14 Halte Terminal Pakem": [-7.666812755884069, 110.42015577177342],
    };
    
    // Tambahkan marker untuk setiap lokasi dalam objek
    for (var locationName in locations17) {
        if (locations17.hasOwnProperty(locationName)) {
            var coord = locations17[locationName];
            var marker = L.marker(coord, { draggable: true }).addTo(map);
            marker.bindPopup(locationName + " (" + coord.toString() + ")");
            marker.addTo(layer14);
        }
    }
    var coordinates17 = Object.values(locations17);
    var polyline1 = L.polyline(coordinates17, { color: 'burlywood' }).addTo(map);
    marker.addTo(layer14);


     // Jalur 15
     var locations18 = {
        "Jalur 15 Halte Terminal Palbapang": [-7.9052344259291205, 110.31850385451294],
        "Jalur 15 TPB SMA N 1 Bantul 2": [-7.897343606710125, 110.3229913685436],
        "Jalur 15 Halte Tugu Adipura Bantul": [-7.888986483097407, 110.32699885527923],
        "Jalur 15 TPB Pasar Bantul 2": [-7.884930433892105, 110.33096226118704],
        "Jalur 15 Halte BRI Cabang Bantul": [-7.881795848106526, 110.3323113524719],
        "Jalur 15 Halte Karanggede": [-7.874063196827854, 110.33584909248722],
        "Jalur 15 Halte Badan Kesatuan Bnagsa & Politik": [-7.856205238697589, 110.34131952873342],
        "Jalur 15 Halte Simpang Kasongan": [-7.846183336263754, 110.34451737674004],
        "Jalur 15 Halte Pasar Niten": [-7.838642468454836, 110.35053055560766],
        "Jalur 15 Halte Simpang Dongkelan": [-7.830077798706561, 110.35378137088233],
        "Jalur 9 15 TPB Pasty": [-7.82564718205421, 110.35446159365459],
        "Jalur 9 15 TPB Gereja Pugeran": [-7.816286519860117, 110.3559551892559],
        "Jalur 2B 3B 6A 6B 8 9 10 11 13 15 Halte Tejokusuman Tamansari": [-7.807457637136658, 110.35593035753311],
        "Jalur 2B 3A 3B 6A 6B 8 9 10 11 13 15 Halte Ngabean": [-7.803630076641254, 110.35629632599264],
        "Jalur 2B 3A 6A 6B 8 10 13 15 Halte KHA Dahlan 2": [-7.800884112262622, 110.36032723655426],
        "Jalur 6A 6B 10 15 Halte Senopati 2": [-7.80120296196882, 110.36764387320949],
        "Jalur 6A 6B 10 15 TPB Jln Mayor Suryotomo 1": [-7.798896422809527, 110.3692345578283],
        "Jalur 6A 6B 10 15 TPB Teras Malioboro 2": [-7.792676226612099, 110.36751663674193],
        "Jalur 3A 6A 6B 8 10 13 15 Halte Malioboro 1": [-7.790581822210973, 110.36614427282639],
        "Jalur 3A 6A 6B 8 10 13 15 Halte Malioboro 2": [-7.795234654795902, 110.3655511629087],
        "Jalur 3A 6A 6B 8 10 13 15 Halte Malioboro 3": [-7.799736294500316, 110.3650093585163],
    };
    
    // Tambahkan marker untuk setiap lokasi dalam objek
    for (var locationName in locations18) {
        if (locations18.hasOwnProperty(locationName)) {
            var coord = locations18[locationName];
            var marker = L.marker(coord, { draggable: true }).addTo(map);
            marker.bindPopup(locationName + " (" + coord.toString() + ")");
            marker.addTo(layer15);
        }
    }
    var coordinates18 = Object.values(locations18);
    var polyline1 = L.polyline(coordinates18, { color: 'teal' }).addTo(map);
    marker.addTo(layer15);


     /* Control Layer */
     var baseMaps = {
            "OpenStreetMap": basemap1,
            "Esri World Street": basemap2,
            "Esri Imagery": basemap3,
            "Stadia Dark Mode": basemap4
        };

        var overlayMaps = {
            "Jalur 1B": layer1B,
            "Jalur 2B": layer2B,
            "Jalur 3A": layer3A,
            "Jalur 3B": layer3B,
            "Jalur 4A": layer4A,
            "Jalur 4B": layer4B,
            "Jalur 5A": layer5A,
            "Jalur 5B": layer5B,
            "Jalur 6A": layer6A,
            "Jalur 6B": layer6B,
            "Jalur 7": layer7,
            "Jalur 8": layer8,
            "Jalur 9": layer9,
            "Jalur 10": layer10,
            "Jalur 11": layer11,
            "Jalur 13": layer13,
            "Jalur 14": layer14,
            "Jalur 15": layer15,

        };

        L.control.layers(baseMaps, overlayMaps, { collapsed: false }).addTo(map);

</script>
</body>
</html>