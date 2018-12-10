    <section class="breadcrumb-section section-bg-clr5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-content">
                        <h2>Gallery</h2>
                        <ul>
                            <li><a href="<?php echo base_url(); ?>">home</a></li>
                            <li>Gallery</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
<section id="portfolio" class="gallery section-padding section-background">
          <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Section Heading Start -->
                    <div class="section-heading">
                        <h2>Our <span>Gallery</span></h2>
                        <span>
                            <img src="<?php echo base_url(); ?>assets/vendor/images/icon.png" alt="icon">
                        </span>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </p>
                    </div>
                    <!-- Section heading End -->
                </div>
            </div>
              <div class="row">
                      <div class=" col-md-12">
                          <?php if(isset($gallery_list) && count($gallery_list)>0){ ?>
                          <div id="galleryitems">
                               <?php foreach($gallery_list as $li){ ?>
                              <div class="chartiy single-item">
                                  <div class="single-isotope">
                                      <div class="layer">
                                      </div>
                                      <div class="isotope-social">
                                          <a href="<?php echo base_url('assets/gallery/'.$li['image']); ?>" data-rel="lightcase"><i class="fa fa-search" aria-hidden="true"></i></a>
                                          <a href="#"><i class="fa fa-link" aria-hidden="true"></i></a>
                                      </div>
                                      <img src="<?php echo base_url('assets/gallery/'.$li['image']); ?>" alt="<?php echo isset($li['org_image'])?$li['org_image']:''; ?>">
                                  </div>
                              </div>
                              
							<?php } ?>
                              
                          </div>
						  <?php } ?>
                      </div>
              </div>
             
          </div>
    </section>
