<?php @session_start();
session_destroy();
//if ($controls != '') $controls = str_replace('/', '', $controls);
require_once('lib/Twig/Autoloader.php');
require_once('lib/Twig/LoaderInterface.php');
require_once('mdl/classUser.php');
require_once('mdl/reqs.php');


$sessid = '-';

if (isset($_SERVER['REQUEST_URI'])) {
    $builder[0] = $_SERVER['REQUEST_URI'];
    $filters = trim($_SERVER['REQUEST_URI'], '/');
    $f = explode('/', $filters);
} else {
    $f[0] = "";
}

$theUser = new classUser();
/*
if (isset($_COOKIE['accuser'])) {
    if ((strlen($f[0]) == 40) && ($f[0]!=$_COOKIE['accuser'])) {
        $isLogin = $theUser->cekLoginStat($f[0]);
        if ($isLogin) {
            setcookie('accuser', $f[0]);
            $sessid = $f[0];
            $target = "utama";
        }
    }
    else {
        $isLogin = $theUser->cekLoginStat($_COOKIE['accuser']);
        if ($isLogin) {
            $target = $f[0];
            if (strlen($target) == 40) $target = "utama";
        }
    }
}
else {
    if (strlen($f[0]) == 40) {
        $isLogin = $theUser->cekLoginStat($f[0]);
        if ($isLogin) {
            setcookie('accuser', $f[0]);
            $sessid = $f[0];
            $target = "utama";
        }
    }
}


*/
$thePage = array();
if (isset($_POST['reqs'])) {
    $result = false;
    if (isset($_POST['chuck'])) {
        $olah = new reqs();
        $target = array("tipe" => $_POST['chuck'], "db" => "u999177855_ubyny", "tb" => "t_user");
        $result = $olah->processThis($target, $_REQUEST['reqs']);
        $_SESSION['isLogin']=1;
    }
//    echo json_encode($result);
//    session_destroy();
}

#TEMPORARY data
$pageConfig = array(
    "skin" => "no-skin",
    "headerNav" => true,
    "hasFooter" => true,
);
$breadCrumbs = array();

if (($f[0] == "#") || ($f[0] == ""))
    $fileTarget = "utama";
