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
                            <td class="w-40 !py-4"> <a href="<?= site_url('pay/detail/' . $row->order_id) ?>" class="underline decoration-dotted whitespace-nowrap">#<?= $row->order_id ?></a> </td>
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
                                <div class="flex items-center whitespace-nowrap text-success"> Paid </div>
                            </td>
                            <td>
                                <a class="btn btn-sm btn-rounded-success text-white">Verified</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
    </div>