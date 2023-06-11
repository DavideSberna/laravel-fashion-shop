<aside class="d-flex flex-column pt-4">


    <a href="{{Route('admin.products.index')}}" class="d-flex align-items-center gap-2 py-3 px-3">
        <i class="fa-solid fa-tag"></i>
        <span class="d-none d-md-block">Prodotti</span>
    </a>

    <a href="{{Route('admin.brands.index')}}" class="d-flex align-items-center gap-2 py-3 px-3">
        <i class="fa-brands fa-bandcamp"></i>
        <span class="d-none d-md-block">Brands</span>
    </a>

    <a href="{{Route('admin.categories.index')}}" class="d-flex align-items-center gap-2 py-3 px-3">
        <i class="fa-solid fa-swatchbook"></i>
        <span class="d-none d-md-block">Categorie</span>
    </a>

    <a href="{{Route('admin.textures.index')}}" class="d-flex align-items-center gap-2 py-3 px-3 mb-4">
        <i class="fa-solid fa-palette"></i>
        <span class="d-none d-md-block">Textures</span>
    </a>




    <div onclick="window.Func.resizeSidebar();" class="sidebar-resizer">
        <i class="fa-solid fa-chevron-right"></i>
    </div>


</aside>