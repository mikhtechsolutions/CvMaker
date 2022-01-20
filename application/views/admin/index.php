  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <div class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1 class="m-0 text-dark"><?=trans('label_dashboard')?></h1>

          </div><!-- /.col -->

        </div><!-- /.row -->

      </div><!-- /.container-fluid -->

    </div>

    <!-- /.content-header -->



    <!-- Main content -->

    <section class="content">

      <div class="container-fluid">

        <!-- Small boxes (Stat box) -->

        <div class="row">

          <div class="col-lg-3 col-6">

            <!-- small box -->

            <div class="small-box bg-info">

              <div class="inner">

                <h3><?=$recent_users?></h3>

                <p><?=trans('recently_joined')?></p>

              </div>

              <div class="icon">

                <i class="ion ion-person"></i>

              </div>

              <a href="<?=base_url().'admin/users/recent'?>" class="small-box-footer"><?=trans('more_info')?> <i class="fa fa-arrow-circle-right"></i></a>

            </div>

          </div>



          <!-- ./col -->

          <div class="col-lg-3 col-6">

            <!-- small box -->

            <div class="small-box bg-warning">

              <div class="inner">

                <h3><?=$total_users?></h3>



                <p><?=trans('user_registrations')?></p>

              </div>

              <div class="icon">

                <i class="ion ion-person-add"></i>

              </div>

              <a href="<?=base_url().'admin/users'?>" class="small-box-footer"><?=trans('more_info')?><i class="fa fa-arrow-circle-right"></i></a>

            </div>

          </div>

          <!-- ./col -->

          <div class="col-lg-3 col-6">

            <!-- small box -->

            <div class="small-box bg-success">

              <div class="inner">

                <h3><?=$active_users?></h3>



                <p>Active User<?=($active_users>1)?'s':'';?></p>

              </div>

              <div class="icon">

                <i class="ion ion-person"></i>

              </div>

              <a href="<?=base_url().'admin/users/active'?>" class="small-box-footer"><?=trans('more_info')?><i class="fa fa-arrow-circle-right"></i></a>

            </div>

          </div>

          <!-- ./col -->

          <div class="col-lg-3 col-6">

            <!-- small box -->

            <div class="small-box bg-danger">

              <div class="inner">

                <h3><?=$inactive_users?></h3>



                <p><?=trans('inactive_user')?><?=($inactive_users>1)?'s':'';?></p>

              </div>

              <div class="icon">

                <i class="ion ion-person"></i>

              </div>

              <a href="<?=base_url().'admin/users/inactive'?>" class="small-box-footer"><?=trans('more_info')?><i class="fa fa-arrow-circle-right"></i></a>

            </div>

          </div>

          <!-- ./col -->

        </div>

        <!-- /.row -->

        </div>         



    </section>



  </div>