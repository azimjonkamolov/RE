<?php 
    include'header.php';
    use App\Classes\RealEstate\RealEstate;
?>
<div class="">
    <div id="slider" class="sl-slider-wrapper">
        <div class="sl-slider">
            <?php
                require_once ('../vendor/autoload.php');
                $real_estate = new RealEstate();
                $all_data = $real_estate->viewTopData();
                foreach($all_data as $single_data){
                    $image = explode(",", $single_data->images);
            ?>
            <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
                <div class="sl-slide-inner">
                    <div class="bg-img"><img style="width: 100%; height: 100%;" src="../resources/images/properties/<?=$image[0]?>" alt="<?=$single_data->name?>"></div>
                    <h2><a href="property_detail.php?id=<?=$single_data->id?>"><?=$single_data->name?></a></h2>
                    <blockquote>              
                        <p class="location"><span class="glyphicon glyphicon-map-marker"></span> <?=$single_data->address?></p>
                        <p><?=$single_data->description?></p>
                        <cite> Price: $ <?=$single_data->monthly_charge?></cite>
                    </blockquote>
                </div>
            </div>
            <?php } ?>
        </div><!-- /sl-slider -->
        <nav id="nav-dots" class="nav-dots">
            <span class="nav-dot-current"></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </nav>
    </div><!-- /slider-wrapper -->
</div>
<div class="banner-search">
    <div class="container"> 
    <!-- banner -->
    <h3>Buy, Sale & Rent</h3>
        <div class="searchbar">
            <div class="row">
                <div class="col-lg-6 col-sm-6">
                    <form action="search_result.php" method="get" class="form form-group">
                        <input type="text" class="form-control" name="search" placeholder="Search By Names/Address">
                        <div class="row">
                            <div class="col-lg-3 col-sm-3 ">
                                <select class="form-control">
                                    <option>Buy</option>
                                    <option>Rent</option>
                                    <option>Sale</option>
                                </select>
                            </div>
                            <div class="col-lg-3 col-sm-4">
                                <select class="form-control">
                                    <option>Price</option>
                                    <option>$150,000 - $200,000</option>
                                    <option>$200,000 - $250,000</option>
                                    <option>$250,000 - $300,000</option>
                                    <option>$300,000 - above</option>
                                </select>
                            </div>
                            <div class="col-lg-3 col-sm-4">
                                <select class="form-control">
                                    <option>Property</option>
                                    <option>Apartment</option>
                                    <option>Building</option>
                                    <option>Office Space</option>
                                </select>
                            </div>
                            <div class="col-lg-3 col-sm-4">
                                <button class="btn btn-success"  onclick="window.location.href='buysalerent.php'">Find Now</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-5 col-lg-offset-1 col-sm-6 ">
                    <p>Join now and get updated with all the properties deals.</p>
                    <button class="btn btn-info"   data-toggle="modal" data-target="#loginpop">Login</button>        
                </div>
            </div>
        </div>
    </div>
</div>
<!-- banner -->
<div class="container">
    <div class="properties-listing spacer"> <a href="buysalerent.php" class="pull-right viewall">View All Listing</a>
    <h2>Featured Properties</h2>
        <div id="owl-example" class="owl-carousel">
            <?php
                require_once ('../vendor/autoload.php');
                $real_estate = new RealEstate();
                $all_data = $real_estate->viewAllData();
                foreach($all_data as $single_data){
                    $image = explode(",", $single_data->images);
                ?>                     
                <div class="properties">
                    <div class="image-holder"><img src="../resources/images/properties/<?=$image[0]?>" class="img-responsive" alt="properties"/>
                        <?php if($single_data->status == 0): ?>
                            <div class="status new">Available</div>
                        <?php else: ?>
                            <div class="status sold">Booked</div>
                        <?php endif; ?>
                    </div>
                    <h4><a href="property_detail.php?id=<?=$single_data->id?>"><?=$single_data->name?></a></h4>
                    <p class="price">Price: <?=$single_data->monthly_charge?></p>
                    <div class="listing-detail">
                        <span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room"><?=$single_data->bed_room?></span> 
                        <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room"><?=$single_data->living_room?></span> 
                        <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking"><?=$single_data->parking?></span> 
                        <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen"><?=$single_data->kitchen?></span> 
                    </div>
                    <a class="btn btn-primary" href="property_detail.php?id=<?=$single_data->id?>">View Details</a>
                </div>
            <?php }   ?> 
        </div>
    </div>
    <div class="spacer">
        <div class="row">
            <div class="col-lg-6 col-sm-9 recent-view">
                <h3>About Us</h3>
                <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.<br><a href="about.php">Learn More</a></p>
            </div>
            <div class="col-lg-5 col-lg-offset-1 col-sm-3 recommended">
                <h3>Recommended Properties</h3>
                <div id="myCarousel" class="carousel slide">
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1" class=""></li>
                        <li data-target="#myCarousel" data-slide-to="2" class=""></li>
                        <li data-target="#myCarousel" data-slide-to="3" class=""></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="row">
                                <div class="col-lg-4"><img src="../resources/images/properties/1.jpg" class="img-responsive" alt="properties"/></div>
                                <div class="col-lg-8">
                                <h5><a href="property_detail.php">Integer sed porta quam</a></h5>
                                <p class="price">$300,000</p>
                                <a href="property_detail.php" class="more">More Detail</a> </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="row">
                                <div class="col-lg-4"><img src="../resources/images/properties/2.jpg" class="img-responsive" alt="properties"/></div>
                                <div class="col-lg-8">
                                <h5><a href="property_detail.php">Integer sed porta quam</a></h5>
                                <p class="price">$300,000</p>
                                <a href="property_detail.php" class="more">More Detail</a> </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="row">
                                <div class="col-lg-4"><img src="../resources/images/properties/3.jpg" class="img-responsive" alt="properties"/></div>
                                <div class="col-lg-8">
                                <h5><a href="property_detail.php">Integer sed porta quam</a></h5>
                                <p class="price">$300,000</p>
                                <a href="property_detail.php" class="more">More Detail</a> </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="row">
                                <div class="col-lg-4"><img src="../resources/images/properties/4.jpg" class="img-responsive" alt="properties"/></div>
                                <div class="col-lg-8">
                                <h5><a href="property_detail.php">Integer sed porta quam</a></h5>
                                <p class="price">$300,000</p>
                                <a href="property_detail.php" class="more">More Detail</a> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include'footer.php';?>