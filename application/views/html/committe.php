    <section class="breadcrumb-section section-bg-clr5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-content">
                        <h2>Committee</h2>
                        <ul>
                            <li><a href="<?php echo base_url(); ?>">home</a></li>
                            <li>Committee</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--==================================
    ===== Committee ===========
    ===================================-->   

    <?php if(isset($committe_list) && count($committe_list)>0){ ?>
    <section class="volunters-section section-padding section-background">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Section Heading Start -->
                    <div class="section-heading">
                        <h2>our <span>Members</span></h2>
                        <span>
                            <img src="<?php echo base_url(); ?>assets/vendor/images/icon.png" alt="icon">
                        </span>
                        <p>A dedicated and committed team joined mission of  protecting Santhana Dharma.</p>
                    </div>
                    <!-- Section heading End -->
                </div>
            </div>
            <div class="row">
                <?php foreach($committe_list as $li){ ?>
                <div class="col-md-4 col-sm-6">
                    <!-- Volunter List Start -->
                    <div class="volunter-list">
                        <!-- Volunter Thumb Start -->
                        <div class="volunter-thumb text-center" >
                            <img class=" img-thumbnail" src="<?php echo base_url('assets/volunteer/'.$li['image']); ?>" alt="<?php echo isset($li['org_image'])?$li['org_image']:''; ?>">

                        </div>
                        <!-- Volunter Thumb End -->
                        <!-- Volunter Content Start -->
                        <div class="volunter-content">
                            <h4>
                                <?php echo isset($li['name'])?$li['name']:''; ?>
                            </h4>
                            <p>
                                <?php echo isset($li['category'])?$li['category']:''; ?>
                            </p>

                        </div>
                        <!-- Volunter COntent End -->
                    </div>
                    <!-- Volunter List End -->
                </div>
                <?php } ?>

            </div>
        </div>
    </section>

    <?php } ?>