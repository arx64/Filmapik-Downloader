<?php
//error_reporting(0);
system("clear");
function search($q){
// Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://filmapik.stream/?s='.$q.'');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

$headers = array();
$headers[] = 'Authority: filmapik.stream';
$headers[] = 'Pragma: no-cache';
$headers[] = 'Cache-Control: no-cache';
$headers[] = 'Sec-Ch-Ua: \" Not A;Brand\";v=\"99\", \"Chromium\";v=\"98\"';
$headers[] = 'Sec-Ch-Ua-Mobile: ?1';
$headers[] = 'Sec-Ch-Ua-Platform: \"Android\"';
$headers[] = 'Upgrade-Insecure-Requests: 1';
$headers[] = 'Dnt: 1';
$headers[] = 'User-Agent: Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.89 Mobile Safari/537.36';
$headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9';
$headers[] = 'Sec-Fetch-Site: same-origin';
$headers[] = 'Sec-Fetch-Mode: navigate';
$headers[] = 'Sec-Fetch-User: ?1';
$headers[] = 'Sec-Fetch-Dest: document';
$headers[] = 'Referer: https://filmapik.stream/';
$headers[] = 'Accept-Language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7';
//$headers[] = 'Cookie: starstruck_38d98ee3e5f9bb04ae51447da9ef3d02=a124510826dd55a4831ec08e6e55d237';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
} else {
	//echo $result;
	}
curl_close($ch);
// for grab url
$re = '/<div class="thumbnail animation-2"> <a href="(.*?)">/m';
preg_match_all($re, $result, $matches, PREG_SET_ORDER, 0);
// end grab url

//Print the entire match result
/*
echo count($matches);
 */

// akhir dari grab
// untuk menampilkan data dari array,looping menggunakan for
for($i=0;$i<count($matches);$i++){
//$c = $i+1;
$url = $matches[$i][1]."/play";
$hapuschar = str_replace(array("nonton", "https://filmapik.stream/", "/play"), "", $url);
$nama_film = "Download".str_replace("-", " ", $hapuschar);
//var_dump($matches[0]);

// tes regex tvshows
if(!preg_match('/tvshows\//m', $nama_film)){
echo "\n[$i] $nama_film\n";
}

//searchLinkDown($url);
}
echo "\nEnter The Number: ";
$in = trim(fgets(STDIN));
//$nomor = $in-1;
$newurl = "".$matches[$in][1]."/play";
//print_r($newurl);
searchLinkDown($newurl);
//end function
}

function searchLinkDown($u){
// Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, ''.$u.'');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$headers = array();
$headers[] = 'Pragma: no-cache';
$headers[] = 'Cache-Control: no-cache';
$headers[] = 'Sec-Ch-Ua: \" Not A;Brand\";v=\"99\", \"Chromium\";v=\"98\"';                                     $headers[] = 'Sec-Ch-Ua-Mobile: ?1';
$headers[] = 'Sec-Ch-Ua-Platform: \"Android\"';         $headers[] = 'Upgrade-Insecure-Requests: 1';            $headers[] = 'Dnt: 1';                                  $headers[] = 'User-Agent: Mozilla/5.0 (Linux; Android 11; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.89 Mobile Safari/537.36';                 $headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9';
$headers[] = 'Sec-Fetch-Site: same-origin';             $headers[] = 'Sec-Fetch-Mode: navigate';                $headers[] = 'Sec-Fetch-User: ?1';
$headers[] = 'Sec-Fetch-Dest: document';
$headers[] = 'Referer: https://fa.efek.stream/';
$headers[] = 'Accept-Language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7';
//$headers[] = 'Cookie: starstruck_38d98ee3e5f9bb04ae51447da9ef3d02=a124510826dd55a4831ec08e6e55d237';
$headers[] = 'X-Requested-With: com.facebook.katana';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);
$re = '/<a class="myButton" href="https:\/\/fa.efek.stream\/v\/(.*?)" title="Download" target="_blank"><i class="fa fa-download" aria-hidden="true"><\/i> VIP 360p\/720p\/1080p<\/a>/m';
preg_match_all($re, $result, $matches, PREG_SET_ORDER, 0);

/* Print the entire match result
	//var_dump($matches);
 */
