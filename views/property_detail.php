<?php 
    include'header.php';
    use App\Classes\RealEstate\RealEstate;
?>
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="#">Home</a> / Buy</span>
    <h2>Buy</h2>
    </div>
</div>
<!-- banner -->
<div class="container">
    <div class="properties-listing spacer">
        <div class="row">
            <div class="col-lg-3 col-sm-4 hidden-xs">
                <div class="hot-properties hidden-xs">
                    <h4>Hot Properties</h4>
                    <?php
                        require_once ('../vendor/autoload.php');
                        $real_estate = new RealEstate();
                        $all_data = $real_estate->viewTopData();
                        foreach($all_data as $single_data){
                            $image = explode(",", $single_data->images);
                    ?>
                    <div class="row">
                        <div class="col-lg-4 col-sm-5"><img src="../resources/images/properties/<?=$image[0]?>" class="img-responsive img-circle" alt="<?=$single_data->name?>"></div>
                        <div class="col-lg-8 col-sm-7">
                            <h5><a href="property_detail.php?id=<?=$single_data->id?>"><?=$single_data->name?></a></h5>
                            <p class="price">$ <?=$single_data->monthly_charge?></p> 
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <div class="advertisement">
                    <h4>Advertisements</h4>
                    <img src="../resources/images/advertisements.jpg" class="img-responsive" alt="advertisement">
                </div>
            </div>
            <div class="col-lg-9 col-sm-8 ">
                <?php
                    require_once ('../vendor/autoload.php');
                    $real_estate = new RealEstate();
                    $single_data = $real_estate->viewSingleData($_GET['id']);
                ?>
                <h2><?=$single_data->name?></h2>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="property-images">
                            <!-- Slider Starts -->
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <ol class="carousel-indicators hidden-xs">
                                    <?php
                                        $image = explode(",",$single_data->images);
                                        $image_count = count($image);
                                        $image_index = 0;
                                        while($image_index<$image_count){
                                            if($image_index == 0){
                                    ?>
                                    <li data-target="#myCarousel" data-slide-to="<?=$image_index?>" class="active"></li>
                                    <?php   
                                        }else{  
                                    ?>
                                    <li data-target="#myCarousel" data-slide-to="<?=$image_index?>" class=""></li>
                                    <?php
                                        }
                                        $image_index++;
                                        }
                                    ?>
                                </ol>
                                <div class="carousel-inner">
                                    <?php
                                        $image = explode(",",$single_data->images);
                                        $image_count = count($image);
                                        $i = 0;
                                        while($i<$image_count){
                                            if($i ==0){
                                    ?>
                                    <!-- Item -->
                                    <div class="item active">
                                        <img src="../resources/images/properties/<?=$image[$i];?>" class="properties" alt="properties" />
                                    </div>
                                    <!-- #Item-->
                                    <?php } else  { ?> 
                                        <!-- Item -->
                                        <div class="item">
                                            <img src="../resources/images/properties/<?=$image[$i];?>" class="properties" alt="properties" />
                                        </div>
                                        <!-- #Item-->
                                    <?php   }
                                            $i++;
                                        }
                                    ?>
                                </div>
                                <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                                <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
                            </div>
                            <!-- #Slider Ends -->
                        </div>
                        <div class="spacer"><h4><span class="glyphicon glyphicon-th-list"></span> Properties Detail</h4>
                            <p><?=$single_data->description?></p>
                            
                        </div>
                        <div>
                            <h4><span class="glyphicon glyphicon-map-marker"></span> Location</h4>
                            <div class="well"><iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Pulchowk,+Patan,+Central+Region,+Nepal&amp;aq=0&amp;oq=pulch&amp;sll=37.0625,-95.677068&amp;sspn=39.371738,86.572266&amp;ie=UTF8&amp;hq=&amp;hnear=Pulchowk,+Patan+Dhoka,+Patan,+Bagmati,+Central+Region,+Nepal&amp;ll=27.678236,85.316853&amp;spn=0.001347,0.002642&amp;t=m&amp;z=14&amp;output=embed"></iframe></div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="col-lg-12  col-sm-6">
                            <div class="property-info">
                                <p class="price">Rent: $ <?=$single_data->monthly_charge?></p>
                                <p class="area"><span class="glyphicon glyphicon-map-marker"></span> Address: <?=$single_data->address?></p>
                                <p class="area"><span class="glyphicon glyphicon-th-list"></span> Floor space: <?=$single_data->floor_space?></p>
                                <p class="area"><span class="glyphicon glyphicon-th-list"></span> Access: <?=$single_data->access?></p>
                                <p class="area"><span class="glyphicon glyphicon-th-list"></span> Utilities: <?=$single_data->utility?></p>
                                <div class="profile">
                                    <span class="glyphicon glyphicon-user"> Agent Details: </span>  
                                    <p> Name: <?=$single_data->owner_name?><br> Contact: <?=$single_data->contact?></p>
                                </div>
                            </div>
                            <h6><span class="glyphicon glyphicon-home"></span> Availabilty</h6>
                            <div class="listing-detail">
                                <span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room"><?=$single_data->bed_room?></span> 
                                <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room"><?=$single_data->living_room?></span> 
                                <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking"><?=$single_data->parking?></span> 
                                <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen"><?=$single_data->kitchen?></span> 
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-6 ">
                            <div class="enquiry">
                                <h6><span class="glyphicon glyphicon-envelope"></span> Post Enquiry</h6>
                                <form role="form">
                                    <input type="text" class="form-control" placeholder="Full Name"/>
                                    <input type="text" class="form-control" placeholder="you@yourdomain.com"/>
                                    <input type="text" class="form-control" placeholder="your number"/>
                                    <textarea rows="6" class="form-control" placeholder="Whats on your mind?"></textarea>
                                    <button type="submit" class="btn btn-primary" name="Submit">Send Message</button>
                                </form>
                            </div>         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include'footer.php';?>