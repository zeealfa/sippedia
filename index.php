<?php @session_start();
//if ($controls != '') $controls = str_replace('/', '', $controls);
require_once('lib/Twig/Autoloader.php');
require_once('lib/Twig/LoaderInterface.php');
require_once('mdl/classUser.php');
//require_once('mdl/reqs.php');


$sessid = '-';
$isLogin = false;
if (isset($_SERVER['PATH_INFO'])) {
    $builder[0] = $_SERVER['PATH_INFO'];
    $filters = trim($_SERVER['PATH_INFO'], '/');
    $f = explode('/', $filters);
} else {
    $f[0] = "utama";
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

if (!$isLogin)
    header("location:https://schoolmedia.id");

if (isset($_POST['reqs'])) {
    $result = false;
    if (isset($_SESSION[$_POST['chuck']])) {
        $olah = new reqs();
        $target = $_SESSION[$_POST['chuck']];
//        echo json_encode($target);
//        die();


        $result = $olah->processThis($target, $_REQUEST['reqs']);
    }
    echo json_encode($result);
//    session_destroy();
    die();
}
*/

#TEMPORARY data
$pageConfig = array(
    "skin" => "no-skin",
    "headerNav" => true,
    "hasFooter" => true,
);
$breadCrumbs = array();
$thePage = array();

if (($f[0] == "#") || ($f[0] == ""))
    $fileTarget = "utama";

switch ($f[0]) {
    default:
        $pageData = array();
        $fileTarget = $f[0];
        break;
    case 'berandaAdmin':
        $fileTarget = 'standar';
        $breadCrumbs = array(
            array('label' => 'Beranda', 'target' => 'berandaAdmin'),
        );
        $thePage = array(
            "judul" => "Judul Halaman",
            "subJudul" => "Sub Judul Halaman",
            "rows" => array(
                array(
                    "divs" => array(
                        array(
                            "displayType" => "tabel",
                            "displayKomponen" => array(//Menyesuaikan display Type
                                "judulTabel" => "Contoh Tabel",
                                "headerTabel" => array("No", "Nama", "Alamat", "Kontrol"),
                                "dataTabel" => array(
                                    array("1", "Ciprut", "Jalan", "OK"),
                                    array("2", "alei", "VBI", "OKOK"),
                                    array("3", "Cita", "VBI 2", "Cancel"),
                                )
                            )
                        )
                    )
                )
            ),
        );
        break;
    case 'tabelPage':
        $fileTarget = 'standar';
        $breadCrumbs = array(
            array('label' => 'Halaman Tabel', 'target' => 'tabelPage'),
        );
        $thePage = array(
            "judul" => "Untuk Tabel",
            "subJudul" => "Sub Judul Tabel",
            "rows" => array( #untuk row lebih dari 1
                array("idName" => 1, "divs" => array(
                    array("className" => "col-xs-6",
                        "idName" => "div1",
                        "displayType" => "tabel",
                        "displayKomponen" => array(//Menyesuaikan display Type
                            "judulTabel" => "Contoh Tabel",
                            "headerTabel" => array("No", "Nama", "Alamat", "Kontrol"),
                            "dataTabel" => array(
                                array("1", "Ciprut", "Jalan", "OK"),
                                array("2", "alei", "VBI", "OKOK"),
                                array("3", "Cita", "VBI 2", "Cancel"),
                            )
                        )
                    ),
                    array("className" => "col-xs-3",
                        "idName" => "div1",
                        "displayType" => "tabel",
                        "displayKomponen" => array(//Menyesuaikan display Type
                            "judulTabel" => "Contoh Tabel",
                            "headerTabel" => array("No", "Nama", "Alamat", "Kontrol"),
                            "dataTabel" => array(
                                array("1", "Ciprut", "Jalan", "OK"),
                                array("2", "alei", "VBI", "OKOK"),
                                array("3", "Cita", "VBI 2", "Cancel"),
                            )
                        )
                    )
                )),#row pertama
                array("idName" => 1, "divs" => array(
                    array("className" => "col-xs-4",
                        "idName" => "div1",
                        "displayType" => "tabel",
                        "displayKomponen" => array(//Menyesuaikan display Type
                            "judulTabel" => "Contoh Tabel",
                            "headerTabel" => array("No", "Nama", "Alamat", "Kontrol"),
                            "dataTabel" => array(
                                array("1", "Ciprut", "Jalan", "OK"),
                                array("2", "alei", "VBI", "OKOK"),
                                array("3", "Cita", "VBI 2", "Cancel"),
                            )
                        )
                    ),
                    array("className" => "col-xs-8",
                        "idName" => "div2",
                        "displayType" => "widget",
                        "displayKomponen" => array(//Menyesuaikan display Type
                            "judulWidget" => "Contoh Widget",
                            "idName" => "theWid",
                            "isiWidget" => array(
                                "displayType" => "tabel",
                                "displayKomponen" => array(//Menyesuaikan display Type
                                    "judulTabel" => "Contoh Tabel",
                                    "headerTabel" => array("No", "Nama", "Alamat", "Wid Kontrol"),
                                    "className" => "",
                                    "idName" => "tabelWid",
                                    "dataTabel" => array(
                                        array("1", "Ciprut", "Jalan", "OK"),
                                        array("2", "alei", "VBI", "OKOK"),
                                        array("3", "Cita", "VBI 2", "Cancel"),
                                    )
                                )
                            )
                        )
                    )
                )),#row kedua
            )
        );
        break;
    case "formPage":
        $fileTarget = "forms";
        $breadCrumbs = array(
            array('label' => 'Halaman Tabel', 'target' => 'tabelPage'),
        );
        $thePage = array(
            "judul" => "Judul Halaman",
            "subJudul" => "Sub Judul Halaman",
            "displayType" => "tabel",
            "displayKomponen" => array(//Menyesuaikan display Type
                "judulTabel" => "Contoh Tabel",
                "headerTabel" => array("No", "Nama", "Alamat", "Kontrol"),
                "dataTabel" => array(
                    array("1", "Ciprut", "Jalan", "OK"),
                    array("2", "alei", "VBI", "OKOK"),
                    array("3", "Cita", "VBI 2", "Cancel"),
                )
            )
        );

        #customisasi page
        $pageConfig['headerNav'] = false;
        $pageConfig['hasFooter'] = false;
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
    array('label' => 'Playgroup/TK', 'target' => '', 'icon' => 'fa-file-text-o','warna'=>'#5ABA02'),
    array('label' => 'SD Sederajat', 'target' => '', 'icon' => 'fa-file-text-o','warna'=>'#ED3A3D'),
    array('label' => 'SMP Sederajat', 'target' => '', 'icon' => 'fa-file-text-o','warna'=>'#1F92CA'),
    array('label' => 'SMA Sederajat', 'target' => '', 'icon' => 'fa-file-text-o','warna'=>'#536DFD'),
    array('label' => 'Ditandai', 'target' => '', 'icon' => 'fa-tag','warna'=>'#FC6800'),
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
    'cache' => '/var/www/html/sikadfour/local/cache',
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
echo $twig->render($fileTarget . ".phtml", array(
    "globalVar" => $globalVar,
    "menus" => $menuAdmin,
    "breads" => $breadCrumbs,
    "userData" => $theUser,
    "mailBox" => $mailBox,
    "thePage" => $thePage,
    "pageConfig" => $pageConfig
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