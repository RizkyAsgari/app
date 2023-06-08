<div class="content">
    <h2 class="intro-y text-lg font-medium mt-10">
        Product List
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- BEGIN: Users Layout -->
        <?php foreach ($product as $row) : ?>
            <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-3">
                <div class="box">
                    <div class="p-5">
                        <div class="h-40 2xl:h-56 image-fit rounded-md overflow-hidden before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black before:to-black/10">
                            <img alt="Midone - HTML Admin Template" class="rounded-md" src="<?= base_url() . '/uploads/' . $row->gambar ?>">
                            <span class="absolute top-0 bg-pending/80 text-white text-xs m-5 px-2 py-1 rounded z-10">Featured</span>
                            <div class="absolute bottom-0 text-white px-5 pb-6 z-10"> <a href="" class="block font-medium text-base"><?= $row->nama_brg ?></a> <span class="text-white/90 text-xs mt-3"><?= $row->kategori ?></span> </div>
                        </div>
                        <div class="text-slate-600 dark:text-slate-500 mt-5">
                            <div class="flex items-center"> <i data-lucide="link" class="w-4 h-4 mr-2"></i> Price: IDR <?= number_format($row->harga, 0, ',', '.') ?> </div>
                            <div class="flex items-center mt-2"> <i data-lucide="layers" class="w-4 h-4 mr-2"></i> Remaining Stock: <?= number_format($row->stok, 0, ',', '.') ?> </div>
                            <div class="flex items-center mt-2"> <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> Status: Active </div>
                        </div>
                    </div>
                    <div class="flex justify-center lg:justify-end items-center p-5 border-t border-slate-200/60">
                        <a class="flex items-center btn btn-sm btn-success text-white mr-3" href="<?php echo base_url('dashboard/detail_product/' . $row->id_brg) ?>" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> <i data-lucide="info" class="w-4 h-4 mr-1"></i> Detail </a>
                        <a class="flex items-center btn btn-sm btn-primary mr-3" href="<?= site_url('dashboard/cart/' . $row->id_brg) ?>"> <i data-lucide="shopping-cart" class="w-4 h-4 mr-1"></i> Add to Cart </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>