for($i=0;$i<count($matches);$i++){
	$linkDown = "https://fa.efek.stream/v/".$matches[$i][1];
	//echo "Link: $linkDown\n\n";
	getDown($linkDown);
}	
// end function
}

function getDown($url){
// Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, ''.$url.'');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 'referer: https://fa.efek.stream/');

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);
$re = '/<a href="(.*?)" onclick="ButtonClicked\(\)">(.*?)<\/a>/m';
preg_match_all($re, $result, $matches, PREG_SET_ORDER, 0);
// Print the entire match result
//var_dump($matches);
$re1 = '/<div class="title">(.*?)<\/div>/m';            preg_match_all($re1, $result, $nama, PREG_SET_ORDER, 0);
// Print the entire match result
//var_dump($nama);
$nama_filter = str_replace(array("</br>", "DOWNLOAD ", ":"), "", $nama[0][1]).".mp4";
$nama_film = $nama_filter;
//echo $nama_filter;
//die();
for($i=0;$i<count($matches);$i++){
	$c = $i+1;
	$link = "".$matches[$i][1];
	$resolusi = str_replace("Reoslusi", "Resolusi", $matches[$i][2]);
	//$link = "https://fa.efek.stream/";
	if(!preg_match('/https:\/\/(.*?).efek.stream/m', $link)){
		$link = "https://fa.efek.stream".$link;
		//echo "tes";
	}
	echo "[$c] $resolusi\nLink: $link\n\n";
}
	echo "Masukkan nomor resolusi film yang akan di-download (Misal: 1/2/3): ";
$input = trim(fgets(STDIN));
$no = $input-1;
$ling = $matches[$no][1];
if(!preg_match('/https:\/\/(.*?).efek.stream/m', $ling)){
	$ling = "http://fa.efek.stream$ling";
	//echo "Link Found!";
}
echo "Link: $ling\n";
/*
if(file_exists($nama_film)){
	file_exist($nama_film);
}
 */
function takon_neh($jeneng){                            echo "Success download $jeneng, want to download another film? (Y/n): ";
$takon = strtolower(trim(fgets(STDIN)));
if($takon == "y"){                                              main();                                         } elseif($takon == "n"){
        die("Thanks for use this tools!");              } else {                                                        return invalid_option();                        }                                                       }
function invalid($nama_film, $ling){
	echo "Invalid Option,Try Again!\n";                     //echo "File $nama_film sudah ada,ingin melanjutkan download? (Y/n): ";            
	file_exist($nama_film, $ling);
}
function file_exist($nama_film, $ling){
	echo "File $nama_film exists,do you want to continue? (Y/n): ";
	$takon = strtolower(trim(fgets(STDIN)));                if($takon == "y"){
	system("wget --tries=42 -O '$nama_film' $ling --referer='https://fa.efek.stream/' --no-check-certificate -c");
	takon_neh($nama_film);
	} elseif($takon == "n"){
		system("wget -nc --tries=42 -O '$nama_film' $ling --referer='https://fa.efek.stream/' --no-check-certificate");
		takon_neh($nama_film);
	} else {                                                        return invalid($nama_film, $ling);                        }
	
}
if(file_exists($nama_film)){                                    file_exist($nama_film, $ling);                         } else {
system("wget --tries=42 -O '$nama_film' $ling --referer='https://fa.efek.stream/' --no-check-certificate");
takon_neh($nama_film);

}

function invalid_option(){
	echo "Invalid Option,Try Again!\n";
	echo "Want to download another film? (Y/n): ";
	$takon = strtolower(trim(fgets(STDIN)));
	answer($takon);
}

function answer($takon){
if($takon == "y"){
	main();                                         } elseif($takon == "n"){                                        die("Thanks for use this tools!\n");              } else {                                                        return invalid_option();                        }
}

/*
function takon_neh($jeneng){
echo "Success download $jeneng, want to download another film? (Y/n): ";
$takon = strtolower(trim(fgets(STDIN)));
if($takon == "y"){
	main();
} elseif($takon == "n"){
	die("Thanks for use this tools!");
} else {
	return invalid_option();
}
}
 */
//echo "Link: $new_link";
// end function
}

function main(){
// for cli based:
$ascii = "???????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????? ??????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????";
echo "  $ascii  \n\nKeyword: ";
$keyword = urlencode(trim(fgets(STDIN)));
search($keyword);
}

main();
?>