switch ($f[0]) {
    default:
        $pageData = array();
        $thePage = array(
            "judul" => "Media Pembelajaran SMP Sederajat",
            "media" => array(
                array(
                    "kodeMedia" => 1,
                    "judulMedia" => "Jenis-jenis kelembagaan sosial di indonesia- IPS kelas 7",
                    "pembuatMedia" => "Dita Ratna Pratiwi",
                    "tahunMedia" => "",
                    "fileMedia" => "1.jpg"
                ),
                array(
                    "kodeMedia" => 2,
                    "judulMedia" => "Kecerdasan sosial - SMP kelas 8",
                    "pembuatMedia" => "Imron Saefudin",
                    "tahunMedia" => "2016",
                    "fileMedia" => "2.png"
                ),
                array(
                    "kodeMedia" => 3,
                    "judulMedia" => "PENGARUH KEUNGGULAN LOKASI TERHADAP KOLONIALISME BARAT",
                    "pembuatMedia" => "",
                    "tahunMedia" => "",
                    "fileMedia" => "3.jpg"
                ),
                array(
                    "kodeMedia" => 4,
                    "judulMedia" => "Perawatan PC - SMK Kelas X",
                    "pembuatMedia" => "Kanzul Fikri Fauzi",
                    "tahunMedia" => "",
                    "fileMedia" => "4.jpg"
                ),
                array(
                    "kodeMedia" => 5,
                    "judulMedia" => "Rekayasa perangkat lunak - SMK kelas 12",
                    "pembuatMedia" => "Ary Santosa",
                    "tahunMedia" => "2016",
                    "fileMedia" => "5.png"
                ),
                array(
                    "kodeMedia" => 6,
                    "judulMedia" => "Teknik Telekomunikasi - SMK kelas 11",
                    "pembuatMedia" => "Imam Mudi",
                    "tahunMedia" => "2016",
                    "fileMedia" => "6.jpg"
                ),
                array(
                    "kodeMedia" => 7,
                    "judulMedia" => "Mengasah kemampuan ekonomi - SMA kelas 10",
                    "pembuatMedia" => "Jusuf Apandy",
                    "tahunMedia" => "2016",
                    "fileMedia" => "7.png"
                ),
                array(
                    "kodeMedia" => 8,
                    "judulMedia" => "menyelami fenomena sosial di masyarakat - SMA kelas 11",
                    "pembuatMedia" => "Sony Faizal",
                    "tahunMedia" => "2016",
                    "fileMedia" => "8.jpg"
                ),
                array(
                    "kodeMedia" => 9,
                    "judulMedia" => "Bahasa Inggris - SMA kelas 12",
                    "pembuatMedia" => "SIti Maisaroh",
                    "tahunMedia" => "2016",
                    "fileMedia" => "9.png"
                ),
            )
        );
        $fileTarget = "utama";
        break;
    case 'smp':
        $thePage = array(
            "judul" => "Media Pembelajaran SMP Sederajat",
            "media" => array(
                array(
                    "kodeMedia" => 1,
                    "judulMedia" => "Jenis-jenis kelembagaan sosial di indonesia- IPS kelas 7",
                    "pembuatMedia" => "Dita Ratna Pratiwi",
                    "tahunMedia" => "",
                    "fileMedia" => "1.jpg"
                ),
                array(
                    "kodeMedia" => 2,
                    "judulMedia" => "Kecerdasan sosial - SMP kelas 8",
                    "pembuatMedia" => "Imron Saefudin",
                    "tahunMedia" => "2016",
                    "fileMedia" => "2.png"
                ),
                array(
                    "kodeMedia" => 3,
                    "judulMedia" => "PENGARUH KEUNGGULAN LOKASI TERHADAP KOLONIALISME BARAT",
                    "pembuatMedia" => "",
                    "tahunMedia" => "",
                    "fileMedia" => "3.jpg"
                ),
            )
        );
        $fileTarget = "utama";
        $isActive['smp'] = 1;
        break;
    case 'sma':
        $thePage = array(
            "judul" => "Media Pembelajaran SMA Sederajat",
            "media" => array(
                array(
                    "kodeMedia" => 4,
                    "judulMedia" => "Perawatan PC - SMK Kelas X",
                    "pembuatMedia" => "Kanzul Fikri Fauzi",
                    "tahunMedia" => "",
                    "fileMedia" => "4.jpg"
                ),
                array(
                    "kodeMedia" => 5,
                    "judulMedia" => "Rekayasa perangkat lunak - SMK kelas 12",
                    "pembuatMedia" => "Ary Santosa",
                    "tahunMedia" => "2016",
                    "fileMedia" => "5.png"
                ),
                array(
                    "kodeMedia" => 6,
                    "judulMedia" => "Teknik Telekomunikasi - SMK kelas 11",
                    "pembuatMedia" => "Imam Mudi",
                    "tahunMedia" => "2016",
                    "fileMedia" => "6.jpg"
                ),
                array(
                    "kodeMedia" => 7,
                    "judulMedia" => "Mengasah kemampuan ekonomi - SMA kelas 10",
                    "pembuatMedia" => "Jusuf Apandy",
                    "tahunMedia" => "2016",
                    "fileMedia" => "7.png"
                ),
                array(
                    "kodeMedia" => 8,
                    "judulMedia" => "menyelami fenomena sosial di masyarakat - SMA kelas 11",
                    "pembuatMedia" => "Sony Faizal",
                    "tahunMedia" => "2016",
                    "fileMedia" => "8.jpg"
                ),
                array(
                    "kodeMedia" => 9,
                    "judulMedia" => "Bahasa Inggris - SMA kelas 12",
                    "pembuatMedia" => "SIti Maisaroh",
                    "tahunMedia" => "2016",
                    "fileMedia" => "9.png"
                ),
            )

        );
        $fileTarget = "utama";
        $isActive['sma'] = 1;
        break;
    case 'tag':
        $thePage = array(
            "judul" => "Ditandai"
        );
        $fileTarget = "utama";
        $isActive['tag'] = 1;

        break;
    case 'login':
        $fileTarget = "login";
        break;
}

