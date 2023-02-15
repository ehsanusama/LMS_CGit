<?php
@$lat = 31.450365;
@$long = 73.134964;

?>

<script>
  var dist = 0;
  var lat1 = <?php echo $lat; ?>;
  var lon1 = <?php echo $long; ?>;
  var storedDistance = 10
</script>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1,user-scalable=no">
  <title>Attendance</title>
  <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body onload="init()">
  <p class="text-center" id="demo"> </p>
  <div id="app">
    <input type="hidden" value="<?= @$_REQUEST['student_id'] ?>" id="student_id">
    <input type="hidden" id="dist_fld">
    <input type="hidden" placeholder="shift" id="shift" readonly value="<?= @$_REQUEST['shift'] ?>">
    <input type="hidden" placeholder="lat" id="lat" readonly>
    <input type="hidden" placeholder="lon" id="lon" readonly>
    <div class="container-fluid">
      <div id="my_camera" style="display: none;"></div>
      <div id="results" style="display: none;"> </div>
      <div class="row" id="open_camera">
        <div class="col-sm-12">
          <table class="table table-striped table-bordered table-condensed">
            <tr>
              <td>
                <center>
                  <video facingMode="environment" playsinline id="preview" style="width:100%"></video>
                  <div id="sourceSelectPanel" style="display:none">
                    <label for="sourceSelect">Change video source:</label>
                    <select id="sourceSelect" style="max-width:400px">
                    </select>
                  </div>

                  <div style="display: none;">
                    <label for="decoding-style"> Decoding Style:</label>
                    <select id="decoding-style" size="1">
                      <option value="once">Decode once</option>
                      <option value="continuously">Decode continuously</option>
                    </select>
                  </div>
        </div>
        </center>

        </td>
        </tr>
        </table>
      </div><!-- col -->
    </div><!-- row -->
  </div>
  </div>
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.js"></script>
  <link rel="stylesheet" href="css/sweetalert.css">
  <script src="js/sweetalert.js"></script>
  <script>
    $(function() {
      //  getLocation();
    })

    function distance(lat1 = <?php echo $lat; ?>, lon1 = <?php echo $long; ?>, lat2, lon2, unit) {
      var radlat1 = Math.PI * lat1 / 180
      var radlat2 = Math.PI * lat2 / 180
      var theta = lon1 - lon2
      var radtheta = Math.PI * theta / 180
      var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
      if (dist > 1) {
        dist = 1;
      }
      dist = Math.acos(dist)
      dist = dist * 180 / Math.PI
      dist = dist * 60 * 1.1515
      if (unit == "K") {
        dist = dist * 1.609344
      }
      if (unit == "N") {
        dist = dist * 0.8684
      }
      return dist
      // document.getElementById('heading').innerHTML=dist;

    }
    var x = document.getElementById("demo");

    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
      } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
      }
    }

    function showPosition(position) {
      var latlon = position.coords.latitude + "," + position.coords.longitude;
      $("#lat").val(position.coords.latitude)
      $("#lon").val(position.coords.longitude)




    }

    function showError(error) {
      switch (error.code) {
        case error.PERMISSION_DENIED:
          x.innerHTML = "User denied the request for Geolocation."
          break;
        case error.POSITION_UNAVAILABLE:
          x.innerHTML = "Location information is unavailable."
          break;
        case error.TIMEOUT:
          x.innerHTML = "The request to get user location timed out."
          break;
        case error.UNKNOWN_ERROR:
          x.innerHTML = "An unknown error occurred."
          break;
      }
    }
  </script>




  <script type="text/javascript" src="js/zxing.js"></script>
  <script type="text/javascript">
    function decodeOnce(codeReader, selectedDeviceId = undefined) {
      //getLocation();
      codeReader.decodeFromInputVideoDevice(selectedDeviceId, 'preview').then((result) => {
        console.log(result.text);
        var student_id = result.text;
        var shift = $("#shift").val();
        if (student_id) {
          $.ajax({
            url: 'api.php',
            type: 'post',
            dataType: 'text',
            data: {
              action: 'mark_attendance_scan',
              student_id: student_id,
              shift: shift
            },
            beforeSend: function() {
              console.log('Marking Attendance...')
            },
            success: function(response) {
              console.log(response)
              var json = JSON.parse($.trim(response));
              swal({
                  title: json.sts,
                  text: json.msg,
                  type: json.icon,
                  showCancelButton: true,
                  confirmButtonClass: "btn-success",
                  confirmButtonText: "Go back",
                  closeOnConfirm: true,
                  showConfirmButton: false,
                  timer: 1500
                },
                function() {
                  init();
                });

            },
            error: function(request, status, error) {
              console.log(request.responseText)
            }
          });
        } else {
          swal({
              title: "Alert!",
              text: "Invalid QR Code",
              type: "error",
              showCancelButton: false,
              confirmButtonClass: "btn-danger",
              confirmButtonText: "Try Again",
              closeOnConfirm: true
            },
            function() {
              init()
            });
        }


      }).catch((err) => {
        console.error(err)
        // document.getElementById('result').textContent = err
      })
    }

    function decodeContinuously(codeReader, selectedDeviceId = undefined) {
      //getLocation();
      codeReader.decodeFromInputVideoDeviceContinuously(selectedDeviceId, 'preview', (result, err) => {
        if (result) {
          // properly decoded qr code
          console.log('Found QR code!', result.text)

          // document.getElementById('result').textContent = result.text
        }

        if (err) {
          if (err instanceof ZXing.NotFoundException) {
            console.log('No QR code found.')
          }

          if (err instanceof ZXing.ChecksumException) {
            console.log('A code was found, but it\'s read value was not valid.')
          }

          if (err instanceof ZXing.FormatException) {
            console.log('A code was found, but it was in a invalid format.')
          }
        }
      })
    }

    function init() {
      // window.addEventListener('load', function () {
      let selectedDeviceId = undefined;
      const codeReader = new ZXing.BrowserQRCodeReader()
      console.log('ZXing code reader initialized')

      codeReader.getVideoInputDevices()
        .then((videoInputDevices) => {
          const sourceSelect = document.getElementById('sourceSelect')
          // selectedDeviceId = videoInputDevices[0].deviceId
          selectedDeviceId = undefined
          if (videoInputDevices.length >= 1) {
            videoInputDevices.forEach((element) => {
              const sourceOption = document.createElement('option')
              sourceOption.text = element.label
              sourceOption.value = element.deviceId
              sourceSelect.appendChild(sourceOption)
            })

            sourceSelect.onchange = () => {
              // selectedDeviceId = sourceSelect.value;
              selectedDeviceId = undefined
            };

            const sourceSelectPanel = document.getElementById('sourceSelectPanel')
            sourceSelectPanel.style.display = 'none'
          }
          const decodingStyle = document.getElementById('decoding-style').value;

          if (decodingStyle == "once") {
            decodeOnce(codeReader, selectedDeviceId);
          } else {
            decodeContinuously(codeReader, selectedDeviceId);
          }
        })
        .catch((err) => {
          console.error(err)
        })
      // })
    }
  </script>

</body>

</html>