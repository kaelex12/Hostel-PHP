<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
include("includes/login/header.login.php");
include("includes/login/nav-bar.login.php");
include("includes/header.php");
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}

?>
<!-- header -->
    <header class="masthead d-flex" id="home-page">
        <div class="container text-center my-auto">
        <div class="header">
            <h1 class="mb-1">Welcome to Nostalgia Online Hostel, <?=$_SESSION['name']?>!</h1>
            <h3 class="mb-5"><br>
            <em class="welcome-message">
              Hello <?=$_SESSION['name']?>, as you enter here at this part it is obviously says that you wanna get a room to stay
            and happy to tell you that we have a lot of good quality room that you aspire to have with that you may 
            now check it by clicking</em>
            </h3>
        </div>
        <a class="btn btn-dark btn-xl js-scroll-trigger" href="#rooms">THIS BUTTON</a>
        </div>
        <div class="overlay"></div>
    </header>

<!-- Rooms  -->
  <section class="content-section bg-light" id="rooms">
    <div class="container">
      <div class="content-section-heading text-center">
        <h3 class="text-secondary mb-0">Hostel</h3>
        <h2 class="mb-5">Rooms for you</h2>
      </div>
      <div class="row no-gutters">
        <div class="col-lg-6">
          <a class="portfolio-item js-scroll-trigger" href="#gym-room">
            <div class="caption">
              <div class="caption-content">
                <div class="h2">Gym Room</div>
                <p class="mb-0">A room where bodybuilding can be done, taking your stress away, gym room is in your way.</p>
              </div>
            </div>
            <img class="img-fluid" src="img/rooms/gym-room-466.jpg" alt="gym room">
          </a>
        </div>
        <div class="col-lg-6">
          <a class="portfolio-item js-scroll-trigger" href="#green-room">
            <div class="caption">
              <div class="caption-content">
                <div class="h2">Green Room</div>
                <p class="mb-0">Green room is like a paradise which has a beautiful setting that inspires creativity by bringing yourself into a cool and eyes refreshment, due to its keen and well-organized green materials displayed.</p>
              </div>
            </div>
            <img class="img-fluid" src="img/rooms/green-room-1-466.jpg" alt="green room">
          </a>
        </div>
        <div class="col-lg-6">
          <a class="portfolio-item js-scroll-trigger" href="#couple-room">
            <div class="caption">
              <div class="caption-content">
                <div class="h2">Couple Room</div>
                <p class="mb-0">Couple room is good for all such lovers staycation, newlyweds, honeymoons wherein you can perfectly enjoy some quiet time.</p>
              </div>
            </div>
            <img class="img-fluid" src="img/rooms/couple-room-466.jpg" alt="couple room">
          </a>
        </div>
        <div class="col-lg-6">
          <a class="portfolio-item js-scroll-trigger" href="#family-room">
            <div class="caption">
              <div class="caption-content">
                <div class="h2">Family Room</div>
                <p class="mb-0">Family rooms has its good quality standard suitable for even the biggest amount of persons and also comfortableness is sets beyond your families choice.</p>
              </div>
            </div>
            <img class="img-fluid" src="img/rooms/family-room-467.jpg" alt="family room">
          </a>
        </div>
      </div>
    </div>
  </section>
