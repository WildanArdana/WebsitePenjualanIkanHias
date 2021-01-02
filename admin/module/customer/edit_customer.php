<?php
include "../../lib/config.php";
include "../../lib/koneksi.php";

$idCustomer = $_GET['id_customer'];
$QueryEdit = mysqli_query($koneksi, "SELECT * FROM tbl_customer WHERE id_customer = '$idCustomer'");
$row = mysqli_fetch_array($QueryEdit);
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Member
            <small>Management</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Member</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Member</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <form class="form-horizontal" action="../admin/module/member/aksi_edit.php" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nama Member</label>
                                <div class="col-sm-10">
                                    <input type="hidden" class="form-control" name="id_customer" value="<?= $row['id_customer']; ?>">
                                    <input type="text" class="form-control" name="nama_customer" value="<?= $row['nama']; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Status Member</label>
                                <div class="col-md-10">
                                    <select name="status" class="form-control">
                                        <?php
                                        if ($row['status'] == 'Y') {
                                            $statusText = 'Aktif';
                                        } else {
                                            $statusText = 'Tidak Aktif';
                                        }
                                        ?>
                                        <option value="<?= $row['status'] ?>"><?= $statusText ?></option>
                                        <option value="N">Tidak Aktif</option>
                                        <option value="Y">Aktif</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>