<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">Invoice</h4>
                    <ol class="breadcrumb">
                        <li><a href="#">Invoice Pembayaran</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="clearfix">
                                <div class="pull-left">
                                    <h4 class="text-right"><img src="<?php echo base_url(''); ?>assets/images/logo_dark.png" alt="velonic"></h4>

                                </div>
                                <div class="pull-right">
                                    <h4>Invoice # <br>
                                        <strong><?php echo $invoice['i_date'].' - '.$invoice['i_id'] ?></strong>
                                    </h4>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="pull-left m-t-30">
                                        <address>
                                          <strong>Twitter, Inc.</strong><br>
                                          795 Folsom Ave, Suite 600<br>
                                          San Francisco, CA 94107<br>
                                          <abbr title="Phone">P:</abbr> (123) 456-7890
                                          </address>
                                    </div>
                                    <div class="pull-right m-t-30">
                                        <p><strong>Order Date: </strong> <?php echo $invoice['i_date'] ?></p>
                                        <p class="m-t-10"><strong>Order Status: </strong> <span class="label label-pink"><?php echo $invoice['i_status'] ?></span></p>
                                        <p class="m-t-10"><strong>Order ID: </strong> #<?php echo $invoice['i_id'] ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="m-h-50"></div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table m-t-30">
                                            <thead>
                                                <tr><th>#</th>
                                                <th>Item</th>
                                                <th>Time</th>
                                                <th style='text-align:right;'>Unit cost</th>

                                            </tr></thead>
                                            <tbody>
                                                <?php
                                                foreach ($transactions as $key) {
                                                    echo "<tr><td>
                    								".$key['t_id']."
                    								</td>";
                    								echo "<td>
                    								".$key['f_name']." - ".$key['f_location']."
                    								</td>";
                    								echo "<td>
                    								".$key['t_start_booking']."
                    								</td>";
                    								echo "<td style='text-align:right;'>
                    								IDR ".number_format( $key['p_price'] , 2 , ',' , '.' )."
                    								</td>";
                    								echo "<td>
                    								</td></tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <?php if (isset($extend) && $invoice['i_status'] == "paid"){ ?>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="m-b-30">

                                        <button type="button" class="btn btn-default waves-effect waves-light" data-toggle="modal" data-target="#modalExtend">
                                          Tambahan biaya +
                                        </button>
                                        <a href="<?php echo base_url().'admin/invoice?action=removeExtend&id='.$invoice['i_id']; ?>" type="button" class="btn btn-danger waves-effect waves-light">
                                          Hapus
                                      </a>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <table class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Item</th>
                                            <th style='text-align:right;'>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $count = 1;
                                            foreach ($extend as $key) {
                                                echo '<tr class="gradeX">';
                                                echo '<td>'.$count.'</td>';
                                                echo '<td>'.$key['item'].'</td>';
                                                echo '<td style="text-align:right;">IDR '.number_format( $key['price'] , 2 , ',' , '.' ).'</td>';
                                                echo '</td>';
                                                $count = $count +1;
                                            }

                                        } ?>

                                        <!-- <tr class="gradeX">
                                            <td>1</td>
                                            <td>Bola</td>
                                            <td>Win 95+</td>
                                            <td class="actions">
                                                <a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
                                                <a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
                                                <a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
                                                <a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                        <tr class="gradeC">
                                            <td>2</td>
                                            <td>Internet
                                                Explorer 5.0
                                            </td>
                                            <td>Win 95+</td>
                                            <td class="actions">
                                                <a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
                                                <a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
                                                <a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
                                                <a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr> -->
                                    </tbody>
                                </table>
                            </div>

                            <div class="row" style="border-radius: 0px;">
                              <div class="container">
                                <div class="col-md-4 col-md-offset-8">
                                    <!-- <p class="text-right"><b>Sub-total:</b> 2930.00</p>
                                    <p class="text-right">Discout: 12.9%</p> -->
                                    <!-- <p class="text-right">VAT: 12.9%</p> -->
                                    <hr>
                                    <h3 class="text-right"><?php echo "IDR ".number_format( $temp_payment , 2 , ',' , '.' ); ?></h3>
                                </div>
                              </div>
                            </div>
                            <hr>
                            <div class="hidden-print">
                                <div class="pull-right">
                                    <form class="" action="<?php echo base_url();?>admin/invoice/<?php echo $invoice['i_id']; ?>" method="post">
                                    <a href="javascript:window.print()" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>
                                    <?php if ($invoice['i_status'] == "completed") {
                                        echo '<button class="disabled btn btn-primary waves-effect waves-light" disabled>Finished</a>';
                                    }else if($invoice['i_status'] == "booked"){
                                        echo '<button type="submit" class="btn btn-warning waves-effect waves-light" name="i_status" value="paid">Change to paid</a>';
                                    }else if($invoice['i_status'] == "paid"){
                                        echo '<button type="submit" class="btn btn-danger waves-effect waves-light" name="i_status" value="completed">Change to complete</a>';
                                    } ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div> <!-- container -->

    </div> <!-- content -->


    <footer class="footer">
        © 2016. Gool Futsal All rights reserved.
    </footer>

</div>
<!-- Modal -->

<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->
