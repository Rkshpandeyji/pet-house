<?php echo view('layout/header.php')?> 

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <?php echo view('layout/menu.php') ?>

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <?php echo view('admin/profile.php') ?>

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="card-body">
                            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> State Tables</h4>
                            <div class="demo-inline-spacing">
                                <div class="float-right">
                                    <a href="/add-state">
                                        <button type="button" class="btn rounded-pill btn-outline-secondary float-right"> + Add State</button>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Basic Bootstrap Table -->
                        <div class="card">
                            <h5 class="card-header">Table Basic</h5>

                            <div class="table-responsive text-nowrap">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>State</th>
                                            <th>City</th>
                                            <th>City Image</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        <tr>
                                        <?php
                             $finalres =array();
                             $staetdata = array();
                             $staetimage = array();
                             // $finalres[$value1->id]=array('state'=>$value1->state_id,'city'=>$value1->name,'image'=>$value1->image); 
                            

                             foreach ($res['city'] as $key => $value){ 
                                $arrayres= (array)$value;
                               
                                if (isset($staetdata[$arrayres['state_id']])) {
                                    $staetdata[$arrayres['state_id']] .= $arrayres['name'] . ' , ';
                                } else {
                                    $staetdata[$arrayres['state_id']] = $arrayres['name'] . ', ';
                                } 
                                if (isset($staetdata[$arrayres['image']])) {
                                    $staetimage[$arrayres['state_id']][$arrayres['id']] += $arrayres['image'];
                                } else {
                                    $staetimage[$arrayres['state_id']][$arrayres['id']] = $arrayres['image'];
                                } 
                                
                            } 
                            foreach ($res['state'] as $key => $value){ 
                                $statedata= (array)$value;
                                $statename[$statedata['id']]=$statedata['name'];

                            }
                            // echo "<pre>";
                            // print_r($statename);
                            // echo "</pre>";
                            
                            $i=1;
                            foreach ($staetimage as $key => $data){
                                $i++;

                                // print_r((array)$res['state']);
                                                ?>

                                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?= $key ?></strong></td>
                                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?= $statename[$key] ?></strong></td>
                                            <td><?php 
                                            
                                             $city = explode(',',rtrim($staetdata[$key],', '));
                                             if(substr_count(rtrim($staetdata[$key],', '),',')>3){

                                                 foreach ($city  as $key => $value) {
                                                    //  echo $key;
                                                     if($key%3 == '0'){
                                                         echo '<br>';
                                                        }
                                                        echo $value;
                                                 }
                                             }else{
                                               echo rtrim($staetdata[$key],', ');
                                             }
                                            ?></td>
                                            <td>
                                                <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                                    <?php foreach ($data as $key1 => $product){
                                                //   echo "<pre>";
                                                //   print_r($product);
                                                //   echo "</pre>"; 
                                                   ?>
                                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" >
                                                        <img src="../city/uploads/<?= $product ?>" alt="Avatar" class="rounded-circle" />
                                                    </li>
                                        <?php } ?>

                                                    <!-- <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                                                        <img src="../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle" />
                                                    </li>
                                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Christina Parker">
                                                        <img src="../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle" />
                                                    </li> -->
                                                </ul>
                                            </td>
                                            <td><span class="badge bg-label-primary me-1">Active</span></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="/edit-state/<?= $key ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                                        <a class="dropdown-item" href="/delete-state/<?= $key ?>"><i class="bx bx-trash me-1"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                        <tr>
                                            <td><i class="fab fa-react fa-lg text-info me-3"></i> <strong>React Project</strong></td>
                                            <td>Barry Hunter</td>
                                            <td>
                                                <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Lilian Fuller">
                                                        <img src="../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" />
                                                    </li>
                                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                                                        <img src="../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle" />
                                                    </li>
                                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Christina Parker">
                                                        <img src="../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle" />
                                                    </li>
                                                </ul>
                                            </td>
                                            <td><span class="badge bg-label-success me-1">Completed</span></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-2"></i> Edit</a>
                                                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-2"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><i class="fab fa-vuejs fa-lg text-success me-3"></i> <strong>VueJs Project</strong></td>
                                            <td>Trevor Baker</td>
                                            <td>
                                                <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Lilian Fuller">
                                                        <img src="../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" />
                                                    </li>
                                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                                                        <img src="../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle" />
                                                    </li>
                                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Christina Parker">
                                                        <img src="../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle" />
                                                    </li>
                                                </ul>
                                            </td>
                                            <td><span class="badge bg-label-info me-1">Scheduled</span></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-2"></i> Edit</a>
                                                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-2"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <i class="fab fa-bootstrap fa-lg text-primary me-3"></i> <strong>Bootstrap Project</strong>
                                            </td>
                                            <td>Jerry Milton</td>
                                            <td>
                                                <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Lilian Fuller">
                                                        <img src="../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" />
                                                    </li>
                                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                                                        <img src="../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle" />
                                                    </li>
                                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Christina Parker">
                                                        <img src="../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle" />
                                                    </li>
                                                </ul>
                                            </td>
                                            <td><span class="badge bg-label-warning me-1">Pending</span></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-2"></i> Edit</a>
                                                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-2"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--/ Basic Bootstrap Table -->
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />

                        <?php echo view('layout/footar.php') ?>

</body>

</html>