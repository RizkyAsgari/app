    <div class="content">
        <h2 class="intro-y text-lg font-medium mt-10">
            Orders List
        </h2>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <!-- BEGIN: Data List -->
            <div class="intro-y col-span-12 overflow-auto 2xl:overflow-visible">
                <table class="table table-report -mt-2">
                    <thead>
                        <tr>
                            <th class="whitespace-nowrap">ORDER ID</th>
                            <th class="whitespace-nowrap">TRACKING NUMBER</th>
                            <th class="whitespace-nowrap">PAYMENT METHOD</th>
                            <th class="whitespace-nowrap">TRANSACTION TIME</th>
                            <th class="whitespace-nowrap">TRANSACTION END</th>
                            <th class="whitespace-nowrap">STATUS</th>
                            <th class="whitespace-nowrap">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($bill as $row) : ?>
                            <tr class="intro-x">
                                <td class="w-40 !py-4"> <a href="<?= site_url('bill/detail/' . $row->order_id) ?>" class="underline decoration-dotted whitespace-nowrap">#<?= $row->order_id ?></a> </td>
                                <td class="w-40 !py-4"> <a class="underline decoration-dotted whitespace-nowrap"><?= $row->tracking_id ?></a> </td>
                                <td class="w-40">
                                    <a href="" class="font-medium text-primary whitespace-nowrap"><?= $row->payment_method ?></a>
                                </td>
                                <td class="w-40">
                                    <a href="" class="font-medium whitespace-nowrap"><?= $row->transaction_time ?></a>
                                </td>
                                <td class="w-40">
                                    <a href="" class="font-medium whitespace-nowrap"><?= $row->payment_limit ?></a>
                                </td>
                                <td>
                                    <?php if ($row->status == "0") { ?>
                                        <div class="flex items-center whitespace-nowrap text-pending"> Pending </div>
                                    <?php } else if ($row->status == "1") { ?>
                                        <div class="flex items-center whitespace-nowrap text-success"> Paid </div>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php if (empty($row->gambar)) { ?>
                                        <a data-tw-toggle="modal" data-tw-target="#upload-confirmation-modal" class="btn btn-sm btn-rounded-primary">Upload Bukti</a>
                                    <?php } else { ?>
                                        <a class="btn btn-sm btn-rounded-success text-white">Verified</a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- END: Data List -->
        </div>
        <!-- BEGIN: Delete Confirmation Modal -->
        <?php foreach ($bill as $row) : ?>
            <div id="upload-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body p-0">
                            <form action="<?= site_url('bill/upload') ?>" method="post" enctype="multipart/form-data">
                                <div class="p-5">
                                    <div class="intro-y col-span-11 alert alert-primary alert-dismissible show flex items-center mb-6" role="alert">
                                        <span><i data-lucide="info" class="w-4 h-4 mr-2"></i></span>
                                        <span>Silahkan Upload Bukti Pembayaran Anda.</span>
                                        <button type="button" class="btn-close text-white" data-tw-dismiss="alert" aria-label="Close"> <i data-lucide="x" class="w-4 h-4"></i> </button>
                                    </div>
                                    <div class="text-slate-500 mt-2">

                                        <div class="mt-3">
                                            <div class="input-group">
                                                <input type="hidden" name="order_id" value="<?= $row->order_id ?>">
                                                <input id="crud-form-3" name="gambar" type="file" class="form-control" value="<?= $row->gambar ?>" placeholder="Quantity" aria-describedby="input-group-1">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <hr>
                                <div class="px-5 pb-8 mt-6 text-center">
                                    <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                                    <button type="submit" class="btn btn-danger w-24">Upload</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Delete Confirmation Modal -->
    </div>
    <?php endforeach; ?>