#WAJIB
$globalVar = array(
    "namaApp" => "Sippedia",
    "namaKota" => "Sippedia",
    "namaKlien" => "",
    "copyright" => "2017"
);

$menuAdmin = array(
    array('label' => 'SMP Sederajat', 'target' => 'smp', 'icon' => 'fa-file-text-o', 'warna' => '#1F92CA', 'isActive' => @$isActive['smp']),
    array('label' => 'SMA Sederajat', 'target' => 'sma', 'icon' => 'fa-file-text-o', 'warna' => '#536DFD', 'isActive' => @$isActive['sma']),
//    array('label' => 'Ditandai', 'target' => 'tag', 'icon' => 'fa-tag', 'warna' => '#FC6800', 'isActive' => @$isActive['tag']),
);
$theUser = array(
    "namaUser" => "Ciprut",
    "fotoUser" => "faisal.jpg"
);
#SUNNAH
$notifikasi = array();
$mailBox = array();
$rightPanel = array();

/*Struktur File
base address: https://stock.schoolmedia.id/ppdb23/
- Profile: profpic
- Foto Siswa: foto
- Dokumen Upload: uploads
- Dokumen Download: downloads
- Zip Generated: zips
*/


Twig_Autoloader::register();
//$loader = new Twig_Loader_Filesystem(array('views', 'views/el', 'views/sikad', 'views/elements', 'jsc'));
$loader = new Twig_Loader_Filesystem(array('views', 'views/umum', 'views/admin', 'views/elements'));
$twig = new Twig_Environment($loader, array(
    'cache' => '/tmp',
    'auto_reload' => true,
    'debug' => true
));

$filter = new Twig_SimpleFunction('linkThis', function (Twig_Environment $env, $string, $href = '#', $target = '_blank') {
    $ini = new Twig_Compiler($env);
    $link = '<a href="' . $href . '" target="' . $target . '">' . $string . '</a>';
    return $link;
}, array('needs_environment' => true));

$twig->addFunction($filter);
$twig->addExtension(new Twig_Extension_Debug());


/*
 * ISI HALAMAN
 * I. Wajib
 *      - Menu
 *      - Bread
 *      - Foto
 *      - Nama User
 *  II. Sunnah
 *      - Notifikasi
 *      - Pesan
 *      - Right Panel
 *
 *  III. Format Data
 *      - Table
 *      - Form
 *      - Free Format
 *  IV. Preformatted Element
 *      - Buttons (Save, Edit, Cancel, Delete, New)
 *      - Table (akan selalu datatables, no excuse)
 *
 *
 */
$thePage["isLogin"]=@$_SESSION['isLogin'];

echo $twig->render($fileTarget . ".phtml", array(
    "globalVar" => $globalVar,
    "menus" => $menuAdmin,
    "breads" => $breadCrumbs,
    "userData" => $theUser,
    "mailBox" => $mailBox,
    "thePage" => $thePage,
    "pageConfig" => $pageConfig,
));
/*
$pageConfig = $theUser->getUserMenu($target, $f);
if ($pageConfig->pageContent) {
//    echo json_encode($leftMenu);
//    die();
}
$content = $pageConfig->pageContent;

if (isset($content->isTwig)) {
    if ($content->isTwig)
        echo $twig->render($pageConfig->pageTarget . '.phtml', array("thePage" => $pageConfig));
    else  echo json_encode($pageConfig->pageContent);
}
else {
    echo $twig->render($pageConfig->pageTarget . '.phtml', array("thePage" => $pageConfig));

}*/
?>