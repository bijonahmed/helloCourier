<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">

        <div class="collapse navbar-collapse justify-content-end">
        <!--    <form class="navbar-form">
                <div class="input-group no-border">
                    <input type="text" value="" class="form-control" placeholder="Search your booking id...">
                    <button type="submit" class="btn btn-white btn-round btn-just-icon">
                        <i class="material-icons">search </i>
                        <div class="ripple-container"></div>
                    </button>
                </div>
            </form>-->
            <ul class="navbar-nav">

                <li class="nav-item dropdown">
                    <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">person</i>
                        <p class="d-lg-none d-md-block">
                            Account
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                        <a class="dropdown-item" href="<?php echo base_url()?>marchent/updateProfile">Profile</a>
                        <!--                                        <a class="dropdown-item" href="#">Settings</a>-->
                        <div class="dropdown-divider"></div>
                        <?php
                        $user_id = $this->session->userdata('user_id');
                        if (!empty($user_id)) {
                            ?>
                            <a class="dropdown-item" href="<?php echo base_url(); ?>login/logout_marchent">Log out</a>
                            <?php
                        }
                        ?>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>