<!-- About Rooms -->
<section class="content-section bg-light" id="gym-room">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                  <h2>NOSTALGIA's GYM ROOM RESERVED FOR YOU</h2>
                  <p class="lead mb-5">As you place an ever-encreasing value on "WELLNESS" when you travel, Grand Nostalgia
                    hostel is scrambling to find the best way to provide fitness options that suits for all
                    decerning guest need/your need. </p>
                </div>
                <div class="col-lg-6 mx-auto">
                  <img class="img-fluid" src="img/gym-room/gym-room-466.jpg" alt="Gym Room">
                </div>
            </div>
            <div class="row">
              <div class="col-lg-6 mx-auto">
                <h2>What  goes  in a gym room? </h2>
                    <p class="lead mb-5">Of course nostalgia hostel prepared a set of equipments that are most likely
                      to get a chance winning a heart of each guests and for you to do your daily fitness as you enjoy the stay. <br><br>
                      *Training bench<br>
                      * Dumbbell set <br>
                      * Barbel set <br>
                      *vkettle bell set <br>
                      * treadmill <br>
                      * rowing machine <br>
                      * pull-Up frame and bar <br>
                      * fitness ball <br>
                      * stationary Bicycle <br>
                      * accessories<br>
                    </p>
              </div>
              <div class="col-lg-6 mx-auto">
                <img class="img-fluid" src="img/gym-room/gym-room-3-466.jpg" alt="Gym Room">
              </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mx-auto">
                  <p class="lead mb-5">
                  This is the Gym/fitness room a grand  nostalgia hostel  prepared  for
                  you and to all traveller /guest, thoughtful space whereas   good to
                  spend quality  time and increasingly,  it's focused on your well-being.
                  In addition, room has a cool ambiance as it face into  a beautiful features
                  outside that help inspired  you to do  regular exercise  every day. 
                  </p>
                </div>
                <div class="col-lg-6 mx-auto">
                <img class="img-fluid" src="img/gym-room/gym-room-2-466.jpg" alt="Gym Room">
                </div>
            </div>
        </div>
</section>
<section class="content-section text-white" action="code.php" method="post" id="gym-room-footer">
      <div class="container text-center">
        <h1 class="h1-footer">Rent a Room? To avail <span style="color:#7E7E7E;">Gym Room</span> please click</h1><br>
          <button type="button" class="btn gym-icon-bg btn-lg mr-4" name="gym-room-modal" data-toggle="modal" data-target="#gym-Modal">HERE</button>
            <?php include("includes/rooms/gym-room.php");?>
          <a href="#rooms" class="btn btn-lg btn-success js-scroll-trigger">MENU</a>
        </div>
    </section>  
<section class="content-section bg-light" id="green-room">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                <h2>NOSTALGIA's GREEN ROOM RESERVED FOR YOU</h2>
                <p class="lead mb-5">
                A greenroom is a waiting area before the talent takes  center stage
                but in other case the green room is the main event wherin people
                will  notice  greens shade that  springs with and natural
                vitality and geity,  and perhaps because it's roots in NATURE,
                it's also supremely versatile.  Soft  shades sing in sweet glamorous
                personal ones while  bolder shades can add an untamed elegance.
                </p>
                </div>
                <div class="col-lg-6 mx-auto">
                  <img class="img-fluid" src="img/green-room/green-room-0-466.jpg" alt="Green Room">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mx-auto">
                  <h2>What  goes  in a gym room?</h2>
                  <p class="lead mb-5">
                  This room is netfitted both spaces in a green floral wall covering which
                  gives cohesive and expansive effect unto  the space  as well  as  affect  
                  to the  eyes of anyone that  could  capture  it's sense  of beauty  and  coolness.
                  In addition, this room  is well organized as it is  our  pride with that  this  room has<br><br>
                  *Room coffee maker<br>
                  *Clock<br>
                  *A full length mirror<br>
                  *A nightlight<br>
                  *Water bottle or drinking glasses<br>
                  *Size of TV channel guide & remote instructions<br>
                  *Waste basket<br>
                  *A bedside table and reading light<br>
                  *Convenient power outlets for phones and others<br><br>
                  *Bonus Items : local magazines and maps<br>
                  </p>
                </div>
                <div class="col-lg-6 mx-auto">
                  <img class="img-fluid" src="img/green-room/green-room-2-466.jpg" alt="Green Room">
                  <br>
                  <br>                  
                  <p class="lead mb-5">This room provides an earthing contrast to the walls which 
                    covered in rich hunter green feels  serene when paired with  wicker accents and
                    drenched in natural  light.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mx-auto">
                  <p class="lead mb-5">
                  A room  isn't  complete  without  rest room  or bath rooms,  so we have here
                  prepared a grassy  green  color of  bathrooms that  empower in a whole  room
                  and gives  fair fun and well  polished  with  exact  hue.
                  </p>
                </div>
                <div class="col-lg-6 mx-auto">
                  <img class="img-fluid" src="img/green-room/green-room-bathroom-466.jpg" alt="Green Room">
                </div>
            </div>
        </div>
