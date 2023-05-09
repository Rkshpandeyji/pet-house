<?php echo view('layout/header.php') ?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">
<script>
$(function(){
    <?php if(session()->has("success")) { ?>
        Swal.fire({
            icon: 'success',
            title: 'Great!',
            text: '<?= session("success") ?>'
        })
    <?php } ?>
});
</script>
<script>
$(function(){

    <?php if(session()->has("error")) { ?>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '<?= session("error") ?>'
        })
    <?php } ?>
});
</script>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <?php echo view('layout/menu.php') ?>

            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <?php echo view('admin/profile.php') ?>

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">State /</span> Add state</h4>

                        <div class="row">


                            <!-- Input Sizing -->
                            <form action="<?php echo base_url(); ?>store-state" method="post" enctype="multipart/form-data">
                                <div class="col-md-6">
                                    <div class="card mb-4">
                                        <h5 class="card-header">Input State/city </h5>

                                        <hr class="m-0" />
                                        <div class="card-body">
                                            <small class="text-light fw-semibold">Input select</small>
                                            <div class="mb-3">
                                                <label for="defaultSelect" class="form-label">Select State</label>
                                                <select id="sts" onchange="print_city('state', this.selectedIndex);" class="form-select" name="state" required></select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="defaultSelect" class="form-label">Select City</label>
                                                <select id="state" class="form-select " name="city" required></select>
                                                <script language="javascript">
                                                    print_state("sts");
                                                </script>
                                            </div>
                                            <div class="mb-3">
                                                <label for="formFile" class="form-label">Image City</label>
                                                <input class="form-control"  name="file" type="file" id="formFile" />
                                            </div>

                                        </div>
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary">save</button>
                                        </div>
                                    </div>
                                </div>
                            </form>



                        </div>
                        <?php echo view('layout/footar.php') ?>