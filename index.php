<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
<meta charset="utf-8">
<title>Datta temple locations</title>
<style>
    html, body, #map-canvas {
        height: 100%;
        margin: 0;
        padding: 0;
    }

    h3 {
        margin-top: 0;
    }

    .description {
        margin-bottom: 10px;
    }


</style><?php
$ashrams = [
    [
        "name" => 'Kalagni Samana Dattatreya',
        "geometry" => [
            "location" => [
                "lat" => 12.369162,
                "lng" => 79.783092
            ]
        ],
        "zIndex" => 1,
        "photos" => [
            "/assets/images/kalagni-shamana-dattatreya-mysore.jpg"
        ],
        "description" => '',
        "contact" => <<<EOD
Sri Ganapati Sachchidananda Ashrama,
Datta Nagar, Mysore - 570 025. INDIA.

Tel: +91 (0821) 2486 486
Fax: +91 (0821) 2487 487

email : mail@dattapeetham.com
EOD

        ,
        "links" => [
            "website" => [
                "http://www.dattapeetham.com",
                "http://www.sgsbirds.com",
                "http://www.puttugam.com"
            ],
            "facebook" => [
                "https://www.facebook.com/dattapeetham",
                "https://www.facebook.com/puttugam"
            ]
        ]
    ],
    [
        "name" => 'Maya Muktavadhoota Dattatreya',
        "geometry" => [
            "location" => [
                "lat" => 12.283467,
                "lng" => 76.659047
            ]
        ],
        "zIndex" => 1,
        "photos" => [],
        "description" => "This Ashrama complex situated Madras - Pondicherry in the pictursqe setting in rural Tamil nadu is 90 minute drive from Madras. The Ashrama has Dattatreya, Ganapati & Skanda temples. The ashrama caters to the villagers from a dozen villages nearby, Doctors from Madras conduct periodical medical and health checkup camps. A large statue of Dakshinamurthy was installed recently. There is a 32 Ganapathy statued Meditation Hall in the Ashrama.",
        "contact" => <<<EOD
Sri Ganapati Sachchidananda Datta Trust
20, GST Road
Acharapakkam - 603 301
Chengelpet DT Tamil Nadu
India

EOD

        ,
        "links" => [] // {type:"",url:""}
    ],
    [
        "name" => 'Datta Yogi Raja',
        "geometry" => [
            "location" => [
                "lat" => 12.9387967,
                "lng" => 77.5440143
            ]
        ],
        "zIndex" => 1,
        "photos" => [],
//        "description" => <<<EOD
//The Ashrama here was establkished in 1981. Datta temple was established in 1988. Satsang & Homa is comnducted every Sunday. Karya Siddhi Hanuman, Shiva Linga, Maha Ganapathy and Navagrahas shrines were added later. "Purna Phala Samarpana" (dry coconut offering) to Karya Siddhi Hanuman is very popular and thousands of devotees come every day.
//In November 2006, A beautiful auditorium, KARYA SIDDHI MANTAPA" was inaugurated. It has state of art sound and light system. A new spacious Kriya Yoga hall is in first floor of the Mantapa.
//Bangalore Ashrama Trust regularly conduct rural Medical camps.
//The Matru Mandali is active and conducts regular meetings for women.
//
//EOD
//        ,
//        "contact" => <<<EOD
//Sri Ganapati Sachchidananda Ashrama
//7th cross, 3rd C main
//Girinagar II Phase, Near State Bank Colony
//Banaglore - 560 085
//Tel 080-2672 2269
//
//Mr. C.S. Narasimhan
//Executive Trustee - Tel No - 9886030134
//
//Email: mail@sgsbangalore.com
//Website - www.sgsbangalore.com
//
//VAGDEVI - a school for communication handicapped is functioning from this Ashrama. Smt.Shantha Radha Krishna, a well qualified speech pathologist is the principal of the school.
//Contact
//Phone - 080-26722830
//email - vagdevitrust@rediffmail.com
//Web - www.vagdevi.org
//
//EOD
//
//        ,
        "links" => []
        // {type:"",url:""}
    ]
];
$ashramsStr = json_encode($ashrams);
?>
<script type="text/javascript">
    var data = '<?php echo $ashramsStr; ?>';
    // Scope all the functions under datta temples
    var dt = {
        // Api key for google maps api.
        apiKey: 'AIzaSyARyBk64-eFDPKjFl1XbaLEsw7aCyWQcb4',

        initialize: function () {
            var mapOptions = {
                zoom: 8,
                center: new google.maps.LatLng(12.283479, 76.659035)
            };

            this.locations = dt.getData();

            var map = new google.maps.Map(document.getElementById('map-canvas'),
                mapOptions);

            this.setMarkers(map, dt.locations);
        },

        getData: function () {
            return $.parseJSON(data.replace(/\n/g, "\\n"));
        },

        loadScript: function () {
            var script = document.createElement('script');
            script.type = 'text/javascript';
            script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp' +
                '&callback=dt.initialize' +
                '&key=' + dt.apiKey;
            document.body.appendChild(script);
        },

        setMarkers: function (map, locations) {
            // Add markers to the map

            // Marker sizes are expressed as a Size of X,Y
            // where the origin of the image (0,0) is located
            // in the top left of the image.

            // Origins, anchor positions and coordinates of the marker
            // increase in the X direction to the right and in
            // the Y direction down.
            var image = {
                url: 'assets/images/temple.png',
                // This marker is 32 pixels wide by 37 pixels tall.
                size: new google.maps.Size(32, 36),
                // The origin for this image is 0,0.
                origin: new google.maps.Point(0, 0),
                // The anchor for this image is the indicator below the image
                anchor: new google.maps.Point(14.5, 34)
            };
            // Shapes define the clickable region of the icon.
            // The type defines an HTML &lt;area&gt; element 'poly' which
            // traces out a polygon as a series of X,Y points. The final
            // coordinate closes the poly by connecting to the first
            // coordinate.
            var shape = {
                coords: [0, 0, 0, 37, 37, 37, 37 , 0],
                type: 'poly'
            };

            for (var i = 0; i < locations.length; i++) {
                var location = locations[i];
                var myLatLng = new google.maps.LatLng(location.geometry.location.lat, location.geometry.location.lng);
                var marker = new google.maps.Marker({
                    position: myLatLng,
                    map: map,
                    icon: image,
                    shape: shape,
                    title: location.name,
                    zIndex: location.zIndex
                });

                var source = $("#info").html();
                var template = Handlebars.compile(source);
                if (location.contact) {
                    location.contact = nl2br(location.contact);
                }
                if (location.description) {
                    location.description = nl2br(location.description);
                }

                var content = template(location);

                marker.info = new google.maps.InfoWindow({
                    content: content,
                    maxWidth: 600
                });

                google.maps.event.addListener(marker, 'click', function () {
                    this.info.open(map, this);
                });
            }
        }
    };

    window.onload = dt.loadScript;

    function nl2br(str, is_xhtml) {
        var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
        return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
    }