</section>
<section class="content-section text-white" action="code.php" method="post" id="green-room-footer">
      <div class="container text-center">
        <h1 class="h1-footer">Rent a Room? To avail <span style="color:#76EE00;">Green Room </span>please click</h1><br>
            <button type="button" class="btn green-icon-bg btn-lg  mr-4" name="green-room-modal" data-toggle="modal" data-target="#green-Modal">HERE</button>
            <?php include("includes/rooms/green-room.php");?>
            <a href="#rooms" class="btn btn-lg btn-success js-scroll-trigger">MENU</a>
        </div>
    </section>  
<section class="content-section bg-light" id="couple-room">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                <h2>NOSTALGIA's COUPLE ROOM RESERVED FOR YOU</h2>
                <p class="lead mb-5">This rooms has its best quality standard
                  GOOD FOR romantic COUPLES
                  with room suitable accommodition<br> COUPLE BEDROOM REQUIREMENTS:<br>
                  1 bedroom    1-2 persons<br>
                  2 bedrooms   3-4 persons
                </p>
                </div>
                <div class="col-lg-6 mx-auto">
                  <img class="img-fluid" src="img/couple-room/couple-inroom.jpg" alt="Couple">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mx-auto">
                  <h2> What goes on couple room?</h2>
                  <p class="lead mb-5">
                  *Room coffee maker<br>
                  *Alarm clock<br>
                  *A full length mirror<br>
                  *A nightlight<br>
                  *Water bottle or drinking glasses<br>
                  *Size of TV channel guide & remote instructions<br>
                  *Waste basket<br>
                  *A bedside table and reading light<br>
                  *Convenient power outlets for phones and others<br><br>
                  *Bonus Items : local magazines and maps<br>
                  </p>
                </div>
                <div class="col-lg-6 mx-auto">
                  <p  class="lead mb-5">The room is our refuge, the place where we retire at the end
                    of our day, and the space where we get up every morning to 
                    start another day. The room is our boudoir, the room where
                    we relax and read, we relax with the members of our family,
                    and shut the noise of the world for a while.<br> The way we 
                    decorate our room is essential because colors, fabrics and
                    overall design affect our mood.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <h2>Couple Room 1</h2>
                  <p class="lead mb-5">
                    Bold and contrasting colours can make a bedroom look 
                    romantic too! It’s all about contrast: red and black; orange
                    and white; blue and yellow,pinky and grayish color. This makes your bedroom
                    look young, fun, and exciting at the same time!
                  </p>
                </div>
                <div class="col-lg-6 mx-auto">
                  <img class="img-fluid" src="img/couple-room/couple-room.jpg" alt="Couple Bed 1">
                  <br>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mx-auto">
                  <br>
                  <h2>Couple Room 2</h2>
                    <p class="lead mb-5">
                      Black is a color that is often underused in the bedroom decor, but it can add dignity and depth to the room.
                      Black contrast detailing on the bed with a bright white carpet and white curtains. Another way to add depth
                      to the darkroom is to design lighting fixtures that are also black. As in the picture, the chandelier on
                      the ceiling and the bedside lamps at night have black shades, adding a dull but warm atmosphere at night. 
                      These bedroom colors can also be enhanced by adding a royal gold or silver tone as the accent color,
                      perfect for wallpaper or slip covers. The black highlights of this room add a masculine
                      tone while heavy brocade curtains and recessed ceiling lighting prevent this room from feeling too far away
                    </p>
                </div>
                <div class="col-lg-6 mx-auto">
                  <img class="img-fluid" src="img/couple-room/couple-room-2.jpg" alt="Couple Bed 2">
                </div>
                <div class="row">
                  <div class="col-lg-6 mx-auto">
                    <p class="lead mb-5">
                    <br>
                      In addition, of course we have here an ideal kind of hotel bath room/rest room for 
                      Room 1 and 2 has the same interior designs
                      very clean and neat because we believe that cleanliness is every ones mirror that reflects to who we are in ourseleves.
                      Room 1 and 2 windows scenery during night hours.
                    </p>
                  </div>
                  <div class="col-lg-6 mx-auto">
                    <img class="img-fluid" src="img/couple-room/couple-bathroom-466.jpg" alt="CoupleRoom-Restroom">
                  </div>
                </div>
            </div>
        </div>
