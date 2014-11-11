<?php 
//echo "email: ".$_POST["email"]." formID: ".$_POST["formId"]." frmFld_Source: ".$_POST["frmFld_Source"]." lists: ".$_POST["lists"]." pageId: ".$_POST["pageId"];
$ch = curl_init();
$curlConfig = array(
    CURLOPT_URL            => "http://www.bridgemailsystem.com/pms/form/FormSubmissionHandler.jsp?isJSON=Y&email=".$_POST["email"]."&formId=".$_POST["formId"]."&frmFld_Source=". $_POST["nlsource"]."&lists=".$_POST["lists"]."&lists1=".$_POST["lists1"]."&pageId=".$_POST["pageId"],
    CURLOPT_POST           => false,
    CURLOPT_RETURNTRANSFER => true
);
//print_r($curlConfig);
curl_setopt_array($ch, $curlConfig);
$result = curl_exec($ch);
if(curl_errno($ch))
{
 echo 'Curl error: ' . curl_error($ch);
}
json_encode($result);
echo $result;
curl_close($ch);


 ?>