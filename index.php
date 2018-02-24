<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Am I Cute : Yes you are</title>
    <link href="styles/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <link href="styles/default.css" type="text/css" rel="stylesheet" />
    <script src="scripts/jquery-1.10.2.min.js" type="text/javascript"></script>
    <script src="scripts/bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".navbar-nav li a[href^='#']").on('click', function (event) {
                var target;
                target = this.hash;

                event.preventDefault();

                var navOffset;
                navOffset = $('#my-navbar').height();

                return $('html, body').animate({
                    scrollTop: $(this.hash).offset().top - navOffset
                }, 800, function () {
                    return window.history.pushState(null, null, target);
                });
            });
        })
    </script>
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" id="my-navbar">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="" class="navbar-brand">Am I Cute</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <a href="" class="btn btn-info navbar-btn navbar-right">Download Certificate</a>
                <ul class="nav navbar-nav">
                    <li><a href="#home">HOME</a></li>
                    <li><a href="#vote">VOTE HERE</a></li>
                    <li><a href="#toprankers">TOP RANKERS</a></li>
                    <li><a href="#submitentry">SUBMIT ENTRY</a></li>
                    <li><a href="#contact">CONTACT US</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <section id="home">
        <div class="jumbotron">
            <div class="container text-center">
                <h1>Are you Pretty?</h1>
                <p>Post your pic and win among your friends. Get AmICute certificate..!</p>
                <div class="center-block">
                    <img src="images/men.jpg" class="img-thumbnail" />
                    <img src="images/women.jpg" class="img-thumbnail" />
                    <img src="images/child.jpg" class="img-thumbnail" />
                </div>
            </div>
        </div>
        <div class="jumbotron text-center">
            <p style="font-size:80%;padding:10px;background-color:#e1e1e1;">
                If you want to know that, where will you stand among your friends when it comes to beauty contest. This is the right place where you can competate with your
                friendss or others in beauty(even inner beauty also matters). You can ask your friends to vote you. The winner will be decided by number of votes gained in specific
                time period. This is a healthy competetion, there are no chances to critisize or ashameing people. We remove accounts if any. We are providing security for your
                images by restricting right click, blocking some tools to stop copying images to local disk.<br />&nbsp;
            </p>
        </div>
    </section>
    <!--vote here corousal-->
    <section id="vote">
        <div class="container">
            <div class="page-header">
                <h2>Vote Here   <small> - Find your friends and vote here</small></h2>
            </div>
            <div class="carousel slide" id="vote-carousel" data-ride="carousel" data-interval="false">
                <ol class="carousel-indicators">
                    <li data-target="#vote-carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#vote-carousel" data-slide-to="1"></li>
                    <li data-target="#vote-carousel" data-slide-to="2"></li>
                    <li data-target="#vote-carousel" data-slide-to="3"></li>
                    <li data-target="#vote-carousel" data-slide-to="4"></li>
                    <li data-target="#vote-carousel" data-slide-to="5"></li>
                </ol>
                <div class="carousel-inner center-block">
                    <div class="item active">
                        <img src="images/competition/0000.jpg" alt="" />
                    </div>
                    <div class="item">
                        <img src="images/competition/1111.jpg" alt="" />
                    </div>
                    <div class="item">
                        <img src="images/competition/2222.jpg" alt="" />
                    </div>
                    <div class="item">
                        <img src="images/competition/3333.jpg" alt="" />
                    </div>
                    <div class="item">
                        <img src="images/competition/4444.jpg" alt="" />
                    </div>
                    <div class="item">
                        <img src="images/competition/5555.jpg" alt="" />
                    </div>
                </div>
                <div class="text-center">
                    <!--<input id="input-id" type="number" class="rating" min=0 max=5 step=0.5 data-size="md">-->
                    <span class="rating">
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                    </span>
                </div>
            </div>
        </div>
    </section>
    <!--end of vote here-->
    <!--top rankers-->
    <section id="toprankers">
        <div class="container">
            <div class="page-header">
                <h2>Top Rankers  <small>- Cute people of the world...</small></h2>
            </div>
            <div class="container">
                <div class="page-header">
                    <h3>Top Rankers of the Day  <small>- Cute people of the world...</small></h3>
                </div>
                <div class="row">
					<?php 
						require_once("config.php");
						$sql = "SET @curRank =0";
						$conn->query($sql);
						$sql = "SELECT Candidate_Name,Image,@curRank := @curRank + 1 AS rank FROM candidate ORDER BY Votes desc;";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
							// output data of each row
							while($row = $result->fetch_assoc()) {
								echo "<div class='col-lg-2'><img src='".$row['Image']."' class='img-circle' /><blockquote>".$row['Candidate_Name']. 
								"<footer class='text-center'>Rank ".$row['rank']."</footer></blockquote></div>";
							}
						} else {
							echo "0 results";
						}
						$conn->close();
					?>					
				</div>
            </div>
            <div class="container">
                <div class="page-header">
                    <h3>Top Rankers of the Month  <small>- Cute people of the world...</small></h3>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        <img src="images/men.jpg" class="img-circle" />
                        <blockquote>
                            Krishna Velamuri
                            <footer class="text-center">Rank 1</footer>
                        </blockquote>
                    </div>
                    <div class="col-lg-2">
                        <img src="images/women.jpg" class="img-circle" />
                        <blockquote>
                            Anupama Velamur
                            <footer class="text-center">Rank 2</footer>
                        </blockquote>
                    </div>
                    <div class="col-lg-2">
                        <img src="images/child.jpg" class="img-circle" />
                        <blockquote>
                            Saketh Velamuri
                            <footer class="text-center">Rank 3</footer>
                        </blockquote>
                    </div>
                    <div class="col-lg-2">
                        <img src="images/girls.jpg" class="img-circle" />
                        <blockquote>
                            Anna Williams
                            <footer class="text-center">Rank 4</footer>
                        </blockquote>
                    </div>
                    <div class="col-lg-2">
                        <img src="images/boys.jpg" class="img-circle" />
                        <blockquote>
                            Adam Taylor
                            <footer class="text-center">Rank 5</footer>
                        </blockquote>
                    </div>
                    <div class="col-lg-2">
                        <img src="images/adminchoice.jpg" class="img-circle" />
                        <blockquote>
                            Sindhu Velamuri
                            <footer class="text-center">Admin Choice</footer>
                        </blockquote>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="page-header">
                    <h3>Top Rankers of the Year  <small>- Cute people of the world...</small></h3>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        <img src="images/men.jpg" class="img-circle" />
                        <blockquote>
                            Krishna Velamuri
                            <footer class="text-center">Rank 1</footer>
                        </blockquote>
                    </div>
                    <div class="col-lg-2">
                        <img src="images/women.jpg" class="img-circle" />
                        <blockquote>
                            Anupama Velamur
                            <footer class="text-center">Rank 2</footer>
                        </blockquote>
                    </div>
                    <div class="col-lg-2">
                        <img src="images/child.jpg" class="img-circle" />
                        <blockquote>
                            Saketh Velamuri
                            <footer class="text-center">Rank 3</footer>
                        </blockquote>
                    </div>
                    <div class="col-lg-2">
                        <img src="images/girls.jpg" class="img-circle" />
                        <blockquote>
                            Anna Williams
                            <footer class="text-center">Rank 4</footer>
                        </blockquote>
                    </div>
                    <div class="col-lg-2">
                        <img src="images/boys.jpg" class="img-circle" />
                        <blockquote>
                            Adam Taylor
                            <footer class="text-center">Rank 5</footer>
                        </blockquote>
                    </div>
                    <div class="col-lg-2">
                        <img src="images/adminchoice.jpg" class="img-circle" />
                        <blockquote>
                            Sindhu Velamuri
                            <footer class="text-center">Admin Choice</footer>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end of top rankers-->
    <!--submit entry-->
    <section id="submitentry">
        <div class="container">
            <section>
                <div class="page-header">
                    <h3>Submit Your Entry Here   <small>- Upload your pic and provide necessary info.</small></h3>
                </div>
                <div class="well">
                    <div class="container text-center">
                        <form class="form-horizontal" method="post" action="submit.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name" class="col-md-2 control-label">Name</label>
                                <div class="col-md-4">
                                    <input type="text" name="Candidate_Name" class="form-control" placeholder="Enter your name" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dob" class="col-md-2 control-label">Date of Birth</label>
                                <div class="col-md-4">
                                    <div class='input-group date' id='dob'>
                                        <input type='text' name="DateofBirth" class="form-control" />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-md-2 control-label">Email</label>
                                <div class="col-md-4">
                                    <input type="text" name="Email" class="form-control" placeholder="Enter your email" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="category" class="col-md-2 control-label">Category</label>
                                <div class="col-md-4">
                                    <select type="text" name="Category" class="form-control">
                                        <option value="">-Select-</option>
										<option value="">Men</option>
										<option value="">Women</option>
										<option value="">Boys</option>
										<option value="">Girls</option>
										<option value="">Child</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="caption" class="col-md-2 control-label">Caption</label>
                                <div class="col-md-4">
                                    <input type="text" name="Caption" class="form-control" placeholder="Enter caption" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nationality" class="col-md-2 control-label">Nationality</label>
                                <div class="col-md-4">
                                    <select type="text" name="Nationality" class="form-control">
                                        <option>-Select-</option>
                                        *
                                        <option>India</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="image" class="col-md-2 control-label">Upload</label>
                                <div class="col-md-4">
                                    <span class=" btn btn-default btn-file form-control">
                                        <input name="userfile" type="file" id="userfile" required />
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8">
                                    <input type="checkbox" class="checkbox-inline" id="terms" required /> By selecting this, I am accepting terms and conditions.
                                </div>
                            </div>
                            <div class=" container col-md-8 center-block">
                                <button name="Insert_Post" type="submit" class="btn btn-md btn-info">Submit photo</button>
                                <button type="reset" class="btn btn-md btn-warning">Clear</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </section>
    <!--end of submit entry-->
    <!--contact us-->
    <section id="contact">
        <div class="container">
            <div class="page-header">
                <h3>Contact Us   <small>- our contact info.</small></h3>
            </div>
            <div class="row contact">
                <div class="col-md-6 marginwithcolumn">
                    <p>
                        <h3>Bangalore, Karnataka, India</h3>
                        #98, NMR Layout, Udaya Nagar <br />
                        Bangalore - 560016 <br />
                        Phone: 080 - 6254879, Mobile: 8747848111<br />
                        Mail: brundasoft@gmail.com
                    </p>
                    <p>&nbsp;</p><p>&nbsp;</p>
                    <h3>Kavali, Andhra Pradesh, India</h3>
                    <p>
                        5-1-74A/K, Jonnaigunta St, Old town<br />
                        Kavali - 524201, A.P <br />
                        Phone: 08626 - 2547893, Mobile: N/A <br />
                        Mail: brundasoft@gmail.com
                    </p>
                    <p>&nbsp;</p>
                </div>
                <div class="col-md-4">
                    <h4>Contat here....</h4>
                    <form action="" method="post" class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Name</label>
                            <div class="col-lg-8">
                                <input type="text" name="Name" class="form-control" placeholder="Name" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="mail" class="col-md-4 control-label">Email</label>
                            <div class="col-lg-8">
                                <input type="text" name="Mail" class="form-control" placeholder="Email" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="subject" class="col-md-4 control-label">Subject</label>
                            <div class="col-lg-8">
                                <input type="text" name="Subject" class="form-control" placeholder="Subject" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="comments" class="col-md-4 control-label">Comments</label>
                            <div class="col-lg-8">
                                <textarea rows="3" name="Comments" class="form-control" placeholder="Subject"></textarea>
                            </div>
                        </div>
                    </form>
                    <div class="text-center" style="margin-left:20%;">
                        <button type="submit" class="btn btn-md btn-info">Send</button>
                        <button type="reset" class="btn btn-md btn-warning">Clear</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end of contact us-->
    <footer style="background-color:#222;height:100px;color:#cccccc;">
        <div class="container">
            <div class="row" style="margin:25px;">
                <div class="col-sm-4">
                    For any quries send mail to <a href="mailto:admin@amicute.com?subject=Query%20AmICute">Admin</a><br />
                    Site admin is not responsible for any issues.<br />
                    Ranks are based on user ratings only.
                </div>
                <div class="col-sm-8 text-center">
                    Designed and built and maintained with all the love in the world by <b>Brunda Web Solutions</b>. Copyright &copy; 2013 AmICute.com - All Rights Reserved.
                </div>
            </div>
        </div>
    </footer>
</body>
</html>