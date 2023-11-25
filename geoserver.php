<?php
// $wfsUrl =
//file_get_contents("http://www.opengis.net/ows https://geoportal.slemankab.go.id/geoserver/schemas/ows/1.0.0/owsExceptionReport.xsd");

# Ubah URL pada file_get_contents sesuai alamat file pada geoserver
$wfsUrl =
file_get_contents("http://geoportal.jogjaprov.go.id/geoserver/ows?service=WFS&version=1.0.0&request=GetFeature&typename=geonode%3AJALANPROVINSIDIY_LN_JAWA_50K&outputFormat=json&srs=EPSG%3A4326&srsName=EPSG%3A4326");

header('Content-type: application/json');
echo ($wfsUrl);
# Jika terdapat &maxFeatures=50 pada url wfs geojson, dihapus supaya jumlah feature tidak dibatasi

?>