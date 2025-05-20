<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
include('db.php'); // Include database connection

if (!isset($_SESSION['register_number'])) {
    header("Location: index.php");
    exit();
}

$register_number = $_SESSION['register_number'];

$sql = "SELECT * FROM students WHERE register_number = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $register_number);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows >= 1) {
    $student = $result->fetch_assoc();
} else {
    echo "Error fetching student data!";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VAAGAI TAMIL SANGAM | HALL TICKET</title>
    <link rel="icon" href="vts logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <style>
        @font-face {
            font-family: 'ATM 005';
            src: url('ATM 005.ttf');
        }

        * {
            font-family: 'ATM 005';
            font-size: 14px;
        }

        /* Force the table to have a fixed width on all devices */
        #form {
            width: 100%;
            table-layout: fixed;
            border: 2px solid black;
            /* Ensures that columns have fixed width */
        }

        #format {
            text-align: center;
            /* Align text to center for better layout */
        }

        #oform {
            width: 100%;
            table-layout: fixed;
            /* Ensures that columns have fixed width */
        }

        #oformat {
            text-align: left;
            /* Align text to center for better layout */
        }

        #sqr {
            width: 30px;
            /* Set width */
            height: 30px;
            /* Set height, same as width */
            background-color: #fff;
            /* Optional: background color */
            border: 2px solid black;
        }

        #sqrs {
            width: 16px;
            /* Set width */
            height: 16px;
            /* Set height, same as width */
            background-color: #fff;
            /* Optional: background color */
            border: 1px solid black;
        }

        .photo {
            float: right;
            width: 138px;
            height: 177px;
            border: 1px solid #000;
            text-align: center;
            justify-content: center;
            padding-top: 20%;
        }

        #box {
            width: 100%;
            /* Set width */
            height: 235px;
            /* Set height, same as width */
            background-color: #fff;
            /* Optional: background color */
            border: 2px solid black;
        }

        .box {
            width: 20px;
            height: 20px;
            border: 2px solid black;
            display: inline-block;
        }

        .print-button {
            margin-top: 20px;
            text-align: center;

        }

        .print-button button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 15px;
        }

        .print-button button:hover {
            background-color: #45a049;
        }

        footer {
  background-color: #777;
  padding: 10px;
  text-align: center;
  color: white;
  width: 100vw; /* Full viewport width */
  position: relative; /* Optional: to stay within layout */
}


        /* Hide the print button when printing */
        @media print {
            .print-button {
                display: none;

            }

        }

        #page-1,
        #page-2,
        #page-3,
        #page-4,
        #page-5,
        #page-6,
        #page7 {
            border: 2px solid black;
        }


        #aformat {
            text-align: center;
            /* Align text to center for better layout */
        }

        #aform {
            width: 20%;
            table-layout: fixed;
            /* Ensures that columns have fixed width */
        }
        body{
            margin: 10px auto;
            padding: 5px;
            width: 90%;
            height: 1123px;
        }
    </style>

    <!--page1-begins-->
    <div id="page-1">
        <!--page1-begins-->
        <div class="card" id="main">
            <!--main body begins-->
            <div class="card-body ">
                <!--add body begins-->
                <div class="card ">
                    <div class="card-body" style="display: flex; justify-content:center; align-items: center;">
                        <!-- Image aligned to the left with bigger size -->
                        <div class="row">
                            <div class="col-6"><img src="vts logo.png" alt="Logo" class=" w-50 img-fluid"></div>
                            <div class="col-6 d-flex justify-content-center align-items-center bg-light">
                                <div  class="fs-2 fs-sm-5 fs-md-4 fs-lg-3 fs-xl-2 fs-xxl-1">
                                    <h2 class="text-danger w-100   text-center" style="font-weight: bolder;">
                                         வாகை தமிழ்ச்சங்கம்
                                    </h2>
                                    <p  class="w-100  d-flex justify-content-center  text-center" >
                                       
                                        அத்தனூர் வடக்கு, அத்தனூர், நாமக்கல், தமிழ்நாடு, இந்தியா – 636301 <br>
                                        vaagaitamilsangam@gmail.com <br>
                                        பாடத்திட்டம், மதிப்பீடு மற்றும் கல்வி ஆலோசனைக்குழு - இறுதித்தேர்வு 2024
                                    </p>
                                </div>
                            </div>
                        </div>


                        <!-- Text aligned to the right center -->

                    </div>
                    <div class="text-light text-center fs-lg-6" style="background-color: rgb(4, 23, 80);">
                        <h5 style="font-weight: 800;">படிவம் 01 - தரவுப்பட்டியல் படிவம் </h5>
                    </div>
                    <!----->
                    <div style="margin: 10px;">
                        <table>
                            <tr>
                                <td>1.வகுப்புக் குறியீடு & பெயர்</td>
                                <td class="text-start">:&nbsp;<?php echo $student['course_code'] . "  /  " . $student['course_name']; ?></td>
                            </tr>
                            <br>
                            <tr>
                                <td>2.விண்ணப்ப எண்</td>
                                <td class="text-start">:&nbsp;<?php echo $student['app_no']; ?></td>
                            </tr>
                            <tr>
                                <td>3.வகுப்புப் பதிவு எண்</td>
                                <td>:&nbsp;<?php echo $student['register_number']; ?></td>
                            </tr>
                            <tr>
                                <td rowspan="1">4. மாணவர் பெயர் (தமிழில்)<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(ஆங்கிலத்தில்)
                                </td>
                                <td class="test-start">:&nbsp;<?php echo $student['name_tamil'] . "<br>:&nbsp;" . $student['name_english']; ?></td>
                            </tr>
                            <tr>
                                <td>5. பிறந்த தேதி</td>
                                <td class="text-start">:&nbsp;<?php echo $student['dob']; ?></td>
                            </tr>
                            <tr>
                                <td>6. அலைபேசி எண் :</td>
                                <td class="text-start">:&nbsp;<?php echo $student['phone_no']; ?></td>
                            </tr>
                            <tr>
                                <td>7. இணைக்கப்பட்ட படிவங்களின் விவரம் [✓] குறியிடவும்.</td>
                            </tr>

                            <tr>
                                <table id="form" class="table table-responsive table-bordered">
                                    <tr>
                                        <td id="format">
                                            <p style="font-size: smaller;">படிவம் 01</p>
                                        </td>
                                        <td id="format">
                                            <p style="font-size: smaller;">படிவம் 02</p>
                                        </td>
                                        <td id="format">
                                            <p style="font-size: smaller;">படிவம் 03</p>
                                        </td>
                                        <td id="format">
                                            <p style="font-size: smaller;">படிவம் 3A</p>
                                        </td>
                                        <td id="format">
                                            <p style="font-size: smaller;">படிவம் 04</p>
                                        </td>
                                        <td id="format">
                                            <p style="font-size: smaller;">படிவம் 05</p>
                                        </td>
                                        <td id="format">
                                            <p style="font-size: smaller;">படிவம் 06</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td id="format"><br></td>
                                        <td id="format"></td>
                                        <td id="format"></td>
                                        <td id="format"></td>
                                        <td id="format"></td>
                                        <td id="format"></td>
                                        <td id="format"></td>
                                    </tr>
                                </table>
                                <td style="text-align:justify;font-size:smaller;">8. மேற்கூறிய அனைத்து தகவல்களும் சரியே. வாகை தமிழ்ச்சங்கத்தின்
                                    பாடத்திட்டம் , மதிப்பீடு மற்றும் கல்வியாலோசனைக் குழுவின் இணையவழிக்கல்வி விதிகள் மற்றும்
                                    செயல்பாடுகள் ஆகியவற்றைப் புரிந்துகொண்டு அதன் வழி தேர்வெழுதினேன் என உறுதியளிக்கிறேன்
                                    .
                                </td>
                            </tr>
                        </table>
                        <br><br><br><br><br><br><br><br>
                        <div class="row">
                            <div class="col"> தேதி : <?php echo date('d-m-Y'); ?> 
                            </div>
                            <div class="col" style="text-align: end;"> தேர்வரின் கையொப்பம் <br><br><br><br></div>
                        </div>
                    </div>
                    <!--add body ends-->
                </div>
                <!--Office use-->
                <div class="card">
                    <div class="card-body">
                        <p class="text-center"><u>அலுவலகப்பயன்பாட்டிற்கு மட்டும்</u></p>
                        <table id="oformat">
                            <tr id="oform">
                                <td>விடைத்தாள் கிடைக்கப்பெற்ற நாள்</td>
                                <td>:&nbsp;</td>
                            </tr>
                            <tr id="oform">
                                <td>ஏதேனும் முறைகேடு / சேதங்கள் / பிழைகள்</td>
                                <td>:&nbsp;ஆம் / இல்லை</td>
                            </tr>
                        </table>
                        <br>
                        <div class="d-flex justify-content-center">
                            <table>
                                <tr>
                                    <td>
                                        <table style=" width: 95%;table-layout: fixed;border:2px solid black;"
                                            class="text-center table-bordered">
                                            <th>தற்காலிக பதிவுஎண்</th>
                                            <tr>
                                                <td><br></td>
                                            </tr>
                                        </table>


                                    </td>
                                    <td>
                                        <table style=" width: 95%;table-layout: fixed;border:2px solid black;"
                                            class="text-center table-bordered">
                                            <th>மதிப்பெண்கள் (100)</th>
                                            <tr>
                                                <td><br></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <br>
                            </table>
                        </div>
                        <br><br><br><br><br>
                        <div class="row">
                            <div class="col-6 text-center">பொறுப்பாளர்</div>
                            <div class="col-6 text-center">தலைவர் / தலைமைப் புரவலர்</div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <!--main body ends-->
    <!--page1-ends-->
    <!--page2-begins-->
    <div id="page-2">
        <!--page2-begins-->
        <div class="card" id="main">
            <!--main body begins-->
            <div class="card-body">
                <!--add body begins-->
                <div class="card">
                    <div class="card-body" style="display: flex; justify-content: flex-start; ">
                        <!-- Image aligned to the left with bigger size -->
                        <div class="row">
                            <div class="col-6"><img src="vts logo.png" alt="Logo" class=" w-50 img-fluid"></div>
                            <div class="col-6 d-flex justify-content-center align-items-center bg-light">
                                <div  class="fs-2 fs-sm-5 fs-md-4 fs-lg-3 fs-xl-2 fs-xxl-1">
                                    <h2 class="text-danger w-100   text-center" style="font-weight: bolder;">
                                         வாகை தமிழ்ச்சங்கம்
                                    </h2>
                                    <p  class="w-100  d-flex justify-content-center  text-center" >
                                       
                                        அத்தனூர் வடக்கு, அத்தனூர், நாமக்கல், தமிழ்நாடு, இந்தியா – 636301 <br>
                                        vaagaitamilsangam@gmail.com <br>
                                        பாடத்திட்டம், மதிப்பீடு மற்றும் கல்வி ஆலோசனைக்குழு - இறுதித்தேர்வு 2024
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class=" text-light text-center" style="background-color: rgb(4, 23, 80);">
                    <h5 style="font-weight: 800;">படிவம் 02 – மதிப்பீட்டுப் பெறுகைப் படிவம்</h5>
                </div>
                <div style="margin: 10px;">
                    <table>
                        <tr>
                            <td>1.வகுப்புக் குறியீடு & பெயர்</td>
                            <td class="text-start">:&nbsp;<?php echo $student['course_code'] . "  /  " . $student['course_name']; ?></td>
                        </tr>
                        <br>
                        <tr>
                            <td>2.விண்ணப்ப எண்</td>
                            <td class="text-start">:&nbsp;<?php echo $student['app_no']; ?></td>
                        </tr>
                        <tr>
                            <td>3.வகுப்புப் பதிவு எண்</td>
                            <td>:&nbsp;<?php echo $student['register_number']; ?></td>
                        </tr>
                        <tr>
                            <td rowspan="1">4. மாணவர் பெயர் (தமிழில்)<br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(ஆங்கிலத்தில்)
                            </td>
                            <td class="test-start">:&nbsp;<?php echo $student['name_tamil'] . "<br>:&nbsp;" . $student['name_english']; ?></td>
                        </tr>
                        <td>5. மொத்தம் எழுதிய பக்கங்களின் எண்ணிக்கை &nbsp;&nbsp;</td>
                        <td>
                            <div id="sqr">
                            </div>
                        </td>
                    </table>
                </div>
                <!--Office use-->
                <div class="card">
                    <div class="card-body">
                        <p class="text-center"><u>மதிப்பீட்டாளர் பயன்பாட்டிற்கு மட்டும்</u></p>
                        <table id="oformat">
                            <tr id="oform">
                                <td>1. தற்காலிகப் பதிவுஎண்</td>
                                <td>:</td>
                            </tr>
                            <tr id="oform">
                                <td> 2. மொத்தம் எழுதப்பட்ட பக்கங்கள் </td>
                                <td>:</td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-body">
                        <p class="text-center"><u>மதிப்பெண் பட்டியல்</u></p>
                        <table id="form" class="table table-responsive table-bordered">
                            <tr>
                                <td id="format">
                                    <p style="font-size: smaller;">வினா எண்</p>
                                </td>
                                <td id="format">
                                    <p style="font-size: smaller;">1</p>
                                </td>
                                <td id="format">
                                    <p style="font-size: smaller;">2</p>
                                </td>
                                <td id="format">
                                    <p style="font-size: smaller;">3</p>
                                </td>
                                <td id="format">
                                    <p style="font-size: smaller;">4</p>
                                </td>
                                <td id="format">
                                    <p style="font-size: smaller;">5</p>
                                </td>
                                <td id="format">
                                    <p style="font-size: smaller;">6</p>
                                </td>
                                <td id="format">
                                    <p style="font-size: smaller;">7</p>
                                </td>
                                <td id="format">
                                    <p style="font-size: smaller;">மொத்தம் (100)</p>
                                </td>
                            </tr>
                            <tr>
                                <td id="format">மதிப்பெண்</td>
                                <td id="format"><br></td>
                                <td id="format"><br></td>
                                <td id="format"><br></td>
                                <td id="format"><br></td>
                                <td id="format"><br></td>
                                <td id="format"><br></td>
                                <td id="format"><br></td>
                            </tr>
                        </table>
                        <p>ஏதேனும் முறைகேடு / சேதங்கள் / பிழைகள் இருப்பின் குறிப்பிடவும்.</p>
                        <div class="row">
                            <div class="col" style="text-align: end;"> மதிப்பீட்டாளர் கையொப்பம் தேதியுடன் <br><br><br><br><br><br><br></div>
                        </div>
                    </div>
                    <p class="text-center" style="margin:10px;"><u>அலுவலகப்பயன்பாட்டிற்கு மட்டும்</u></p><br><br>
                    <table id="oformat">
                        <tr id="oform">
                            <td>&nbsp;&nbsp;&nbsp;மதிப்பீடு செய்யப்பட்ட விடைத்தாள் கிடைக்கப்பெற்ற நாள்</td>
                            <td>:&nbsp;</td>
                        </tr>
                        <tr id="oform">
                            <td>&nbsp;&nbsp;&nbsp;ஏதேனும் முறைகேடு / சேதங்கள் / பிழைகள்</td>
                            <td>:&nbsp;ஆம்/ இல்லை</td>
                        </tr>
                    </table>
                </div>
                <br><br><br><br><br>
                <div class="row">
                    <div class="col-6 text-center">பொறுப்பாளர்</div>
                    <div class="col-6 text-center">தலைவர் / தலைமைப் புரவலர்</div>
                </div>
                <br>
                <br>
            </div>
        </div>
        <!--mainbodyends-->
    </div>
    </div><br>
    <!--page2-ends-->
    <!--page3-begins-->
    <div id="page-3">
        <!--page3-begins-->
        <div class="card" id="main">
            <!--main body begins-->
            <div class="card-body">
                <!--add body begins-->
                <div class="card">
                    <div class="card-body" style="display: flex; justify-content: flex-start; align-items: center;">
                        <!-- Image aligned to the left with bigger size -->
                       <div class="row">
                            <div class="col-6"><img src="vts logo.png" alt="Logo" class=" w-50 img-fluid"></div>
                            <div class="col-6 d-flex justify-content-center align-items-center bg-light">
                                <div  class="fs-2 fs-sm-5 fs-md-4 fs-lg-3 fs-xl-2 fs-xxl-1">
                                    <h2 class="text-danger w-100   text-center" style="font-weight: bolder;">
                                         வாகை தமிழ்ச்சங்கம்
                                    </h2>
                                    <p  class="w-100  d-flex justify-content-center  text-center" >
                                       
                                        அத்தனூர் வடக்கு, அத்தனூர், நாமக்கல், தமிழ்நாடு, இந்தியா – 636301 <br>
                                        vaagaitamilsangam@gmail.com <br>
                                        பாடத்திட்டம், மதிப்பீடு மற்றும் கல்வி ஆலோசனைக்குழு - இறுதித்தேர்வு 2024
                                    </p>
                                </div>
                            </div>
                        </div>

                        </div>
                    </div>
                    <div class=" text-light text-center" style="background-color: rgb(4, 23, 80);">
                        <h5 style="font-weight: 800;">படிவம் 03 - விவரங்கள் சரிபார்ப்பு மற்றும் உறுதிமொழிப் படிவம்</h5>
                    </div>
                    <!--addbody-ends-->
                </div>
                <!--head-->
                <div class="d-flex  justify-content-center" style="margin: 10px;">
                    <table>
                        <tr>
                            <td>
                                <table style="width: 100%;table-layout: fixed;">
                                    <th>
                                        <table>
                                            <tr>
                                                <td>1.வகுப்புக் குறியீடு & பெயர்</td>
                                                <td class="text-start">:&nbsp;<?php echo $student['course_code'] . "  /  " . $student['course_name']; ?></td>
                                            </tr>
                                            <br>
                                            <tr>
                                                <td>2.விண்ணப்ப எண்</td>
                                                <td class="text-start">:&nbsp;<?php echo $student['app_no']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>3.வகுப்புப் பதிவு எண்</td>
                                                <td>:&nbsp;<?php echo $student['register_number']; ?></td>
                                            </tr>
                                            <tr>
                                                <td rowspan="1">4. மாணவர் பெயர் (தமிழில்)<br>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(ஆங்கிலத்தில்)
                                                </td>
                                                <td class="test-start">:&nbsp;<?php echo $student['name_tamil'] . "<br>:&nbsp;" . $student['name_english']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>5. பிறந்த தேதி</td>
                                                <td class="text-start">:&nbsp;<?php echo $student['dob']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>6. அலைபேசி எண் :</td>
                                                <td class="text-start">:&nbsp;<?php echo $student['phone_no']; ?></td>
                                            </tr>
                                        </table>
                                    </th>
                                </table>
                            </td>
                            <td>
                                <table>
                                    <tr>
                                        <td>
                                            <div class="photo">சமீபத்திய
                                                கடவுச்சீட்டு அளவிலான புகைப்படத்தை இங்கு ஒட்டவும்</div>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <br>
                    </table>
                </div>
                <!--head-ends-->
                <div class="card-body">
                    <p class="text-center"><u>மதிப்பெண் பட்டியல்</u></p>
                    <table id="form" class="table table-responsive table-bordered">
                        <tr>
                            <td id="format">
                                <p style="font-size: smaller;">வகுப்புக் குறியீட்டு எண்</p>
                            </td>
                            <td id="format">
                                <p style="font-size: smaller;">பாடம்</p>
                            </td>
                            <td id="format">
                                <p style="font-size: smaller;">தேர்வெழுதிய நாள் (DD/MM/YYYY)</p>
                            </td>
                        </tr>
                        <tr>
                            <td><br></td>
                            <td><br></td>
                            <td><br></td>
                        </tr>

                        <tr>
                            <td colspan="2" id="format">மொத்தம் எழுதிய பக்கங்களின் எண்ணிக்கை</td>
                            <td id="format"></td>

                        </tr>
                    </table>

                    <br>
                    <p style="text-align: justify;">மேற்கூறிய அனைத்து தகவல்களும் சரியே. மேலுள்ள தகவல்களைப் பொறுத்தே சான்றிதழ் கிடைக்கப்பெறும்
                        என்பதையும் அறிவேன். வாகை தமிழ்ச்சங்கத்தின் பாடத்திட்டம், மதிப்பீடு மற்றும்
                        கல்வியாலோசனைக்குழுவின் இணையவழிக்கல்வி விதிகள் மற்றும் செயல்பாடுகள் ஆகியவற்றைப் புரிந்துகொண்டு
                        அதன் வழி தேர்வெழுதினேன் என உறுதியளிக்கிறேன். மேலும் இத்துடன் எனது ஆதார் நகலை இணைத்துள்ளேன்.</p>

                    <table>
                        <tr>
                            <td>
                                <p id="sqrs" class="text-align-start"></p>
                            </td>
                            <td>
                                <p>&nbsp;உறுதியளிக்கிறேன் [✓ குறியிடவும்]</p>
                            </td>
                        </tr>
                    </table>
                    <br><br><br><br><br>
                    <table>
                        <tr>
                            <td>தேதி&nbsp;: <?php echo date('d-m-Y'); ?> </td>
                        </tr>
                        <tr>
                            <td>இடம்&nbsp;:</td>
                        </tr>
                    </table>
                    <br><br><br>
                    <div class="row">
                        <div class="col" style="font-weight:bold">இணைப்பு : ஆதார் ஆவண நகல்</div>
                        <div class="col" style="text-align: end;"> தேர்வரின் கையொப்பம் <br><br><br><br></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-6 text-center">பொறுப்பாளர்</div>
                        <div class="col-6 text-center">தலைவர் / தலைமைப் புரவலர்</div>
                        <br>
                        <br><br>
                    </div>
                </div>
                <!--main body ends-->
            </div>
            <!--page3-ends-->
        </div>
    </div>
    <br>

    <!--page3-ends-->
    <!--page4-begins-->
    <div id="page-4">
        <!--page3-begins-->
        <div class="card" id="main">
            <!--main body begins-->
            <div class="card-body">
                <!--add body begins-->
                <div class="card">
                    <div class="card-body" style="display: flex; justify-content: flex-start; align-items: center;">
                        <!-- Image aligned to the left with bigger size -->
                        <div class="row">
                            <div class="col-6"><img src="vts logo.png" alt="Logo" class=" w-50 img-fluid"></div>
                            <div class="col-6 d-flex justify-content-center align-items-center bg-light">
                                <div  class="fs-2 fs-sm-5 fs-md-4 fs-lg-3 fs-xl-2 fs-xxl-1">
                                    <h2 class="text-danger w-100   text-center" style="font-weight: bolder;">
                                         வாகை தமிழ்ச்சங்கம்
                                    </h2>
                                    <p  class="w-100  d-flex justify-content-center  text-center" >
                                       
                                        அத்தனூர் வடக்கு, அத்தனூர், நாமக்கல், தமிழ்நாடு, இந்தியா – 636301 <br>
                                        vaagaitamilsangam@gmail.com <br>
                                        பாடத்திட்டம், மதிப்பீடு மற்றும் கல்வி ஆலோசனைக்குழு - இறுதித்தேர்வு 2024
                                    </p>
                                </div>
                            </div>
                        </div>

                        </div>
                    </div>
                    <div class=" text-light text-center" style="background-color: rgb(4, 23, 80);">
                        <h5 style="font-weight: 800;">படிவம் 03 அ - விவரங்கள் சரிபார்ப்பு மற்றும் உறுதிமொழிப் படிவம்</h5>
                    </div>
                    <div class="d-flex  justify-content-center" style="margin: 10px;">
                        <table>
                            <tr>
                                <td>
                                    <table style="width:100%;table-layout: fixed;">
                                        <th>
                                            <table>
                                                <tr>
                                                    <td>1.வகுப்புக் குறியீடு & பெயர்</td>
                                                    <td class="text-start">:&nbsp;<?php echo $student['course_code'] . "  /  " . $student['course_name']; ?></td>
                                                </tr>
                                                <br>
                                                <tr>
                                                    <td>2.விண்ணப்ப எண்</td>
                                                    <td class="text-start">:&nbsp;<?php echo $student['app_no']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>3.வகுப்புப் பதிவு எண்</td>
                                                    <td>:&nbsp;<?php echo $student['register_number']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td rowspan="1">4. மாணவர் பெயர் (தமிழில்)<br>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(ஆங்கிலத்தில்)
                                                    </td>
                                                    <td class="test-start">:&nbsp;<?php echo $student['name_tamil'] . "<br>:&nbsp;" . $student['name_english']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>5. பிறந்த தேதி</td>
                                                    <td class="text-start">:&nbsp;<?php echo $student['dob']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>6. அலைபேசி எண் :</td>
                                                    <td class="text-start">:&nbsp;<?php echo $student['phone_no']; ?></td>
                                                </tr>
                                            </table>
                                        </th>
                                    </table>
                                </td>
                                <td>
                                    <table>
                                        <tr>
                                            <td>
                                                <div class="photo">சமீபத்திய
                                                    கடவுச்சீட்டு அளவிலான புகைப்படத்தை இங்கு ஒட்டவும்</div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <br>
                        </table>
                    </div>
                    <!--head-ends-->
                    <div class="card-body">
                        <p class="text-center"><u>மதிப்பெண் பட்டியல்</u></p>
                        <table id="form" class="table table-responsive table-bordered">
                            <tr>
                                <td id="format">
                                    <p style="font-size: smaller;">வகுப்புக் குறியீட்டு எண்</p>
                                </td>
                                <td id="format">
                                    <p style="font-size: smaller;">பாடம்</p>
                                </td>
                                <td id="format">
                                    <p style="font-size: smaller;">தேர்வெழுதிய நாள் (DD/MM/YYYY)</p>
                                </td>
                            </tr>
                            <tr>
                                <td><br></td>
                                <td><br></td>
                                <td><br></td>
                            </tr>

                            <tr>
                                <td colspan="2" id="format">மொத்தம் எழுதிய பக்கங்களின் எண்ணிக்கை</td>
                                <td id="format"></td>

                            </tr>
                        </table>

                        <br>
                        <p style="text-align: justify;">மேற்கூறிய அனைத்து தகவல்களும் சரியே. மேலுள்ள தகவல்களைப் பொறுத்தே சான்றிதழ் கிடைக்கப்பெறும்
                            என்பதையும் அறிவேன். வாகை தமிழ்ச்சங்கத்தின் பாடத்திட்டம், மதிப்பீடு மற்றும்
                            கல்வியாலோசனைக்குழுவின் இணையவழிக்கல்வி விதிகள் மற்றும் செயல்பாடுகள் ஆகியவற்றைப் புரிந்துகொண்டு
                            அதன் வழி தேர்வெழுதினேன் என உறுதியளிக்கிறேன். மேலும் இத்துடன் ஆதார் நகலை இணைத்துள்ளேன்.</p>
                        <br><br><br>
                        <table>
                            <tr>
                                <td>
                                    <p id="sqrs" class="text-align-start"></p>
                                </td>
                                <td>
                                    <p>&nbsp;உறுதியளிக்கிறேன் [✓ குறியிடவும்]</p>
                                </td>
                            </tr>
                        </table>
                        <br><br><br>
                        <table>
                            <tr>
                                <td>தேதி&nbsp;: <?php echo date('d-m-Y'); ?> </td>
                            </tr>
                        </table>
                        <div class="row">
                            <div class="col" style="font-weight:bold">இடம்&nbsp;:</div>
                            <br>
                            <div class="col" style="text-align: end;"> தேர்வரின் கையொப்பம் <br><br><br><br><br><br></div>
                        </div>
                        <br><br><br>
                        <div class="row">
                            <div class="col-6 text-center">பொறுப்பாளர்</div>
                            <div class="col-6 text-center">தலைவர் / தலைமைப் புரவலர்</div>
                            <br><br><br>
                        </div>
                    </div>
                    <!--addbody-ends-->
                </div>
            </div>
        </div>
    </div><br>
    <!--page4-ends-->
    <!--page5-begins-->
    <div id="page-5">
        <!--page5-begins-->
        <div class="card" id="main">
            <!--main body begins-->
            <div class="card-body ">
                <!--add body begins-->
                <div class="card ">
                    <div class="card-body" style="display: flex; justify-content: flex-start; align-items: center;">
                        <!-- Image aligned to the left with bigger size -->
                        <div class="row">
                            <div class="col-6"><img src="vts logo.png" alt="Logo" class=" w-50 img-fluid"></div>
                            <div class="col-6 d-flex justify-content-center align-items-center bg-light">
                                <div  class="fs-2 fs-sm-5 fs-md-4 fs-lg-3 fs-xl-2 fs-xxl-1">
                                    <h2 class="text-danger w-100   text-center" style="font-weight: bolder;">
                                         வாகை தமிழ்ச்சங்கம்
                                    </h2>
                                    <p  class="w-100  d-flex justify-content-center  text-center" >
                                       
                                        அத்தனூர் வடக்கு, அத்தனூர், நாமக்கல், தமிழ்நாடு, இந்தியா – 636301 <br>
                                        vaagaitamilsangam@gmail.com <br>
                                        பாடத்திட்டம், மதிப்பீடு மற்றும் கல்வி ஆலோசனைக்குழு - இறுதித்தேர்வு 2024
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class=" text-light text-center" style="background-color: rgb(4, 23, 80);">
                        <h5 style="font-weight: 800;">படிவம் 04 - பின்னூட்டப்படிவம்</h5>
                    </div>
                    <!----->
                    <div style="margin: 10px;">
                        <table>
                            <tr>
                                <td>1.வகுப்புக் குறியீடு & பெயர்</td>
                                <td class="text-start">:&nbsp;<?php echo $student['course_code'] . "  /  " . $student['course_name']; ?></td>
                            </tr>
                            <br>
                            <tr>
                                <td>2.விண்ணப்ப எண்</td>
                                <td class="text-start">:&nbsp;<?php echo $student['app_no']; ?></td>
                            </tr>
                            <tr>
                                <td>3.வகுப்புப் பதிவு எண்</td>
                                <td>:&nbsp;<?php echo $student['register_number']; ?></td>
                            </tr>
                            <tr>
                                <td rowspan="1">4. மாணவர் பெயர் (தமிழில்)<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(ஆங்கிலத்தில்)
                                </td>
                                <td class="test-start">:&nbsp;<?php echo $student['name_tamil'] . "<br>:&nbsp;" . $student['name_english']; ?></td>
                            </tr>
                            <tr>
                                <td>5. பிறந்த தேதி</td>
                                <td class="text-start">:&nbsp;<?php echo $student['dob']; ?></td>
                            </tr>
                            <tr>
                                <td>6. அலைபேசி எண் :</td>
                                <td class="text-start">:&nbsp;<?php echo $student['phone_no']; ?></td>
                            </tr>
                        </table>
                        <br><br>
                        <br><br>
                        <p style="font-weight: bold;">தெரிந்துகொண்டவை / சிறந்த முறையில் அமைந்தவை / நேர்மறைக் கருத்துகள்</p>
                        <div id="box"></div>
                        <br><br><br>
                        <p style="font-weight:bold;">மாற்றிக்கொள்ளவேண்டிய (அ) மேம்படுத்தவேண்டிய கூறுகள் / எதிர்மறைக் கருத்துகள்</p>
                        <div id="box"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--page5-ends-->
    <!--page6-bsgins-->
    <div class="page-6">
        <div class="card" id="main" style="width: 794px; height: 1123px; margin: auto;">
            <div class="card-body">
                <div class="bg-primary" style="width:100%">
                    <img src="form5.jpg" width="100%" height="auto">
                </div>

            </div>
        </div>
    </div>
    <!--page6-ends-->
    <!--page7-begins-->
    <div class="page-7">
        <div class="card" id="main" style="width: 794px; height: 1123px; margin: auto;">
            <div class="card-body">
                <div class="bg-primary" style="width:100%">
                    <img src="form6.jpg" width="100%" height="auto">
                </div>

            </div>
        </div>
    </div>

    <!--page7-ends-->
     <div class="print-button">
        <button onclick="window.print()" download="VAAGAI EXAM 2024"><i class="bi bi-download"></i>&nbsp;Print Hall Ticket</button><br><br>
        <footer class="text-center w-100" style="background-color: #777; padding: 10px; color: white;">
  Copyright © VAAGAI TAMILSANGAM | NAMMAKKAL | vaagaitamilsangam@gmail.com
</footer>
    </div>
   
</body>

   


</html>