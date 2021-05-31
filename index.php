<?php
include 'php/includes/header.php';


?>
<div class="container" id="wrapper">
    <div id="header">
        <div class="mainLogo">
            <div class="logo"><img src="assets/images/lg.png" width="60px" height="50px" /> Crime <span> reporter</span></div>
        </div>
        <div id="login">
            <?php if (isset($_SESSION['email'])) { ?>
                <div class="div1">
                    <img src="assets/images/lock-open.png" style="position: relative; top: 3px;"> &nbsp; You are logged in as: <b><?php echo $_SESSION['email']; ?></b>
                </div>
            <?php } else { ?>
                <a href="login.php">Login</a> | <a href="register.php">Register</a>
            <?php } ?>
        </div>
    </div>

    <div style="clear:both;"></div>
    <div id="nav">
        <?php include 'php/includes/navigation.php' ?>
    </div>
    <div id="main">
        <div class="row" id="slider-background">
            <div class="col-sm-3">
                <div class="leftSidebar">
                    <div class="titleBlock">
                        <p>What we investigate</p>
                    </div>
                    <div class="blockList">
                        <ul>
                            <li><a href="alerts.php">Terrorism</a></li>
                            <li><a href="alerts.php">Cyber Crime</a></li>
                            <li><a href="alerts.php">Public Curruption</a></li>
                            <li><a href="alerts.php">Civil Rights</a></li>
                            <li><a href="alerts.php">Drug Dealers</a></li>
                        </ul>
                    </div>

                    <div class="titleBlock">
                        <p>Most Wanted</p>
                    </div>
                    <div class="blockList">
                        <ul>
                            <li><a href="alerts.php">Ten most wanted</a></li>
                            <li><a href="alerts.php">Most wanted</a></li>
                            <li><a href="alerts.php">Other Criminals</a></li>
                        </ul>
                    </div>
                    <div class="titleBlock">
                        <p>Alerts</p>
                    </div>
                    <div class="blockList">
                        <ul>
                            <li><a href="alerts.php">Road accidents</a></li>
                            <li><a href="alerts.php">Traffic alerts</a></li>
                            <li><a href="alerts.php">Terrorist alerts</a></li>
                        </ul>
                    </div>


                </div>
            </div>
            <div class="col-sm-9">
                <!-- <script type="text/javascript" src="assets/js/jquery-1.9.1.min.js"></script> -->

                <script type="text/javascript" src="assets/js/jssor.js"></script>
                <script type="text/javascript" src="assets/js/jssor.slider.js"></script>
                <script>
                    jQuery(document).ready(function($) {
                        var options = {
                            $AutoPlay: true, //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                            $AutoPlaySteps: 1, //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
                            $AutoPlayInterval: 4000, //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                            $PauseOnHover: 1, //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1
                            $Loop: 0, //[Optional] Enable loop(circular) of carousel or not, 0: stop, 1: loop, 2 rewind, default value is 1

                            $ArrowKeyNavigation: true, //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
                            $SlideDuration: 500, //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                            $MinDragOffsetToSlide: 20, //[Optional] Minimum drag offset to trigger slide , default value is 20
                            //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                            //$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
                            $SlideSpacing: 5, //[Optional] Space between each slide in pixels, default value is 0
                            $DisplayPieces: 1, //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
                            $ParkingPosition: 0, //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
                            $UISearchMode: 1, //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
                            $PlayOrientation: 1, //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
                            $DragOrientation: 3, //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)

                            $ThumbnailNavigatorOptions: {
                                $Class: $JssorThumbnailNavigator$, //[Required] Class to create thumbnail navigator instance
                                $ChanceToShow: 2, //[Required] 0 Never, 1 Mouse Over, 2 Always

                                $Loop: 1, //[Optional] Enable loop(circular) of carousel or not, 0: stop, 1: loop, 2 rewind, default value is 1
                                $AutoCenter: 3, //[Optional] Auto center thumbnail items in the thumbnail navigator container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 3
                                $Lanes: 1, //[Optional] Specify lanes to arrange thumbnails, default value is 1
                                $SpacingX: 4, //[Optional] Horizontal space between each thumbnail in pixel, default value is 0
                                $SpacingY: 4, //[Optional] Vertical space between each thumbnail in pixel, default value is 0
                                $DisplayPieces: 4, //[Optional] Number of pieces to display, default value is 1
                                $ParkingPosition: 0, //[Optional] The offset position to park thumbnail
                                $Orientation: 2, //[Optional] Orientation to arrange thumbnails, 1 horizental, 2 vertical, default value is 1
                                $DisableDrag: false //[Optional] Disable drag or not, default value is false
                            }
                        };

                        var jssor_slider1 = new $JssorSlider$("slider1_container", options);

                        //responsive code begin
                        //you can remove responsive code if you don't want the slider scales while window resizes
                        function ScaleSlider() {
                            var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
                            if (parentWidth) {
                                var sliderWidth = parentWidth;

                                //keep the slider width no more than 810
                                sliderWidth = Math.min(sliderWidth, 810);

                                jssor_slider1.$ScaleWidth(sliderWidth);
                            } else
                                window.setTimeout(ScaleSlider, 30);
                        }
                        ScaleSlider();

                        $(window).bind("load", ScaleSlider);
                        $(window).bind("resize", ScaleSlider);
                        $(window).bind("orientationchange", ScaleSlider);
                        //responsive code end
                    });
                </script>
                <!-- Jssor Slider Begin -->
                <!-- You can move inline styles to css file or css block. -->
                <div id="slider1_container" style="position:relative;top: 0px; left: 0px; width: 810px; height: 420px; background: #000; overflow: hidden; ">

                    <!-- Loading Screen -->
                    <div u="loading" style="position: absolute; top: 0px; left: 0px;">
                        <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
                background-color: #000000; top: 0px; left: 0px;width: 100%;height:100%;">
                        </div>
                        <div style="position: absolute; display: block; background: url(images/loading.gif) no-repeat center center;
                top: 0px; left: 0px;width: 100%;height:100%;">
                        </div>
                    </div>

                    <!-- Slides Container -->
                    <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 600px; height: 390px;
            overflow: hidden;">

                        <div>
                            <img u="image" src="assets/images/slider1.jpg" />
                            <div u="thumb">
                                <img class="i" src="assets/images/slider1-thumb001.jpg" />
                                <div class="t">Police Training</div>
                                <div class="c">Anti-riot police during training</div>
                            </div>
                        </div>
                        <div>
                            <img u="image" src="assets/images/slider2.jpg" />
                            <div u="thumb">
                                <img class="i" src="assets/images/slider2-thumb002.jpg" />
                                <div class="t">Guard of Honour</div>
                                <div class="c">Police during an official function</div>
                            </div>
                        </div>
                        <div>
                            <img u="image" src="assets/images/slider4.jpg" />
                            <div u="thumb">
                                <img class="i" src="assets/images/slider4-thumb004.jpg" />
                                <div class="t">Anti-Riot Police</div>
                                <div class="c">Responding to Hostile situation</div>
                            </div>
                        </div>
                        <div>
                            <img u="image" src="assets/images/slider3.jpg" />
                            <div u="thumb">
                                <img class="i" src="assets/images/slider3-thumb003.jpg" />
                                <div class="t">Police Car</div>
                                <div class="c">State of the art police car</div>
                            </div>
                        </div>
                        <div>
                            <img u="image" src="assets/images/chopper.jpg" />
                            <div u="thumb">
                                <img class="i" src="assets/images/slider5-thumb005.jpg" />
                                <div class="t">Police Chopper</div>
                                <div class="c">The flying squad chopper</div>
                            </div>
                        </div>
                    </div>

                    <!-- ThumbnailNavigator Skin Begin -->
                    <div u="thumbnavigator" class="jssort11" style="position: absolute; width: 200px; min-height: 300px; left:605px; top:0px;">
                        <!-- Thumbnail Item Skin Begin -->

                        <div u="slides" style="cursor: move;">
                            <div u="prototype" class="p" style="position: absolute; width: 200px; height: 69px; top: 0; left: 0;">
                                <div u="thumbnailtemplate" style=" width: 100%; height: 100%; border: none;position:absolute; top: 0; left: 0;"></div>
                            </div>
                        </div>
                        <!-- Thumbnail Item Skin End -->
                    </div>
                    <!-- ThumbnailNavigator Skin End -->
                    <a style="display: none" href="http://www.jssor.com">jQuery Slider</a>
                </div>
            </div>

        </div>

    </div>

    <?php include 'php/includes/footer.php'; ?>