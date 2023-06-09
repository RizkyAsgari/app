    <div class="content">
        <h2 class="intro-y text-lg font-medium mt-10">
            Transaction List
        </h2>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <!-- BEGIN: Data List -->
            <div class="intro-y col-span-12 overflow-auto 2xl:overflow-visible">
                <table class="table table-report -mt-2">
                    <thead>
                        <tr>
                            <th class="whitespace-nowrap">ORDER ID</th>
                            <th class="whitespace-nowrap">CUSTOMER NAME</th>
                            <th class="whitespace-nowrap">TRANSACTION TIME</th>
                            <th class="whitespace-nowrap">PROOF OF PAYMENT</th>
                            <th class="whitespace-nowrap">STATUS</th>
                            <th class="text-center whitespace-nowrap">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($invoice as $row) : ?>
                            <tr class="intro-x">
                                <td class="w-40 !py-4"> <a href="<?= site_url('admin/invoice/detail/' . $row->order_id) ?>" class="underline decoration-dotted whitespace-nowrap">#<?= $row->order_id ?></a> </td>
                                <td class="w-40">
                                    <a href="" class="font-medium whitespace-nowrap"><?= $row->name ?></a>
                                </td>
                                <td>
                                    <div class="text-slate-500 whitespace-nowrap mt-0.5"><?= $row->transaction_time ?></div>
                                </td>
                                <td><?php if (empty($row->gambar)) { ?>
                                        <div class="flex items-center whitespace-nowrap text-danger"> <i data-lucide="alert-circle" class="w-4 h-4 mr-2"></i>Belum upload bukti </div>
                                    <?php } else { ?>
                                        <a href="">
                                            <div class="flex items-center whitespace-nowrap text-primary"> <i data-lucide="link" class="w-4 h-4 mr-2"></i><a href="<?= base_url() . '/uploads/' . $row->gambar ?>">Lihat Bukti </a></div>
                                        </a>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php if ($row->status == "0") { ?>
                                        <div class="flex items-center whitespace-nowrap text-pending"><b>PENDING</b> </div>
                                    <?php } else if ($row->status == "1") { ?>
                                        <div class="flex items-center whitespace-nowrap text-success"> <b>PAID</b> </div>
                                    <?php } ?>
                                </td>
                                <td class="table-report__action">
                                    <center>
                                        <?php if ($row->status == "0") { ?>
                                            <div class="flex justify-center items-center">
                                                <a class="flex items-center text-primary whitespace-nowrap" href="<?= site_url('admin/invoice/confirm/' . $row->order_id) ?>"> <i data-lucide="arrow-left-right" class="w-4 h-4 mr-1"></i> Change Status </a>
                                            </div>
                                        <?php } else if ($row->status == "1") { ?>
                                            <button class="btn btn-sm btn-success text-white">Payment Successfully</button>
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
        <!-- <div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="p-5 text-center">
                            <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                            <div class="text-3xl mt-5">Are you sure?</div>
                            <div class="text-slate-500 mt-2">
                                Do you really want to delete these records?
                                <br>
                                This process cannot be undone.
                            </div>
                        </div>
                        <div class="px-5 pb-8 text-center">
                            <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                            <button type="button" class="btn btn-danger w-24">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- END: Delete Confirmation Modal -->
    </div>