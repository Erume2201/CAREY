<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
#EAAVGT4WoqeIBAFBctWYj9EqjqU54YeR0xqcJNd8AsjP9pp2P6g5jY5TxUI43977m4UsjRxZCNns3IZABemehGzkrjjLaoKE5wn4DZC0mm6KjYWA8XxeIwoat8ZAdusP7XiKBZCKHOmNJWLL1E1Bj3Upc5TyBrWzDMvfTPn2BvcA7GBGYXcoqZA
if (isset($_POST['NumeroRecivido'])) {
    $telefonoRecivido = $_POST['NumeroRecivido'];
    $telefono='523'.$telefonoRecivido;
}
$token = "EAAVGT4WoqeIBAFBctWYj9EqjqU54YeR0xqcJNd8AsjP9pp2P6g5jY5TxUI43977m4UsjRxZCNns3IZABemehGzkrjjLaoKE5wn4DZC0mm6KjYWA8XxeIwoat8ZAdusP7XiKBZCKHOmNJWLL1E1Bj3Upc5TyBrWzDMvfTPn2BvcA7GBGYXcoqZA";


$url = 'https://graph.facebook.com/v17.0/102187289605465/messages';

$mensaje = json_encode([
    "messaging_product" => "whatsapp",
    "to" => $telefono,
    "type" => "template",
    "template" => [
        "name" => "hello_world",
        "language" => ["code" => "en_US"]
    ]
]);

$headers = array(
    "Authorization: Bearer " . $token,
    "Content-Type: application/json"
);

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $mensaje);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$response = json_decode(curl_exec($curl), true);
$status_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

if ($status_code !== 200) {
    echo "<script>window.location = '../../index.php?module=ventaSemanal&EnvioWhatsApp=NoRealizado'</script>";

}else{
    echo "<script>window.location = '../../index.php?module=ventaSemanal&EnvioWhatsApp=Realizado'</script>";
}

curl_close($curl);

?>
