<div>
    <ul class="nav nav-tabs mb-2" role="tablist">
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center  {{$view['inventory-product-edit-basic'] ? 'active' : ''}}" id="account-tab" wire:click="changeTab('inventory-product-edit-basic')">
                <i class="feather icon-user mr-25"></i><span class="d-none d-sm-block">Basic</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center {{$view['inventory-product-edit-variation'] ? 'active' : ''}}" id="information-tab" wire:click="changeTab('inventory-product-edit-variation')">
                <i class="feather icon-info mr-25"></i><span class="d-none d-sm-block">Variation</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center {{$view['inventory-product-edit-seo'] ? 'active' : ''}}" id="information-tab" wire:click="changeTab('inventory-product-edit-seo')">
                <i class="feather icon-book mr-25"></i><span class="d-none d-sm-block">SEO</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center {{$view['inventory-product-edit-media'] ? 'active' : ''}}" id="information-tab" wire:click="changeTab('inventory-product-edit-media')">
                <i class="feather icon-info mr-25"></i><span class="d-none d-sm-block">Media</span>
            </a>
        </li>
    </ul>

    @if($view['inventory-product-edit-basic'])
    @livewire('inventory.inventory-product.inventory-product-edit-basic', [ 'product' => $product])
    @endif

    @if($view['inventory-product-edit-variation'])
    @livewire('inventory.inventory-product.inventory-product-edit-variation', [ 'product' => $product])
    @endif

    @if($view['inventory-product-edit-seo'])
    @livewire('inventory.inventory-product.inventory-product-edit-seo', [ 'product' => $product])
    @endif

    @if($view['inventory-product-edit-media'])
    @livewire('inventory.inventory-product.inventory-product-edit-media', [ 'product' => $product])
    @endif
</div>