</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="/sgs-ashrams/assets/js/handlebars-v1.3.0.js"></script>
<script id="info" type="text/x-handlebars-template">

    <div class="content">
        <h3>{{name}}</h3>

        <div class="bodyContent">
            {{#if description}}
            <div class="description">{{{description}}}</div>
            {{/if}}
            {{#if contact}}
            <div>{{{contact}}}</div>
            {{/if}}
        </div>
    </div>

    <!--    <div id="content">-->
    <!--        <div id="siteNotice"></div>-->
    <!--        <h1 id="firstHeading" class="firstHeading">Uluru</h1>-->
    <!---->
    <!--        <div id="bodyContent">-->
    <!--            <p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large-->
    <!--                sandstone rock formation in the southern part of the-->
    <!--                Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi)-->
    <!--                south west of the nearest large town, Alice Springs; 450&#160;km-->
    <!--                (280&#160;mi) by road. Kata Tjuta and Uluru are the two major-->
    <!--                features of the Uluru - Kata Tjuta National Park. Uluru is-->
    <!--                sacred to the Pitjantjatjara and Yankunytjatjara, the-->
    <!--                Aboriginal people of the area. It has many springs, waterholes,-->
    <!--                rock caves and ancient paintings. Uluru is listed as a World-->
    <!--                Heritage Site.</p>-->
    <!---->
    <!--            <p>Attribution: Uluru, <a href="http://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">-->
    <!--                    http://en.wikipedia.org/w/index.php?title=Uluru</a>-->
    <!--                (last visited June 22, 2009).</p>-->
    <!--        </div>-->
    <!--    </div>-->
</script>
</head>
<body>
<div id="map-canvas"></div>
</body>
</html>


Baroda

Sri Datta Satsang Trust
A/54, Vrindavan Park Society
VIP Road
Karelibaug
Vadodara or Baroda - 390 018
India.
Contact person: Mrs K. Rama Devi (Managing Executive Trustee)
Tel: Mobile: 98983 91342
Tel: off: 0265-2464 883
Email: sgs_vadodara@rediffmail.com
The center in Baroda consists of a small group of Datta devotes interestes in the spread of Swamiji's mission. Regular Satsangs are conducted.


Madras
12.9790615,80.2315467


Pondicherry


A beautiful Ashrama stands on the banks of Shankarabharani river. Sri Ganapathy Sachchidananda Yoga Nada Bhavanam" is a large and beautiful auditorium for meditation and is dedicated to Pujya Sri Swamiji. There are no temples in the Ashrama. Only meditation and weekly satsangs are held. Guru Nilaya, Havan Shala are there.

Contact -
Rama Rao - 0413- 2203 506
Ashrama number - 0413-654 7898

Alwaye/Cochin - Kerala
10.1274196,76.3470593,18z

Delhi

Saroop Nagar, Bhalswa
12.292482, 77.436141

Surat
21.159735, 72.770521

Kamareddy

Sri Ganapati Sachchidananda Ashramam
Rameshwarpally Road
Opp: TTD Kalyanamantapam
Kamareddy - 503 111
Andhra Pradesh

Executive Trustee
Dr. B Ishwar Das, MD
Near Railway Bridge
Kamareddy - 503 111
Tel: 3050


Bhimavaram
16.544832, 81.517720

Akividu
16.579274, 81.369120

Cuddapah
Kadapa, Andhra Pradesh, India
14.452919, 78.818920


Dharmavaram
14.422614, 77.713994

Eluru
16.722908, 81.083354

Gannavaram
16.530386, 80.784461

Gandi Gunta

Sri N.V. Subba Rao
Executive Trustee
Sri Ganapati Sachchidananda Gnana Bodha Sabha
Gandi Gunta
Vuyyaru Mandalam
Krishna District
Andhra Pradesh


Srikakulam

B.K. Surya Rao
Executive Trustee
Sri Ganapati Sachchidananda Gnana Bodha Sabha
A6, Industrial Estate
Navbharat Junction
Srikakulam - 532 004
Andhra Pradesh

Proddatur
14.757829, 78.552760

Maginapudi
16.246914, 81.231986

Machilipatnam
16.1802492,81.1363124,20

Nellore
14.430390, 79.964440

Nuzuvidu
16.770346, 80.847337

Vijayawada
16.4929343,80.6681803,21

Badampudi
16.834633, 81.478728

Cherala
15.826474, 80.342777

Warangal
18.005063, 79.590626

Kaikalur (Lokha Moodi Guruvu)
16.562416, 81.232685

Jaya Lakshmi Puram (Bommeparthy)
14.5795958,77.5900272

Anantapur, Andhra Pradesh, India
14.675290, 77.600660

Rajahmundry
16.990020, 81.776149

Guntur
16.254591, 80.335914

Hyderabad

Sri Ganapati Sachchidananda Swamiji Information Center
17.444751, 78.465531

Main Ashrama in Hyderabad
17.5942869,78.4102606,

Patancheru
17.513807, 78.288975

ADK
Pithapuram, Andhra Pradesh
17.125676, 82.258745

Kadiri
Sri Ganapati Sachchidaananda Ashramam
14.124918, 78.154311

Dilsukhnagar
BDL
Kurnool
RushiKesh
Dattagiri
Ganagapur

