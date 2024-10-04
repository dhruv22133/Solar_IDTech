<!--**********************************

            Sidebar end

        ***********************************-->

<!--**********************************

            Content body start

        ***********************************-->

<div class="content-body">

 <div class="row page-titles mx-0">

    <div class="col p-md-0">

      <ol class="breadcrumb">

        <li class="breadcrumb-item">

          <a href="javascript:void(0)">Dashboard</a>

        </li>

        <li class="breadcrumb-item">

          <a href="javascript:void(0)">Reports</a>

        </li>

        <li class="breadcrumb-item active">

          <a href="javascript:void(0)">Deleted Assets</a>

        </li>

      </ol>

    </div>

  </div>

  <!-- row -->

  <div class="backgroundassetsRegis">

    <div class="container-fluid">

      <div class="row">

        <!-- <div class="col-lg-12">

          <div class="card">

            <div class="col-lg-12 bg-primary text-white" style="background-color:#1168f9!important;">

              <div class="card-header">Deleted Assets</div>

            </div>

            

          </div>

        </div> -->

        <div class="col-12">

          <div class="card">

            <div class="col-lg-12 bg-primary text-white" style="background-color:#495057!important;">

              <div class="card-header"> Deleted Assets </div>

            </div>

            <div class="card-body">

              <div class="table-responsive" style="overflow-x:auto; ">

                <table id="example" class=" table-striped table-bordered zero-configuration">

                  <thead>

                    <tr>

                     <th>Id</th>

                      <th>Tag Id</th>

                      <th>Asset Code</th>

                      <th>Unique ID</th>

                      <th>Category</th>

                      <th>Sub Category</th>

                      <th>Department Name</th>

                      <th>Asset User</th>

                      <th>Deleted By</th>

                      <th>Deleted At</th>
                    </tr>

                  </thead>

                  <tfoot>

                    <tr>

                      <th>Id</th>

                      <th>Tag Id</th>

                      <th>Asset Code</th>

                      <th>Unique ID</th>
                      
                      <th>Category</th>

                      <th>Sub Category</th>

                      <th>Department Name</th>

                      <th>Asset User</th>

                      <th>Deleted By</th>

                      <th>Deleted At</th>
                  </tr>

                  </tfoot>

                  <tbody>

                    <?php  $count=1;

                        if(!empty($log)){
                        foreach($log as $row){ ?>

                        <tr>

                          <td><?= $count; ?></td>

                          <td><?= $row['tag_id']; ?></td>

                          <td><?= $row['asset_code']; ?></td>

                          <td><?= $row['UNIQUEID']; ?></td>

                          <td><?= $row['cat']; ?></td>

                           <td><?= $row['Assetsubcategory']; ?></td>

                          <td><?= $row['dep_name']; ?></td>

                          <td><?= $row['asset_user']; ?></td>

                          <td><?= $row['deletion_by']; ?></td>

                          <td><?= $row['deletion_at']; ?></td>
                        </tr>

                        <?php $count++; }} ?>



                </tbody>

                </table>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

  </div>

</div>

<!-- #/ container -->

</div>

<!--**********************************

            Content body end

        ***********************************-->

<!--**********************************

            Footer start

        ***********************************-->