</section>
<section class="content-section text-white" action="code.php" method="post" id="couple-room-footer">
      <div class="container text-center">
        <h1 class="h1-footer">Rent a Room? To avail <span style="color:#FFB7C5;">Couple Room</span> please click</h1><br>
            <button type="button" class="btn couple-icon-bg  btn-lg  mr-4" name="couple-room-modal" data-toggle="modal" data-target="#couple-Modal">HERE</button>
              <?php include("includes/rooms/couple-room.php");?>
            <a href="#rooms" class="btn btn-lg btn-success js-scroll-trigger">MENU</a>
        </div>
    </section>  
    <section class="content-section bg-light" id="family-room">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <h2>NOSTALGIA's FAMILY ROOM RESERVED FOR YOU</h2>
                        <p class="lead mb-5"> This rooms has its best quality standard<br>
                        with room suitable accommodition<br> HOUSEHOLD BEDROOM REQUIREMENTS:<br>
                        1 bedroom    1-2 persons<br>
                        1 bedroom    3-4 persons<br>
                        2 bedrooms   5-6 persons<br>
                        3 bedrooms   7-8 persons<br>
                        4 bedrooms   8-10 persons</p>
                </div>
                <div class="col-lg-6 mx-auto">
                    <img class="img-fluid" src="img/family-room/family-bed-466.jpg" alt="Bed-photo"><br>
                </div>
            </div>    
            <div class="row">
                <div class="col-lg-6 mx-auto">
                  <img class="img-fluid" src="img/family-room/family-livingroom-466.jpg" alt="LivingRoom-photo"><br>
                </div>
                <div class="col-lg-6 mx-auto">
                    <h2> What goes on familyroom ?</h2>
                        <p class="lead mb-5">
                            *A large comfortable sofa or sectional<br>
                            *Extra chairs or bean bags<br>
                            *Lots of throw pillows<br>
                            *A rug , for lounging <br>
                            *A TV and the accompanying accessories <br>
                            *Room coffee maker<br>
                            *Alarm clock<br>
                            *A full length mirror<br>
                            *A nightlight<br>
                            *Water bottle or drinking glasses<br>
                            *Waste basket<br>
                            *A bedside table and reading light<br>
                            *Convenient power outlets for phones and others<br><br>
                            *Bonus Items : local magazines and maps<br>
                        </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <h2>A PURE WHITE ELEGANT ROOM,EXCLUSIVE FOR YOU AND YOUR FAMILY</h2>
                        <p class="lead mb-5">
                        In addition, of course we have here an ideal kind of hotel bath room/rest room
                        very clean and neat because we believe that cleanliness is every ones mirror
                        that reflects to who we are in ourseleves.<br>
                        A sweet gentle breeze of air at terrace area, makes your eyes wildly focus on the sea side view.
                        </p> 
                </div>
                <div class="col-lg-6 mx-auto">
                    <img class="img-fluid" src="img/family-room/family-bathroom-466.jpg" alt="Bathroom-photo"><br>
                </div>
            </div>   
        </div>
    </section>
    <section class="content-section text-white" action="code.php" method="post" id="family-room-footer">
      <div class="container text-center">
        <h1 class="h1-footer">Rent a room? To avail 
            <span style="color:red;">FA</span><span style="color:green;">M</span><span style="color:blue;">I</span><span style="color:black;">LY</span> <span style="color:blue;">R</span><span style="color:green;">O</span><span style="color:red;">OM</span>
             please click</h1><br>
             <button type="button" class="btn family-icon-bg btn-lg  mr-4" name="family-room-modal" data-toggle="modal" data-target="#family-Modal">HERE</button>
              <?php include("includes/rooms/family-room.php");?>
            <a href="#rooms" class="btn btn-lg btn-success js-scroll-trigger">MENU</a>
        </div>
    </section>

<?php
include("includes/footer.php");
include("includes/bootstrap4.php");
include("includes/script.php")
?>